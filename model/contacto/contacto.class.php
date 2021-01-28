<?php

class contacto
{
    private static $tablename = "contacto";

    private $con;

    private $pk_contacto;
    private $nombres;
    private $apellidos;
    private $identificacion;
    private $tipo_identificacion;
    private $tipo_contacto;
    private $telefonos;
    private $correos;
    
    private $direcciones;
    private $fk_tipo_contacto;
    private $estado_civil;
    private $parent;

    private $created_at;
    private $updated_at;

    private $fk_tipo;



    function __construct(Connexion $con)
    {
        $this->con = $con;
    }

    //variables
    public function setpk($name)
    {
        $this->pk_contacto = $this->con->real_escape_string($name);
    }
    public function setnombres($name)
    {
        $this->nombres = $this->con->real_escape_string($name);
    }
    public function setapellidos($name)
    {
        $this->apellidos = $this->con->real_escape_string($name);
    }
    public function setidentificacion($name)
    {
        $this->identificacion = $this->con->real_escape_string($name);
    }
    public function settipo_identificacion($name)
    {
        $this->tipo_identificacion = $this->con->real_escape_string($name);
    }
    public function settipo_contacto($name)
    {
        $this->tipo_contacto = $this->con->real_escape_string($name);
    }
    public function settelefonos($name)
    {
        $this->telefonos = $this->con->real_escape_string($name);
    }
    public function setcorreos($name)
    {
        $this->correos = $this->con->real_escape_string($name);
    }
    public function setdirecciones($name)
    {
        $this->direcciones = $this->con->real_escape_string($name);
    }
    public function setfk_tipo_contacto($name)
    {
        $this->fk_tipo_contacto = $this->con->real_escape_string($name);
    }
    public function setestado_civil($name)
    {
        $this->estado_civil = $this->con->real_escape_string($name);
    }
    public function setparent($name)
    {
        $this->parent = $this->con->real_escape_string($name);
    }
    public function setcreated_at($name)
    {
        $this->created_at = $this->con->real_escape_string($name);
    }
    public function setupdated_at($name)
    {
        $this->updated_at = $this->con->real_escape_string($name);
    }
    
    
    //selecteds

    public function getAll()
    {
        $query = "SELECT * FROM " . self::$tablename . " ORDER BY pk_contacto DESC";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    public function getAllById()
    {
        $query = "SELECT * FROM " . self::$tablename . " WHERE pk_contacto=$this->pk_contacto";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
  
    //FUNCIONES
    public function insert()
    {

        $query = "INSERT INTO " . self::$tablename . " ( `nombres`,`apellidos`,`identificacion`,`tipo_identificacion`,`tipo_contacto`,`telefonos`,`correos`,`direcciones`,`fk_tipo_contacto`,`estado_civil`,`parent`,`created_at`, `updated_at`)";

        $query .= " VALUES ('$this->nombres','$this->apellidos','$this->identificacion','$this->tipo_identificacion','$this->tipo_contacto','$this->telefonos','$this->correos','$this->direcciones','$this->fk_tipo_contacto','$this->estado_civil','$this->parent','$this->created_at','$this->updated_at')";

        $this->con->query($query);

        if (mysqli_error($this->con)) {
            $result = mysqli_error($this->con);
            mysqli_close($this->con);
            return $result;
        } else {
            mysqli_close($this->con);
            return "defaultValue";
        }
    }
    
    public function update()
    {
       
        $query = "UPDATE " . self::$tablename . "  SET `nombres`='$this->nombres',`apellidos`='$this->apellidos',`updated_at`='$this->updated_at'";
        

        $query .= " WHERE pk_contacto='$this->pk_contacto'";
        $this->con->query($query);

        if (mysqli_error($this->con)) {
            $result = mysqli_error($this->con);
            mysqli_close($this->con);
            return $result;
        } else {
            mysqli_close($this->con);
            return "defaultValue";
        }
    }
   
    public function delete()
    {
        $query = "DELETE FROM " . self::$tablename . " WHERE pk_contacto=$this->pk_contacto";
        $this->con->query($query);

        if (mysqli_error($this->con)) {
            $result = mysqli_error($this->con);
            mysqli_close($this->con);
            return $result;
        } else {
            mysqli_close($this->con);
            return "defaultValue";
        }
    }
}