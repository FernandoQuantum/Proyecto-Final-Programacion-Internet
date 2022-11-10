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
            <!-- AQUI PONER EL IF DE SI YA ESTÁ DADO DE ALTA UN USUARIO -->
                @if($user == null)
                <!-- SI NO HAY NADIE LOGGEADO -->
                <a href="{{ route('login') }}" class="nav_link inline-block no-underline py-2 px-4">Inicia sesión</a> 
                <a href="{{ route('register') }}" class="nav_link inline-block no-underline py-2 px-4">Regístrate</a>

                @else 
                    @if($user->type == "admin")
                    <h1>ERES ADMIN BRO!</h1>
                    @endif
                    
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
                    @if($user->type == "admin")
                    <a href="{{url('/compra')}}"><li class="rounded-sm px-3 py-1 hover:bg-gray-100">Ver compras</li></a>
                    <a href="{{url('/producto')}}"><li class="rounded-sm px-3 py-1 hover:bg-gray-100">Productos</li></a>
                    @else
                    <a href="{{url('/compra')}}"><li class="rounded-sm px-3 py-1 hover:bg-gray-100">Mis compras</li></a>
                    @endif
                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                    <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                        <form method="POST" action="http://proyecto2.test/logout">
                            @csrf
                            <input type="submit" value="Cerrar Sesión" class="cursor-pointer">
                        </form>
                    </li>
                    </ul>
                    </div>
                </div>
            @endif
        </div>
    </nav>