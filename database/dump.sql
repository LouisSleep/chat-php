-- table user
CREATE TABLE user (
    id int(11) NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    role varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- table content
CREATE TABLE content (
    id int(11) NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    content text NOT NULL,
    user_id int(11) NOT NULL,
    PRIMARY KEY (id),
    KEY user_id (user_id),
    CONSTRAINT content_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;