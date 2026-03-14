CREATE TABLE `info`(
  `id`  int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `body`  text NOT NULL,
  `created`  datetime NOT NULL,     -- insert時に自動的に日時が設定される
  `modified`  datetime NOT NULL,    -- update時に自動的に日時が設定される
  PRIMARY KEY(id)
);