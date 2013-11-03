# ------------------------------------------------------------
# Update values in the table Groups
# ------------------------------------------------------------

LOCK TABLES Groups WRITE;

# ------------------------------------------------------------
# Change group name from Users to Restaurants
# ------------------------------------------------------------
UPDATE Groups
SET group_name='Restaurant'
WHERE group_name='User';

# ------------------------------------------------------------
# Add new group for Customers
# ------------------------------------------------------------
INSERT INTO Groups(id, group_name)
  VALUES (3, 'Customer');

UNLOCK TABLES;



# ------------------------------------------------------------
# Add dummy data to connect user to a group
# ------------------------------------------------------------

LOCK TABLES User_to_Groups WRITE;

INSERT INTO User_to_Groups(user_id, group_id)
  VALUES
    (60,3),
    (48,2);

UNLOCK TABLES;