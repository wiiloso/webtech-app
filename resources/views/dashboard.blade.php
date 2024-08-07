<x-master-layout>
    <div class="header">
        <h1 class="header-title">{{ __('Master Layout') }}</h1>
    </div>
    <div class="row">
        {{-- Start block usuarios --}}
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3 font-weight-bold">{{ __('Users') }}</h1>
                    <div class="mb-0">
                        <span class="text-danger"> <a
                                href="{{ route('users.index') }}">{{ __('List users') }}</a></span>
                    </div>
                </div>
            </div>
        </div>
        {{-- End block usuarios --}}

        {{-- Start block Roles --}}
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3 font-weight-bold">{{ __('Roles') }}</h1>
                    <div class="mb-0">
                        <span class="text-danger"> <a
                                href="{{ route('roles.index') }}">{{ __('List roles') }}</a></span>
                    </div>
                </div>
            </div>
        </div>
        {{-- End block Roles --}}

        {{-- Start block permissions --}}
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3 font-weight-bold">{{ __('Permissions') }}</h1>
                    <div class="mb-0">
                        <span class="text-danger"> <a
                                href="{{ route('permissions.index') }}">{{ __('List permissions') }}</a></span>
                    </div>
                </div>
            </div>
        </div>
        {{-- End block permissions --}}
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3 font-weight-bold">Productos</h1>
                    <div class="mb-0">
                        <span class="text-danger"> <a href="{{ route('producto.index') }}">Lista Productos</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title"></h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-success-dark">
                                    <i class="align-middle" data-feather="arrow-up-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3">Entrada Productos</h1>
                    <div class="mb-0">
                        <span class="text-danger"> <a href="#">Lista Productos Entrada</a></span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
