<?php
require_once 'config/Database.php';

class Student {
    private $conn;
    private $table = 'students';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT s.*, d.nama_department as department_name, d.kode_department as department_code
                  FROM " . $this->table . " s
                  LEFT JOIN departments d ON s.department_id = d.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT s.*, d.nama_department as department_name, d.kode_department as department_code
                  FROM " . $this->table . " s
                  LEFT JOIN departments d ON s.department_id = d.id
                  WHERE s.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nim, $nama, $kelas, $department_id) {
        $query = "INSERT INTO " . $this->table . " (nim, nama, kelas, department_id) 
                  VALUES (:nim, :nama, :kelas, :department_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kelas', $kelas);
        $stmt->bindParam(':department_id', $department_id);
        return $stmt->execute();
    }

    public function update($id, $nim, $nama, $kelas, $department_id) {
        $query = "UPDATE " . $this->table . " 
                  SET nim = :nim, nama = :nama, kelas = :kelas, department_id = :department_id
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kelas', $kelas);
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
        $query = "SELECT s.*, d.nama_department as department_name
                  FROM " . $this->table . " s
                  LEFT JOIN departments d ON s.department_id = d.id
                  WHERE s.department_id = :department_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByClass($kelas) {
        $query = "SELECT s.*, d.nama_department as department_name
                  FROM " . $this->table . " s
                  LEFT JOIN departments d ON s.department_id = d.id
                  WHERE s.kelas = :kelas";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kelas', $kelas);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>