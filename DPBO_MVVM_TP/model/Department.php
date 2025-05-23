<?php
require_once 'config/Database.php';

class Department {
    private $conn;
    private $table = 'departments'; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $kode) { 
        $query = "INSERT INTO " . $this->table . " (nama_department, kode_department) VALUES (:name, :kode)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':kode', $kode);
        return $stmt->execute();
    }

    public function update($id, $name, $kode) { 
        $query = "UPDATE " . $this->table . " SET nama_department = :name, kode_department = :kode WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':kode', $kode);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $errors = [];
        
        // Cek apakah department_id masih digunakan di tabel lecturers
        $cekLecturers = "SELECT COUNT(*) as total FROM lecturers WHERE department_id = :id";
        $stmtLecturers = $this->conn->prepare($cekLecturers);
        $stmtLecturers->bindParam(':id', $id);
        $stmtLecturers->execute();
        $lecturersResult = $stmtLecturers->fetch(PDO::FETCH_ASSOC);
        
        if ($lecturersResult['total'] > 0) {
            $errors[] = "{$lecturersResult['total']} dosen";
        }
        
        // Cek apakah department_id masih digunakan di tabel students
        $cekStudents = "SELECT COUNT(*) as total FROM students WHERE department_id = :id";
        $stmtStudents = $this->conn->prepare($cekStudents);
        $stmtStudents->bindParam(':id', $id);
        $stmtStudents->execute();
        $studentsResult = $stmtStudents->fetch(PDO::FETCH_ASSOC);
        
        if ($studentsResult['total'] > 0) {
            $errors[] = "{$studentsResult['total']} mahasiswa";
        }
        
        // Jika ada yang masih menggunakan, buat pesan error yang jelas
        if (!empty($errors)) {
            $errorMessage = "Tidak dapat menghapus department ini karena masih digunakan oleh: " . implode(" dan ", $errors) . ". Silakan pindahkan atau hapus data terkait terlebih dahulu.";
            throw new Exception($errorMessage);
        }
    
        // Jika aman, lanjut hapus
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>