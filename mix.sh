#! /usr/bin/env bash

if  [ "$#" -lt 3  ]
then
    echo "Missing parameters"
else
    file1="$1"
    file2="$2"
    output="$3"
    filename2=$(basename $2)
    extension="${filename2##*.}"
    newname2=$(date +%s)
    #filename="${filename%.*}"
    #$samplerate=$(sox --i  "${file1}" | grep "Sample Rate" | grep -o "[0-9]*")
    #$numberChannels=$(sox --i  "${file1}" | grep "Channels" | grep -o "[0-9]*")
    samplerate=$(sox --i -r "${file1}")
    numberChannels=$(sox --i -c "${file1}")
    sox $file2 -r ${samplerate} -c $numberChannels /tmp/$newname2.$extension
    sox --buffer 128000 --combine mix $file1 /tmp/$newname2.$extension -C 64.0 $output
    rm /tmp/$newname2.$extension
fi