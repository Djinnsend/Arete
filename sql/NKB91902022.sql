DROP DATABASE IF EXISTS NKB91902022;
CREATE DATABASE NKB91902022;
USE NKB91902022;

CREATE TABLE users(
  userID int AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20),
  phoneNum VARCHAR(20),
  userMail varchar(50),
  fname VARCHAR(60),
  lname varchar(60),
  birthDate VARCHAR(30),
  occupation VARCHAR(30),
  user_describe varchar(500)
);

CREATE table userLogin(
  userMail varchar(50) PRIMARY KEY, 
  username varchar(30),
  userPass VARCHAR(50)
);

CREATE table organization(
  organisationID int AUTO_INCREMENT PRIMARY KEY,
  orgName varchar(30),
  orgPhone varchar(20),
  orgAddress varchar(100),
  orgMail varchar(50),
  orgPostal varchar(100),
  orgWebsiteLink VARCHAR(200)
);

CREATE table orgLogin(
  orgMail varchar(50) PRIMARY KEY, 
  orgName varchar(30),
  orgPass VARCHAR(50)
);

CREATE TABLE events(
  eventID int AUTO_INCREMENT,
  host VARCHAR(30),
  title varchar(100) ,
  objective VARCHAR(100) ,
  goal VARCHAR(110) ,
  requirements VARCHAR(100) ,
  location VARCHAR(100) ,
  eventMail varchar(50) ,
  eventReward varchar(100) ,
  accomodation enum("accommodations", "no_accommodations"),
  applicationLink VARCHAR(100),
  eventEndDate VARCHAR(20),
  PRIMARY KEY(eventID)
  -- FOREIGN KEY(eventID) REFERENCES organization(organisationID) ON DELETE RESTRICT ON UPDATE CASCADE,
  -- FOREIGN KEY(eventID) REFERENCES users(userID) ON DELETE RESTRICT ON UPDATE CASCADE
);

INSERT INTO events VALUES ('0','ADMIN','TEST','TEST','TEST','TEST','TEST','TEST','TEST','accomodations','TEST','TEST');


CREATE TABLE requests(
    tableID int AUTO_INCREMENT PRIMARY KEY,
    host VARCHAR(30),
    title varchar(100),
    participantUsername VARCHAR(30)
);

CREATE TABLE participants(
    tableID int AUTO_INCREMENT PRIMARY KEY,
    host VARCHAR(30),
    title varchar(100),
    participantName VARCHAR(30)
);

CREATE TABLE approvals(
    tableID int AUTO_INCREMENT PRIMARY KEY,
    host VARCHAR(30),
    title varchar(100),
    participantName VARCHAR(30)
);

INSERT INTO users  ( userID ,  username , 
 phoneNum ,  userMail ,  fname ,  lname ,  
birthDate ,  occupation ,  user_describe ) VALUES
('1', 'ADMIN', '0244310121', 'admin@admin.com', 
'ADMIN', 'ADMIN', '12th April 2020', 'Student', 'Medical Student');

INSERT INTO requests VALUES ('1','ADMIN','TEST','ADMIN');

