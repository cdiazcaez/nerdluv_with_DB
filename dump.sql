CREATE DATABASE IF NOT EXISTS `nerdluv` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nerdluv`;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `user_os` (
  `user` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `user_personality` (
  `user` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `user_seeking_age` (
  `user` int(11) NOT NULL,
  `smin` int(11) NOT NULL,
  `smax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_os`
  ADD KEY `user_os` (`user`);

ALTER TABLE `user_personality`
  ADD KEY `user` (`user`);

ALTER TABLE `user_seeking_age`
  ADD KEY `user_seeking` (`user`);


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users` ADD INDEX(`name`);

ALTER TABLE `user_os`
  ADD CONSTRAINT `user_os` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `user_personality`
  ADD CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `user_seeking_age`
  ADD CONSTRAINT `user_seeking` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
