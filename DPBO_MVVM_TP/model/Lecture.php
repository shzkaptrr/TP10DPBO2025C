<?php
require_once 'config/Database.php';

class Lecturer {
    private $conn;
    private $table = 'lecturers';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT l.*, d.nama_department as department_name 
                  FROM " . $this->table . " l
                  LEFT JOIN departments d ON l.department_id = d.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT l.*, d.nama_department as department_name 
                  FROM " . $this->table . " l
                  LEFT JOIN departments d ON l.department_id = d.id
                  WHERE l.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nidn, $nama, $department_id) {
        $query = "INSERT INTO " . $this->table . " (nidn, nama, department_id) VALUES (:nidn, :nama, :department_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nidn', $nidn);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':department_id', $department_id);
        return $stmt->execute();
    }

    public function update($id, $nidn, $nama, $department_id) {
        $query = "UPDATE " . $this->table . " 
                  SET nidn = :nidn, nama = :nama, department_id = :department_id 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nidn', $nidn);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getByDepartment($department_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE department_id = :department_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>