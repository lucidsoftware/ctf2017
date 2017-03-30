## Who's There?
### This pcap file contains the flag, which was taken off of a service on port 8123 ([your_team_server]:8123). However, it's encrypted, and you don't have the key.

- The problem description explains that you are looking for traffic on port 8123.
- Filter for the two addresses involved in that communication.
- You will see that initially, traffic on that port was blocked, but after the client makes SYN requests to three unrelated ports, he can suddenly access the port.
- This is termed a secret hand-shake, or more commonly, `Port Knocking` (hence the title, "Who's There?").

- Knowing the ports that were knocked, the client can then perform SYN calls at those same ports, and then `telnet` / `ncat` / whatever to the port `8123` to request the flag.
- The flag is:```UmTVgYTfOb45```
