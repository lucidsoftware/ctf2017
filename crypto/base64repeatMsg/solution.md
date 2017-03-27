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