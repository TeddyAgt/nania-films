CREATE DATABASE Nania;

ALTER SCHEMA `nania`  DEFAULT COLLATE utf8mb4_general_ci ;
USE nania;

CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    level int NOT NULL
);

INSERT INTO roles (name, level)
    VALUES ("auteur", 10),
        ("modérateur", 20),
        ("administrateur", 30);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL DEFAULT 1,
    CONSTRAINT fk_users_role_id FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE tokens (
    id VARCHAR(255) PRIMARY KEY,
    user_id INT NOT NULL,
    CONSTRAINT fk_tokens_user_id FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE productions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    author_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    thumb VARCHAR(255) NOT NULL,
    details VARCHAR (255) NOT NULL,
    text TEXT NOT NULL,
    vimeo_id VARCHAR(255) NOT NULL,
    medias JSON NULL,
    status BOOLEAN NOT NULL DEFAULT TRUE,
    creation_date DATETIME NOT NULL DEFAULT NOW(),
    modification_date DATETIME NULL,
    CONSTRAINT fk_productions_author_id FOREIGN KEY (author_id) REFERENCES users(id)
);

CREATE TABLE in_progress (
    id INT PRIMARY KEY AUTO_INCREMENT,
    author_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    thumb VARCHAR(255) NOT NULL,
    details VARCHAR (255) NOT NULL,
    text TEXT NOT NULL,
    medias JSON NULL,
    status BOOLEAN NOT NULL DEFAULT TRUE,
    creation_date DATETIME NOT NULL DEFAULT NOW(),
    modification_date DATETIME NULL,
    CONSTRAINT fk_in_progress_author_id FOREIGN KEY (author_id) REFERENCES users(id)
);

CREATE TABLE replays (
    id INT PRIMARY KEY AUTO_INCREMENT,
    author_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    thumb VARCHAR(255) NOT NULL,
    details VARCHAR (255) NOT NULL,
    text TEXT NOT NULL,
    url TEXT NOT NULL,
    status BOOLEAN NOT NULL DEFAULT TRUE,
    creation_date DATETIME NOT NULL DEFAULT NOW(),
    modification_date DATETIME NULL,
    CONSTRAINT fk_replays_author_id FOREIGN KEY (author_id) REFERENCES users(id)
);

CREATE TABLE memories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    author_id INT NOT NULL,
    media JSON NOT NULL,
    text TEXT NULL,
    status BOOLEAN NOT NULL DEFAULT TRUE,
    creation_date DATETIME NOT NULL DEFAULT NOW(),
    modification_date DATETIME NULL,
    CONSTRAINT fk_memories_author_id FOREIGN KEY (author_id) REFERENCES users(id)
);