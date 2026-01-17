CREATE DATABASE IF NOT EXISTS talenthub;
USE talenthub;


CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    company_name VARCHAR(255) NULL COMMENT 'Uniquement pour les recruteurs',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    INDEX idx_email (email),
    INDEX idx_role_id (role_id)
);

INSERT INTO roles (name) VALUES 
    ('candidate'),
    ('recruiter'),
    ('admin');

-- Mot de passe: Admin@123
INSERT INTO users (name, email, password, role_id) VALUES 
    ('Administrateur', 'admin@talenthub.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    (SELECT id FROM roles WHERE name = 'admin'));

-- Mot de passe: Candidate@123
INSERT INTO users (name, email, password, role_id) VALUES 
    ('Jean Dupont', 'candidate@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    (SELECT id FROM roles WHERE name = 'candidate'));

-- Mot de passe: Recruiter@123
INSERT INTO users (name, email, password, role_id, company_name) VALUES 
    ('Marie Martin', 'recruiter@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    (SELECT id FROM roles WHERE name = 'recruiter'), 'TechCorp SA');