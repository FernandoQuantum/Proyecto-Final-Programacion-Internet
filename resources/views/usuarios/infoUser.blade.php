<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info usuario</title>
</head>
<body>
    <img src="" alt="img del usuario">
    <span>ID del usuario: {{$usuario->id}}</span>
    <span>Nombre del usuario: {{$usuario->name}}</span>
    <span>Email del usuario: {{$usuario->email}}</span>
    <span>Direccion del usuario: {{$usuario->address}}</span>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info de usuario</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/54b579e7aa.js" crossorigin="anonymous"></script>	
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

    <section class="flex justify-center p-6">

        <div class="bg-gray-200 font-sans h-screen w-full flex flex-row justify-center items-center">
            <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                <img class="w-32 mx-auto rounded-full -mt-20" src="/img/user.png" alt="">
                <div class="text-center mt-2 text-3xl font-medium">{{$usuario->name}}</div>
                <div class="text-center mt-2 font-normal text-sm">{{$usuario->email}}</div>
                <div class="text-center font-light text-lg"><span style="text-transform: uppercase;">{{$usuario->type}}</span></div>
                <div class="px-6 text-center mt-2 font-light text-sm">
                <p>
                    <b>Dirección:</b> {{$usuario->address}}<br>
                    <b>Usuario desde: </b>{{$usuario->created_at}}
                </p>
            </div>
            <hr class="mt-8">
            <div class="flex p-4 justify-center">
                <div class="w-1/2 text-center">
                    <span class="font-bold">ID de usuario: </span> {{$usuario->id}}
                </div>
            </div>
        </div>
    </section>
</body>

</html>