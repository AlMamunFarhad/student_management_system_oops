<?php 

class Student
{
	private $connection;


	private $table_name = "students";

	public $id;
	public $name;
	public $email;
	public $phone;
	public $created_at;

	public function __construct($db){
		$this->connection = $db;
	}

	  public function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, email, phone) VALUES (:name, :email, :phone)";

        $stmt = $this->connection
->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

        public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->connection
->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email, phone = :phone WHERE id = :id";

        $stmt = $this->connection
->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

     public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->connection
->prepare($query);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}

