#DDLs

CREATE TABLE student_details(
    roll_no VARCHAR(7),
    CNIC VARCHAR(13) NOT NULL UNIQUE,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    hostel_id VARCHAR(4) NOT NULL,
    room_no INT NOT NULL,
    student_rep VARCHAR(7),
    phone_no VARCHAR(11) NOT NULL UNIQUE,
    guardian_name VARCHAR(40) NOT NULL,
    address VARCHAR(50) NOT NULL,
    join_date DATE NOT NULL,
    password VARCHAR(32) NOT NULL,
    CONSTRAINT pk_hostelite_detail PRIMARY KEY (roll_no)
);
 
CREATE TABLE hostel_details(
    hostel_id VARCHAR(4) NOT NULL,
    hostel_name VARCHAR(20) NOT NULL UNIQUE,
    address VARCHAR(50) NOT NULL UNIQUE,
    total_rooms INT NOT NULL,
    base_rent INT NOT NULL,
    password VARCHAR(50) NOT NULL,
    CONSTRAINT pk_hostel_details PRIMARY KEY (hostel_id)
);
 
CREATE TABLE room_details(
    hostel_id VARCHAR(4) NOT NULL,
    room_no INT NOT NULL,
    floor_no INT NOT NULL,
    CONSTRAINT pk_room_details PRIMARY KEY (hostel_id, room_no)
);

CREATE TABLE facilities(
    facility_id INT,
    facility_name VARCHAR(20) NOT NULL UNIQUE,
    facility_cost INT NOT NULL,
    CONSTRAINT pk_facilities PRIMARY KEY (facility_id)
);
    
CREATE TABLE facilities_available(
    facility_id INT,
    hostel_id VARCHAR(4),
    CONSTRAINT pk_facilities_available PRIMARY KEY (facility_id, hostel_id)
);

CREATE TABLE facilities_availed(
    roll_no VARCHAR(7) NOT NULL,
    hostel_id VARCHAR(4) NOT NULL,
    facility_id INT NOT NULL,
    CONSTRAINT pk_facilities_availed PRIMARY KEY (roll_no, facility_id)
);

CREATE TABLE accounts(
    roll_no VARCHAR(7),
    hostel_id VARCHAR(4),
	rent_amount INT NOT NULL,
    due_date DATE NOT NULL,
    status VARCHAR(4) NOT NULL,
    CONSTRAINT pk_accounts PRIMARY KEY (roll_no)
);

CREATE TABLE complaints(
    complain_ticket INT NOT NULL AUTO_INCREMENT,
    roll_no VARCHAR(7) NOT NULL,
    hostel_id VARCHAR(4) NOT NULl,
    facility_id INT NOT NULL,
    comments VARCHAR(100),
	complaint_status BOOLEAN NOT NULL,
    CONSTRAINT pk_complaints PRIMARY KEY (complain_ticket)
);

#PL SQL

#Trigger
DELIMITER //
CREATE TRIGGER add_join_date BEFORE INSERT ON student_details
FOR EACH ROW
BEGIN
  SET NEW.join_date = SYSDATE();
END; //

#Procedure

DELIMITER //  
CREATE OR REPLACE PROCEDURE check_room_no(  
    max_rooms INT,
    room_assigned INT,
    hostel_id VARCHAR(4),
    roll_no VARCHAR(7)
)
MODIFIES SQL DATA
BEGIN  
    DECLARE room_occupents_amt INT;
    
    SELECT COUNT(room_no)
    INTO room_occupents_amt
    FROM room_details RD
    WHERE RD.hostel_id = hostel_id AND RD.room_no = room_assigned;
    
    IF max_rooms >= room_assigned THEN
        INSERT INTO room_details VALUES(hostel_id, room_assigned, roll_no);
    END IF;  
END; //


#Data Insertions

#Accounts

INSERT INTO `accounts`(`roll_no`, `hostel_id`, `rent_amount`, `due_date`, `status`) VALUES ('k201055','H101','20000','2022-12-15','0');
INSERT INTO `accounts`(`roll_no`, `hostel_id`, `rent_amount`, `due_date`, `status`) VALUES ('k201051','H101','18000','2022-12-15','0');
INSERT INTO `accounts`(`roll_no`, `hostel_id`, `rent_amount`, `due_date`, `status`) VALUES ('k201754','H202','23000','2022-12-15','0');


#Complaints

INSERT INTO `complaints`(`roll_no`, `hostel_id`, `facility_id`, `comments`, `complaint_status`) VALUES ('k201055','H101','101','Low Quality','0');
INSERT INTO `complaints`(`roll_no`, `hostel_id`, `facility_id`, `comments`, `complaint_status`) VALUES ('k201051','H101','202','Slow Speed','0');
INSERT INTO `complaints`(`roll_no`, `hostel_id`, `facility_id`, `comments`, `complaint_status`) VALUES ('k201754','H202','404','No Cooling','0');


#Facilities

INSERT INTO `facilities`(`facility_id`, `facility_name`, `facility_cost`) VALUES ('101','Mess','10000');
INSERT INTO `facilities`(`facility_id`, `facility_name`, `facility_cost`) VALUES ('202','WiFi','1500');
INSERT INTO `facilities`(`facility_id`, `facility_name`, `facility_cost`) VALUES ('303','attach_bath','3000');
INSERT INTO `facilities`(`facility_id`, `facility_name`, `facility_cost`) VALUES ('404','AC','4000');


#Facilities Available

INSERT INTO `facilities_available`(`facility_id`, `hostel_id`) VALUES ('101','H101');
INSERT INTO `facilities_available`(`facility_id`, `hostel_id`) VALUES ('202','H101');
INSERT INTO `facilities_available`(`facility_id`, `hostel_id`) VALUES ('303','H101');
INSERT INTO `facilities_available`(`facility_id`, `hostel_id`) VALUES ('101','H202');
INSERT INTO `facilities_available`(`facility_id`, `hostel_id`) VALUES ('202','H202');
INSERT INTO `facilities_available`(`facility_id`, `hostel_id`) VALUES ('303','H202');
INSERT INTO `facilities_available`(`facility_id`, `hostel_id`) VALUES ('404','H202');


#Facilities Availed

INSERT INTO `facilities_availed`(`roll_no`, `hostel_id`, `facility_id`) VALUES ('k201055','H101','101');
INSERT INTO `facilities_availed`(`roll_no`, `hostel_id`, `facility_id`) VALUES ('k201055','H101','202');
INSERT INTO `facilities_availed`(`roll_no`, `hostel_id`, `facility_id`) VALUES ('k201055','H101','303');
INSERT INTO `facilities_availed`(`roll_no`, `hostel_id`, `facility_id`) VALUES ('k201051','H101','101');
INSERT INTO `facilities_availed`(`roll_no`, `hostel_id`, `facility_id`) VALUES ('k201051','H101','202');
INSERT INTO `facilities_availed`(`roll_no`, `hostel_id`, `facility_id`) VALUES ('k201051','H101','303');
INSERT INTO `facilities_availed`(`roll_no`, `hostel_id`, `facility_id`) VALUES ('k201051','H101','404');
INSERT INTO `facilities_availed`(`roll_no`, `hostel_id`, `facility_id`) VALUES ('k201754','H202','202');
INSERT INTO `facilities_availed`(`roll_no`, `hostel_id`, `facility_id`) VALUES ('k201754','H303','303');


#Hostel Details

INSERT INTO `hostel_details`(`hostel_id`, `hostel_name`, `address`, `total_rooms`, `base_rent`, `password`) VALUES ('H101','United','Sector 17A','20','13000','81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `hostel_details`(`hostel_id`, `hostel_name`, `address`, `total_rooms`, `base_rent`, `password`) VALUES ('H202','Paradise','Sector 17B','10','7000','81dc9bdb52d04dc20036dbd8313ed055');


#Room Details

INSERT INTO `room_details`(`hostel_id`, `room_no`, `roll_no`) VALUES ('H101','4','k201055');
INSERT INTO `room_details`(`hostel_id`, `room_no`, `roll_no`) VALUES ('H101','4','k201051');
INSERT INTO `room_details`(`hostel_id`, `room_no`, `roll_no`) VALUES ('H202','7','k201754');
INSERT INTO `room_details`(`hostel_id`, `room_no`, `roll_no`) VALUES ('H202','4','k200190');

#Student Details

INSERT INTO `student_details`(`roll_no`, `CNIC`, `first_name`, `last_name`, `hostel_id`, `student_rep`, `phone_no`, `guardian_name`, `address`,`password`) VALUES ('k201055','441055','Mohsin','Shah','H101',NULL,'03353875769','Anwar','Sector 17A','81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `student_details`(`roll_no`, `CNIC`, `first_name`, `last_name`, `hostel_id`, `student_rep`, `phone_no`, `guardian_name`, `address`,`password`) VALUES ('k201051','441051','Ali','Ashber','H101','k201055','03003344667','some_name','Rizvia','81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `student_details`(`roll_no`, `CNIC`, `first_name`, `last_name`, `hostel_id`, `student_rep`, `phone_no`, `guardian_name`, `address`,`password`) VALUES ('k201754','441754','Khuzaima','Khan','H202','k201055','03334567123','some_name','Sector 15B','81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `student_details`(`roll_no`, `CNIC`, `first_name`, `last_name`, `hostel_id`, `student_rep`, `phone_no`, `guardian_name`, `address`,`password`) VALUES ('k200190','440190','Usama','Khan','H202','k201055','03445267312','some_name','Sector 16G','81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `student_details`(`roll_no`, `CNIC`, `first_name`, `last_name`, `hostel_id`, `student_rep`, `phone_no`, `guardian_name`, `address`,`password`) VALUES ('k214577','444577','Anas','Khan','H202','k201055','03356712984','some_name','North Karachi','81dc9bdb52d04dc20036dbd8313ed055');


#FK Constraints

ALTER TABLE student_details 
ADD CONSTRAINT fk_hostel_id_student_details 
FOREIGN KEY (hostel_id) REFERENCES hostel_details(hostel_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE student_details 
ADD CONSTRAINT fk_room_no_student_details 
FOREIGN KEY (room_no) REFERENCES room_details(room_no) ON DELETE CASCADE ON UPDATE CASCADE;

SADD CONSTRAINT sr_student_rep_student_details
FOREIGN KEY (student_rep) REFERENCES student_details(roll_no) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE room_details
ADD CONSTRAINT fk_hostel_id_room_details
FOREIGN KEY (hostel_id) REFERENCES hostel_details(hostel_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE room_details
ADD CONSTRAINT fk_roll_no_room_details
FOREIGN KEY (roll_no) REFERENCES student_details(roll_no) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE facilities_available
ADD CONSTRAINT fk_facility_id_available
FOREIGN KEY (facility_id) REFERENCES facilities(facility_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE facilities_available
ADD CONSTRAINT fk_hostel_id_available
FOREIGN KEY (hostel_id) REFERENCES hostel_details(hostel_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE facilities_availed
ADD CONSTRAINT fk_roll_no_availed
FOREIGN KEY (roll_no) REFERENCES student_details(roll_no) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE facilities_availed
ADD CONSTRAINT fk_hostel_id_availed
FOREIGN KEY (hostel_id) REFERENCES hostel_details(hostel_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE facilities_availed
ADD CONSTRAINT fk_facility_id_availed
FOREIGN KEY (facility_id) REFERENCES facilities(facility_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE accounts
ADD CONSTRAINT fk_roll_no_accounts
FOREIGN KEY (roll_no) REFERENCES student_details(roll_no) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE accounts
ADD CONSTRAINT fk_hostel_id_accounts
FOREIGN KEY (hostel_id) REFERENCES hostel_details(hostel_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE complaints
ADD CONSTRAINT fk_roll_no_complaints
FOREIGN KEY (roll_no) REFERENCES student_details(roll_no) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE complaints
ADD CONSTRAINT fk_hostel_id_complaints
FOREIGN KEY (hostel_id) REFERENCES hostel_details(hostel_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE complaints
ADD CONSTRAINT fk_facility_id_complaints
FOREIGN KEY (facility_id) REFERENCES facilities(facility_id) ON DELETE CASCADE ON UPDATE CASCADE;

#Table Drops

DROP TABLE student_details;
DROP TABLE hostel_details;
DROP TABLE facilities;
DROP TABLE facilities_available;
DROP TABLE facilities_availed;
DROP TABLE accounts;
DROP TABLE room_details;
DROP TABLE complaints;

#END