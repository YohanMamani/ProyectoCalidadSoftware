<!DOCTYPE html>
<head>

	<title> INTRANET JG </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" type="text/css" href="/css/estilos-propios.css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/custom-themes.css">
        
        
	<link rel="icon" type="image/png" href="/img/cetpro.png"/>

	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/iconic/css/material-design-iconic-font.min.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	
	
	
	

</head>
<body>
	
	<div class="limiter">

		<div class="container-login100" style="background-image: url(/img/bg-01.jpg)">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-60 p-b-45"> 
				<header> </header>
				
				
				
				<form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
				@csrf
					<span class="login100-form-title p-b-49" style="background-image: url(/img/cetpro.png)">
						<br><br><br><br>
					</span>
                    
                    
                    @if(session()->has('msj'))
				
                    <div class="alert alert-danger" role="alert">{{ session('msj') }} </div>
                    <br>
                    @else


                    @endif

                    
					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100"> Correo electronico: </span>
						<input class="input100" type="email" name="email" value="{{ old('email') }}"  placeholder="Escribe tu correo"  required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input" >
						<span class="label-input100"> Contraseña: </span>
						<input class="input100" type="password" name="password" placeholder="Escribe tu contraseña" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Olvidaste tu contraseña?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Ingresar
							</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
    
</body>

</html>