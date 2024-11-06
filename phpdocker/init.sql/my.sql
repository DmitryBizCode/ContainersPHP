CREATE TABLE IF NOT EXISTS countries (
    country_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    interest_tax FLOAT NOT NULL,

    PRIMARY KEY (country_id)
);

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

CREATE TABLE IF NOT EXISTS owners (
    owner_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(254) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,

    PRIMARY KEY (owner_id)
);

CREATE TABLE IF NOT EXISTS containers (
    container_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    width FLOAT NOT NULL,
    length FLOAT NOT NULL,
    height FLOAT NOT NULL,
    old INT,
    country_id INT NOT NULL,
    owner_id INT NOT NULL,

    FOREIGN KEY (owner_id) REFERENCES owners(owner_id),
    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    PRIMARY KEY (container_id)
);

CREATE TABLE IF NOT EXISTS maintenances (
    maintenance_id INT NOT NULL AUTO_INCREMENT,
    maintenance_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    description TEXT,
    cost FLOAT NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (maintenance_id)
);

CREATE TABLE IF NOT EXISTS ports (
    port_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50),
    location VARCHAR(255),
    country_id INT NOT NULL,

    FOREIGN KEY (country_id) REFERENCES countries(country_id),
    PRIMARY KEY (port_id)
);

CREATE TABLE IF NOT EXISTS rentals (
    rental_id INT NOT NULL AUTO_INCREMENT,
    start_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    end_date DATETIME,
    status VARCHAR(50) NOT NULL,
    price FLOAT NOT NULL,
    payment_status VARCHAR(255) NOT NULL DEFAULT 'unpaid',
    container_id INT NOT NULL,
    client_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    FOREIGN KEY (client_id) REFERENCES clients(client_id),
    PRIMARY KEY (rental_id)
);

CREATE TABLE IF NOT EXISTS routes (
    route_id INT NOT NULL AUTO_INCREMENT,
    origin_port_id INT NOT NULL,
    destination_port_id INT NOT NULL,
    estimated_time INT NOT NULL,
    distance FLOAT NOT NULL,

    FOREIGN KEY (origin_port_id) REFERENCES ports(port_id),
    FOREIGN KEY (destination_port_id) REFERENCES ports(port_id),
    PRIMARY KEY (route_id)
);

CREATE TABLE IF NOT EXISTS shipments (
    shipment_id INT NOT NULL AUTO_INCREMENT,
    departure_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    arrival_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255),
    rental_id INT NOT NULL,
    route_id INT NOT NULL,

    FOREIGN KEY (rental_id) REFERENCES rentals(rental_id),
    FOREIGN KEY (route_id) REFERENCES routes(route_id),
    PRIMARY KEY (shipment_id)
);

CREATE TABLE IF NOT EXISTS statuses (
    status_id INT NOT NULL AUTO_INCREMENT,
    status VARCHAR(255),
    update_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (status_id)
);

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


CREATE TABLE IF NOT EXISTS temperatures (
    temperature_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,

    PRIMARY KEY (temperature_id_iot)
);

CREATE TABLE IF NOT EXISTS humidity (
    humidity_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,

    PRIMARY KEY (humidity_id_iot)
);

CREATE TABLE IF NOT EXISTS vibrometers (
    vibrometer_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,

    PRIMARY KEY (vibrometer_id_iot)
);

CREATE TABLE IF NOT EXISTS inclines (
    incline_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,

    PRIMARY KEY (incline_id_iot)
);

CREATE TABLE IF NOT EXISTS openings (
    open_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,

    PRIMARY KEY (open_id_iot)
);

CREATE TABLE IF NOT EXISTS gps (
    gps_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,

    PRIMARY KEY (gps_id_iot)
);

CREATE TABLE IF NOT EXISTS illuminated (
    illuminate_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,

    PRIMARY KEY (illuminate_id_iot)
);

CREATE TABLE IF NOT EXISTS gases (
    gas_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,

    PRIMARY KEY (gas_id_iot)
);