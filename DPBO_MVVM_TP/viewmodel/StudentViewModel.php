<?php
require_once 'model/Student.php';
require_once 'model/Department.php';

class StudentViewModel {
    private $studentModel;
    private $departmentModel;

    public function __construct() {
        $this->studentModel = new Student();
        $this->departmentModel = new Department();
    }

    public function getStudentList() {
        return $this->studentModel->getAll();
    }

    public function getStudentById($id) {
        return $this->studentModel->getById($id);
    }

    public function getDepartmentOptions() {
        return $this->departmentModel->getAll();
    }

    public function addStudent($nim, $nama, $kelas, $department_id) {
        return $this->studentModel->create($nim, $nama, $kelas, $department_id);
    }

    public function updateStudent($id, $nim, $nama, $kelas, $department_id) {
        return $this->studentModel->update($id, $nim, $nama, $kelas, $department_id);
    }

    public function deleteStudent($id) {
        return $this->studentModel->delete($id);
    }
}
?>
