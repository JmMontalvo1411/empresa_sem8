@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Eliminar Personas</h1>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar persona..." id="searchInput">
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Fecha de Nacimiento</th>
                <th>Edad</th>
                <th>Sueldo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="personasTable">
            @foreach($personas as $persona)
                <tr>
                    <td>{{ $persona->id }}</td>
                    <td>{{ $persona->cPerApellido }}</td>
                    <td>{{ $persona->cPerNombre }}</td>
                    <td>{{ $persona->cPerDireccion }}</td>
                    <td>{{ $persona->dPerFechaNac }}</td>
                    <td>{{ $persona->nPerEdad }}</td>
                    <td>{{ $persona->nPerSueldo }}</td>
                    <td>{{ $persona->nPerEstado ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePersonaModal{{ $persona->id }}">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach($personas as $persona)
    <!-- Modal Eliminar Persona -->
    <div class="modal fade" id="deletePersonaModal{{ $persona->id }}" tabindex="-1" role="dialog" aria-labelledby="deletePersonaModalLabel{{ $persona->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePersonaModalLabel{{ $persona->id }}">Confirmar eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que deseas eliminar a {{ $persona->cPerNombre }} {{ $persona->cPerApellido }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('persona.destroy', $persona->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toLowerCase();
        table = document.getElementById('personasTable');
        tr = table.getElementsByTagName('tr');

        for (i = 0; i < tr.length; i++) {
            tr[i].style.display = 'none';
            td = tr[i].getElementsByTagName('td');
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                        break;
                    }
                }
            }
        }
    });
</script>
@endsection
