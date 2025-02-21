-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2025 at 09:16 AM
-- Server version: 10.6.19-MariaDB-cll-lve
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcwok715_yjd`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_blocked`
--

CREATE TABLE `ac_blocked` (
  `users_id` int(11) DEFAULT NULL,
  `blocked_users_id` int(11) DEFAULT NULL,
  `is_reported` tinyint(4) NOT NULL DEFAULT 0,
  `dt_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_contacts`
--

CREATE TABLE `ac_contacts` (
  `users_id` int(11) NOT NULL,
  `contacts_id` int(11) NOT NULL,
  `dt_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ac_contacts`
--

INSERT INTO `ac_contacts` (`users_id`, `contacts_id`, `dt_updated`) VALUES
(2, 4, '2023-04-25 11:09:23'),
(2, 10, '2023-04-24 19:56:54'),
(4, 2, '2023-04-25 11:09:23'),
(4, 5, '2023-04-24 22:07:55'),
(5, 4, '2023-04-24 22:07:55'),
(10, 2, '2023-04-24 19:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `ac_groupchat`
--

CREATE TABLE `ac_groupchat` (
  `group_id` int(11) NOT NULL,
  `gc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ac_groupchat`
--

INSERT INTO `ac_groupchat` (`group_id`, `gc_id`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ac_guests`
--

CREATE TABLE `ac_guests` (
  `id` int(11) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `dt_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dt_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_guests_messages`
--

CREATE TABLE `ac_guests_messages` (
  `id` int(11) NOT NULL,
  `m_to` int(11) DEFAULT 0,
  `m_from` int(11) DEFAULT 0,
  `g_to` int(11) DEFAULT 0,
  `g_from` int(11) DEFAULT 0,
  `messages_count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_messages`
--

CREATE TABLE `ac_messages` (
  `id` int(11) NOT NULL,
  `m_from` int(11) NOT NULL DEFAULT 0,
  `m_to` int(11) NOT NULL,
  `g_to` int(11) DEFAULT 0,
  `g_from` int(11) DEFAULT 0,
  `g_random` varchar(64) DEFAULT '0',
  `message` text NOT NULL,
  `attachment` varchar(256) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `m_from_delete` tinyint(1) NOT NULL DEFAULT 0,
  `m_to_delete` tinyint(1) NOT NULL DEFAULT 0,
  `dt_updated` datetime DEFAULT NULL,
  `m_reply_id` int(11) DEFAULT 0,
  `reply_user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ac_messages`
--

INSERT INTO `ac_messages` (`id`, `m_from`, `m_to`, `g_to`, `g_from`, `g_random`, `message`, `attachment`, `is_read`, `m_from_delete`, `m_to_delete`, `dt_updated`, `m_reply_id`, `reply_user_id`) VALUES
(1, 2, 10, 0, 0, '0', 'hello', NULL, 0, 0, 0, '2023-04-24 19:56:54', 0, 0),
(2, 2, 4, 0, 0, '0', 'Hello', NULL, 0, 0, 0, '2023-04-25 11:09:23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ac_profiles`
--

CREATE TABLE `ac_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(256) DEFAULT NULL,
  `avatar` varchar(256) DEFAULT NULL,
  `size_small` tinyint(4) DEFAULT 0,
  `dark_mode` tinyint(4) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:offline;1:online;2:away;3:busy',
  `dt_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ac_profiles`
--

INSERT INTO `ac_profiles` (`id`, `user_id`, `fullname`, `avatar`, `size_small`, `dark_mode`, `status`, `dt_updated`) VALUES
(1, 2, 'justicehemming', NULL, 0, 0, 0, '2023-04-24 21:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `ac_settings`
--

CREATE TABLE `ac_settings` (
  `id` int(11) NOT NULL,
  `s_name` varchar(512) DEFAULT NULL,
  `s_value` text DEFAULT NULL,
  `dt_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ac_settings`
--

INSERT INTO `ac_settings` (`id`, `s_name`, `s_value`, `dt_updated`) VALUES
(1, 'admin_user_id', '2', '2019-10-19 05:57:53'),
(2, 'pagination_limit', '5', '2019-10-19 05:57:53'),
(3, 'include_url', NULL, '2019-10-19 05:57:53'),
(4, 'exclude_url', NULL, '2019-10-19 05:57:53'),
(5, 'img_upload_path', 'upload', '2019-03-06 00:00:00'),
(6, 'assets_path', 'assets', '2019-10-19 05:57:53'),
(8, 'is_groups', '1', '2019-10-19 05:57:53'),
(9, 'groups_table', 'groups', '2019-10-19 05:57:53'),
(10, 'groups_col_id', 'id', '2019-10-19 05:57:53'),
(11, 'groups_col_name', 'name', '2019-10-19 05:57:53'),
(12, 'users_table', 'users', '2019-10-19 05:57:53'),
(13, 'users_col_id', 'id', '2019-10-19 05:57:53'),
(14, 'users_col_email', 'email', '2019-10-19 05:57:53'),
(15, 'ug_table', 'users_groups', '2019-10-19 05:57:53'),
(16, 'ug_col_user_id', 'user_id', '2019-10-19 05:57:53'),
(17, 'ug_col_group_id', 'group_id', '2019-10-19 05:57:53'),
(18, 'include_or_exclude', '0', '2019-10-19 05:57:53'),
(19, 'guest_mode', '0', '2019-10-19 05:57:53'),
(20, 'guest_group_id', NULL, '2019-10-19 05:57:53'),
(21, 'site_name', 'AddChat Pro', '2019-10-19 05:57:53'),
(22, 'theme_colour', NULL, '2019-10-19 05:57:53'),
(23, 'site_logo', NULL, '2019-09-06 08:25:52'),
(24, 'chat_icon', NULL, '2019-09-06 08:24:20'),
(25, 'notification_type', '0', '2019-10-19 05:57:53'),
(26, 'pusher_app_id', NULL, '2019-10-19 05:57:53'),
(27, 'pusher_key', NULL, '2019-10-19 05:57:53'),
(28, 'pusher_secret', NULL, '2019-10-19 05:57:53'),
(29, 'pusher_cluster', NULL, '2019-10-19 05:57:53'),
(30, 'footer_text', 'AddChat | by Classiebit', '2019-10-19 05:57:53'),
(31, 'footer_url', 'https://classiebit.com/addchat-codeigniter-pro', '2019-10-19 05:57:53'),
(32, 'hide_email', '0', '2019-11-13 10:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `ac_users_messages`
--

CREATE TABLE `ac_users_messages` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `buddy_id` int(11) NOT NULL,
  `messages_count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `ac_users_messages`
--

INSERT INTO `ac_users_messages` (`id`, `users_id`, `buddy_id`, `messages_count`) VALUES
(1, 2, 10, 1),
(2, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `name` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `contact_id` int(11) NOT NULL,
  `contact_sender` varchar(255) NOT NULL,
  `sent_when` datetime NOT NULL DEFAULT current_timestamp(),
  `message_read` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`name`, `subject`, `message`, `contact_id`, `contact_sender`, `sent_when`, `message_read`) VALUES
('Hello', 'Testing', 'Hello my darling', 1, 'your@gmail.com', '2023-04-27 10:48:19', 1),
('Testing is funm', 'Tetsing', 'this was a test to see things', 2, 'justice@gmail.com', '2023-04-27 10:48:34', 1),
('Here is ', 'second test', 'with a date', 3, 'my@gmail.com', '2023-04-27 10:48:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `contest_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `rules` varchar(8000) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `author_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `start`, `end`, `author_id`, `description`) VALUES
(16, 'Test', '2025-02-11 20:06:00', '2025-02-12 23:06:00', 16, '<p>This is the best kind of event you could ever atte</p>');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(11, '70.74.100.130', 'jhemming93', 1740106492),
(12, '70.74.100.130', 'jhemming1', 1740106709),
(13, '70.74.100.130', 'justicehemming@gmail.com', 1740106821),
(14, '70.74.100.130', 'george', 1740106881),
(15, '70.74.100.130', 'Admin2', 1740107019),
(16, '70.74.100.130', 'Admin2', 1740117654),
(17, '70.74.100.130', 'Admin2', 1740117672),
(18, '70.74.100.130', 'Admin2', 1740117700),
(19, '70.74.100.130', 'Admin', 1740117814),
(20, '70.74.100.130', 'Admin', 1740117834);

-- --------------------------------------------------------

--
-- Table structure for table `profile_info`
--

CREATE TABLE `profile_info` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'default_profile.png',
  `description` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `job_field` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL DEFAULT 'default',
  `port_url` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile_info`
--

INSERT INTO `profile_info` (`user_id`, `first_name`, `last_name`, `profile_picture`, `description`, `company`, `school`, `job_field`, `theme`, `port_url`, `profile_id`) VALUES
(2, 'Justice', 'Hemming', 'person-1.png', 'I am a web Developer', 'none', 'NAIT', 'Web Developer', 'blue', 'https://justcreativedesign.ca/', 5),
(4, 'sarah', 'nopes', 'person-61.jpeg', 'Hello I am Sarah.', 'Google', 'MAcEwan', 'UI/UX Designer', 'blue', '', 6),
(8, 'phil', 'redmond', 'person-3.jpg', '<p>I teach at Nait.</p>', 'NAIT', '', 'Instructor', 'default', '', 11),
(7, 'George', 'George', 'person-4.jpg', '<p>I am an old Grumpy man.</p>', 'Daily Bugle', 'Harvard', 'Editor', 'default', '', 12),
(18, '', '', 'default_profile.png', 'My Name is Admin I am awesome', 'Nopey', '', 'Nopers', 'sunny', '', 21),
(19, '', '', 'umbrella_7.jpg', '', '', '', '', 'blue', '', 22);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `project_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`title`, `content`, `date`, `project_id`, `author_id`, `filename`, `published`) VALUES
('Marketing & Web Design', 'One of the many projects I worked on in NAIT that I am fond of, was a promotional campaign themed assignment. We needed to create discreet and subtle marketing ads that slowly revealed a move of our choice. Being a fan of the movie Small Soldiers growing up made this choice come easily.\r\n\r\nA challenge I faced in this project was creating modern day advertising with an old fashioned movie. With a lot of research, and playing around with various styles, I was eventually able to resolve the problem.\r\n\r\n?\r\n\r\nThrough the use of Illustrator and Photoshop, I was able to design a website mockup, as well as a window-themed advertisement intended to tease elements of the movie.', '2023-04-11', 11, 2, 'project_1.png', 0),
(' Dream tea rebrand', 'For a group project in school, we were tasked with selecting an existing brand to revamp. We selected Dream Tea Bubble Tea as our brand and as a group collaborated on a new logo, packaging, web site, and menu. We also created a marketing plan for their brand relaunch and social media campaign, which was my part of the project. Lastly, we created a video commercial for the brand and presented our refresh to our class. For the full presentation, click HERE.\r\n\r\n?\r\n\r\nIt was overall a very fun process to work as a team and create something fun and new for an existing brand. It was a project I was able to combine both my Marketing background and Design capabilities in. This project shows my ability to collaborate in a team and work the design process from start to finish.', '2023-04-11', 12, 7, 'dream.png', 0),
(' Spider-Man magazine advertisement', 'For a school project, I had to create a two-page magazine advertisement for a video game of our choice. I chose to do Spider-Man: Miles Morales as my game. We had to maintain a consistent color palette through both pages and use eye catching visuals that would draw the viewer into purchasing the game. My design received a lot of praise from my instructor and peers.\r\n\r\n?\r\n\r\nThis was a fun project to work on and I got to combine both my Photoshop and Illustrator skills for one project. I also had to work in a little copy-writing to make the captions and the game descriptions. This project shows my ability to make an advertisement for a product that is creative and on-brand.', '2023-04-11', 13, 7, 'spider.png', 0),
('Phil', 'Here\'s Phil\'s promo One-Pager that is sent to the thousands of radio stations, record companies, and really, really, important people that want to play his tunes. You can download the full-size One Pager here.', '2023-04-11', 14, 8, 'phil.png', 0),
('Popping Advertisment', 'A Visual Communications IV project where we were tasked to take a drink brand and revamp it in a retro style. I chose to take the intense, dude-bro feel out of Mountain Dew and create a more approachable look that everyone can enjoy! I learned a lot about the components incorporated in retro styling, such as typefaces, textures, and use of color. The elements that make up this project were all created in Adobe Illustrator and Photoshop.', '2023-04-11', 15, 4, 'pop.png', 0),
('Ryobi Poster', 'Working at Home Depot has afforded me the privilege to get an education and flexibly work. I have also had the chance to use my design skills to create functional but engaging advertisement. The most recent example of this is the this poster which is advertisg a promotion that Home Depot offers where you buy a lawnmower and get a free tool with it. \r\n\r\nThe merchandising Manger for the district was visiting the store for business\' when we started talking and I brought up I was in school for Web Development and that I enjoyed practicing my skills of making signs for Home Depot. I showed him a few of the signs that I created and he asked me to make a sign for the promotion as the signs he had he felt didn\'t tell a story.\r\n\r\nI came up with the design that you see and it was used in all the Edmonton area, and also head office became interested in the sign asking who had designed and made it. Working at Home Depot has afforded me the privilege to get an education and flexibly work. I have also had the chance to use my design skills to create functional but engaging advertisement. The most recent example of this is the this poster which is advertisg a promotion that Home Depot offers where you buy a lawnmower and get a free tool with it. \r\n\r\nThe merchandising Manger for the district was visiting the store for business\' when we started talking and I brought up I was in school for Web Development and that I enjoyed practicing my skills of making signs for Home Depot. I showed him a few of the signs that I created and he asked me to make a sign for the promotion as the signs he had he felt didn\'t tell a story.\r\n\r\nI came up with the design that you see and it was used in all the Edmonton area, and also head office became interested in the sign asking who had designed and made it. ', '2023-04-11', 17, 2, 'Ryobi_40V_(1).png', 1),
('North Saskatchewan River ', 'The North Saskatchewan River is a glacier-fed river that flows from the Canadian Rockies continental divide east to central Saskatchewan, where it joins with the South Saskatchewan River to make up the Saskatchewan River. Its water flows eventually into the Hudson Bay.\r\n\r\nThe Saskatchewan River system is the largest shared between the Canadian provinces of Alberta and Saskatchewan.[1] Its watershed includes most of southern and central Alberta and Saskatchewan.', '2023-04-16', 18, 8, 'sask-river.jpg', 0),
('Hello testing wigswyg', '<p>This is a test to see if this will work</p>', '2023-04-19', 19, 2, 'tablet.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects_contest`
--

CREATE TABLE `projects_contest` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `status`) VALUES
(2, '192.197.128.18', 'jhemming1', '$2y$12$MXNzPCm8SOtjlJVujBECqeTEFIbRBIlgYtde8a2TuEM8fttOCUjrS', 'justicehemming@gmail.com', NULL, NULL, '62bdb99b750bbefadd6b', '$2y$10$jmI.KsZr3IJqrZu8qJa54ejeTe/Fksw.sa3QeeH44s7D873LGDVCq', 1740106798, NULL, NULL, 1680540963, 1682630767, 1, 'Justice', 'Hemming', NULL, NULL, 1),
(4, '68.148.49.42', 'sarahn', '$2y$12$hYe2QM2P71sPvu/YWPTWMuG8CCno8aGYIozG7jC/Kxxnr6bJy8qKq', 'sarah@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1680558144, 1682355018, 1, 'sarah', 'nopes', NULL, NULL, 2),
(7, '68.148.49.42', 'george1', '$2y$10$4ZSw0PfJZiIRYHp/AsOTCeMXO6TuyzLqqCqvhVULNopNv4ZpdHaS.', 'george@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1681271078, 1681271101, 1, 'George', 'George', NULL, NULL, 1),
(8, '68.148.49.42', 'philr', '$2y$10$JomsQs.2X.Z.oBLBf0qg2eVAqNVxIXxhRnNEvNTwwuPkQRlH9cvHG', 'philr@nait.ca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1681271392, 1681679588, 1, 'phil', 'redmond', NULL, NULL, 1),
(18, '70.74.100.130', 'Admin2', '$2y$10$1xhcxR68QlfOImRtVgShG.xCZ0kXeJsEhR/SffZM7DaK1XWc5qySm', 'TEST@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1740107000, 1740107057, 1, 'Justice', 'Hemming', NULL, NULL, 1),
(19, '70.74.100.130', 'Admin', '$2y$12$jt5JO5IfsFFNeB1h6SlUyeGZJXi0wMjshraZIMatRFbL3EpikRPNW', 'admin@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1740117803, 1740140737, 1, 'Admin', 'Admin', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 2, 1),
(5, 4, 1),
(8, 7, 2),
(9, 8, 1),
(15, 18, 1),
(16, 19, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_blocked`
--
ALTER TABLE `ac_blocked`
  ADD UNIQUE KEY `user_id` (`users_id`,`blocked_users_id`);

--
-- Indexes for table `ac_contacts`
--
ALTER TABLE `ac_contacts`
  ADD UNIQUE KEY `users_id` (`users_id`,`contacts_id`);

--
-- Indexes for table `ac_guests`
--
ALTER TABLE `ac_guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_guests_messages`
--
ALTER TABLE `ac_guests_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_messages`
--
ALTER TABLE `ac_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_profiles`
--
ALTER TABLE `ac_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_settings`
--
ALTER TABLE `ac_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_users_messages`
--
ALTER TABLE `ac_users_messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id` (`users_id`,`buddy_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`contest_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_info`
--
ALTER TABLE `profile_info`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `projects_contest`
--
ALTER TABLE `projects_contest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_guests`
--
ALTER TABLE `ac_guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ac_guests_messages`
--
ALTER TABLE `ac_guests_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ac_messages`
--
ALTER TABLE `ac_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ac_profiles`
--
ALTER TABLE `ac_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ac_settings`
--
ALTER TABLE `ac_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ac_users_messages`
--
ALTER TABLE `ac_users_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contests`
--
ALTER TABLE `contests`
  MODIFY `contest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `profile_info`
--
ALTER TABLE `profile_info`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `projects_contest`
--
ALTER TABLE `projects_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile_info`
--
ALTER TABLE `profile_info`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
