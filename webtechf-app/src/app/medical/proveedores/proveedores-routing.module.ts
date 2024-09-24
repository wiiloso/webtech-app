import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ProveedoresComponent } from './proveedores.component';
import { ListaProveedoresComponent } from './lista-proveedores/lista-proveedores.component';
import { CrearProveedorComponent } from './crear-proveedor/crear-proveedor.component';
import { EditarProveedorComponent } from './editar-proveedor/editar-proveedor.component';

const routes: Routes = [
  {
    path: '',
    component: ProveedoresComponent,
    children: [
      {
        path: 'ListaProveedores',
        component: ListaProveedoresComponent,
      },
      {
        path: 'crear-proveedor',
        component: CrearProveedorComponent
      },
      {
        path: 'editar-proveedor',
        component: EditarProveedorComponent
      }
    ],
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProveedoresRoutingModule { }
