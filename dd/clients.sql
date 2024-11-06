CREATE TABLE IF NOT EXISTS clients (
    client_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50),
    email VARCHAR(254) NOT NULL,
    address VARCHAR(255),
    phone_number VARCHAR(15),
    country_id INT NOT NULL,
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    PRIMARY KEY (client_id)
);