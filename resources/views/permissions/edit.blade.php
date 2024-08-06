<x-master-layout>
    <div class="header">
        <h1 class="header-title">{{ __('Permissions') }}</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Edit permission') }}</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Permission name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $permission->name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        <a href="{{ route('permissions.index') }}"
                            class="btn btn-secondary ms-2">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
