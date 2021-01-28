<?php

class ubdistrito
{
    private static $tablename = "ubdistrito";

    private $con;

    private $idDist;
    private $idProv;

    function __construct(Connexion $con)
    {
        $this->con = $con;
    }

    //variables
    public function setpk($name)
    {
        $this->idDist = $this->con->real_escape_string($name);
    }
    public function setfk_provincia($name)
    {
        $this->idProv = $this->con->real_escape_string($name);
    }
    
    //selecteds

    public function getAll()
    {
        $query = "SELECT * FROM " . self::$tablename . " ORDER BY idDist DESC";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    public function getAllById()
    {
        $query = "SELECT * FROM " . self::$tablename . " WHERE idDist=$this->idDist";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    public function getAllByFk_Provincia()
    {
        $query = "SELECT * FROM " . self::$tablename . " WHERE idProv=$this->idProv";
        $res = $this->con->query($query);
        mysqli_close($this->con);
        return $res;
    }
    
}