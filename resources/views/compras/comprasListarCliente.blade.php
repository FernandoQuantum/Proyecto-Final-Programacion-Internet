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

  <x-navBar :user="$user">
  </x-navBar>

  <h1 class="text-teal-500" style="margin-top: 35px; font-size:28px;">Resumen de tus compras</h1>

  <x-session-message/>

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
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
              @if($compra->mode == 0)
                Tienda
              @else
                A domicilio
              @endif
          </td>
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">${{$compra->total}} MXN</td>
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$compra->status}}</td>
          @can('delete', $compra)
					<td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
            <form action = "/compra/{{$compra->id}}" method="POST">
              @csrf
              @method('DELETE')
              <input class="w-full" type="submit" value="Cancelar compra">
            </form>
          </td>
          @else
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Sin acciones disponibles</td>
          @endcan
				</tr>
        @endforeach

			</tbody>
		</table>
	</div>
</body>

</html>




