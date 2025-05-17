CREATE DATABASE IF NOT EXISTS template_db;

USE template_db;

CREATE TABLE IF NOT EXISTS license_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    license_code VARCHAR(255) NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO license_codes (license_code) VALUES
('ABC123'),
('XYZ456');
