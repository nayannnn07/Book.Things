-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 09:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `repass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`, `repass`) VALUES
(1, 'Nayana', 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Twisted Lies', 'Ana Huang', 'Charming deadly and smart enough to hide it Christian Harper is a monster dressed in the perfectly tailored suits of a gentleman. He has little use for morals and even less use for love, but he cannot deny the strange pull he feels toward the woman living just one floor below him.', 900.00, 'Book_Name_47.jpg', 1, 'Yes', 'Yes'),
(2, 'Verity', 'Colleen Hoover', 'Verity is a 2018 psychological thriller by New York Times bestselling author Colleen Hoover. The novel is set between New York City and Vermont, and follows struggling writer Lowen Ashleigh as she ghostwrites a novel on behalf of Verity Crawford, a woman who is in a vegetative state following a traumatic accident.', 800.00, 'Book_Name_524.jfif', 2, 'Yes', 'Yes'),
(3, 'Harry Potter', 'J.K. Rowling', 'Adaptation of the first of J.K. Rowlings popular children novels about Harry Potter, a boy who learns on his eleventh birthday that he is the orphaned son of two powerful wizards and possesses unique magical powers of his own. He is summoned from his life as an unwanted child to become a student at Hogwarts, an English boarding school for wizards. There, he meets several friends who become his closest allies and help him discover the truth about his parents mysterious deaths.', 500.00, 'Book_Name_451.jpg', 1, 'Yes', 'Yes'),
(4, 'Ikigai', 'Hector Garcia', 'kigai is a Japanese secret concept that tells you about longevity and happiness. This book tells us how by following the Japanese concept of Ikigai, you can make your life long and happy. It is a fact that people living on Okinawa Island, Japan, live the longest and happiest life.', 400.00, 'Book_Name_988.jpeg', 2, 'Yes', 'Yes'),
(6, 'King of Wrath', 'Ana Huang', 'A brand new steamy billionaire romance from the bestselling author of the Twisted series. She is the wife he never wanted . . . and the weakness he never saw coming. Ruthless. Meticulous. Arrogant. Dante Russo thrives on control, both personally and professionally. The billionaire CEO never planned to marry - until the threat of blackmail forces him into an engagement with a woman he barely knows: Vivian Lau, jewellery heiress and daughter of his newest enemy. It does not matter how beautiful or charming she is.', 800.00, 'Book_Name_722.jfif', 1, 'Yes', 'Yes'),
(7, 'Twisted Love', 'Ana Huang', 'He has a heart of ice . . . but for her, he would burn the world. Alex Volkov is a devil blessed with the face of an angel and cursed with a past he cannot escape. Driven by a tragedy that has haunted him for most of his life, his ruthless pursuits for success and vengeance leave little room for matters of the heart.', 750.00, 'Book_Name_349.jfif', 5, 'Yes', 'Yes'),
(8, 'Good Vibes, Good Life', 'Vex King', 'A beautifully designed book full of inspiring quotes and tried-and-tested wisdom on using positivity to create a life you love. How can you learn to truly love yourself? How can you transform negative emotions into positive ones? Is it possible to find lasting happiness? In this book, Instagram guru Vex King answers all of these questions and more. ', 600.00, 'Book_Name_633.jfif', 7, 'Yes', 'Yes'),
(9, 'Circe', 'Madeline Miller', 'In the house of Helios, god of the sun and mightiest of the Titans, a daughter is born. But Circe has neither the look nor the voice of divinity, and is scorned and rejected by her kin. Increasingly isolated, she turns to mortals for companionship, leading her to discover a power forbidden to the gods: witchcraft. When love drives Circe to cast a dark spell, wrathful Zeus banishes her to the remote island of Aiaia.', 650.00, 'Book_Name_24.webp', 6, 'Yes', 'Yes'),
(10, 'A Season in Heaven', 'David Tomory', 'This is an anthology of narratives from travellers who took the hippy trail to India and Nepal in the late 1960s and early 70s. Consequently, it is also an account of one of the most significant social movements of the 20th century.', 300.00, 'Book_Name_423.jfif', 10, 'Yes', 'Yes'),
(11, 'The Daily Laws', 'Robert Greene', 'THE INTERNATIONALLY BESTSELLING AUTHOR OF THE 48 LAWS OF POWER BRINGS YOU 365 MOREOver the last 25 years, Robert Greene has provided insights into every aspect of being human: whether that be getting what you want, understanding others motivations, mastering your impulses, or recognising strengths and weaknesses.', 1000.00, 'Book_Name_76.jpg', 8, 'Yes', 'Yes'),
(12, 'Life Lessons', 'Jay Blades', 'Life is not a problem to be solved, but a reality to be experienced. Let Jay Blades words of wisdom – gleaned from his own triumphs over adversity – help you to find your best path through life. Filled with characteristic warmth and humour, Jay talks about the life lessons that have helped him to find positivity and growth, no matter what he’s found himself facing.', 500.00, 'Book_Name_326.jpg', 7, 'Yes', 'Yes'),
(13, 'Niksen', 'Annette Lavrijsen', 'Everyday we are told to get up, take action and be productive: if you work hard, you’ll make it. But your body is desperate for you to stop, your frantic mind craves a timeout, and your friends and family are finding you more moody and stressed than ever. It is time for some Dutch wisdom: find out when, how and why to do nothing with niksen.', 450.00, 'Book_Name_148.jpg', 7, 'Yes', 'Yes'),
(14, 'Harry Potter', 'J.K. Rowling', 'Harry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle.', 700.00, 'Book_Name_38.jfif', 4, 'Yes', 'Yes'),
(15, 'Pride & Prejudice', 'Jane Austen', 'Part of Penguins beautiful hardback Clothbound Classics series, designed by the award-winning Coralie Bickford-Smith, these delectable and collectible editions are bound in high-quality colourful, tactile cloth with foil stamped into the design. When Elizabeth Bennet first meets eligible bachelor Fitzwilliam Darcy, she thinks him arrogant and conceited; he is indifferent to her good looks and lively mind.', 1200.00, 'Book_Name_940.jfif', 5, 'Yes', 'Yes'),
(16, 'One Piece', 'Eiichiro Oda', 'oin Monkey D. Luffy and his swashbuckling crew in their search for the ultimate treasure, One Piece!As a child, Monkey D. Luffy dreamed of becoming King of the Pirates. But his life changed when he accidentally gained the power to stretch like rubber…at the cost of never being able to swim again! Years, later, Luffy sets off in search of the One Piece, said to be the greatest treasure in the world.', 800.00, 'Book_Name_912.webp', 11, 'Yes', 'Yes'),
(17, 'Demon Slayer', 'Koyoharu Gotouge', 'Tanjiro sets out on the path of the Demon Slayer to save his sister and avenge his family!In Taisho-era Japan, kindhearted Tanjiro Kamado makes a living selling charcoal. But his peaceful life is shattered when a demon slaughters his entire family. His little sister Nezuko is the only survivor, but she has been transformed into a demon herself! ', 900.00, 'Book_Name_585.webp', 11, 'Yes', 'Yes'),
(18, 'Haikyu', 'Haruichi Furudate', 'Shoyo Hinata is out to prove that in volleyball you do not need to be tall to fly. Ever since he saw the legendary player known as the Little Giant compete at the national volleyball finals, Shoyo Hinata has been aiming to be the best volleyball player ever.', 650.00, 'Book_Name_293.webp', 11, 'Yes', 'Yes'),
(19, 'Tokyo Ghoul', 'Sui Ishida', 'In the world of Tokyo Ghoul, sometimes the only way to fight monsters is to become one…The Commission of Counter Ghoul is the only organization fighting the Ghoul menace, and they will use every tool at their disposal to protect humanity from its ultimate predator. Their newest weapon in this hidden war is an experimental procedure that implants human investigators with a Ghouls Kagune, giving them Ghoul powers and abilities. ', 1400.00, 'Book_Name_43.webp', 11, 'Yes', 'Yes'),
(20, 'Vinegar Into Honey', 'Ron Leifer', 'Our desires and our fears are woven into a tangled web of conflicts. We want both to eat dessert and to be thin. We want money but don’t want to work. Anything that threatens our sense of self and its striving for happiness is perceived as a threat to our very lives—the response to which is defensiveness, anger, aggression, and violence.', 960.00, 'Book_Name_964.webp', 8, 'Yes', 'Yes'),
(21, 'Karnali Blues', 'Buddhisagar', 'Karnali Blues, by Buddhisagar, is the most widely read Nepali novel to have appeared in the last twenty years. As it recounts the evolution of a father-son relationship-a son’s search for approval, a father’s small acts of kindness and forgiveness, a sons fears for his fathers dignity as his fortunes and faculties begin to fail-the reader is deeply drawn into young Brisha Bahadurs world. ', 630.00, 'Book_Name_274.jfif', 10, 'Yes', 'Yes'),
(22, 'Twisted Games', 'Ana Huang', 'Bridget von Ascheberg. A princess with a stubborn streak that matches his own and a hidden fire that reduces his rules to ash. She’s nothing he expected and everything he never knew he needed. Day by day, inch by inch, she breaks down his defenses until he’s faced with a truth ', 560.00, 'Book_Name_473.jfif', 1, 'Yes', 'Yes'),
(23, 'Twisted Hate', 'Ana Huang', 'Twisted Hate is a steamy enemies-with-benefits/enemies-to-lovers romance. It’s book three in the Twisted series but can be read as a standalone.', 800.00, 'Book_Name_727.jfif', 1, 'Yes', 'Yes'),
(24, 'The City Son', 'Samrat Upadhyay', 'Set in Samrat Upadhyays signature and timeless Nepal, The City Son offers a vivid portrait of a scorned womans lifelong obsession with revenge and the devastating ramifications for an impressionable young man.', 500.00, 'Book_Name_969.jfif', 2, 'Yes', 'Yes'),
(25, 'You Reached Sam', 'Dustin Thao', 'Seventeen-year-old Julie has her future all planned out—move out of her small town with her boyfriend Sam, attend college in the city, spend a summer in Japan. But then Sam dies. And everything changes.', 980.00, 'Book_Name_960.jfif', 2, 'Yes', 'Yes'),
(26, 'Home Body', 'Rupi Kaur', 'Home body is a collection of raw, honest conversations with oneself - reminding readers to fill up on love, acceptance, community, family, and embrace change. illustrated by the author, themes of nature and nurture, light and dark, rest here.', 450.00, 'Book_Name_877.jfif', 1, 'Yes', 'Yes'),
(27, 'The Love Deception', 'Elena Armas', 'Catalina Martín desperately needs a date to her sisters wedding. Especially since her little white lie about her American boyfriend has spiralled out of control. Now everyone she knows will be there and eager to meet him.', 780.00, 'Book_Name_502.jfif', 1, 'Yes', 'Yes'),
(28, 'Men without Women', 'Haruki Murakami', 'Across seven tales, Haruki Murakami brings his powers of observation to bear on the lives of men together to tell stories that speak to us all. In Men Without Women Murakami has crafted another contemporary classic, marked by the same wry humor and pathos that have defined his entire body of work.', 800.00, 'Book_Name_350.jfif', 1, 'Yes', 'Yes'),
(29, 'Beyond Possible', 'Nimsdai Purja', 'Fourteen mountains on Earth tower over 8,000 metres above sea level, an altitude where the brain and body withers and dies. Until recently, the world record for climbing them all stood at nearly eight years.', 1000.00, 'Book_Name_691.jpg', 10, 'Yes', 'Yes'),
(30, 'Priya Sufi', 'Subin Bhattarai', ' Subin Bhattarai has made the main theme of thinking about life, social outlook, and the power of self-love.', 375.00, 'Book_Name_256.jpg', 10, 'Yes', 'Yes'),
(31, 'Rework', 'Jason Fried', 'Most business books give you the same old advice: Write a business plan, study the competition, seek investors, yadda yadda. If you’re looking for a book like that, put this one back on the shelf.', 650.00, 'Book_Name_205.jpg', 8, 'Yes', 'Yes'),
(32, 'Mindset', 'Dr Carol Dweck', 'World-renowned Stanford University psychologist Carol Dweck, in decades of research on achievement and success, has discovered a truly groundbreaking idea-the power of our mindset.', 975.00, 'Book_Name_813.jpg', 8, 'Yes', 'Yes'),
(33, 'You Love Me', 'Caroline Kepnes', 'Joe Goldberg is done with the cities. He is done with the muck and the posers, done with Love. Now he is saying hello to nature, to simple pleasures on a cozy island in the Pacific Northwest. ', 560.00, 'Book_Name_596.jfif', 5, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Best Sellers', 'Book_Category_907.jpg', 'No', 'Yes'),
(2, 'New Arrivals', 'Book_Category_9208.jpg', 'No', 'Yes'),
(4, 'Top Picks', 'Book_Category_126.jpg', 'Yes', 'Yes'),
(5, 'Fiction', 'Book_Category_721.jpg', 'Yes', 'Yes'),
(6, 'Non-Fiction', 'Book_Category_945.jpg', 'Yes', 'Yes'),
(7, 'Self Improvement', 'Book_Category_6582.webp', 'Yes', 'Yes'),
(8, 'Business', 'Book_Category_302.webp', 'Yes', 'Yes'),
(10, 'Nepali', 'Book_Category_960.jpg', 'Yes', 'Yes'),
(11, 'Manga', 'Book_Category_479.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `contact`, `message`) VALUES
(1, 'Nayana Khadgi', 'nayann@gmail.com', '9856859610', 'I loved their services!!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `contact` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `title`, `price`, `quantity`, `total`, `order_date`, `status`, `fullname`, `contact`, `email`, `address`, `payment_mode`, `user_id`) VALUES
(2, 'Verity', 800.00, 1, 800.00, '2024-05-01', 'Delivered', 'Nayana Khadgi', '9841556688', 'nayann@gmail.com', 'Teku', 'Cash on Delivery', 1),
(3, 'Harry Potter', 500.00, 1, 500.00, '2024-05-01', 'On Delivery', 'Nayana Khadgi', '9841556688', 'nayann@gmail.com', 'Teku', 'Cash on Delivery', 1),
(4, 'One Piece', 800.00, 1, 800.00, '2024-05-28', 'Ordered', 'Aishworya', '9841556688', 'ab@gmail.com', 'Dallu', 'Cash on Delivery', 1),
(7, 'Haikyu', 650.00, 1, 650.00, '2024-05-29', 'Delivered', 'Neharika ', '9801000000', 'nayann@gmail.com', 'Maru', 'Cash on Delivery', 1),
(9, 'Demon Slayer', 900.00, 1, 900.00, '2024-05-29', 'Cancelled', 'Nayana Khadgi', '9845216320', 'nayann@gmail.com', 'Teku', 'Cash on Delivery', 1),
(10, 'Good Vibes, Good Life', 600.00, 1, 600.00, '2024-05-29', 'Ordered', 'Nayana Khadgi', '9841556688', 'nayann@gmail.com', 'Teku', 'Cash on Delivery', 1),
(16, 'A Season in Heaven', 300.00, 3, 900.00, '2024-06-03', 'Delivered', 'Nayana Khadgi', '9866889686', 'nayann@gmail.com', 'Teku', 'Khalti', 1),
(17, 'Twisted Lies', 700.00, 1, 700.00, '2024-06-03', 'On Delivery', 'Nayana Khadgi', '9866889686', 'nayann@gmail.com', 'Teku', 'Khalti', 1),
(18, 'Haikyu', 650.00, 2, 1300.00, '2024-08-05', 'Ordered', 'Nayana Khadgi', '9856859610', 'sirim@gmail.com', 'asd', 'Cash on Delivery', 1),
(19, 'Twisted Lies', 900.00, 1, 900.00, '2024-08-05', 'Ordered', 'Nayana Khadgi', '9856859610', 'sirim@gmail.com', 'asd', 'Cash on Delivery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` varchar(200) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `book_id`, `user_id`, `review`, `timestamp`) VALUES
(3, 1, 2, 'Intriguing plot with unexpected twists!', NULL),
(4, 1, 5, 'Masterful storytelling with plenty of surprises', NULL),
(5, 1, 3, 'Complex characters and a suspenseful storyline.', NULL),
(7, 1, 1, 'Couldn\'t put it down—thrilling and engaging.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `repass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `pass`, `repass`) VALUES
(1, 'Nayana', 'Khadgi', 'nayann@gmail.com', 'nayan', 'nayan'),
(2, 'Sirish', 'Manandhar', 'sirim@gmail.com', '000', '000'),
(3, 'Aishworya', 'Bajracharya', 'ab@gmail.com', 'aish', 'aish'),
(4, 'Shriee', 'Shahi', 'shri@gmail.com', '123', '123'),
(5, 'Shraddha', 'Kapali', 'shrds@gmail.com', 'sde', 'sde'),
(6, 'Neharika', 'Shahi', 'neha@gmail.com', 'asd', 'asd'),
(7, 'Nina', 'Shakya', 'nn@gmail.com', 'adf', 'adf');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `title`, `author`, `price`, `image_name`, `user_id`) VALUES
(1, 'Harry Potter', 'J.K. Rowling', 700.00, 'Book_Name_38.jfif', 0),
(4, 'One Piece', 'Eiichiro Oda', 800.00, 'Book_Name_912.webp', 0),
(6, 'Tokyo Ghoul', 'Sui Ishida', 1400.00, 'Book_Name_43.webp', 1),
(7, 'You Love Me', 'Caroline Kepnes', 560.00, 'Book_Name_596.jfif', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
