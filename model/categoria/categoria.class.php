<?php

class categoria
{
    private static $tablename = "categoria";

    private $con;

    private $pk_categoria;
    private $name;
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
        $this->pk_categoria = $this->con->real_escape_string($name);
    }
    public function setname($name)
    {
        $this->name = $this->con->real_escape_string($name);
    }
    public function setfk_tipo($name)
    {
        $this->fk_tipo = $this->con->real_escape_string($name);
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
        $query = "SELECT * FROM " . self::$tablename . " ORDER BY pk_categoria DESC";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    public function getAllById()
    {
        $query = "SELECT * FROM " . self::$tablename . " WHERE pk_categoria=$this->pk_categoria";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
  
    //FUNCIONES
    public function insert()
    {

        $query = "INSERT INTO " . self::$tablename . " ( `name`,`fk_tipo`, `created_at`, `updated_at`)";

        $query .= " VALUES ('$this->name','$this->fk_tipo','$this->created_at','$this->updated_at')";

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
       
        $query = "UPDATE " . self::$tablename . "  SET `name`='$this->name',`fk_tipo`='$this->fk_tipo',`updated_at`='$this->updated_at'";
        

        $query .= " WHERE pk_categoria='$this->pk_categoria'";
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
        $query = "DELETE FROM " . self::$tablename . " WHERE pk_categoria=$this->pk_categoria";
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