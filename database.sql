CREATE DATABASE IF NOT EXISTS student_tasks;
USE student_tasks;

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    due_date DATE NOT NULL,
    priority ENUM('Low', 'Medium', 'High') NOT NULL DEFAULT 'Medium',
    status ENUM('Pending', 'Completed') NOT NULL DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tasks (title, due_date, priority, status) VALUES
('Finish Website Project', '2026-10-17', 'High', 'Pending'),
('Review Database Lesson', '2026-10-20', 'Medium', 'Pending');
