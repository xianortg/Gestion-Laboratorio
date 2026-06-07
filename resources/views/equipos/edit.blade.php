<!DOCTYPE html>
<html>
<head>
    <title>Editar Equipo</title>
</head>
<body>

<h1>Editar Equipo</h1>

<form method="POST" action="{{ route('equipos.update', $equipo->id) }}">
    @csrf

    <input type="text" name="nombre" value="{{ $equipo->nombre }}"><br><br>

    <input type="text" name="numero_serie" value="{{ $equipo->numero_serie }}"><br><br>

    <textarea name="descripcion">{{ $equipo->descripcion }}</textarea><br><br>

    <button type="submit">Actualizar</button>
</form>

</body>
</html>