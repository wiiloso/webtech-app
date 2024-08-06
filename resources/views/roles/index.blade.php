<x-master-layout>
    <div class="header">
        <h1 class="header-title">{{ __('Roles') }}</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('List roles') }}</h1>
                </div>
                <div class="card-body">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">{{ __('Create rol') }}</a>
                    <table id="datatables-reponsive" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Rol name') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="btn btn-warning">{{ __('Edit') }}</a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
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
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
</x-master-layout>
