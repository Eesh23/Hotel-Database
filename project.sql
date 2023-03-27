SET search_path = "project"

CREATE TABLE HotelChain (
	HotelChainName VARCHAR(50),
	CentralOffice VARCHAR(50),
	NumberOfHotel INTEGER,
	PhoneNumber BIGINT,
	Email VARCHAR(50),
	PRIMARY KEY (HotelChainName)
); 

INSERT INTO HotelChain Values
('Holiday Inn', '1918 Angie Drive', 8, 2029182132, 'chuppay@karbonaielite.com'),
('Sheraton', '1721 Peaceful Lane', 8, 2053517964, 'zhenya230783@comohacer.club'),
('Four Seasons', '2462 Tanglewood Road', 8, 5056988019, 'benox225@beanlignt.com'),
('Hilton', '1938 Kuhl Avenue', 8, 4064791128, 'rknight1@welprems.xyz'),
('Best Western', '295 Park Avenue', 8, 2144649827, 'jujubamantovani@kayatv.net');


UPDATE HotelChain 
SET hotelchainname='Best Western'
WHERE centraloffice='295 Park Avenue';

CREATE TABLE Hotel (
	Rating INTEGER,
	NumberOfRooms INTEGER,
	Address VARCHAR(50),
	Email VARCHAR(50),
	PhoneNumber BIGINT,
	Manager BOOLEAN,
	PRIMARY KEY (Address)
);

CREATE TABLE Customer (
	RegistrationDate DATE,
	FullName VARCHAR (100),
	Email VARCHAR(50),
	SIN INTEGER,
	PRIMARY KEY (SIN)
);

CREATE TABLE Employee (
	FullName VARCHAR (100),
	Positon VARCHAR(50),
	Address VARCHAR(50),
	SIN INTEGER,
	PRIMARY KEY (SIN)
);

CREATE TABLE Booking (
	Hotel VARCHAR (50),
	Room INTEGER,
	BookingDate DATE,
	RentingDate Date,
	DepartureDate Date,
	Status Boolean,
	BookingID INTEGER,
	Paid Boolean,
	PRIMARY KEY (BookingID)
);

CREATE TABLE Rooms (
	Price INTEGER,
	Amenities VARCHAR (100),
	Capacity INTEGER,
	ViewType VARCHAR (25),
	CanBeExtended Boolean,
	Problems VARCHAR (200),
	Hotel VARCHAR (50),
	Room INTEGER,
	PRIMARY KEY (Hotel,Room)
);

CREATE INDEX booking_date ON Booking (BookingDate, RentingDate);
CREATE INDEX room_price ON Rooms (Price);
CREATE INDEX hotelchain_phone ON HotelChain (PhoneNumber);









