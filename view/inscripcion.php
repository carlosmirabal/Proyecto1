<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style2.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/code.js"></script>
	<title>Inscripción</title>
</head>
<header>
	    <div class="view intro-2 " style="">
            <nav class="navbar  navbar-expand-lg ">
        <a class="navbar-brand" href="#"><strong>Cursa Bellvitge</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clasificación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscripcion.php">Inscripción</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Galeria</a>
                </li>
            </ul>
<!--             <div class="btn-group">
			  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Idiomas
			  </button>
			  <div class="dropdown-menu dropdown-menu-left">
			    <button class="dropdown-item" type="button">Español</button>
			    <button class="dropdown-item" type="button">Inglés</button>
			  </div>
			</div> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle idiomas" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Idiomas
                </a>
                <div class="dropdown-menu dropdown-menu-left">
                    <a class="dropdown-item" href="#">Español</a>
                    <a class="dropdown-item" href="#">Inglés</a>
                </div>
            </li>
            
        </div>
    </nav>
    		<?php 
			  	include '../model/connection.php';
			  	include '../model/inscripcionDAO.php';

			  	$ins=new InscripcionDAO;
			  	$insDAO=$ins->inscripcion();

			  	if (isset($_POST['ins'])) {
			  		$parti=$ins->insParti();
			  	}
			 ?>
			 <!-- return validacionForm() && validarDNI()" -->
			 <!-- onsubmit="return validarForm() && validarDNI()" -->
        <div class="full-bg-img d-flex justify-content-center">
        	<form id="form" class="w-50 p-3" method="POST" >
			  <div class="form-row ">
			    <div class="form-group col-md-6">
			      <label for="inputEmail4">DNI</label>
			      <input type="text" class="form-control" id="dni" placeholder="DNI" name="dni">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputPassword4">Nombre</label>
			      <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
			    </div>
			  </div>
			  <div class="form-row">
				  <div class="form-group col-md-6">
				    <label for="inputAddress">Apellido</label>
				    <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido">
				  </div>
				  <div class="form-group col-md-6">
				    <label for="inputAddress2">Segundo Apellido</label>
				    <input type="text" class="form-control" id="apellido2" placeholder="Segundo Apellido" name="apellido2">
				  </div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputCity">Fecha Nacimiento</label>
			      <input type="date" class="form-control" id="fecha" name="fecha">
			      <p id="nac"></p>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="inputCity">Correo</label>
			      <input type="email" class="form-control" id="email" name="correo" placeholder="Correo">
			    </div>
			  </div>
			    <div class="form-group">
			      <label for="inputState">Genero</label>
			      <select id="inputState" class="form-control" name="genero" id="genero">
			        <option selected> Elige un genero</option>
			        <option>Hombre</option>
			        <option>Mujer</option>
			      </select>
			    </div>


			  <div class="form-group">
				  <!-- <label for="inputPassword4">Categoria</label> -->
				  
			      <!-- <select id="inputState" class="form-control" name="categoria" id="cate">
			        <option selected> Elige una categoria</option> -->
			      <?php 
			      	// foreach ($insDAO as $inscrip) {
			      	// 	echo '<option value="'.$inscrip["id_categoria"].'">'.$inscrip["nom_categoria"].'</label>';
			      	// }
			      ?>
<!-- 			        <option>Infantil</option>
			        <option>Junior</option>
			        <option>Senior</option>
			        <option>Veterenado</option>
			        <option>Discapacitado</option> -->
			      <!-- </select> -->
			  </div>
			  <p id="message"></p>
			  <p id="message2"></p>
			  <button id="ins" type="submit" class="btn btn-primary" name="ins">Enviar</button>
			</form>
			<h1 id="resultado"></h1><br>
			<h1 id="result2"></h1>
        </div>
    </div>  
</header>
<body>

</body>
</html>