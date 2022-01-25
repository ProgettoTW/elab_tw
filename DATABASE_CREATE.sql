CREATE TABLE `users`
(
    `email`    varchar(50)  NOT NULL,
    `name`     varchar(50)  NOT NULL,
    `surname`  varchar(50)  NOT NULL,
    `phone`    varchar(50)  NOT NULL,
    `address`  varchar(50)  NOT NULL,
    `date`     date NULL DEFAULT NULL,
    `password` varchar(128) NOT NULL,
    `admin`    bit(1)       NOT NULL DEFAULT b'0',

    PRIMARY KEY (`email`)
) ENGINE=INNODB;

CREATE TABLE `cart`
(
    `cartID` int(11) NOT NULL AUTO_INCREMENT,
    `status` varchar(50) NOT NULL,
    `email`  varchar(50) NOT NULL,

    PRIMARY KEY (`cartID`),
    KEY      `FK_173` (`email`),
    CONSTRAINT `FK_171` FOREIGN KEY `FK_173` (`email`) REFERENCES `users` (`email`)
);



CREATE TABLE `orders`
(
    `orderID` int         NOT NULL AUTO_INCREMENT,
    `email`   varchar(50) NOT NULL,
    `time`    datetime    NOT NULL,
    `status`  varchar(50) NOT NULL,

    PRIMARY KEY (`orderID`),
    KEY       `FK_145` (`email`),
    CONSTRAINT `FK_143` FOREIGN KEY `FK_145` (`email`) REFERENCES `users` (`email`)
);


CREATE TABLE `categories`
(
    `categoryID`  int(11) NOT NULL AUTO_INCREMENT,
    `name`        varchar(50) NOT NULL,
    `description` varchar(50) NOT NULL,

    PRIMARY KEY (`categoryID`)
);


CREATE TABLE `products`
(
    `productID`    int(11) NOT NULL AUTO_INCREMENT,
    `name`         varchar(50) NOT NULL,
    `categoryID`   int(11) NOT NULL,
    `price`        decimal(12, 2) NULL DEFAULT NULL,
    `customizable` bit(1)      NOT NULL,
    `description`  varchar(50) NULL DEFAULT NULL,
    `quantity`     int(11) NOT NULL,

    PRIMARY KEY (`productID`),
    KEY            `FK_134` (`categoryID`),
    CONSTRAINT `FK_132` FOREIGN KEY `FK_134` (`categoryID`) REFERENCES `categories` (`categoryID`)
) ENGINE=INNODB;

CREATE TABLE `orderItem`
(
    `ID`        int(11) NOT NULL AUTO_INCREMENT,
    `orderID`   int         NOT NULL,
    `productID` int(11) NOT NULL,
    `quantity`  int(11) NOT NULL,
    `name`      varchar(50) NOT NULL,

    PRIMARY KEY (`ID`),
    KEY         `FK_151` (`orderID`),
    CONSTRAINT `FK_149` FOREIGN KEY `FK_151` (`orderID`) REFERENCES `orders` (`orderID`),
    KEY         `FK_168` (`productID`),
    CONSTRAINT `FK_166` FOREIGN KEY `FK_168` (`productID`) REFERENCES `products` (`productID`)
);

CREATE TABLE `cartItem`
(
    `ID`        int(11) NOT NULL AUTO_INCREMENT,
    `quantity`  int(11) NOT NULL,
    `cartID`    int(11) NOT NULL,
    `productID` int(11) NOT NULL,

    PRIMARY KEY (`ID`),
    KEY         `FK_128` (`cartID`),
    CONSTRAINT `FK_126` FOREIGN KEY `FK_128` (`cartID`) REFERENCES `cart` (`cartID`),
    KEY         `FK_79` (`productID`),
    CONSTRAINT `FK_77` FOREIGN KEY `FK_79` (`productID`) REFERENCES `products` (`productID`)
);

CREATE TABLE `images`
(
    `imageID`   int         NOT NULL AUTO_INCREMENT,
    `url`       varchar(50) NOT NULL,
    `productID` int(11) NOT NULL,
    `alt`       varchar(50) NOT NULL,

    PRIMARY KEY (`imageID`),
    KEY         `FK_185` (`productID`),
    CONSTRAINT `FK_183` FOREIGN KEY `FK_185` (`productID`) REFERENCES `products` (`productID`)
);

CREATE TABLE `notifications`
(
    `ID`     int(11) NOT NULL AUTO_INCREMENT,
    `time`   datetime    NOT NULL,
    `email`  varchar(50) NOT NULL,
    `status` varchar(50) NOT NULL,
    `seen`   bit(1)      NOT NULL,

    PRIMARY KEY (`ID`),
    KEY      `FK_193` (`email`),
    CONSTRAINT `FK_191` FOREIGN KEY `FK_193` (`email`) REFERENCES `users` (`email`)
);


--- INSERT CATEGORIE
INSERT INTO `categories` (`categoryID`, `name`, `description`)
VALUES (1, 'Torte', 'Torte'),
       (2, 'Muffin', 'Muffin'),
       (3, 'Biscotti', 'Biscotti');

ALTER TABLE `categories`
    ADD PRIMARY KEY (`categoryID`);

ALTER TABLE `categories`
    MODIFY `categoryID` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--- INSERT CART
INSERT INTO `cart` (`cartID`, `status`, `email`)
VALUES (1, 'NEW', 'pasticceroo@protonmail.com'),

--- INSERT USERS
INSERT INTO `users` (`email`, `name`, `surname`, `phone`, `address`, `date`, `password`, `admin`)
VALUES ('pasticceroo@protonmail.com', 'Admin', 'Pastecceroo', '1111', 'EMPTY', '1991-01-01',
    '$2y$10$zhItn.u3sujQVCvgyS56P.eA6GgP12XiJ8Hb5XqhC8V2yrepGf7kO', b'1'),
    COMMIT;


