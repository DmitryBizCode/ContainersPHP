CREATE TABLE IF NOT EXISTS containers (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    width FLOAT NOT NULL,
    length FLOAT NOT NULL,
    height FLOAT NOT NULL,
    old INT,

    PRIMARY KEY (id)
);