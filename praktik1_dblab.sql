CREATE DATABASE IF NOT EXISTS praktik1_dblab;

USE praktik1_dblab;

-- Tabel Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'teknisi') NOT NULL
);

--Tabel Alat Lab
CREATE TABLE alat_lab (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_alat VARCHAR(100) NOT NULL,
    jumlah INT NOT NULL DEFAULT 0,
    kodisi ENUM('Baik', 'Rusak') DEFAULT 'Baik'
);

--Insert Data Dummy Users (password: admin123 -> di-hash dengan PASSWORD_BCRYPT)
INSERT INTO
    users (username, password, role)
VALUES (
        'admin',
        '$2y$10$wT.N34m.zS/.6p7x.o6xIeT8Z.nB6WkL7Lz/9y3kQ8V9M.Y.N8O3a',
        'admin'
    );

--Insert Data Dummy Alat
INSERT INTO
    alat_lab (nama_alat, jumlah, kondisi)
VALUES (
        'Oscilloscope Digital',
        5,
        'Baik'
    ),
    (
        'Multimeter Digital',
        12,
        'Baik'
    ),
    (
        'Soldering Station',
        2,
        'Rusak'
    )