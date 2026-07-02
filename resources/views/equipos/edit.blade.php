<!DOCTYPE html>
<html>
<head>
    <title>Editar Equipo</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; margin: 20px; }
        h1 { color: #2c3e50; }
        .container { max-width: 600px; margin: auto; }
        form {
            background: white; padding: 20px; border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        input, textarea, select {
            width: 100%; padding: 10px; margin-top: 5px; margin-bottom: 12px;
            border: 1px solid #ccc; border-radius: 5px;
        }
        button {
            background-color: #3498db; color: white; padding: 10px 15px;
            border: none; border-radius: 5px; cursor: pointer;
        }
        button:hover { background-color: #2980b9; }
        .back { display:inline-block; margin-top:15px; color:#2c3e50; }
        img { margin-top:10px; border-radius:5px; }
    </style>
</head>
<body>
<div class="container">

<h1>Editar Equipo</h1>

<form method="POST" action="{{ route('equipos.update', $equipo->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="nombre" value="{{ $equipo->nombre }}" placeholder="Nombre del equipo" required>
    <input type="text" name="numero_serie" value="{{ $equipo->numero_serie }}" placeholder="Número de serie" required>
    <textarea name="descripcion" placeholder="Descripción">{{ $equipo->descripcion }}</textarea>

    @if($equipo->imagen_ruta)
        <p>Imagen actual:</p>
        <img src="{{ asset($equipo->imagen_ruta) }}" width="120">
    @endif
    <input type="file" name="imagen" accept="image/*">

    <select name="aula_id">
        <option value="">Selecciona un aula</option>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}" {{ $equipo->aula_id == $aula->id ? 'selected' : '' }}>
                {{ $aula->nombre_sala }}
            </option>
        @endforeach
    </select>

    <button type="submit">Actualizar equipo</button>
</form>

<a href="{{ route('equipos.index') }}" class="back">← Volver al listado</a>

</div>
</body>
</html>
