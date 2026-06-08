-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2026 at 07:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gk_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'General Knowledge',
  `question_text` text NOT NULL,
  `opt_a` varchar(255) NOT NULL,
  `opt_b` varchar(255) NOT NULL,
  `opt_c` varchar(255) NOT NULL,
  `opt_d` varchar(255) NOT NULL,
  `correct_opt` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category`, `question_text`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `correct_opt`) VALUES
(1, 'General Knowledge', 'इनमे से कोन रघु बंश का नहीं है |', 'दशरथ ', 'रघु ', 'मनु ', 'पुलस्त ', 'D'),
(2, 'General Knowledge', 'Ramcharitmanas kisne likhi hai?', 'Tulsidas', 'Valmiki', 'Surdas', 'Kabir', 'A'),
(3, 'General Knowledge', 'Bhagwan Ram ke pita ka kya naam tha?', 'Janak', 'Dasharath', 'Vashistha', 'Vishwamitra', 'B'),
(4, 'General Knowledge', 'Mata Sita ke pita ka kya naam tha?', 'Dasharath', 'Janak', 'Kushadhwaj', 'Siradhwaj', 'B'),
(5, 'General Knowledge', 'Ayodhya kis nadi ke kinare basi hai?', 'Ganga', 'Yamuna', 'Saryu', 'Godavari', 'C'),
(6, 'General Knowledge', 'Raja Dasharath kis desh ke raja the?', 'Mithila', 'Lanka', 'Kosala', 'Kishkindha', 'C'),
(7, 'General Knowledge', 'Laxman ki mata ka kya naam tha?', 'Kaushalya', 'Kaikeyi', 'Sumitra', 'Mandodari', 'C'),
(8, 'General Knowledge', 'Bharat ki mata ka kya naam tha?', 'Kaushalya', 'Kaikeyi', 'Sumitra', 'Urmila', 'B'),
(9, 'General Knowledge', 'Ram ki mata ka kya naam tha?', 'Kaushalya', 'Kaikeyi', 'Sumitra', 'Sunayana', 'A'),
(10, 'General Knowledge', 'Sita swayamvar mein kis bhagwan ka dhanush toda gaya tha?', 'Vishnu', 'Brahma', 'Shiv', 'Indra', 'C'),
(11, 'General Knowledge', 'Urmila kiski patni thi?', 'Ram', 'Laxman', 'Bharat', 'Shatrughan', 'B'),
(12, 'General Knowledge', 'Mandavi kiski patni thi?', 'Ram', 'Laxman', 'Bharat', 'Shatrughan', 'C'),
(13, 'General Knowledge', 'Shrutakirti kiski patni thi?', 'Ram', 'Laxman', 'Bharat', 'Shatrughan', 'D'),
(14, 'General Knowledge', 'Bhagwan Ram ko kitne varsh ka vanvas mila tha?', '12', '13', '14', '15', 'C'),
(15, 'General Knowledge', 'Vanvas ke dauran Ram Sita aur Laxman kahan ruke the?', 'Panchavati', 'Kishkindha', 'Lanka', 'Mithila', 'A'),
(16, 'General Knowledge', 'Swarn Mrig (Sone ka hiran) ka roop kis rakshas ne dharan kiya tha?', 'Kumbhkaran', 'Maricha', 'Subahu', 'Khara', 'B'),
(17, 'General Knowledge', 'Ravana kahan ka raja tha?', 'Kishkindha', 'Ayodhya', 'Lanka', 'Mithila', 'C'),
(18, 'General Knowledge', 'Ravana ki behen ka kya naam tha?', 'Mandodari', 'Surpanakha', 'Trijata', 'Tataka', 'B'),
(19, 'General Knowledge', 'Jatayu ke bhai ka kya naam tha?', 'Sampati', 'Garud', 'Vali', 'Sugriva', 'A'),
(20, 'General Knowledge', 'Hanuman ji ko Sanjeevani booti lane kisne bheja tha?', 'Vashistha', 'Vishwamitra', 'Sushena Vaidya', 'Agastya', 'C'),
(21, 'General Knowledge', 'Sanjeevani booti kis parvat par thi?', 'Kailash', 'Dronagiri', 'Vindhya', 'Himalaya', 'B'),
(22, 'General Knowledge', 'Vali ka vadh kisne kiya tha?', 'Laxman', 'Hanuman', 'Sugriva', 'Ram', 'D'),
(23, 'General Knowledge', 'Sugriva ke bhai ka kya naam tha?', 'Angad', 'Vali', 'Nal', 'Neel', 'B'),
(24, 'General Knowledge', 'Hanuman ji ke pita ka kya naam tha?', 'Kesari', 'Vayu', 'Surya', 'Indra', 'A'),
(25, 'General Knowledge', 'Lanka dahan kisne kiya tha?', 'Ram', 'Laxman', 'Hanuman', 'Angad', 'C'),
(26, 'General Knowledge', 'Ravana ke kis bhai ne Ram ka sath diya tha?', 'Kumbhkaran', 'Vibhishana', 'Ahiravana', 'Khara', 'B'),
(27, 'General Knowledge', 'Kumbhkaran kitne mahine sota tha?', '3', '4', '6', '8', 'C'),
(28, 'General Knowledge', 'Meghnad kiska putra tha?', 'Vibhishana', 'Kumbhkaran', 'Ravana', 'Khara', 'C'),
(29, 'General Knowledge', 'Indrajit kiska doosra naam tha?', 'Ravana', 'Meghnad', 'Kumbhkaran', 'Ahiravana', 'B'),
(30, 'General Knowledge', 'Luv aur Kush kiske putra the?', 'Laxman-Urmila', 'Bharat-Mandavi', 'Ram-Sita', 'Shatrughan-Shrutakirti', 'C'),
(31, 'General Knowledge', 'Ramayan mein kitne Kand (Chapters) hain?', '5', '6', '7', '8', 'C'),
(32, 'General Knowledge', 'Hanuman ji ki bhent Ram ji se kis parvat par hui thi?', 'Dronagiri', 'Kailash', 'Rishyamuk', 'Vindhya', 'C'),
(33, 'General Knowledge', 'Shabri ke jhoothe ber kisne khaye the?', 'Laxman', 'Bharat', 'Shatrughan', 'Ram', 'D'),
(34, 'General Knowledge', 'Sita haran ke samay Ravana ne kis viman ka prayog kiya tha?', 'Garud', 'Pushpak', 'Hans', 'Vayu', 'B'),
(35, 'General Knowledge', 'Ravana ke pita ka kya naam tha?', 'Pulastya', 'Vishrava', 'Kashyap', 'Atri', 'B'),
(36, 'General Knowledge', 'Lanka jane ke liye samudra par pul kisne banaya tha?', 'Nal-Neel', 'Angad-Hanuman', 'Sugriva-Vali', 'Ram-Laxman', 'A'),
(37, 'General Knowledge', 'Laxman ko shakti baan kisne mara tha?', 'Ravana', 'Kumbhkaran', 'Meghnad', 'Ahiravana', 'C'),
(38, 'General Knowledge', 'Sita ji ko Lanka mein kis vatika mein rakha gaya tha?', 'Nandan Van', 'Ashok Vatika', 'Panchavati', 'Kishkindha', 'B'),
(39, 'General Knowledge', 'Ravana ka vadh kis astra se hua tha?', 'Pashupatastra', 'Brahmastra', 'Sudarshan Chakra', 'Trishul', 'B'),
(40, 'General Knowledge', 'Ravana ki patni ka kya naam tha?', 'Mandodari', 'Trijata', 'Surpanakha', 'Tataka', 'A'),
(41, 'General Knowledge', 'Bhagwan Ram kiske avatar the?', 'Brahma', 'Shiv', 'Vishnu', 'Indra', 'C'),
(42, 'General Knowledge', 'Laxman kiske avatar mane jate hain?', 'Surya', 'Sheshnag', 'Garud', 'Vayu', 'B'),
(43, 'General Knowledge', 'Hanuman ji kiske avatar mane jate hain?', 'Vishnu', 'Brahma', 'Rudra (Shiv)', 'Indra', 'C'),
(44, 'General Knowledge', 'Ramayan kis yug ki ghatna hai?', 'Satyug', 'Treta Yug', 'Dwapar Yug', 'Kalyug', 'B'),
(45, 'General Knowledge', 'Raja Dasharath ke kul-guru kaun the?', 'Vishwamitra', 'Vashistha', 'Agastya', 'Valmiki', 'B'),
(46, 'General Knowledge', 'Sita ji ki mata ka kya naam tha?', 'Kaushalya', 'Sunayana', 'Mandavi', 'Urmila', 'B'),
(47, 'General Knowledge', 'Ahilya ko shrap se kisne mukt kiya tha?', 'Vishwamitra', 'Ram', 'Laxman', 'Gautam Rishi', 'B'),
(48, 'General Knowledge', 'Ram setu nirman mein kisne sahayata ki thi?', 'Vanar Sena', 'Rakshas Sena', 'Devta', 'Manushya', 'A'),
(49, 'General Knowledge', 'Lanka mein Hanuman ji ki poonch mein aag kisne lagwayi thi?', 'Meghnad', 'Kumbhkaran', 'Ravana', 'Vibhishana', 'C'),
(50, 'General Knowledge', 'Ramayan ke annt mein Ram ji ne kis nadi mein jal samadhi li thi?', 'Ganga', 'Yamuna', 'Saryu', 'Narmada', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `exam_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_name`, `score`, `total`, `exam_date`) VALUES
(1, 'Nitesh Bhardwaj', 1, 1, '2026-06-06 04:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'The Falling Donkey (Never Give Up)', 'Ek baar ek kisaan ka gadha kuye mein gir gaya. Gadha bahut der tak rota raha. Kisaan ne socha ki gadha boodha ho gaya hai aur kuye ko bhi waise hi mitti se bharna tha, toh usne gaon walo ko bulaya mitti daalne ke liye. Jaise hi mitti gadhe ki peeth par girti, wo usko jhatak deta aur us mitti ke upar khada ho jata. Dheere-dheere mitti bharti gayi aur gadha upar aata gaya. Kuch hi der mein gadha kuye se bahar aa gaya! Seekh: Life mein kitni bhi problems aayein, unhe jhatak kar unke upar khade hona seekho!', '2026-06-06 05:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `education` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `gender`, `education`, `password`, `reg_date`) VALUES
(1, 'Nitesh Bhardwaj', '09005800999', 'ldaerp123@gmail.com', 'Male', 'Graduation (BA/BSc/BCA etc)', '$2y$10$M2OlYINeBYTdUJFbN1WW4uajdupb1TffXrNTkIPO2wl6mMXzaQ9FS', '2026-06-06 04:49:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
