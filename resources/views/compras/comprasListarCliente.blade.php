<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de compras</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="/css/landingcss.css">
    <script src="https://kit.fontawesome.com/54b579e7aa.js" crossorigin="anonymous"></script>
    
    <style>
      html,
      body {
        height: 100%;
      }

      @media (min-width: 640px) {
        table {
          display: inline-table !important;
        }

        thead tr:not(:first-child) {
          display: none;
        }
      }

      td:not(:last-child) {
        border-bottom: 0;
      }

      th:not(:last-child) {
        border-bottom: 2px solid rgba(0, 0, 0, .1);
      }
    </style>
</head>
<body class="bg-white flex flex-col items-center">

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

  <h1 class="text-teal-500" style="margin-top: 35px; font-size:28px;">Resumen de tus compras</h1>

	<div class="container">
		<table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
			<thead class="text-white">
        @foreach($compras as $compra)
          <tr class="bg-teal-400 flex flex-col flex-nowrap sm:table-row rounded-l-lg sm:rounded-none mb-2 ">
            <th class="p-3 text-left">Producto</th>
            <th class="p-3 text-left">Cantidad</th>
            <th class="p-3 text-left">Entrega</th>
            <th class="p-3 text-left">$Total</th>
            <th class="p-3 text-left">Estatus</th>
            <th class="p-3 text-left">Acciones</th>
          </tr>
        @endforeach
			</thead>
			<tbody class="flex-1 sm:flex-none">
        @foreach($compras as $compra)
				<tr class="flex flex-col flex-nowrap sm:table-row mb-2 sm:mb-2">
					<td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$compra->prod_name}}</td>
					<td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$compra->amount}}</td>
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$compra->mode}}</td>
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">${{$compra->total}} MXN</td>
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$compra->status}}</td>
          @if($compra->status == "pendiente")
					<td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
            <form action = "/compra/{{$compra->id}}" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="Cancelar compra">
            </form>
          </td>
          @else
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Sin acciones disponibles</td>
          @endif
				</tr>
        @endforeach

			</tbody>
		</table>
	</div>
</body>

</html>




