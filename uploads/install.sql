-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 30, 2020 at 08:07 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ekushey_5.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_permission`
--

CREATE TABLE `account_permission` (
  `account_permission_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_permission`
--

INSERT INTO `account_permission` (`account_permission_id`, `name`, `description`) VALUES
(1, 'Manage Assigned Project', 'User can view and manage only assigned projects to him. Project status update, document upload/view, project discussion will be available to assigned projects'),
(2, 'Manage All Projects', ''),
(3, 'Manage Clients', ''),
(4, 'Manage Staffs', ''),
(5, 'Manage Payment', ''),
(6, 'Manage Assigned Support Ticket', ''),
(7, 'Manage All Support Tickets', '');

-- --------------------------------------------------------

--
-- Table structure for table `account_role`
--

CREATE TABLE `account_role` (
  `account_role_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `account_permissions` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `about` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `email` longtext COLLATE utf8_unicode_ci,
  `password` longtext COLLATE utf8_unicode_ci,
  `phone` longtext COLLATE utf8_unicode_ci,
  `address` longtext COLLATE utf8_unicode_ci,
  `chat_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'offline',
  `owner_status` int(11) NOT NULL DEFAULT '0' COMMENT '1 owner, 0 not owner'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `url` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event`
--

CREATE TABLE `calendar_event` (
  `calendar_event_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `user_type` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `start_timestamp` longtext COLLATE utf8_unicode_ci,
  `end_timestamp` int(11) DEFAULT NULL,
  `colour` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `email` longtext COLLATE utf8_unicode_ci,
  `password` longtext COLLATE utf8_unicode_ci,
  `address` longtext COLLATE utf8_unicode_ci,
  `phone` longtext COLLATE utf8_unicode_ci,
  `website` longtext COLLATE utf8_unicode_ci,
  `skype_id` longtext COLLATE utf8_unicode_ci,
  `facebook_profile_link` longtext COLLATE utf8_unicode_ci,
  `linkedin_profile_link` longtext COLLATE utf8_unicode_ci,
  `twitter_profile_link` longtext COLLATE utf8_unicode_ci,
  `short_note` longtext COLLATE utf8_unicode_ci,
  `chat_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'offline'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_pending`
--

CREATE TABLE `client_pending` (
  `client_pending_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `email` longtext COLLATE utf8_unicode_ci,
  `password` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `email` longtext COLLATE utf8_unicode_ci,
  `address` longtext COLLATE utf8_unicode_ci,
  `phone` longtext COLLATE utf8_unicode_ci,
  `website` longtext COLLATE utf8_unicode_ci,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_code` longtext COLLATE utf8_unicode_ci,
  `currency_symbol` longtext COLLATE utf8_unicode_ci,
  `currency_name` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_code`, `currency_symbol`, `currency_name`) VALUES
(1, 'USD', '$', 'US dollar'),
(2, 'GBP', '£', 'Pound'),
(3, 'EUR', '€', 'Euro'),
(4, 'AUD', '$', 'Australian Dollar'),
(5, 'CAD', '$', 'Canadian Dollar'),
(6, 'JPY', '¥', 'Japanese Yen'),
(7, 'NZD', '$', 'N.Z. Dollar'),
(8, 'CHF', 'Fr', 'Swiss Franc'),
(9, 'HKD', '$', 'Hong Kong Dollar'),
(10, 'SGD', '$', 'Singapore Dollar'),
(11, 'SEK', 'kr', 'Swedish Krona'),
(12, 'DKK', 'kr', 'Danish Krone'),
(13, 'PLN', 'zł', 'Polish Zloty'),
(14, 'HUF', 'Ft', 'Hungarian Forint'),
(15, 'CZK', 'Kč', 'Czech Koruna'),
(16, 'MXN', '$', 'Mexican Peso'),
(17, 'CZK', 'Kč', 'Czech Koruna'),
(18, 'MYR', 'RM', 'Malaysian Ringgit');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `file_name` longtext COLLATE utf8_unicode_ci,
  `file_type` longtext COLLATE utf8_unicode_ci,
  `class_id` longtext COLLATE utf8_unicode_ci,
  `teacher_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `email_template_id` int(11) NOT NULL,
  `task` longtext COLLATE utf8_unicode_ci,
  `subject` longtext COLLATE utf8_unicode_ci,
  `body` longtext COLLATE utf8_unicode_ci,
  `instruction` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_template_id`, `task`, `subject`, `body`, `instruction`) VALUES
(1, 'new_project_opening', 'New project created', '<span>\r\n<div>Hello, [CLIENT_NAME], <br>we have created a new project with your account.<br><br>Project name : [PROJECT_NAME]<br>Please follow the link below to view status and updates of the project.<br>[PROJECT_LINK]</div></span>', ''),
(2, 'new_client_account_opening', 'Client account creation', '<span><div>Hi [CLIENT_NAME],</div></span>Your client account is created !<span>Please login to your client account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>Login credential :<br>email : [CLIENT_EMAIL]<br>password : [CLIENT_PASSWORD]', ''),
(3, 'new_staff_account_opening', 'Staff account creation', '<span>\n<div><div>Hi [STAFF_NAME],</div>Your staff account is created !&nbsp;Please login to your staff account panel here :&nbsp;<br>[SYSTEM_URL]<br>Login credential :<br>email : [STAFF_EMAIL]<br>password : [STAFF_PASSWORD]<br></div></span>', ''),
(4, 'payment_completion_notification', 'Payment completion notification', '<span>\n<div>Your payment of invoice [INVOICE_NUMBER] is completed.<br>You can review your payment history here :<br>[SYSTEM_PAYMENT_URL]</div></span>', ''),
(5, 'new_support_ticket_notify_admin', 'New support ticket notification', 'Hi [ADMIN_NAME],<br>A new support ticket is submitted. Ticket code : [TICKET_CODE]<br><br>Review all opened support tickets here :<br>[SYSTEM_OPENED_TICKET_URL]<br>', ''),
(6, 'support_ticket_assign_staff', 'Support ticket assignment notification', 'Hi [STAFF_NAME],<br>A new support ticket is assigned. Ticket code : [TICKET_CODE]<br><br>Review all opened support tickets here :<br>[SYSTEM_OPENED_TICKET_URL]', ''),
(7, 'new_message_notification', 'New message notification.', 'A new message has been sent by [SENDER_NAME].<br><br><span class=\"wysiwyg-color-silver\">[MESSAGE]<br></span><br><span>To reply to this message, login to your account :<br></span>[SYSTEM_URL]', ''),
(8, 'password_reset_confirmation', 'Password reset notification', 'Hi [NAME],<br>Your password is reset. New password : [NEW_PASSWORD]<br>Login here with your new password :<br>[SYSTEM_URL]<br><br>You can change your password after logging in to your account.', ''),
(9, 'new_client_account_confirm', 'New Client account confirmed', '<span><div>Hi [CLIENT_NAME],</div></span>Your client account is confirmed!<span>Please login to your client account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>', ''),
(10, 'new_admin_account_creation', 'Admin Account Creation', '<span><div>Hi [ADMIN_NAME],</div></span>Your admin account is created !<span>Please login to your admin account panel here :&nbsp;<br></span>[SYSTEM_URL]<br>Login credential :<br>email : [ADMIN_EMAIL]<br>password : [ADMIN_PASSWORD]', '');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `expense_category_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` longtext COLLATE utf8_unicode_ci,
  `client_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `invoice_entries` longtext COLLATE utf8_unicode_ci,
  `creation_timestamp` longtext COLLATE utf8_unicode_ci,
  `due_timestamp` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid',
  `vat_percentage` longtext COLLATE utf8_unicode_ci,
  `discount_amount` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext,
  `message` longtext,
  `sender` longtext,
  `timestamp` longtext,
  `read_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 unread 1 read'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci,
  `sender` longtext COLLATE utf8_unicode_ci,
  `reciever` longtext COLLATE utf8_unicode_ci,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_create` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp_last_update` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `published_by` int(11) DEFAULT NULL,
  `visible_for` int(11) NOT NULL DEFAULT '1' COMMENT '1-all, 2-staff, 3-client',
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `project_code` longtext COLLATE utf8_unicode_ci,
  `type` longtext COLLATE utf8_unicode_ci,
  `amount` int(11) NOT NULL DEFAULT '0',
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `payment_method` longtext COLLATE utf8_unicode_ci,
  `timestamp` longtext COLLATE utf8_unicode_ci,
  `milestone_id` int(11) DEFAULT NULL,
  `expense_category_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_code` longtext COLLATE utf8_unicode_ci,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `demo_url` longtext COLLATE utf8_unicode_ci,
  `project_category_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `staffs` longtext COLLATE utf8_unicode_ci,
  `budget` int(11) NOT NULL DEFAULT '0',
  `timer_status` int(11) NOT NULL DEFAULT '0' COMMENT '1 running 0stopped',
  `timer_starting_timestamp` longtext COLLATE utf8_unicode_ci,
  `total_time_spent` int(11) NOT NULL DEFAULT '0' COMMENT 'second',
  `progress_status` longtext COLLATE utf8_unicode_ci,
  `timestamp_start` longtext COLLATE utf8_unicode_ci,
  `timestamp_end` longtext COLLATE utf8_unicode_ci,
  `project_status` int(11) NOT NULL DEFAULT '1' COMMENT '1 for running, 0 for archived',
  `project_note` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_bug`
--

CREATE TABLE `project_bug` (
  `project_bug_id` int(11) NOT NULL,
  `project_code` longtext COLLATE utf8_unicode_ci,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `user_type` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `file` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL COMMENT '0 for pending, 1 for solved',
  `timestamp` longtext COLLATE utf8_unicode_ci,
  `assigned_staff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_category`
--

CREATE TABLE `project_category` (
  `project_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_file`
--

CREATE TABLE `project_file` (
  `project_file_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `name` longtext COLLATE utf8_unicode_ci,
  `visibility_client` int(11) NOT NULL DEFAULT '1' COMMENT '1visible 0hidden',
  `visibility_staff` int(11) NOT NULL DEFAULT '1' COMMENT '1visible 0hidden',
  `size` longtext COLLATE utf8_unicode_ci,
  `file_type` longtext COLLATE utf8_unicode_ci,
  `uploader_type` longtext COLLATE utf8_unicode_ci,
  `uploader_id` int(11) DEFAULT NULL,
  `timestamp_upload` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_message`
--

CREATE TABLE `project_message` (
  `project_message_id` int(11) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `project_id` int(11) DEFAULT NULL,
  `date` longtext COLLATE utf8_unicode_ci,
  `user_type` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `message_file_name` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_milestone`
--

CREATE TABLE `project_milestone` (
  `project_milestone_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `project_code` longtext COLLATE utf8_unicode_ci,
  `client_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `timestamp` longtext COLLATE utf8_unicode_ci,
  `currency_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 for unpaid, 1 for paid',
  `note` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_task`
--

CREATE TABLE `project_task` (
  `project_task_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `staff_id` int(11) DEFAULT NULL,
  `complete_status` int(11) DEFAULT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp_start` longtext COLLATE utf8_unicode_ci,
  `timestamp_end` longtext COLLATE utf8_unicode_ci,
  `task_color` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_timesheet`
--

CREATE TABLE `project_timesheet` (
  `project_timesheet_id` int(11) NOT NULL,
  `start_timestamp` longtext COLLATE utf8_unicode_ci,
  `end_timestamp` longtext COLLATE utf8_unicode_ci,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `quote_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `files` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quote_message`
--

CREATE TABLE `quote_message` (
  `quote_message_id` int(11) NOT NULL,
  `quote_id` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `file` longtext COLLATE utf8_unicode_ci,
  `user_type` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci,
  `user_id` longtext COLLATE utf8_unicode_ci,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `timestamp` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext,
  `description` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Ekushey Project Manager CRM'),
(2, 'system_title', 'Ekushey Project Manager'),
(3, 'address', 'Sydney, Australia'),
(4, 'phone', '2560565'),
(5, 'paypal_email', ''),
(6, 'currency', 'usd'),
(7, 'system_email', 'admin@example.com'),
(8, 'buyer', '[ your-codecanyon-username-here ]'),
(9, 'purchase_code', 'Don\'t-have'),
(10, 'language', 'english'),
(11, 'text_align', 'left-to-right'),
(12, 'system_currency_id', '1'),
(13, 'theme', NULL),
(14, 'stripe_publishable_key', ''),
(15, 'stripe_api_key', ''),
(16, 'dropbox_data_app_key', 'guhgjv76vt677968976x765'),
(17, 'skin_colour', 'default'),
(18, 'paypal_type', 'live'),
(27, 'smtp_host', 'ssl://smtp.googlemail.com'),
(24, 'paypal', '[{\"active\":\"1\",\"mode\":\"sandbox\",\"sandbox_client_id\":\"AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R\",\"production_client_id\":\"SomeId\"}]'),
(25, 'stripe_keys', '[{\"active\":\"1\",\"testmode\":\"on\",\"public_key\":\"pk_test_c6VvBEbwHFdulFZ62q1IQrar\",\"secret_key\":\"sk_test_9IMkiM6Ykxr1LCe2dJ3PgaxS\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),
(26, 'version', '5.0'),
(28, 'smtp_port', '465'),
(34, 'protocol', 'smtp'),
(35, 'smtp_user', 'Your real email'),
(36, 'smtp_pass', 'Your real password');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `email` longtext COLLATE utf8_unicode_ci,
  `password` longtext COLLATE utf8_unicode_ci,
  `account_role_id` int(11) DEFAULT NULL,
  `phone` longtext COLLATE utf8_unicode_ci,
  `skype_id` longtext COLLATE utf8_unicode_ci,
  `facebook_profile_link` longtext COLLATE utf8_unicode_ci,
  `twitter_profile_link` longtext COLLATE utf8_unicode_ci,
  `linkedin_profile_link` longtext COLLATE utf8_unicode_ci,
  `chat_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'offline'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_canned_message`
--

CREATE TABLE `support_canned_message` (
  `support_canned_message_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_subtask`
--

CREATE TABLE `team_subtask` (
  `team_subtask_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `team_task_id` int(11) DEFAULT NULL,
  `subtask_status` int(11) NOT NULL DEFAULT '1' COMMENT '1 for incomplete , 0 for complete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_task`
--

CREATE TABLE `team_task` (
  `team_task_id` int(11) NOT NULL,
  `task_title` longtext COLLATE utf8_unicode_ci,
  `task_note` longtext COLLATE utf8_unicode_ci,
  `assigned_staff_ids` longtext COLLATE utf8_unicode_ci,
  `creation_timestamp` longtext COLLATE utf8_unicode_ci,
  `due_timestamp` longtext COLLATE utf8_unicode_ci,
  `task_status` int(11) NOT NULL DEFAULT '1' COMMENT '0 for archived, 1 for running'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_task_file`
--

CREATE TABLE `team_task_file` (
  `team_task_file_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `team_task_id` int(11) DEFAULT NULL,
  `upload_timestamp` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `ticket_code` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'opened closed',
  `priority` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `client_id` int(11) DEFAULT NULL,
  `assigned_staff_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_message`
--

CREATE TABLE `ticket_message` (
  `ticket_message_id` int(11) NOT NULL,
  `ticket_code` longtext COLLATE utf8_unicode_ci,
  `message` longtext COLLATE utf8_unicode_ci,
  `file` longtext COLLATE utf8_unicode_ci,
  `sender_type` longtext COLLATE utf8_unicode_ci,
  `sender_id` int(11) DEFAULT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `todo_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `user` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_permission`
--
ALTER TABLE `account_permission`
  ADD PRIMARY KEY (`account_permission_id`);

--
-- Indexes for table `account_role`
--
ALTER TABLE `account_role`
  ADD PRIMARY KEY (`account_role_id`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `calendar_event`
--
ALTER TABLE `calendar_event`
  ADD PRIMARY KEY (`calendar_event_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_pending`
--
ALTER TABLE `client_pending`
  ADD PRIMARY KEY (`client_pending_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_bug`
--
ALTER TABLE `project_bug`
  ADD PRIMARY KEY (`project_bug_id`);

--
-- Indexes for table `project_category`
--
ALTER TABLE `project_category`
  ADD PRIMARY KEY (`project_category_id`);

--
-- Indexes for table `project_file`
--
ALTER TABLE `project_file`
  ADD PRIMARY KEY (`project_file_id`);

--
-- Indexes for table `project_message`
--
ALTER TABLE `project_message`
  ADD PRIMARY KEY (`project_message_id`);

--
-- Indexes for table `project_milestone`
--
ALTER TABLE `project_milestone`
  ADD PRIMARY KEY (`project_milestone_id`);

--
-- Indexes for table `project_task`
--
ALTER TABLE `project_task`
  ADD PRIMARY KEY (`project_task_id`);

--
-- Indexes for table `project_timesheet`
--
ALTER TABLE `project_timesheet`
  ADD PRIMARY KEY (`project_timesheet_id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `quote_message`
--
ALTER TABLE `quote_message`
  ADD PRIMARY KEY (`quote_message_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `support_canned_message`
--
ALTER TABLE `support_canned_message`
  ADD PRIMARY KEY (`support_canned_message_id`);

--
-- Indexes for table `team_subtask`
--
ALTER TABLE `team_subtask`
  ADD PRIMARY KEY (`team_subtask_id`);

--
-- Indexes for table `team_task`
--
ALTER TABLE `team_task`
  ADD PRIMARY KEY (`team_task_id`);

--
-- Indexes for table `team_task_file`
--
ALTER TABLE `team_task_file`
  ADD PRIMARY KEY (`team_task_file_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `ticket_message`
--
ALTER TABLE `ticket_message`
  ADD PRIMARY KEY (`ticket_message_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`todo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_permission`
--
ALTER TABLE `account_permission`
  MODIFY `account_permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `account_role`
--
ALTER TABLE `account_role`
  MODIFY `account_role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar_event`
--
ALTER TABLE `calendar_event`
  MODIFY `calendar_event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_pending`
--
ALTER TABLE `client_pending`
  MODIFY `client_pending_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_bug`
--
ALTER TABLE `project_bug`
  MODIFY `project_bug_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_category`
--
ALTER TABLE `project_category`
  MODIFY `project_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_file`
--
ALTER TABLE `project_file`
  MODIFY `project_file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_message`
--
ALTER TABLE `project_message`
  MODIFY `project_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_milestone`
--
ALTER TABLE `project_milestone`
  MODIFY `project_milestone_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_task`
--
ALTER TABLE `project_task`
  MODIFY `project_task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_timesheet`
--
ALTER TABLE `project_timesheet`
  MODIFY `project_timesheet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quote_message`
--
ALTER TABLE `quote_message`
  MODIFY `quote_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_canned_message`
--
ALTER TABLE `support_canned_message`
  MODIFY `support_canned_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_subtask`
--
ALTER TABLE `team_subtask`
  MODIFY `team_subtask_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_task`
--
ALTER TABLE `team_task`
  MODIFY `team_task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_task_file`
--
ALTER TABLE `team_task_file`
  MODIFY `team_task_file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_message`
--
ALTER TABLE `ticket_message`
  MODIFY `ticket_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT;
