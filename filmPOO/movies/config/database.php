<?php
//session_start();
define("SQL_HOST", "localhost");
define("SQL_USER", "root");
define("SQL_PASS", "root");
define("SQL_DBNAME", "movies");
class Database extends PDO
{
    protected $connect = false;

    public function __construct()
    {
        if (!$this->connect) {
            try {
                parent::__construct("mysql:dbname=" . SQL_DBNAME . ";charset=utf8;host=" . SQL_HOST, SQL_USER, SQL_PASS);
                $this->connect = true;
            } catch (Exception $e) {
                die('Erreur :' . $e->getMessage());
            };
        }
    }

    public function hydrate($a)
    {
        foreach ($a as $key => $value) {
            $m = 'set' . ucfirst($key);
            if (method_exists($this, $m))
                $this->$m($value);
        }
    }
}