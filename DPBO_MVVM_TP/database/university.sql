CREATE DATABASE library;
USE library;


CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_department VARCHAR(10) UNIQUE NOT NULL,
    nama_department VARCHAR(100) NOT NULL
);


CREATE TABLE lecturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nidn VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    department_id INT NOT NULL,
    FOREIGN KEY (department_id) REFERENCES departments(id)
);


CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    department_id INT NOT NULL,
    FOREIGN KEY (department_id) REFERENCES departments(id)
);