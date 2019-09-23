<?php

/*function conectarBD(){

  $host="localhost";
  $port="5432";
  $dbname="infracciones";
  $user="postgres";
  $password="3142927266";

  $conexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
  $bd = pg_connect($conexion);

  if(!$bd){

    echo "Error: ".pg_last_error;

  }
  else{

    echo "<h3>Conexion exitosa PHP - PostgreSQL</h3><hr>";

    return $bd;
  }

}*/



class ConexionPGSQL{
  //declaración de variables
  public $host; // para conectarnos a localhost o el ip del servidor de postgres
  public $db; // seleccionar la base de datos que vamos a utilizar
  public $user; // seleccionar el usuario con el que nos vamos a conectar
  public $pass; // la clave del usuario
  public $conexion;  //donde se guardara la conexión
  public $url; //dirección de la conexión que se usara para destruirla mas adelante
  //creación del constructor
  function __construct(){
  }
  //creación de la función para cargar los valores de la conexión.
  public function cargarValores(){
          $this->host='localhost';
          $this->db='infracciones';
          $this->user='postgres';
          $this->pass='3142927266';
          $this->conexion="host='$this->host' dbname='$this->db' user='$this->user' password='$this->pass' ";
          }
          //función que se utilizara al momento de hacer la instancia de la clase
          function conectar(){
                  $this->cargarValores();
                  $this->url=pg_connect($this->conexion);
                  return true;
          }


function consultas($sql){

       $resultados = pg_query($sql);
       return $resultados;
}
function getOptions($param){
  $query = "select distinct ".$param." from infracciones order by ".$param;
  $resultado = pg_query($query);
  return $resultado;
}
function getCountViolationType($param){
  $query = "select count(*)  from infracciones where violationtype = '".$param."'";
  $countParam = pg_query($query);
  $countParam = pg_fetch_row($countParam);
  return $countParam[0];
}
function getCountParameterType($campo, $valor, $violationType){
  $query = "select count(*)  from infracciones i where i.".$campo." = '$valor' and i.violationtype = '".$violationType."'";
  $countParam = pg_query($query); 
  $countParam = pg_fetch_row($countParam);
  return $countParam[0];
}
function getCountInfractions(){
  $query = "select count(*)  from infracciones";
  $countParam = pg_query($query); 
  $countParam = pg_fetch_row($countParam);
  return $countParam[0];
}
//función para destruir la conexión.
function destruir(){
    pg_close($this->url);
}


}

?>

