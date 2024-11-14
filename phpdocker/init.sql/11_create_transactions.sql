CREATE TABLE IF NOT EXISTS transactions (
    transaction_id INT NOT NULL AUTO_INCREMENT,
    transaction_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    amount FLOAT NOT NULL,
    currency VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL DEFAULT 'unpaid',
    rental_id INT NOT NULL,

    FOREIGN KEY (rental_id) REFERENCES rentals(rental_id),
    PRIMARY KEY (transaction_id)
);
