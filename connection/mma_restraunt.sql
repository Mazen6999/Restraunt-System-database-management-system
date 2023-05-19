-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 04:59 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mma_restraunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`) VALUES
(1, 'mar', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `title`, `image`) VALUES
(9, 'Starter', '645a13b2ab225.jpg'),
(11, 'Salads', '645a1d1a57830.jpg'),
(12, 'Main Dish', '645a20bd83aca.jpg'),
(13, 'Drinks', '645a258e8318b.jpg'),
(14, 'Desserts', '645a2c4a1778d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `category_id`, `title`, `slogan`, `price`, `img`) VALUES
(35, 9, 'Caprese Bruschetta', 'Toasted baguette slices topped with a mixture of ripe cherry tomatoes, fresh mozzarella, chopped basil, and a drizzle of balsamic glaze. A delightful fusion of Caprese salad and bruschetta', '7.00', '645a189170f97.jpg'),
(36, 9, 'Smoked Salmon Canapés', 'Delicate smoked salmon served on bite-sized toast rounds, topped with a creamy dill and cream cheese spread, and garnished with fresh dill and a squeeze of lemon juice. ', '7.00', '645a19697cb10.jpg'),
(37, 9, 'Greek Spanakopita', 'Flaky phyllo pastry filled with a delicious blend of spinach, feta cheese, and herbs. Baked until golden and served warm. ', '10.00', '645a19df15f68.jpg'),
(38, 9, 'Stuffed Jalapeños', 'Spicy jalapeño peppers filled with a creamy blend of cheeses, then breaded and deep-fried until crispy. Served with a cool ranch or sour cream dipping sauce.', '12.00', '645a1a4209146.jpg'),
(39, 9, 'Caprese Skewers', 'Skewers featuring alternating cherry tomatoes, fresh mozzarella balls, and basil leaves, drizzled with balsamic glaze. A visually appealing and refreshing starter. ', '15.00', '645a1ba56e7cf.jpg'),
(41, 9, 'Chicken Satay with Peanut Sauce', 'Tender marinated chicken skewers grilled to perfection, served with a rich and creamy peanut sauce. A popular Southeast Asian appetizer packed with bold flavors.', '17.00', '645a1c8b0f65e.jpg'),
(42, 11, 'Classic Caesar Salad', 'Crisp romaine lettuce tossed with homemade Caesar dressing, grated Parmesan cheese, and garlic croutons. A timeless salad with a tangy and creamy flavor.', '10.00', '645a1ea60b07f.jpg'),
(43, 11, 'Caprese Salad', 'Slices of ripe tomatoes, creamy mozzarella cheese, and fragrant basil leaves arranged on a platter. Drizzled with extra virgin olive oil, balsamic glaze, and a sprinkle of sea salt. ', '11.00', '645a1f0958081.jpg'),
(44, 11, 'Quinoa and Roasted Vegetable Salad', 'Nutrient-packed quinoa mixed with a medley of roasted vegetables like bell peppers, zucchini, and eggplant. Tossed with a lemon-herb dressing and garnished with fresh herbs.', '13.00', '645a1f66ae952.jpg'),
(45, 11, 'Mediterranean Greek Salad', 'A refreshing combination of fresh lettuce, juicy tomatoes, cucumber slices, red onions, Kalamata olives, and crumbled feta cheese. Tossed in a lemon-herb vinaigrette. ', '20.00', '645a20760dc20.jpg'),
(46, 12, 'Classic Beef Burger', 'A juicy beef patty grilled to perfection, topped with melted cheese, lettuce, tomato, onion, and pickles. Served with a side of crispy fries or a salad.', '14.00', '645a222040434.jpg'),
(47, 12, 'Eggplant Parmesan', 'Breaded and fried slices of eggplant layered with marinara sauce, melted mozzarella, and Parmesan cheese. Baked until bubbly and served with pasta or garlic bread.', '16.00', '645a22bb307fc.jpg'),
(48, 12, 'Chicken Alfredo Pasta', 'Tender grilled chicken breast served over a bed of fettuccine pasta tossed in a creamy Alfredo sauce. Garnished with fresh parsley and grated Parmesan cheese.', '17.00', '645a23e7e778c.jpg'),
(49, 12, 'Shrimp Scampi', 'Plump shrimp sautéed in a garlic and butter sauce, tossed with linguine pasta, and finished with a squeeze of lemon juice.', '20.00', '645a24c8677d6.jpg'),
(50, 12, 'Thai Green Curry with Chicken', 'Tender pieces of chicken simmered in a fragrant green curry sauce with coconut milk, Thai herbs, and vegetables. Served with steamed jasmine rice.', '25.00', '645a247b13068.jpg'),
(51, 12, 'BBQ Ribs', 'Slow-cooked, fall-off-the-bone tender pork ribs slathered in a tangy and smoky barbecue sauce. Served with coleslaw and cornbread.', '25.00', '645a24ab3ee20.jpg'),
(52, 13, 'Spiced Hot Chocolate', 'A comforting treat made with rich hot chocolate, infused with warm spices like cinnamon, nutmeg, and a hint of chili powder. Topped with whipped cream and chocolate shavings.', '5.00', '645a25e309e9c.jpg'),
(53, 13, 'Coconut Water Mojito Mocktail', 'A non-alcoholic twist on the classic mojito, made with coconut water, muddled mint leaves, lime juice, and a touch of simple syrup. Served over ice with a sprig of mint. ', '8.00', '645a278ce9152.jpg'),
(54, 13, 'Watermelon Agua Fresca ', 'A light and refreshing Mexican drink made with fresh watermelon, lime juice, and a touch of sugar. Blended until smooth and served over ice. ', '7.00', '645a283531cb7.jpg'),
(55, 13, 'Hot Toddy', 'A cozy and soothing drink made with whiskey, hot water, honey, lemon juice, and a hint of spices such as cloves or cinnamon. Perfect for chilly evenings.', '11.00', '645a288d5ea05.jpg'),
(57, 13, 'soft drinks', 'Refreshment time !!', '10.00', '645a2b9d613f2.jpg'),
(58, 14, 'Classic New York Cheesecake', 'A velvety smooth and rich cheesecake with a graham cracker crust. Served plain or with your choice of fruit sauce (such as strawberry or blueberry).', '8.00', '645a2da829424.jpg'),
(59, 14, 'Chocolate Lava Cake', 'A decadent chocolate cake with a molten chocolate center. Served warm and topped with a scoop of vanilla ice cream.', '9.00', '645a2e13410dd.jpg'),
(60, 14, 'Tiramisu', 'A classic Italian dessert made with layers of ladyfingers soaked in coffee and liqueur, creamy mascarpone cheese, and dusted with cocoa powder.', '10.00', '645a2ea90b0b2.jpg'),
(61, 14, 'Apple Pie', 'A timeless favorite featuring a flaky pie crust filled with spiced apples and baked to golden perfection. Served warm with a scoop of vanilla ice cream.', '12.00', '645a2ed004dde.jpg'),
(62, 14, 'Panna Cotta', 'A buttery shortbread crust filled with a luscious pastry cream and topped with an assortment of fresh seasonal fruits.', '7.00', '645a2ef7d1da5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `status`) VALUES
(1, 'Taken'),
(2, 'Available'),
(3, 'Available'),
(4, 'Available'),
(5, 'Available'),
(6, 'Available'),
(7, 'Available'),
(8, 'Available'),
(9, 'Available'),
(10, 'Available'),
(11, 'Available'),
(12, 'Available'),
(13, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `paymethod` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `table_id`, `title`, `quantity`, `price`, `status`, `paymethod`, `date`) VALUES
(54, 1, 'Caprese Bruschetta', 1, '7.00', 'preparing/eating', 'Cash', '2023-05-10 14:28:04'),
(55, 1, 'Caprese Bruschetta', 1, '7.00', 'preparing/eating', 'Paypal', '2023-05-10 14:28:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
