@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Actualizar Personas</h1>
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
                        <a href="{{ route('persona.edit', $persona->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

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
