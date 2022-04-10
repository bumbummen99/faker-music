#!/usr/bin/env bash

BASEDIR=$(dirname "$0")

find $BASEDIR/data/original -type f -name '*.wav' -exec ffmpeg -y -i {} -vn -ar 44100 -ac 2 -b:a 32k $BASEDIR/data/converted/{}.mp3 \;