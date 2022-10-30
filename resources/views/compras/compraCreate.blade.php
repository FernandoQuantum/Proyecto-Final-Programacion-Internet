<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compra de producto</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/54b579e7aa.js" crossorigin="anonymous"></script>	
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/landingcss.css">

</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

    <!--Nav-->
    <x-navBar :user="$user">
    </x-navBar>

    <section class="flex justify-center p-6">
        <div id = "container_compra">
            <img class="hover:grow hover:shadow-lg" style="width: 50%; height:auto;" src="/img/{{$producto->prod_picture}}">
            <div id="desc_compra" class="text-lg">
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
                <h1 style="font-size: 22px;" class="self-center font-bold">Resumen de compra</h1>
                <p><b>Producto: </b> {{$producto->name}}</p>
                <p class="text-green-900 font-bold"><b>Precio por unidad:</b> ${{$producto->price}}</p>
                <p class="text-justify"><b>Descripción:</b> {{$producto->desc}}</p>
                <p><b>Listo en:</b> {{$producto->hours}} hora(s).</p>

                <form class="formulario_compra" action="/compra/make/{{$producto->id}}" method="POST">
                    @csrf
                    <label for="cantidad">Seleccione la cantidad</label>
                    <input id="cantidad" name="amount" type="number" required>

                    <label for="entrega">Seleccione modo de entrega</label>
                    <select id="entrega" name="mode" required>
                        <option value=1>A domicilio</option>
                        <option value=0>Recoger en tienda</option>
                    </select>

                    <input class="buy" style="width: 200px; margin-top:20px;" type="submit" value="Confirmar compra">
                </form>
                
            </div>
        </div>
    </section>
</body>

</html>