CREATE DATABASE msuriders;
USE msuriders;
CREATE TABLE rider (
	rider_id int NOT NULL AUTO_INCREMENT,
    first_name varchar(255) NOT NULL,
    mid_name varchar(255) DEFAULT NULL,
    last_name varchar(255) NOT NULL,
    suffix varchar(255) DEFAULT NULL,
    address varchar(255) NOT NULL,
    PRIMARY KEY(rider_id)
);

CREATE TABLE registered_rider_profile (
	registered_rider_id int NOT NULL AUTO_INCREMENT,
    rider_id int NOT NULL,
    rider_no int NOT NULL,
    designation varchar(255) NOT NULL,
    official_reciept varchar(255) DEFAULT NULL,
    or_expiration_date date DEFAULT NULL,
    cerificate_of_registration varchar(255) DEFAULT NULL,
    drivers_license varchar(255) DEFAULT NULL,
    license_expiration_date date DEFAULT NULL,
    plate_number varchar(255) NOT NULL,
    contact_number varchar(11) DEFAULT NULL,
    img_url varchar(255) NOT NULL,
    PRIMARY KEY(registered_rider_id),
    FOREIGN KEY(rider_id) REFERENCES rider(rider_id) 
);