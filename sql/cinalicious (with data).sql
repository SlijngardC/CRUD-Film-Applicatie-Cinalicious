-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 10:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinalicious`
--

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `name`, `bio`) VALUES
(1, 'Michael Bay ', 'Michael Bay is an American film director, producer, and screenwriter. He is known for directing high-budget action films characterized by fast-paced editing, stylistic cinematography, explosions, and car chases. Some of his other notable films include the Transformers franchise, Armageddon, The Rock, and 13 Hours.'),
(2, 'Martin Brest ', 'Martin Brest is an American film director, screenwriter, and producer. He is best known for directing the comedy films Beverly Hills Cop, Midnight Run, and Scent of a Woman, for which he received an Academy Award nomination for Best Director.'),
(3, 'James Wan ', 'James Wan is an Australian film director, producer, and screenwriter. He is widely regarded as one of the founders of the \"torture porn\" subgenre of horror films, having directed the original Saw film. He has also directed other successful horror films like Insidious and The Conjuring, as well as the action film Furious 7.'),
(4, 'John McTiernan ', 'John McTiernan is an American film director, producer and screenwriter. He is known for directing action films such as Die Hard, Predator, The Hunt for Red October, and The Last Action Hero. He is considered one of the most influential directors of the action genre.'),
(5, 'Gary Winick ', 'Gary Winick was an American film director, producer, and screenwriter. He was known for directing romantic comedy films such as 13 Going on 30, Bride Wars, and Letters to Juliet. Tragically, he passed away in 2011 at the age of 49.'),
(6, 'Conrad Helten ', 'Conrad Helten is a Canadian director and animator who has worked extensively on Barbie and other animated Mattel properties. He has directed several direct-to-video Barbie films, including Barbie: Dolphin Magic.'),
(7, 'Dennis Dugan', 'Dennis Barton Dugan is an American film director, actor, and comedian. He is known for directing the films Problem Child, Brain Donors, Beverly Hills Ninja and National Security, and his partnership with comedic actor Adam Sandler, for whom he directed the films Happy Gilmore, Big Daddy, The Benchwarmers, I Now Pronounce You Chuck & Larry, You Do not Mess with the Zohan, Grown Ups, Just Go with It, Jack and Jill and Grown Ups 2. Dugan is a four-time Golden Raspberry Award for Worst Director nominee, winning once.'),
(8, 'Tony Scott ', 'Anthony David Leighton Scott was an English film director and producer. He made his theatrical film debut with The Hunger (1983) and went on to direct highly successful action and thriller films such as Top Gun (1986), Beverly Hills Cop II (1987), Days of Thunder (1990), The Last Boy Scout (1991), Crimson Tide (1995), Enemy of the State (1998), Man on Fire (2004), Déjà Vu (2006), and Unstoppable (2010).'),
(9, 'Bob Perischetti', 'Bob Persichetti is an American animator, storyboard artist, and film director. He is best known for co-directing the 2018 superhero animated film Spider-Man: Into the Spider-Verse.'),
(10, 'Masashi Kishimoto', 'Masashi Kishimoto is a Japanese manga artist best known as the creator of the popular manga and anime series Naruto. Kishimoto was born in 1974 in Okayama Prefecture, Japan. From a young age, he was interested in drawing manga and was influenced by popular series like Dragon Ball.'),
(11, 'Yuichiro Hayashi ', 'Yuichiro Hayashi is a veteran anime director and animator who has worked in the industry for over 20 years. He is considered one of the top directorial talents in the current anime industry, especially for his work on the beloved Attack on Titan franchise.'),
(12, 'Jake Kasdan', 'Jake Kasdan is an American film director, screenwriter, and producer who has worked extensively in both film and television. Born in 1974 in Los Angeles, California, he comes from a family of acclaimed filmmakers - his father is director Lawrence Kasdan and his brother is actor-director Jake Kasdan.'),
(13, 'Denis Villeneuve', 'Denis Villeneuve is a French-Canadian film director, screenwriter, and producer. Born in 1967 in Gentilly, Quebec, Canada. He began his filmmaking career in the 1990s, directing several acclaimed French-language films in Canada.'),
(14, 'John G. Avildsen', 'John G. Avildsen (1935-2017) was an American film director best known for directing the original Rocky film. He was born in Oak Park, Illinois and began his career in the 1960s, directing low-budget independent films.'),
(15, 'Bryan Singer', 'Bryan Singer (born 1965) is an American film director, producer, and screenwriter best known for directing the first two X-Men films.\r\nHe began his career in the early 1990s, directing independent films like Public Access and The Usual Suspects, for which he received critical acclaim.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `director_id` int(10) UNSIGNED NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `year` year(4) NOT NULL,
  `studio_id` int(10) UNSIGNED NOT NULL,
  `poster` longblob NOT NULL,
  `video` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `genre_id`, `description`, `director_id`, `rating`, `year`, `studio_id`, `poster`, `video`, `updated_at`) VALUES
(1, 'aquaman: the lost kingdom', 1, 'Arthur Curry, the Aquaman, must reclaim his throne and prevent a war between the surface world and the underwater kingdom of Atlantis.', 3, 0.0, '2023', 2, 0x617175615f6d616e2e706e67, 'aqua_man.mp4', '2024-04-13 03:21:33'),
(2, 'beverly hills cop ', 2, 'A streetwise Detroit cop pursues a murder investigation that leads him to Beverly Hills, where his hard-edged tactics don\'t fit in with the local police department.', 2, 0.0, '1984', 1, 0x62657665726c795f68696c6c735f636f702e706e67, 'beverly_hills_cop.mp4', '2024-04-12 00:48:33'),
(3, 'big daddy ', 2, 'A carefree bachelor takes in a young boy and learns to accept responsibility.', 7, 0.0, '1999', 4, 0x6269675f64616464792e706e67, 'big_daddy.mp4', '2024-04-11 03:17:55'),
(4, 'top gun: maverick', 1, 'A group of the Navy\'s best young fighter pilots compete to be the top gun at the prestigious Fighter Weapons School.', 8, 0.0, '2024', 1, 0x746f705f67756e2e706e67, 'top_gun.mp4', '2024-04-11 03:27:30'),
(5, 'spiderman: into the spiderverse', 7, 'Spider-Man: Into the Spider-Verse is a superhero film that follows the story of Miles Morales, a young teenager living in Brooklyn who becomes the new Spider-Man. When a particle accelerator opens a portal to other dimensions, Miles encounters versions of Spider-Man from parallel universes, including the original Spider-Man, Peter Parker.', 9, 0.0, '2018', 6, 0x7370696465726d616e2e706e67, 'spiderman.mp4', '2024-04-11 03:35:01'),
(6, 'naruto shipuden: bonds', 9, 'The story follows the adventures of Naruto Uzumaki, a young ninja-in-training who dreams of becoming the Hokage, the leader of his village. Naruto possesses a powerful fox spirit sealed within him, which grants him incredible abilities but also makes him an outcast in his community.', 10, 0.0, '2007', 9, 0x6e617275746f5f736869707564656e2e706e67, 'naruto_shipuden.mp4', '2024-04-13 03:59:55'),
(7, 'attack on titan final season', 9, 'The remaining members of the Survey Corps, including Mikasa, Armin, Levi, and others, struggle to stop Eren and his Rumbling attack. They must navigate the ethical dilemmas posed by Eren\'s extreme actions, while also trying to find a way to end the cycle of violence between Eldians and the outside world.', 11, 0.0, '2023', 10, 0x61747461636b5f6f6e5f746974616e2e706e67, 'attack_on_titan.mp4', '2024-04-12 01:01:00'),
(8, 'predator 6: badlands', 5, 'A elite military rescue team on a mission in the jungle encounters a deadly extraterrestrial creature that stalks and hunts them down one by one.', 4, 0.0, '2024', 12, 0x7072656461746f722e706e67, 'predator.mp4', '2024-04-12 01:33:00'),
(9, 'jumanji: welcome to the jungle', 10, 'Jumanji: Welcome to the Jungle is a fantasy adventure comedy film that serves as a continuation of the original 1995 Jumanji film. The story follows a group of high school students who discover an old video game console and are sucked into the world of Jumanji, transforming into the game\'s playable characters.', 12, 0.0, '2017', 13, 0x6a756d616e6a692e706e67, 'jumanji.mp4', '2024-04-12 02:21:38'),
(10, 'dune', 3, 'Dune is a epic science fiction film directed by Denis Villeneuve. It is an adaptation of the 1965 novel of the same name by Frank Herbert. The film is set in the distant future and follows the story of Paul Atreides, a brilliant and gifted young man born into a great destiny beyond his understanding. When Paul\'s family is assigned to oversee the desert planet Arrakis, the only source of the most valuable resource in the universe, a fierce battle for control of the planet erupts. Paul must journey to Arrakis, tame the dangerous environments, and fulfill his destiny in order to bring stability to the galaxy.', 13, 0.0, '2021', 2, 0x64756e652e706e67, 'dune.mp4', '2024-04-12 02:37:43'),
(11, 'rocky', 8, 'Rocky is a classic sports drama film directed by John G. Avildsen. The film follows Rocky Balboa, a small-time boxer from Philadelphia who is given a shot at the world heavyweight championship against the reigning champ, Apollo Creed. Despite being an underdog, Rocky trains hard and ultimately goes the distance in an epic title fight, proving himself and finding personal redemption in the process. The film is known for its inspiring story, memorable characters, and rousing, Oscar-winning musical score.', 14, 0.0, '1976', 14, 0x726f636b792e706e67, 'rocky.mp4', '2024-04-12 03:15:47'),
(12, 'x-men', 1, 'X-Men is a superhero film based on the Marvel Comics team of the same name. The film, directed by Bryan Singer, introduces audiences to the X-Men - a group of mutant heroes led by Professor X who fight for peace and acceptance in a world that fears and hates them. When the powerful mutant Magneto threatens to destroy the world, the X-Men must band together and use their extraordinary abilities to stop him. The film features fan-favorite Marvel characters like Wolverine, Rogue, Cyclops, and Storm, and helped launch the massively successful X-Men film franchise.', 15, 0.0, '2000', 6, 0x785f6d656e2e706e67, 'x_men.mp4', '2024-04-12 03:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `description`) VALUES
(1, 'Action ', 'Films featuring exciting physical stunts, car chases, explosions, and high-stakes adventure. Examples: Transformers, Predator, Top Gun.'),
(2, 'Comedy ', 'Films focused on humor, laughter, and amusing situations. Examples: Beverly Hills Cop, Big Daddy.'),
(3, 'Science Fiction ', 'Films that speculate about imaginary advanced technologies, space travel, alien life, etc. Examples: Transformers, Predator.'),
(4, 'Fantasy', 'Films set in fictional, imaginative worlds often involving magic, mythical creatures, and the supernatural. Examples: Aquaman, Winnie the Pooh: Blood and Honey.'),
(5, 'Horror', 'Films designed to scare the audience, often featuring frightening or disturbing subject matter. Example: Winnie the Pooh: Blood and Honey.'),
(6, 'Romance', 'Films that focus on romantic relationships and love stories. Example: 13 Going on 30.'),
(7, 'Animation', 'Films made using animation techniques rather than live-action. Examples: Barbie: Dolphin Magic, Snoopy Presents.'),
(8, 'Drama', 'Films that explore serious themes and realistic human emotions and experiences. Example: Top Gun.'),
(9, 'Anime', 'Anime are Japanese animated cartoons. '),
(10, 'Adventure', 'The adventure genre is a popular and enduring category of film, television, literature, and other media that focuses on stories involving exciting, dangerous, or otherwise extraordinary experiences and journey'),
(11, '\"\"\"', '\"\"');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`) VALUES
(1, 'USER'),
(2, 'ADMIN'),
(3, 'OWNER'),
(4, 'BANNED');

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id`, `name`, `country`) VALUES
(1, 'Paramount Pictures', 'United States'),
(2, 'Warner Bros. Pictures ', 'United States'),
(3, 'Jagged Edge Productions ', 'United Kingdom'),
(4, 'Columbia Pictures ', 'United States'),
(5, 'Mattel Creations ', 'United States'),
(6, 'MARVEL ', 'United States'),
(7, 'DreamWorks Animation', 'United States'),
(8, 'Walt Disney Studios', 'United States'),
(9, 'Pierrot', 'Japan'),
(10, 'MAPPA', 'Japan'),
(11, 'Ufotable, Inc', 'Japan'),
(12, '20th Century Fox', 'United States'),
(13, 'Sony Pictures Entertainment.', 'United States'),
(14, 'United Artists', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'Cinalicious/owner chivar.slijngard', 'chivar.slijngard@cinalicious.com', 'owner123', 3),
(2, 'Cinalicious/admin sahil.bisai', 'sahil.bisai@cinalicious.com', 'admin123', 2),
(3, 'Cinalicious/admin tushar.gena', 'tushar.gena@cinalicious.com', 'admin123', 2),
(4, 'Cinalicious/admin joel.narendorp', 'joel.narendorp@cinalicious.com', 'admin123', 2),
(5, 'Irwin Noordwijk', 'irwin.noordwijk@gmail.com', '12345678', 1),
(6, 'Whitney Grootfaam', 'whitney.grootfaam@gmail.com', 'FaStEr', 1),
(7, 'Jair Pawirodinomo', 'jair.pawirodinomo@gmail.com', 'thejew', 1),
(8, 'Jackson Blai', 'blai.jacks@gmail.com', 'itzlit!', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `id` int(10) NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_director_id_foreign` (`director_id`),
  ADD KEY `films_studio_id_foreign` (`studio_id`),
  ADD KEY `films_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ratings_film_id_foreign` (`film_id`),
  ADD KEY `user_ratings_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`),
  ADD CONSTRAINT `films_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `films_studio_id_foreign` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD CONSTRAINT `user_ratings_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `user_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
