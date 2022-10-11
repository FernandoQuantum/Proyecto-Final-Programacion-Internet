<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles1.css">

</head>
<body>
    
    <header>
        <h1 id="title">Contacto</h1>
        <p id="description"><em>Edita los campos que desees cambiar</em></p>
    </header>

    <form id="survey-form" action="/cliente/{{$cliente->id}}" method="POST"> 
        @csrf
        @method('PATCH')
        <label id="name-label" for="name">Name</label>
        <input id="name" type="text" placeholder="Enter your name" name="name" value = {{$cliente->name}}>

        <label id="email-label" for="email">Email</label>
        <input id="email" type="text" placeholder="example@gmail.com" name="email" value= {{$cliente->email}}>
        
        <label id="phone-label" for="phone">Phone</label>
        <input id="phone" type="tel" placeholder="Enter phone number" name="phone" value={{$cliente->phone}}>

        <label id="address-label" for="address">Address</label>
        <input id="address" type="text" placeholder="Street name and number" name="address" value={{$cliente->address}}>
        
        <input id="submit" type="submit" value="Submit">

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    <br>
                @endforeach
            </ul>
        </div>
        @endif
    </form>

</body>
</html>