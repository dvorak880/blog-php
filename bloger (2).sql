-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: נובמבר 06, 2019 בזמן 10:56 PM
-- גרסת שרת: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloger`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` text CHARACTER SET utf8mb4 NOT NULL,
  `post` text CHARACTER SET utf8mb4 NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- הוצאת מידע עבור טבלה `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `post`, `create_at`) VALUES
(16, 57, 'Homemade Pizza Recipe', 'Pizza Dough: Makes enough dough for two 10-12 inch pizzas\r\n\r\n1 1/2 cups (355 ml) warm water (105Â°F-115Â°F)\r\n1 package (2 1/4 teaspoons) of active dry yeast\r\n3 3/4 cups (490 g) bread flour\r\n2 tablespoons extra virgin olive oil (omit if cooking pizza in a wood-fired pizza oven)\r\n2 teaspoons salt\r\n1 teaspoon sugar\r\nPizza Ingredients\r\n\r\nExtra virgin olive oil\r\nCornmeal (to help slide the pizza onto the pizza stone)\r\nTomato sauce (smooth, or purÃ©ed)\r\nFirm mozzarella cheese, grated\r\nFresh soft mozzarella cheese, separated into small clumps\r\nFontina cheese, grated\r\nParmesan cheese, grated\r\nFeta cheese, crumbled\r\nMushrooms, very thinly sliced if raw, otherwise first sautÃ©ed\r\nBell peppers, stems and seeds removed, very thinly sliced\r\nItalian pepperoncini, thinly sliced\r\nItalian sausage, cooked ahead and crumbled\r\nChopped fresh basil', '2019-11-03'),
(17, 57, 'HOMEMADE TOMATO BASIL SOUP RECIPe', 'Roma tomatoes\r\nGarlic\r\nOlive oil\r\nSalt + Pepper\r\nButter (or more olive oil)\r\nYellow onions\r\nCanned tomatoes\r\nFresh basil\r\nVegetable Broth\r\nSugar (optional)\r\nCrushed Red Chili Flakes (optional)', '2019-11-04'),
(28, 57, 'recipe to brownies', 'I threw in over 1 cup of chocolate chunks IN AND ON these (I used 45% cocoa chocolate), but you can also add:\r\n\r\ncrushed nuts (peanuts, walnuts, pecans, almonds, etc)\r\ndried fruits (dates, blueberries, cranberries, raisins)\r\nshredded coconut\r\ncaramel pieces\r\ndiced marshmallows\r\npeanut butter chips', '2019-11-04'),
(29, 51, 'מתכון לעוגת שוקולד', '2 ביצים גדולות (או 3 ביצים M)\r\n\r\nכוס ושליש (265 ג&#39;) סוכר (*ראו הערה בתחתית המתכון לגבי כמות הסוכר)\r\n\r\n1 כוס (200 ג&#39;) שמן\r\n\r\n1 כוס (240 מ&#34;ל) מים פושרים\r\n\r\n¾ כוס (180 מ&#34;ל) מים רותחים (*כמות המים הופחתה מהמתכון המקורי)\r\n\r\nמערבבים בקערה (קערת הקמחים):\r\n\r\n2 כוסות (280 ג&#39;) קמח\r\n\r\n1 שקית  (10 ג&#39;) אבקת אפיה\r\n\r\n1 כפית (3 ג&#39;) שטוחה אבקת סודה לשתייה\r\n\r\n4 כפות (40 ג&#39;) קקאו\r\n\r\n*יש להשתמש בכוס זכוכית רגילה עם ידית', '2019-11-04');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `role` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- הוצאת מידע עבור טבלה `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pwd`, `role`, `update_at`, `avatar`) VALUES
(50, 'omer', 'avharomer@gmail.com', '$2y$10$7ssnhiD7xUGcnc3lXOXfeu/HOgv3HSZMDzpQ2dBPJEyq/b/07nn72', 6, '2019-10-29 18:20:26', ''),
(51, 'admin', 'admin@gmail.com', '$2y$10$QcGcGyfM4kgVuJUeLAWqDucUgcMncqQ5PxU995f1CJW90a1IVRG9m', 6, '2019-10-29 18:21:46', ''),
(57, 'dvora', 'shalom@gmail789', '$2y$10$DeS9AcQ8g6xZOUgP70A55.jaHEOSCkCS71RCSpAG5NsoDaZTRudOm', 6, '2019-11-03 16:18:09', ''),
(62, 'dvora', 'shalom@gmail78910', '$2y$10$IC0cJPcG475KJ3Y1pq2PBu78XBecBG3bHHbsoix.XMj3BHDDmMvxW', 6, '2019-11-04 19:34:58', '');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
