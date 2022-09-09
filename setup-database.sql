CREATE TABLE activities (
  activity varchar(30),
  rating integer,
  timesRated integer,
  PRIMARY KEY (activity)
);

INSERT INTO activities VALUES ('Go to the mall', 23, 7);
INSERT INTO activities VALUES ('Go to the beach', 4, 1);
INSERT INTO activities VALUES ('Go to the supermarket', 12, 3);
INSERT INTO activities VALUES ('Drink water', 14, 4);
INSERT INTO activities VALUES ('Call a friend', 10, 2);
INSERT INTO activities VALUES ('Play a game', 10, 2);