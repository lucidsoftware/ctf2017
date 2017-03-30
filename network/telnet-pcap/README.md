## Not the Best Encryption
### When Old-School is Really Not Cool. What were the credentials?

1. The first clue resides in the attachment. The file has an extension `.pcap` which can be opened using wireshark.
2. Now you have .pcap file opened in wireshark. What's next ? We are looking for some credentials. Go to `Edit` -> `Find Packet...` Search for `password` in `Packet Bytes` by `String`. This search will take you to a Telnet Packet. As we know that Telnet sends credentials in plaintext over the wire, I follow that TCP session by right-clicking on the packet and selecting `Follow TCP Stream`.
3. The whole TCP session is now displayed where the password of user `kenobi34rocks` is revealed as
```
lewstherin is not hero of ages
```
