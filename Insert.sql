INSERT INTO `users` (`email`, `name`, `surname`, `phone`, `address`, `date`, `password`, `admin`)
VALUES ('utente@elaborato.it', 'Sheldon', 'Cooper', '333212323', '', '1980-02-26',
        '$2a$09$JTCjOwaLC6m4UPQSSzYUzu25T/O/r0KoGv2qnqWWvKkG/yZVx0gz6', b'0');

INSERT INTO `users` (`email`, `name`, `surname`, `phone`, `address`, `date`, `password`, `admin`)
VALUES ('venditore@elaborato.it', 'Leonard', 'Hofstadter', '3222333442', '', '1980-05-17',
        '$2a$09$JTCjOwaLC6m4UPQSSzYUzu25T/O/r0KoGv2qnqWWvKkG/yZVx0gz6', b'1');

INSERT INTO `users` (`email`, `name`, `surname`, `phone`, `address`, `date`, `password`, `admin`)
VALUES ('utente2@elaborato.it', 'Wolfgang', 'Mozart', '', '', '1990-01-27',
        '$2a$09$JTCjOwaLC6m4UPQSSzYUzu25T/O/r0KoGv2qnqWWvKkG/yZVx0gz6', b'0');
INSERT INTO `categories` (`categoryID`, `name`, `description`)
VALUES (NULL, 'Torte', 'torta'),
       (NULL, 'Biscotti', 'biscotti'),
       (NULL, 'Cupcakes', 'cupcakes');

