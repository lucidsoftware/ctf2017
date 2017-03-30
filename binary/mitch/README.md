## Binary Challenges


### TODOs

- Setup linux environment
- Change flags (from REPLACEWITHREALFLAG -> ???)
- Test to make sure that the flags can't be accessed by other means
- Disable some basic execution security features (DEP, ASLR) at a system level


#### Environment

- Disable some basic execution security features (DEP, ASLR) at a system level
- Players by default have the user `player`
- `player` user has minimal permissions on the system
- Most challenges have a FLAG.txt


#### Useful tools for participants

- https://github.com/pwndbg/pwndbg
- https://github.com/longld/peda
- https://github.com/hugsy/gef
- strace
- strings
- objdump
- hexdump
- https://github.com/Gallopsled/pwntools#readme


#### General Info

- http://insecure.org/stf/smashstack.html
- https://www.owasp.org/index.php/Buffer_overflow_attack
- http://www.madhur.co.in/blog/2011/08/06/protbufferoverflow.html
