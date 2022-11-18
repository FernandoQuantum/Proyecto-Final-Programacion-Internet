
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista Admin</title>
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

    @if(session('info'))
    <div class="bg-white text-center py-4 lg:px-4">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Éxito</span>
            <span class="font-semibold mr-2 text-left flex-auto">{{session('info')}}</span>
        </div>
    </div>
    @endif

    <section class="bg-white">

        <div class="container mx-auto flex items-start flex-wrap pt-4 pb-12">

            <nav class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-center flex-col mt-0 px-2 py-3">

                    <a class="titulo_subrayado uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " style="font-size:30px;">
                    <i class="fa-solid fa-utensils"></i>
				Administrar Productos
			</a>
            <a href="/producto/create" class="mt-10"><button id="add"><i class="fa-solid fa-plus"></i>Agregar platillo</button></a>

        </div>
        
            </nav>

            @foreach($productos as $producto)
            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                <div>
                    <img class="producto hover:grow hover:shadow-lg" src="img/{{$producto->prod_picture}}">
                    <div class="pt-3 flex items-center justify-between">
                        <p class="font-bold">{{$producto->name}}</p>
                        <p class="pt-1 text-green-900 font-bold">${{$producto->price}}</p>
                    </div>
                    <p class="text-justify">{{$producto->desc}}</p>
                </div>
                <div class="flex self-center gap-x-10">
                    <a href="/producto/{{$producto->id}}/edit"><button class="buy self-center" style="width:70px;">
                        Editar
                    </button></a>
                    <form action = "/producto/{{$producto->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="borrar" type="submit" value="Borrar" style="width: 70px;">
                    </form>
                </div>
            </div>
            @endforeach  
    </section>
</body>

</html>