CREATE TABLE IF NOT EXISTS activities (
  activity varchar(30) NOT NULL,
  rating integer,
  timesRated integer,
  averageRating decimal(65,2),
  PRIMARY KEY (activity)
);

INSERT INTO activities VALUES ('Go to the mall', 23, 7, 23/7);
INSERT INTO activities VALUES ('Go to the beach', 4, 1, 4/1);
INSERT INTO activities VALUES ('Go to the supermarket', 12, 3, 12/3);
INSERT INTO activities VALUES ('Drink water', 14, 4, 14/4);
INSERT INTO activities VALUES ('Call a friend', 10, 2, 10/2);
INSERT INTO activities VALUES ('Play a game', 10, 2, 10/2);

CREATE TABLE IF NOT EXISTS admin(
	  username VARCHAR(10) NOT NULL,
    passwd varchar(10) NOT NULL,

    PRIMARY KEY (username)
);

INSERT INTO admin VALUES ('root','root');