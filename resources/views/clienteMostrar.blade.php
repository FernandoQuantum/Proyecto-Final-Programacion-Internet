<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Este cliente</title>
</head>
<body>
    <h1>Información del cliente {{$cliente->id}}</h1>
    <p>Nombre: {{$cliente->name}}</p>
    <p>Teléfono: {{$cliente->phone}}</p>
    <p>Email: {{$cliente->email}}</p>
    <p>Dirección: {{$cliente->address}}</p>
</body>
</html>