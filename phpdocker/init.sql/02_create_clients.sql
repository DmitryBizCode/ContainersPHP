CREATE TABLE IF NOT EXISTS clients (
    client_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50),
    email VARCHAR(254) NOT NULL UNIQUE ,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    phone_number VARCHAR(15),
    photo VARCHAR(255),
    country_id INT NOT NULL,

    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    PRIMARY KEY (client_id)
);