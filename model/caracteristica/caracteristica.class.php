<?php

class caracteristica
{
    private static $tablename = "caracteristica";

    private $con;

    private $pk_caracteristica;
    private $name;
    private $tipo;
    private $fk_tipo;
    private $fk_interes;
    private $created_at;
    private $updated_at;


    function __construct(Connexion $con)
    {
        $this->con = $con;
    }

    //variables
    public function setpk($name)
    {
        $this->pk_caracteristica = $this->con->real_escape_string($name);
    }
    public function setname($name)
    {
        $this->name = $this->con->real_escape_string($name);
    }
    public function settipo($name)
    {
        $this->tipo = $this->con->real_escape_string($name);
    }
    public function setfk_tipo($name)
    {
        $this->fk_tipo = $this->con->real_escape_string($name);
    }
    public function setfk_interes($name)
    {
        $this->fk_interes = $this->con->real_escape_string($name);
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
        $query = "SELECT * FROM " . self::$tablename . " ORDER BY pk_caracteristica DESC";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    public function getAllById()
    {
        $query = "SELECT * FROM " . self::$tablename . " WHERE pk_caracteristica=$this->pk_caracteristica";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    public function getAllByFk_Interes()
    {
        $query = "SELECT * FROM " . self::$tablename . " WHERE fk_interes=$this->fk_interes";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
  
    //FUNCIONES
    public function insert()
    {

        $query = "INSERT INTO " . self::$tablename . " ( `name`,`tipo`,`fk_tipo`,`fk_interes`, `created_at`, `updated_at`)";

        $query .= " VALUES ('$this->name','$this->tipo','$this->fk_tipo','$this->fk_interes','$this->created_at','$this->updated_at')";

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
       
        $query = "UPDATE " . self::$tablename . "  SET `name`='$this->name',`tipo`='$this->tipo',`fk_tipo`='$this->fk_tipo',`fk_interes`='$this->fk_interes',`updated_at`='$this->updated_at'";
        

        $query .= " WHERE pk_caracteristica='$this->pk_caracteristica'";
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
        $query = "DELETE FROM " . self::$tablename . " WHERE pk_caracteristica=$this->pk_caracteristica";
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