# ------------------------------------------------------------
# Create table Customers
# ------------------------------------------------------------
CREATE TABLE Customers (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES Users (id)
  ON DELETE CASCADE
);

# ------------------------------------------------------------
# Add dummy customers data
# ------------------------------------------------------------
LOCK TABLES Users WRITE, Customers WRITE;

INSERT INTO Users (id, username, fullname, email, phone, mobile, password)
  VALUES
  (60, 'kostas', 'Konstantinos Chronis', 'kostas@rocks.com', '911', NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
  (61, 'john', 'Ioannis Pliakis', 'john@rocks.com', '911', NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
  (62, 'dani', 'Daniela Holzner', 'dani@rocks.com', '911', NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
  (63, 'iva', 'Iva Popova', 'iva@rocks.com', '911', NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

INSERT INTO Customers (id, user_id)
  VALUES
  (1, 60),
  (2, 61),
  (3, 62),
  (4, 63);

UNLOCK TABLES;