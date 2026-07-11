-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2026 at 12:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `object-insight-ai`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comparisons`
--

CREATE TABLE `comparisons` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `image_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comparison_result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_04_155910_create_object__analyses_table', 1),
(5, '2026_07_04_160614_create_comparisons_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `object_analyses`
--

CREATE TABLE `object_analyses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confidence` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `object_analyses`
--

INSERT INTO `object_analyses` (`id`, `user_id`, `image`, `object_name`, `category`, `confidence`, `description`, `history`, `usage`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/image/1783273376_میز-مطالعه-4-نفره-گنجینه-2.jpg', '', NULL, 0, '', '', '', '2026-07-05 14:12:57', '2026-07-05 14:12:57'),
(2, 1, 'assets/image/1783273395_joker.jpg', 'person', 'human', 0.67994558811188, '', '/', '/', '2026-07-05 14:13:38', '2026-07-05 14:13:38'),
(3, 1, 'assets/image/1783273432_میز-مطالعه-4-نفره-گنجینه-2.jpg', '', NULL, 0, '', '', '', '2026-07-05 14:13:53', '2026-07-05 14:13:53'),
(4, 1, 'assets/image/1783273457_images.jpg', 'potted plant', 'object', 0.86067444086075, 'A potted plant.', '', 'photographed', '2026-07-05 14:14:24', '2026-07-05 14:14:24'),
(5, 1, 'assets/image/1783273556_images.jpg', 'potted plant', 'object', 0.86067444086075, '\'فرح\' یک گیاه میوه است که در خاک گرمی به سر زمین رشد می‌کند.', 'فرح یک گیاه باستانی و مهم در ایران است و برای مدت زیادی به عنوان گیاه دارویی و خورمانی مورد استفاده قرار می‌گرفت. شکل اصلی گیاه در دوران اواسط و دومینامه‌ی سنگی بود.', 'فرح معمولاً در گلخانه‌ها و باغ‌های خانگی به عنوان گیاهانزی و زینتی استفاده می‌شود، به خصوص در مناطق گرمی.', '2026-07-05 14:16:14', '2026-07-05 14:16:14'),
(6, 1, 'assets/image/1783273608_images.jpg', 'potted plant', 'object', 0.86067444086075, 'potted plant یک شیء عمومی است.', 'اطلاعات تاریخی در دسترس نیست.', 'کاربرد عمومی', '2026-07-05 14:17:01', '2026-07-05 14:17:01'),
(7, 1, 'assets/image/1783273642_میز-مطالعه-4-نفره-گنجینه-2.jpg', '', NULL, 0, '', '', '', '2026-07-05 14:17:23', '2026-07-05 14:17:23'),
(8, 1, 'assets/image/1783273651_میز-مطالعه-4-نفره-گنجینه-2.jpg', '', NULL, 0, '', '', '', '2026-07-05 14:17:31', '2026-07-05 14:17:31'),
(9, 1, 'assets/image/1783274162_میز-مطالعه-4-نفره-گنجینه-2.jpg', '', NULL, 0, '', '', '', '2026-07-05 14:26:04', '2026-07-05 14:26:04'),
(10, 1, 'assets/image/1783274250_میز-مطالعه-4-نفره-گنجینه-2.jpg', '', NULL, 0, '', '', '', '2026-07-05 14:27:32', '2026-07-05 14:27:32'),
(11, 1, 'assets/image/1783274395_میز-مطالعه-4-نفره-گنجینه-2.jpg', '', NULL, 0, '', '', '', '2026-07-05 14:29:59', '2026-07-05 14:29:59'),
(12, 1, 'assets/image/1783275499_images.jpg', 'potted plant', NULL, 0.86067444086075, '', '', '', '2026-07-05 14:48:44', '2026-07-05 14:48:44'),
(13, 1, 'assets/image/1783275542_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'unknown', NULL, 0, '', '', '', '2026-07-05 14:49:14', '2026-07-05 14:49:14'),
(14, 1, 'assets/image/1783275580_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'unknown', NULL, 0, '', '', '', '2026-07-05 14:49:48', '2026-07-05 14:49:48'),
(15, 1, 'assets/image/1783275769_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'dining table', NULL, 0.55328440666199, '', '', '', '2026-07-05 14:53:06', '2026-07-05 14:53:06'),
(16, 1, 'assets/image/1783275924_میز-مطالعه-4-نفره-گنجینه-2.jpg', '', NULL, 0, '', '', '', '2026-07-05 14:55:30', '2026-07-05 14:55:30'),
(17, 1, 'assets/image/1783275981_images (1).jpg', '', NULL, 0, '', '', '', '2026-07-05 14:56:22', '2026-07-05 14:56:22'),
(18, 1, 'assets/image/1783275992_images (1).jpg', '', NULL, 0, '', '', '', '2026-07-05 14:56:33', '2026-07-05 14:56:33'),
(19, 1, 'assets/image/1783276055_images (1).jpg', 'unknown', NULL, 0, '', '', '', '2026-07-05 14:57:48', '2026-07-05 14:57:48'),
(20, 1, 'assets/image/1783276226_images (1).jpg', 'tv', NULL, 0.8212708234787, '', '', '', '2026-07-05 15:00:52', '2026-07-05 15:00:52'),
(21, 1, 'assets/image/1783276341_images (1).jpg', '', NULL, 0, '', '', '', '2026-07-05 15:02:28', '2026-07-05 15:02:28'),
(22, 1, 'assets/image/1783276364_images (1).jpg', 'tv', NULL, 0.8212708234787, '', '', '', '2026-07-05 15:03:05', '2026-07-05 15:03:05'),
(23, 1, 'assets/image/1783280652_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'dining table', NULL, 0.67941582202911, '', '', '', '2026-07-05 16:14:40', '2026-07-05 16:14:40'),
(24, 1, 'assets/image/1783280717_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'dining table', NULL, 0.67941582202911, '', '', '', '2026-07-05 16:15:37', '2026-07-05 16:15:37'),
(25, 1, 'assets/image/1783280885_میز-مطالعه-4-نفره-گنجینه-2.jpg', '', NULL, 0, '', '', '', '2026-07-05 16:18:12', '2026-07-05 16:18:12'),
(26, 1, 'assets/image/1783281000_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'dining table', NULL, 0.67941582202911, '', '', '', '2026-07-05 16:20:16', '2026-07-05 16:20:16'),
(27, 1, 'assets/image/1783325437_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'dining table', NULL, 0.67941582202911, '', '', '', '2026-07-06 04:41:40', '2026-07-06 04:41:40'),
(28, 1, 'assets/image/1783326111_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'dining table', 'نامشخص', 0.67941582202911, 'dining table یکی از وسایل پرکاربرد است که در زندگی روزمره مورد استفاده قرار می‌گیرد.', 'تاریخچه دقیق این وسیله در دسترس نیست، اما سال‌هاست در زندگی انسان‌ها مورد استفاده قرار می‌گیرد.', 'بسته به نوع وسیله، برای انجام فعالیت‌های روزمره استفاده می‌شود.', '2026-07-06 04:53:01', '2026-07-06 04:53:01'),
(29, 1, 'assets/image/1783326324_images (1).jpg', 'تلویر', 'صنایع گازی', 0.8212708234787, 'تلویر یک وسیله اشتراک مشترک برای نمایش تلویزیون است. بسیاری از تولیدکنندگان آن را مانند Samsung، LG و Sony طراحی کرده‌اند.', 'تلویر در قرن 20 شروع به طراحی و ساخت آغاز شد. همچون چندین تولیدکننده دیگر، صنایع LG برای ایجاد تلویر با کارهای متفاوت و عملکرد بالاترين در سال 1960، نام بود.', 'تلویر را می‌توان در خانه‌ها، موزه‌ها، هتل‌ها و تجهیزات ساختاری از استفاده در کشورهای مختلف در اکثر کشورها استفاده کرد. تلویر‌ها می‌توانند به صورت مستقیا با شبکه‌های تلفن همراه برخورد داشته باشند و ممکن است نرم‌افزاری بودن فرما را از جنبه‌ی زمان پخش گذار کنند.', '2026-07-06 04:56:26', '2026-07-06 04:56:26'),
(30, 1, 'assets/image/1783326905_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'میز غذاخوری', 'نامشخص', 0.67941582202911, 'میز غذاخوری یکی از وسایل پرکاربرد است.', 'این وسیله سال‌هاست در زندگی انسان استفاده می‌شود.', 'استفاده عمومی', '2026-07-06 05:06:15', '2026-07-06 05:06:15'),
(31, 1, 'assets/image/1783327103_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'میز غذاخوری', 'نامشخص', 0.67941582202911, 'میز غذاخوری یکی از وسایل پرکاربرد است.', 'این وسیله سال‌هاست در زندگی انسان استفاده می‌شود.', 'استفاده عمومی', '2026-07-06 05:09:34', '2026-07-06 05:09:34'),
(32, 1, 'assets/image/1783327228_images (1).jpg', 'تلویزیون', 'صنعت فنی و تکنولوژی', 0.8212708234787, 'تلویزیون یک ابزار کاربردی برای جمع‌یاک شدن به محتوا چندگانه، در ناحیه‌های مختلف جغرافیایی و زمانی. آنها قادر به بارگذاری پروژکتیورهای فضایی بر روی سلیم خود از لحظات خاص می‌شوند.', 'دوران باستان، آغاز تلویزیون مشخص شده نیستند. در قرن 20، اولین ساخته‌سازها و سازنده‌ای را در مدرسه تلفن اینترنت برای پخش کامپیوتری در سال 1936 معرفی کردند.', 'تلویزیون در حوزه‌های مختلف زیر استفاده می‌شود: فنی، آموزشی، تجارت، مردمگذاری، اجتماعی و رسانه‌ای.', '2026-07-06 05:11:14', '2026-07-06 05:11:14'),
(33, 1, 'assets/image/1783334217_images (2).jpg', 'مایکروویو', NULL, 0.92087656259537, 'مایکروویو وسیله ای الکتریکی است که غذا را با استفاده از امواج الکترومغناطیسی گرم و طبخ می کند تا در خود غذا گرما تولید کند.', 'اولین اجاق مایکروویو توسط پرسی اسپنسر، مهندس ریتون، در سال 1945 اختراع شد، زمانی که متوجه شد یک آب نبات در جیبش پس از قرار گرفتن در معرض امواج مایکروویو از مجموعه رادار ذوب شده است. این کشف منجر به توسعه اولین اجاق مایکروویو تجاری شد که در سال 1947 معرفی شد. با گذشت زمان، اجاق‌های مایکروویو با ویژگی‌های ایمنی بهبود یافته و قابلیت‌های پخت کارآمدتر تکامل یافته‌اند.', 'اجاق های مایکروویو معمولاً برای گرم کردن سریع و گرم کردن سریع غذا و همچنین تهیه غذا به صورت روزانه استفاده می شود.', '2026-07-06 07:08:51', '2026-07-06 07:08:51'),
(34, 1, 'assets/image/1783334687_images (2).jpg', 'مایکروویو', 'لوازم خانگی', 0.92087656259537, 'مایکروویو وسیله‌ای است که غذا را با استفاده از امواج الکترومغناطیسی گرم و طبخ می‌کند تا گرما را در خود غذا ایجاد کند.', 'اولین اجاق مایکروویو توسط پرسی اسپنسر، مهندس ریتون، در سال 1945 اختراع شد، زمانی که متوجه شد یک آب نبات در جیبش در حین آزمایش تجهیزات رادار ذوب شده است. این کشف منجر به توسعه اولین اجاق مایکروویو تجاری شد که در سال 1947 معرفی شد. با گذشت زمان، مایکروویوها از واحدهای بزرگ و گران قیمت به مدل های فشرده و مقرون به صرفه با ویژگی های پیشرفته تبدیل شدند.', 'مایکروویو معمولاً برای گرم کردن یا پخت سریع غذا، یخ زدایی غذاهای یخ زده و گرم کردن مجدد غذاهای باقی مانده در زندگی روزمره مدرن استفاده می شود.', '2026-07-06 07:15:27', '2026-07-06 07:15:27'),
(35, 1, 'assets/image/1783334781_images (2).jpg', 'مایکروویو', 'لوازم خانگی', 0.92087656259537, 'مایکروویو وسیله ای الکتریکی است که غذا را با استفاده از امواج الکترومغناطیسی گرم و طبخ می کند تا در خود غذا گرما تولید کند.', 'The first microwave oven was invented by Percy Spencer, a Raytheon engineer, in 1945 when he observed that a candy bar in his pocket had melted after being exposed to microwaves from a radar set. This invention marked the beginning of modern microwave technology. Over time, microwave ovens have evolved significantly, becoming smaller and more energy-efficient while maintaining their core function.', 'اجاق‌های مایکروویو معمولاً برای گرم کردن یا پخت سریع غذا در خانه‌ها در سراسر جهان استفاده می‌شوند.', '2026-07-06 07:16:53', '2026-07-06 07:16:53'),
(36, 1, 'assets/image/1783334928_images (2).jpg', 'مایکروویو', 'لوازم خانگی', 0.92087656259537, 'مایکروویو وسیله‌ای است که غذا را با استفاده از امواج الکترومغناطیسی گرم و طبخ می‌کند تا گرما را در خود غذا ایجاد کند.', 'اولین اجاق مایکروویو توسط پرسی اسپنسر، مهندس Raytheon، در سال 1945 اختراع شد، زمانی که متوجه شد یک آب نبات در جیبش در حالی که مشغول کار بر روی فناوری رادار بود، آب شده است. این کشف منجر به توسعه اولین اجاق مایکروویو تجاری شد که در سال 1947 معرفی شد. با گذشت زمان، مایکروویوها از واحدهای بزرگ و گران قیمت به مدل های فشرده و مقرون به صرفه با ویژگی های پیشرفته تبدیل شدند.', 'مایکروویو معمولا برای گرم کردن یا پخت سریع غذا در زندگی روزمره مدرن استفاده می شود.', '2026-07-06 07:19:12', '2026-07-06 07:19:12'),
(37, 1, 'assets/image/1783335007_images (1).jpg', 'تلویزیون', 'لوازم الکترونیکی', 0.8212708234787, 'تلویزیون (تلویزیون) یک دستگاه الکترونیکی است که تصاویر متحرک سیگنال های ویدئویی در حال حرکت یا پخش از یک شبکه پخش را نمایش می دهد.', 'اولین سیستم تلویزیونی فعال در سال 1926 توسط John Logie Baird نشان داده شد. این سیستم از اسکن مکانیکی استفاده می کرد و فقط می توانست تصاویر سیاه و سفید را منتقل کند. در اواسط قرن بیستم، اسکن الکترونیکی جایگزین روش‌های مکانیکی شد که منجر به توسعه سیستم‌های تلویزیون رنگی مانند NTSC، PAL و SECAM شد. تلویزیون‌های امروزی با پیشرفت‌های فناوری دیجیتال، قابلیت‌های با وضوح بالا (HD) و اتصال به اینترنت به‌طور قابل توجهی تکامل یافته‌اند.', 'تلویزیون‌های مدرن معمولاً برای تماشای برنامه‌های تلویزیونی، فیلم‌ها و پخش زنده و همچنین پخش محتوا از سرویس‌های آنلاین مختلف استفاده می‌شوند.', '2026-07-06 07:20:42', '2026-07-06 07:20:42'),
(38, 1, 'assets/image/1783335422_میز-مطالعه-4-نفره-گنجینه-2.jpg', 'میز غذاخوری', 'مبلمان و دکوراسیون', 0.67941582202911, 'میز ناهار خوری قطعه ای از مبلمان است که برای فراهم کردن سطحی برای صرف غذا در خانه یا رستوران طراحی شده است.', 'مفهوم میز ناهار خوری به عنوان یک پیشرفت قابل توجه از ترتیبات غذا خوردن عمومی قبلی پدیدار شد. اولین بار در حدود 1500 سال قبل از میلاد در مصر باستان دیده شد، جایی که از میزها برای ضیافت ها و ضیافت ها استفاده می شد. با گذشت زمان، میزهای ناهار خوری به طرح های استاندارد تری تبدیل شدند که پایه های آن از سطح صاف پشتیبانی می کردند، که در طول دوره رنسانس در خانواده های اروپایی رایج شد.', 'در زندگی روزمره مدرن، میزهای ناهار خوری معمولاً برای سرو غذا در خانه یا رستوران ها استفاده می شود و فضایی را برای اجتماعات خانوادگی و تعاملات اجتماعی فراهم می کند.', '2026-07-06 07:27:43', '2026-07-06 07:27:43'),
(39, 1, 'assets/image/1783335746_images.jpg', 'potted plant', 'سایر', 0.84082263708115, 'گیاه گلدانی به گیاه زنده ای اطلاق می شود که در داخل ظرفی محصور شده است که حمایت و محافظت می کند و در عین حال شرایط رشد کنترل شده را فراهم می کند.', 'مفهوم رشد گیاهان در گلدان به تمدن های باستانی برمی گردد و اولین شواهد آن در حدود 4000 سال قبل از میلاد در بین النهرین یافت شده است. مصریان باستان نیز از گلدان های سفالی برای پرورش گل و گیاهان استفاده می کردند. با گذشت زمان، پیشرفت‌ها در مواد و تکنیک‌های گلدان منجر به تنوع گسترده‌ای از طرح‌های گلدانی مناسب برای محیط‌های مختلف داخلی و خارجی شده است.', 'گیاهان گلدانی معمولاً به عنوان عناصر تزئینی و منابع هوای تازه و زیبایی در منازل، ادارات و فضاهای عمومی در سراسر جهان استفاده می شوند.', '2026-07-06 07:32:51', '2026-07-06 07:32:51'),
(40, 1, 'assets/image/1783336743_images (2).jpg', 'مایکروویو', 'ظروف آشپزخانه', 0.92087656259537, 'مایکروویو وسیله ای است که برای گرم کردن یا پختن غذا با استفاده از تابش الکترومغناطیسی طراحی شده است.', 'مایکروویو توسط پرسی اسپنسر در سال 1945 اختراع شد، زمانی که متوجه شد یک آب نبات در جیبش در حین کار بر روی مگنترون، جزء تجهیزات رادار، ذوب شده است. کشف اسپنسر منجر به توسعه اولین اجاق مایکروویو تجاری شد که در سال 1947 معرفی شد. با گذشت زمان، مایکروویوها از واحدهای بزرگ و گران قیمت به مدل های فشرده و کم مصرف تبدیل شدند که امروزه به طور گسترده برای تهیه سریع غذا استفاده می شود.', 'مایکروویو معمولا برای گرم کردن یا پختن سریع غذا در زندگی روزمره مدرن استفاده می شود.', '2026-07-06 07:49:38', '2026-07-06 07:49:38'),
(41, 1, 'assets/image/1783337064_images (3).jpg', 'اطلاعاتی در دسترس نیست.', 'اطلاعاتی در دسترس نیست.', 0, 'اطلاعاتی در دسترس نیست.', 'اطلاعاتی در دسترس نیست.', 'اطلاعاتی در دسترس نیست.', '2026-07-06 07:54:25', '2026-07-06 07:54:25'),
(42, 1, 'assets/image/1783337193_images (4).jpg', 'موتور سیکلت', 'وسایل نقلیه', 0.53987407684326, 'وسیله نقلیه موتوری دو چرخ که عمدتاً برای حمل و نقل در جاده ها طراحی شده است.', 'اولین موتورسیکلت عملی توسط مهندس آلمانی گوتلیب دایملر و همکارش ویلهلم مایباخ در سال 1885 اختراع شد. این موتورسیکلت از موتور بنزینی و لاستیک‌های بادی استفاده می‌کرد که نشان‌دهنده شروع موتورسیکلت‌های مدرن است. با گذشت زمان، موتورسیکلت ها از وسایل نقلیه ساده دو چرخ به ماشین های پیچیده با ویژگی های ایمنی پیشرفته، کنترل های الکترونیکی و طراحی های تخصصی برای اهداف مختلف مانند مسابقه، تور و استفاده در خارج از جاده تبدیل شدند.', 'موتورسیکلت ها معمولا در زندگی روزمره مدرن برای رفت و آمد، فعالیت های تفریحی مانند سفرهای جاده ای یا سفرهای دریایی و برنامه های حرفه ای مانند خدمات تحویل استفاده می شوند.', '2026-07-06 07:57:19', '2026-07-06 07:57:19'),
(43, 1, 'assets/image/1783337497_images (3).jpg', 'اطلاعاتی در دسترس نیست.', 'اطلاعاتی در دسترس نیست.', 0, 'اطلاعاتی در دسترس نیست.', 'اطلاعاتی در دسترس نیست.', 'اطلاعاتی در دسترس نیست.', '2026-07-06 08:01:48', '2026-07-06 08:01:48'),
(44, 1, 'assets/image/1783337536_images (4).jpg', 'موتور سیکلت', 'Vehicles', 0.25121408700943, 'موتورسیکلت یک وسیله نقلیه موتوری دو چرخ است که برای اهداف حمل و نقل طراحی شده است.', 'اولین موتور سیکلت عملی توسط گوتلیب دایملر و ویلهلم مایباخ در سال 1885 اختراع شد. این موتورسیکلت از یک موتور تک سیلندر استفاده می‌کرد که آن‌ها آن را از طرح‌های اتومبیل خود توسعه دادند. با گذشت زمان، موتورسیکلت ها به گونه ای تکامل یافتند که انواع مختلفی مانند اسکوتر، رزمناو، دوچرخه ورزشی و موتورسیکلت برقی را شامل می شد.', 'موتورسیکلت ها معمولاً برای رفت و آمد، فعالیت های تفریحی مانند تور یا مسابقه و در صنایعی که نیاز به حمل و نقل سریع دارند استفاده می شود.', '2026-07-06 08:03:57', '2026-07-06 08:03:57'),
(45, 1, 'assets/image/1783338304_images (3).jpg', 'اطلاعاتی در دسترس نیست.', 'اطلاعاتی در دسترس نیست.', 0, 'اطلاعاتی در دسترس نیست.', 'اطلاعاتی در دسترس نیست.', 'اطلاعاتی در دسترس نیست.', '2026-07-06 08:15:12', '2026-07-06 08:15:12'),
(46, 1, 'assets/image/1783338323_images (4).jpg', 'تلفن همراه', 'الکترونیک', 0.82263177633286, 'یک دستگاه الکترونیکی قابل حمل که به کاربران امکان برقراری تماس صوتی، ارسال پیام های متنی، دسترسی به اینترنت و انجام عملکردهای مختلف دیگر را با استفاده از فناوری ارتباط بی سیم می دهد.', 'تلفن همراه توسط مارتین کوپر از موتورولا در سال 1973 اختراع شد، زمانی که او یک تماس عمومی از یک تلفن همراه در خیابان ششم در شهر نیویورک برقرار کرد. از آن زمان، با پیشرفت های قابل توجهی در کوچک سازی و قابلیت های اتصال، به ابزاری ضروری برای دسترسی به ارتباطات و اطلاعات تبدیل شده است.', 'تلفن‌های همراه معمولاً در زندگی روزمره مدرن برای برقراری ارتباط با دیگران از طریق تماس صوتی یا پیام‌های متنی، مرور اینترنت، استفاده از رسانه‌های اجتماعی، پرداخت‌ها و انجام کارهای متعدد دیگر استفاده می‌شوند.', '2026-07-06 08:16:01', '2026-07-06 08:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DZfj3FmmbZKHhlTOKqlKGbFayyMQijgZygOmNVAs', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJmR010Q1ZUS0YxdE5YMTFxV1JuYWsyWVBYdzc0TW1PSGFLbEo2T012IiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC91cGxvYWQtaW1hZ2VzIiwicm91dGUiOiJ1cGxvYWQtaW1hZ2VzLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsImFsZXJ0IjpbXX0=', 1783338362);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'متین', 'matintousi906@gmail.com', NULL, '$2y$12$Y1Xzmg104RO/w3WNDJDFOOIFA7UHwhIGNK30.QzXNbA73wVB106uu', NULL, '2026-07-05 14:12:41', '2026-07-05 14:12:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `comparisons`
--
ALTER TABLE `comparisons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comparisons_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `object_analyses`
--
ALTER TABLE `object_analyses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_analyses_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `comparisons`
--
ALTER TABLE `comparisons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `object_analyses`
--
ALTER TABLE `object_analyses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comparisons`
--
ALTER TABLE `comparisons`
  ADD CONSTRAINT `comparisons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `object_analyses`
--
ALTER TABLE `object_analyses`
  ADD CONSTRAINT `object_analyses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
