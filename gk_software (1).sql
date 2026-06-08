-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2026 at 08:21 AM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'The Falling Donkey (Never Give Up)', 'Ek baar ek kisaan ka gadha kuye mein gir gaya. Gadha bahut der tak rota raha. Kisaan ne socha ki gadha boodha ho gaya hai aur kuye ko bhi waise hi mitti se bharna tha, toh usne gaon walo ko bulaya mitti daalne ke liye. Jaise hi mitti gadhe ki peeth par girti, wo usko jhatak deta aur us mitti ke upar khada ho jata. Dheere-dheere mitti bharti gayi aur gadha upar aata gaya. Kuch hi der mein gadha kuye se bahar aa gaya! Seekh: Life mein kitni bhi problems aayein, unhe jhatak kar unke upar khade hona seekho!', '2026-06-06 05:30:13'),
(2, 'Haar Na Manne Ki Zid', 'Ek din ek kisan ka gadha galti se ek gehre aur sookhe kuye mein gir gaya. Wo ghanto tak dard aur ghabrahat mein zor-zor se chilata raha. Kisan ne bahut socha aur ant mein ek kathor faisla kiya. Usne socha ki gadha kaafi boodha ho chuka hai aur kuye ko wese bhi mitti se bharna hi tha, isliye use bahar nikalna bekar hai.\r\n\r\nKisan ne gaon walon ko bulaya aur sabne milkar kuye mein mitti daalna shuru kar diya. Jab pehli baar mitti gadhe par giri, toh use ehsaas hua ki ab uska ant nishchit hai. Wo buri tarah rone laga. Par achanak, kuch hairatangez hua! Jaise hi doosri aur teesri baar mitti uski peeth par giri, gadhe ne rona band kar diya aur apne jism ko ek zor ka jhatka diya. Usne peeth par giri mitti ko niche giraya, aur us mitti ke dher par ek kadam upar rakh diya.\r\n\r\nLog mitti daalte gaye, aur gadha har baar ek hi kaam karta— \"Jhatko aur Upar Badho!\" Dheere-dheere mitti bharti gayi aur dekhte hi dekhte, wo gadha kuye ke kinare tak pahunch gaya aur ek lambi chhalang lagakar kuye se bahar nikal aaya! Sab log hairan reh gaye.\r\n\r\n💡 Damdar Seekh: Zindagi bhi aap par kabhi dar ki, kabhi asafalta ki aur kabhi logon ke taano ki mitti dalegi. Is mitti ke bojh tale dabne ke bajaye, isko jhatko aur usko apni seedhi (stairs) bana lo. Har badi problem aapko ek kadam upar uthane ke liye aati hai. Never, ever give up!', '2026-06-06 05:43:16'),
(3, 'Zanjeer Pairo Mein Nahi, Dimaag Mein Hai', 'Ek aadmi ek haathiyon ke camp se guzar raha tha. Usne dekha ki itne vishal aur taqatwar haathiyon ko kisi lohe ki moti zanjeer ya pinjre mein nahi rakha gaya tha. Unke pairo mein bas ek patli si rassi bandhi hui thi. Ek haathi chahe toh apni aadhi taqat lagakar bhi us rassi ko tod sakta tha, par wo aaram se khade the aur bhagne ki koi koshish nahi kar rahe the.\r\n\r\nHairan hokar usne mahawat (trainer) se pucha, \"Bhai, ye haathi itne shant kyun hain aur bhagne ki koshish kyun nahi kar rahe?\"\r\n\r\nMahawat ne muskurate hue kaha, \"Sahab! Jab ye haathi chhote bachhe the, tab hum inhein bandhne ke liye isi patli rassi ka istemal karte the. Us choti umar mein unhone is rassi ko todne ki bahut koshish ki, par rassi nahi tooti. Dheere-dheere unke dimaag mein ye baat baith gayi ki ye rassi unse zyada taqatwar hai. Ab ye itne bade aur taqatwar ho chuke hain, par aaj bhi inko yahi lagta hai ki ye rassi tod nahi sakte... isliye ye ab koshish hi nahi karte.\"\r\n\r\n💡 Damdar Seekh: Duniya mein bahut se log sirf isliye nayi koshish karna chhod dete hain kyunki wo past mein ek baar fail ho chuke hote hain. Asafalta sikhne ka ek hissa hai! Apne past ki nakamyabi ko apne aaj ka bandhan mat banne do. Aksar zanjeer hamare pairo mein nahi, hamari soch mein hoti hai!', '2026-06-06 05:43:42'),
(4, 'Aap Kise Khana Khilate Hain?', 'Ek gaon mein ek bahut hi samajhdar aur anubhavi buzurg rehte the. Ek din unka pota bhagta hua unke paas aaya aur bola, \"Dada ji, mere andar kabhi-kabhi bahut gussa aur jalan hoti hai, aur kabhi-kabhi bahut pyar aur shanti mehsoos hoti hai. Aisa kyun hota hai? Mujhe samajh nahi aata ki main kaisa insaan hu.\"\r\n\r\nBuzurg ne muskurakar use apne paas bithaya aur kaha, \"Beta, hum sabke dimaag ke andar har waqt do bhediyon (wolves) ke beech ek bhayanak ladai chal rahi hoti hai.\r\nPehla bhediya \'Negativity\' ka hai—isme gussa, jalan, dar, lalach, ahankar, aur aalas bhara hai.\r\nDoosra bhediya \'Positivity\' ka hai—isme shanti, pyar, ummeed, sachai, mehnat, aur vishwas hai.\"\r\n\r\nPota thodi der sochta raha aur fir usne masoomiyat se pucha, \"Toh dada ji, agar in dono mein har waqt ladai chal rahi hai, toh aakhir jeetta kaun sa bhediya hai?\"\r\n\r\nBuzurg ne uski aankhon mein dekha aur ek damdar jawab diya: \"Wahi bhediya jeetta hai, jise tum sabse zyada khana khilate ho!\"\r\n\r\n💡 Damdar Seekh: Aapka future waisa hi banega jaisi baatein aap apne dimaag mein dalenge. Agar aap har waqt negative sochenge, excuses denge, toh negativity jeetegi. Par agar aap positive soch, self-belief aur mehnat ko feed karenge, toh duniya ki koi takat aapko hara nahi sakti!', '2026-06-06 05:44:04');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
