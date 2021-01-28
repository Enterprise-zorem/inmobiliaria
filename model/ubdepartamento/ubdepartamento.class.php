<?php

class ubdepartamento
{
    private static $tablename = "ubdepartamento";

    private $con;

    private $idDepa;

    function __construct(Connexion $con)
    {
        $this->con = $con;
    }

    //variables
    public function setpk($name)
    {
        $this->idDepa = $this->con->real_escape_string($name);
    }
    
    //selecteds

    public function getAll()
    {
        $query = "SELECT * FROM " . self::$tablename . " ORDER BY idDepa DESC";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    public function getAllById()
    {
        $query = "SELECT * FROM " . self::$tablename . " WHERE idDepa=$this->idDepa";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    
}