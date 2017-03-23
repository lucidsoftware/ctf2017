#!/bin/bash

echo "What is black and white and read all over?"
read -e -t 10 answer

if [[ $? == 0 ]]; then
  if [[ ${answer} =~ "newspaper" ]]; then
    echo "Correct. Here's the key: sphinxify-anapolis";
  else
    echo "Incorrect";
  fi
else
  echo "Too slow!";
fi
