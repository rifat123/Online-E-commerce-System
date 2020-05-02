-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 12:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techgear`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `uid` int(5) DEFAULT NULL,
  `subtotal` int(8) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `aid` int(5) DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `subtotal`, `status`, `aid`, `payment_method`, `created`, `deleted`) VALUES
(1, 2, 3000, 'Completed', 2, 'Cash On Delivery', '2019-03-30 13:37:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(5) NOT NULL,
  `oid` int(5) DEFAULT NULL,
  `table_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` int(5) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `price` int(8) DEFAULT NULL,
  `customer_rating` int(2) DEFAULT NULL,
  `customer_comment` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `oid`, `table_name`, `pid`, `quantity`, `price`, `customer_rating`, `customer_comment`, `deleted`) VALUES
(1, 1, 'ram', 1, 1, 3000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `Id` int(5) NOT NULL,
  `Title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Brand` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Model` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code_Name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Generation` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Base_Frequency` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Turbo_Frequency_Max` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Core` int(6) NOT NULL,
  `Thread` int(6) NOT NULL,
  `Smart_Cache` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `L2_Cache` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `L3_Cache` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bus_Speed` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TDP` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lithography` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Memory_Max` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Memory_Type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Memory_Chanel` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ECC_Memory_Supported` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sockets_Supported` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Specialty` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Others` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Compatible_Products` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Warranty` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` int(6) NOT NULL,
  `Price` int(6) NOT NULL,
  `Video_Link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_1` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_3` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_4` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_5` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_6` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Deleted` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`Id`, `Title`, `Brand`, `Model`, `Code_Name`, `Generation`, `Base_Frequency`, `Turbo_Frequency_Max`, `Core`, `Thread`, `Smart_Cache`, `L2_Cache`, `L3_Cache`, `Bus_Speed`, `TDP`, `Lithography`, `Memory_Max`, `Memory_Type`, `Memory_Chanel`, `ECC_Memory_Supported`, `Sockets_Supported`, `Specialty`, `Others`, `Compatible_Products`, `Warranty`, `Quantity`, `Price`, `Video_Link`, `Picture_1`, `Picture_2`, `Picture_3`, `Picture_4`, `Picture_5`, `Picture_6`, `Deleted`) VALUES
(1, 'Intel Coffee Lake Core i3 8100 3.60GHz, 4 Core, 6MB Cache LGA1151 8th Gen. Processor', 'Intel', 'Intel Coffee Lake Core i3 8100', 'Coffee Lake', '8th', '3.60 GHz', '4 GHz', 4, 4, '6 MB', NULL, NULL, '8 GT/s DMI3', '65 W', '14 nm', '64 GB', 'DDR4-2400', '2', 'No', 'LGA1151', 'Intel Quick Sync Video, Intel InTru 3D Technology, Intel Clear Video HD Technology, Intel Optane Memory Supported, Intel Virtualization Technology', NULL, 'Chipset: B360, H370, H310, Q370, Z370', '3 Years', 50, 11600, NULL, '/images/product/processor/1/Picture_1.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Intel Coffee Lake Core i5 8500 3.00-4.10GHz, 6 Core, 9MB Cache LGA1151 8th Gen. Processor', 'Intel', 'Intel Core i5 8500', 'Coffee Lake', '8th', '3.00 GHz', '4.10 GHz', 6, 6, '9 MB', NULL, NULL, '8 GT/s DMI3', '65 W', '14 nm', '64 GB', 'DDR4-2666', '2', NULL, 'LGA1151', NULL, 'Processor Graphics: Intel UHD Graphics 630, Graphics Base Frequency: 50.0 MHz', 'Chipset: B360, H370, H310, Z370', '2 Years', 50, 2300, NULL, '/images/product/processor/2/Picture_1.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'AMD Ryzen 5 2600X 3.6GHZ-4.2GHz 6 Core 19MB+ Cache AM4 Socket Processor', 'AMD', 'AMD Ryzen 5 2600X', NULL, NULL, '3.6 GHz', '4.2 GHz', 6, 12, '2 MB', '3 MB', '16 MB', NULL, '95 W', '12 nm', NULL, 'DDR4-2933', '2', NULL, 'AM4', 'AMD StoreMI Technology, AMD SenseMI Technology, AMD Ryzen Master Utility, AMD Ryzen VR-Ready Premium', 'Thermal Solution: Wraith Spire, PCI Express Version: PCIe 3.0 x16, Max Temps: 95Degree C', NULL, '4 Years', 50, 20000, NULL, '/images/product/processor/3/Picture_1.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `processorcolumn`
--

CREATE TABLE `processorcolumn` (
  `Id` int(5) NOT NULL,
  `Column_Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Column_Type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Required` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dummy_Data` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Max_Length` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processorcolumn`
--

INSERT INTO `processorcolumn` (`Id`, `Column_Name`, `Column_Type`, `Required`, `Dummy_Data`, `Max_Length`) VALUES
(1, 'Id', 'number', 'required', '101', 5),
(2, 'Title', 'text', 'required', 'Intel 9th Gen Coffee Lake Core i5 9400F 2.9GHz-4.10GHz 6 Core, 9MB Cache Processor', 200),
(3, 'Brand', 'text', 'required', 'Intel', 200),
(4, 'Model', 'text', 'required', 'Intel Core i5 9400F', 200),
(5, 'Code_Name', 'text', NULL, 'Coffee Lake', 200),
(6, 'Generation', 'text', NULL, '9th', 200),
(7, 'Base_Frequency', 'text', 'required', '2.9 GHz', 200),
(8, 'Turbo_Frequency_Max', 'text', NULL, '4.10 GHz', 200),
(9, 'Core', 'number', 'required', '6', 200),
(10, 'Thread', 'number', 'required', '4', 200),
(11, 'Smart_Cache', 'text', 'required', '9 MB', 200),
(12, 'L2_Cache', 'text', NULL, '2 MB', 200),
(13, 'L3_Cache', 'text', NULL, '4 MB', 200),
(14, 'Bus_Speed', 'text', NULL, '8 GT/s DMI3', 200),
(15, 'TDP', 'text', 'required', '65 W', 200),
(16, 'Lithography', 'text', 'required', '14 nm', 200),
(17, 'Memory_Max', 'text', NULL, '128 GB', 200),
(18, 'Memory_Type', 'text', 'required', 'DDR4-2666', 200),
(19, 'Memory_Chanel', 'text', NULL, '4', 200),
(20, 'ECC_Memory_Supported', 'text', NULL, 'No', 200),
(21, 'Sockets_Supported', 'text', 'required', 'TR4', 200),
(22, 'Specialty', 'text', NULL, 'Intel Optane Memory Supported, Intel Identity Protection Technology,', 200),
(23, 'Others', 'text', NULL, 'PCI Express Version: PCIe 3.0, Intel Turbo Boost Technology: 2.0', 200),
(24, 'Compatible_Products', 'text', NULL, 'Chipset: H370, B360, Z390, Z370', 200),
(25, 'Warranty', 'text', 'required', '2 Years', 50),
(26, 'Quantity', 'number', 'required', '125', 5000),
(27, 'Price', 'number', 'required', '25300', 1000000),
(28, 'Video_Link', 'url', NULL, 'https://www.youtube.com/watch?v=gLb9dlG1SCU', 200),
(29, 'Picture_1', 'file', NULL, 'Size of picture must be 600x600', 50),
(30, 'Picture_2', 'file', NULL, 'Size of picture must be 600x600', 50),
(31, 'Picture_3', 'file', NULL, 'Size of picture must be 600x600', 50),
(32, 'Picture_4', 'file', NULL, 'Size of picture must be 600x600', 50),
(33, 'Picture_5', 'file', NULL, 'Size of picture must be 600x600', 50),
(34, 'Picture_6', 'file', NULL, 'Size of picture must be 600x600', 50),
(35, 'Deleted', 'text', NULL, '04-02-2019', 50);

-- --------------------------------------------------------

--
-- Table structure for table `processorfilter`
--

CREATE TABLE `processorfilter` (
  `Id` int(5) NOT NULL,
  `Filter_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processorfilter`
--

INSERT INTO `processorfilter` (`Id`, `Filter_Name`) VALUES
(1, 'Generation'),
(2, 'Base_Frequency'),
(3, 'Turbo_Frequency_Max'),
(4, 'Core'),
(5, 'Thread'),
(6, 'Bus_Speed'),
(7, 'Lithography'),
(8, 'Memory_Type'),
(9, 'Brand');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `Id` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` int(5) DEFAULT NULL,
  `qdate` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtime` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adate` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atime` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`Id`, `name`, `email`, `question`, `answer`, `table_name`, `pid`, `qdate`, `qtime`, `adate`, `atime`, `deleted`) VALUES
(1, 'Joyan Barai', 'baraijoyan@gmail.com', 'Is this product has dedicated graphics?', 'Yes sir.', 'processor', 3, '17-03-2019', '10:58:31 am', '17/03/2019', '11:05:05 AM', NULL),
(2, 'Joyan Barai', 'baraijoyan@gmail.com', 'DDR4-3600 is supported?', NULL, 'processor', 1, '17-03-2019', '11:04:00 am', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `Id` int(5) NOT NULL,
  `Title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Brand` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Model` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Capacity` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RAM_Type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bus_Speed` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Number_of_Pin` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Part_No` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Voltage` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CAS_Latency` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Others` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Warranty` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` int(6) NOT NULL,
  `Price` int(6) NOT NULL,
  `Video_Link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_1` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_3` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_4` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_5` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Picture_6` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Deleted` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`Id`, `Title`, `Brand`, `Model`, `Capacity`, `RAM_Type`, `Bus_Speed`, `Number_of_Pin`, `Part_No`, `Voltage`, `CAS_Latency`, `Others`, `Warranty`, `Quantity`, `Price`, `Video_Link`, `Picture_1`, `Picture_2`, `Picture_3`, `Picture_4`, `Picture_5`, `Picture_6`, `Deleted`) VALUES
(1, 'G.Skill Ripjaws 4GB DDR4 2666MHz Desktop RAM', 'G.Skill', 'G.Skill Ripjaws', '4 GB', 'DDR4', '2666 MHz', NULL, 'F4-2666C15D-8GVR', '1.2 V', '15-15-15-35', 'Intel XMP 2.0 (Extreme Memory Profile) Ready', 'Product Life Time', 200, 3000, 'https://www.youtube.com/embed/zpOULjyy-n8?rel=0', '/images/product/ram/1/Picture_1.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ADATA SPECTRIX D40 RGB 8GB DDR4 3000MHz Desktop RAM', 'A Data', 'ADATA SPECTRIX D40', '8 GB', 'DDR4', '3000 MHz', NULL, NULL, NULL, NULL, 'Gaming Desktop RAM', 'Product Life Time', 350, 8800, 'https://www.youtube.com/embed/zpOULjyy-n8?rel=0', '/images/product/ram/2/Picture_1.jpg', '/images/product/ram/2/Picture_2.jpg', '/images/product/ram/2/Picture_3.jpg', NULL, NULL, NULL, NULL),
(3, 'Twinmos 4GB DDR3 1600 BUS Desktop RAM', 'Twinmos', 'Twinmos 400X', '4 GB', 'DDR3', '1600 MHz', '128 Pin', NULL, '1.5 V', NULL, NULL, 'Product Life Time', 20, 1900, NULL, '/images/product/ram/3/Picture_1.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ramcolumn`
--

CREATE TABLE `ramcolumn` (
  `Id` int(5) NOT NULL,
  `Column_Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Column_Type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Required` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dummy_Data` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Max_Length` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ramcolumn`
--

INSERT INTO `ramcolumn` (`Id`, `Column_Name`, `Column_Type`, `Required`, `Dummy_Data`, `Max_Length`) VALUES
(1, 'Id', 'number', 'required', '101', 5),
(2, 'Title', 'text', 'required', 'Gigabyte 8GB DDR4 2666MHz Black Heatsink Desktop RAM', 200),
(3, 'Brand', 'text', 'required', 'Gigabyte', 200),
(4, 'Model', 'text', 'required', 'Gigabyte 8GB', 200),
(5, 'Capacity', 'text', 'required', '8 GB', 200),
(6, 'RAM_Type', 'text', 'required', 'DDR4', 200),
(7, 'Bus_Speed', 'text', 'required', '2666 MHz', 200),
(8, 'Number_of_Pin', 'text', NULL, '288 Pin', 200),
(9, 'Part_No', 'text', NULL, 'GP-GR26C16S8K2HU416', 200),
(10, 'Voltage', 'text', NULL, '1.2 V', 200),
(11, 'CAS_Latency', 'text', NULL, '16-16-16-35', 200),
(12, 'Others', 'text', NULL, 'Black Heatsink Desktop RAM, Heatspreader Color: Black', 200),
(13, 'Warranty', 'text', 'required', '2 Years', 50),
(14, 'Quantity', 'number', 'required', '125', 5000),
(15, 'Price', 'number', 'required', '25300', 1000000),
(16, 'Video_Link', 'url', NULL, 'https://www.youtube.com/watch?v=gLb9dlG1SCU', 200),
(17, 'Picture_1', 'file', NULL, 'Size of picture must be 600x600', 50),
(18, 'Picture_2', 'file', NULL, 'Size of picture must be 600x600', 50),
(19, 'Picture_3', 'file', NULL, 'Size of picture must be 600x600', 50),
(20, 'Picture_4', 'file', NULL, 'Size of picture must be 600x600', 50),
(21, 'Picture_5', 'file', NULL, 'Size of picture must be 600x600', 50),
(22, 'Picture_6', 'file', NULL, 'Size of picture must be 600x600', 50),
(23, 'Deleted', 'text', NULL, '04-02-2019', 50);

-- --------------------------------------------------------

--
-- Table structure for table `ramfilter`
--

CREATE TABLE `ramfilter` (
  `Id` int(5) NOT NULL,
  `Filter_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ramfilter`
--

INSERT INTO `ramfilter` (`Id`, `Filter_Name`) VALUES
(1, 'Brand'),
(2, 'Capacity'),
(3, 'RAM_Type'),
(4, 'Bus_Speed');

-- --------------------------------------------------------

--
-- Table structure for table `scs`
--

CREATE TABLE `scs` (
  `Id` int(5) NOT NULL,
  `Table_Name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_Id` int(5) DEFAULT NULL,
  `Picture` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Info` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Deleted` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scs`
--

INSERT INTO `scs` (`Id`, `Table_Name`, `Product_Id`, `Picture`, `Type`, `Info`, `Deleted`) VALUES
(1, 'processor', 3, '/images/slider/processor_3.jpg', 'slider', NULL, NULL),
(2, 'processor', 2, '/images/slider/processor_2.jpg', 'slider', NULL, NULL),
(3, 'ram', 1, '/images/slider/ram_1.jpg', 'slider', NULL, NULL),
(4, 'ram', 3, NULL, 'collection', NULL, NULL),
(5, 'ram', 2, NULL, 'collection', NULL, NULL),
(6, 'processor', 2, NULL, 'collection', NULL, NULL),
(7, 'processor', 3, NULL, 'collection', NULL, NULL),
(8, 'processor', 1, NULL, 'collection', NULL, NULL),
(9, NULL, NULL, '/images/static/9.gif', 'static', 'EMI System\r\n\r\nযে কোন পণ্য ইএমআই এর আওতায় কেনা যাবে।\r\nএকটি অর্ডারের পরিমাণ ন্যূনতম ৫ হাজার টাকা হতে হবে, ঐ অর্ডার ভুক্ত একেকটি আইটেম মূল্য যাই হউক না কেন।\r\nকিস্তির সময়সীমা সর্বোচ্চ ৬ মাস।\r\n০% ইন্টারেস্ট এবং অন্য কোন চার্জ কাটা হয় না।\r\n\r\nইস্টার্ন ব্যাংক, সাউথ ইস্ট ব্যাংক, সিটি ব্যাংক (আমেরিকান এক্সপ্রেস কার্ড), ব্র্যাক ব্যাংক, স্ট্যান্ডার্ড চাটার্ড ব্যাংক, প্রাইম ব্যাংক, এনআরবি ব্যাংক, মার্কেন্টাইল ব্যাংক (সিম্পল পে), লংকা বাংলা এর ক্রেডিড কার্ডের মাধ্যমে কেনার ক্ষেত্রে এই সুবিধা পাওয়া যাবে।\r\n\r\nইএমআই এর জন্য Tech Gear ওয়েব সাইট বা কোটেশনে উল্লেখিত শুধুমাত্র রেগুলার প্রাইস প্রযোজ্য।\r\n\r\nযেকোন প্রয়োজনে কল করুন +8801765422779, +88017152458656', NULL),
(10, 'ram', 2, '/images/static/10.png', 'static', NULL, NULL),
(12, NULL, NULL, '/images/static/12.gif', 'static', 'Cox’s Bazar is a town on the southeast coast of Bangladesh. \r\nIt’s known for its very long, sandy beachfront, stretching from Sea Beach in the north to Kolatoli Beach in the south. \r\nAggameda Khyang monastery is home to bronze statues and centuries-old Buddhist manuscripts. South of town, the tropical rainforest of Himchari National Park has waterfalls and many birds. North, sea turtles breed on nearby Sonadia Island.\r\n\r\nThe modern Cox\'s Bazar derives its name from Captain Hiram Cox, an officer of the British East India Company. \r\nCox was appointed Superintendent of Palongkee outpost after Warren Hastings became Governor of Bengal. \r\nHe embarked upon the task of rehabilitation and settlement of the Arakanese refugees in the area. \r\nCaptain Cox died in 1799 before he could finish his work. \r\nTo commemorate his role in rehabilitation work, a market was established and named Cox\'s Bazar after him. \r\nUnlike many locations in the Indian Subcontinent where place names dating from the colonial period have been changed, Cox\'s name is still retained in the city he founded.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `Id` int(3) NOT NULL,
  `Category` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Table_Name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Deleted` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`Id`, `Category`, `Table_Name`, `Deleted`) VALUES
(1, 'desktop parts', 'processor', NULL),
(2, 'desktop parts', 'ram', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletedAt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`, `type`, `phone`, `fax`, `deletedAt`) VALUES
(1, 'Tech Gear', 'techgear@gmail.com', '12345', NULL, 'admin', NULL, NULL, NULL),
(2, 'Joyan Barai', 'baraijoyan@gmail.com', '12345', NULL, 'user', '01765422779', '56865456644', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(5) NOT NULL,
  `uid` int(5) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` int(10) DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `uid`, `name`, `company`, `address_1`, `address_2`, `thana`, `district`, `division`, `post_code`, `phone`, `country`, `default_address`, `deleted`) VALUES
(1, 2, 'Joyan Barai', NULL, '122/B Didar Vabon, Monipuripara Gate No-6', NULL, 'Tejgaon', 'Dhaka', 'Dhaka', 23356, NULL, 'Bangladesh', 'yes', NULL),
(2, 2, 'Rifat Hasan', NULL, '122/B Didar Vabon, Monipuripara Gate No-6', NULL, 'Madaripur', 'Madaripur', 'Dhaka', 78587, NULL, 'Bangladesh', NULL, '30-03-2019');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `table_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` int(5) NOT NULL,
  `deleted` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `uid`, `table_name`, `pid`, `deleted`) VALUES
(1, 2, 'processor', 2, NULL),
(2, 2, 'processor', 3, NULL),
(3, 2, 'ram', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c3` (`uid`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c4` (`oid`);

--
-- Indexes for table `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `processorcolumn`
--
ALTER TABLE `processorcolumn`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `processorfilter`
--
ALTER TABLE `processorfilter`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ramcolumn`
--
ALTER TABLE `ramcolumn`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ramfilter`
--
ALTER TABLE `ramfilter`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `scs`
--
ALTER TABLE `scs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c1` (`uid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c2` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `processor`
--
ALTER TABLE `processor`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `processorcolumn`
--
ALTER TABLE `processorcolumn`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `processorfilter`
--
ALTER TABLE `processorfilter`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ramcolumn`
--
ALTER TABLE `ramcolumn`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ramfilter`
--
ALTER TABLE `ramfilter`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scs`
--
ALTER TABLE `scs`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `c3` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `c4` FOREIGN KEY (`oid`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `c1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `c2` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
