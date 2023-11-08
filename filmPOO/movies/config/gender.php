<?php

class Gender extends Database {
    protected $id;
    protected $created;
    protected $modified;
    protected $name;


    //Contructeurs + accesseurs
    public function __construct($gender)
    {
        parent::__construct();
        if (is_array($gender)) {
            $this->hydrate($gender);
        } else {
            $i = (int) $gender;
            $req = $this->prepare("SELECT * FROM genres WHERE id=:id");
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
        if ((int) $n > 0)
            $this->id = (int) $n;
    }
    public function setCreated($n)
    {
        if (!empty($n))
            $this->created = new DateTime($n);
    }

    /**
     * @throws Exception
     */
    public function setModified($n)
    {
        if (!empty($n))
            $this->modified = new DateTime($n);
    }
    public function setName($n)
    {
        $n = trim($n);
        if (!empty($n))
            $this->name = (string) $n;
    }

    public function getId(){
        return $this->id;
    }
    public function getCreated(){
        return $this->created->format('d/m/Y h:i:s');
    }
    public function getModified(){
        return $this->modified->format('d/m/Y h:i:s');
    }
    public function getName(){
        return $this->name;
    }
    public function isValidGender() {
        $valid = true;
        if (empty($this->name)) {
            $valid = false;
            flash_in("danger", "Le nom du genre est obligatoire");
        }
        elseif (strlen($this->name) > 50 ) {
            $valid = false;
            flash_in("danger", "Le nom du genre doit être inférieur à 50 caractères");
        }
        return $valid;
    }

    public function saveGender() {
        $param = [':n' => $this->name];
        if (empty($this->id)) {
            $req = $this->prepare('INSERT INTO genres (name) VALUES (:n)');
        }
        else {
            $req = $this->prepare('UPDATE genres SET name = :n WHERE id = :id');
            $param[':id'] = $this->id;
        }
        $req->execute($param);
    }

    public static function all() {
        $db = new Database();
        $req = $db->prepare('SELECT * FROM genres');
        $req->execute();
        $r = $req->fetchAll(PDO::FETCH_ASSOC);
        $tabResult = [];
        foreach ($r as $value) {
            $tabResult[] = new Gender($value);
        }
        return $tabResult;
    }

    public function delete()
    {
        $req = $this->prepare("DELETE FROM genres WHERE id = :id");
        $req->execute(["id" => $this->getId()]);
        return true;
    }
}