package src;

import java.sql.*;

public class Main {
    public static void main(String[] args) throws SQLException {

        // Make sure you have the correct url, user and password
        Connection db = DriverManager.getConnection("jdbc:postgresql://localhost:5432/postgres",
                "postgres", "admin");


        // Creating Database if not already created
        db.createStatement().execute("CREATE SCHEMA IF NOT EXISTS hoteldb AUTHORIZATION postgres;");


        // Set search path
        db.createStatement().execute("SET search_path TO hoteldb");

        String tables =
                "CREATE TABLE IF NOT EXISTS HotelChain (\n" +
                        "\tHotelChainName VARCHAR(50),\n" +
                        "\tCentralOffice VARCHAR(50),\n" +
                        "\tNumberOfHotel INTEGER,\n" +
                        "\tPhoneNumber BIGINT,\n" +
                        "\tEmail VARCHAR(50),\n" +
                        "\tPRIMARY KEY (HotelChainName)\n" +
                        ");" +
                        "CREATE TABLE IF NOT EXISTS Hotel (\n" +
                        "\tRating INTEGER,\n" +
                        "\tNumberOfRooms INTEGER,\n" +
                        "\tAddress VARCHAR(50),\n" +
                        "\tEmail VARCHAR(50),\n" +
                        "\tPhoneNumber BIGINT,\n" +
                        "\tManager BOOLEAN,\n" +
                        "\tPRIMARY KEY (Address)\n" +
                        ");\n" +
                        "\n" +
                        "CREATE TABLE IF NOT EXISTS Customer (\n" +
                        "\tRegistrationDate DATE,\n" +
                        "\tFullName VARCHAR (100),\n" +
                        "\tEmail VARCHAR(50),\n" +
                        "\tSIN INTEGER,\n" +
                        "\tPRIMARY KEY (SIN)\n" +
                        ");\n" +
                        "\n" +
                        "CREATE TABLE IF NOT EXISTS Employee (\n" +
                        "\tFullName VARCHAR (100),\n" +
                        "\tPositon VARCHAR(50),\n" +
                        "\tAddress VARCHAR(50),\n" +
                        "\tSIN INTEGER,\n" +
                        "\tPRIMARY KEY (SIN)\n" +
                        ");\n" +
                        "\n" +
                        "CREATE TABLE IF NOT EXISTS Booking (\n" +
                        "\tHotel VARCHAR (50),\n" +
                        "\tRoom INTEGER,\n" +
                        "\tBookingDate DATE,\n" +
                        "\tRentingDate Date,\n" +
                        "\tDepartureDate Date,\n" +
                        "\tStatus Boolean,\n" +
                        "\tBookingID INTEGER,\n" +
                        "\tPaid Boolean,\n" +
                        "\tPRIMARY KEY (BookingID)\n" +
                        ");\n" +
                        "\n" +
                        "CREATE TABLE IF NOT EXISTS Rooms (\n" +
                        "\tPrice INTEGER,\n" +
                        "\tAmenities VARCHAR (100),\n" +
                        "\tCapacity INTEGER,\n" +
                        "\tViewType VARCHAR (25),\n" +
                        "\tCanBeExtended Boolean,\n" +
                        "\tProblems VARCHAR (200),\n" +
                        "\tHotel VARCHAR (50),\n" +
                        "\tRoom INTEGER,\n" +
                        "\tPRIMARY KEY (Hotel,Room))";

        // Creating tables
        db.createStatement().execute(tables);

        // Populating Database

        String hotelchains = "INSERT INTO HotelChain VALUES\n" +
                "('Holiday Inn', '1918 Angie Drive', 8, 2029182132, 'chuppay@karbonaielite.com'),\n" +
                "('Sheraton', '1721 Peaceful Lane', 8, 2053517964, 'zhenya230783@comohacer.club'),\n" +
                "('Four Seasons', '2462 Tanglewood Road', 8, 5056988019, 'benox225@beanlignt.com'),\n" +
                "('Hilton', '1938 Kuhl Avenue', 8, 4064791128, 'rknight1@welprems.xyz'),\n" +
                "('Best Western', '295 Park Avenue', 8, 2144649827, 'jujubamantovani@kayatv.net') ON CONFLICT (hotelchainname) DO NOTHING";

        db.createStatement().execute(hotelchains);

        // Select all hotel chains
        String queryAllHotelChains = "SELECT * FROM hotelchain";

        ResultSet rs = db.createStatement().executeQuery(queryAllHotelChains);
        while (rs.next())
        {
            System.out.print("Column 1 returned: ");
            System.out.println(rs.getString(1));
        }

        System.out.println("Hello world!");
    }
}