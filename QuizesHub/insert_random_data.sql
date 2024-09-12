-- university
INSERT INTO universities (name, created_at, updated_at, deleted_at)
VALUES
('Cairo University', NOW(), NOW(), NULL),
('Alexandria University', NOW(), NOW(), NULL),
('American University in Cairo', NOW(), NOW(), NULL),
('Ain Shams University', NOW(), NOW(), NULL),
('Helwan University', NOW(), NOW(), NULL);


--  faculties Table:
INSERT INTO faculties ( name, created_at, updated_at)
VALUES
('Faculty of Science', NOW(), NOW()),
('Faculty of Engineering', NOW(), NOW()),
('Faculty of Medicine', NOW(), NOW());

--  faculty_university Table:
INSERT INTO faculty_university ( university_id, faculty_id,created_at, updated_at)
VALUES
(1,1, NOW(), NOW()),
(2,2, NOW(), NOW()),
(3,3, NOW(), NOW());


-- . levels Table:
INSERT INTO levels ( name, description, created_at, updated_at)
VALUES
('Level 1', 'First year students', NOW(), NOW()),
('Level 2', 'First year students', NOW(), NOW()),
( 'Level 3', 'First year students', NOW(), NOW()),
('Level 4', 'Second year students', NOW(), NOW());

-- . majors Table:
INSERT INTO majors (name, created_at, updated_at)
VALUES
('Physics',  NOW(), NOW()),
('Chemistry',  NOW(), NOW()),
('Math',  NOW(), NOW()),
('CS',  NOW(), NOW());

--  faculty_major Table:
INSERT INTO faculty_major ( faculty_id, major_id,created_at, updated_at)
VALUES
(1,1, NOW(), NOW()),
(2,2, NOW(), NOW()),
(3,3, NOW(), NOW());

-- users
INSERT INTO users (fname, lname, username, email, email_verified_at, password, phone, image_path, gender, role,  university_id, faculty_id, major_id, level_id, remember_token, created_at, updated_at, deleted_at)
VALUES
('Mohamed', 'Nayef', 'mohamed.n', 'mohamed.nayef@example.com', NOW(), 'password_hash_1', '01123456789', '/images/mohamed.jpg', 'M', 'admin', 1, 1, 1, 2, 'token_1', NOW(), NOW(), NULL),
('Ahmed', 'Ali', 'ahmed.a', 'ahmed.ali@example.com', NOW(), 'password_hash_2', '01234567890', '/images/ahmed.jpg', 'M', 'admin', 1, 2, 2, 3, 'token_2', NOW(), NOW(), NULL),
('Sara', 'Ali', 'sara.a', 'sara.ali@example.com', NULL, 'password_hash_3', '01098765432', '/images/sara.jpg', 'F', 'user', 2, 1, 3, 1, 'token_3', NOW(), NOW(), NULL),
('Fatma', 'Hassan', 'fatma.h', 'fatma.hassan@example.com', NOW(), 'password_hash_4', '01211112222', '/images/fatma.jpg', 'F', 'user', 3, 2, 1, 4, 'token_4', NOW(), NOW(), NULL),
('Ali', 'Omar', 'ali.o', 'ali.omar@example.com', NULL, 'password_hash_5', '01033334444', '/images/ali.jpg', 'M', 'user', 2, 3, 2, 2, 'token_5', NOW(), NOW(), NULL),
('Hassan', 'Khaled', 'hassan.k', 'hassan.khaled@example.com', NOW(), 'password_hash_6', '01155556666', '/images/hassan.jpg', 'M', 'user', 1, 1, 2, 1, 'token_6', NOW(), NOW(), NULL),
('Mona', 'Hussein', 'mona.h', 'mona.hussein@example.com', NOW(), 'password_hash_7', '01222223333', '/images/mona.jpg', 'F', 'user', 2, 2, 1, 3, 'token_7', NOW(), NOW(), NULL),
('Youssef', 'Mahmoud', 'youssef.m', 'youssef.mahmoud@example.com', NULL, 'password_hash_8', '01044445555', '/images/youssef.jpg', 'M', 'user', 3, 1, 3, 2, 'token_8', NOW(), NOW(), NULL),
('Laila', 'Mohamed', 'laila.m', 'laila.mohamed@example.com', NOW(), 'password_hash_9', '01266667777', '/images/laila.jpg', 'F', 'user', 1, 3, 2, 4, 'token_9', NOW(), NOW(), NULL),
('Omar', 'Said', 'omar.s', 'omar.said@example.com', NULL, 'password_hash_10', '01088889999', '/images/omar.jpg', 'M', 'user', 2, 2, 1, 1, 'token_10', NOW(), NOW(), NULL);





-- 6. courses Table:
INSERT INTO courses (name,  major_id, faculty_id, created_at, updated_at)
VALUES
('Physics', 1, 1,NOW(), NOW()),
('Chemistry', 2,2, NOW(), NOW());

-- 7. exams Table:
INSERT INTO exams (type, course_name ,course_id, date, duration, created_at, updated_at)
VALUES
('final', 'Physics', 1, '2024-09-10', 120, NOW(), NOW()),
('midterm', 'Chemistry', 2, '2024-09-12', 90, NOW(), NOW()),
('oral', 'Chemistry',2, '2024-09-08', '120', NOW(), NOW());

-- 16. questions Table:
INSERT INTO questions (type, text, exam_id, created_at, updated_at)
VALUES
( 'mcq', 'What is the speed of light?', 1, NOW(), NOW()),
('true_false', 'The Earth is flat.', 2, NOW(), NOW());


-- answers Table
INSERT INTO answers (question_id, type, text, is_correct, created_at, updated_at)
VALUES
(1, 'normal_text', 'Option A', 0, NOW(), NOW()),
( 1, 'normal_text', 'Option B', 1, NOW(), NOW()),
( 2, 'image_path', '/images/option1.png', 0, NOW(), NOW());

-- 3. answer_attempts Table:
INSERT INTO answer_attempts ( user_id, question_id, selected_answer_id, attempt_number, created_at, updated_at)
VALUES
(1, 1, 2, 1, NOW(), NOW()),
(2, 2, 3, 1, NOW(), NOW());


-- 4. cache Table:
INSERT INTO cache (`key`, `value`, `expiration`)
VALUES
('key1', 'cached_value1', 3600),
('key2', 'cached_value2', 7200);



-- 5. comments Table:
INSERT INTO comments (user_id, question_id, parent_id, comment_text, created_at, updated_at)
VALUES
(1, 1, NULL, 'This is a comment', NOW(), NOW()),
( 2, 1, 1, 'This is a reply', NOW(), NOW());







-- 8. exam_attempts Table:
INSERT INTO exam_attempts (user_id, exam_id, attempt_number, start_time, end_time, score, created_at, updated_at)
VALUES
(1, 1, 1, NOW(), NULL, 85, NOW(), NOW()),
(2, 2, 1, NOW(), NULL, 90, NOW(), NOW());





-- 10. feedbacks Table:
INSERT INTO feedbacks (user_id, exam_id, rating, comments, created_at, updated_at)
VALUES
( 1, 1, 5, 'Good exam', NOW(), NOW()),
( 2, 2, 4, 'Challenging but fair', NOW(), NOW());







-- 12. likes Table:
INSERT INTO likes ( user_id, comment_id, `like`, created_at, updated_at)
VALUES
( 1, 1, 'yes', NOW(), NOW()),
( 2, 2, 'no', NOW(), NOW());





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
INSERT INTO results ( user_id, exam_id, score, total_score, completion_time, created_at, updated_at)
VALUES
( 1, 1, 85, 100, 120, NOW(), NOW()),
( 2, 2, 90, 100, 90, NOW(), NOW());





-- 20. sessions Table:
INSERT INTO sessions (id, user_id, ip_address, user_agent, payload, last_activity)
VALUES
('sess1', 1, '127.0.0.1', 'Mozilla/5.0', 'session_data_1', 1694183400),
('sess2', 2, '127.0.0.2', 'Mozilla/5.0', 'session_data_2', 1694183400);
