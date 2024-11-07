CREATE DATABASE dbLucasLoaves;
USE dbLucasLoaves;

CREATE TABLE PRODUCT(
   ProductNumber int NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,ProductName varchar(50) NOT NULL
  ,ProductDescription TEXT NOT NULL
  ,UnitPrice double NOT NULL
  ,ProductImage varchar(100)
);

CREATE TABLE SALESORDER(
   OrderNumber int NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,OrderDate DATETIME /*Consist of order date and order time*/
  ,CustomerFirstname varchar(50) NOT NULL
  ,CustomerLastname varchar(50) NOT NULL
  ,CustomerEmail varchar(100) NOT NULL
  ,CustomerPhone varchar(20) NOT NULL
  ,CreditCardNumber varchar(16) NOT NULL
  ,CardExpiryDate varchar(5) NOT NULL
  ,SecurityCode varchar(10) NOT NULL
  ,PaymentAmount decimal NOT NULL
);

CREATE TABLE ORDERLINE(
   ProductNumber int NOT NULL
  ,FOREIGN KEY (ProductNumber) REFERENCES PRODUCT(ProductNumber)
  ,OrderNumber int NOT NULL
  ,FOREIGN KEY (OrderNumber) REFERENCES SALESORDER(OrderNumber)
  ,PRIMARY KEY (ProductNumber, OrderNumber)
  ,QuantityOrdered int NOT NULL
  ,PickUpDate DATETIME /*Consist of pick up date and pick up time*/
  ,TotalAmount decimal NOT NULL
);

CREATE TABLE JOBPOST(
   PostNumber int NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,JobName varchar(50) NOT NULL
  ,JobDescription TEXT NOT NULL
  ,Salary double NOT NULL
  ,Negotiable ENUM ("yes", "no")
  ,JobStatus ENUM ("Full-time", "Part-time")
);

CREATE TABLE APPLICANT(
   ApplicantNumber int NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,ApplicantFirstname varchar(50) NOT NULL
  ,ApplicantLastname varchar(50) NOT NULL
  ,ApplicantEmail varchar(100) NOT NULL
  ,ApplicantPhone varchar(20) NOT NULL
);

CREATE TABLE APPLICATIONLINE(
   ReferenceNumber int NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,PostNumber int NOT NULL
  ,FOREIGN KEY (PostNumber) REFERENCES JOBPOST(PostNumber)
  ,ApplicantNumber int NOT NULL
  ,FOREIGN KEY (ApplicantNumber) REFERENCES APPLICANT(ApplicantNumber)
  ,Resume varchar(100) NOT NULL
  ,CoverLetter varchar(100)
);

INSERT INTO PRODUCT(ProductName, ProductDescription, UnitPrice, ProductImage)
     VALUES('Sourdough White', 'Our standard sourdough.', 7.00, 'sourdoughWhite.jpg'),
           ('Sourdough Rye', 'Sourdough created with 50% rye flour.', 8.00, 'sourdoughRye.jpg'),
           ('Sourdough Spelt', 'Sourdough created with 100% spelt flour.', 9.00, 'sourdoughSpelt.jpg'),
           ('Sourdough Seeded', 'Sourdough including a mixture of yummy seeds.', 9.50, 'sourdoughSeeded.jpeg'),
           ('Sourdough breadmaking classes', 'First Saturday of every month. 9 am to 5 pm with lunch provided. Learn to make your own bread $350 plus GST.', 350.00, 'sourdoughTest.jpeg');

INSERT INTO JOBPOST(JobName, JobDescription, Salary, Negotiable, JobStatus)
    VALUES ('Baker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem assumenda asperiores ut ', 65000, 'yes', 'Full-time'),
          ('Bakery assistant', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem assumenda asperiores ut ', 65000, 'yes', 'Full-time'),
          ('Pastry cook', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem assumenda asperiores ut ', 65000, 'yes', 'Full-time');

DELIMITER $$
CREATE PROCEDURE deleteOrders()
BEGIN
   CALL deleteOrderLine();
   CALL deleteSalesOrder();
END$$

DELIMITER $$
CREATE PROCEDURE deleteSalesOrder()
BEGIN
DELETE from SALESORDER;
ALTER TABLE SALESORDER AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteOrderLine()
BEGIN
DELETE from ORDERLINE;
ALTER TABLE ORDERLINE AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteApplicant()
BEGIN
DELETE from APPLICANT;
ALTER TABLE APPLICANT AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteApplicationLine()
BEGIN
DELETE from APPLICATIONLINE;
ALTER TABLE APPLICATIONLINE AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteJobApplications()
BEGIN
CALL deleteApplicationLine();
CALL deleteApplicant();
END$$