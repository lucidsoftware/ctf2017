# Crypto
## For Great Justice
### Take Off Every 'Zig'

1. Quick search in Google for "Take Off Every 'Zig'" yields "All your base are belong to us". There lies Clue-1. The attachment is related to base64 in some way.

2. Looking at the attachment in a text editor, it will be quickly apparent that there is a pattern in the file, i.e., a repeated set of strings throughout the file.

- Copy-Paste some of the text into online tools like http://base64decode.net/.
3. Assuming that the message is likely encoded using base64, try to use base64 decoding on a sample of the text. This can be performed in multiple ways:
- Use `base64 -d -i <string>` in linux.


4. The flag becomes apparent:
 ```
 It is a gift. A gift to the foes of Mordor. Why not use this Ring? Long has my father, the steward of Gondor kept the forces of Mordor at bay. By the blood of our people are your lands kept safe. Give Gondor the weapon of the enemy, let us use it against him!
```

# Network
## Not the Best Encryption
### When Old-School is Really Not Cool. What were the credentials?

1. The first clue resides in the attachment. The file has an extension `.pcap` which can be opened using wireshark.
2. Now you have .pcap file opened in wireshark. What's next ? We are looking for some credentials. Go to `Edit` -> `Find Packet...` Search for `password` in `Packet Bytes` by `String`. This search will take you to a Telnet Packet. As we know that Telnet sends credentials in plaintext over the wire, I follow that TCP session by right-clicking on the packet and selecting `Follow TCP Stream`.
3. The whole TCP session is now displayed where the password of user `kenobi34rocks` is revealed as
```
lewstherin is not hero of ages
```

# Web
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
9. Once the correct username is entered, you can login as Daniel and you will be presented with the flag.

# Web
## An Easy one
### Chat away with Chatter and Simply ask for the flag to solve this challenge!

1. We navigate to the chatter website at http://server-ip/chatter/. We are greeted with a login form. The credentials are provided as part of the problem.
2. We are presented with easy instructions. We type help. Note that the message we typed has been sent and the response of that message is shown.
3. We are lead to believe that sending the message `readFlag` should give us the flag. Attempting to do so through the text-box, you notice that the message sent out was 'justkidding'.
4. Looking at the HTTP request and Javascript, you can be sure that some Javascript manipulation is preventing you from sending `readflag` message to the back-end.
5. This can be solved using one of several ways. Open-up developer console for Google chrome or any browser that you currently use. Type a message and press `send`. Note the XHR Request being sent out to the server.
  - right-click on the XHR request and choose `Copy` -> `Copy as cURL`. Now, the clipboard has the XHR request that also contains session keys for authentication. In linux terminal, this curl request can be executed with a minor modification of changing `justkidding` to `readflag`. The server yields the flag.
  - Use debugging mode to edit the Javascript and remove pieces of code that modify the message being sent to server. The flag will be found in server's response, after.
