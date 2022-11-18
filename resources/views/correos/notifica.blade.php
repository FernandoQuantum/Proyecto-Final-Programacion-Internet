@component('mail::message')
# Compra confirmada

Hola {{$usuario->name}}!
Tu compra del producto {{$compra->prod_name}} ha sido confirmada.
Total: ${{$compra->total}}.

Gracias, por su compra.<br>
{{ config('app.name') }}
@endcomponent
