CREATE TABLE users(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL unique,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(150) NOT NULL unique,
    created_at DATETIME NOT NULL
);

CREATE TABLE posts(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    user_id INT(11) NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE comments(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    post_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL,
    comment TEXT NOT NULL,
    created_at DATETIME NOT NULL
)
