<x-master-layout>
    <div class="header">
          <h1 class="header-title">
              Lista de Proveedores
          </h1>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Menu Principal</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Lista de Proveedor</li>
              </ol>
          </nav>
      </div> 
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <button class="btn btn-outline-primary btn-lg mt-3">Agregar Proveedor<i class="align-middle fas fa-fw fa-plus"></i></button>
                  </div>
                  <div class="card-body">
                      <table id="datatables-reponsive" class="table table-bordered table-striped table-sm" style="width:100%">
                         <thead>
                              <tr>
                                  <th>Nombre Proveedor</th>
                                  <th>Direccion</th>
                                  <th>Telefono</th>
                                  <th>Código Postal</th>
                                  <td></td>
                              </tr>
                          </thead> 
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                    <tr>
                                        <td>{{ $proveedor->prov_nombre_proveedor }}</td>
                                        <td>{{ $proveedor->prov_direccion }}</td>
                                        <td>{{ $proveedor->prov_telefono }}</td>
                                        <td>{{ $proveedor->prov_codigo_postal }}</td>
                                        <td class="table-action">
                                            <a href="#"><i class="align-middle fas fa-fw fa-pen text-success"></i></i></a>
                                            <a href="#"><i class="align-middle fas fa-fw fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <script>
          document.addEventListener("DOMContentLoaded", function() {
              $("#datatables-reponsive").DataTable({
                  responsive: true
              });
          });
      </script>
  </x-master-layout>