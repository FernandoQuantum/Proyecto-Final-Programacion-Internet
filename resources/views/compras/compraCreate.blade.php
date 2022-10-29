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

                <div class="group inline-block">
                    <button
                        class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-md flex items-center w-30"
                    >
                        <span class="pr-1 font-semibold flex-1">{{$user->name}}</span>
                        <span>
                        <svg
                            class="fill-current h-4 w-4 transform group-hover:-rotate-180
                            transition duration-150 ease-in-out"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                            />
                        </svg>
                        </span>
                    </button>
                    <ul
                        class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                    transition duration-150 ease-in-out origin-top min-w-32"
                    >
                    <a href="{{url('/user/profile')}}"><li class="rounded-sm px-3 py-1 hover:bg-gray-100">Perfil</li></a>
                        <a href="{{url('/compra')}}"><li class="rounded-sm px-3 py-1 hover:bg-gray-100">Mis compras</li></a>
                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Cerrar sesión</li>
                    </ul>
                    </div>

            </div>
        </div>
    </nav>

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

                <form class="formulario_compra" action="/compra/{{$producto->id}}" method="POST">
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