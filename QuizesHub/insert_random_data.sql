-- university
INSERT INTO universities (name, created_at, updated_at, deleted_at)
VALUES 
('Cairo University', NOW(), NOW(), NULL),
('Alexandria University', NOW(), NOW(), NULL),
('American University in Cairo', NOW(), NOW(), NULL),
('Ain Shams University', NOW(), NOW(), NULL),
('Helwan University', NOW(), NOW(), NULL);


--  faculties Table:
INSERT INTO faculties (id, name, university_id, created_at, updated_at)
VALUES 
(1, 'Faculty of Science', 1, NOW(), NOW()),
(2, 'Faculty of Engineering', 2, NOW(), NOW()),
(3, 'Faculty of Science', 3, NOW(), NOW());

-- . levels Table:
INSERT INTO levels (id, name, description, created_at, updated_at)
VALUES 
(1, 'Level 1', 'First year students', NOW(), NOW()),
(2, 'Level 2', 'First year students', NOW(), NOW()),
(3, 'Level 3', 'First year students', NOW(), NOW()),
(4, 'Level 4', 'Second year students', NOW(), NOW());

-- . majors Table:
INSERT INTO majors (id, name, faculty_id, created_at, updated_at)
VALUES 
(1, 'Physics', 1, NOW(), NOW()),
(2, 'Chemistry', 2, NOW(), NOW()),
(3, 'Math', 1, NOW(), NOW()),
(4, 'CS', 2, NOW(), NOW());

-- users
INSERT INTO users (fname, lname, username, email, email_verified_at, password, phone, image_path, gender, university_id, faculty_id, major_id, level_id, remember_token, created_at, updated_at, deleted_at)
VALUES 
('Mohamed', 'Nayef', 'mohamed.n', 'mohamed.nayef@example.com', NOW(), 'password_hash_1', '01123456789', '/images/mohamed.jpg', 'M', 1, 1, 1, 2, 'token_1', NOW(), NOW(), NULL),
('Ahmed', 'Ali', 'ahmed.a', 'ahmed.ali@example.com', NOW(), 'password_hash_2', '01234567890', '/images/ahmed.jpg', 'M', 1, 2, 2, 3, 'token_2', NOW(), NOW(), NULL),
('Sara', 'Ali', 'sara.a', 'sara.ali@example.com', NULL, 'password_hash_3', '01098765432', '/images/sara.jpg', 'F', 2, 1, 3, 1, 'token_3', NOW(), NOW(), NULL),
('Fatma', 'Hassan', 'fatma.h', 'fatma.hassan@example.com', NOW(), 'password_hash_4', '01211112222', '/images/fatma.jpg', 'F', 3, 2, 1, 4, 'token_4', NOW(), NOW(), NULL),
('Ali', 'Omar', 'ali.o', 'ali.omar@example.com', NULL, 'password_hash_5', '01033334444', '/images/ali.jpg', 'M', 2, 3, 2, 2, 'token_5', NOW(), NOW(), NULL),
('Hassan', 'Khaled', 'hassan.k', 'hassan.khaled@example.com', NOW(), 'password_hash_6', '01155556666', '/images/hassan.jpg', 'M', 1, 1, 2, 1, 'token_6', NOW(), NOW(), NULL),
('Mona', 'Hussein', 'mona.h', 'mona.hussein@example.com', NOW(), 'password_hash_7', '01222223333', '/images/mona.jpg', 'F', 2, 2, 1, 3, 'token_7', NOW(), NOW(), NULL),
('Youssef', 'Mahmoud', 'youssef.m', 'youssef.mahmoud@example.com', NULL, 'password_hash_8', '01044445555', '/images/youssef.jpg', 'M', 3, 1, 3, 2, 'token_8', NOW(), NOW(), NULL),
('Laila', 'Mohamed', 'laila.m', 'laila.mohamed@example.com', NOW(), 'password_hash_9', '01266667777', '/images/laila.jpg', 'F', 1, 3, 2, 4, 'token_9', NOW(), NOW(), NULL),
('Omar', 'Said', 'omar.s', 'omar.said@example.com', NULL, 'password_hash_10', '01088889999', '/images/omar.jpg', 'M', 2, 2, 1, 1, 'token_10', NOW(), NOW(), NULL);




-- admin table 
INSERT INTO admins (id, user_id, permissions, created_at, updated_at)
VALUES 
(1, 1, 'super_admin', NOW(), NOW()),
(2, 2, 'admin', NOW(), NOW());



-- 6. courses Table:
INSERT INTO courses (id, name, code, major_id, created_at, updated_at)
VALUES 
(1, 'Physics', 'PHY101', 1, NOW(), NOW()),
(2, 'Chemistry', 'CHE102', 2, NOW(), NOW());

-- 7. exams Table:
INSERT INTO exams (id, type, course_id, date, duration, created_at, updated_at)
VALUES 
(1, 'final', 1, '2024-09-10', 120, NOW(), NOW()),
(2, 'midterm', 2, '2024-09-12', 90, NOW(), NOW()),
(3, 'oral', '2', '2024-09-08', '120', NOW, NOW());

-- 16. questions Table:
INSERT INTO questions (id, type, text, exam_id, created_at, updated_at)
VALUES 
(1, 'mcq', 'What is the speed of light?', 1, NOW(), NOW()),
(2, 'true_false', 'The Earth is flat.', 2, NOW(), NOW());


-- answers Table
INSERT INTO answers (id, question_id, type, text, is_correct, created_at, updated_at)
VALUES 
(1, 1, 'normal_text', 'Option A', 0, NOW(), NOW()),
(2, 1, 'normal_text', 'Option B', 1, NOW(), NOW()),
(3, 2, 'image_path', '/images/option1.png', 0, NOW(), NOW());

-- 3. answer_attempts Table:
INSERT INTO answer_attempts (id, user_id, question_id, selected_answer_id, attempt_number, created_at, updated_at)
VALUES 
(1, 1, 1, 2, 1, NOW(), NOW()),
(2, 2, 2, 3, 1, NOW(), NOW());


-- 4. cache Table:
INSERT INTO cache (`key`, `value`, `expiration`)
VALUES 
('key1', 'cached_value1', 3600),
('key2', 'cached_value2', 7200);



-- 5. comments Table:
INSERT INTO comments (id, user_id, question_id, parent_id, comment_text, created_at, updated_at)
VALUES 
(1, 1, 1, NULL, 'This is a comment', NOW(), NOW()),
(2, 2, 1, 1, 'This is a reply', NOW(), NOW());







-- 8. exam_attempts Table:
INSERT INTO exam_attempts (id, user_id, exam_id, attempt_number, start_time, end_time, score, created_at, updated_at)
VALUES 
(1, 1, 1, 1, NOW(), NULL, 85, NOW(), NOW()),
(2, 2, 2, 1, NOW(), NULL, 90, NOW(), NOW());





-- 10. feedbacks Table:
INSERT INTO feedbacks (id, user_id, exam_id, rating, comments, created_at, updated_at)
VALUES 
(1, 1, 1, 5, 'Good exam', NOW(), NOW()),
(2, 2, 2, 4, 'Challenging but fair', NOW(), NOW());







-- 12. likes Table:
INSERT INTO likes (id, user_id, comment_id, `like`, created_at, updated_at)
VALUES 
(1, 1, 1, 'yes', NOW(), NOW()),
(2, 2, 2, 'no', NOW(), NOW());





-- 14. migrations Table:
-- Migrations are usually handled by the framework, but you can insert data like this:
-- INSERT INTO migrations (id, migration, batch)
-- VALUES 
-- (1, 'create_users_table', 1),
-- (2, 'create_courses_table', 1);



-- 15. password_reset_tokens Table:

INSERT INTO password_reset_tokens (email, token, created_at)
VALUES 
('user1@example.com', 'randomtoken1', NOW()),
('user2@example.com', 'randomtoken2', NOW());







-- 17. results Table:
INSERT INTO results (id, user_id, exam_id, score, total_score, completion_time, created_at, updated_at)
VALUES 
(1, 1, 1, 85, 100, 120, NOW(), NOW()),
(2, 2, 2, 90, 100, 90, NOW(), NOW());



-- 18. roles Table:
INSERT INTO roles (id, name, description, created_at, updated_at)
VALUES 
(1, 'admin', 'Administrator role', NOW(), NOW()),
(2, 'student', 'Student role', NOW(), NOW());


-- 19. role_user Table:
INSERT INTO role_user (id, user_id, role_id, created_at, updated_at)
VALUES 
(1, 1, 1, NOW(), NOW()),
(2, 2, 2, NOW(), NOW());



-- 20. sessions Table:
INSERT INTO sessions (id, user_id, ip_address, user_agent, payload, last_activity)
VALUES 
('sess1', 1, '127.0.0.1', 'Mozilla/5.0', 'session_data_1', 1694183400),
('sess2', 2, '127.0.0.2', 'Mozilla/5.0', 'session_data_2', 1694183400);