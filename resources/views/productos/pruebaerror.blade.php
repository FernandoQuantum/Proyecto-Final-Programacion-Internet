
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOLA</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
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
                        <li><a class="nav_link inline-block no-underline py-2 px-4" href="#store">Tienda</a></li>
                        <li><a class="nav_link inline-block no-underline py-2 px-4" href="#about">About</a></li>
                        <li><a class="nav_link inline-block no-underline py-2 px-4" href="#contacto">Contacto</a></li>
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

            <a href="{{ route('register') }}" class="nav_link inline-block no-underline py-2 px-4">Regístrate</a>


            </div>
        </div>
    </nav>

    <div class="carousel relative container mx-auto" style="max-width:1600px; height:90vh; margin-bottom:10px;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:90vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('img/headeruno.jpg');">

                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <!-- <p class="carrusel_title my-4">Experta en galletas artesanales</p> -->
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:90vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('img/header3.jpg');">

                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <!-- <p class="carrusel_title text-black text-2xl my-4">Elegancia en cada entrega</p> -->
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:90vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom" style="background-image: url('img/header2.jpg');">

                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <!-- <p class="carrusel_title text-2xl my-4">Dulces, postres y articulos para regalo</p> -->
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
            </ol>

        </div>
    </div>

    <!--	 
Alternatively if you want to just have a single hero
<section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right" style="max-width:1600px; height: 32rem; background-image: url('https://images.unsplash.com/photo-1422190441165-ec2956dc9ecc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">
	<div class="container mx-auto">
		<div class="flex flex-col w-full lg:w-1/2 justify-center items-start  px-6 tracking-wide">
			<h1 class="text-black text-2xl my-4">Stripy Zig Zag Jigsaw Pillow and Duvet Set</h1>
			<a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">products</a>
		</div>
	  </div>
</section>
-->

    <section class="bg-white">

        <div class="container mx-auto flex items-start flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-center mt-0 px-2 py-3">

                    <a class="titulo_subrayado uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " style="font-size:30px;">
                    <i class="fa-solid fa-store"></i>
				Tienda
			</a>

        </div>
            </nav>
    </section>

    <section id="about" class="bg-white border-b flex flex-col align-center justify-center">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="titulo_subrayado w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
            Conócenos
            </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-wrap align-center justify-center">
          <div class="w-5/6 sm:w-1/2 p-6">
            <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
              Pastelería y repostería
            </h3>
            <p class="text-gray-600 mb-8" style="font-size: 19px;">
                Somos un pequeño negocio en expansión. Nuestra especialidad son los pasteles y la repostería en general desde 2019. Nuestro objetivo es llegar a distribuir nuestro producto a todas las fiestas y reuniones de la ZMG. 
                Nuestros productos base son preparados totalmente a mano por una repostera profesional. Nuestro objetivo es siempre seguir la misma formula de preparar postres artesanales de calidad.
            </p>
          </div>
          <div class="w-full sm:w-1/2 p-6">
            <img class="w-full sm:h-90 mx-auto" src="img/kokolatteLogo.png">
          </div>
        </div>


        <div class="flex flex-wrap align-center justify-center">
        <div class="w-full sm:w-1/2 p-6">
            <img class="w-full sm:h-90 mx-auto" src="img/bio2.jpg">
          </div>
          <div class="w-5/6 sm:w-1/2 p-6">
            <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
              Nuestra variedad
            </h3>
            <p class="text-gray-600 mb-8" style="font-size: 19px;">
                Contamos con una gran gama de productos, desde pasteles individuales hasta para 30 personas, así como galletas, cupcakes, bombones rellenos, dulces y paquetes que combinan lo que tú quieras.
                También aceptamos pedidos personalizados que incluyan cartas y regalitos adicionales.
            </p>
          </div>
        </div>
       </div>
    </section>
    

              
    <div class="container flex items-center flex-wrap justify-center flex-col" id="modos_entrega">

        <h2 class="titulo_subrayado" style="font-size: 25px; color:black;">Modos de entrega</h2>

        <div class="flex flex-wrap items-center justify-center w-full max-w-4xl mt-8">
		<div class="flex flex-col flex-grow mt-8 overflow-hidden bg-white rounded-lg shadow-lg">
			<div class="flex flex-col items-center p-10 bg-gray-200">
				<span class="font-semibold">Recoger en tienda</span>
				<div class="flex items-center">
					<span class="text-2xl text-gray-500">Sin cargo adicional</span>
				</div>
			</div>
			<div class="p-10">
				<ul>
					<li class="flex items-center">
						<span>-></span>
						<span class="ml-2">Entrega se realiza directo en local</span>
					</li>
					<li class="flex items-center">
                        <span>-></span>
						<span class="ml-2">Sin cargo extra sobre pedido</span>
					</li>
					<li class="flex items-center">
                        <span>-></span>
						<span class="ml-2">Pedido listo dentro del tiempo indicado</span>
					</li>
				</ul>
			</div>
			<div class="flex px-10 pb-10 justify-center flex-row" >
                <i class="icon fa-solid fa-store"></i>
			</div>
		</div>		

		<div class="flex flex-col flex-grow mt-8 overflow-hidden bg-white rounded-lg shadow-lg">
			<div class="flex flex-col items-center p-10 bg-gray-200">
				<span class="font-semibold">A domicilio</span>
				<div class="flex items-center">
					<span class="text-2xl text-gray-500">+ 10% del total del pedido</span>
				</div>
			</div>
			<div class="p-10">
				<ul>
					<li class="flex items-center">
                        <span>-></span>
						<span class="ml-2">Entrega se realiza al domicilio registrado</span>
					</li>
					<li class="flex items-center">
                        <span>-></span>
						<span class="ml-2">Entrega toma de 1 a 2hs más</span>
					</li>
					<li class="flex items-center">
                        <span>-></span>
						<span class="ml-2">Aseguramos la misma calidad que en tienda</span>
					</li>
				</ul>
			</div>
			<div class="flex px-10 pb-10 justify-center">
                <i class="icon fa-solid fa-truck"></i>
			</div>
		</div>		
    </div>

    <div class="container flex items-center flex-wrap justify-center flex-col" id="modos_pedido">

        <h1 class= "titulo_subrayado" style="margin-bottom:20px;">¿Cómo puedo realizar pedidos?</h1>

        <div class="wrap_column">
            <div class="option_column">
                <img src="img/online.png">
                <h2>En linea</h2>
                <div class="step">
                    <span class="number">1-  </span>
                    <p>Registrate en nuestra plataforma en linea llenando los datos solicitados</p>
                </div>
                <div class="step">
                    <span class="number">2-  </span>
                    <p>Visita el apartado de tienda</p>
                </div>
                <div class="step">
                    <span class="number">3-  </span>
                    <p>Haz click en comprar en el producto deseado</p>
                </div>
                <div class="step">
                    <span class="number">4-  </span>
                    <p>Seleccione la cantidad que desea pedir</p>
                </div>
                <div class="step">
                    <span class="number">5-  </span>
                    <p>Seleccione la modalidad de entrega que desea (a domicilio o para recojer) y confirme su compra!</p>
                </div>

            </div>

            <div class="option_column">
                <img src="img/call.PNG">
                <h2>Por teléfono</h2>
                <div class="step">
                    <span class="number">1- </span>
                    <p>Consulte los productos existentes en la tienda virtual, o visite nuestra página oficial de Facebook</p>
                </div>
                <div class="step">
                    <span class="number">2- </span>
                    <p>Marque al número 3323435678</p>
                </div>
                <div class="step">
                    <span class="number">3- </span>
                    <p>Uno de nuestros operadores atenderá su llamada para tomar el pedido</p>
                </div>
                <div class="step">
                    <span class="number">4- </span>
                    <p>Proporcione su número de contacto, y en caso de pedir a domicilio, también su dirección</p>
                </div>
                <div class="step">
                    <span class="number">5- </span>
                    <p>Y listo! solo faltará esperar por su pedido</p>
                </div>
            </div>
        </div>
    </div>

    <footer id="contacto">
        <a class="logo-icon flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
            <i class="fa-solid fa-cookie"></i>Kokolatte
        </a>
        <i class="fa-solid fa-phone">3323435467</i>
        <div class="smedia">
            <h2>Siguenos</h2>
            <a href="https://www.facebook.com/Kokolattegdl"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>

        </div>
    </footer>
</body>

</html>
