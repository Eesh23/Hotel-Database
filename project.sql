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

ALTER TABLE Hotel
ADD COLUMN HotelName VARCHAR(50);

ALTER TABLE Hotel
    ADD FOREIGN KEY (HotelName) REFERENCES HotelChain (HotelChainName);
	
UPDATE Hotel 
SET hotelname='Four Seasons'
WHERE email='romanyakonyuk@gmailvn.net';

INSERT INTO Hotel Values
--(4, 5, 'Nashville', 'romanyakonyuk@gmailvn.net', 203-490-6741, '0'),
(1, 5, 'Vancouver', 'ptrzcinski1979@medan4d.top', 5053113372, '0', 'Four Seasons'),
(3, 5, 'Orlando', 'craxcute@srtchaplaincyofcanada.com', 2022276716, '1', 'Four Seasons' ),
(2, 5, 'Los Angeles', 'gikeman@emvil.com', 2539430869, '0', 'Four Seasons' ),
(4, 5, 'Toronto', 'dghaile62@scatterteam.com', 5059412509, '1', 'Four Seasons' ),
(5, 5, 'Montreal', 'steverbeech@email-temp.com', 5054244324, '1', 'Four Seasons' ),
(3, 5, 'Houston', 'prokhoryul@email-temp.com', 2293057919, '1', 'Four Seasons' ),
(4, 5, 'Seattle', 'kotikmyrmotik@adios.email', 2208791014, '1', 'Four Seasons' ),
(4, 5, 'Nashville', 'shahriarkhaksar@acidlsdshop.com', 5056461946, '1', 'Holiday Inn'),
(3, 5, 'Vancouver', 'joywuchun@hotmail.red', 2066018462, '1', 'Holiday Inn'),
(4, 5, 'Orlando', 'nuttyisnice1@wantwp.com', 5056464610, '1', 'Holiday Inn' ),
(4, 5, 'Los Angeles', 'conoverdr1@pow-pows.com', 5054249487, '1', 'Holiday Inn' ),
(3, 5, 'Toronto', 'juelwel@greendike.com', 3178518418, '1', 'Holiday Inn' ),
(3, 5, 'Montreal', 'fred80@lordmoha.cloud', 2232717970, '1', 'Holiday Inn' ),
(3, 5, 'Houston', 'b7bk2oy4ever@aquarianageastrology.com', 2284251052, '1', 'Holiday Inn' ),
(3, 5, 'Seattle', 'mallik007@beanlignt.com', 5056444970, '1', 'Holiday Inn' ),
(4, 5, 'Nashville', 'novopol91@fickdate-lamou.de', 2205103303, '1', 'Hilton'),
(5, 5, 'Vancouver', 'mixalli@cashbackr.com', 5056467886, '1', 'Hilton'),
(5, 5, 'Orlando', 'andreas14@polyfox.xyz', 3079790375, '1', 'Hilton'),
(5, 5, 'Los Angeles', 'mellander@usawisconsinnewyear.com', 5059981783, '1', 'Hilton'),
(5, 5, 'Toronto', 'avatrar@topatudo.tk', 2102751177, '1', 'Hilton'),
(5, 5, 'Montreal', 'joelt@ctasprem.pro', 3479372059, '1', 'Hilton'),
(4, 5, 'Houston', 'sschooler@yowinbet.info', 2127011922, '1', 'Hilton'),
(4, 5, 'Seattle', 'gulrax@myfreeserver.download', 5056443097, '1', 'Hilton'),
(3, 5, 'Nashville', 'rodri2682@googl.win', 2283889612, '0', 'Best Western'),
(3, 5, 'Vancouver', 'horsecat@hotmail.red', 5057873274, '1', 'Best Western'),
(3, 5, 'Orlando', 'andrez77@wexcc.com', 2033711205, '1', 'Best Western'),
(3, 5, 'Los Angeles', '428cobra@crossfitcoastal.com', 5056448849, '1', 'Best Western'),
(3, 5, 'Toronto', 'valerarinas@pianoxltd.com', 2093836769, '1', 'Best Western'),
(3, 5, 'Montreal', 'karljohnson14@pickuplanet.com', 3133988948, '1', 'Best Western'),
(3, 5, 'Houston', 'nyusikkkk@ciudad-activa.com', 2039377668, '1', 'Best Western'),
(2, 5, 'Seattle', 'efim230474@bycy.xyz', 5057078673, '0', 'Best Western'),
(3, 5, 'Nashville', 'dmac54@shopmizi.com', 202-472-4150, '1', 'Sheraton'),
(4, 5, 'Vancouver', 'deti69aleinikova@wexcc.com', 218-688-7253, '1', 'Sheraton'),
(5, 5, 'Orlando', 'richardanger@searates.info', 505-644-9139, '0', 'Sheraton'),
(3, 5, 'Los Angeles', 'bartkaramba@mailcuk.com', 505-644-1727, '1', 'Sheraton'),
(4, 5, 'Toronto', 'sp3333333sp@hearkn.com', 505-646-9421, '1', 'Sheraton'),
(5, 5, 'Montreal', 'jd3seeker@redaksikabar.com', 505-693-7581, '1', 'Sheraton'),
(3, 5, 'Houston', 'whisky34@chothuevinhomesquan9.com', 331-984-2577, '0', 'Sheraton'),
(4, 5, 'Seattle', 'freshtraxx@mailcuk.com', 505-684-8666, '1', 'Sheraton');

ALTER TABLE hotel DROP CONSTRAINT hotel_pkey;

UPDATE Hotel 
SET PhoneNumber=2024724150
WHERE email='dmac54@shopmizi.com';

UPDATE Hotel 
SET PhoneNumber=2186887253
WHERE email='deti69aleinikova@wexcc.com';

UPDATE Hotel 
SET PhoneNumber=5056848666
WHERE email='freshtraxx@mailcuk.com';

UPDATE Hotel 
SET PhoneNumber=5056449139
WHERE email='richardanger@searates.info';

UPDATE Hotel 
SET PhoneNumber=5056441727
WHERE email='bartkaramba@mailcuk.com';

UPDATE Hotel 
SET PhoneNumber=5056469421
WHERE email='sp3333333sp@hearkn.com';

UPDATE Hotel 
SET PhoneNumber=5056937581
WHERE email='jd3seeker@redaksikabar.com';

UPDATE Hotel 
SET PhoneNumber=3319842577
WHERE email='whisky34@chothuevinhomesquan9.com';

UPDATE Hotel 
SET PhoneNumber=2034906741
WHERE email='romanyakonyuk@gmailvn.net';

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









