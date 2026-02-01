#!/bin/bash

if [ -s "$1"];then
  	echo "Message de commit vide."
  else
  	git add .
  	git commit -m "$1"
  	git push
fi