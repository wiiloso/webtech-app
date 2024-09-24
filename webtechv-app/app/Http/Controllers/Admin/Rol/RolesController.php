<?php

namespace App\Http\Controllers\Admin\Rol;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    protected $statusCode;

    public function index(Request $request)
    {
        $name = $request->search;
        $roles = Role::where("name", "like", "%" . $name . "%")->orderBy("id", "desc")->get();
        return response()->json([
            "roles" => $roles->map(function ($rol) {
                return [
                    "id" => $rol->id,
                    "name" => $rol->name,
                    "permision" => $rol->permissions,
                    "permision_pluck" => $rol->permissions->pluck("name"),
                    "created_at" => $rol->created_at->format("Y-m-d h:i:s")
                ];
            }),
        ]);
    }

    public function store(Request $request)
    {
        try {
            $is_role = Role::where("name", $request->name)->first();
            if ($is_role) {
                return response()->json([
                    "message" => 403,
                    "message_text" => "El rol ya existe",
                ]);
            }   
            $role = Role::create([
                'guard_name' => 'api',
                'name' => $request->name,
            ]);   
            $role->givePermissionTo($request->permision);
            return response()->json([
                "message" => 200,
                "statusCode" => $this->statusCode,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => 500,
                "message_text" => $e->getMessage(),
            ]);
        }
    }

    public function show(string $id)
    {
        try {
            $role = Role::findOrFail($id);

            if (!$role) {
                return response()->json([
                    "message" => 404,
                    "message_text" => "Rol no encontrado",
                ]);
            }
            return response()->json([
                "id" => $role->id,
                "name" => $role->name,
                "permision" => $role->permissions,
                "permision_pluck" => $role->permissions->pluck("name"),
                "created_at" => $role->created_at->format("Y-m-d h:i:s")
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => 500,
                "message_text" => $e->getMessage(),
            ]);
        }     
    }

    public function update(Request $request, string $id)
    {
        try {
            $is_role = Role::where("id", "<>", $id)->where("name", $request->name)->first();

            if ($is_role) {
                return response()->json([
                    "message" => 403,
                    "message_text" => "El rol ya existe",
                ]);
            }

            $role = Role::findOrFail($id);
            $role->update($request->all());
            $role->syncPermissions($request->permision);
            
            return response()->json([
                "message" => 200,
                "message_text" => "Rol actualizado correctamente",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => 500,
                "message_text" => $e->getMessage(),
            ]);
        }
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        if ($role->users->count() > 0) {
            return response()->json([
                "message" => 403,
                "message_text" => "El rol tiene usuarios asignados",
            ]);
        }
        $role->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
