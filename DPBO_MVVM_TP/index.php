<?php
require_once 'viewmodel/DepartmentViewModel.php';
require_once 'viewmodel/LectureViewModel.php';
require_once 'viewmodel/StudentViewModel.php';

$entity = $_GET['entity'] ?? 'department';
$action = $_GET['action'] ?? 'list';

if ($entity == 'department') {
    $viewModel = new DepartmentViewModel();
    
    if ($action == 'list') {
        $departmentList = $viewModel->getDepartmentList();
        require_once 'views/department_list.php';
    } 
    elseif ($action == 'add') {
        require_once 'views/department_form.php';
    } 
    elseif ($action == 'edit') {
        $department = $viewModel->getDepartmentById($_GET['id']);
        require_once 'views/department_form.php';
    } 
    elseif ($action == 'save') {
        $viewModel->addDepartment($_POST['name'], $_POST['kode']);
        header('Location: index.php?entity=department&action=list');
        exit();
    } 
    elseif ($action == 'update') {
        $viewModel->updateDepartment($_GET['id'], $_POST['name'], $_POST['kode']);
        header('Location: index.php?entity=department&action=list');
        exit();
    } 
    elseif ($action == 'delete') {
        try {
            $viewModel->deleteDepartment($_GET['id']);
            header('Location: index.php?entity=department&action=list');
            exit();
        } catch (PDOException | Exception $e) {
            $errorMessage = urlencode($e->getMessage());
            header("Location: index.php?entity=department&action=list&error=$errorMessage");
            exit();
        }
        
    }
    
    else {
        // Default fallback
        header('Location: index.php?entity=department&action=list');
        exit();
    }
}

else if ($entity == 'lecture') {
    $viewModel = new LectureViewModel();

    if ($action == 'list') {
        $lectureList = $viewModel->getLectureList();
        require_once 'views/lecture_list.php';
    } 
    elseif ($action == 'add') {
        require_once 'views/lecture_form.php';
    } 
    elseif ($action == 'edit') {
        $lecture = $viewModel->getLectureById($_GET['id']);
        require_once 'views/lecture_form.php';
    } 
    elseif ($action == 'save') {
        $viewModel->addLecture($_POST['nidn'], $_POST['nama'], $_POST['department_id']);
        header('Location: index.php?entity=lecture&action=list');
        exit();
    } 
    elseif ($action == 'update') {
        $viewModel->updateLecture($_GET['id'], $_POST['nidn'], $_POST['nama'], $_POST['department_id']);
        header('Location: index.php?entity=lecture&action=list');
        exit();
    } 
    elseif ($action == 'delete') {
        $viewModel->deleteLecture($_GET['id']);
        header('Location: index.php?entity=lecture&action=list');
        exit();
    } 
    else {
        header('Location: index.php?entity=lecture&action=list');
        exit();
    }
}

else if($entity == 'student') {
    require_once 'viewmodel/StudentViewModel.php';
    $viewModel = new StudentViewModel();

    if ($action == 'list') {
        $studentList = $viewModel->getStudentList();
        require_once 'views/student_list.php';
    } 
    elseif ($action == 'add') {
        require_once 'views/student_form.php';
    } 
    elseif ($action == 'edit') {
        $student = $viewModel->getStudentById($_GET['id']);
        require_once 'views/student_form.php';
    } 
    elseif ($action == 'save') {
        $viewModel->addStudent($_POST['nim'], $_POST['nama'], $_POST['kelas'], $_POST['department_id']);
        header('Location: index.php?entity=student&action=list');
        exit();
    } 
    elseif ($action == 'update') {
        $viewModel->updateStudent($_GET['id'], $_POST['nim'], $_POST['nama'], $_POST['kelas'], $_POST['department_id']);
        header('Location: index.php?entity=student&action=list');
        exit();
    } 
    elseif ($action == 'delete') {
        $viewModel->deleteStudent($_GET['id']);
        header('Location: index.php?entity=student&action=list');
        exit();
    } 
    else {
        header('Location: index.php?entity=student&action=list');
        exit();
    }
}



?>