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
	        	// $cate=$_POST['categoria'];
	        	srand((double)microtime()*1000000);
				$numeroAlea = rand(1,999);
				$curdate=date("Y/m/d");
				$fecha_nacimiento = new DateTime($fecha);
				$hoy = new DateTime();
				$edad = date_diff($hoy, $fecha_nacimiento);
				$edad2= $edad->y;

        		$query2="INSERT INTO tbl_inscripcion (ins_dorsal,fecha_ins) VALUES (?,?)";
        		$sentencia2=$this->pdo->prepare($query2);
        		$sentencia2->bindParam(1,$numeroAlea);
        		$sentencia2->bindParam(2,$curdate);
				$sentencia2->execute();
				
				if ($edad2 >= 8 && $edad2 <= 12) {
					$cate=1;
				} else if ($edad2 >= 13 && $edad2 <= 17) {
					$cate=2;
				} else if ($edad2 >= 18 && $edad2 <= 35) {
					$cate=3;
				} else if ($edad2 >= 36 ) {
					$cate=4;
				}

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
				
        		$this->pdo->commit();
				// header('Location: ../view/index.php');			
			} catch (Exception $ex) {
					$this->pdo->rollback();
					echo $ex->getMessage();
			}

        }
	}
?>