create database chess_society;
use chess_society;

create table Member (name varchar(15),
                     email varchar(30) primary key,
                     membPsw varchar(15) not null,
                     phone	varchar(15), 
                     maddress varchar(30),
                     dob varchar(12) not null,
                     elo_rating int(8),
                     officer boolean not null);
create table Article (eId INT(3) primary key AUTO_INCREMENT ,
                        title varchar(30) not null,
                      content varchar(300) not null,
                      date_posted DATE not null,
                      expiry TIME not null);
create table Events (eId INT(3) primary key AUTO_INCREMENT ,
                    title varchar(30) not null,
                    location varchar(30),
                    date_posted DATE not null,
                    expiry DATE not null);
create table Tournaments (tId INT(3) primary key AUTO_INCREMENT ,
                         tName varchar(15) not null,
                         tLoc varchar(30) not null,
                         tDate DATE not null);

create table Member_In_Tournament (ID_Member varchar(20),
                                   ID_Tournament varchar(30),
                                   Primary key (ID_Member, ID_Tournament),
                                   Foreign key (ID_Member) references Member(ID_Member) on update cascade on delete cascade,
                                   Foreign key (ID_Tournament) references Tournament(ID_Tournament) on update cascade on delete cascade);

INSERT INTO Member ('name', 'email', 'date_joined', 'membPsw', 'elo_rating', 'officer', 'phone', 'maddress', 'dob') VALUES ('John Officer', 'officer.john@kcl.ac.uk', '14-12-2019', '$2y$10$1Fa/2rcDDl5IwZQpIZFdKub7S3HSb2DVIqfrt.fAhitlIguDYWNoC', '0', '1', NULL, NULL, '1990-10-10')