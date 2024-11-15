CREATE TABLE IF NOT EXISTS metrics (
    metric_id INT NOT NULL AUTO_INCREMENT,
    container_id INT NOT NULL,
    rental_id INT NOT NULL,
    type ENUM('temperatures','humidity','vibrometers','inclines','openings','gps','illuminated','gases') NOT NULL,
    value FLOAT NOT NULL,
    time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (rental_id) REFERENCES rentals(rental_id),
    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (metric_id)
);