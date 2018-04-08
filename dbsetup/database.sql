CREATE DATABASE student;

CREATE TABLE user1 (

	id int NOT NULL,
	username varchar(200) NOT NULL,
	stuid varchar(200) NOT NULL,
  stuid2 varchar(200) NOT NULL,
  stuid3 varchar(200) NOT NULL,
  password varchar(200) NOT NULL,
  email varchar(200) NOT NULL,
  gender varchar(200) NOT NULL,
  propic varchar(200) NOT NULL,
  mobile varchar(200) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE USER (

  id int NOT NULL,
	stuname varchar(200) NOT NULL,
	stuclass int NOT NULL,
  stuid varchar(200) NOT NULL,
  dob date NOT NULL,
  feepaid int NOT NULL,
  date1 date NOT NULL,
  feedue int NOT NULL,
  section varchar(200) NOT NULL,
  image varchar(200) NOT NULL,
	PRIMARY KEY (id)
);
