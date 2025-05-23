<?php
require_once 'model/Lecture.php';

class LectureViewModel {
    private $lectureModel;

    public function __construct() {
        $this->lectureModel = new Lecturer();
    }

    public function getLectureList() {
        return $this->lectureModel->getAll();
    }

    public function getLectureById($id) {
        return $this->lectureModel->getById($id);
    }

    public function addLecture($nidn, $nama, $department_id) {
        return $this->lectureModel->create($nidn, $nama, $department_id);
    }

    public function updateLecture($id, $nidn, $nama, $department_id) {
        return $this->lectureModel->update($id, $nidn, $nama, $department_id);
    }

    public function deleteLecture($id) {
        return $this->lectureModel->delete($id);
    }
}
?>
