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
    <link rel="stylesheet" href="/css/formEditProducto.css">

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
    </style>
</head>
<body>

    <header>
        <h1 id="title">Nuevo producto</h1>
        <p id="description"><em>Llene la info del nuevo producto</em></p>
    </header>

    <form id="survey-form" class = "formulario_prevent" action="/producto" method="POST" enctype="multipart/form-data">

        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-red-500">{{$error}}</li>
                        <br>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        <label class="mt-5" for="picture">Imagen del nuevo producto</label>
        <input id = "picture" type="file" accept="image/jpeg,image/png,image/jpg" name="prod_picture" required>
        
        <label class ="mt-5" for="name">Nombre</label>
        <input id = "name" type="text" placeholder="Nombre producto" name="name" required value="{{old('name')}}">
        
        <label class ="mt-5" for="name">Precio</label>
        <input id = "name" type="number" placeholder="Precio producto" name="price" required value="{{old('price')}}">

        <label class ="mt-5" for="name">Descripción</label>
        <input id = "name" type="text" placeholder="Descripción del producto" name="desc" required value="{{old('desc')}}">

        <label class ="mt-5" for="name">Horas</label>
        <input id = "name" type="number" placeholder="1" name="hours" required value="{{old('hours')}}">

        <input id="submit" type="submit" value="Crear producto" class="submit-prevent-button">
    </form>

    <script src="/js/submit.js"></script>
</body>
</html>