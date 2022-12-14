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
            <img class="hover:grow hover:shadow-lg" style="width: 50%; height:auto;" src="{{Storage::url($producto->foto->ubicacion)}}">
            <div id="desc_compra" class="text-lg">
        
                <h1 style="font-size: 22px;" class="self-center font-bold">Resumen de compra</h1>
                <p><b>Producto: </b> {{$producto->name}}</p>
                <p class="text-green-900 font-bold"><b>Precio por unidad:</b> ${{$producto->price}}</p>
                <p class="text-justify"><b>Descripción:</b> {{$producto->desc}}</p>
                <p><b>Listo en:</b> {{$producto->hours}} hora(s).</p>
                <span class="text-green-500 self-center">Compra ha sido confirmada!</span>
                <span class="text-green-500 self-center"><b>Total: </b>${{$total}} pesos</span>
                <a href ="/" class="self-center"><button class="buy" style="width:200px">Ir a menu principal</button></a>
                
            </div>
        </div>
    </section>
</body>

</html>