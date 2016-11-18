CREATE TABLE oem(
   id 	INTEGER PRIMARY KEY AUTOINCREMENT,
   name	TEXT NOT NULL
);

CREATE TABLE stock(
   id INTEGER PRIMARY KEY   AUTOINCREMENT,
   model		CHAR(50)      NOT NULL,
   oem_id		INT 	NOT NULL,	
   year           INT      NOT NULL,
   warehouse        CHAR(50),
   count         INT NOT NULL DEFAULT 0,
   FOREIGN KEY(oem_id) REFERENCES oem(id)
);

