<?php

class User
{
    private $id = null;
    private $name = null;
    private $email = null;
    private $password = null;
    private $role_id = null;
    private $company_name = null;
    private $created_at = null;
    private $updated_at = null;
    private $role = null;

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
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['password'])) {
            $this->password = $data['password'];
        }
        if (isset($data['role_id'])) {
            $this->role_id = (int) $data['role_id'];
        }
        if (isset($data['company_name'])) {
            $this->company_name = $data['company_name'];
        }
        if (isset($data['created_at'])) {
            $this->created_at = $data['created_at'];
        }
        if (isset($data['updated_at'])) {
            $this->updated_at = $data['updated_at'];
        }
    }

    public static function create($data)
    {
        $db = Database::getInstance();
        
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (name, email, password, role_id, company_name) 
                VALUES (:name, :email, :password, :role_id, :company_name)";
        
        $stmt = $db->prepare($sql);
        
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $hashedPassword,
            'role_id' => $data['role_id'],
            'company_name' => $data['company_name'] ?? null
        ]);
    }

    public static function authenticate($email, $password)
    {
        $user = self::findByEmail($email);
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        
        return false;
    }

    public static function findById($id)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        $data = $stmt->fetch();
        
        return $data ? new self($data) : false;
    }

    public static function findByEmail($email)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        
        $data = $stmt->fetch();
        
        return $data ? new self($data) : false;
    }

    public function hasRole($roleName)
    {
        $role = $this->getRole();
        return $role && $role->getName() === $roleName;
    }

    public function getRole()
    {
        if ($this->role === null && $this->role_id !== null) {
            $this->role = Role::findById($this->role_id);
        }
        
        return $this->role;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRoleId()
    {
        return $this->role_id;
    }

    public function getCompanyName()
    {
        return $this->company_name;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}