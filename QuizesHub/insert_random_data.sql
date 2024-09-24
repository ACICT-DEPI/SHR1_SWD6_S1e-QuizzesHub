-- university
INSERT INTO universities (name, created_at, updated_at, deleted_at)
VALUES
('Cairo University', NOW(), NOW(), NULL),
('Alexandria University', NOW(), NOW(), NULL),
('American University in Cairo', NOW(), NOW(), NULL),
('Ain Shams University', NOW(), NOW(), NULL),
('Helwan University', NOW(), NOW(), NULL),
('Zagazig University', NOW(), NOW(), NULL);


--  faculties Table:
INSERT INTO faculties ( name, created_at, updated_at)
VALUES
('Faculty of Science', NOW(), NOW()),
('Faculty of Engineering', NOW(), NOW()),
('Faculty of Medicine', NOW(), NOW());

--  faculty_university Table:
INSERT INTO faculty_university (university_id, faculty_id,created_at, updated_at)
VALUES
(1,1, NOW(), NOW()),
(2,2, NOW(), NOW()),
(3,3, NOW(), NOW()),
(6,1, NOW(), NOW());


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
(3,3, NOW(), NOW()),
(1,2, NOW(), NOW());

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
('admin', 'admin', 'admin', 'admin@gmail.com', NOW(), '$2y$12$JFxNzD3LNCT9aDrGPpAdiea5EdH0vnNGqIXPmRoy.LAe1QlH/E4Sq', '0123123666', '/images/admin.jpg', 'M', 'owner', 1, 3, 2, 4, 'token_10', NOW(), NOW(), NULL),
('Omar', 'Said', 'omar.s', 'omar.said@example.com', NULL, 'password_hash_10', '01088889999', '/images/omar.jpg', 'M', 'user', 2, 2, 1, 1, 'token_11', NOW(), NOW(), NULL);





-- 6. courses Table:
INSERT INTO courses (name,code, created_at, updated_at)
VALUES
('Physics', 'PHY1',NOW(), NOW()),
('Chemistry','CHEM1', NOW(), NOW()),
('Thermodynamic Of Solution (2)','CHEM2',NOW(), NOW());

-- 6. courses Table:
INSERT INTO course_faculty_major_university (faculty_id, major_id,course_id, university_id, degree,created_at, updated_at)
VALUES
(1,1,1,6,100,NOW(), NOW()),
(2,3,3,6,100, NOW(), NOW()),
(3,2,2,6,100,NOW(), NOW());

-- 7. exams Table:
INSERT INTO exams (type ,course_id, date, duration, created_at, updated_at)
VALUES
('final', 1, '2024-09-10', 120, NOW(), NOW()),
('midterm',  2,'2024-09-12', 90, NOW(), NOW()),
('oral', 2, '2024-09-08', '120', NOW(), NOW()),
('final', 3, '2024-09-11', 120, NOW(), NOW());

-- 16. questions Table:
INSERT INTO questions (type, text, exam_id, created_at, updated_at)
VALUES
  ( 'mcq', 'What is the speed of light?', 1, NOW(), NOW()),
  ('true_false', 'The Earth is flat.', 2, NOW(), NOW()),

  ('true_false', 'J.R.Ryderg correlates between Wavelength and no. of energy levels.', 4, NOW(), NOW()),
  ('true_false', 'Filters and monochromators are the two types of wavelength selectors.', 4, NOW(), NOW()),
  ('true_false', 'Double beam spectrophotometer is based on one cell for the sample and one for detector.', 4, NOW(), NOW()),
  ('true_false', 'The energy liberated when an electron drops from the fifth to the second energy level in H-atom is 4.58 * 10^-19 J.', 4, NOW(), NOW()),
  ('true_false', 'When absorption intensity of a compound is decreased, it is known as hyperchromic shift.', 4, NOW(), NOW()),
  ('true_false', 'The energy absorbed by molecule may stimulate rotation, vibration, or electronic transition depending on the frequency of the incident light.', 4, NOW(), NOW()),
  ('true_false', 'n->pi* transitions occur when the molecule contains a lone pair.', 4, NOW(), NOW()),
  ('true_false', 'Molecular weight of a compound can be determined using Beer-Lamberts law.', 4, NOW(), NOW()),
  ('true_false', 'Beers law is obeyed only for diluted solutions.', 4, NOW(), NOW()),
  ('true_false', 'pi->pi* transitions normally give molar absorptivities between 1000-10000 L^-1.mol.cm^-1.', 4, NOW(), NOW()),
  ('true_false', 'When sodium atoms are excited in a flame, yellow light with lambda = 589 nm is absorbed.', 4, NOW(), NOW()),
  ('true_false', 'Final form of Beer-Lambert law is expressed as A = abc.', 4, NOW(), NOW()),
  ('true_false', 'p-Nitro phenol shows red shift in acidic medium.', 4, NOW(), NOW()),
  ('true_false', 'Absorptivity is absorbance of one gram per liter.', 4, NOW(), NOW()),
  ('true_false', 'NH2 group causes a shift to longer wavelength.', 4, NOW(), NOW()),
  ('true_false', 'Methane molecule has C-H bond only and can undergo n->sigma* transition.', 4, NOW(), NOW()),
  ('true_false', 'If gamma rays are absorbed, molecules will undergo ionization.', 4, NOW(), NOW()),
  ('true_false', 'Epsilon-max is the maximum wavelength that corresponds to maximum absorbance.', 4, NOW(), NOW()),
  ('true_false', 'Magnetic quantum number for dxy equals (-2).', 4, NOW(), NOW()),
  ('true_false', 'The more polar the solvent, the shift of pi->pi* to longer wavelength.', 4, NOW(), NOW()),

  ('mcq', 'Aniline shows blue shift in ....', 4, NOW(), NOW()),
  ('mcq', 'The third line in Brackett series of H-atom means n1 = ..... and n2 = ....', 4, NOW(), NOW()),
  ('mcq', 'Detector / Photoelectric transducer converts the ..... energy into an electrical signal.', 4, NOW(), NOW()),
  ('mcq', 'Carbonyl compounds undergo ..... transitions.', 4, NOW(), NOW()),
  ('mcq', 'Between every two successive vibrational energy levels, there are an infinite no. of .... energy levels.', 4, NOW(), NOW()),
  ('mcq', 'A sample has transmittance of 0.50, its absorbance equals ....', 4, NOW(), NOW()),
  ('mcq', 'When an electric current is passed through H2-gas at very low pressure, several series of lines in the spectrum of hydrogen are .....', 4, NOW(), NOW()),
  ('mcq', 'For IR radiation of 5 µm, the wave number = .....', 4, NOW(), NOW()),
  ('mcq', 'Unit of absorbance is ....', 4, NOW(), NOW()),
  ('mcq', 'The energy required to remove an e from the lowest energy level of H-atom to produce H+ ion is ..... j.', 4, NOW(), NOW()),

  ('essay', 'Explain the effect of concentration on the equivalent conductivity of strong and weak electrolytes.', 4, NOW(), NOW()),
  ('essay', 'Calculate the mass of deposited copper (gm) on cathode by passing 0.10 Faraday through cupric salt. (Cu = 63.5 gm).', 4, NOW(), NOW()),
  ('essay', 'Discuss the effect of temperature on the conductance of strong and weak electrolytes.', 4, NOW(), NOW()),
  ('essay', 'Discuss the resistance of (0.01 M NaCl) solution equals 40 Ohms and the cell constant = 1.1 cm^-1. Calculate the equivalent conductivity.', 4, NOW(), NOW()),
  ('essay', 'Discuss on the basis of conductance measurements, show how the conductometric titration of HCl and NaOH could be carried out.', 4, NOW(), NOW());




-- answers Table
INSERT INTO answers (question_id, type, text, is_correct, created_at, updated_at)
VALUES
  (1, 'normal_text', 'Option A', 0, NOW(), NOW()),
  ( 1, 'normal_text', 'Option B', 1, NOW(), NOW()),
  ( 2, 'image_path', '/images/option1.png', 0, NOW(), NOW()),

  (3, 'normal_text', 'true', 1, NOW(), NOW()),
  (3, 'normal_text', 'false', 0, NOW(), NOW()),

  (4, 'normal_text', 'true', 1, NOW(), NOW()),
  (4, 'normal_text', 'false', 0, NOW(), NOW()),

  (5, 'normal_text', 'true', 1, NOW(), NOW()),
  (5, 'normal_text', 'false', 0, NOW(), NOW()),

  (6, 'normal_text', 'true', 1, NOW(), NOW()),
  (6, 'normal_text', 'false', 0, NOW(), NOW()),

  (7, 'normal_text', 'true', 0, NOW(), NOW()),
  (7, 'normal_text', 'false', 1, NOW(), NOW()),

  (8, 'normal_text', 'true', 1, NOW(), NOW()),
  (8, 'normal_text', 'false', 0, NOW(), NOW()),

  (9, 'normal_text', 'true', 1, NOW(), NOW()),
  (9, 'normal_text', 'false', 0, NOW(), NOW()),

  (10, 'normal_text', 'true', 0, NOW(), NOW()),
  (10, 'normal_text', 'false', 1, NOW(), NOW()),

  (11, 'normal_text', 'true', 1, NOW(), NOW()),
  (11, 'normal_text', 'false', 0, NOW(), NOW()),

  (12, 'normal_text', 'true', 1, NOW(), NOW()),
  (12, 'normal_text', 'false', 0, NOW(), NOW()),

  (13, 'normal_text', 'true', 1, NOW(), NOW()),
  (13, 'normal_text', 'false', 0, NOW(), NOW()),

  (14, 'normal_text', 'true', 1, NOW(), NOW()),
  (14, 'normal_text', 'false', 0, NOW(), NOW()),

  (15, 'normal_text', 'true', 0, NOW(), NOW()),
  (15, 'normal_text', 'false', 1, NOW(), NOW()),

  (16, 'normal_text', 'true', 0, NOW(), NOW()),
  (16, 'normal_text', 'false', 1, NOW(), NOW()),

  (17, 'normal_text', 'true', 0, NOW(), NOW()),
  (17, 'normal_text', 'false', 1, NOW(), NOW()),

  (18, 'normal_text', 'true', 0, NOW(), NOW()),
  (18, 'normal_text', 'false', 1, NOW(), NOW()),

  (19, 'normal_text', 'true', 1, NOW(), NOW()),
  (19, 'normal_text', 'false', 0, NOW(), NOW()),

  (20, 'normal_text', 'true', 1, NOW(), NOW()),
  (20, 'normal_text', 'false', 0, NOW(), NOW()),

  (21, 'normal_text', 'true', 1, NOW(), NOW()),
  (21, 'normal_text', 'false', 0, NOW(), NOW()),

  (22, 'normal_text', 'true', 1, NOW(), NOW()),
  (22, 'normal_text', 'false', 0, NOW(), NOW()),

  (23, 'normal_text', 'acidic medium', 1, NOW(), NOW()),
  (23, 'normal_text', 'basic medium', 0, NOW(), NOW()),
  (23, 'normal_text', 'neutral medium', 0, NOW(), NOW()),
  (23, 'normal_text', 'all media', 0, NOW(), NOW()),
  (24, 'normal_text', '4,7', 1, NOW(), NOW()),
  (24, 'normal_text', '4,3', 0, NOW(), NOW()),
  (24, 'normal_text', '7,4', 0, NOW(), NOW()),
  (24, 'normal_text', '3,4', 0, NOW(), NOW()),
  (25, 'normal_text', 'radiant', 1, NOW(), NOW()),
  (25, 'normal_text', 'electromagnetic', 0, NOW(), NOW()),
  (25, 'normal_text', 'a,b together', 1, NOW(), NOW()),
  (25, 'normal_text', 'electrical', 0, NOW(), NOW()),
  (26, 'normal_text', 'pi->pi*', 0, NOW(), NOW()),
  (26, 'normal_text', 'n->pi*', 0, NOW(), NOW()),
  (26, 'normal_text', 'pi->pi* and n->pi*', 1, NOW(), NOW()),
  (26, 'normal_text', 'sigma->sigma*', 0, NOW(), NOW()),
  (27, 'normal_text', 'Vibrational', 0, NOW(), NOW()),
  (27, 'normal_text', 'Rotational', 1, NOW(), NOW()),
  (27, 'normal_text', 'Electronic', 0, NOW(), NOW()),
  (27, 'normal_text', 'All of the above', 0, NOW(), NOW()),
  (28, 'normal_text', '0.103', 0, NOW(), NOW()),
  (28, 'normal_text', '0.301', 1, NOW(), NOW()),
  (28, 'normal_text', '0.50', 0, NOW(), NOW()),
  (28, 'normal_text', '0.310', 0, NOW(), NOW()),
  (29, 'normal_text', 'emitted', 0, NOW(), NOW()),
  (29, 'normal_text', 'produced', 1, NOW(), NOW()),
  (29, 'normal_text', 'absorbed', 0, NOW(), NOW()),
  (29, 'normal_text', 'emitted or produced', 0, NOW(), NOW()),
  (30, 'normal_text', '1000 cm^-1', 0, NOW(), NOW()),
  (30, 'normal_text', '2000 cm^-1', 1, NOW(), NOW()),
  (30, 'normal_text', '1000 cm', 0, NOW(), NOW()),
  (30, 'normal_text', '2000 cm', 0, NOW(), NOW()),
  (31, 'normal_text', 'cm^-1', 0, NOW(), NOW()),
  (31, 'normal_text', 'cm^-1', 0, NOW(), NOW()),
  (31, 'normal_text', 'cm^-1', 0, NOW(), NOW()),
  (31, 'normal_text', 'cm^-1', 0, NOW(), NOW()),
  (32, 'normal_text', 'cm^-1', 0, NOW(), NOW()),
  (32, 'normal_text', 'cm^-1', 0, NOW(), NOW()),
  (32, 'normal_text', 'cm^-1', 0, NOW(), NOW()),
  (32, 'normal_text', 'cm^-1', 0, NOW(), NOW()),


  (33, 'normal_text', 'no existing answers yet', 0, NOW(), NOW()),
  (34, 'normal_text', 'no existing answers yet', 0, NOW(), NOW()),
  (35, 'normal_text', 'no existing answers yet', 0, NOW(), NOW()),
  (36, 'normal_text', 'no existing answers yet', 0, NOW(), NOW()),
  (37, 'normal_text', 'no existing answers yet', 0, NOW(), NOW());



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
