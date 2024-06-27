#!/bin/bash
rm generated/*
php build.php
for f in generated/*; do
  echo "Processing $f file..."
  echo "${f##*/}"
  tidy -config tidy.config.txt $f > ../public_html/${f##*/}
done
curl -sLO https://github.com/tailwindlabs/tailwindcss/releases/latest/download/tailwindcss-linux-x64
chmod +x tailwindcss-linux-x64
# ./tailwindcss-linux-x64 -o ../public_html/css/tw.css
./tailwindcss-linux-x64 -i ../public_html/css/index.css -o ../public_html/css/tw.min.css --minify