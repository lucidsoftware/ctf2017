#!/usr/bin/env bash

gcc -m32 -D_FORTIFY_SOURCE=0 -o obfus_re main.c

cp obfus_re /home/xordon/
chown root:xordon /home/xordon/obfus_re
chmod 650 /home/xordon/obfus_re

