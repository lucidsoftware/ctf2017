## An Easy one
### Chat away with Chatter and Simply ask for the flag to solve this challenge!

1. We navigate to the chatter website at http://server-ip/chatter/. We are greeted with a login form. The credentials are provided as part of the problem.
2. We are presented with easy instructions. We type help. Note that the message we typed has been sent and the response of that message is shown.
3. We are lead to believe that sending the message `readFlag` should give us the flag. Attempting to do so through the text-box, you notice that the message sent out was 'justkidding'.
4. Looking at the HTTP request and Javascript, you can be sure that some Javascript manipulation is preventing you from sending `readflag` message to the back-end.
5. This can be solved using one of several ways. Open-up developer console for Google chrome or any browser that you currently use. Type a message and press `send`. Note the XHR Request being sent out to the server.
  - right-click on the XHR request and choose `Copy` -> `Copy as cURL`. Now, the clipboard has the XHR request that also contains session keys for authentication. In linux terminal, this curl request can be executed with a minor modification of changing `justkidding` to `readflag`. The server yields the flag.
  - Use debugging mode to edit the Javascript and remove pieces of code that modify the message being sent to server. The flag will be found in server's response, after.
6. The flag is:```vxEwJ8WtPLEp5SNsdcrFP8U+YRYW8!```
