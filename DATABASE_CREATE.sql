CREATE TABLE `cart`
(
    `cartID` int(11) NOT NULL AUTO_INCREMENT,
    `status` varchar(50) NOT NULL,

    PRIMARY KEY (`cartID`)
);

CREATE TABLE `users`
(
    `email`    varchar(50) NOT NULL,
    `name`     varchar(50) NOT NULL,
    `cartID`   int(11) NOT NULL,
    `surname`  varchar(50) NOT NULL,
    `phone`    varchar(50) NOT NULL,
    `address`  varchar(50) NOT NULL,
    `date`     date NULL DEFAULT NULL,
    `password` varchar(128) NOT NULL,
    `admin`    bit(1)      NOT NULL DEFAULT b'0',

    PRIMARY KEY (`email`),
    KEY        `FK_110` (`cartID`),
    CONSTRAINT `FK_108` FOREIGN KEY `FK_110` (`cartID`) REFERENCES `cart` (`cartID`)
) ENGINE=INNODB;

CREATE TABLE `order`
(
    `orderID` int         NOT NULL AUTO_INCREMENT,
    `cartID`  int(11) NOT NULL,
    `email`   varchar(50) NOT NULL,
    `time`    datetime    NOT NULL,

    PRIMARY KEY (`orderID`),
    KEY       `FK_141` (`cartID`),
    CONSTRAINT `FK_139` FOREIGN KEY `FK_141` (`cartID`) REFERENCES `cart` (`cartID`),
    KEY       `FK_145` (`email`),
    CONSTRAINT `FK_143` FOREIGN KEY `FK_145` (`email`) REFERENCES `users` (`email`)
);

CREATE TABLE `categories`
(
    `categoryID` int(11) NOT NULL AUTO_INCREMENT,

    PRIMARY KEY (`categoryID`)
);

CREATE TABLE `seller`
(
    `sellerID` int(11) NOT NULL AUTO_INCREMENT,
    `name`     varchar(40) NOT NULL,
    `phone`    varchar(20) NULL DEFAULT NULL,

    PRIMARY KEY (`sellerID`)
) ENGINE=INNODB;

CREATE TABLE `products`
(
    `productID`    int(11) NOT NULL AUTO_INCREMENT,
    `name`         varchar(50) NOT NULL,
    `categoryID`   int(11) NOT NULL,
    `sellerID`     int(11) NOT NULL,
    `price`        decimal(12, 2) NULL DEFAULT NULL,
    `customizable` bit(1)      NOT NULL,
    `desciption`   varchar(50) NULL DEFAULT NULL,
    `quantity`     int(11) NOT NULL,

    PRIMARY KEY (`productID`),
    KEY            `FK_134` (`categoryID`),
    CONSTRAINT `FK_132` FOREIGN KEY `FK_134` (`categoryID`) REFERENCES `categories` (`categoryID`),
    KEY            `FK_66` (`sellerID`),
    CONSTRAINT `FK_64` FOREIGN KEY `FK_66` (`sellerID`) REFERENCES `seller` (`sellerID`)
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
    CONSTRAINT `FK_149` FOREIGN KEY `FK_151` (`orderID`) REFERENCES `order` (`orderID`),
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




