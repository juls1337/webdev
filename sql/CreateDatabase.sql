CREATE DATABASE IF NOT EXISTS webdev;

USE webdev;

CREATE TABLE IF NOT EXISTS books (
  ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY ,
  Title VARCHAR(50) NOT NULL ,
  Author VARCHAR(50) NOT NULL,
  ISBN VARCHAR(10) NOT NULL,
  Category VARCHAR(50),
  LoanID INTEGER
);

CREATE TABLE IF NOT EXISTS member (
  MemberID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY ,
  Firstname VARCHAR(50) NOT NULL,
  Surname VARCHAR(50) NOT NULL,
  Address VARCHAR(50) NOT NULL,
  Phone VARCHAR(50),
  Birth DATE,
  Gender VARCHAR(5),
  Email VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS loans (
  BookID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY ,
  MemberID INTEGER NOT NULL,
  Taken DATE NOT NULL,
  Returned DATE -- nullable
);