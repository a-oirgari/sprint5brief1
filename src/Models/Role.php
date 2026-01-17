<?php

class Role
{
    private $id = null;
    private $name = null;
    private $created_at = null;

    public function __construct($data = [])
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    private function hydrate($data)
    {
        if (isset($data['id'])) {
            $this->id = (int) $data['id'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['created_at'])) {
            $this->created_at = $data['created_at'];
        }
    }

    public static function findById($id)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM roles WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        $data = $stmt->fetch();
        
        return $data ? new self($data) : false;
    }

    public static function findByName($name)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM roles WHERE name = :name");
        $stmt->execute(['name' => $name]);
        
        $data = $stmt->fetch();
        
        return $data ? new self($data) : false;
    }

    public static function getAllRoles()
    {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM roles ORDER BY name");
        
        $roles = [];
        while ($data = $stmt->fetch()) {
            $roles[] = new self($data);
        }
        
        return $roles;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }
}