<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Equipos</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; margin: 20px; }
        h1, h2 { color: #2c3e50; }
        .container { max-width: 900px; margin: auto; }
        table {
            width: 100%; border-collapse: collapse; background: white;
            margin-top: 15px; margin-bottom: 25px; border-radius: 8px;
            overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th { background-color: #3498db; color: white; padding: 12px; text-align: left; }
        td { padding: 12px; border-bottom: 1px solid #ddd; }
        tr:hover { background-color: #f1f1f1; }
        form {
            background: white; padding: 20px; border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-top: 25px; margin-bottom: 40px;
        }
        input, textarea, select {
            width: 100%; padding: 10px; margin-top: 5px; margin-bottom: 12px;
            border: 1px solid #ccc; border-radius: 5px;
        }
        button {
            background-color: #2ecc71; color: white; padding: 10px 15px;
            border: none; border-radius: 5px; cursor: pointer;
        }
        button:hover { background-color: #27ae60; }
        a { text-decoration: none; padding: 6px 10px; border-radius: 5px; display: inline-block; }
        .edit { background-color: #f39c12; color: white; margin-right: 10px; }
        .delete { background-color: #e74c3c; color: white; }
    </style>
</head>
<body>
<div class="container">

<h1>Listado de Equipos del Laboratorio</h1>

<table>
    <tr>
        <th>Nombre</th>
        <th>Número de Serie</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Aula</th>
        <th>Acciones</th>
    </tr>

    @forelse ($equipos as $equipo)
        <tr>
            <td>{{ $equipo->nombre }}</td>
            <td>{{ $equipo->numero_serie }}</td>
            <td>{{ $equipo->descripcion }}</td>
            <td>
                @if($equipo->imagen_ruta)
                    <img src="{{ asset($equipo->imagen_ruta) }}" width="80">
                @else
                    Sin imagen
                @endif
            </td>
            <td>{{ $equipo->aula->nombre_sala ?? 'Sin aula' }}</td>
            <td>
                <a class="edit" href="{{ route('equipos.edit', $equipo->id) }}">Editar</a>

                <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete"
                            onclick="return confirm('¿Seguro que quieres eliminar este equipo?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No hay equipos cargados todavía</td>
        </tr>
    @endforelse
</table>

<h2>Agregar nuevo equipo</h2>

<form method="POST" action="{{ route('equipos.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre del equipo" required>
    <input type="text" name="numero_serie" placeholder="Número de serie" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>

    <input type="file" name="imagen" accept="image/*">

    <select name="aula_id">
        <option value="">Selecciona un aula</option>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}">{{ $aula->nombre_sala }}</option>
        @endforeach
    </select>

    <button type="submit">Guardar equipo</button>
</form>

</div>
</body>
</html>
