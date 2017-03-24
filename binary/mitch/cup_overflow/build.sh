#!/bin/bash

gcc -fno-stack-protector -m32 -D_FORTIFY_SOURCE=0 -z execstack -o cup_overflow main.c

cp cup_overflow /home/cup/
chown root:cup /home/cup/cup_overflow
chmod 650 /home/cup/cup_overflow

cp FLAG.txt /home/cup/
chown root:cup /home/cup/FLAG.txt
chmod 650 /home/cup/FLAG.txt

#mkdir -p /opt/cup_filler
#chown root:cup_filler /opt/cup_filler
#chmod 750 /opt/cup_filler
#
#cp FLAG.txt /opt/cup_filler/
#chown root:cup_filler /opt/cup_filler/FLAG.txt
#chmod 650 /opt/cup_filler/FLAG.txt
#
#cp cup_overflow /opt/cup_filler/
#chown root:cup_filler /opt/cup_filler/cup_overflow
#chmod 650 /opt/cup_filler/cup_overflow
#
#cp cupscript.sh /opt/cup_filler/
#chown root:root /opt/cup_filler/cupscript.sh
#chmod 650 /opt/cup_filler/cupscript.sh
