## Hey, Look! I Created a Secure Login.
### Daniel's secret flag is stored as an article in the site. Steal Daniel's Flag by logging into his account.

1. We navigate to the articles website at http://server-ip/article. We are greeted by a form with two fields username and password. From the clue, we know that the username is : Daniel.
2. We don't know about the password. Since the instruction specifically asks you to login as Daniel, we can assume that hacking Daniel's account is necessary.
3. There are two simple ways to hack into Daniel's account.
 - Guess the password
 - SQL Injection
4. Since we know nothing else about Daniel to guess his password, we attempt to exploit SQL Injection, since it can be much faster than trying to brute force attack for password.
5. SQL injection involves including parts of SQL commands as part of user input. Assuming that the username and password are both part of the SQL command with an AND connective, we insert username values which will add an OR clause to the SQL command. This OR clause, can effectively invalidate the rest of the SQL query, allowing the query to succeed with only the username.
6. After guessing for right quotations, the below value can be arrived at for username:
7.
```
  Daniel' OR '1'='0
```
8. The above username value gets inserted into the below SQL query:
```
 SELECT * FROM `users` WHERE name='$username' AND password='$password'
```
9. Once the correct username is entered, you can login as Daniel and you will be presented with the flag:
```
rFEuoS6a8wjNwV4q1kp8
```
