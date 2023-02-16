CREATE TABLE Memeber(
	Member_ID INT(255) NOT NULL,
	status  BOOLEAN DEFAULT FALSE,
	forename  VARCHAR(255) NOT NULL,
	surname VARCHAR(255) NOT NULL,
	score  INT(255) NOT NULL,
	PRIMARY KEY (Member_ID)
);
CREATE TABLE QUIZtable(
	Member_ID INT(255) NOT NULL,
	QuizID INT (255) NOT NULL,
	Quizduration INT(255),
	Quizname VARCHAR(255) NOT NULL,
	Quizauthor  VARCHAR(255) NOT NULL,
	Quizavailable  BOOLEAN  DEFAULT FALSE NOT NULL,
	Quizdateofattempt date NOT NULL,
	PRIMARY KEY (Member_ID,QuizID), 
	FOREIGN KEY (Member_ID) REFERENCES Memeber(Member_ID),
	KEY QuizID_index (QuizID)
);
CREATE TABLE QUIZdetail(
	QuizID INT (255) NOT NULL,
	QuizQuestion VARCHAR(255) NOT NULL,
	QuizAnswer INT (10) NOT NULL,
	PRIMARY KEY (QuizID,QuizQuestion),
	FOREIGN KEY (QuizID) REFERENCES QUIZtable(QuizID),
	KEY QuizQuestion_index (QuizQuestion)
);
CREATE TABLE QUIZQuestionoption(
	QuizID INT (255) NOT NULL,
	QuizQuestion VARCHAR(255) NOT NULL,
	Quizoption INT (10) NOT NULL,
	PRIMARY KEY (QuizID,QuizQuestion),
    FOREIGN KEY (QuizID) REFERENCES QUIZdetail(QuizID),
    FOREIGN KEY (QuizQuestion)  REFERENCES QUIZdetail(QuizQuestion)
);