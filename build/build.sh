#!/bin/bash
files=$(shopt -s nullglob dotglob; echo generated/*)
if (( ${#files} ))
then
  rm generated/*
fi
php build.php
files=$(shopt -s nullglob dotglob; echo generated/*)
if (( ${#files} ))
then
  for f in generated/*; do
    tidy -config tidy.config.txt $f > ../public_html/${f##*/}
  done
fi
curl -sLO https://github.com/tailwindlabs/tailwindcss/releases/latest/download/tailwindcss-linux-x64
chmod +x tailwindcss-linux-x64
./tailwindcss-linux-x64 -i ../public_html/css/index.css -o ../public_html/css/tw.min.css --minify