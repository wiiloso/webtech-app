<x-master-layout>
    <div class="header">
        <h1 class="header-title">
            Menu Principal
        </h1>
        <p class="header-subtitle">Bienvenido a la aplicación</p>
    </div>
    <div class="row">
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
        <div class="col-md-6 col-lg-3 col-xl">

        </div>
        <div class="col-md-6 col-lg-3 col-xl">

        </div>
    </div>



</x-master-layout>
