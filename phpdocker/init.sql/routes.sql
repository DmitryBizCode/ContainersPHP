CREATE TABLE IF NOT EXISTS routes (
    id INT NOT NULL AUTO_INCREMENT,
    origin_port_id INT NOT NULL,
    destination_port_id INT NOT NULL,
    estimated_time INT NOT NULL,
    distance FLOAT NOT NULL,

    PRIMARY KEY (id)
);