#!/usr/bin/env bash

if [[ "$#" != 0 ]]; then
    forwardedParameters=( "$@" )
else
    forwardedParameters=( -o -u -y --docs --filepaths --metadata --tests include )
fi

bin/configlet sync "${forwardedParameters[@]}"
