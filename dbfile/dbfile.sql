CREATE TABLE CurrentLoc (
    From_ID int NOT NULL AUTO_INCREMENT,
    City_Name varchar(20) NOT NULL,
    Airport_Name varchar(40),
    PRIMARY KEY (From_ID)
);

CREATE TABLE Destination (
    To_ID int NOT NULL AUTO_INCREMENT,
    Dest_City varchar(20) NOT NULL,
    Airport_Name varchar(40),
    PRIMARY KEY (To_ID )
);

CREATE TABLE Register (
    Register_ID int NOT NULL AUTO_INCREMENT,
    User_Name varchar(30) NOT NULL,
    Password varchar(60),
    Email varchar(40),
    PRIMARY KEY (Register_ID)
);




CREATE TABLE TicketDetails (
    Ticket_ID int NOT NULL AUTO_INCREMENT,
    Airline_Name varchar(30) NOT NULL,
    Airline_image varchar(50) DEFAULT NULL,
    From_ID int NOT NULL,
    To_ID int NOT NULL,
    Ticket_Date Date NOT NUll,
    Return_Date Date DEFAULT NULL,
    Depart_Time Time Not Null,
    Arrival_Time Time Not Null,
    Return_Depart_Time Time DEFAULT null,
    Return_Arrival_Time Time Default null,
    Ticket_Type varchar(11) Not Null,
    Economy_Price int Not Null,
    Business_Price int Not Null,
    Discount_Price int Not Null,
    Total_Seats int,
    PRIMARY KEY (Ticket_ID),
    FOREIGN KEY (From_ID) REFERENCES CurrentLoc(From_ID),
    FOREIGN KEY (To_ID) REFERENCES Destiantion(To_ID)
);


CREATE TABLE IssueTicket (
Issue_ID int NOT NULL,
Register_ID int NOT NULL,
Credit_ID int Not Null,
Ticket_ID int Not Null,
Price_Paid int Not NUll,
Reservation_status varchar(20),
Seat_Class varchar(10),
Number_seats int,
PRIMARY KEY (Issue_ID),
FOREIGN KEY (Register_ID) REFERENCES Register(Register_ID),
FOREIGN KEY (Credit_ID) REFERENCES CreditDetails(Credit_ID),
FOREIGN KEY (Ticket_ID) REFERENCES TicketDetails(Ticket_ID)
);


CREATE TABLE TicketCart (
    Cart_ID int NOT NULL AUTO_INCREMENT,
    Customer_ID int NOT NULL,
    Ticket_ID  int Not NULL,
    Session_ID varchar(30) Not Null,
    Trip_Type varchar(12) Not Null,
    Seat_Class varchar(9) Not Null,
    Total_Fare int Not Null,
    PRIMARY KEY (Cart_ID),
    FOREIGN KEY (Ticket_ID) REFERENCES TicketDetails(Ticket_ID),
    FOREIGN KEY (Ticket_ID) REFERENCES Register(Register_ID),
);