
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
    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
	
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/landing.css">

</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

    <!--Nav-->
    <nav id="header" class="w-full z-30 top-0 py-1 sticky">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle" />

            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
                <nav>
                    <ul class="md:flex items-center justify-between pt-4 md:pt-0">
                        <li><a class="nav_link inline-block no-underline py-2 px-4" href="/#store">Tienda</a></li>
                        <li><a class="nav_link inline-block no-underline py-2 px-4" href="/#about">About</a></li>
                        <li><a class="nav_link inline-block no-underline py-2 px-4" href="/#contacto">Contacto</a></li>
                    </ul>
                </nav>
            </div>

            <div class="order-1 md:order-2">
                <a class="logo-icon flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                <i class="fa-solid fa-cookie"></i>
                    Kokolatte
                </a>
            </div>

            <div class="order-2 md:order-3 flex items-center" id="nav-content">
                 <div class="max-w-lg mx-auto">
                    <button class="text-white bg-pink-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown">Admin<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                        <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="{{url('/user/profile')}}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Perfil</a>
                        </li>
                        <li>
                            <a href="" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Cerrar sesión</a>
                        </li>
                        <li>
                            <a href="{{route('login')}}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Iniciar sesion</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-white">

        <div class="container mx-auto flex items-start flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-center flex-col mt-0 px-2 py-3">

                    <a class="titulo_subrayado uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " style="font-size:30px;">
                    <i class="fa-solid fa-store"></i>
				Tienda
			</a>
            <a href="/producto/create"><button id="add"><i class="fa-solid fa-plus"></i>Agregar platillo</button></a>

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
                    <a href="/producto/{{$producto->id}}/edit"><button class="buy self-center">
                        Editar
                    </button></a>
                    <form action = "/producto/{{$producto->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="borrar" type="submit" value="Borrar">
                    </form>
                </div>
            </div>
            @endforeach  
    </section>
</body>

</html>