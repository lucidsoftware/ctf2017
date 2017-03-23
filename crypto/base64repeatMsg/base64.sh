#!/bin/bash
BASESTR="$(echo " It is a gift. A gift to the foes of Mordor. Why not use this Ring? Long has my father, the steward of Gondor kept the forces of Mordor at bay. By the blood of our people are your lands kept safe. Give Gondor the weapon of the enemy, let us use it against him!" | base64)"
OUTPUT=""
for i in {1..2000}
do
OUTPUT="$BASESTR$OUTPUT"
done
echo $OUTPUT > $1

