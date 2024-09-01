<x-master-layout>
    <div class="header">
        <h1 class="header-title">{{ __('Menu Principal') }}</h1>
    </div>
    {{-- <div class="row">
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
    </div> --}}


    <div class="row">
        <div class="col-md-6 col-lg-2 col-xl">
            <div class="card opacity-100">
                <img class="card-img-top" src="img/dashboard/perfil-usuario.jpg" alt="Unsplash" style="width: 300; height: 240px;">
                <div class="card-header">
                </div>
                <div class="card-body text-center">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwos" aria-expanded="false" aria-controls="collapseTwo">
                                Administración Usuarios
                            </button>
                          </h2>
                          <div id="collapseTwos" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="list-group">                                 
                                    <a href="{{ route('users.index') }}" 
                                       class="list-group-item list-group-item-action list-group-item-light">{{ __('List users') }}</a>
                                    <a href="{{ route('roles.index') }}" 
                                       class="list-group-item list-group-item-action list-group-item-light">{{ __('Roles') }}</a>
                                    <a href="{{ route('permissions.index') }}" 
                                       class="list-group-item list-group-item-action list-group-item-light">{{ __('Permisos') }}</a>
                                  </div>
                            </div>
                          </div>
                        </div>                      
                      </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card opacity-100">
                <img class="card-img-top" src="img/dashboard/pro.jpg" alt="Unsplash" style="width: 300; height: 240px;" />
                <div class="card-header">
                </div>
                <div class="card-body text-center">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Productos
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="list-group">  
                                <a href="{{ route('categoria.index') }}" 
                                   class="list-group-item list-group-item-action list-group-item-light">Categorias</a>
                                {{-- <a href="#" class="list-group-item list-group-item-action list-group-item-light">Sub-Categorias</a>     --}}
                                <a href="{{ route('producto.index') }}" 
                                   class="list-group-item list-group-item-action list-group-item-light">Productos</a>
                                <a href="{{ route('compra.index') }}" class="list-group-item list-group-item-action list-group-item-light">Entrada</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Salida</a>
                                </div>
                            </div>
                          </div>
                        </div>                      
                      </div>
                </div>
                 
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card opacity-100">
                <img class="card-img-top" src="img/dashboard/almacen-clasificando.jpg" alt="Unsplash" style="width: 300; height: 240px;" />
                <div class="card-header">
                </div>
                <div class="card-body text-center">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseinven" aria-expanded="false" aria-controls="collapseTwo">
                                Inventarios
                            </button>
                          </h2>
                          <div id="collapseinven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="list-group">     
                                    <a href="{{ route('proveedor.index') }}" class="list-group-item list-group-item-action list-group-item-light">Proveedores</a> 
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-light">Kardex</a>
                                </div>
                            </div>
                          </div>
                        </div>                      
                      </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card opacity-100">
                <img class="card-img-top" src="img/dashboard/robots-industriales-inteligentes.jpg" alt="Unsplash" style="width: 300; height: 240px;" />
                <div class="card-header">
                </div>
                <div class="card-body text-center">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseruta" aria-expanded="false" aria-controls="collapseTwo">
                                Rutas (IA)
                            </button>
                          </h2>
                          <div id="collapseruta" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="list-group">      
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-light">Encontrar Ruta Corta</a>
                                </div>
                            </div>
                          </div>
                        </div>                      
                      </div>
                </div>
            </div>
        </div>
    </div>  
</x-master-layout>
