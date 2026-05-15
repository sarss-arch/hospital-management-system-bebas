# Hospital Management System — Laravel REST API

> Final Project BNCC LnT Back-End 2026  
> Studi Kasus: Hospital Management System untuk Klinik Sehat Bersama

## 1. Identitas Kelompok

**Nama Kelompok:**  
`BEBAS`

**Anggota Kelompok:**

| No|          Nama                    |    NIM     |         Role / Kontribusi         |
|---|----------------------------------|------------|-----------------------------------|
| 1 | Ni Putu Saraswati                | 2902624635 | Backend API, Database, Testing    |
| 2 | Stella Olivia Setiadi            | 2902652922 | Auth, File Storage, Documentation |
| 3 | Darmaning Maria Anabelle Kristian| 2902634913 | Seeder, Postman, Mail Feature     |

---

## 2. Deskripsi Project

Hospital Management System adalah aplikasi backend berbasis Laravel REST API yang digunakan untuk mengelola proses operasional klinik secara digital.

Sistem ini memiliki tiga jenis pengguna utama:

1. **Admin**
   - Mengelola data pasien, dokter, appointment, laporan, dan file.
   - Memiliki akses penuh terhadap data sistem.

2. **Dokter**
   - Melihat jadwal konsultasi.
   - Mengelola rekam medis pasien.
   - Mengakses appointment yang berkaitan dengan dirinya.

3. **Pasien**
   - Melakukan registrasi dan login.
   - Melihat daftar dokter dan jadwal.
   - Membuat appointment.
   - Melihat appointment dan rekam medis miliknya sendiri.
   - Mengupload dokumen pribadi.

Project ini menerapkan autentikasi menggunakan Laravel Sanctum, role-based authorization, REST API versioning, database relational design, file upload private, seeder, factory, testing, mailing, dan dokumentasi Postman.

---

## 3. Tech Stack

| Teknologi | Keterangan |
|---|---|
| Laravel 13 | Backend framework |
| PHP 8.5 | Bahasa pemrograman |
| Laravel Sanctum | API authentication |
| SQLite / MySQL | Database |
| Eloquent ORM | Relasi database |
| Laravel Storage | File upload dan file management |
| Laravel Mail | Email notification |
| PHPUnit | Automated testing |
| Postman | API testing dan documentation |

---

## 4. Fitur Utama

- Register dan login user.
- Authentication menggunakan Bearer Token Laravel Sanctum.
- Role authorization untuk `admin`, `doctor`, dan `patient`.
- CRUD pasien.
- List dokter beserta jadwal praktik.
- Pembuatan appointment oleh pasien.
- Update status appointment oleh admin/dokter.
- Medical record oleh dokter.
- Upload dan download file medis.
- Export report.
- Seeder dan factory data dummy.
- Pagination pada endpoint listing.
- PHPUnit feature dan unit test.
- Dokumentasi API menggunakan Postman.
- ERD dan struktur database relasional.

---

## 5. Cara Instalasi

Clone repository:

```bash
git clone https://github.com/sarss-arch/hospital-management-system-bebas.git
cd hospital-management-system-bebas