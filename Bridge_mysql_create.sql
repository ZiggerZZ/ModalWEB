CREATE TABLE `USER` (
	`user_id` bigint NOT NULL AUTO_INCREMENT,
	`login` TEXT NOT NULL,
	`name` TEXT NOT NULL,
	`surname` TEXT NOT NULL,
	`password` TEXT NOT NULL,
	`email` TEXT NOT NULL,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `ANSWER` (
	`answer_id` bigint NOT NULL AUTO_INCREMENT,
	`user_id` bigint NOT NULL,
	`hand_id` bigint NOT NULL,
	`bid_id` bigint NOT NULL,
	PRIMARY KEY (`answer_id`)
);

CREATE TABLE `QUIZ` (
	`quiz_id` bigint NOT NULL AUTO_INCREMENT,
	`name` TEXT NOT NULL,
	`number_of_hands` bigint NOT NULL,
	`average_rating` bigint,
	PRIMARY KEY (`quiz_id`)
);

CREATE TABLE `HAND` (
	`hand_id` bigint NOT NULL AUTO_INCREMENT,
	`quiz_id` bigint NOT NULL,
	`question` TEXT NOT NULL,
	PRIMARY KEY (`hand_id`)
);

CREATE TABLE `RATING` (
	`rating_id` bigint NOT NULL AUTO_INCREMENT,
	`user_id` bigint NOT NULL,
	`quiz_id` bigint NOT NULL,
	`rating` bigint,
	PRIMARY KEY (`rating_id`)
);

CREATE TABLE `SHARE` (
	`share_id` bigint NOT NULL AUTO_INCREMENT,
	`user1_id` bigint NOT NULL,
	`user2_id` bigint NOT NULL,
	`quiz_id` bigint NOT NULL,
	PRIMARY KEY (`share_id`)
);

CREATE TABLE `CARD` (
	`card_id` bigint NOT NULL,
	`name` TEXT NOT NULL,
	`suit` char NOT NULL,
	`rang` bigint NOT NULL,
	PRIMARY KEY (`card_id`)
);

CREATE TABLE `HAND_CARD` (
	`hand_id` bigint NOT NULL,
	`card_id` bigint NOT NULL,
	KEY (`hand_id`),
	KEY (`card_id`)
);

CREATE TABLE `BID` (
	`bid_id` bigint NOT NULL AUTO_INCREMENT,
	`suit` bigint NOT NULL,
	`level` bigint NOT NULL,
	`name` TEXT NOT NULL,
	PRIMARY KEY (`bid_id`)
);

ALTER TABLE `ANSWER` ADD CONSTRAINT `ANSWER_fk0` FOREIGN KEY (`user_id`) REFERENCES `USER`(`user_id`);

ALTER TABLE `ANSWER` ADD CONSTRAINT `ANSWER_fk1` FOREIGN KEY (`hand_id`) REFERENCES `HAND`(`hand_id`);

ALTER TABLE `ANSWER` ADD CONSTRAINT `ANSWER_fk2` FOREIGN KEY (`bid_id`) REFERENCES `BID`(`bid_id`);

ALTER TABLE `HAND` ADD CONSTRAINT `HAND_fk0` FOREIGN KEY (`quiz_id`) REFERENCES `QUIZ`(`quiz_id`);

ALTER TABLE `RATING` ADD CONSTRAINT `RATING_fk0` FOREIGN KEY (`user_id`) REFERENCES `USER`(`user_id`);

ALTER TABLE `RATING` ADD CONSTRAINT `RATING_fk1` FOREIGN KEY (`quiz_id`) REFERENCES `QUIZ`(`quiz_id`);

ALTER TABLE `SHARE` ADD CONSTRAINT `SHARE_fk0` FOREIGN KEY (`user1_id`) REFERENCES `USER`(`user_id`);

ALTER TABLE `SHARE` ADD CONSTRAINT `SHARE_fk1` FOREIGN KEY (`user2_id`) REFERENCES `USER`(`user_id`);

ALTER TABLE `SHARE` ADD CONSTRAINT `SHARE_fk2` FOREIGN KEY (`quiz_id`) REFERENCES `QUIZ`(`quiz_id`);

ALTER TABLE `HAND_CARD` ADD CONSTRAINT `HAND_CARD_fk0` FOREIGN KEY (`hand_id`) REFERENCES `HAND`(`hand_id`);

ALTER TABLE `HAND_CARD` ADD CONSTRAINT `HAND_CARD_fk1` FOREIGN KEY (`card_id`) REFERENCES `CARD`(`card_id`);

INSERT INTO `Card` (`card_id`, `name`, `suit`, `rang`) VALUES
(1, '2 clubs', 'c', 2),
(2, '3 clubs', 'c', 3),
(3, '4 clubs', 'c', 4),
(4, '5 clubs', 'c', 5),
(5, '6 clubs', 'c', 6),
(6, '7 clubs', 'c', 7),
(7, '8 clubs', 'c', 8),
(8, '9 clubs', 'c', 9),
(9, 'T clubs', 'c', 10),
(10, 'J clubs', 'c', 11),
(11, 'Q clubs', 'c', 12),
(12, 'K clubs', 'c', 13),
(13, 'A clubs', 'c', 14),
(14, '2 diamonds', 'd', 2),
(15, '3 diamonds', 'd', 3),
(16, '4 diamonds', 'd', 4),
(17, '5 diamonds', 'd', 5),
(18, '6 diamonds', 'd', 6),
(19, '7 diamonds', 'd', 7),
(20, '8 diamonds', 'd', 8),
(21, '9 diamonds', 'd', 9),
(22, 'T diamonds', 'd', 10),
(23, 'J diamonds', 'd', 11),
(24, 'Q diamonds', 'd', 12),
(25, 'K diamonds', 'd', 13),
(26, 'A diamonds', 'd', 14),
(27, '2 hearts', 'h', 2),
(28, '3 hearts', 'h', 3),
(29, '4 hearts', 'h', 4),
(30, '5 hearts', 'h', 5),
(31, '6 hearts', 'h', 6),
(32, '7 hearts', 'h', 7),
(33, '8 hearts', 'h', 8),
(34, '9 hearts', 'h', 9),
(35, 'T hearts', 'h', 10),
(36, 'J hearts', 'h', 11),
(37, 'Q hearts', 'h', 12),
(38, 'K hearts', 'h', 13),
(39, 'A hearts', 'h', 14),
(40, '2 spades', 's', 2),
(41, '3 spades', 's', 3),
(42, '4 spades', 's', 4),
(43, '5 spades', 's', 5),
(44, '6 spades', 's', 6),
(45, '7 spades', 's', 7),
(46, '8 spades', 's', 8),
(47, '9 spades', 's', 9),
(48, 'T spades', 's', 10),
(49, 'J spades', 's', 11),
(50, 'Q spades', 's', 12),
(51, 'K spades', 's', 13),
(52, 'A spades', 's', 14);

INSERT INTO `Bid` (`bid_id`, `suit`, `level`, `name`) VALUES
(1, '1 club', 'c', 1),
(2, '1 diamond', 'd', 1),
(3, '1 heart', 'h', 1),
(4, '1 spade', 's', 1),
(5, '1 no trump', 'n', 1),
(6, '2 clubs', 'c', 2),
(7, '2 diamonds', 'd', 2),
(8, '2 hearts', 'h', 2),
(9, '2 spades', 's', 2),
(10, '2 no trump', 'n', 2),
(11, '3 clubs', 'c', 3),
(12, '3 diamonds', 'd', 3),
(13, '3 hearts', 'h', 3),
(14, '3 spades', 's', 3),
(15, '3 no trump', 'n', 3),
(16, '4 clubs', 'c', 4),
(17, '4 diamonds', 'd', 4),
(18, '4 hearts', 'h', 4),
(19, '4 spades', 's', 4),
(20, '4 no trump', 'n', 4),
(21, '5 clubs', 'c', 5),
(22, '5 diamonds', 'd', 5),
(23, '5 hearts', 'h', 5),
(24, '5 spades', 's', 5),
(25, '5 no trump', 'n', 5),
(26, '6 clubs', 'c', 6),
(27, '6 diamonds', 'd', 6),
(28, '6 hearts', 'h', 6),
(29, '6 spades', 's', 6),
(30, '6 no trump', 'n', 6),
(31, '7 clubs', 'c', 7),
(32, '7 diamonds', 'd', 7),
(33, '7 hearts', 'h', 7),
(34, '7 spades', 's', 7),
(35, '7 no trump', 'n', 7),
(36, 'pass', '-', 0),
(37, 'double', '-', 0),
(38, 'redouble', '-', 0);