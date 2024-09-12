-- Part A, True/False Questions
INSERT INTO `questions`(`id`, `type`, `text`, `exam_id`, `created_at`, `updated_at`, `deleted_at`) 
VALUES 
  -- true or false
  (3, 'true_false', 'J.R.Ryderg correlates between Wavelength and no. of energy levels.', 4, NOW(), NOW(), NULL),
  (4, 'true_false', 'Filters and monochromators are the two types of wavelength selectors.', 4, NOW(), NOW(), NULL),
  (5, 'true_false', 'Double beam spectrophotometer is based on one cell for the sample and one for detector.', 4, NOW(), NOW(), NULL),
  (6, 'true_false', 'The energy liberated when an electron drops from the fifth to the second energy level in H-atom is 4.58 * 10^-19 J.', 4, NOW(), NOW(), NULL),
  (7, 'true_false', 'When absorption intensity of a compound is decreased, it is known as hyper chromic shift.', 4, NOW(), NOW(), NULL),
  (8, 'true_false', 'The energy absorbed by molecule may stimulate rotation, vibration or electronic transition depending on frequency of the incident light.', 4, NOW(), NOW(), NULL),
  (9, 'true_false', 'n->pi* transitions occur when the molecule contains alone pair.', 4, NOW(), NOW(), NULL),
  (10, 'true_false', 'Molecular weight of compound can be determined using Beer-Lambert\s law.', 4, NOW(), NOW(), NULL),
  (11, 'true_false', 'Beers law is obeyed only for diluted solutions.', 4, NOW(), NOW(), NULL),
  (12, 'true_false', 'pi->pi* transitions normally give molar absorbitivities between 1000 - 10000 L^-1.mol.cm^-1.', 4, NOW(), NOW(), NULL),
  (13, 'true_false', 'When sodium atoms are excited in a flame, yellow light with lambda = 589 nm is absorbed.', 4, NOW(), NOW(), NULL),
  (14, 'true_false', 'Final form of Beer-Lambert law is expressed as A = abc.', 4, NOW(), NOW(), NULL),
  (15, 'true_false', 'P-nitro phenol shows red shift in acidic medium.', 4, NOW(), NOW(), NULL),
  (16, 'true_false', 'Absorptivity is absorbance of one gram per liter.', 4, NOW(), NOW(), NULL),
  (17, 'true_false', 'NH2 is a group that causes shift to longer wavelength.', 4, NOW(), NOW(), NULL),
  (18, 'true_false', 'Methane molecule has C-H bond only and can undergo n->sigma* transition.', 4, NOW(), NOW(), NULL),
  (19, 'true_false', 'If gamma rays are absorbed, molecules will undergo ionization.', 4, NOW(), NOW(), NULL),
  (20, 'true_false', 'Epsilon-max is the maximum wavelength that corresponds to maximum absorbance.', 4, NOW(), NOW(), NULL),
  (21, 'true_false', 'Magnetic quantum number for dxy equals (-2).', 4, NOW(), NOW(), NULL),
  (22, 'true_false', 'The more polar the solvent, the shift of pi->pi* is to longer wavelength.', 4, NOW(), NOW(), NULL),
  -- mcq
  (23, 'mcq', 'Aniline shows blue shift in .....', 4, NOW(), NOW(), NULL),
  (24, 'mcq', 'The third line in Brackett series of H-atom means n1 = ..... and n2 = ....', 4, NOW(), NOW(), NULL),
  (25, 'mcq', 'Detector / Photoelectric transducer converts the ..... energy into an electrical signal.', 4, NOW(), NOW(), NULL),
  (26, 'mcq', 'Carbonyl Compounds undergo ..... transitions.', 4, NOW(), NOW(), NULL),
  (27, 'mcq', 'Between every two successive vibrational energy levels, there are an infinite no. of .... energy levels.', 4, NOW(), NOW(), NULL),
  (28, 'mcq', 'A sample has transmittance of 0.50, its absorbance equals ....', 4, NOW(), NOW(), NULL),
  (29, 'mcq', 'When an electric current is passed through H2-gas at very low pressure, several series of lines in the spectrum of hydrogen are ....', 4, NOW(), NOW(), NULL),
  (30, 'mcq', 'For IR radiation of 5 Mm, the wave number = .....', 4, NOW(), NOW(), NULL),
  (31, 'mcq', 'Unit of absorbance is .....', 4, NOW(), NOW(), NULL),
  (32, 'mcq', 'The energy required to remove an e from the lowest energy level of H-atom to produce H+ ion is ..... j.', 4, NOW(), NOW(), NULL),
  -- Part B, Essay Questions
  (33, 'essay', 'Explain the effect of concentration on the equivalent conductivity of strong and weak electrolytes.', 4, NOW(), NOW(), NULL),
  (34, 'essay', 'Calculate the mass of deposited copper (gm) on cathode by passing 0.10 Faraday through cupric salt. (Cu = 63.5 gm).', 4, NOW(), NOW(), NULL),
  (35, 'essay', 'Discuss the effect of temperature on the conductance of strong and weak electrolytes.', 4, NOW(), NOW(), NULL),
  (36, 'essay', 'Discuss the resistance of (0.01 M NaCl) solution equals 40 Ohms and the cell constant = 1.1 cm^-1. Calculate the equivalent conductivity.', 4, NOW(), NOW(), NULL),
  (37, 'essay', 'Discuss on the basis of conductance measurements, show how the conductometric titration of HCl and NaOH could be carried out.', 4, NOW(), NOW(), NULL);




INSERT INTO `answers` (`id`, `question_id`, `type`, `text`, `is_correct`, `created_at`, `updated_at`, `deleted_at`) 
VALUES 
  (NULL, 3, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 4, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 5, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 6, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 7, 'normal_text', 'false', 0, NOW(), NOW(), NULL),
  (NULL, 8, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 9, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 10, 'normal_text', 'false', 0, NOW(), NOW(), NULL),
  (NULL, 11, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 12, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 13, 'normal_text', 'false', 0, NOW(), NOW(), NULL),
  (NULL, 14, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 15, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 16, 'normal_text', 'false', 0, NOW(), NOW(), NULL),
  (NULL, 17, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 18, 'normal_text', 'false', 0, NOW(), NOW(), NULL),
  (NULL, 19, 'normal_text', 'true', 1, NOW(), NOW(), NULL),
  (NULL, 20, 'normal_text', 'false', 0, NOW(), NOW(), NULL),
  (NULL, 21, 'normal_text', 'false', 0, NOW(), NOW(), NULL),
  (NULL, 22, 'normal_text', 'true', 1, NOW(), NOW(), NULL);



-- Multiple Choice Answers
INSERT INTO `answers` (`id`, `question_id`, `type`, `text`, `is_correct`, `created_at`, `updated_at`, `deleted_at`) 
VALUES 
  (NULL, 23, 'normal_text', 'acidic medium', 1, NOW(), NOW(), NULL),
  (NULL, 23, 'normal_text', 'basic medium', 0, NOW(), NOW(), NULL),
  (NULL, 23, 'normal_text', 'neutral medium', 0, NOW(), NOW(), NULL),
  (NULL, 23, 'normal_text', 'all meida', 0, NOW(), NOW(), NULL),

  (NULL, 24, 'normal_text', '4,7', 1, NOW(), NOW(), NULL),
  (NULL, 24, 'normal_text', '4,3', 0, NOW(), NOW(), NULL),
  (NULL, 24, 'normal_text', '7,4', 0, NOW(), NOW(), NULL),
  (NULL, 24, 'normal_text', '3,4', 0, NOW(), NOW(), NULL),

  (NULL, 25, 'normal_text', 'radiant', 1, NOW(), NOW(), NULL),
  (NULL, 25, 'normal_text', 'electromagnetic', 0, NOW(), NOW(), NULL),
  (NULL, 25, 'normal_text', 'a,b together', 0, NOW(), NOW(), NULL),
  (NULL, 25, 'normal_text', 'electrical', 0, NOW(), NOW(), NULL),

  (NULL, 26, 'normal_text', 'pi->pi*', 0, NOW(), NOW(), NULL),
  (NULL, 26, 'normal_text', 'n->pi*', 0, NOW(), NOW(), NULL),
  (NULL, 26, 'normal_text', 'pi->pi* and n->pi*', 1, NOW(), NOW(), NULL),
  (NULL, 26, 'normal_text', 'sigma->sigma*', 0, NOW(), NOW(), NULL),

  (NULL, 27, 'normal_text', 'Vibrational', 0, NOW(), NOW(), NULL),
  (NULL, 27, 'normal_text', 'rotational', 1, NOW(), NOW(), NULL),
  (NULL, 27, 'normal_text', 'electronic', 0, NOW(), NOW(), NULL),
  (NULL, 27, 'normal_text', 'all of the above', 0, NOW(), NOW(), NULL),

  (NULL, 28, 'normal_text', '0.103', 0, NOW(), NOW(), NULL),
  (NULL, 28, 'normal_text', '0.301', 1, NOW(), NOW(), NULL),
  (NULL, 28, 'normal_text', '0.50', 0, NOW(), NOW(), NULL),
  (NULL, 28, 'normal_text', '0.310', 0, NOW(), NOW(), NULL),

  (NULL, 29, 'normal_text', 'emitted', 0, NOW(), NOW(), NULL),
  (NULL, 29, 'normal_text', 'produced', 1, NOW(), NOW(), NULL),
  (NULL, 29, 'normal_text', 'absorbed', 0, NOW(), NOW(), NULL),
  (NULL, 29, 'normal_text', 'emitted or produced', 0, NOW(), NOW(), NULL),

  (NULL, 30, 'normal_text', '1000 cm^-1', 0, NOW(), NOW(), NULL),
  (NULL, 30, 'normal_text', '2000 cm^-1', 1, NOW(), NOW(), NULL),
  (NULL, 30, 'normal_text', '1000 cm', 0, NOW(), NOW(), NULL),
  (NULL, 30, 'normal_text', '2000 cm', 1, NOW(), NOW(), NULL),

  (NULL, 31, 'normal_text', 'cm^-1', 0, NOW(), NOW(), NULL),
  (NULL, 31, 'normal_text', 'M^-1.cm^-1', 0, NOW(), NOW(), NULL),
  (NULL, 31, 'normal_text', 'unitless', 1, NOW(), NOW(), NULL),
  (NULL, 31, 'normal_text', 'mol/L', 0, NOW(), NOW(), NULL),

  (NULL, 32, 'normal_text', '1.18 * 10^-18', 0, NOW(), NOW(), NULL),
  (NULL, 32, 'normal_text', '2.18 * 10^-18', 1, NOW(), NOW(), NULL),
  (NULL, 32, 'normal_text', '2.18 * 10^-19', 0, NOW(), NOW(), NULL),
  (NULL, 32, 'normal_text', '1.18 * 10^-19', 0, NOW(), NOW(), NULL),



  (NULL, 33, 'normal_text', 'not answerd yet', 1, NOW(), NOW(), NULL),
  (NULL, 34, 'normal_text', 'not answerd yet', 1, NOW(), NOW(), NULL),
  (NULL, 35, 'normal_text', 'not answerd yet', 1, NOW(), NOW(), NULL),
  (NULL, 36, 'normal_text', 'not answerd yet', 1, NOW(), NOW(), NULL),
  (NULL, 37, 'normal_text', 'not answerd yet', 1, NOW(), NOW(), NULL);
