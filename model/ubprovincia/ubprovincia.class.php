<?php

class ubprovincia
{
    private static $tablename = "ubprovincia";

    private $con;

    private $idProv;
    private $idDepa;


    function __construct(Connexion $con)
    {
        $this->con = $con;
    }

    //variables
    public function setpk($name)
    {
        $this->idProv = $this->con->real_escape_string($name);
    }
    public function setfk_departamento($name)
    {
        $this->idDepa = $this->con->real_escape_string($name);
    }
    
    
    //selecteds

    public function getAll()
    {
        $query = "SELECT * FROM " . self::$tablename . " ORDER BY idProv DESC";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    public function getAllById()
    {
        $query = "SELECT * FROM " . self::$tablename . " WHERE idProv=$this->idProv";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    public function getAllByDepartamento()
    {
        $query = "SELECT * FROM " . self::$tablename . " WHERE idDepa=$this->idDepa";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    
}