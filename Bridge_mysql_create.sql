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
	`card_id` bigint NOT NULL AUTO_INCREMENT,
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

