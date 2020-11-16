<?php 

	/**
	 * 
	 */
	class InscripcionDAO {
		 private $pdo;

        public function __construct(){
            include 'connection.php';
            $this->pdo=$pdo;
        }

        public function inscripcion() {
        	$query="SELECT * FROM tbl_categoria";
        	$sentencia=$this->pdo->prepare($query);
        	$sentencia->execute();
        	$ins=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        	return $ins;
        }

        public function insParti(){
        	try {
				$this->pdo->beginTransaction();
	        	$dni=$_POST['dni'];
	        	$nombre=$_POST['nombre'];
	        	$apellido=$_POST['apellido'];
	        	$apellido2=$_POST['apellido2'];
	        	$fecha=$_POST['fecha'];
	        	$genero=$_POST['genero'];
	        	$email=$_POST['correo'];
	        	$cate=$_POST['categoria'];
	        	srand((double)microtime()*1000000);
        		$numeroAlea = rand(1,999);
        		$curdate=date("Y/m/d");
        		// echo $numeroAleatorio;	

        		$query2="INSERT INTO tbl_inscripcion (ins_dorsal,fecha_ins) VALUES (?,?)";
        		$sentencia2=$this->pdo->prepare($query2);
        		$sentencia2->bindParam(1,$numeroAlea);
        		$sentencia2->bindParam(2,$curdate);
        		$sentencia2->execute();

	        	$query="INSERT INTO tbl_participante (DNI_parti,nom_parti,apellido_parti,apellido2_parti,fecha_naix,genero_parti,email_parti,id_categoria,dorsal) VALUES (?,?,?,?,?,?,?,?,?)";
	        	$sentencia=$this->pdo->prepare($query);
	        	$sentencia->bindParam(1,$dni);
	        	$sentencia->bindParam(2,$nombre);
	        	$sentencia->bindParam(3,$apellido);
	        	$sentencia->bindParam(4,$apellido2);
	        	$sentencia->bindParam(5,$fecha);
	        	$sentencia->bindParam(6,$genero);
	        	$sentencia->bindParam(7,$email);
	        	$sentencia->bindParam(8,$cate);
	        	$sentencia->bindParam(9,$numeroAlea);

	        	$sentencia->execute();

	 //    echo "<script>";
		// echo "var contenido = document.getElementById('form')";
  //       echo "var enlace = document.getElementById('ins')";

  //       echo 'if (contenido.style.display=="" || contenido.style.display=="block" ){contenido.style.display="none"';
  //           // enlace.innerHTML="Mostrar Contenido";
  //       echo 'document.getElementById("resultado").innerHTML="Datos Correcto"';
  //           // document.getElementById("form").style.display='none';
  //           // document.getElementById("form").innerHTML='<p>DATOS CORRECTOS</p>';
  //       echo "document.getElementById('result2').innerHTML+='<a class='btn btn-primary' href='../index.php'>Inicio</a>'";
  //       echo "return true}";
  //       echo 'else {contenido.style.display="block";}';
        
  //   	echo "return true";
  //   	echo "</script>";








        		$this->pdo->commit();
				// header('Location: ../view/index.php');			
			} catch (Exception $ex) {
					$this->pdo->rollback();
					echo $ex->getMessage();
			}

        }
	}
?>