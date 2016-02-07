-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 11:31 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ehkasi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `date_tbl`
--

CREATE TABLE IF NOT EXISTS `date_tbl` (
  `d_id` int(11) NOT NULL,
  `d_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE IF NOT EXISTS `event_tbl` (
  `e_id` int(5) NOT NULL,
  `e_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`e_id`, `e_name`) VALUES
(1, 'Anniversaries'),
(2, 'Baptismal'),
(3, 'Birthday'),
(4, 'Graduation'),
(5, 'Wedding');

-- --------------------------------------------------------

--
-- Table structure for table `filter_event_tbl`
--

CREATE TABLE IF NOT EXISTS `filter_event_tbl` (
  `filter_id` int(5) NOT NULL,
  `filter_event` varchar(25) NOT NULL,
  `p_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filter_event_tbl`
--

INSERT INTO `filter_event_tbl` (`filter_id`, `filter_event`, `p_id`) VALUES
(1, 'Birthday', 1),
(2, 'Birthday', 3),
(3, 'Birthday', 6),
(4, 'Birthday', 7),
(5, 'Birthday', 10),
(6, 'Baptismal', 5),
(7, 'Baptismal', 4),
(8, 'Baptismal', 6),
(9, 'Baptismal', 9),
(10, 'Baptismal', 12),
(11, 'Baptismal', 14),
(12, 'Graduation', 5),
(13, 'Graduation', 6),
(14, 'Graduation', 7),
(15, 'Graduation', 12),
(16, 'Graduation', 15),
(17, 'Graduation', 14),
(18, 'Graduation', 10),
(19, 'Reception', 4),
(20, 'Reception', 6),
(21, 'Reception', 7),
(22, 'Reception', 10),
(23, 'Reception', 13),
(24, 'Wedding', 5),
(25, 'Wedding', 6),
(26, 'Wedding', 8),
(27, 'Wedding', 9),
(28, 'Wedding', 10),
(29, 'Wedding', 12),
(30, 'Wedding', 14),
(31, 'Wedding', 15);

-- --------------------------------------------------------

--
-- Table structure for table `foodpackage_tbl`
--

CREATE TABLE IF NOT EXISTS `foodpackage_tbl` (
  `p_id` int(5) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` decimal(10,0) NOT NULL,
  `f1` varchar(50) DEFAULT NULL,
  `f2` varchar(50) DEFAULT NULL,
  `f3` varchar(50) DEFAULT NULL,
  `f4` varchar(50) DEFAULT NULL,
  `f5` varchar(50) DEFAULT NULL,
  `f6` varchar(50) DEFAULT NULL,
  `f7` varchar(50) DEFAULT NULL,
  `f8` varchar(50) DEFAULT NULL,
  `f9` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodpackage_tbl`
--

INSERT INTO `foodpackage_tbl` (`p_id`, `p_name`, `p_price`, `f1`, `f2`, `f3`, `f4`, `f5`, `f6`, `f7`, `f8`, `f9`) VALUES
(1, 'Kiddy Set A', '120', 'Spaghetti', 'Chicken Lollipop/Shanghai Rolls/BBQ', 'Hotdog with Mallows', 'Tetra Pack Juice', NULL, NULL, NULL, NULL, NULL),
(3, 'Kiddy Set B (With Chairs and Tables)', '250', 'Spaghetti', 'Chicken Lollipop/Shanghai Rolls/BBQ', 'Hotdog with Mallows', 'Ice Cream on cup', 'Tetra Pack Juice', 'Choco Fountain with Mallows and Pretzels', NULL, NULL, NULL),
(4, 'Buffet 1', '250', 'Chicken Afritada', 'Fish Fillet with Tofu and Black Beans', 'Mixed Vegetables', 'Pansit Canton', 'Steamed Rice', 'Iced Tea', NULL, NULL, NULL),
(5, 'Buffet 2', '250', 'Chicken Afritada', 'Fish Fillet with Sweet and Sour Sauce', 'Mixed Vegetables', 'Pansit Canton', 'Steamed Rice', 'Iced Tea', NULL, NULL, NULL),
(6, 'Buffet 3', '250', 'Sweet and Sour Pork', 'Chicken Lollipop', 'Mixed Vegetables', 'Pansit Canton', 'Steamed Rice', 'Iced Tea', NULL, NULL, NULL),
(7, 'Buffet Set A', '260', 'Ox Tail in Peanut Sauce', 'Fried Chicken with Gravy', 'Fish Fillet with Sweet and Sour Sauce', 'Mixed Vegetables', 'Pansit Canton', 'Steamed Rice', 'Iced Tea', NULL, NULL),
(8, 'Buffet Set B', '260', 'Beef Caldereta', 'Chicken Lollipop', 'Fish Fillet with Tofu and Black Beans', 'Mixed Vegetables', 'Pansit Canton', 'Steamed Rice', 'Iced Tea', NULL, NULL),
(9, 'Buffet Set C', '260', 'Pork Stew', 'Chicken Pastel', 'Fish Fillet with Brocolli', 'Mixed Vegetables', 'Pansit Canton', 'Steamed Rice', 'Iced Tea', NULL, NULL),
(10, 'Buffet Set D', '260', 'Pork in Pineapple Sauce', 'Fried Chicken with Gravy', 'Fish Fillet with Sweet and Sour Sauce', 'Mixed Vegetables', 'Pansit Canton', 'Steamed Rice', 'Iced Tea', NULL, NULL),
(11, 'Buffet Set 1', '280', 'Beef Spareribs', 'Ox Tail in Peanut Sauce', 'Chicken Lollipop', 'Fish Fillet with Tofu and Black Beans', 'Mixed Vegetables', 'Steamed Rice', 'Iced Tea', 'Fudge Brownies', NULL),
(12, 'Buffet Set 2', '280', 'Roast Beef with Mushroom', 'Pork Asado', 'Chicken Pastel', 'Fish Fillet with Cream and Garlic Sauce', 'Mixed Vegetables', 'Steamed Rice', 'Iced Tea', 'Special Buko Pandan', NULL),
(13, 'Buffet Set 3', '280', 'Ox Tail in Peanut Sauce', 'Lengua in Creamy Mushroom Sauce', 'Chicken Lollipop', 'Fish Fillet with Sweet and Sour Sauce', 'Mixed Vegetables', 'Steamed Rice', 'Iced Tea', 'Fudge Brownies', NULL),
(14, 'Buffet S1', '300', 'Roast Beef with Mushroom', 'Pork Asado', 'Chicken Lollipop', 'Sweet and Sour Fish fillet', 'Mixed Vegetables', 'Carbonara', 'Steamed Rice', 'Iced Tea', 'Fudge Brownies'),
(15, 'Buffet S2', '300', 'Beef Spareribs', 'Braised Patatim', 'Chicken Lollipop', 'Fish and Tofu with Black Beans', 'Mixed Vegetables', 'Spaghetti Blognese', 'Steamed Rice', 'Iced Tea', 'Fudge Brownies');

-- --------------------------------------------------------

--
-- Table structure for table `info_tbl`
--

CREATE TABLE IF NOT EXISTS `info_tbl` (
  `d_id` int(11) NOT NULL,
  `u_id` varchar(11) NOT NULL,
  `d_date` varchar(255) NOT NULL,
  `d_time` varchar(255) NOT NULL,
  `d_time12` varchar(11) NOT NULL,
  `d_venue` varchar(255) NOT NULL,
  `d_type` varchar(255) NOT NULL,
  `d_person` varchar(255) NOT NULL,
  `d_number` int(11) NOT NULL,
  `d_color` varchar(255) NOT NULL,
  `d_catering` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_tbl`
--

CREATE TABLE IF NOT EXISTS `item_tbl` (
  `i_id` int(11) NOT NULL,
  `i_type` varchar(55) NOT NULL,
  `i_category` varchar(50) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `i_price` int(11) NOT NULL,
  `i_desc` varchar(255) NOT NULL,
  `i_stat` varchar(11) NOT NULL,
  `i_added` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_tbl`
--

INSERT INTO `item_tbl` (`i_id`, `i_type`, `i_category`, `i_name`, `i_price`, `i_desc`, `i_stat`, `i_added`) VALUES
(1, 'Item', 'Table', 'Kiddy Table', 30, 'Tables for kids', 'Available', '2015-07-23'),
(2, 'Item', 'Table', 'Adult Table', 50, 'Tables for adults', 'Available', '2015-07-23'),
(3, 'Item', 'Chair', 'Kiddy Chair', 5, 'Chairs for kids', 'Available', '2015-07-23'),
(4, 'Item', 'Chair', 'Adult Chair', 7, 'Chairs for adults', 'Available', '2015-07-23'),
(5, 'Item', 'Table', 'Long Table', 60, 'Long Table for any event', 'Available', '2015-07-23'),
(6, 'Item', 'Table', 'Buffet Table', 110, 'Table used for buffet', 'Available', '2015-07-23'),
(7, 'Item', 'Package Set', 'Kiddy Set', 40, 'Kiddy table and chairs', 'Available', '2015-07-23'),
(8, 'Item', 'Package Set', 'Adult Set', 70, 'Adult table and chairs', 'Available', '2015-07-23'),
(9, 'Item', 'Table', 'Round Table(4)', 70, 'Round table for 4', 'Available', '2015-07-23'),
(10, 'Item', 'Table', 'Round Table(8)', 130, 'Round table for 8', 'Available', '2015-07-23'),
(11, 'Item', 'Package Set', 'Round Set', 90, 'Round table and chairs', 'Available', '2015-07-23'),
(12, 'Item', 'Package Set', 'Round Set', 180, 'Round table and chairs for 8', 'Available', '2015-07-23'),
(13, 'Item', 'Clothing', 'Table Cloth', 20, 'Table clothing', 'Available', '2015-07-23'),
(14, 'Item', 'Clothing', 'Skirting', 50, 'Table skirting', 'Available', '2015-07-23'),
(15, 'Item', 'Clothing', 'Seat Cover', 15, 'Seat covering', 'Available', '2015-07-23'),
(16, 'Item', 'Clothing', 'Ribbon', 5, 'Ribbons', 'Available', '2015-07-23'),
(17, 'Item', 'Utensils', 'Food Warmer(Small)', 80, 'Food warmer small', 'Available', '2015-07-23'),
(18, 'Item', 'Utensils', 'Food Warmer(Big)', 120, 'Food warmer big', 'Available', '2015-07-23'),
(19, 'Item', 'Utensils', 'Plates', 8, 'Plates', 'Available', '2015-07-23'),
(20, 'Item', 'Utensils', 'Glass', 5, 'Glass', 'Available', '2015-07-23'),
(21, 'Item', 'Utensils', 'Spoon & Fork', 4, 'Spoon & Fork', 'Available', '2015-07-23'),
(22, 'Item', 'Utensils', 'Goblet', 10, 'Goblet', 'Available', '2015-07-23'),
(23, 'Item', 'Utensils', 'Soup Bowl', 4, 'Bowl for soups', 'Available', '2015-07-23'),
(24, 'Item', 'Utensils', 'Platito', 4, 'Small plates', 'Available', '2015-07-23'),
(25, 'Item', 'Utensils', 'Pitcher', 15, 'Pitcher', 'Available', '2015-07-23'),
(26, 'Item', 'Utensils', 'Beer Tower', 150, 'Beer', 'Available', '2015-07-23'),
(27, 'Item', 'Utensils', 'Choco Fountain', 500, 'Choco fountain only', 'Available', '2015-07-23'),
(28, 'Item', 'Utensils', 'Choco Fountain(With chocolate)', 800, 'Choco fountain with chocolate', 'Available', '2015-07-23'),
(29, 'Item', 'Others', 'Tarpaulin', 300, 'Tarpaulin 2x3 size', 'Available', '2015-07-23'),
(30, 'Item', 'Entertainment', 'Bubble Machine', 300, 'Bubble making machine', 'Available', '2015-07-23'),
(31, 'Item', 'AudioVisuals', 'Disco Light', 100, 'Disco Lightining', 'Available', '2015-07-23'),
(32, 'Service', 'Entertainment', 'Mascot', 3000, 'Mascot entairtain', 'Available', '2015-07-23'),
(33, 'Service', 'Others', 'Clown', 600, 'Clown entertain', 'Available', '2015-07-23'),
(34, 'Service', 'Entertainment', 'Magician', 4000, 'Magic show', 'Available', '2015-07-23'),
(35, 'Service', 'Entertainment', 'Face Paint', 1800, 'Face painting', 'Available', '2015-07-23'),
(36, 'Service', 'Others', 'Waiter', 600, 'Catering Service', 'Available', '2015-07-23'),
(37, 'Item', 'Others', 'Ice Cream', 3000, 'Ice cream', 'Available', '2015-07-23'),
(38, 'Item', 'Others', 'Cotton Candy', 1400, 'Cotton Candy', 'Available', '2015-07-23'),
(39, 'Service', 'Others', 'Video Coverage', 4000, 'Video coverage for whole event', 'Available', '2015-07-23'),
(40, 'Service', 'Others', 'Photo and Video', 8000, 'Photo and video service', 'Available', '2015-07-23'),
(41, 'Item', 'Others', 'Balloons(Small)', 17, 'Small balloon', 'Available', '2015-07-23'),
(42, 'Item', 'Others', 'Balloons(Big)', 50, 'Big balloon', 'Available', '2015-07-23'),
(43, 'Item', 'Others', 'Party Hats', 4, 'Party hats', 'Available', '2015-07-23'),
(44, 'Item', 'Others', 'Banner', 35, 'Banner for the event', 'Available', '2015-07-23'),
(45, 'Item', 'Others', 'Pabitin(With toys)', 300, 'Pabitin with toys', 'Available', '2015-07-23'),
(46, 'Item', 'Others', 'Pabitin', 50, 'Pabitin w/o toys', 'Available', '2015-07-23'),
(47, 'Item', 'Others', 'Palayok', 40, 'Palayok', 'Available', '2015-07-23'),
(48, 'Item', 'Others', 'Loot Bag', 35, 'Loot bag 12 pieces', 'Available', '2015-07-23'),
(49, 'Item', 'Others', 'Invitation', 35, 'Invatation 12 pieces', 'Available', '2015-07-23'),
(50, 'Service', 'AudioVisuals', 'Sound System', 1500, 'Sound and music', 'Available', '2015-07-23'),
(51, 'Service', 'Others', 'Photo Bhoot', 4000, 'Picture taking(Booth)', 'Available', '2015-07-23'),
(52, 'Service', 'Others', 'Balloon Decor', 4000, 'Balloon decoration', 'Available', '2015-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `packages_tbl`
--

CREATE TABLE IF NOT EXISTS `packages_tbl` (
  `pk_id` int(11) NOT NULL,
  `pk_name` varchar(255) NOT NULL,
  `pk_content` varchar(255) NOT NULL,
  `pk_quan` varchar(255) NOT NULL,
  `pk_price` int(11) NOT NULL,
  `pk_status` varchar(11) NOT NULL,
  `pk_suggest` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages_tbl`
--

INSERT INTO `packages_tbl` (`pk_id`, `pk_name`, `pk_content`, `pk_quan`, `pk_price`, `pk_status`, `pk_suggest`) VALUES
(1, 'Package 1', 'Kiddy Tables,Kiddy Chairs,Adult Tables,Adult Chairs,Party Hats,Pibitin w/toys,Palayok,Banner', '4,15,2,8,15,1,1,1', 600, 'Available', 'Birthday,Kids Birthday'),
(2, 'Package 2', 'Kiddy Tables,Kiddy Chairs,Adult Tables,Adult Chairs,Long Tables,Food Warmers,Party Hats,Party Bags,Invitations,Pabitin w/toys\r\n', '7,25,3,12,1,2,25,25,25,1', 900, 'Available', 'Birthday,Kids Birthday'),
(3, 'Package 3', 'Adult Table,Adult Chairs,Plates,Spoon & Fork,Glass,Pitcher,Food Warmer ', '7,30,30,30,30,7,3', 1300, 'Available', 'Anniversary,Birthday,Adult Birthday'),
(4, 'Package 4', 'Clown,Kiddy Tables,Kiddy Chairs,Adult Tables,Adult Chairs,Long Table,Party Hats,Balloons,Big Balloon,Pabitin w/toys,Palayok,Banner \r\n', '1,5,20,3,12,1,20,20,1,1,1,1', 1600, 'Available', 'Birthday,Kids Birthday'),
(5, 'Package 5', 'Set Round table for 8,\r\nAdult Chair,Food Warmer,Plates,Spoon & Fork,Pitcher,Glass\r\n', '4,32,3,32,32,8,32', 1700, 'Available', 'Anniversary,Birthday,Adult Birthday,Wedding,Baptismal,Wooden,Tin,Crystal,China,Silver,Pearl,Ruby,Golden,Diamond'),
(6, 'Package 6', 'Clowns,Kiddy Tables \r\nKiddy Chairs,Adult Tables,Adult Chairs,Long Table,Food Warmer,Party Hats,Party Bags,Invitations,Party Hats,Big Balloon,Pabitin w/toys,Palayok,Banner', '2,5,20,3,12,1,3,25,25,25,25,1,1,1,1', 2600, 'Available', 'Birthday,Kids Birthday'),
(7, 'Package 7', 'Clowns,Kiddy Tables,Kiddy Chairs ,Adult Tables ,Adult Chairs,Long Tables,Party Hats,Balloons,Invitations,Pabitin w/toys', '2,15,60,7,30,3,60,60,60,1', 3400, 'Available', 'Birthday,Kids Birthday'),
(8, 'Package 8', 'Clowns,Kiddy Tables,Kiddy Chairs,Adult Tables,Adult Chairs,Long Tables,Food Warmers,Party Hats,Party Bags,Invitations,Balloons,Pabitin w/toys,Palayok,Banner,Plates,Spoon & Fork,Glass,Pitcher\r\n', '2,5,20,3,12,1,3,20,20,20,20,1,1,1,32,32,12,3', 3300, 'Available', 'Birthday,Kids Birthday'),
(9, 'Package 9', 'Clowns,Kiddy Tables,Kiddy Chairs,Adult Tables,Adult Chairs,Long Tables,Food Warmers,Party Hats,Party Bags,Invitations,Balloons,Big Balloon,Pabitin w/toys,Palayok,Banner,Bubble Machine\r\n', '2,10,40,5,20,2,5,30,30,30,30,1,1,1,1,1', 3600, 'Available', 'Birthday,Kids Birthday'),
(10, 'Package 10', 'Buffet Table,Adult Chairs,Plates,Spoon & Fork,Soup Bowl,Pitcher,Big Food Warmer,Glass,Choco Fountain,Waiter,Beer Tower,Sound System', '4,32,32,32,32,8,5,32,1,1,4,1', 5100, 'Available', 'Anniversary,Birthday,Adult Birthday,Wedding,Baptismal,Wooden,Tin,Crystal,China,Silver,Pearl,Ruby,Golden,Diamond'),
(11, 'Package 11', 'Clowns,Kiddy Tables,Kiddy Chairs,Adult Tables,Adult Chairs,Long Tables,Food Warmers,Party Hats,Party Bags ,Invitations,Balloons,Pabitin w/toys,Palayok,Banner,Choco Fountain ', '2,15,50,7,30,2,5,60,60,60,60,2,2,1,1', 6100, 'Available', 'Birthday,Kids Birthday'),
(12, 'Package 12', 'Magician,Ice Cream,Kiddie Tables,Kiddie Chairs,Adult Tables,Adult Chairs,Invitations,Balloons,Palayok\r\n', '1,1,8,32,5,20,35,35,1', 8200, 'Available', 'Birthday,Kids Birthday,Adult Birthday,Anniversary,Birthday,Adult Birthday,Wedding,Baptismal,Wooden,Tin,Crystal,China,Silver');

-- --------------------------------------------------------

--
-- Table structure for table `recommended_tbl`
--

CREATE TABLE IF NOT EXISTS `recommended_tbl` (
  `r_id` int(255) NOT NULL,
  `r_category` text NOT NULL,
  `r_name` text NOT NULL,
  `r_value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommended_tbl`
--

INSERT INTO `recommended_tbl` (`r_id`, `r_category`, `r_name`, `r_value`) VALUES
(1, 'Kids', 'Angry Birds', '../images/kid themes/angrybirds.jpg'),
(2, 'Kids', 'Avengers', '../images/kid themes/avengers1.jpg'),
(3, 'Kids', 'Barbie', '../images/kid themes/barbie1.jpg'),
(4, 'Kids', 'Batman', '../images/kid themes/batman1.jpg'),
(5, 'Kids', 'Cinderella', '../images/kid themes/cinderella.jpg'),
(6, 'Kids', 'Despicable Me', '../images/kid themes/despicableme.jpg'),
(7, 'Kids', 'Disney Princess', '../images/kid themes/disneyprincess1.jpg'),
(8, 'Kids', 'Dora', '../images/kid themes/doratheexplorer1.jpg'),
(9, 'Kids', 'Frozen', '../images/kid themes/frozen1.jpg'),
(10, 'Kids', 'Hello Kitty', '../images/kid themes/hellokitty1.jpg'),
(11, 'Kids', 'Little Mermaid', '../images/kid themes/littlemermaid1.jpg'),
(12, 'Kids', 'Mickey Mouse', '../images/kid themes/mickeymouse2.jpg'),
(13, 'Kids', 'Minnie Mouse', '../images/kid themes/minniemouse1.jpg'),
(14, 'Kids', 'Pokemon', '../images/kid themes/pokemon1.jpg'),
(15, 'Kids', 'Spiderman', '../images/kid themes/spiderman1.jpg'),
(16, 'Kids', 'Spongebob', '../images/kid themes/spongebob1.jpg'),
(17, 'Kids', 'Superman', '../images/kid themes/superman1.jpg'),
(18, 'Kids', 'Super Mario', '../images/kid themes/supermario2.jpg'),
(19, 'Kids', 'Tinkerbell', '../images/kid themes/tinkerbell1.jpg'),
(20, 'Kids', 'Toy Story', '../images/kid themes/toystory2.jpg'),
(21, 'Adults', 'Fairytale', '../images/adult themes/fairytale1.png'),
(22, 'Adults', 'Masquerade', '../images/adult themes/masquerade.jpg'),
(23, 'Adults', 'Parisian', '../images/adult themes/parisian.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sec_tbl`
--

CREATE TABLE IF NOT EXISTS `sec_tbl` (
  `s_id` int(5) NOT NULL,
  `s_question` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sec_tbl`
--

INSERT INTO `sec_tbl` (`s_id`, `s_question`) VALUES
(1, 'What was the name of your elementary / primary school?'),
(2, 'What is your mothers middle initial?'),
(3, 'What was the name of the hospital where you were born?'),
(4, 'Who is your childhood sports hero?'),
(5, 'In what town was your first job?'),
(6, 'What was your favorite food as a child?'),
(7, 'What is the name of your favorite childhood friend?'),
(8, 'What was the name of your elementary school?'),
(9, 'What is your dream job?'),
(10, 'In what town or city did your mother and father meet?'),
(11, 'In which city did your mother and father meet?'),
(12, 'What is the last name of the teacher who gave you your first failing grade?');

-- --------------------------------------------------------

--
-- Table structure for table `type_tbl`
--

CREATE TABLE IF NOT EXISTS `type_tbl` (
  `t_id` int(5) NOT NULL,
  `t_name` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_tbl`
--

INSERT INTO `type_tbl` (`t_id`, `t_name`) VALUES
(1, 'Item'),
(2, 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `u_id` varchar(5) NOT NULL,
  `u_fname` varchar(20) NOT NULL,
  `u_lname` varchar(20) NOT NULL,
  `u_mname` varchar(20) NOT NULL,
  `u_address` varchar(50) NOT NULL,
  `tnumber` int(12) NOT NULL,
  `mnumber` varchar(12) NOT NULL,
  `u_acc` varchar(20) NOT NULL,
  `u_pass` varchar(20) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_dateReg` varchar(40) NOT NULL,
  `u_timereg` varchar(10) NOT NULL,
  `u_secAns` varchar(255) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `u_status` int(2) NOT NULL,
  `u_type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `u_fname`, `u_lname`, `u_mname`, `u_address`, `tnumber`, `mnumber`, `u_acc`, `u_pass`, `u_email`, `u_dateReg`, `u_timereg`, `u_secAns`, `s_id`, `u_status`, `u_type`) VALUES
('E136', 'Daya', 'Eguia Jr.', '', '', 0, '3303003', 'danmichaeleguia', 'danmichaeleguia', 'danmichaeleguiajr@gmail.com', '11/12/2015', '07:38:28PM', 'a', '2', 1, '0'),
('E190', 'Dadadad', 'Dadada', 'Dadada', 'Dsadsa, Dsdsa, Dsadsa', 0, '2147483647', 'dsadsa', '12345678', 'dann@yahoo.com', '10/22/2015', '10:37:56PM', 'baesa', '1', 1, '0'),
('E228', 'Djasjkd', 'Ndkjsanjkn', 'Jdnsjkandkj', 'Dbnsjakdnkjn, Kndsajkn, Kdnsjaknd', 0, '83617836127', 'kndjksnajdnaskd', '09876543', 'dadada@yahooo.com', '10/25/2015', '12:25:50PM', 'dsadsa', '1', 1, '0'),
('E253', 'Dan Michael', 'Eguia', '', '287 Reparo St, Baesa, Caloocan City', 0, '09168334663', 'dandandan', 'dandandan', 'danmichaeleguiajr@gmail.com', '10/23/2015', '12:30:25AM', 'baesa', '1', 1, '0'),
('E287', 'Dsjhakdhsajd', 'Djksahdjk', 'Hdjsahjkdahsjkh', 'Dnjksandjkn, Jdnsjakndjansdkjn, Djknsjndjsandjk', 0, '18937128372', 'dadnadnadnadna', '12345678', 'dann@yahoo.com', '10/25/2015', '12:28:31PM', 'dadada', '1', 1, '0'),
('E305', 'Dnasjdh', 'Djksandjkn', 'Dbnjsnadkjn', '', 0, '381738912', 'djsakda', '09157674248', 'dnsjandjaskd@gmail.com', '11/12/2015', '07:43:07PM', 's', '1', 1, '0'),
('E313', 'Dsanmd', 'Dsada', 'Dnsman', 'Dnhsaj, Jdnsja, Kdnsajk', 0, '321321', 'dnjsakndjksand', '12345678', 'dadada@yahooo.com', '10/22/2015', '11:38:56PM', 'dsada', '1', 1, '0'),
('E317', 'Dsjhadjah', 'Hdjshakjdhasjkd', 'Jhdjskahdjk', 'Dnsajdnasj, Ndjsndjksna, Dnsajkndjska', 0, '76218736127', 'dadadadada', '09157674248', 'dadada@yahooo.com', '10/25/2015', '12:36:25PM', 'dsadsa', '1', 1, '0'),
('E348', 'Dsjakd', 'Ljdlksajdlkas', 'Kldjslkajk', 'Jndskajnd, Idsan, Dusanu', 0, '12738192739', 'dannnn', 'nnnnnnnn', 'dann@yahoo.com', '10/25/2015', '12:26:54PM', 'daa', '1', 1, '0'),
('E401', 'Danmicnae', 'Jhdkjsahdjk', 'Dsadjkah', 'Sdadsa, Dsadas, Dsadsa', 0, '09168334663', 'dsadsa', '12345678', 'dann@yahoo.com', '10/22/2015', '10:42:35PM', 'dsadas', '1', 1, '0'),
('E402', 'Dandasn', 'Ndlksnaldknasl', 'Dnksandk', 'Dnsajkdnkjn, Jkdnskajn, Jkdnsakjnj', 0, '37182937281', 'ndksjank', 'danmichael', 'dsabdsabdh@y.c', '10/25/2015', '12:18:49PM', 'dsadsa', '1', 1, '0'),
('E406', 'Dadadad', 'Dadada', 'Dadada', 'Dsadsa, Dsdsa, Dsadsa', 0, '2147483647', 'dsadsa', '12345678', 'dann@yahoo.com', '10/22/2015', '10:36:58PM', 'baesa', '1', 1, '0'),
('E454', 'Maria', 'Eguia', 'Daya', '287 Reparo St, Baesa, Caloocan City', 0, '09208827088', 'mariaeguia', 'mariaeguia', 'dann@yahoo.com', '10/25/2015', '12:43:45PM', 'asd', '1', 1, '0'),
('E467', 'Danmicnae', 'Jhdkjsahdjk', 'Dsadjkah', 'Sdadsa, Dsadas, Dsadsa', 0, '09168334663', 'dsadsa', '12345678', 'dann@yahoo.com', '10/22/2015', '11:38:24PM', 'dsadas', '1', 1, '0'),
('E473', 'Danmichael', 'Danmichael', '', '', 0, '09157674248', 'danmichaeleguia', 'danmichaeleguia', 'danmichaeleguiajr@gmail.com', '11/12/2015', '07:39:45PM', 'a', '2', 1, '0'),
('E506', 'Dsjhakdhsajd', 'Djksahdjk', 'Hdjsahjkdahsjkh', 'Dnjksandjkn, Jdnsjakndjansdkjn, Djknsjndjsandjk', 0, '18937128372', 'dadnadnadnadna', '12345678', 'dann@yahoo.com', '10/25/2015', '12:30:02PM', 'dadada', '1', 1, '0'),
('E565', 'Dasndjk', 'Hjdshajh', 'Jhdjkshajk', 'Dhsjkahd, Jdshajk, Dhjksahjk', 0, '32163781263', 'dhsajkdhajk', '12345678', 'dadada@yahooo.com', '10/22/2015', '11:48:10PM', 'dsa', '1', 1, '0'),
('E585', 'Danmichael', 'Danmichael', 'Danmichael', '', 0, '09157674248', 'danmichaeleguia', 'danmichaeleguia', 'danmichaeleguiajr@gmail.com', '11/12/2015', '07:41:15PM', 'a', '2', 1, '0'),
('E632', 'Dklsnadjkasndjk', 'Jdnsajkndajskndk', 'Ndjksandjkn', 'Dnsjndasjkn, Jdnsjakndjksand, Jdnasjkndjaskndja', 0, '73617236127', 'dnsajkdnasjkdn', '09157674248', 'dadada@yahooo.com', '10/25/2015', '12:33:38PM', 'dsa', '1', 1, '0'),
('E639', 'Dasndjk', 'Hjdshajh', 'Jhdjkshajk', 'Dhsjkahd, Jdshajk, Dhjksahjk', 0, '32163781263', 'dhsajkdhajk', '12345678', 'dadada@yahooo.com', '10/22/2015', '11:40:18PM', 'dsa', '1', 1, '0'),
('E645', 'Dandasn', 'Ndlksnaldknasl', 'Dnksandk', 'Dnsajkdnkjn, Jkdnskajn, Jkdnsakjnj', 0, '37182937281', 'ndksjank', 'danmichael', 'dsabdsabdh@y.c', '10/25/2015', '12:19:09PM', 'dsadsa', '1', 1, '0'),
('E667', 'Dsnadjkasbndjn', 'Ndkjsnajkdnsajk', 'Djksandjkasnj', 'Dnskandkjsanj, Ndjksandjkasnj, Dnjskandjasndj', 0, '38712983712', 'dandandandan', 'dandandandan', 'dann@yahoo.com', '10/25/2015', '12:31:36PM', 'dsadsa', '1', 1, '0'),
('E681', 'Dandasn', 'Ndlksnaldknasl', 'Dnksandk', 'Dnsajkdnkjn, Jkdnskajn, Jkdnsakjnj', 0, '37182937281', 'ndksjank', '12345678', 'dsabdsabdh@y.c', '10/25/2015', '12:12:10PM', 'dsadsad', '1', 1, '0'),
('E720', 'Dan Michael', 'Eguia', 'Daya', '287 Reparo St, Baesa, Caloocan City', 0, '09168334663', 'dandandandan', 'dandandandan', 'dandandan@y.co', '10/26/2015', '11:40:15AM', 'das', '1', 1, '0'),
('E739', 'Dadadad', 'Dadada', 'Dadada', 'Dsadsa, Dsdsa, Dsadsa', 0, '2147483647', 'dsadsa', '12345678', 'dann@yahoo.com', '10/22/2015', '10:35:43PM', 'baesa', '1', 1, '0'),
('E756', 'Danmicnae', 'Jhdkjsahdjk', 'Dsadjkah', 'Sdadsa, Dsadas, Dsadsa', 0, '09168334663', 'dsadsa', '12345678', 'dann@yahoo.com', '10/22/2015', '10:40:49PM', 'dsadas', '1', 1, '0'),
('E794', 'Danmicnae', 'Jhdkjsahdjk', 'Dsadjkah', 'Sdadsa, Dsadas, Dsadsa', 0, '2147483647', 'dsadsa', '12345678', 'dann@yahoo.com', '10/22/2015', '10:40:05PM', 'dsadas', '1', 1, '0'),
('E829', 'Djasjkd', 'Ndkjsanjkn', 'Jdnsjkandkj', 'Dbnsjakdnkjn, Kndsajkn, Kdnsjaknd', 0, '83617836127', 'kndjksnajdnaskd', '12345678j', 'dadada@yahooo.com', '10/25/2015', '12:25:18PM', 'dsa', '1', 1, '0'),
('E856', 'Dadadad', 'Dadada', 'Dadada', 'Dsadsa, Dsdsa, Dsadsa', 0, '2147483647', 'dsadsa', '12345678', 'dann@yahoo.com', '10/22/2015', '10:39:13PM', 'baesa', '1', 1, '0'),
('E886', 'Dnsajdnsaj', 'Jdnsajkdnasjdnj', 'Ndjknsajkdnaskjn', 'Dsandjksan, Dnjaskndjaskn, Jndjaskndasjkndajskn', 0, '36172362173', 'dnsjadnsajkdnas', '09157674248', 'dadada@yahooo.com', '10/25/2015', '12:30:23PM', 'dsadsada', '1', 1, '0'),
('E936', 'Dandasn', 'Ndlksnaldknasl', 'Dnksandk', 'Dnsajkdnkjn, Jkdnskajn, Jkdnsakjnj', 0, '37182937281', 'ndksjank', '12345678', 'dsabdsabdh@y.c', '10/25/2015', '12:19:47PM', 'dsadsa123412', '1', 1, '0'),
('E954', 'Daya', 'Eguia Jr.', '', ', , ', 0, '3303003', 'danmichaeleguia', 'danmichaeleguia', 'danmichaeleguiajr@gmail.com', '11/12/2015', '07:37:15PM', 'a', '2', 1, '0'),
('E955', 'Dandasn', 'Ndlksnaldknasl', 'Dnksandk', 'Dnsajkdnkjn, Jkdnskajn, Jkdnsakjnj', 0, '37182937281', 'ndksjank', '12345678', 'dsabdsabdh@y.c', '10/25/2015', '12:14:23PM', 'dsadsadasda', '1', 1, '0'),
('E963', 'Danmicnae', 'Jhdkjsahdjk', 'Dsadjkah', 'Sdadsa, Dsadas, Dsadsa', 0, '09168334663', 'dsadsa', '12345678', 'dann@yahoo.com', '10/22/2015', '10:41:03PM', 'dsadas', '1', 1, '0'),
('E969', 'Jdkaljdkasl', 'Djskaldjaskl', 'Djsakldsjakl', '', 0, '12312312', 'jdksadjslka', '0987123123', 'djsakldjsakl@gmail.com', '11/12/2015', '01:59:25AM', 'd', '1', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `date_tbl`
--
ALTER TABLE `date_tbl`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `filter_event_tbl`
--
ALTER TABLE `filter_event_tbl`
  ADD PRIMARY KEY (`filter_id`);

--
-- Indexes for table `foodpackage_tbl`
--
ALTER TABLE `foodpackage_tbl`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `info_tbl`
--
ALTER TABLE `info_tbl`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `item_tbl`
--
ALTER TABLE `item_tbl`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `packages_tbl`
--
ALTER TABLE `packages_tbl`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `recommended_tbl`
--
ALTER TABLE `recommended_tbl`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sec_tbl`
--
ALTER TABLE `sec_tbl`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `type_tbl`
--
ALTER TABLE `type_tbl`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `date_tbl`
--
ALTER TABLE `date_tbl`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `e_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `filter_event_tbl`
--
ALTER TABLE `filter_event_tbl`
  MODIFY `filter_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `foodpackage_tbl`
--
ALTER TABLE `foodpackage_tbl`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `info_tbl`
--
ALTER TABLE `info_tbl`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `packages_tbl`
--
ALTER TABLE `packages_tbl`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `recommended_tbl`
--
ALTER TABLE `recommended_tbl`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sec_tbl`
--
ALTER TABLE `sec_tbl`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `type_tbl`
--
ALTER TABLE `type_tbl`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
