-- FOR A FRESH OR TEST DATABASE ONLY. Do not run this against a database you already use.
-- Tables are reconstructed from the queries in the PHP pages, not exported from an existing database.
-- Review column types before relying on them.
CREATE DATABASE IF NOT EXISTS competitiondb CHARACTER SET utf8mb4;
USE competitiondb;

CREATE TABLE IF NOT EXISTS registrations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(100) NOT NULL,
  second_name VARCHAR(100),
  email VARCHAR(255) NOT NULL UNIQUE,
  phone VARCHAR(30),
  password VARCHAR(255) NOT NULL,  -- stores a password_hash() value (60+ chars). Keep at 255.
  group_or_single VARCHAR(10) NOT NULL
);
CREATE TABLE IF NOT EXISTS Teams (TeamID INT AUTO_INCREMENT PRIMARY KEY, TeamName VARCHAR(150) NOT NULL);
CREATE TABLE IF NOT EXISTS TeamMembers (
  id INT AUTO_INCREMENT PRIMARY KEY, TeamID INT NOT NULL, MemberName VARCHAR(150) NOT NULL,
  FOREIGN KEY (TeamID) REFERENCES Teams(TeamID)
);
CREATE TABLE IF NOT EXISTS history_results (id INT AUTO_INCREMENT PRIMARY KEY, participant_name VARCHAR(150) NOT NULL, score INT NOT NULL);
CREATE TABLE IF NOT EXISTS MathQuizParticipants (id INT AUTO_INCREMENT PRIMARY KEY, ParticipantName VARCHAR(150) NOT NULL, Score INT NOT NULL, Result VARCHAR(10) NOT NULL);
CREATE TABLE IF NOT EXISTS information_result (
  id INT AUTO_INCREMENT PRIMARY KEY, participant_name VARCHAR(150) NOT NULL, score INT NOT NULL,
  total_questions INT NOT NULL, passed TINYINT(1) NOT NULL, failed TINYINT(1) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS entership (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(150) NOT NULL, score INT, passed TINYINT(1));
CREATE TABLE IF NOT EXISTS programmingquizresults (
  id INT AUTO_INCREMENT PRIMARY KEY, participant_name VARCHAR(150) NOT NULL,
  correct_answers INT NOT NULL, total_questions INT NOT NULL, passed TINYINT(1) NOT NULL
);
