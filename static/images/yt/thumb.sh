#!/bin/bash

VID="$1"
curl https://i.ytimg.com/vi/$VID/maxresdefault.jpg | convert -quality 70 - "$VID.webp"