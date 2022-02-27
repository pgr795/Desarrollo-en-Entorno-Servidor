select * from customer;
+-------------+------------+-----------+-------------------------------------+--------+
| customer_id | first_name | last_name | email                               | active |
+-------------+------------+-----------+-------------------------------------+--------+
|           1 | MARY       | SMITH     | MARY.SMITH@sakilacustomer.org       |      1 |
|           2 | PATRICIA   | JOHNSON   | PATRICIA.JOHNSON@sakilacustomer.org |      1 |
|           3 | LINDA      | WILLIAMS  | LINDA.WILLIAMS@sakilacustomer.org   |      1 |
|           4 | BARBARA    | JONES     | BARBARA.JONES@sakilacustomer.org    |      1 |
|           5 | ELIZABETH  | BROWN     | ELIZABETH.BROWN@sakilacustomer.org  |      1 |
|           6 | JENNIFER   | DAVIS     | JENNIFER.DAVIS@sakilacustomer.org   |      1 |
|           7 | MARIA      | MILLER    | MARIA.MILLER@sakilacustomer.org     |      1 |
|           8 | SUSAN      | WILSON    | SUSAN.WILSON@sakilacustomer.org     |      1 |
|           9 | MARGARET   | MOORE     | MARGARET.MOORE@sakilacustomer.org   |      0 |
|          10 | DOROTHY    | TAYLOR    | DOROTHY.TAYLOR@sakilacustomer.org   |      0 |
+-------------+------------+-----------+-------------------------------------+--------+
10 rows in set (0.02 sec)

SELECT customer_id,first_name,last_name,email FROM customer WHERE email = 'MARY.SMITH@sakilacustomer.org' AND 
										concat(last_name,first_name) = 'SMITHMARY' AND active = 1
										
										
SMITHMARY