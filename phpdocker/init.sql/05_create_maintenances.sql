CREATE TABLE IF NOT EXISTS maintenances (
    maintenance_id INT NOT NULL AUTO_INCREMENT,
    maintenance_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    description TEXT,
    cost FLOAT NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (maintenance_id)
);