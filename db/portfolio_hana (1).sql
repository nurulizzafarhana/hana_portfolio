-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_hana`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_contact`
--

CREATE TABLE `form_contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_contact`
--

INSERT INTO `form_contact` (`id`, `nama`, `phone_number`, `email`, `subject`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Sasha', '11235498765', 'sasha@gmail.com', 'Comission', 'Hi! Wejasndjasdhw9idaiksd', '2024-10-29 02:08:53', '2024-10-29 02:08:53', NULL),
(3, 'Saya', '525465213', 'saya@gmail.com', 'Minta uang', 'kdaoskdoaskds', '2024-10-29 02:20:21', '2024-10-29 02:20:21', NULL),
(4, 'Mina Myoi', '774135597', 'mina@gmail.com', 'Pretty', 'Kocak u', '2024-10-29 02:23:47', '2024-10-29 02:23:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `job` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `about_first_paragraph` text NOT NULL,
  `about_second_paragraph` text DEFAULT NULL,
  `dribbble_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `github_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `nama`, `job`, `description`, `logo`, `nickname`, `about_first_paragraph`, `about_second_paragraph`, `dribbble_link`, `linkedin_link`, `github_link`, `created_at`, `updated_at`) VALUES
(1, 'Nurul Izza Farhana', 'Front-End Web Developer', 'Wkewoekwoe', '19 forever.jpg', 'Hana', 'I am a passionate Informatics Management Associate Degree graduate currently pursuing my Bachelor\'s Degree in Informatics. With a strong foundation in web development, particularly in front-end technologies, I enjoy creating visually appealing and user-friendly websites.', 'I also have a keen interest in design, often exploring creative solutions to enhance user experiences. My journey in the tech field has equipped me with practical experience and insights, enabling me to effectively navigate challenges and innovate solutions in the ever-evolving digital landscape.', 'https://dribbble.com/farhanafraaije', 'https://www.linkedin.com/in/nurulizzafarhana/', 'https://github.com/nurulizzafarhana', '2024-10-28 13:15:24', '2024-10-29 11:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_desc` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_desc`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'COVID-19 Information Web', 'COVID-19 Information Web as a requirement to pass the competency test. (Tech Stack: HTML, CSS, Bootstrap, PHP)', 'covid-19 web.png', '2024-10-29 06:13:20', '2024-10-30 13:28:18'),
(4, 'MONEVNG', 'This web was developed during Internship - In this case, MONEVNG provides information and analysis regarding the list of blacklisted procurement providers. (Tech Stack: HTML, CSS, Java, JavaScript, and Play Framework)', 'monevng.png', '2024-10-29 06:14:58', '2024-10-30 13:28:02'),
(5, 'JLINE 005 - Web Design', 'Participated in Web Design project for JLlNE in collaboration with PT Permata Insan Nusantara (Tech Stack: HTML, CSS, Bootstrap)', 'jline_work.png', '2024-10-30 13:23:33', '2024-10-30 13:27:41'),
(6, 'SWOG Music', 'A static website, simple website store with simple design (Tech Stack: HTML, CSS, Bootstrap)', 'paramore.png', '2024-10-30 13:26:55', '2024-10-30 13:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `created_at`, `updated_at`) VALUES
(1, 'HTML', '2024-10-30 12:13:50', '2024-10-30 12:13:50'),
(2, 'CSS', '2024-10-30 12:17:34', '2024-10-30 12:17:34'),
(3, 'PHP', '2024-10-30 12:19:43', '2024-10-30 12:19:43'),
(4, 'Graphic Design', '2024-10-30 12:19:51', '2024-10-30 12:19:51'),
(5, 'Adobe Photoshop', '2024-10-30 12:34:28', '2024-10-30 12:34:28'),
(6, 'Adobe Illustrator', '2024-10-30 12:34:40', '2024-10-30 12:34:40'),
(7, 'Adobe After Effects', '2024-10-30 12:34:50', '2024-10-30 12:34:50'),
(8, 'Figma', '2024-10-30 12:44:24', '2024-10-30 12:44:56'),
(10, 'Canva', '2024-10-30 12:48:35', '2024-10-30 12:48:35'),
(11, 'Front-End Web Development', '2024-10-30 12:48:48', '2024-10-30 12:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `foto`, `created_at`, `updated_at`) VALUES
(6, 'Lulu', 'lulu@gmail.com', 'lul', 'Screenshot 2024-03-27 161227.png', '2024-10-27 13:47:08', '2024-10-29 06:24:02'),
(7, 'Nizar', 'fraaije@gmail.com', 'zar', 'Screenshot 2024-01-10 204045.png', '2024-10-28 11:27:38', '2024-10-28 11:27:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_contact`
--
ALTER TABLE `form_contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_contact`
--
ALTER TABLE `form_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
