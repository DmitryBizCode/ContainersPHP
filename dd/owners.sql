CREATE TABLE IF NOT EXISTS owners (
    owner_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(254) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,

    PRIMARY KEY (owner_id)
);