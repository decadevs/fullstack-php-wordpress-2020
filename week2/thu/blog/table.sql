USE decagon;
CREATE TABLE users(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(150) NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE posts(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    user_id INT(11) NOT NULL,
    created_at DATETIME NOT NULL
);

-- create comments table
DROP TABLE IF EXISTS comments;
CREATE TABLE comments(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    comment TEXT NOT NULL,
    user_id INT(11) NOT NULL,
    post_id INT(11) NOT NULL,
    created_at DATETIME NOT NULL
);
