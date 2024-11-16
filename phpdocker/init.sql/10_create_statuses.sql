CREATE TABLE IF NOT EXISTS statuses (
    status_id INT NOT NULL AUTO_INCREMENT,
    status VARCHAR(255),
    update_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    container_id INT NOT NULL,
#change status to enum
    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (status_id)
);