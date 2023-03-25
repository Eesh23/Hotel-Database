SET search_path = "project"

CREATE TABLE HotelChain (
	HotelChainName VARCHAR(50),
	CentralOffice VARCHAR(50),
	NumberOfHotel INTEGER,
	PhoneNumber INTEGER,
	Email VARCHAR(50),
	PRIMARY KEY (HotelChainName)
); 

CREATE TABLE Hotel (
	Rating INTEGER,
	NumberOfRooms INTEGER,
	Address VARCHAR(50),
	Email VARCHAR(50),
	PhoneNumber INTEGER,
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
	HotelAndRoom VARCHAR (50),
	BookingDate DATE,
	RentingDate Date,
	DepartureDate Date,
	Status Boolean,
	BookingID INTEGER,
	Paid Boolean,
	PRIMARY KEY (BookingID)
);

ALTER TABLE Booking
RENAME COLUMN HotelAndRoom to Hotel;

ALTER TABLE Booking
ADD Room INTEGER;

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