## Scenic Break
### Pay no attention to the flag at the end of the picture/file

#### Hint: Just take in this nice picture. *sigh* Isn't that nice? Also, there is almost certainly not a flag hidden somewhere in it.

- There is a `gzipped` flag at the end of the JPEG image.
- You can find it by analyzing the file with tools for analyzing files (e.g. `binwalk`).
- Then, `gunzip` the file.
- The flag is:```GHQPFIJEDDDDGGGGGGGGGGGJJJLJKJLNJK```
