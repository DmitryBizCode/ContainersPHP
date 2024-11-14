CREATE TABLE IF NOT EXISTS containers (
    container_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    width FLOAT NOT NULL,
    length FLOAT NOT NULL,
    height FLOAT NOT NULL,
    country_id INT NOT NULL,
    owner_id INT NOT NULL,
    old INT,
    iot TINYINT(1),

    FOREIGN KEY (owner_id) REFERENCES owners(owner_id),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    PRIMARY KEY (container_id)
);