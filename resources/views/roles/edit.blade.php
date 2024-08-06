<x-master-layout>
    <div class="header">
        <h1 class="header-title">{{ __('Roles') }}</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Edit role') }}</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Role name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $role->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="permissions" class="form-label">{{ __('Permission') }}</label>
                            <select class="form-control" id="permissions" name="permissions[]" multiple required>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}"
                                        {{ in_array($permission->name, $rolePermissions) ? 'selected' : '' }}>
                                        {{ $permission->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary ms-2">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
