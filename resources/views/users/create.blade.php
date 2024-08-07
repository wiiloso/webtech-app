<x-master-layout>
    <div class="header">
        <h1 class="header-title">{{ __('Users') }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Main menu') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Create user') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div-col-12>
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Create user') }}</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Full name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Repeat password') }}</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>
                        <div class="mb-3">
                            <label for="roles" class="form-label">{{ __('Roles') }}</label>
                            <select class="form-control" id="roles" name="roles[]" multiple required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">{{ __('Cancel')}}</a>
                    </form>
                </div>
            </div>
        </div-col-12>
    </div>
</x-master-layout>
