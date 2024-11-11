CREATE TABLE IF NOT EXISTS temperatures (
    temperature_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,
    time DATETIME NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (temperature_id_iot)
);

CREATE TABLE IF NOT EXISTS humidity (
    humidity_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,
    time DATETIME NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (humidity_id_iot)
);

CREATE TABLE IF NOT EXISTS vibrometers (
    vibrometer_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,
    time DATETIME NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (vibrometer_id_iot)
);

CREATE TABLE IF NOT EXISTS inclines (
    incline_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,
    time DATETIME NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (incline_id_iot)
);

CREATE TABLE IF NOT EXISTS openings (
    open_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,
    time DATETIME NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (open_id_iot)
);

CREATE TABLE IF NOT EXISTS gps (
    gps_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,
    time DATETIME NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (gps_id_iot)
);

CREATE TABLE IF NOT EXISTS illuminated (
    illuminate_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,
    time DATETIME NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (illuminate_id_iot)
);

CREATE TABLE IF NOT EXISTS gases (
    gas_id_iot INT NOT NULL AUTO_INCREMENT,
    check_value FLOAT NOT NULL,
    time DATETIME NOT NULL,
    container_id INT NOT NULL,

    FOREIGN KEY (container_id) REFERENCES containers(container_id),
    PRIMARY KEY (gas_id_iot)
);