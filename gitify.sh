#!/bin/bash
if [ `head -n 1 ./.gitify` == "#gitifycut" ]; then
  `mv ./.gitify ./.gitify.cut && mv ./.gitify.full ./.gitify`
  echo ".gitify FULL is active now"
elif [ `head -n 1 ./.gitify` == "#gitifyfull" ]; then
  `mv ./.gitify ./.gitify.full && mv ./.gitify.cut ./.gitify`
  echo ".gitify CUT is active now"
fi
