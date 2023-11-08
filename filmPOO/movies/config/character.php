<?php
class Character extends Database
{
    protected $id;
    protected $created;
    protected $modified;
    protected $name;
    protected $movie_id;

    public function __construct($characters)
    {
        parent::__construct();
        if (is_array($characters)) {
            $this->hydrate($characters);
        } else {
            $i = (int) $characters;
            $req = $this->prepare("SELECT * FROM characters WHERE id = :id");
            $req->execute([
                ":id" => $i
            ]);
            if ($req->rowCount() > 0) {
                $d = $req->fetch(PDO::FETCH_ASSOC);
                $this->hydrate($d);
            }
        }
    }

    public function setId($n)
    {
        if ((int)$n > 0)
            $this->id = (int)$n;
    }
    public function setCreated($n)
    {
        if (!empty($n))
            $this->created = new DateTime($n);
    }
    public function setModified($n)
    {
        if (!empty($n))
            $this->modified = new DateTime($n);
    }
    public function setName($n)
    {
        $n = trim($n);
        if (!empty($n))
            $this->name = ucfirst(strtolower($n));
    }
    public function setMovie_id($n)
    {
        if (!empty($n))
            $this->movie_id = (int) $n;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getCreated()
    {
        return $this->created->format("d/m/Y h:i:s");
    }
    public function getModified()
    {
        return $this->modified->format("d/m/Y h:i:s");
    }
    public function getName()
    {
        return $this->name;
    }
    public function getMovie_id()
    {
        return $this->movie_id;
    }
    public  function getMovie()
    {
        if (!empty($this->movie_id))
            return new Movie($this->movie_id);
        else
            return null;
    }



    public static function all()
    {
        $db = new Database;
        $req = $db->prepare("SELECT * FROM characters");
        $req->execute();
        $tabResult = [];
        $r = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($r as $value) {
            $tabResult[] = new Character($value);
        }
        return $tabResult;
    }
    public static function allCondition($movie_id)
    {
        $db = new Database;
        $req = $db->prepare("SELECT * FROM characters WHERE movie_id = :id");
        $req->execute([":id" => $movie_id]);
        $tabResult = [];
        $r = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($r as $value) {
            $tabResult[] = new Character($value);
        }
        return $tabResult;
    }

    public function isValid()
    {
        $isValid = true;
        if (empty($this->name)) {
            $isValid = false;
            flash_in("danger", "Le nom est obligatoire");
        }
        if (strlen($this->name) > 150) {
            $isValid = false;
            flash_in("danger", "Le nom doit être inférieur à 50 caractères");
        }

        return $isValid;
    }


    public function save()
    {
        $param = [
            ":t" => $this->getName(),
            ":g" => $this->getMovie_id(),
        ];
        if (empty($this->id)) {
            $req = $this->prepare("INSERT INTO characters (name, movie_id) VALUES (:t, :g)");
        } else {
            $req = $this->prepare("UPDATE characters SET name = :t, movie_id = :g WHERE id = :id");
            $param[":id"] = $this->getId();
        }
        $req->execute($param);
    }

    public function delete()
    {
        $req = $this->prepare("DELETE FROM characters WHERE id = :id");
        $req->execute(["id" => $this->getId()]);
        return true;
    }
}