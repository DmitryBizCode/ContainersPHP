CREATE TABLE IF NOT EXISTS shipments (
    id INT NOT NULL AUTO_INCREMENT,
    departure_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    arrival_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255),

    PRIMARY KEY (id)
);