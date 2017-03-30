## XSS Railroad

Very simple problem where we give you the console output of the adminview.php

All you need to do is inject `<script>console.log(document.cookie)</script>`

This is specifically Reflected XSS attack, where the JavaScript is not stored in the server, but is a part of he url

`example.com?value = <script>console.log(document.cookie)</script>`

Then a headless admin will open up the response, and send back a thank you message with a cookie
