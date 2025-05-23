# TP10DPBO2025C1

---

# Janji
Saya Shizuka Maulia Putri dengan NIM 2308744 mengerjakan Tugas Praktikum Latihan 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

# University Management System - MVVM Implementation

## MVVM (Model-View-ViewModel)
MVVM adalah pola arsitektur yang memisahkan logika bisnis (Model), tampilan antarmuka (View), dan perantara antara keduanya (ViewModel). Dalam implementasi ini:

1. **Model**: 
   - `Department.php`, `Lecturer.php`, `Student.php`
   - Bertanggung jawab untuk interaksi dengan database dan logika bisnis dasar

2. **View**: 
   - File-file di folder `views` (form dan list untuk setiap entitas)
   - Hanya menangani tampilan dan menerima input user

3. **ViewModel**: 
   - `DepartmentViewModel.php`, `LectureViewModel.php`, `StudentViewModel.php`
   - Menghubungkan Model dan View, menyediakan data yang sudah diproses untuk View

## Deskripsi Website
Website ini adalah **Sistem Manajemen Universitas** yang memungkinkan administrator untuk:
- Mengelola data departemen/department
- Mengelola data dosen/lecturer
- Mengelola data mahasiswa/student

Dibangun dengan:
- PHP native dengan pola MVVM
- MySQL sebagai database
- Tailwind CSS untuk styling
- Font Awesome untuk ikon

## Fitur yang Tersedia
### 1. Manajemen Department
- Tambah department baru
- Edit informasi department
- Hapus department (dengan validasi relasi)
- Lihat daftar department

### 2. Manajemen Lecturer
- Tambah data dosen baru
- Edit informasi dosen
- Hapus data dosen
- Lihat daftar dosen dengan departemen terkait

### 3. Manajemen Student
- Tambah data mahasiswa baru
- Edit informasi mahasiswa
- Hapus data mahasiswa
- Lihat daftar mahasiswa dengan departemen dan kelas

## Alur Kerja Setiap Fitur

### 1. Department Management
1. **Tambah Department**:
   - User mengisi form (nama dan kode department)
   - ViewModel memvalidasi dan mengirim ke Model
   - Model menyimpan ke database
   - Redirect ke list department

2. **Edit Department**:
   - User memilih department untuk diedit
   - ViewModel mengambil data dari Model
   - Form diisi dengan data yang ada
   - Perubahan disimpan melalui ViewModel ke Model

3. **Hapus Department**:
   - Sistem mengecek relasi dengan lecturer/student
   - Jika ada relasi, tampilkan error
   - Jika tidak ada relasi, hapus dari database

### 2. Lecturer Management
1. **Tambah Lecturer**:
   - User mengisi form (NIDN, nama, department)
   - ViewModel memvalidasi dan menyimpan via Model
   - Data disimpan dengan relasi ke department

2. **Edit Lecturer**:
   - Data dosen diambil dari database
   - Form diisi dengan data yang ada
   - Perubahan disimpan dengan validasi

3. **Hapus Lecturer**:
   - Data dosen dihapus langsung tanpa validasi relasi
   - Redirect ke list lecturer

### 3. Student Management
1. **Tambah Student**:
   - User mengisi form (NIM, nama, kelas, department)
   - ViewModel memvalidasi dan menyimpan via Model
   - Data disimpan dengan relasi ke department

2. **Edit Student**:
   - Data mahasiswa diambil dari database
   - Form diisi dengan data yang ada
   - Perubahan disimpan dengan validasi

3. **Hapus Student**:
   - Data mahasiswa dihapus langsung
   - Redirect ke list student

## Struktur Database
![image](https://github.com/user-attachments/assets/65912e50-2a68-49c7-8ceb-9ffc6c529bc6)

Terdapat 3 tabel utama dengan relasi:
1. `departments` - Menyimpan data department
2. `lecturers` - Menyimpan data dosen dengan relasi ke department
3. `students` - Menyimpan data mahasiswa dengan relasi ke department

# Dokumentasi


https://github.com/user-attachments/assets/b195b968-c983-4f3f-bf78-4adcc80cd78c

