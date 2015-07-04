-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2015 at 07:45 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialcompany`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(6, 'Courses'),
(1, 'Fun'),
(3, 'Meetings'),
(4, 'Photos'),
(5, 'Team Buildings'),
(2, 'Work');

-- --------------------------------------------------------

--
-- Table structure for table `chatrooms`
--

CREATE TABLE IF NOT EXISTS `chatrooms` (
  `chatroom_id` int(11) NOT NULL,
  `chat_title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chatrooms`
--

INSERT INTO `chatrooms` (`chatroom_id`, `chat_title`) VALUES
(1, 'ITTalent Party'),
(2, 'Hello there'),
(3, 'Work Discussion'),
(4, 'Some work disccussion'),
(5, 'How you doing'),
(6, 'chatroom');

-- --------------------------------------------------------

--
-- Stand-in structure for view `chatrooms_view`
--
CREATE TABLE IF NOT EXISTS `chatrooms_view` (
`chatroom_id` int(11)
,`participants` text
,`chat_title` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL,
  `body` mediumtext,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `body`, `post_id`, `author_id`) VALUES
(1, 'Test Comment', 8, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `comment_view`
--
CREATE TABLE IF NOT EXISTS `comment_view` (
`comment_id` int(11)
,`post_id` int(11)
,`body` mediumtext
,`user_id` int(11)
,`username` varchar(45)
,`first_name` varchar(45)
,`last_name` varchar(45)
,`profile_img_url` varchar(250)
,`numOfLikes` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `add_time` datetime NOT NULL,
  `event_time` date NOT NULL,
  `cover_img_url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `body`, `add_time`, `event_time`, `cover_img_url`) VALUES
(1, 'Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien.\r\n\r\nSed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique.\r\n\r\nUt tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi.\r\n\r\nQuisque condimentum neque vitae eleifend mattis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi ligula ex, vehicula ac tellus id, feugiat semper elit. Donec et nunc at mi pellentesque tincidunt vitae id mi. Quisque eleifend arcu eget lacus euismod lobortis. Curabitur feugiat pharetra suscipit. Nulla pulvinar lobortis luctus. Phasellus scelerisque justo metus, eget vestibulum metus aliquet non. Phasellus vel blandit dolor, at ullamcorper sem. Mauris feugiat neque nec justo dictum vulputate. Etiam hendrerit massa non aliquet sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas ullamcorper pharetra magna sed molestie. Vivamus a tempor libero. Vivamus vel lacus pharetra, porttitor arcu non, varius nisl.', '2015-07-03 08:48:46', '2015-07-07', '/storage/events/Party_party_bg.jpg'),
(2, 'ITTalents party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien. Sed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique. Ut tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi. Quisque condimentum neque vitae eleifend mattis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi ligula ex, vehicula ac tellus id, feugiat semper elit. Donec et nunc at mi pellentesque tincidunt vitae id mi. Quisque eleifend arcu eget lacus euismod lobortis. Curabitur feugiat pharetra suscipit. Nulla pulvinar lobortis luctus. Phasellus scelerisque justo metus, eget vestibulum metus aliquet non. Phasellus vel blandit dolor, at ullamcorper sem. Mauris feugiat neque nec justo dictum vulputate. Etiam hendrerit massa non aliquet sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas ullamcorper pharetra magna sed molestie. Vivamus a tempor libero. Vivamus vel lacus pharetra, porttitor arcu non, varius nisl.', '2015-07-03 08:56:23', '2015-07-10', '/storage/events/ITTalents _party_bg.jpg'),
(3, 'Company Team Building', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien. Sed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique. Ut tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi. Quisque condimentum neque vitae eleifend mattis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi ligula ex, vehicula ac tellus id, feugiat semper elit. Donec et nunc at mi pellentesque tincidunt vitae id mi. Quisque eleifend arcu eget lacus euismod lobortis. Curabitur feugiat pharetra suscipit. Nulla pulvinar lobortis luctus. Phasellus scelerisque justo metus, eget vestibulum metus aliquet non. Phasellus vel blandit dolor, at ullamcorper sem. Mauris feugiat neque nec justo dictum vulputate. Etiam hendrerit massa non aliquet sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas ullamcorper pharetra magna sed molestie. Vivamus a tempor libero. Vivamus vel lacus pharetra, porttitor arcu non, varius nisl.', '2015-07-03 08:57:08', '2015-08-14', '/storage/events/Company Te_blue_water_green_nature-wide.jpg'),
(4, 'ITTalents Interview', 'asdads', '2015-07-03 09:00:13', '2015-07-06', '/storage/events/ITTalents _sunset sunrise mountains clouds nature winter snow white sunlight_www.wallpapermay.com_86.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE IF NOT EXISTS `genders` (
  `gender_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`gender_id`, `name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `likes_comments`
--

CREATE TABLE IF NOT EXISTS `likes_comments` (
  `like_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes_comments`
--

INSERT INTO `likes_comments` (`like_id`, `comment_id`, `user_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes_posts`
--

CREATE TABLE IF NOT EXISTS `likes_posts` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes_posts`
--

INSERT INTO `likes_posts` (`like_id`, `post_id`, `user_id`) VALUES
(1, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL,
  `message` text,
  `add_time` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `chatroom_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message`, `add_time`, `user_id`, `chatroom_id`) VALUES
(1, 'Hello there', '2015-7-3 9:35:24', 6, 3),
(2, 'What do you do now?', '2015-7-3 9:35:57', 6, 3),
(3, 'Hi', '2015-7-3 10:14:54', 5, 4),
(4, 'How are you', '2015-7-3 10:14:58', 5, 4),
(5, 'Hi,', '2015-7-3 10:15:46', 1, 4),
(6, 'Good ,thanks', '2015-7-3 10:15:59', 1, 4),
(7, 'Hey Lora', '2015-7-3 10:17:59', 1, 5),
(8, 'Hey Mishu', '2015-7-3 10:18:48', 7, 5),
(9, 'this is message', '2015-7-3 12:43:45', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_chatroom`
--

CREATE TABLE IF NOT EXISTS `notifications_chatroom` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chatroom_id` int(11) NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications_chatroom`
--

INSERT INTO `notifications_chatroom` (`notification_id`, `user_id`, `chatroom_id`, `is_seen`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 1, 2, 0),
(4, 3, 2, 0),
(5, 1, 3, 0),
(6, 2, 3, 0),
(7, 3, 3, 0),
(8, 1, 4, 1),
(9, 2, 4, 1),
(10, 3, 4, 0),
(11, 7, 5, 1),
(12, 2, 6, 1),
(13, 3, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_post`
--

CREATE TABLE IF NOT EXISTS `notifications_post` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications_post`
--

INSERT INTO `notifications_post` (`notification_id`, `user_id`, `post_id`, `is_seen`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 1),
(3, 3, 1, 0),
(4, 4, 1, 0),
(5, 5, 1, 0),
(6, 7, 1, 0),
(7, 8, 1, 0),
(8, 1, 2, 0),
(9, 2, 2, 0),
(10, 3, 2, 0),
(11, 4, 2, 0),
(12, 5, 2, 0),
(13, 7, 2, 0),
(14, 8, 2, 0),
(15, 1, 3, 0),
(16, 2, 3, 0),
(17, 3, 3, 0),
(18, 4, 3, 0),
(19, 5, 3, 1),
(20, 7, 3, 0),
(21, 8, 3, 0),
(22, 1, 4, 0),
(23, 2, 4, 0),
(24, 3, 4, 0),
(25, 4, 4, 0),
(26, 5, 4, 0),
(27, 7, 4, 0),
(28, 8, 4, 0),
(29, 1, 5, 0),
(30, 2, 5, 0),
(31, 3, 5, 0),
(32, 4, 5, 0),
(33, 5, 5, 0),
(34, 1, 6, 0),
(35, 2, 6, 0),
(36, 3, 6, 0),
(37, 4, 6, 0),
(38, 5, 6, 0),
(39, 7, 6, 0),
(40, 8, 6, 0),
(41, 1, 7, 0),
(42, 2, 7, 0),
(43, 3, 7, 0),
(44, 4, 7, 0),
(45, 5, 7, 0),
(46, 1, 8, 0),
(47, 2, 8, 0),
(48, 3, 8, 0),
(49, 4, 8, 0),
(50, 5, 8, 0),
(51, 7, 8, 0),
(52, 8, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `body` longtext NOT NULL,
  `post_img_url` varchar(250) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `body`, `post_img_url`, `author_id`, `category_id`) VALUES
(1, 'Sync meeting', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien.\r\n\r\nSed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique.\r\n\r\nUt tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi.', NULL, 6, 3),
(2, 'Walk in the Mountain', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien.\r\n\r\nSed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique.\r\n\r\nUt tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi.', NULL, 6, 1),
(3, 'Business trip', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien.\r\n\r\nSed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique.\r\n\r\nUt tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi.', '/storage/posts/Business t_nature-3-1.jpg', 6, 2),
(4, 'Alpha meeting', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien.\r\n\r\nSed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique.\r\n\r\nUt tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi.', '/storage/posts/Alpha meet_nature-3-1.jpg', 6, 3),
(5, 'Beta Meeting', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien.\r\n\r\nSed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique.\r\n\r\nUt tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi.', '/storage/posts/Beta Meeti_bb93e9156047dc785855850769526fb6.jpg', 6, 3),
(6, 'Hello there', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien.\r\n\r\nSed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique.\r\n\r\nUt tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi.', '/storage/posts/Hello ther_sunset sunrise mountains clouds nature winter snow white sunlight_www.wallpapermay.com_86.jpg', 6, 1),
(7, 'This is a post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien.\r\n\r\nSed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique.\r\n\r\nUt tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi.', '/storage/posts/This is a _the-15-craziest-things-in-nature-you-wont-believe-actually-exist-4.jpg', 6, 4),
(8, 'Today Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis mattis ultricies. Fusce in ornare felis, feugiat facilisis nibh. Ut hendrerit enim ante, in consectetur mi blandit non. Morbi ac mauris sem. Sed sit amet pretium neque. Curabitur id fermentum sem, eget lobortis justo. Curabitur mauris eros, suscipit eu sapien id, ullamcorper sagittis sapien.\r\n\r\nSed ut eros elementum, tempor arcu ut, congue velit. Pellentesque dignissim, tortor volutpat fringilla viverra, arcu leo fermentum mauris, ut eleifend justo orci vel risus. Vestibulum egestas et nibh at molestie. Etiam convallis dolor id quam imperdiet fermentum. Duis nec ligula non ante accumsan ornare vitae id ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus lobortis orci, eget vehicula augue elementum in. Mauris nec odio sed sapien feugiat tristique.\r\n\r\nUt tincidunt eleifend mollis. Aliquam a turpis id risus posuere ullamcorper quis nec mauris. Nam vestibulum tincidunt congue. Ut sed tempus lorem. Praesent venenatis enim nec pretium ullamcorper. Curabitur et sem vel risus mattis bibendum et eget dui. Nulla quis convallis nisi.', NULL, 6, 1),
(9, 'Test ', 'Post Edit', NULL, 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `posts_to_users`
--

CREATE TABLE IF NOT EXISTS `posts_to_users` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts_to_users`
--

INSERT INTO `posts_to_users` (`id`, `post_id`, `user_id`) VALUES
(1, 1, 1),
(9, 2, 1),
(17, 3, 1),
(25, 4, 1),
(33, 5, 1),
(39, 6, 1),
(47, 7, 1),
(53, 8, 1),
(2, 1, 2),
(10, 2, 2),
(18, 3, 2),
(26, 4, 2),
(34, 5, 2),
(40, 6, 2),
(48, 7, 2),
(54, 8, 2),
(3, 1, 3),
(11, 2, 3),
(19, 3, 3),
(27, 4, 3),
(35, 5, 3),
(41, 6, 3),
(49, 7, 3),
(55, 8, 3),
(4, 1, 4),
(12, 2, 4),
(20, 3, 4),
(28, 4, 4),
(36, 5, 4),
(42, 6, 4),
(50, 7, 4),
(56, 8, 4),
(5, 1, 5),
(13, 2, 5),
(21, 3, 5),
(29, 4, 5),
(37, 5, 5),
(43, 6, 5),
(51, 7, 5),
(57, 8, 5),
(8, 1, 6),
(16, 2, 6),
(24, 3, 6),
(32, 4, 6),
(38, 5, 6),
(46, 6, 6),
(52, 7, 6),
(60, 8, 6),
(6, 1, 7),
(14, 2, 7),
(22, 3, 7),
(30, 4, 7),
(44, 6, 7),
(58, 8, 7),
(7, 1, 8),
(15, 2, 8),
(23, 3, 8),
(31, 4, 8),
(45, 6, 8),
(59, 8, 8),
(61, 9, 9);

-- --------------------------------------------------------

--
-- Stand-in structure for view `posts_view`
--
CREATE TABLE IF NOT EXISTS `posts_view` (
`post_id` int(11)
,`category_id` int(11)
,`title` varchar(250)
,`body` longtext
,`author_id` int(11)
,`post_img_url` varchar(250)
,`username` varchar(45)
,`numOfLikes` bigint(21)
,`numOfComments` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `name`) VALUES
(2, 'Alpha'),
(3, 'Beta'),
(1, 'ITTalent');

-- --------------------------------------------------------

--
-- Stand-in structure for view `team_view`
--
CREATE TABLE IF NOT EXISTS `team_view` (
`team_id` int(11)
,`name` varchar(45)
,`user_id` int(11)
,`username` varchar(45)
,`first_name` varchar(45)
,`last_name` varchar(45)
,`profile_img_url` varchar(250)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `soft_delete` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `is_approve` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `soft_delete`, `is_admin`, `is_approve`) VALUES
(1, 'misho', '$2y$12$YeDTCqhKnag/LSqIOb6n.OqhNLve9P8.Q3.3E2.S1eZU.OCjRqYua', 'Mihail', 'Mihaylov', NULL, 1, 1),
(2, 'ivan', '$2y$12$a7hARCZkFoZOhkmllDcFn.Ha0gsOKirlIEUwYmveJawUBzAkDm2RC', 'Ivan', 'Ivanov', NULL, 0, 1),
(3, 'pesho', '$2y$12$IJK8uEatA5H7UlhMq4QKM.bGKINcHEetarEbhC69bh0fb5qcHc7By', 'Pesho', 'Peshov', NULL, 0, 1),
(4, 'zaio', '$2y$12$Dnyyzyj1vGnOkvDCg39QN.uEHkzcU5kXJx7MXw1ePawugY2GUNtcS', 'Zaio', 'Baio', NULL, 0, 1),
(5, 'mecho', '$2y$12$Uti2HemFXynLOlJGBBIcXOSkQsboC99Qlme.NCVO2Ylqujto/q42y', 'Mecho', 'Puh', NULL, 0, 1),
(6, 'mimi', '$2y$12$4mbHnEKLeJOzFxdPr13s8OaDAWuHAhs4w35mWFG6Rc2zaIR1FA6Qy', 'Maria', 'Ivanova', NULL, 0, 1),
(7, 'lora', '$2y$12$MiiOYGfC.nQlUT6xA3b0zOspR8MD7wpW3v5dVqhruZfQ2XLW9r3N6', 'Lora', 'Dobreva', NULL, 0, 1),
(8, 'alexandra', '$2y$12$W.LGMSERvhSN.UJ64tsi4.pv1nPfvhGTclHBQMOvHKAaI.T61VOyq', 'Alexandra', 'Radeva', NULL, 0, 1),
(9, 'user', '$2y$12$7mHesVwVR1p3jJsu4OhGOuqx5DEZgKR4a8Sb1bTJgJjQ49O0uNB1C', 'Gabriel', 'Syarov', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_chatrooms`
--

CREATE TABLE IF NOT EXISTS `users_chatrooms` (
  `user_id` int(11) NOT NULL,
  `chatroom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_chatrooms`
--

INSERT INTO `users_chatrooms` (`user_id`, `chatroom_id`) VALUES
(1, 1),
(2, 1),
(6, 1),
(1, 2),
(3, 2),
(6, 2),
(1, 3),
(2, 3),
(3, 3),
(6, 3),
(1, 4),
(2, 4),
(3, 4),
(5, 4),
(1, 5),
(7, 5),
(1, 6),
(2, 6),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users_events`
--

CREATE TABLE IF NOT EXISTS `users_events` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_teams`
--

CREATE TABLE IF NOT EXISTS `users_teams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_teams`
--

INSERT INTO `users_teams` (`id`, `user_id`, `team_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(4, 5, 1),
(5, 6, 1),
(7, 7, 1),
(11, 9, 1),
(3, 2, 2),
(8, 6, 2),
(9, 8, 2),
(6, 8, 3),
(10, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_detail_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `profile_img_url` varchar(250) DEFAULT NULL,
  `cover_img_url` varchar(250) DEFAULT NULL,
  `university_name` varchar(250) DEFAULT NULL,
  `university_spec` varchar(250) DEFAULT NULL,
  `skills` text,
  `gender_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_detail_id`, `age`, `birthdate`, `email`, `phone`, `profile_img_url`, `cover_img_url`, `university_name`, `university_spec`, `skills`, `gender_id`, `user_id`) VALUES
(1, 23, '2015-07-15', 'mnm_misho@abv.bg', '0897945456', '/storage/imgs/misho/cv_photo.jpg', '/storage/imgs/misho/blue_water_green_nature-wide.jpg', 'TU Sofia', 'KST', 'HTML,CSS, PHP', 1, 1),
(2, 25, '2014-08-12', 'ivan.ivanov@abv.bg', '087978789', '/storage/imgs/ivan/George_Zimmerman_face-5.jpg', '/storage/imgs/ivan/bb93e9156047dc785855850769526fb6.jpg', 'SU Sofia', 'CS', 'C++, Java, etc', 1, 2),
(3, 32, '2015-01-05', 'zaio@gent.com', '0897789789', '/storage/imgs/zaio/george_osborne_low.jpg', '/storage/imgs/zaio/the-15-craziest-things-in-nature-you-wont-believe-actually-exist-4.jpg', 'TU  Sofia', 'KSI', 'Python, C++, C Mirosoft office', 1, 4),
(4, 25, '2015-04-13', 'mimi@gent.com', '0897456456', '/storage/imgs/mimi/lucys_bday_029.jpg', '/storage/imgs/mimi/nature_lady_by_sakimichan-d4o7plc.jpg', 'NBU', '', 'Dezign patterns,  MVC, OOP', 2, 6),
(5, 23, '2015-07-15', 'pesho@abv.bg', '0897789456', '/storage/imgs/pesho/rich-larry-ellison-1040cs0104111-1325691879.jpg', '/storage/imgs/pesho/the-15-craziest-things-in-nature-you-wont-believe-actually-exist-4.jpg', 'NBU', 'CS', 'HTML, PHP', 1, 3),
(6, 30, '2015-05-05', 'lora@abv.bg', '0897456123', '/storage/imgs/lora/185i0iroqd2idjpg.jpg', '/storage/imgs/lora/nature-3-1.jpg', 'SU Sofia', 'CS', 'CS, microsoft office', 2, 7),
(7, 20, '2015-06-02', 'mecho@abv.bg', '0987456456', '/storage/imgs/mecho/winnie-the-pooh.jpg', '/storage/imgs/mecho/the-15-craziest-things-in-nature-you-wont-believe-actually-exist-4.jpg', 'NBU', 'KST', 'HTML, CSS, ....', 1, 5),
(8, 22, '0000-00-00', 'gsyarov@gmail.com', '0888888888', '/storage/imgs/user/Person-Melanie-2012-07-4x6-1.jpg', NULL, '', '', '', 1, 9);

-- --------------------------------------------------------

--
-- Structure for view `chatrooms_view`
--
DROP TABLE IF EXISTS `chatrooms_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `chatrooms_view` AS select `us_ch`.`chatroom_id` AS `chatroom_id`,group_concat(`us`.`username` separator ',') AS `participants`,`ch`.`chat_title` AS `chat_title` from ((`users_chatrooms` `us_ch` left join `chatrooms` `ch` on((`ch`.`chatroom_id` = `us_ch`.`chatroom_id`))) join `users` `us` on((`us`.`user_id` = `us_ch`.`user_id`))) group by `us_ch`.`chatroom_id`;

-- --------------------------------------------------------

--
-- Structure for view `comment_view`
--
DROP TABLE IF EXISTS `comment_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comment_view` AS select `c`.`comment_id` AS `comment_id`,`c`.`post_id` AS `post_id`,`c`.`body` AS `body`,`us`.`user_id` AS `user_id`,`us`.`username` AS `username`,`us`.`first_name` AS `first_name`,`us`.`last_name` AS `last_name`,`ud`.`profile_img_url` AS `profile_img_url`,(select count(`likes_comments`.`like_id`) from `likes_comments` where (`likes_comments`.`comment_id` = `c`.`comment_id`) order by `likes_comments`.`comment_id`) AS `numOfLikes` from ((`comments` `c` join `users` `us` on((`us`.`user_id` = `c`.`author_id`))) join `user_details` `ud` on((`us`.`user_id` = `ud`.`user_id`)));

-- --------------------------------------------------------

--
-- Structure for view `posts_view`
--
DROP TABLE IF EXISTS `posts_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `posts_view` AS select `p`.`post_id` AS `post_id`,`p`.`category_id` AS `category_id`,`p`.`title` AS `title`,`p`.`body` AS `body`,`p`.`author_id` AS `author_id`,`p`.`post_img_url` AS `post_img_url`,`us`.`username` AS `username`,(select count(`likes_posts`.`like_id`) from `likes_posts` where (`likes_posts`.`post_id` = `p`.`post_id`) order by `likes_posts`.`post_id`) AS `numOfLikes`,(select count(`comments`.`comment_id`) from `comments` where (`comments`.`post_id` = `p`.`post_id`) order by `comments`.`post_id`) AS `numOfComments` from (`posts` `p` join `users` `us` on((`us`.`user_id` = `p`.`author_id`))) order by `p`.`post_id` desc;

-- --------------------------------------------------------

--
-- Structure for view `team_view`
--
DROP TABLE IF EXISTS `team_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `team_view` AS select `t`.`team_id` AS `team_id`,`t`.`name` AS `name`,`us`.`user_id` AS `user_id`,`us`.`username` AS `username`,`us`.`first_name` AS `first_name`,`us`.`last_name` AS `last_name`,`ud`.`profile_img_url` AS `profile_img_url` from (((`teams` `t` left join `users_teams` `u` on((`t`.`team_id` = `u`.`team_id`))) left join `users` `us` on((`u`.`user_id` = `us`.`user_id`))) left join `user_details` `ud` on((`ud`.`user_id` = `us`.`user_id`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `chatrooms`
--
ALTER TABLE `chatrooms`
  ADD PRIMARY KEY (`chatroom_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`,`post_id`,`author_id`), ADD KEY `fk_comments_posts1_idx` (`post_id`), ADD KEY `fk_comments_users1_idx` (`author_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `likes_comments`
--
ALTER TABLE `likes_comments`
  ADD PRIMARY KEY (`like_id`,`comment_id`,`user_id`), ADD KEY `fk_likes_comments_comments1_idx` (`comment_id`), ADD KEY `fk_likes_comments_users1_idx` (`user_id`);

--
-- Indexes for table `likes_posts`
--
ALTER TABLE `likes_posts`
  ADD PRIMARY KEY (`like_id`,`post_id`,`user_id`), ADD KEY `fk_likes_posts_posts1_idx` (`post_id`), ADD KEY `fk_likes_posts_users1_idx` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`,`user_id`,`chatroom_id`), ADD KEY `fk_messages_users3_idx` (`user_id`), ADD KEY `fk_messages_chatrooms1_idx` (`chatroom_id`);

--
-- Indexes for table `notifications_chatroom`
--
ALTER TABLE `notifications_chatroom`
  ADD PRIMARY KEY (`notification_id`,`user_id`,`chatroom_id`), ADD KEY `fk_chatroom_notifications_users1_idx` (`user_id`), ADD KEY `fk_chatroom_notifications_chatrooms1_idx` (`chatroom_id`);

--
-- Indexes for table `notifications_post`
--
ALTER TABLE `notifications_post`
  ADD PRIMARY KEY (`notification_id`,`user_id`,`post_id`), ADD KEY `fk_post_notifications_users1_idx` (`user_id`), ADD KEY `fk_post_notifications_posts1_idx` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`,`author_id`,`category_id`), ADD KEY `fk_posts_users1_idx` (`author_id`), ADD KEY `fk_posts_categories1_idx` (`category_id`);

--
-- Indexes for table `posts_to_users`
--
ALTER TABLE `posts_to_users`
  ADD PRIMARY KEY (`id`,`post_id`,`user_id`), ADD KEY `fk_posts_has_users_users1_idx` (`user_id`), ADD KEY `fk_posts_has_users_posts1_idx` (`post_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`), ADD KEY `INDEX` (`username`), ADD KEY `first_name` (`first_name`);

--
-- Indexes for table `users_chatrooms`
--
ALTER TABLE `users_chatrooms`
  ADD PRIMARY KEY (`user_id`,`chatroom_id`), ADD KEY `fk_users_has_chatrooms_chatrooms1_idx` (`chatroom_id`), ADD KEY `fk_users_has_chatrooms_users1_idx` (`user_id`);

--
-- Indexes for table `users_events`
--
ALTER TABLE `users_events`
  ADD PRIMARY KEY (`user_id`,`event_id`,`id`), ADD KEY `fk_users_has_events_events1_idx` (`event_id`), ADD KEY `fk_users_has_events_users1_idx` (`user_id`);

--
-- Indexes for table `users_teams`
--
ALTER TABLE `users_teams`
  ADD PRIMARY KEY (`id`,`user_id`,`team_id`), ADD KEY `fk_users_has_teams_teams1_idx` (`team_id`), ADD KEY `fk_users_has_teams_users1_idx` (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_detail_id`,`gender_id`,`user_id`), ADD KEY `fk_user_details_genders_idx` (`gender_id`), ADD KEY `fk_user_details_users1_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `chatrooms`
--
ALTER TABLE `chatrooms`
  MODIFY `chatroom_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `likes_comments`
--
ALTER TABLE `likes_comments`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `likes_posts`
--
ALTER TABLE `likes_posts`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `notifications_chatroom`
--
ALTER TABLE `notifications_chatroom`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `notifications_post`
--
ALTER TABLE `notifications_post`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts_to_users`
--
ALTER TABLE `posts_to_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users_teams`
--
ALTER TABLE `users_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `likes_comments`
--
ALTER TABLE `likes_comments`
ADD CONSTRAINT `fk_likes_comments_comments1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_likes_comments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `likes_posts`
--
ALTER TABLE `likes_posts`
ADD CONSTRAINT `fk_likes_posts_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_likes_posts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `fk_messages_chatrooms1` FOREIGN KEY (`chatroom_id`) REFERENCES `chatrooms` (`chatroom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_messages_users3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications_chatroom`
--
ALTER TABLE `notifications_chatroom`
ADD CONSTRAINT `fk_chatroom_notifications_chatrooms1` FOREIGN KEY (`chatroom_id`) REFERENCES `chatrooms` (`chatroom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_chatroom_notifications_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications_post`
--
ALTER TABLE `notifications_post`
ADD CONSTRAINT `fk_post_notifications_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_post_notifications_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `fk_posts_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_posts_users1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts_to_users`
--
ALTER TABLE `posts_to_users`
ADD CONSTRAINT `fk_posts_has_users_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_posts_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_chatrooms`
--
ALTER TABLE `users_chatrooms`
ADD CONSTRAINT `fk_users_has_chatrooms_chatrooms1` FOREIGN KEY (`chatroom_id`) REFERENCES `chatrooms` (`chatroom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_has_chatrooms_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_events`
--
ALTER TABLE `users_events`
ADD CONSTRAINT `fk_users_has_events_events1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_has_events_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_teams`
--
ALTER TABLE `users_teams`
ADD CONSTRAINT `fk_users_has_teams_teams1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_has_teams_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
ADD CONSTRAINT `fk_user_details_genders` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`gender_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_user_details_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
