#!/bin/bash

#Se placer sur la branche cible
git checkout main

#Mettre à jour
git pull origin main

#Fusionner les historiques si besoin
#git merge master --allow-unrelated-histories


#Merger la branche source
git merge master

#Pousser le merge
git push origin main