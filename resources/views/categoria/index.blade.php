<x-master-layout>
    <div class="header">
          <h1 class="header-title">
              Lista de Categorias
          </h1>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Menu Principal</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Lista de Categorias</li>
              </ol>
          </nav>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <button class="btn btn-outline-primary btn-lg">Agregar Categoria<i class="align-middle fas fa-fw fa-plus"></i></button>
                  </div>
                  <div class="card-body">
                      <table id="datatables-reponsive" class="table table-bordered table-striped table-sm" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Categoria Nombre</th>
                                  <td></td>
                              </tr>
                          </thead>
                            <tbody>
                               @foreach ($categorias as $categoria)
                                  <tr>
                                      <td>{{ $categoria->cat_nombre }}</td>
                                      <td class="table-action">
                                        <a href="#"><i class="align-middle fas fa-fw fa-pen text-success"></i></i></a>
                                        <a href="#"><i class="align-middle fas fa-fw fa-trash text-danger"></i></a>
                                    </td>
                                      {{-- <td class="table-action">
                                          <a href="{{ route('categorias.edit', $categoria) }}"><i class="align-middle fas fa-fw fa-pen text-success"></i></a>
                                          <a href="{{ route('categorias.destroy', $categoria) }}"><i class="align-middle fas fa-fw fa-trash text-danger"></i></a>
                                      </td> --}}
                                  </tr>
                                @endforeach
                            </tbody>
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