<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles1.css">
    
    <style>

        #submit{
            background-color: green;
            color: white;
            border-radius: 4px;
            border: 1px solid white;
            margin-top: 10px;
            padding: 3px;
            cursor: pointer;
        }

        img{
            width: 50%;
            height: auto;
        }
    </style>


</head>
<body>

    <header>
        <h1 id="title">Editar producto</h1>
        <p id="description"><em>Sustituya los campos que desee modificar</em></p>
    </header>

    <form id="survey-form" action="/producto/{{$producto->id}}" method="POST">
        @csrf
        @method('PATCH')

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    <br>
                @endforeach
            </ul>
        </div>
        @endif
        
        <img src="/img/{{$producto->prod_picture}}" alt="Donde está la imagen??">

        <label class="mt-5" for="picture">Seleccione imagen</label>
        <input id = "picture" type="file" name="prod_picture" required>
        
        <label class ="mt-5" for="name">Cambiar nombre</label>
        <input id = "name" type="text" placeholder="Nombre producto" name="name" required value="{{$producto->name}}">
        
        <label class ="mt-5" for="name">Precio</label>
        <input id = "name" type="number" placeholder="Precio producto" name="price" required value="{{$producto->price}}">

        <label class ="mt-5" for="name">Descripción</label>
        <input id = "name" type="text" placeholder="Descripción del producto" name="desc" required value="{{$producto->desc}}">

        <label class ="mt-5" for="name">Horas</label>
        <input id = "name" type="number" placeholder="1" name="hours" required value="{{$producto->hours}}">

        <input id="submit" type="submit" value="Listo">
    </form>

</body>
</html>


