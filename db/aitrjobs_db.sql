-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2022 at 01:42 PM
-- Server version: 10.3.34-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aitrjobs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_certificates`
--

CREATE TABLE `applicant_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_certificates`
--

INSERT INTO `applicant_certificates` (`id`, `user_id`, `certificate1`, `created_at`, `updated_at`) VALUES
(1, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 'XtLPHVhzrbBUkT6CjrFWEdpvUG6jfJ35kVkiT94e.pdf', '2022-02-27 13:21:36', '2022-02-27 13:21:36'),
(2, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 'public/Documents/mXFqReBfZufsftvzb0ewM1uBdTqu5JzwXRNX5IT4.pdf', '2022-03-02 05:13:31', '2022-03-02 05:13:31'),
(3, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'public/Documents/MDiPghVTb966qrN0YG1i6JVdOKThFzT3rzoauu3v.png', '2022-03-02 08:55:54', '2022-03-02 08:55:54'),
(7, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', 'public/Documents/j0Vz14tTBV2yIO9vNOhq87zJnU0juysrtWmV2oMv.pdf', '2022-03-15 01:54:29', '2022-03-15 01:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_documents`
--

CREATE TABLE `applicant_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_of_resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_documents`
--

INSERT INTO `applicant_documents` (`id`, `user_id`, `upload_resume`, `link_of_resume`, `created_at`, `updated_at`) VALUES
(1, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 'public/Resume/riX7b9xa3u1XbJ4ncQMjPM4YULmfMfDLEPf8LyGb.pdf', 'NA', '2022-02-27 13:10:09', '2022-03-02 05:29:46'),
(3, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'public/Resume/wbod1VXl8sr0ixtTTE3jAzKJfZdZDOFsmeoGkeMB.png', '524', '2022-03-02 08:55:22', '2022-03-02 08:55:22'),
(4, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 'public/Resume/0qakhEVEQzvAUKlz5B8F52j2qINgSH8u8ErDVXAa.pdf', 'NA', '2022-03-07 03:22:57', '2022-03-11 02:49:21'),
(5, 'LEpqoF2zqMR27EXr3t3sUDxEz4q1', 'public/Resume/WU1PwowTQOTXjCapsZbKFdgqqqm8IbX8m1cUCSbZ.pdf', 'NA', '2022-03-11 06:35:42', '2022-03-11 06:44:57'),
(6, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', 'public/Resume/CgCcEU4BxkRAoZ5Onnc9cQLEjfjpYFlYq66elP7Y.pdf', 'NA', '2022-03-15 01:51:29', '2022-03-15 01:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_educational_details`
--

CREATE TABLE `applicant_educational_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passout_yr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_educational_details`
--

INSERT INTO `applicant_educational_details` (`id`, `user_id`, `qualification`, `passout_yr`, `university`, `marks`, `specification`, `created_at`, `updated_at`) VALUES
(1, 'ECptXLJT3PTHCEbIbUPSoP326mu1', 'qualification', '2022', 'board 1', '50', NULL, '2022-02-27 12:39:08', '2022-02-27 12:39:08'),
(2, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'askdh', '1984', 'Amt', 'kh', NULL, '2022-03-02 08:50:18', '2022-03-02 08:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_personal_details`
--

CREATE TABLE `applicant_personal_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desired_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_personal_details`
--

INSERT INTO `applicant_personal_details` (`id`, `user_id`, `full_name`, `email`, `profession`, `phone_no`, `dob`, `skills`, `profile_image`, `about_me`, `desired_location`, `created_at`, `updated_at`) VALUES
(1, 'ECptXLJT3PTHCEbIbUPSoP326mu1', 'tu2', 'tu2@gmail.com', 'profession', '8452499863', '15/02/2015', 'skill', NULL, 'about', 'location', '2022-02-27 12:36:51', '2022-02-27 12:50:50'),
(2, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 'tu3', 'tu3@gmail.com', 'profession', '8426788535', '16/02/2015', 'skill', 'public/ProfileImages/lc36IHSUrahXxqza4SliR6dYNd4E1ZLa1zzappeS.jpg', 'about updated', 'location', '2022-02-27 12:53:10', '2022-03-02 05:39:10'),
(3, 'tdmxIRlh2MTKyddaLbtFKwEjL2u2', 'test phone account', 'testphone@gmail.com', 'profession', '8317400953', '22/02/2015', 'skill', NULL, 'abojt', 'location', '2022-02-27 22:49:23', '2022-02-27 22:49:23'),
(4, 'C97fHBcC0TQ0J70Jjvr8mNkf2l73', 'facebook', 'shubhamhandebgm@gmail.com', 'profession', '8423466895', '10/02/2015', 'skill', 'y9MgqcMNVtsLYrQMagdWSa5PWe3VA5lWUmjL5lgS.jpg', 'about', 'location', '2022-02-27 22:51:17', '2022-03-02 02:58:21'),
(5, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'Roshani', 'roshanisitlani@inindiatech.com', 'Business', '9987745215', '2022-01-01', 'akills2', NULL, 'about', 'Pune', '2022-03-02 08:49:55', '2022-03-02 08:49:55'),
(6, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 'amit Arya', 'aryanamit54@gmail.com', 'Maths', '9471071799', '23/04/1990', 'Mathematics', 'public/ProfileImages/pX36VyaLvCFXSoE4vjEEnt6x0DWgcuI2OYev5YG2.jpg', 'Maths Faculty', 'kota', '2022-03-03 03:36:54', '2022-03-03 11:50:31'),
(7, 'oxukZ6AvAderPAFxFy6fi5KzSfq2', 'ankit Upadhyay', 'ankitupadhyay1013@gmail.com', 'faculty', '9079357940', '13/03/1990', 'mathematics', NULL, 'mathematics', 'India', '2022-03-03 23:07:26', '2022-03-03 23:07:26'),
(8, 'yjJWH8aCPDUyWDiUzxEhGdjTxNz2', 'a', 'avs@gmail.com', 'hdb', '7740999944', '11/03/2022', 'hdj', NULL, 'ns', 'jsjd', '2022-03-11 03:04:24', '2022-03-11 03:04:24'),
(9, 'LEpqoF2zqMR27EXr3t3sUDxEz4q1', 'Dharmendra Kumar Vishwakarma', 'dharmendrav512230@gmail.com', 'ghj', '9889492742', '19/03/2009', 'abc', 'public/ProfileImages/9WNesGMVaAkkrJab1m2QQj49XnflPMtGx5jESWcG.webp', 'sghh', 'ghj', '2022-03-11 06:33:42', '2022-03-11 06:43:02'),
(10, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', 'artan', 'amit@gmail.com', '6lacz', '8648598879', '15/03/2022', 'Mathemati', NULL, 'Maths', 'bhopal', '2022-03-15 01:50:35', '2022-03-15 01:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_plans`
--

CREATE TABLE `applicant_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_currency` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_amount` int(11) NOT NULL,
  `allowed_messages` int(11) DEFAULT NULL,
  `job_applied_limit` int(11) DEFAULT NULL,
  `plan_duration` int(11) NOT NULL,
  `coupon_code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` int(11) DEFAULT NULL,
  `plan_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_coupon_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_plans`
--

INSERT INTO `applicant_plans` (`id`, `plan_name`, `plan_currency`, `plan_amount`, `allowed_messages`, `job_applied_limit`, `plan_duration`, `coupon_code`, `coupon_amount`, `plan_url`, `plan_coupon_url`, `callback_url`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Free', 'INR', 0, 20, 20, 30, NULL, 0, 'jk', NULL, 'https://aitrjobs.com/aitrjobs/public/myProfile?Plan=1', '2022-02-26 08:17:04', '2022-02-27 12:35:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_social_media`
--

CREATE TABLE `applicant_social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_social_media`
--

INSERT INTO `applicant_social_media` (`id`, `user_id`, `facebook_url`, `youtube_url`, `twitter_url`, `linkedin_url`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ECptXLJT3PTHCEbIbUPSoP326mu1', 'facebook', 'youtube', 'twitter', 'linkedin', '2022-02-27 12:39:27', '2022-02-27 12:39:27', 1),
(2, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 'facebook', 'youtube', 'NA', 'NA', '2022-02-27 13:24:32', '2022-02-27 13:24:32', 1),
(3, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'facebook', 'youtube', 'twitter', 'link', '2022-03-02 08:51:20', '2022-03-02 08:51:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_video_documents`
--

CREATE TABLE `applicant_video_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_of_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_video_documents`
--

INSERT INTO `applicant_video_documents` (`id`, `user_id`, `upload_video`, `link_of_video`, `created_at`, `updated_at`) VALUES
(1, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 'public/Videos/mAXNTeAzHDPXUIkAE69eMUHpxNjdojiJXcT6XkmH.mp4', 'link', '2022-03-02 05:34:34', '2022-03-02 05:34:34'),
(2, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'public/Videos/EUAmrWFzdcfc9JrQi6TC8dp7R89dhzgbbGZvmijd.mp4', NULL, '2022-03-02 09:08:46', '2022-03-02 09:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_work_histories`
--

CREATE TABLE `applicant_work_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_exp_years` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_exp_months` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `functional_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_joining` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_leaving` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achivements` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_work_histories`
--

INSERT INTO `applicant_work_histories` (`id`, `user_id`, `name_of_company`, `other_company`, `work_status`, `work_exp_years`, `work_exp_months`, `director_reference`, `industry_type`, `functional_area`, `annual_salary`, `date_of_joining`, `date_of_leaving`, `achivements`, `created_at`, `updated_at`) VALUES
(1, 'ECptXLJT3PTHCEbIbUPSoP326mu1', 'Company', NULL, 'Fresher', NULL, NULL, NULL, 'indus1', 'area1', '20000 - 30000', NULL, NULL, NULL, '2022-02-27 12:40:06', '2022-02-27 12:40:06'),
(2, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'company', 'acpitz', 'Fresher', NULL, NULL, '12345', 'indus1', 'area1', '20000-30000', '2022-01-01', '2022-01-01', 'achi', '2022-03-02 08:51:00', '2022-03-02 08:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_masters`
--

CREATE TABLE `blogs_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs_masters`
--

INSERT INTO `blogs_masters` (`id`, `blog_category_id`, `blog_heading`, `blog_image`, `blog_desc`, `created_at`, `updated_at`) VALUES
(1, NULL, 'abc', NULL, 'ahsduyhsd', NULL, NULL),
(2, NULL, 'klm', NULL, 'agjsdga', NULL, NULL),
(3, '2', 'kjhk', 'public/blogImages/7vqZUp76VkcIFfBwSXdcJt3Mg6yaXNrXQ79vahMk.png', 'kjh', '2022-03-01 04:52:12', '2022-03-01 04:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_category`, `created_at`, `updated_at`) VALUES
(1, 'bcat2', '2022-01-10 19:31:08', '2022-01-10 19:32:46'),
(2, 'askg', '2022-02-26 08:39:56', '2022-02-26 08:40:04'),
(3, 'assdf', '2022-03-01 04:51:23', '2022-03-01 04:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Cat', 'public/CategoryImages/5cbUnLC3W1NTaLr462C7jOrw8uF2vGMPejIvLiFF.png', NULL, '2022-02-24 09:24:01'),
(2, 'cat2', NULL, NULL, NULL),
(3, 'cat3', NULL, NULL, NULL),
(7, 'category sd', 'public/CategoryImages/q3Q00iFVcuW2y3J8B3SrlQn0vFwXnosCJeFU8GFZ.png', '2022-02-28 06:30:52', '2022-02-28 06:30:52'),
(8, 'caegory123', 'public/CategoryImages/POb77eYQkZI4dDnf25IrRkDXqJtipIeFALz0XcWX.png', '2022-03-01 04:34:00', '2022-03-01 04:34:50'),
(9, 'physics', 'public/CategoryImages/QO5QS3Id8L2H99dHBt4xyuZvChVSyHUbMeHeRxh9.png', '2022-03-15 01:19:24', '2022-03-15 01:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city`, `created_at`, `updated_at`) VALUES
(1, 1, 'city5', '2022-02-26 08:14:24', '2022-03-01 04:32:56'),
(2, 1, 'city3', '2022-02-26 08:14:36', '2022-02-26 08:17:40'),
(4, 3, 'BETTIAH', '2022-03-07 03:07:10', '2022-03-07 03:07:10'),
(5, 3, 'PATNA', '2022-03-07 03:07:19', '2022-03-07 03:07:19'),
(6, 4, 'GORAKHPUR', '2022-03-07 03:07:38', '2022-03-07 03:07:38'),
(7, 4, 'LUCKNOW', '2022-03-07 03:07:54', '2022-03-07 03:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interview_address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_designation` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `user_id`, `company_name`, `company_website`, `email_address`, `contact_no`, `state`, `city`, `pincode`, `employee_desc`, `interview_address`, `contact_person_name`, `contact_person_designation`, `created_at`, `updated_at`, `status`) VALUES
(1, 'c99ni4CPl7bKWqhlppGZZi1eOFj1', 'TE Comapany', 'website', 'te@gmail.com', '8317400953', 'state2', 'city1', '123456', 'description', 'address', 'person', 'designation', '2022-02-27 12:23:06', '2022-02-27 12:23:06', 1),
(2, 'plmsrv8b', 'ININDIA CORPORATION', '+917892460982', 'info@inindiatech.com', NULL, 'state2', 'city5', '560029', 'Manager', 'Bangalore', 'Afsar Pasha', 'Manager', '2022-03-02 03:06:51', '2022-03-02 03:06:51', 1),
(3, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'khkj', 'jhk', 'hk@gmail.com', NULL, 'state2', 'city5', 'jgh', 'gjh', 'gjhg', 'jhg', 'jh', '2022-03-02 06:55:44', '2022-03-02 06:55:44', 1),
(4, 'h4aoyOPXRIgzkRtqQl5mVGOnub72', 'aitrjobs', 'www.aitrjobs.com', 'aitrjobs@gmail.com', '8862999944', 'state2', 'city5', '324009', 'Hr', 'Dadabari kota', 'Amit Aryan', 'Senior Hr', '2022-03-03 03:47:19', '2022-03-03 03:47:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_admins`
--

CREATE TABLE `contact_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_admins`
--

INSERT INTO `contact_admins` (`id`, `user_id`, `name`, `email`, `phone_number`, `message`, `created_at`, `updated_at`) VALUES
(1, '1', 'Admin', 'adb@gmal.com', '99453454', 'asdgh', '2021-12-17 04:38:31', '2021-12-17 04:38:31'),
(2, '9EGaD24K7jfBnzsMBzndCjQSWkf2', 'testing user', 'testinguser@gmail.com', '8754122986', 'message', '2021-12-21 05:22:57', '2022-02-25 23:46:05'),
(3, '9EGaD24K7jfBnzsMBzndCjQSWkf2', 'tu3', 'tu3@gmail.com', '8345788643', 'message', '2022-01-21 05:21:15', '2022-02-25 23:46:05'),
(4, 'KDTwnTWBhohOqM5xvstVkFpvGvr1', 'Colin Root', 'te1@gmail.com', '8456799853', 'support message.', '2022-01-22 07:13:07', '2022-01-22 07:13:07'),
(5, '9EGaD24K7jfBnzsMBzndCjQSWkf2', 'Tu3', 'tu3@gnail.com', '8543988562', 'message', '2022-01-31 04:46:18', '2022-02-25 23:46:05'),
(6, '9EGaD24K7jfBnzsMBzndCjQSWkf2', 'Test', 'testinguser@gmail.com', '8734566753', 'message', '2022-02-10 07:41:13', '2022-02-25 23:46:05'),
(7, 'h4aoyOPXRIgzkRtqQl5mVGOnub72', 'bsdm', 'bsnz@gmail.com', '9471071799', 'hello sir', '2022-03-11 03:20:43', '2022-03-11 03:20:43'),
(8, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', 'amit', 'aryan@gmail.com', '9631624522', 'hlo sir', '2022-03-15 02:00:58', '2022-03-15 02:00:58'),
(9, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', 'amit', 'asdf@gmail.com', '7740999944', 'hi sir', '2022-03-15 02:02:36', '2022-03-15 02:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `employer_plans`
--

CREATE TABLE `employer_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_currency` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_amount` int(11) DEFAULT NULL,
  `message_limit` int(11) NOT NULL,
  `job_post_limit` int(11) DEFAULT NULL,
  `hiring_limit` int(11) DEFAULT NULL,
  `plan_duration` int(11) DEFAULT NULL,
  `coupon_code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` int(11) DEFAULT NULL,
  `plan_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_coupon_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_plans`
--

INSERT INTO `employer_plans` (`id`, `plan_name`, `plan_currency`, `plan_amount`, `message_limit`, `job_post_limit`, `hiring_limit`, `plan_duration`, `coupon_code`, `coupon_amount`, `plan_url`, `plan_coupon_url`, `callback_url`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Free', 'INR', 0, 20, 20, 20, 30, 'ABC', 0, 'abc', 'ad', 'https://aitrjobs.com/aitrjobs/public/myProfile?Plan=1', '2022-02-26 08:09:08', '2022-02-26 08:09:08', 1),
(2, 'Silver', 'INR', 1000, 20, 20, 20, 30, 'ABC', 500, 'abc', 'ad', 'https://aitrjobs.com/aitrjobs/public/myProfile?Plan=2', '2022-02-26 08:10:42', '2022-02-26 08:10:42', 1),
(3, 'gold', 'Rs', 100, 10, 5, 10, 60, NULL, 10, 'www.aitrjobs.com', NULL, 'https://aitrjobs.com/myProfile?Plan=3', '2022-03-11 03:36:30', '2022-03-11 03:36:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourite_jobs`
--

CREATE TABLE `favourite_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `favourite_status` tinyint(250) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourite_jobs`
--

INSERT INTO `favourite_jobs` (`id`, `user_id`, `job_id`, `created_at`, `updated_at`, `favourite_status`) VALUES
(56, NULL, 14, '2022-01-20 02:41:12', '2022-01-20 02:41:12', 1),
(57, NULL, 9, '2022-01-20 02:45:51', '2022-01-20 02:45:51', 1),
(58, NULL, 14, '2022-01-20 13:22:15', '2022-01-20 13:22:15', 1),
(59, NULL, 14, '2022-01-21 00:39:20', '2022-01-21 00:39:20', 1),
(60, NULL, 14, '2022-01-21 00:57:27', '2022-01-21 00:57:27', 1),
(71, 'mQ2UUKDfqTYUOpoELbSQWMGEg0b2', 14, '2022-01-21 06:16:47', '2022-01-21 06:16:47', 1),
(77, '9EGaD24K7jfBnzsMBzndCjQSWkf2', 12, '2022-01-22 02:47:38', '2022-02-25 23:46:05', 1),
(83, '59HLMxTAH7XLOUA4HXEc7hYYpEr1', 18, '2022-02-01 11:53:13', '2022-02-01 11:53:13', 1),
(84, '59HLMxTAH7XLOUA4HXEc7hYYpEr1', 18, '2022-02-01 11:53:13', '2022-02-01 11:53:13', 1),
(85, '9EGaD24K7jfBnzsMBzndCjQSWkf2', 24, '2022-02-10 07:59:10', '2022-02-25 23:46:05', 1),
(91, 'pekqncjt', 41, '2022-02-23 04:46:30', '2022-02-23 04:46:30', 1),
(92, '9EGaD24K7jfBnzsMBzndCjQSWkf2', 9, '2022-02-24 05:20:43', '2022-02-25 23:46:05', 1),
(93, NULL, 57, '2022-02-25 04:02:03', '2022-02-25 04:02:03', 1),
(94, NULL, 14, '2022-03-01 07:09:32', '2022-03-01 07:09:32', 1),
(95, NULL, 9, '2022-03-01 07:32:23', '2022-03-01 07:32:23', 1),
(96, NULL, NULL, '2022-03-01 08:11:11', '2022-03-01 08:11:11', 1),
(98, NULL, 16, '2022-03-01 09:02:07', '2022-03-01 09:02:07', 1),
(99, NULL, 16, '2022-03-01 09:02:49', '2022-03-01 09:02:49', 1),
(100, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 15, '2022-03-02 09:11:43', '2022-03-02 09:11:43', 1),
(101, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 16, '2022-03-02 09:11:45', '2022-03-02 09:11:45', 1),
(105, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 16, '2022-03-15 01:06:58', '2022-03-15 01:06:58', 1),
(113, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 15, '2022-03-15 01:07:20', '2022-03-15 01:07:20', 1),
(114, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 18, '2022-03-15 01:07:38', '2022-03-15 01:07:38', 1),
(117, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 12, '2022-03-15 01:22:33', '2022-03-15 01:22:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_statuses`
--

CREATE TABLE `jobs_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_education`
--

CREATE TABLE `job_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `educational_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_education`
--

INSERT INTO `job_education` (`id`, `educational_name`, `created_at`, `updated_at`) VALUES
(1, 'edu1', NULL, NULL),
(2, 'edu5', NULL, '2022-02-26 08:39:26'),
(3, 'edu3', '2022-02-26 08:39:19', '2022-02-26 08:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `job_experiances`
--

CREATE TABLE `job_experiances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `experiance_from` int(11) NOT NULL,
  `experiance_to` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_experiances`
--

INSERT INTO `job_experiances` (`id`, `experiance_from`, `experiance_to`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL),
(6, 5, 7, '2022-03-01 04:48:17', '2022-03-01 04:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `job_functional_areas`
--

CREATE TABLE `job_functional_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_industry_id` int(11) NOT NULL,
  `job_fun_area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_functional_areas`
--

INSERT INTO `job_functional_areas` (`id`, `job_industry_id`, `job_fun_area_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'area1', NULL, NULL),
(2, 1, 'area2', NULL, NULL),
(3, 2, 'area1', NULL, NULL),
(4, 1, 'area3', NULL, NULL),
(5, 1, 'fun1', '2022-02-26 08:20:05', '2022-02-26 08:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `job_industries`
--

CREATE TABLE `job_industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_industry_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_industries`
--

INSERT INTO `job_industries` (`id`, `job_industry_name`, `created_at`, `updated_at`) VALUES
(1, 'indus1', NULL, NULL),
(2, 'indus2', NULL, NULL),
(3, 'indua4', '2022-02-26 08:19:47', '2022-03-01 04:35:57'),
(4, 'Indus4', '2022-03-01 04:35:43', '2022-03-01 04:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `job_management`
--

CREATE TABLE `job_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `job_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_year` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_month` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_salary` int(11) DEFAULT NULL,
  `newmin_salary` int(11) DEFAULT NULL,
  `newmax_salary` int(11) DEFAULT NULL,
  `job_status` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `schedule_for` datetime DEFAULT NULL,
  `interview_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_test` int(11) DEFAULT NULL,
  `offline_test` int(11) DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_management`
--

INSERT INTO `job_management` (`id`, `user_id`, `company_id`, `job_id`, `exp_year`, `exp_month`, `expected_salary`, `newmin_salary`, `newmax_salary`, `job_status`, `schedule_for`, `interview_by`, `online_test`, `offline_test`, `resume`, `joining_date`, `created_at`, `updated_at`, `status`) VALUES
(1, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 1, '15', NULL, NULL, NULL, NULL, NULL, 'hired', '2022-02-28 12:00:00', 'james', 0, 1, NULL, NULL, '2022-02-27 12:53:52', '2022-02-27 13:01:33', 1),
(2, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 1, '16', NULL, NULL, NULL, NULL, NULL, 'under_review', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-27 12:56:35', '2022-02-27 12:56:35', 1),
(3, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 1, '16', NULL, NULL, NULL, NULL, NULL, 'under_review', '2023-03-02 00:00:00', NULL, 1, 0, NULL, NULL, '2022-03-02 09:11:48', '2022-03-02 09:24:37', 1),
(4, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 3, '18', NULL, NULL, NULL, NULL, NULL, 'under_review', '2022-03-23 12:00:00', NULL, NULL, 1, NULL, NULL, '2022-03-03 03:40:23', '2022-03-03 03:40:34', 1),
(5, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 1, '16', NULL, NULL, NULL, NULL, NULL, 'under_review', '2022-04-05 00:00:00', NULL, 1, 0, NULL, NULL, '2022-03-03 04:03:55', '2022-03-15 00:55:06', 1),
(6, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 1, '15', NULL, NULL, NULL, NULL, NULL, 'under_review', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 04:04:05', '2022-03-03 04:04:05', 1),
(7, 'oxukZ6AvAderPAFxFy6fi5KzSfq2', 3, '18', NULL, NULL, NULL, NULL, NULL, 'under_review', '2022-03-16 12:00:00', NULL, NULL, 1, NULL, NULL, '2022-03-03 23:09:02', '2022-03-03 23:09:45', 1),
(8, 'yjJWH8aCPDUyWDiUzxEhGdjTxNz2', 1, '16', NULL, NULL, NULL, NULL, NULL, 'under_review', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-11 03:53:15', '2022-03-11 03:53:15', 1),
(9, 'yjJWH8aCPDUyWDiUzxEhGdjTxNz2', 3, '18', NULL, NULL, NULL, NULL, NULL, 'under_review', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-11 03:53:29', '2022-03-11 03:53:29', 1),
(10, 'yjJWH8aCPDUyWDiUzxEhGdjTxNz2', 4, '19', NULL, NULL, NULL, NULL, NULL, 'shortlist', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-11 03:54:56', '2022-03-12 02:36:53', 1),
(11, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 4, '19', NULL, NULL, NULL, NULL, NULL, 'under_review', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-15 00:38:40', '2022-03-15 00:38:40', 1),
(12, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', 4, '19', NULL, NULL, NULL, NULL, NULL, 'under_review', '2022-03-24 12:00:00', NULL, 1, NULL, NULL, NULL, '2022-03-15 01:50:43', '2022-03-15 01:50:51', 1),
(13, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', 3, '18', NULL, NULL, NULL, NULL, NULL, 'under_review', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-15 02:16:30', '2022-03-15 02:16:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_masters`
--

CREATE TABLE `job_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_exp_from` int(11) NOT NULL,
  `work_exp_to` int(11) NOT NULL,
  `current_vacancy` int(11) NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_hiring_for` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_functional_area` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_role` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_shift` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_state` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_city` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_required` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_pofile_desc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_payment` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_live` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_link` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_salary` int(150) DEFAULT NULL,
  `max_salary` int(150) DEFAULT NULL,
  `job_status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highlight_job_status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_masters`
--

INSERT INTO `job_masters` (`id`, `user_id`, `job_title`, `job_desc`, `job_skill`, `category`, `work_exp_from`, `work_exp_to`, `current_vacancy`, `location_name`, `job_industry`, `company_hiring_for`, `job_functional_area`, `job_role`, `job_shift`, `job_state`, `job_city`, `job_type`, `education_required`, `candidate_pofile_desc`, `job_payment`, `job_live`, `job_link`, `min_salary`, `max_salary`, `job_status`, `highlight_job_status`, `created_at`, `updated_at`, `status`) VALUES
(9, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', 'title', 'description', 'skill', 'cat1', 1, 2, 5, 'location', 'indus1', 'company hiring for', 'area1', 'role', 'shif1', 'state1', 'city1', 'job1', 'edu1', 'describe', 'pay1', '30', 'link', 20000, 30000, 'Live', 0, '2021-12-15 01:53:40', '2021-12-20 23:31:26', 1),
(10, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', 'Post 2', 'description', 'skil', 'cat1', 1, 1, 5, 'location', 'indus1', 'company', 'area1', 'role', 'shif1', 'state1', 'city1', 'job1', 'edu1', 'description profile candidate', 'pay1', '30', 'website', 20000, 30000, 'Live', 0, '2021-12-17 02:29:38', '2021-12-17 02:29:38', 1),
(11, 'wo7aejib', 'TE job post title', 'description', 'skill', 'cat1', 1, 1, 10, 'location', 'indus1', 'male, female', 'area1', 'job role', 'shif1', 'state1', 'city1', 'job1', 'edu1', 'description about candidate', 'pay1', '30', 'link', 20000, 30000, 'Live', 0, '2022-01-19 19:25:11', '2022-02-10 19:37:26', 1),
(12, 'wo7aejib', 'TE job post title 3', 'description', 'skill', 'cat1', 1, 1, 5, 'location', 'indus1', 'male, female', 'area1', 'job role', 'shif1', 'state1', 'city1', 'job1', 'edu1', 'description candidate', 'pay1', '30', 'website', 20000, 30000, 'Live', 0, '2022-01-19 19:47:41', '2022-02-10 19:46:20', 1),
(13, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', 'TE job post title 5', 'description', 'skill', 'cat1', 1, 1, 10, 'location', 'indus1', 'male, female', 'area1', 'job role', 'shif1', 'state1', 'city1', 'job1', 'edu1', 'candidate description', 'pay1', '30', 'website', 20000, 30000, 'Close', 0, '2022-01-19 20:03:09', '2022-01-21 00:34:20', 1),
(14, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', 'TE job post title', 'description', 'skill', 'cat1', 1, 1, 5, 'location', 'indus1', 'male, female', 'area1', 'role', 'shif1', 'state1', 'city1', 'job1', 'edu1', 'candidate description', 'pay1', '30', 'website', 20000, 30000, 'Live', 0, '2022-01-19 20:05:31', '2022-02-10 19:36:43', 1),
(15, 'c99ni4CPl7bKWqhlppGZZi1eOFj1', 'TE New Server Post', 'description', 'skill', 'Cat', 1, 1, 5, 'location', 'indus1', 'male, female', 'area1', NULL, NULL, 'state2', 'city1', NULL, 'edu1', 'candidate description', NULL, '30', NULL, NULL, NULL, 'Live', 1, '2022-02-27 12:44:19', '2022-03-15 01:37:14', 1),
(16, 'c99ni4CPl7bKWqhlppGZZi1eOFj1', 'TE Server post 2', 'description', 'skill', 'Cat', 1, 1, 5, 'location', 'indus1', 'male,female', 'area1', NULL, NULL, 'state2', 'city1', NULL, 'edu1', 'candidate profile', NULL, '30', NULL, NULL, NULL, 'Live', 1, '2022-02-27 12:56:20', '2022-03-15 01:37:12', 1),
(17, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'JOb1', 'khjkj', 'kjhkh', 'cat2', 1, 1, 2, 'Loc1', 'indus1', 'jhg', 'area1', 'dev', NULL, 'state2', 'city5', 'job1', 'edu1', 'adasd', 'pay1', 'rewr', 'dsf', 20000, 30000, 'Live', 0, '2022-03-02 08:32:43', '2022-03-02 08:43:55', 0),
(18, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'kjh', 'kh', 'k', 'cat2', 2, 2, 1, 'jh', 'indus2', 'k', 'area1', 'h', NULL, 'state2', 'city5', 'job1', 'edu5', 'h', 'pay2', 'k', 'kjh', 20000, 30000, 'Live', 0, '2022-03-02 08:47:29', '2022-03-02 08:47:29', 1),
(19, 'h4aoyOPXRIgzkRtqQl5mVGOnub72', 'phy', 'Phy\nsalary 30k', 'B.tecj', 'Cat', 3, 3, 1, 'bth', 'indus1', 'jee', 'area1', NULL, NULL, 'BIHAR', 'BETTIAH', NULL, 'edu1', 'asd', NULL, '2', NULL, NULL, NULL, 'Live', 0, '2022-03-11 03:07:42', '2022-03-11 03:18:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_payment_masters`
--

CREATE TABLE `job_payment_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_payment_masters`
--

INSERT INTO `job_payment_masters` (`id`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 'pay1', NULL, NULL),
(2, 'pay2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_salaries`
--

CREATE TABLE `job_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_min_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_max_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_salaries`
--

INSERT INTO `job_salaries` (`id`, `job_min_salary`, `job_max_salary`, `created_at`, `updated_at`) VALUES
(1, '20000', '30000', NULL, NULL),
(2, '30000', '40000', NULL, NULL),
(3, '4000', '5000', '2022-02-26 08:39:36', '2022-02-26 08:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `job_shifts`
--

CREATE TABLE `job_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_shifts`
--

INSERT INTO `job_shifts` (`id`, `job_shift`, `created_at`, `updated_at`) VALUES
(1, 'shif1', NULL, NULL),
(2, 'shif2', NULL, NULL),
(3, 'shift4', '2022-02-26 08:39:00', '2022-02-26 08:39:08'),
(4, 'shift5', '2022-03-01 04:48:54', '2022-03-01 04:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `job_sub_types`
--

CREATE TABLE `job_sub_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  `job_subtype_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_sub_types`
--

INSERT INTO `job_sub_types` (`id`, `job_type_id`, `job_subtype_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'subtype45', NULL, '2022-02-26 08:35:35'),
(2, 2, 'subtype1', NULL, NULL),
(6, 1, 'subtype2', NULL, NULL),
(7, 1, 'subty7', '2022-02-26 08:35:24', '2022-02-26 08:37:31'),
(8, 2, 'sfdsd2sd', '2022-03-01 04:42:28', '2022-03-01 04:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `job_type_masters`
--

CREATE TABLE `job_type_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_type_masters`
--

INSERT INTO `job_type_masters` (`id`, `job_type_name`, `created_at`, `updated_at`) VALUES
(1, 'job1', NULL, NULL),
(2, 'job2', NULL, NULL),
(3, 'job3', '2022-02-26 08:31:30', '2022-02-26 08:31:30'),
(4, 'job4', '2022-02-26 08:32:42', '2022-02-26 08:32:42'),
(5, 'job6', '2022-02-26 08:34:56', '2022-02-26 08:35:05'),
(6, 'asghjasdasd', '2022-03-01 04:41:57', '2022-03-01 04:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `manage_pages`
--

CREATE TABLE `manage_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_pages`
--

INSERT INTO `manage_pages` (`id`, `page_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<p><strong>About Usee</strong></p>\r\n\r\n<p>We implemented Stripsde to introduce new billing and payment models and increased our trial conversion by 300%</p>\r\n\r\n<p><strong>Short</strong></p>\r\n\r\n<p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>\r\n\r\n<p><strong>Desc</strong></p>\r\n\r\n<p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>', NULL, '2022-03-01 04:54:16'),
(2, 'Privacy Policy', 'asd', NULL, NULL),
(3, 'Terms of service', '<p><strong>About Usee</strong></p>  <p>We implemented Stripsde to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Short</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Desc</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>', NULL, NULL),
(4, 'Userwriting', '<p><strong>About Usee</strong></p>  <p>We implemented Stripsde to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Short</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Desc</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>', NULL, NULL),
(5, 'Communications', '<p><strong>About Usee</strong></p>  <p>We implemented Stripsde to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Short</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Desc</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>', NULL, NULL),
(6, 'Lending Licenses', '<p><strong>About Usee</strong></p>  <p>We implemented Stripsde to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Short</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Desc</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>', NULL, NULL),
(7, 'How It works', '<p><strong>About Usee</strong></p>  <p>We implemented Stripsde to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Short</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Desc</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>', NULL, NULL),
(8, 'For Empolyers', '<p><strong>About Usee</strong></p>  <p>We implemented Stripsde to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Short</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>  <p><strong>Desc</strong></p>  <p>We implemented Stripe to introduce new billing and payment models and increased our trial conversion by 300%</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2021_09_16_061223_create_plans_table', 2),
(11, '2014_10_12_000000_create_users_table', 3),
(12, '2021_09_16_083437_create_job_masters_table', 4),
(13, '2021_09_16_105637_create_personal_details_table', 5),
(14, '2021_09_16_113138_create_company_details_table', 6),
(15, '2021_09_19_045609_create_sectors_table', 7),
(16, '2021_09_19_073855_create_social_media_table', 7),
(17, '2021_09_20_063228_create_payment_details_table', 7),
(18, '2021_09_21_051439_create_applicants_table', 7),
(19, '2021_09_22_054116_create_job_management_table', 7),
(20, '2021_09_22_080242_create_applicant_jobs_table', 7),
(21, '2021_09_22_102111_create_jobs_statuses_table', 7),
(22, '2021_11_12_122819_create_applicant_personal_details_table', 7),
(23, '2021_11_12_122908_create_applicant_educational_details_table', 7),
(24, '2021_11_12_123029_create_applicant_work_histories_table', 7),
(25, '2021_11_12_123121_create_applicant_documents_table', 7),
(26, '2021_11_15_085238_create_applicant_video_documents_table', 7),
(27, '2021_11_16_064454_create_applicant_certificates_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `notification_name`, `purpose`, `created_at`, `updated_at`) VALUES
(1, 'applied for the job', 'job apply', 'when user applied for the job', NULL, NULL),
(2, 'Job status updated to', 'job status update', 'when employer updated applicant job status', NULL, NULL),
(3, 'You have new Job Notification', 'new job', 'When Employer add new job post', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification_handlers`
--

CREATE TABLE `notification_handlers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliver_user_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliver_user_role` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `job_status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_handlers`
--

INSERT INTO `notification_handlers` (`id`, `user_id`, `user_role`, `notification_id`, `deliver_user_id`, `deliver_user_role`, `job_id`, `job_status`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Admin', '1', '1', NULL, NULL, NULL, '1', '2021-11-25 20:32:18', '2021-12-21 06:04:34'),
(2, '5555', '2', '1', '5555', '2', NULL, NULL, '1', '2021-12-16 01:27:09', '2022-02-24 04:33:58'),
(3, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', NULL, NULL, '1', '2021-12-17 08:00:46', '2022-02-25 23:46:05'),
(4, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', NULL, NULL, '1', '2021-12-21 06:04:33', '2022-02-25 23:46:05'),
(5, '46SUq2B6BgNIY1eNyFcF4GEbXCu2', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', NULL, NULL, '1', '2021-12-22 06:54:31', '2022-01-13 00:58:41'),
(6, 'S2tCxRCz3dYXU41pNT0bcByOFgI2', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', NULL, NULL, '1', '2021-12-22 08:49:51', '2022-01-13 00:58:42'),
(7, 'S2tCxRCz3dYXU41pNT0bcByOFgI2', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', NULL, NULL, '1', '2021-12-22 08:50:46', '2022-01-13 00:58:43'),
(8, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '1', '1', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '2', NULL, NULL, '1', '2022-01-13 00:35:06', '2022-01-13 01:28:51'),
(9, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', NULL, NULL, '1', '2022-01-13 02:00:47', '2022-01-13 02:00:48'),
(10, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '1', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', NULL, NULL, '1', '2022-01-13 02:03:17', '2022-01-13 02:03:18'),
(11, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '1', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', NULL, NULL, '1', '2022-01-13 02:09:14', '2022-01-13 04:14:22'),
(12, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', NULL, NULL, '1', '2022-01-13 02:12:16', '2022-01-13 04:14:23'),
(13, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, NULL, '1', '2022-01-13 04:14:20', '2022-01-13 04:14:23'),
(14, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, NULL, '1', '2022-01-13 04:15:55', '2022-01-13 04:15:56'),
(15, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:18:05', '2022-01-13 04:18:06'),
(16, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:20:06', '2022-01-13 04:45:01'),
(17, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:20:34', '2022-01-13 04:31:47'),
(18, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:21:09', '2022-01-13 04:31:48'),
(19, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:21:23', '2022-01-13 04:31:49'),
(20, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:21:42', '2022-01-13 04:31:50'),
(21, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:27:54', '2022-01-13 04:31:51'),
(22, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:28:56', '2022-01-13 04:45:02'),
(23, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:30:55', '2022-01-13 04:45:03'),
(24, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:31:11', '2022-01-13 04:31:53'),
(25, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:31:46', '2022-01-13 04:31:54'),
(26, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-13 04:45:00', '2022-01-13 04:45:04'),
(27, 'At6GhPiuuuNGPORZSByMITzff8q1', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', 9, 'under_review', '1', '2022-01-14 13:26:39', '2022-01-15 02:57:55'),
(28, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:47:02', '2022-01-15 02:57:56'),
(29, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:47:57', '2022-01-15 02:57:57'),
(30, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:49:11', '2022-01-15 02:57:57'),
(31, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:49:28', '2022-01-15 02:57:58'),
(32, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:49:52', '2022-01-15 02:57:59'),
(33, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:50:20', '2022-01-15 02:58:00'),
(34, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:50:34', '2022-01-15 02:58:01'),
(35, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:50:49', '2022-01-15 02:58:02'),
(36, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:51:02', '2022-01-15 02:58:02'),
(37, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:51:12', '2022-01-15 02:58:03'),
(38, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:51:31', '2022-01-15 02:58:04'),
(39, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:51:37', '2022-01-15 02:58:05'),
(40, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:51:58', '2022-01-15 02:58:06'),
(41, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:52:05', '2022-01-15 02:58:07'),
(42, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:52:31', '2022-01-15 02:58:07'),
(43, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:52:35', '2022-01-15 02:58:08'),
(44, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:52:48', '2022-01-15 02:58:09'),
(45, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:53:04', '2022-01-15 02:58:10'),
(46, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:54:01', '2022-01-15 02:58:11'),
(47, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:56:02', '2022-01-15 02:58:11'),
(48, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:56:19', '2022-01-15 02:58:12'),
(49, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:56:35', '2022-01-15 02:58:13'),
(50, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 02:57:54', '2022-01-15 02:58:14'),
(51, 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 9, 'hired', '1', '2022-01-15 03:02:39', '2022-01-15 03:02:40'),
(52, 'o5mocKiDiahT9Rp8GmhB0PNfHPA2', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', 10, 'under_review', '1', '2022-01-19 07:29:08', '2022-01-19 07:29:10'),
(53, 'o5mocKiDiahT9Rp8GmhB0PNfHPA2', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', 9, 'under_review', '1', '2022-01-19 08:04:28', '2022-01-19 08:04:29'),
(54, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 13, 'under_review', '1', '2022-01-20 01:52:33', '2022-02-25 23:46:05'),
(55, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 14, 'under_review', '1', '2022-01-20 02:14:28', '2022-02-25 23:46:05'),
(56, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 12, 'under_review', '1', '2022-01-20 04:29:25', '2022-02-25 23:46:05'),
(57, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 11, 'under_review', '1', '2022-01-20 04:44:15', '2022-02-25 23:46:05'),
(58, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 12, 'shortlist', '1', '2022-01-20 07:19:26', '2022-02-25 23:46:05'),
(59, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 12, 'under_review', '1', '2022-01-20 07:21:25', '2022-02-25 23:46:05'),
(60, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 12, 'shortlist', '1', '2022-01-20 07:21:32', '2022-02-25 23:46:05'),
(61, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'shortlist', '1', '2022-01-20 07:21:50', '2022-02-25 23:46:05'),
(62, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'hired', '1', '2022-01-20 07:22:27', '2022-02-25 23:46:05'),
(63, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 14, 'hired', '1', '2022-01-20 07:34:44', '2022-02-25 23:46:05'),
(64, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 12, 'hired', '1', '2022-01-20 07:45:48', '2022-02-25 23:46:05'),
(65, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 12, 'shortlist', '1', '2022-01-20 07:46:56', '2022-02-25 23:46:05'),
(66, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 12, 'hired', '1', '2022-01-20 07:47:10', '2022-02-25 23:46:05'),
(67, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', 'o5mocKiDiahT9Rp8GmhB0PNfHPA2', '1', 13, 'shortlist', '1', '2022-01-20 07:51:20', '2022-01-20 07:51:21'),
(68, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'shortlist', '1', '2022-01-20 07:53:09', '2022-02-25 23:46:05'),
(69, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'under_review', '1', '2022-01-20 07:53:44', '2022-02-25 23:46:05'),
(70, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 14, 'under_review', '1', '2022-01-20 07:53:58', '2022-02-25 23:46:05'),
(71, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 12, 'under_review', '1', '2022-01-20 07:54:07', '2022-02-25 23:46:05'),
(72, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'under_review', '1', '2022-01-20 08:12:38', '2022-02-25 23:46:05'),
(73, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'under_review', '1', '2022-01-20 08:13:29', '2022-02-25 23:46:05'),
(74, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'shortlist', '1', '2022-01-20 08:13:46', '2022-02-25 23:46:05'),
(75, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'under_review', '1', '2022-01-20 08:14:07', '2022-02-25 23:46:05'),
(76, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'shortlist', '1', '2022-01-20 12:42:39', '2022-02-25 23:46:05'),
(77, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 13, 'hired', '1', '2022-01-20 12:43:54', '2022-02-25 23:46:05'),
(78, 'pBT0cEaq5qRoeRbYZyG2W2fevnl2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 13, 'under_review', '1', '2022-01-20 13:52:47', '2022-01-20 13:52:49'),
(79, 'LKqOLCVjqGUoOgMdviKmmmTVPP62', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 13, 'under_review', '1', '2022-01-20 13:57:33', '2022-01-20 13:57:34'),
(80, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', 'LKqOLCVjqGUoOgMdviKmmmTVPP62', '1', 13, 'shortlist', '1', '2022-01-20 14:07:31', '2022-01-20 14:07:32'),
(81, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 14, 'reject', '1', '2022-01-21 01:00:27', '2022-02-25 23:46:05'),
(82, '14InRwGXrAP58WSnfdldyMM45BZ2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 14, 'under_review', '1', '2022-01-21 02:28:09', '2022-01-21 02:28:10'),
(83, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '14InRwGXrAP58WSnfdldyMM45BZ2', '1', 14, 'shortlist', '1', '2022-01-21 02:29:16', '2022-01-21 02:29:17'),
(84, 'mQ2UUKDfqTYUOpoELbSQWMGEg0b2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 14, 'under_review', '1', '2022-01-21 06:17:21', '2022-01-21 06:17:23'),
(85, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'KDTwnTWBhohOqM5xvstVkFpvGvr1', '2', 15, 'under_review', '1', '2022-01-22 07:19:35', '2022-02-25 23:46:05'),
(86, 'UGiyjyt72Gfa93rUkiLM1pHCQE33', '1', '1', 'FnBtiE4ioNMY0PPEoJdF1lhSgfV2', '2', 9, 'under_review', '1', '2022-01-27 09:35:12', '2022-01-27 09:35:13'),
(87, 'oCkiYa8MEgX1c7yf3oLI4399GoG2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 11, 'under_review', '1', '2022-01-27 09:38:00', '2022-01-27 09:38:02'),
(88, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 11, 'reject', '1', '2022-01-31 04:26:29', '2022-02-25 23:46:05'),
(89, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'xjEXE1VWs7TDcMzLCR0h2FMbmq03', '2', 18, 'under_review', '1', '2022-01-31 07:58:13', '2022-02-25 23:46:05'),
(90, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'xjEXE1VWs7TDcMzLCR0h2FMbmq03', '2', 17, 'under_review', '1', '2022-01-31 07:59:13', '2022-02-25 23:46:05'),
(91, 'xjEXE1VWs7TDcMzLCR0h2FMbmq03', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 18, 'shortlist', '1', '2022-01-31 08:00:21', '2022-02-25 23:46:05'),
(92, 'xjEXE1VWs7TDcMzLCR0h2FMbmq03', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 18, 'hired', '1', '2022-01-31 08:01:21', '2022-02-25 23:46:05'),
(93, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 19, 'under_review', '1', '2022-02-03 07:49:01', '2022-02-25 23:46:05'),
(94, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 19, 'shortlist', '1', '2022-02-03 07:51:16', '2022-02-25 23:46:05'),
(95, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 19, 'hired', '1', '2022-02-03 07:53:50', '2022-02-25 23:46:05'),
(96, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 19, 'under_review', '1', '2022-02-03 07:54:10', '2022-02-25 23:46:05'),
(97, 'bHBCk8wsjTSgwQRavx7kN4UezTh1', '1', '1', 'KDTwnTWBhohOqM5xvstVkFpvGvr1', '2', 15, 'under_review', '1', '2022-02-03 13:11:33', '2022-02-03 13:11:34'),
(98, 'LIMOosNgawfpedrZyh4HDmeiXt93', '1', '1', 'HllsEM65lofNJnyMGWmskyD9Waq1', '2', 20, 'under_review', '1', '2022-02-04 00:14:37', '2022-02-04 00:14:38'),
(99, 'bHBCk8wsjTSgwQRavx7kN4UezTh1', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 11, 'under_review', '1', '2022-02-04 03:59:01', '2022-02-04 03:59:02'),
(100, 'qqLZ3iHVhnZHlX8TxPn59Y9TMTC2', '1', '1', 'HllsEM65lofNJnyMGWmskyD9Waq1', '2', 20, 'under_review', '1', '2022-02-08 07:00:21', '2022-02-08 07:00:23'),
(101, 'qqLZ3iHVhnZHlX8TxPn59Y9TMTC2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 19, 'under_review', '1', '2022-02-08 07:01:45', '2022-02-08 07:01:46'),
(102, 'qqLZ3iHVhnZHlX8TxPn59Y9TMTC2', '1', '1', 'xjEXE1VWs7TDcMzLCR0h2FMbmq03', '2', 18, 'under_review', '1', '2022-02-08 07:02:07', '2022-02-08 07:02:08'),
(103, 'qqLZ3iHVhnZHlX8TxPn59Y9TMTC2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 16, 'under_review', '1', '2022-02-08 07:04:04', '2022-02-08 07:04:05'),
(104, 'qqLZ3iHVhnZHlX8TxPn59Y9TMTC2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 14, 'under_review', '1', '2022-02-08 07:04:45', '2022-02-08 07:04:46'),
(105, 'qqLZ3iHVhnZHlX8TxPn59Y9TMTC2', '1', '1', 'LftZAbbUdiYfDeeludVeIpC5Dpf1', '2', 27, 'under_review', '1', '2022-02-08 07:28:13', '2022-02-08 07:28:14'),
(106, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '1', 'ekscqt9mG3Rpi9bASZjJ927QwTz1', '2', 28, 'under_review', '1', '2022-02-09 01:41:49', '2022-02-09 01:41:50'),
(107, 'qqLZ3iHVhnZHlX8TxPn59Y9TMTC2', '1', '1', 'LftZAbbUdiYfDeeludVeIpC5Dpf1', '2', 25, 'under_review', '1', '2022-02-09 04:11:30', '2022-02-09 04:11:32'),
(108, 'ggAMy3xZ8xQyH9wsgGdMlvXqfv22', '1', '1', 'LftZAbbUdiYfDeeludVeIpC5Dpf1', '2', 27, 'under_review', '1', '2022-02-09 15:48:51', '2022-02-09 15:48:52'),
(109, 'LftZAbbUdiYfDeeludVeIpC5Dpf1', '2', '2', 'qqLZ3iHVhnZHlX8TxPn59Y9TMTC2', '1', 27, 'hired', '1', '2022-02-10 06:41:01', '2022-02-10 06:41:02'),
(110, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'ekscqt9mG3Rpi9bASZjJ927QwTz1', '2', 28, 'under_review', '1', '2022-02-10 07:50:28', '2022-02-25 23:46:05'),
(111, 'ekscqt9mG3Rpi9bASZjJ927QwTz1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 28, 'shortlist', '1', '2022-02-10 07:51:48', '2022-02-25 23:46:05'),
(112, 'ekscqt9mG3Rpi9bASZjJ927QwTz1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 28, 'hired', '1', '2022-02-10 07:52:32', '2022-02-25 23:46:05'),
(113, 'ekscqt9mG3Rpi9bASZjJ927QwTz1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 28, 'reject', '1', '2022-02-10 07:53:06', '2022-02-25 23:46:05'),
(114, 'ekscqt9mG3Rpi9bASZjJ927QwTz1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 28, 'hired', '1', '2022-02-10 07:53:18', '2022-02-25 23:46:05'),
(115, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 29, 'under_review', '1', '2022-02-11 00:29:07', '2022-02-25 23:46:05'),
(116, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 29, 'shortlist', '1', '2022-02-11 01:15:26', '2022-02-25 23:46:05'),
(117, '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 29, 'under_review', '1', '2022-02-11 01:15:48', '2022-02-25 23:46:05'),
(118, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'Ap2W35AalkchAeXw2YLHH4ZVULz1', '2', 32, 'under_review', '1', '2022-02-11 06:53:09', '2022-02-25 23:46:05'),
(119, 'Ap2W35AalkchAeXw2YLHH4ZVULz1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 32, 'shortlist', '1', '2022-02-11 07:27:39', '2022-02-25 23:46:05'),
(120, 'Ap2W35AalkchAeXw2YLHH4ZVULz1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 32, 'hired', '1', '2022-02-11 07:29:04', '2022-02-25 23:46:05'),
(121, 'Ap2W35AalkchAeXw2YLHH4ZVULz1', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 32, 'shortlist', '1', '2022-02-11 07:42:25', '2022-02-25 23:46:05'),
(122, 'WWAzgtdmIbTPULnqCactlXARTqt2', '1', '1', 'UnZFui8mG7XrorihceSbLfrwCkh2', '2', 34, 'under_review', '1', '2022-02-14 06:50:41', '2022-02-14 06:50:43'),
(123, 'WWAzgtdmIbTPULnqCactlXARTqt2', '1', '1', 'ebICD2IePFaIBa9Ncg6Xn9HLrjX2', '2', 35, 'under_review', '1', '2022-02-14 07:06:26', '2022-02-14 07:06:27'),
(124, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '1', 'ebICD2IePFaIBa9Ncg6Xn9HLrjX2', '2', 35, 'under_review', '1', '2022-02-16 07:34:33', '2022-02-16 07:34:35'),
(125, 'UnZFui8mG7XrorihceSbLfrwCkh2', '2', '2', 'WWAzgtdmIbTPULnqCactlXARTqt2', '1', 34, 'shortlist', '1', '2022-02-17 00:52:25', '2022-02-17 00:52:26'),
(126, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '1', 'UnZFui8mG7XrorihceSbLfrwCkh2', '2', 34, 'under_review', '1', '2022-02-17 01:18:36', '2022-02-17 01:18:37'),
(127, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '1', 'Ap2W35AalkchAeXw2YLHH4ZVULz1', '2', 33, 'under_review', '1', '2022-02-17 01:29:52', '2022-02-17 01:29:53'),
(128, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '1', '1V6AnYfZX8WKZ97szpjRkcOsUNl1', '2', 29, 'under_review', '1', '2022-02-17 02:26:45', '2022-02-17 02:26:46'),
(129, 'UnZFui8mG7XrorihceSbLfrwCkh2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 34, 'hired', '1', '2022-02-17 02:31:15', '2022-02-17 02:31:16'),
(130, 'UnZFui8mG7XrorihceSbLfrwCkh2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 34, 'shortlist', '1', '2022-02-17 02:31:42', '2022-02-17 02:31:43'),
(131, 'UnZFui8mG7XrorihceSbLfrwCkh2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 34, 'shortlist', '1', '2022-02-17 02:32:44', '2022-02-17 02:32:45'),
(132, 'UnZFui8mG7XrorihceSbLfrwCkh2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 34, 'hired', '1', '2022-02-17 02:56:02', '2022-02-17 02:56:03'),
(133, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'JPv4Rw94XBQoTrByAabc2F82PVT2', '2', 36, 'under_review', '1', '2022-02-18 23:40:05', '2022-02-25 23:46:05'),
(134, 'JPv4Rw94XBQoTrByAabc2F82PVT2', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 36, 'shortlist', '1', '2022-02-19 04:20:03', '2022-02-25 23:46:05'),
(135, 'JPv4Rw94XBQoTrByAabc2F82PVT2', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 36, 'hired', '1', '2022-02-19 04:20:47', '2022-02-25 23:46:05'),
(136, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'ebICD2IePFaIBa9Ncg6Xn9HLrjX2', '2', 35, 'under_review', '1', '2022-02-19 04:46:47', '2022-02-25 23:46:05'),
(137, 'g5BjpohN5uQHFF4ecv97vbdHVZN2', '1', '1', 'Q4pp6y8sW7TvDIJz4ps1BCTlRVC3', '2', 37, 'under_review', '1', '2022-02-20 09:26:33', '2022-02-20 09:26:34'),
(138, 'g5BjpohN5uQHFF4ecv97vbdHVZN2', '1', '1', 'JPv4Rw94XBQoTrByAabc2F82PVT2', '2', 36, 'under_review', '1', '2022-02-20 09:27:14', '2022-02-20 09:27:15'),
(139, 'ebICD2IePFaIBa9Ncg6Xn9HLrjX2', '2', '2', 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', 35, 'shortlist', '1', '2022-02-20 09:31:15', '2022-02-20 09:31:16'),
(140, 'g5BjpohN5uQHFF4ecv97vbdHVZN2', '1', '1', 'ebICD2IePFaIBa9Ncg6Xn9HLrjX2', '2', 38, 'under_review', '1', '2022-02-20 09:57:53', '2022-02-20 09:57:57'),
(141, '3fvGlkpDZcSmPDliZ6pGyqMCVKn1', '1', '1', '16rUfZ04wUhpt6yfWWO3iD39gtD3', '2', 39, 'under_review', '1', '2022-02-20 10:13:03', '2022-02-20 10:13:04'),
(142, '3fvGlkpDZcSmPDliZ6pGyqMCVKn1', '1', '1', 'JPv4Rw94XBQoTrByAabc2F82PVT2', '2', 36, 'under_review', '1', '2022-02-20 10:28:04', '2022-02-20 10:28:05'),
(143, 'DTHSwskHdRWM7LVvTmyxeY0HIFq1', '1', '1', '16rUfZ04wUhpt6yfWWO3iD39gtD3', '2', 39, 'under_review', '1', '2022-02-21 01:57:10', '2022-02-21 01:57:11'),
(144, 'DTHSwskHdRWM7LVvTmyxeY0HIFq1', '1', '1', 'Q4pp6y8sW7TvDIJz4ps1BCTlRVC3', '2', 37, 'under_review', '1', '2022-02-21 01:58:00', '2022-02-21 01:58:01'),
(145, 'JPv4Rw94XBQoTrByAabc2F82PVT2', '2', '2', 'g5BjpohN5uQHFF4ecv97vbdHVZN2', '1', 36, 'shortlist', '1', '2022-02-21 04:02:03', '2022-02-21 04:02:04'),
(146, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', '16rUfZ04wUhpt6yfWWO3iD39gtD3', '2', 39, 'under_review', '1', '2022-02-21 08:04:22', '2022-02-25 23:46:05'),
(147, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'Q4pp6y8sW7TvDIJz4ps1BCTlRVC3', '2', 37, 'under_review', '1', '2022-02-21 08:06:41', '2022-02-25 23:46:05'),
(148, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'UnZFui8mG7XrorihceSbLfrwCkh2', '2', 34, 'under_review', '1', '2022-02-21 08:07:02', '2022-02-25 23:46:05'),
(149, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'LftZAbbUdiYfDeeludVeIpC5Dpf1', '2', 27, 'under_review', '1', '2022-02-22 04:43:56', '2022-02-25 23:46:05'),
(150, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'HllsEM65lofNJnyMGWmskyD9Waq1', '2', 20, 'under_review', '1', '2022-02-22 04:48:57', '2022-02-25 23:46:05'),
(151, '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', '1', 'UoV2TDqybYUHIzXhxSIWLO7Ircv2', '2', 40, 'under_review', '1', '2022-02-22 05:20:33', '2022-02-26 02:01:00'),
(152, 'UoV2TDqybYUHIzXhxSIWLO7Ircv2', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 40, 'reject', '1', '2022-02-22 05:29:24', '2022-02-26 02:01:00'),
(153, 'UoV2TDqybYUHIzXhxSIWLO7Ircv2', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 40, 'shortlist', '1', '2022-02-22 05:29:26', '2022-02-26 02:01:00'),
(154, 'UoV2TDqybYUHIzXhxSIWLO7Ircv2', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 40, 'shortlist', '1', '2022-02-22 05:29:34', '2022-02-26 02:01:00'),
(155, 'r4kFs22Xs4Z15S9n9hLCKlaw4t92', '1', '1', 'UoV2TDqybYUHIzXhxSIWLO7Ircv2', '2', 41, 'under_review', '1', '2022-02-22 09:06:16', '2022-02-26 02:01:00'),
(156, 'r4kFs22Xs4Z15S9n9hLCKlaw4t92', '1', '1', 'UoV2TDqybYUHIzXhxSIWLO7Ircv2', '2', 40, 'under_review', '1', '2022-02-22 09:07:52', '2022-02-26 02:01:00'),
(157, 'pekqncjt', '1', '1', 'UoV2TDqybYUHIzXhxSIWLO7Ircv2', '2', 41, 'under_review', '1', '2022-02-23 04:46:36', '2022-02-26 02:01:00'),
(158, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '3', NULL, NULL, NULL, NULL, NULL, '2022-02-24 04:56:22', '2022-02-24 04:56:22'),
(159, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '3', NULL, NULL, NULL, NULL, NULL, '2022-02-24 04:59:07', '2022-02-24 04:59:07'),
(160, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '3', NULL, NULL, NULL, NULL, NULL, '2022-02-24 05:00:14', '2022-02-24 05:00:14'),
(161, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '3', NULL, NULL, NULL, NULL, NULL, '2022-02-24 05:00:54', '2022-02-24 05:00:54'),
(162, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '3', NULL, NULL, NULL, NULL, NULL, '2022-02-24 05:01:50', '2022-02-24 05:01:50'),
(163, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '3', NULL, NULL, NULL, NULL, NULL, '2022-02-24 05:02:31', '2022-02-24 05:02:31'),
(164, 'V8p9Vew1QdWp2muJADbwdjVsS9i1', '1', '3', NULL, NULL, NULL, NULL, NULL, '2022-02-24 05:02:58', '2022-02-24 05:02:58'),
(165, 'wo7aejib', '2', '2', '9EGaD24K7jfBnzsMBzndCjQSWkf2', '1', 11, 'under_review', NULL, '2022-02-24 10:20:29', '2022-02-25 23:46:05'),
(166, 'c99ni4CPl7bKWqhlppGZZi1eOFj1', '2', '2', '06E7bEwtbxQYUbuAi0A2UBREmhp1', '1', 15, 'shortlist', NULL, '2022-02-27 12:58:24', '2022-02-27 12:58:24'),
(167, 'c99ni4CPl7bKWqhlppGZZi1eOFj1', '2', '2', '06E7bEwtbxQYUbuAi0A2UBREmhp1', '1', 15, 'hired', NULL, '2022-02-27 13:01:33', '2022-02-27 13:01:33'),
(168, 'ECptXLJT3PTHCEbIbUPSoP326mu1', '1', '3', NULL, NULL, NULL, NULL, NULL, '2022-03-02 08:32:43', '2022-03-02 08:32:43'),
(169, 'ennJoaSx7QO5j6pOhpmkA5BMr803', '1', '1', 'c99ni4CPl7bKWqhlppGZZi1eOFj1', '2', 16, 'under_review', NULL, '2022-03-02 09:11:48', '2022-03-02 09:11:48'),
(170, '0', '0', '3', 'ennJoaSx7QO5j6pOhpmkA5BMr803', '1', 18, 'under_review', NULL, '2022-03-03 03:40:23', '2022-03-03 03:40:23'),
(171, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', '1', '1', 'c99ni4CPl7bKWqhlppGZZi1eOFj1', '2', 16, 'under_review', NULL, '2022-03-03 04:03:55', '2022-03-03 04:03:55'),
(172, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', '1', '1', 'c99ni4CPl7bKWqhlppGZZi1eOFj1', '2', 15, 'under_review', NULL, '2022-03-03 04:04:05', '2022-03-03 04:04:05'),
(173, '0', '0', '3', 'ennJoaSx7QO5j6pOhpmkA5BMr803', '1', 18, 'under_review', NULL, '2022-03-03 23:09:02', '2022-03-03 23:09:02'),
(174, '0', '0', '3', 'c99ni4CPl7bKWqhlppGZZi1eOFj1', '2', 16, 'under_review', NULL, '2022-03-11 03:53:15', '2022-03-11 03:53:15'),
(175, '0', '0', '3', 'ennJoaSx7QO5j6pOhpmkA5BMr803', '1', 18, 'under_review', NULL, '2022-03-11 03:53:29', '2022-03-11 03:53:29'),
(176, '0', '0', '3', 'h4aoyOPXRIgzkRtqQl5mVGOnub72', '2', 19, 'under_review', NULL, '2022-03-11 03:54:56', '2022-03-11 03:54:56'),
(177, 'h4aoyOPXRIgzkRtqQl5mVGOnub72', '2', '2', 'yjJWH8aCPDUyWDiUzxEhGdjTxNz2', '1', 19, 'reject', NULL, '2022-03-12 02:36:22', '2022-03-12 02:36:22'),
(178, 'h4aoyOPXRIgzkRtqQl5mVGOnub72', '2', '2', 'yjJWH8aCPDUyWDiUzxEhGdjTxNz2', '1', 19, 'shortlist', NULL, '2022-03-12 02:36:53', '2022-03-12 02:36:53'),
(179, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', '1', '1', 'h4aoyOPXRIgzkRtqQl5mVGOnub72', '2', 19, 'under_review', NULL, '2022-03-15 00:38:40', '2022-03-15 00:38:40'),
(180, '0', '0', '3', 'h4aoyOPXRIgzkRtqQl5mVGOnub72', '2', 19, 'under_review', NULL, '2022-03-15 01:50:43', '2022-03-15 01:50:43'),
(181, '0', '0', '3', 'ennJoaSx7QO5j6pOhpmkA5BMr803', '1', 18, 'under_review', NULL, '2022-03-15 02:16:30', '2022-03-15 02:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('6c7d5af37c51755730d394bfc33652f999592426998d80e0dcc1f6c2b9fb3c60ce584bc1d6a69643', 1, 2, NULL, '[]', 0, '2021-09-16 02:31:22', '2021-09-16 02:31:22', '2022-09-16 08:01:22'),
('8113da760f66d5c1b2cb40987ee1eae21f5d329e3882b236ba22433d8264d2a1d15a39c3633ccfe3', 2, 2, NULL, '[]', 0, '2021-09-16 01:17:12', '2021-09-16 01:17:12', '2022-09-16 06:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ndp7o4yjJp6PQ5TNIFw5ATtDhn5tURjbISCexbH7', NULL, 'http://localhost', 1, 0, 0, '2021-09-09 00:54:20', '2021-09-09 00:54:20'),
(2, NULL, 'Laravel Password Grant Client', 'tLzXFvYWmzhx0KMYEgPDog3Y0aTDlt6tGMCltYzq', 'users', 'http://localhost', 0, 1, 0, '2021-09-09 00:54:20', '2021-09-09 00:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-09 00:54:20', '2021-09-09 00:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('181be2f2a6d9b46cbf48829dcf56bd704c6d30820515da8528b45ffc8e81104ddacef42d995629de', '6c7d5af37c51755730d394bfc33652f999592426998d80e0dcc1f6c2b9fb3c60ce584bc1d6a69643', 0, '2022-09-16 08:01:22'),
('524c67f300320af5594979266fa5da97d920974367bb97cd4bdde92f32d555b91f10328c23f44f64', '8113da760f66d5c1b2cb40987ee1eae21f5d329e3882b236ba22433d8264d2a1d15a39c3633ccfe3', 0, '2022-09-16 06:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', '278a263bb9e05249220ebc781cc12ac19c221e0f24a8f0487ac2d8311bb8075f', '[\"*\"]', NULL, '2021-09-09 03:17:51', '2021-09-09 03:17:51'),
(2, 'App\\Models\\User', 1, 'authToken', '6cd24d7dded4a5750f5bb495dd4faeeffc36d335e0de1e352bab938318760286', '[\"*\"]', NULL, '2021-09-09 03:24:38', '2021-09-09 03:24:38'),
(3, 'App\\Models\\User', 2, 'authToken', '3c3a5832b7487943bb4a253d21f4a734994ccedee921ca991cb143801c0a937b', '[\"*\"]', NULL, '2021-09-16 01:15:59', '2021-09-16 01:15:59'),
(4, 'App\\Models\\User', 2, 'authToken', '1d4ff4f507a31bbc9c6f5d9fbed5ba1e50038b1a3eddc464ad03f6b1bbd027dc', '[\"*\"]', NULL, '2021-09-16 01:16:20', '2021-09-16 01:16:20'),
(5, 'App\\Models\\User', 1, 'authToken', '17e7afdec72aeb4ebdb7ea17028d2c44cce5f92d9b5a8741d04f12c671951d7a', '[\"*\"]', NULL, '2021-09-16 02:23:57', '2021-09-16 02:23:57'),
(6, 'App\\Models\\User', 1, 'authToken', '529c9e756521e6aada85f77f77d566b01931a113c6a6d5c6a6040cf42472ff4b', '[\"*\"]', NULL, '2021-09-16 02:30:35', '2021-09-16 02:30:35'),
(7, 'App\\Models\\User', 51, 'authToken', 'cce833e050a8ef6bab317f01615cea632ddd0af0055b47cb831101acc3ee7f7a', '[\"*\"]', NULL, '2022-01-17 04:42:25', '2022-01-17 04:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `user_id`, `full_name`, `contact_number`, `email`, `profile_img`, `created_at`, `updated_at`, `status`) VALUES
(1, 'c99ni4CPl7bKWqhlppGZZi1eOFj1', 'te', '8525488953', 'te@gmail.com', 'public/ProfileImages/Qeq0smxVJI60NGn2KEspHbS2aFDYpYlUBNEFUlKf.jpg', '2022-02-27 12:22:24', '2022-03-02 06:19:39', 1),
(2, 'plmsrv8b', 'Afsar Pasha', '9900121202', 'afsar.pasha@inindiatech.com', NULL, '2022-03-02 03:07:29', '2022-03-02 03:07:29', 1),
(3, '12345', 'Roshani Sitlani', NULL, 'roshanisitlani05@gmail.com', 'qo5WrCrQtxbhlyKLlI1GBT17qwLknY39JXgfTU9d.png', '2022-03-02 03:08:05', '2022-03-02 03:08:05', 1),
(7, '123', 'Roshani Sitlani', '99211543215', 'roshanisitlani05@gmail.com5', 'public/ProfileImages/OFxi5qHOX3Qq8tc8m9ZqiqR1JYJnhvvI9qEc3b29.png', '2022-03-02 03:17:35', '2022-03-02 03:19:28', 1),
(8, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'jhjh', 'jh', 'j@gmail.com', NULL, '2022-03-02 06:56:06', '2022-03-02 06:56:06', 1),
(9, 'h4aoyOPXRIgzkRtqQl5mVGOnub72', 'aitrjobs.com', '8862999944', 'aitrjobs@gmail.com', NULL, '2022-03-03 03:46:13', '2022-03-03 03:46:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_histories`
--

CREATE TABLE `plan_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_currency` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_amount` int(11) NOT NULL,
  `coupon_code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `message_limit` int(11) NOT NULL,
  `job_limit` int(11) DEFAULT NULL,
  `hiring_limit` int(11) DEFAULT NULL,
  `plan_duration` int(11) DEFAULT NULL,
  `plan_purchase_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_histories`
--

INSERT INTO `plan_histories` (`id`, `uid`, `plan_id`, `plan_name`, `plan_currency`, `plan_amount`, `coupon_code`, `coupon_amount`, `paid_amount`, `message_limit`, `job_limit`, `hiring_limit`, `plan_duration`, `plan_purchase_date`, `created_at`, `updated_at`, `status`) VALUES
(1, 'KDTwnTWBhohOqM5xvstVkFpvGvr1', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-02-26', '2022-02-26 08:49:08', '2022-02-26 08:49:08', 1),
(2, 'c99ni4CPl7bKWqhlppGZZi1eOFj1', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-02-27', '2022-02-27 12:22:03', '2022-02-27 12:22:03', 1),
(3, 'IgyEA5rdPFMlClwdfq1qDmrff3n2', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-02-27', '2022-02-27 12:24:20', '2022-02-27 12:24:20', 1),
(4, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-02-27', '2022-02-27 12:52:30', '2022-02-27 12:52:30', 1),
(5, 'tdmxIRlh2MTKyddaLbtFKwEjL2u2', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-02-28', '2022-02-27 22:48:39', '2022-02-27 22:48:39', 1),
(6, 'C97fHBcC0TQ0J70Jjvr8mNkf2l73', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-02-28', '2022-02-27 22:50:24', '2022-02-27 22:50:24', 1),
(7, 'Gd95eVnduNhW9znxSOyv5sMSddo1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-01', '2022-03-01 07:21:55', '2022-03-01 07:21:55', 1),
(8, 'qk1p0v38', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-01', '2022-03-01 11:11:56', '2022-03-01 11:11:56', 1),
(9, 'plmsrv8b', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-02', '2022-03-02 03:04:28', '2022-03-02 03:04:28', 1),
(10, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-02', '2022-03-02 06:39:12', '2022-03-02 06:39:12', 1),
(11, 'QHzRsyxajlPzDun9P0Giv2gc6N92', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-02', '2022-03-02 06:56:11', '2022-03-02 06:56:11', 1),
(12, 'U3xioz2tSaMCBSw9szYLYoSTCUK2', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-02', '2022-03-02 07:01:14', '2022-03-02 07:01:14', 1),
(13, 'o4swgTKRMzeIFTQWrd5cXvoS4RU2', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-02', '2022-03-02 07:02:46', '2022-03-02 07:02:46', 1),
(14, 'WrJsE1scGCUTnOXGl0xdOXNH7wn2', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-02', '2022-03-02 07:17:15', '2022-03-02 07:17:15', 1),
(15, 'Htvm1kYRj2W86lxxOkaacYn4gE62', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-02', '2022-03-02 07:19:24', '2022-03-02 07:19:24', 1),
(16, 'u1y5ZZE2jPVylPF7yFQz0CG3w1y1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-02', '2022-03-02 07:20:00', '2022-03-02 07:20:00', 1),
(17, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-02', '2022-03-02 08:49:39', '2022-03-02 08:49:39', 1),
(18, 'EPYDb3EUzycZQtl2EShpTwtrOH93', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-03', '2022-03-03 01:44:40', '2022-03-03 01:44:40', 1),
(19, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-03', '2022-03-03 03:35:44', '2022-03-03 03:35:44', 1),
(20, 'h4aoyOPXRIgzkRtqQl5mVGOnub72', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-03', '2022-03-03 03:45:50', '2022-03-03 03:45:50', 1),
(21, '7beVscqosIUYdstxzqmKnVX29nz2', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-03', '2022-03-03 07:21:59', '2022-03-03 07:21:59', 1),
(22, 'Kwus8yvmi1RsgPznFH2HuBd0GJ52', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-03', '2022-03-03 08:39:16', '2022-03-03 08:39:16', 1),
(23, 'oxukZ6AvAderPAFxFy6fi5KzSfq2', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-04', '2022-03-03 23:05:05', '2022-03-03 23:05:05', 1),
(24, '73OOuosi7DPCJB8ZXNkpoMzddZs1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-04', '2022-03-04 00:12:17', '2022-03-04 00:12:17', 1),
(25, 'xFHOhzwKlCWtF809aCVWULfwKnV2', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-09', '2022-03-09 08:12:58', '2022-03-09 08:12:58', 1),
(26, 'yjJWH8aCPDUyWDiUzxEhGdjTxNz2', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-11', '2022-03-11 03:03:39', '2022-03-11 03:03:39', 1),
(27, 'LEpqoF2zqMR27EXr3t3sUDxEz4q1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-11', '2022-03-11 06:32:46', '2022-03-11 06:32:46', 1),
(28, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-15', '2022-03-15 01:46:14', '2022-03-15 01:46:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_management`
--

CREATE TABLE `plan_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_currency` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_amount` int(11) NOT NULL,
  `coupon_code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `message_limit` int(11) NOT NULL,
  `job_limit` int(11) DEFAULT NULL,
  `hiring_limit` int(11) DEFAULT NULL,
  `plan_duration` int(11) DEFAULT NULL,
  `plan_purchase_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_management`
--

INSERT INTO `plan_management` (`id`, `uid`, `plan_id`, `plan_name`, `plan_currency`, `plan_amount`, `coupon_code`, `coupon_amount`, `paid_amount`, `message_limit`, `job_limit`, `hiring_limit`, `plan_duration`, `plan_purchase_date`, `created_at`, `updated_at`, `status`) VALUES
(1, 'KDTwnTWBhohOqM5xvstVkFpvGvr1', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-02-26', '2022-02-26 08:49:08', '2022-02-26 08:49:08', 1),
(2, 'c99ni4CPl7bKWqhlppGZZi1eOFj1', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 18, 18, 18, 30, '2022-02-27', '2022-02-27 12:22:03', '2022-02-27 13:08:48', 1),
(3, 'IgyEA5rdPFMlClwdfq1qDmrff3n2', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-02-27', '2022-02-27 12:24:20', '2022-02-27 12:24:20', 1),
(4, '06E7bEwtbxQYUbuAi0A2UBREmhp1', 1, 'Free', 'INR', 0, NULL, 0, 0, 18, 18, NULL, 30, '2022-02-27', '2022-02-27 12:52:30', '2022-02-27 13:00:25', 1),
(5, 'tdmxIRlh2MTKyddaLbtFKwEjL2u2', 1, 'Free', 'INR', 0, NULL, 0, 0, 19, 20, NULL, 30, '2022-02-28', '2022-02-27 22:48:39', '2022-02-27 22:49:43', 1),
(6, 'C97fHBcC0TQ0J70Jjvr8mNkf2l73', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-02-28', '2022-02-27 22:50:24', '2022-02-27 22:50:24', 1),
(7, 'Gd95eVnduNhW9znxSOyv5sMSddo1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-01', '2022-03-01 07:21:55', '2022-03-01 07:21:55', 1),
(8, 'qk1p0v38', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-01', '2022-03-01 11:11:56', '2022-03-01 11:11:56', 1),
(9, 'plmsrv8b', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-02', '2022-03-02 03:04:28', '2022-03-02 03:04:28', 1),
(10, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 17, 20, 30, '2022-03-02', '2022-03-02 06:39:12', '2022-03-02 09:11:48', 1),
(11, 'QHzRsyxajlPzDun9P0Giv2gc6N92', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-02', '2022-03-02 06:56:11', '2022-03-02 06:56:11', 1),
(12, 'U3xioz2tSaMCBSw9szYLYoSTCUK2', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-02', '2022-03-02 07:01:14', '2022-03-02 07:01:14', 1),
(13, 'o4swgTKRMzeIFTQWrd5cXvoS4RU2', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-02', '2022-03-02 07:02:46', '2022-03-02 07:02:46', 1),
(14, 'WrJsE1scGCUTnOXGl0xdOXNH7wn2', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-02', '2022-03-02 07:17:15', '2022-03-02 07:17:15', 1),
(15, 'Htvm1kYRj2W86lxxOkaacYn4gE62', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-02', '2022-03-02 07:19:24', '2022-03-02 07:19:24', 1),
(16, 'u1y5ZZE2jPVylPF7yFQz0CG3w1y1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-02', '2022-03-02 07:20:00', '2022-03-02 07:20:00', 1),
(17, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 17, NULL, 30, '2022-03-02', '2022-03-02 08:49:39', '2022-03-02 09:11:48', 1),
(18, 'EPYDb3EUzycZQtl2EShpTwtrOH93', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-03', '2022-03-03 01:44:40', '2022-03-03 01:44:40', 1),
(19, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', 1, 'Free', 'INR', 0, NULL, 0, 0, 16, 16, NULL, 30, '2022-03-03', '2022-03-03 03:35:44', '2022-03-15 00:38:40', 1),
(20, 'h4aoyOPXRIgzkRtqQl5mVGOnub72', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 13, 19, 18, 30, '2022-03-03', '2022-03-03 03:45:50', '2022-03-12 02:36:53', 1),
(21, '7beVscqosIUYdstxzqmKnVX29nz2', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-03', '2022-03-03 07:21:59', '2022-03-03 07:21:59', 1),
(22, 'Kwus8yvmi1RsgPznFH2HuBd0GJ52', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-03', '2022-03-03 08:39:16', '2022-03-03 08:39:16', 1),
(23, 'oxukZ6AvAderPAFxFy6fi5KzSfq2', 1, 'Free', 'INR', 0, NULL, 0, 0, 19, 19, NULL, 30, '2022-03-04', '2022-03-03 23:05:05', '2022-03-03 23:09:02', 1),
(24, '73OOuosi7DPCJB8ZXNkpoMzddZs1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-04', '2022-03-04 00:12:17', '2022-03-04 00:12:17', 1),
(25, 'xFHOhzwKlCWtF809aCVWULfwKnV2', 1, 'Free', 'INR', 0, 'ABC', 0, 0, 20, 20, 20, 30, '2022-03-09', '2022-03-09 08:12:58', '2022-03-09 08:12:58', 1),
(26, 'yjJWH8aCPDUyWDiUzxEhGdjTxNz2', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 17, NULL, 30, '2022-03-11', '2022-03-11 03:03:39', '2022-03-11 03:54:56', 1),
(27, 'LEpqoF2zqMR27EXr3t3sUDxEz4q1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 20, NULL, 30, '2022-03-11', '2022-03-11 06:32:46', '2022-03-11 06:32:46', 1),
(28, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', 1, 'Free', 'INR', 0, NULL, 0, 0, 20, 18, NULL, 30, '2022-03-15', '2022-03-15 01:46:14', '2022-03-15 02:16:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_hire_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `functional_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interview_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `user_id`, `industry_hire_for`, `functional_area`, `skills`, `interview_day`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'indus1', 'area1', 'akills2', 'jh', '2022-03-02 08:30:32', '2022-03-02 08:30:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `banner_image`, `content_type`, `created_at`, `updated_at`) VALUES
(9, 'public/sliders/uBKdUuWsZJFGsDGSd7eKhVEd10YlgFOWLWAqbPJr.jpg', 'image', '2022-01-31 02:26:52', '2022-01-31 02:26:52'),
(10, 'public/sliders/5y24TwNkMR94OWwm0Y13wq7NVZOgb5WXH9BuOwrr.mp4', 'video', '2022-01-31 02:30:57', '2022-01-31 02:30:57'),
(11, 'public/sliders/3wdStUo7Ry0uJgINRGlQai96M2Eoo1OekLOHmdQq.mp4', 'video', '2022-01-31 03:13:47', '2022-01-31 03:13:47'),
(15, 'public/sliders/jr94LNlDGlsFCChwKrwN49BXJxsqm0bSSr2MLBwm.webp', 'image', '2022-03-02 05:37:40', '2022-03-02 05:37:40'),
(16, 'public/sliders/JpARXDfaup0NGVGYMrcpb2Q56dAOUQHeziXnB5qH.png', 'image', '2022-03-07 02:56:30', '2022-03-07 02:56:30'),
(17, 'public/sliders/0cFuBy7bCC1GzhLjJuESd5xOEwxDCWdZ3Ujonw5D.jpg', 'image', '2022-03-15 02:34:01', '2022-03-15 02:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `user_id`, `facebook_url`, `instagram_url`, `twitter_url`, `linkedin_url`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ennJoaSx7QO5j6pOhpmkA5BMr803', 'jkh', 'h', 'jhj', 'jhh', '2022-03-02 06:56:20', '2022-03-02 06:56:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `created_at`, `updated_at`) VALUES
(1, 'state2', '2022-02-26 08:13:43', '2022-02-26 08:18:44'),
(2, 'stat1', '2022-03-01 04:28:20', '2022-03-01 04:28:20'),
(3, 'BIHAR', '2022-03-07 03:06:20', '2022-03-07 03:06:20'),
(4, 'UTTAR PRADESH', '2022-03-07 03:06:42', '2022-03-07 03:08:46'),
(5, 'MADHAYA PRADESH', '2022-03-07 03:06:54', '2022-03-07 03:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'swapgcti04@gmail.com', '2022-03-03 01:47:21', '2022-03-03 01:47:21'),
(2, 'mdnazibullahsk@gmail.com', '2022-03-10 02:59:31', '2022-03-10 02:59:31'),
(3, 'aryanamit54@gmail.com', '2022-03-11 03:40:05', '2022-03-11 03:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `review`, `profession`, `created_at`, `updated_at`) VALUES
(1, 'kjhkj', NULL, 'kjh', '2022-02-26 08:40:17', '2022-03-01 04:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `notifications` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `plan_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_amount` int(11) DEFAULT NULL,
  `message_limit` int(11) DEFAULT NULL,
  `hiring_limit` int(11) DEFAULT NULL,
  `job_limit` int(11) DEFAULT NULL,
  `plan_duration` int(11) DEFAULT NULL,
  `coupon_code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` int(11) DEFAULT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `plan_purchase_date` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_signin` datetime DEFAULT NULL,
  `auth_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email_status` tinyint(4) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `role`, `name`, `email`, `mobile_number`, `email_verified_at`, `notifications`, `password`, `plan_id`, `plan_name`, `plan_amount`, `message_limit`, `hiring_limit`, `job_limit`, `plan_duration`, `coupon_code`, `coupon_amount`, `paid_amount`, `plan_purchase_date`, `remember_token`, `created_at`, `creation_date`, `updated_at`, `current_signin`, `auth_type`, `user_email_status`, `status`) VALUES
(1, NULL, 'Admin', 'roshani', 'roshanisitlani05@gmail.com', NULL, NULL, NULL, '$2y$10$c3RM7s..C7oJ2tAE0OSO7urvfK74aTLy1SarCIoFTZcw4t.cTwHCa', 2, 'Premium', NULL, 30, 30, 30, 30, NULL, NULL, NULL, '2022-02-23', NULL, '2021-09-15 20:53:56', NULL, '2022-02-23 03:47:29', NULL, NULL, 0, 1),
(51, NULL, 'Admin', 'Admin', 'admin@gmail.com', '9876543215', NULL, NULL, '$2y$10$2NT3972PoENWBftWqJr6x.Th3A.AKJ0gtvlIzv6k7DzH9VBqV8r4u', 2, 'Premium', NULL, 30, 30, 30, 30, NULL, NULL, NULL, '2022-02-23', NULL, '2022-01-16 23:12:25', NULL, '2022-02-23 03:47:29', NULL, NULL, 0, 1),
(52, 'KDTwnTWBhohOqM5xvstVkFpvGvr1', '2', NULL, 'te1@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-02-26', NULL, '2022-02-26 08:49:08', '2022-02-26 19:49:07', '2022-02-26 08:49:08', '2022-02-26 19:49:07', 'email', 0, 1),
(53, 'c99ni4CPl7bKWqhlppGZZi1eOFj1', '2', NULL, 'te@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-02-27', NULL, '2022-02-27 12:22:03', '2022-02-27 23:21:55', '2022-02-27 12:22:03', '2022-02-27 23:21:55', 'email', 0, 1),
(54, 'IgyEA5rdPFMlClwdfq1qDmrff3n2', '2', NULL, 'tu1@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-02-27', NULL, '2022-02-27 12:24:20', '2022-02-27 23:24:20', '2022-02-27 12:24:20', '2022-02-27 23:24:20', 'email', 0, 1),
(55, 'ECptXLJT3PTHCEbIbUPSoP326mu1', '1', NULL, 'tu2@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, NULL, NULL, '2022-02-27', NULL, '2022-02-27 12:33:23', '2022-02-27 23:33:22', '2022-02-27 12:33:23', '2022-02-27 23:33:22', 'email', 0, 1),
(56, '06E7bEwtbxQYUbuAi0A2UBREmhp1', '1', NULL, 'tu3@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-02-27', NULL, '2022-02-27 12:52:30', '2022-02-27 23:52:29', '2022-02-27 12:52:30', '2022-02-27 23:52:29', 'email', 0, 1),
(57, 'tdmxIRlh2MTKyddaLbtFKwEjL2u2', '1', NULL, NULL, '8317400953', NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-02-28', NULL, '2022-02-27 22:48:39', '2022-02-28 09:48:38', '2022-02-27 22:48:39', '2022-02-28 09:48:38', 'mobile_otp', 0, 1),
(58, 'C97fHBcC0TQ0J70Jjvr8mNkf2l73', '1', NULL, 'shubhamhandebgm@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-02-28', NULL, '2022-02-27 22:50:24', '2022-02-28 09:50:24', '2022-02-27 22:50:24', '2022-02-28 09:50:24', 'facebook', 0, 1),
(59, 'Gd95eVnduNhW9znxSOyv5sMSddo1', '1', NULL, 'shubham.dev@inindiatech.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-01', NULL, '2022-03-01 07:21:55', '2022-03-01 12:51:54', '2022-03-07 03:16:30', '2022-03-01 12:51:54', 'facebook', 0, 1),
(60, 'qk1p0v38', '2', NULL, NULL, '9592435500', NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-03-01', NULL, '2022-03-01 11:11:56', '2022-03-01 16:41:56', '2022-03-01 11:11:56', '2022-03-01 16:41:56', NULL, 0, 1),
(61, 'plmsrv8b', '2', NULL, NULL, '7892460982', NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-03-02', NULL, '2022-03-02 03:04:28', '2022-03-02 08:34:28', '2022-03-02 03:04:28', '2022-03-02 08:34:28', NULL, 0, 1),
(63, 'QHzRsyxajlPzDun9P0Giv2gc6N92', '2', NULL, 'wandafreeman.85713@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-03-02', NULL, '2022-03-02 06:56:11', '2022-03-02 12:26:08', '2022-03-02 06:56:11', '2022-03-02 12:26:08', 'google', 0, 1),
(64, 'U3xioz2tSaMCBSw9szYLYoSTCUK2', '2', NULL, 'mariovargas.37252@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-03-02', NULL, '2022-03-02 07:01:14', '2022-03-02 12:31:11', '2022-03-02 07:01:14', '2022-03-02 12:31:11', 'google', 0, 1),
(65, 'o4swgTKRMzeIFTQWrd5cXvoS4RU2', '2', NULL, 'calebray.40733@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-03-02', NULL, '2022-03-02 07:02:46', '2022-03-02 12:32:41', '2022-03-02 07:02:46', '2022-03-02 12:32:41', 'google', 0, 1),
(66, 'WrJsE1scGCUTnOXGl0xdOXNH7wn2', '1', NULL, 'jorgemitchell.12230@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-02', NULL, '2022-03-02 07:17:15', '2022-03-02 12:47:11', '2022-03-02 07:17:15', '2022-03-02 12:47:12', 'google', 0, 1),
(67, 'Htvm1kYRj2W86lxxOkaacYn4gE62', '1', NULL, 'jeannieadkins.47865@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-02', NULL, '2022-03-02 07:19:24', '2022-03-02 12:49:20', '2022-03-02 07:19:24', '2022-03-02 12:49:20', 'google', 0, 1),
(68, 'u1y5ZZE2jPVylPF7yFQz0CG3w1y1', '1', NULL, 'nadineroy.43495@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-02', NULL, '2022-03-02 07:20:00', '2022-03-02 12:49:56', '2022-03-02 07:20:00', '2022-03-02 12:49:56', 'google', 0, 1),
(69, 'ennJoaSx7QO5j6pOhpmkA5BMr803', '1', NULL, 'roshanisitlani@inindiatech.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-02', NULL, '2022-03-02 08:49:39', '2022-03-02 14:19:39', '2022-03-02 08:49:39', '2022-03-02 14:19:39', 'gmail', 0, 1),
(70, 'EPYDb3EUzycZQtl2EShpTwtrOH93', '1', NULL, 'swapgcti04@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-03', NULL, '2022-03-03 01:44:40', '2022-03-03 07:14:40', '2022-03-03 01:44:40', '2022-03-03 07:14:40', 'gmail', 0, 1),
(71, 'cJVbNF8n4QYOmnXTTS1j1AjG87Y2', '1', NULL, NULL, '9471071799', NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-03', NULL, '2022-03-03 03:35:44', '2022-03-03 14:35:42', '2022-03-03 03:35:44', '2022-03-03 14:35:42', 'mobile_otp', 0, 1),
(72, 'h4aoyOPXRIgzkRtqQl5mVGOnub72', '2', NULL, NULL, '8862999944', NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-03-03', NULL, '2022-03-03 03:45:50', '2022-03-03 14:45:50', '2022-03-03 03:45:50', '2022-03-03 14:45:50', 'mobile_otp', 0, 1),
(73, '7beVscqosIUYdstxzqmKnVX29nz2', '1', NULL, 'mistymorales.02282@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-03', NULL, '2022-03-03 07:21:59', '2022-03-03 04:51:54', '2022-03-03 07:21:59', '2022-03-03 04:51:54', 'google', 0, 1),
(74, 'Kwus8yvmi1RsgPznFH2HuBd0GJ52', '2', NULL, 'elijahkelly.80013@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-03-03', NULL, '2022-03-03 08:39:16', '2022-03-03 06:09:12', '2022-03-03 08:39:16', '2022-03-03 06:09:12', 'google', 0, 1),
(75, 'oxukZ6AvAderPAFxFy6fi5KzSfq2', '1', NULL, NULL, '9079357940', NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-04', NULL, '2022-03-03 23:05:05', '2022-03-04 10:05:01', '2022-03-03 23:05:05', '2022-03-04 10:05:01', 'mobile_otp', 0, 1),
(76, '73OOuosi7DPCJB8ZXNkpoMzddZs1', '1', NULL, 'jeena.doomra@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-04', NULL, '2022-03-04 00:12:17', '2022-03-04 05:42:16', '2022-03-04 00:12:17', '2022-03-04 05:42:16', 'email', 0, 1),
(77, 'xFHOhzwKlCWtF809aCVWULfwKnV2', '2', NULL, 'rogersimpson.73215@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, 20, 20, 30, 'ABC', 0, NULL, '2022-03-09', NULL, '2022-03-09 08:12:58', '2022-03-09 13:42:53', '2022-03-09 08:12:58', '2022-03-09 13:42:53', 'google', 0, 1),
(78, 'yjJWH8aCPDUyWDiUzxEhGdjTxNz2', '1', NULL, NULL, '7740999944', NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-11', NULL, '2022-03-11 03:03:39', '2022-03-11 14:03:39', '2022-03-11 03:03:39', '2022-03-11 14:03:39', 'mobile_otp', 0, 1),
(79, 'LEpqoF2zqMR27EXr3t3sUDxEz4q1', '1', NULL, NULL, '9889492742', NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-11', NULL, '2022-03-11 06:32:46', '2022-03-11 17:32:43', '2022-03-11 06:42:45', '2022-03-11 17:32:43', 'mobile_otp', 1, 1),
(80, 'XyUMJNMaiRTxFeO8tBbo9YnWydp1', '1', NULL, 'amit@gmail.com', NULL, NULL, NULL, NULL, 1, 'Free', 0, 20, NULL, 20, 30, NULL, 0, NULL, '2022-03-15', NULL, '2022-03-15 01:46:14', '2022-03-15 12:46:13', '2022-03-15 01:46:14', '2022-03-15 12:46:13', 'email', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_certificates`
--
ALTER TABLE `applicant_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_documents_user_id_index` (`user_id`);

--
-- Indexes for table `applicant_educational_details`
--
ALTER TABLE `applicant_educational_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_personal_details`
--
ALTER TABLE `applicant_personal_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_personal_details_user_id_index` (`user_id`);

--
-- Indexes for table `applicant_plans`
--
ALTER TABLE `applicant_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_social_media`
--
ALTER TABLE `applicant_social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_social_media` (`user_id`);

--
-- Indexes for table `applicant_video_documents`
--
ALTER TABLE `applicant_video_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_video_documents_user_id_index` (`user_id`);

--
-- Indexes for table `applicant_work_histories`
--
ALTER TABLE `applicant_work_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_work_histories_user_id_index` (`user_id`);

--
-- Indexes for table `blogs_masters`
--
ALTER TABLE `blogs_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_details_user_id_unique` (`user_id`);

--
-- Indexes for table `contact_admins`
--
ALTER TABLE `contact_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_plans`
--
ALTER TABLE `employer_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_jobs`
--
ALTER TABLE `favourite_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs_statuses`
--
ALTER TABLE `jobs_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_education`
--
ALTER TABLE `job_education`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_education_educational_name_unique` (`educational_name`);

--
-- Indexes for table `job_experiances`
--
ALTER TABLE `job_experiances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_functional_areas`
--
ALTER TABLE `job_functional_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_industries`
--
ALTER TABLE `job_industries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_industries_job_industry_name_unique` (`job_industry_name`);

--
-- Indexes for table `job_management`
--
ALTER TABLE `job_management`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_management_user_id_index` (`user_id`);

--
-- Indexes for table `job_masters`
--
ALTER TABLE `job_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_payment_masters`
--
ALTER TABLE `job_payment_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_payment_masters_payment_method_unique` (`payment_method`);

--
-- Indexes for table `job_salaries`
--
ALTER TABLE `job_salaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_salaries_job_min_salary_unique` (`job_min_salary`),
  ADD UNIQUE KEY `job_salaries_job_max_salary_unique` (`job_max_salary`);

--
-- Indexes for table `job_shifts`
--
ALTER TABLE `job_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_shifts_job_shift_unique` (`job_shift`);

--
-- Indexes for table `job_sub_types`
--
ALTER TABLE `job_sub_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_type_masters`
--
ALTER TABLE `job_type_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_type_masters_job_type_name_unique` (`job_type_name`);

--
-- Indexes for table `manage_pages`
--
ALTER TABLE `manage_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_handlers`
--
ALTER TABLE `notification_handlers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_details_user_id_index` (`user_id`);

--
-- Indexes for table `plan_histories`
--
ALTER TABLE `plan_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_management`
--
ALTER TABLE `plan_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectors_user_id_index` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_banner_image_unique` (`banner_image`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_media_user_id_index` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `states_state_unique` (`state`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_certificates`
--
ALTER TABLE `applicant_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `applicant_educational_details`
--
ALTER TABLE `applicant_educational_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_personal_details`
--
ALTER TABLE `applicant_personal_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `applicant_plans`
--
ALTER TABLE `applicant_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicant_social_media`
--
ALTER TABLE `applicant_social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicant_video_documents`
--
ALTER TABLE `applicant_video_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_work_histories`
--
ALTER TABLE `applicant_work_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs_masters`
--
ALTER TABLE `blogs_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_admins`
--
ALTER TABLE `contact_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employer_plans`
--
ALTER TABLE `employer_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favourite_jobs`
--
ALTER TABLE `favourite_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `jobs_statuses`
--
ALTER TABLE `jobs_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_education`
--
ALTER TABLE `job_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_experiances`
--
ALTER TABLE `job_experiances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_functional_areas`
--
ALTER TABLE `job_functional_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_industries`
--
ALTER TABLE `job_industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_management`
--
ALTER TABLE `job_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_masters`
--
ALTER TABLE `job_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `job_payment_masters`
--
ALTER TABLE `job_payment_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_salaries`
--
ALTER TABLE `job_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_shifts`
--
ALTER TABLE `job_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_sub_types`
--
ALTER TABLE `job_sub_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_type_masters`
--
ALTER TABLE `job_type_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manage_pages`
--
ALTER TABLE `manage_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification_handlers`
--
ALTER TABLE `notification_handlers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plan_histories`
--
ALTER TABLE `plan_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `plan_management`
--
ALTER TABLE `plan_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
