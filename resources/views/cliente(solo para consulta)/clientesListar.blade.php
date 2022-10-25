
<x-testemplate titulo="Listado de clientes">
    
    @if(!empty($clientes))
        
        <table border="1">
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Tel</td>
                <td>Email</td>
                <td>Dirección</td>
                <td colspan="2">Acciones</td>
            </tr>
        @foreach($clientes as $cliente)
            <tr>
                <td><a href='/cliente/{{$cliente->id}}'>{{$cliente->id}}</a></td>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->phone}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->address}}</td>
                <td><a href='/cliente/{{$cliente->id}}/edit'><button>Editar</button></a></td>
                <td>
                    <form action="/cliente/{{$cliente->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
        </table>

    @else

        <h1>Listado está vacio</h1>

    @endif 

</x-testemplate>


