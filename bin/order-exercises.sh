#!/usr/bin/env bash

# matches ".difficulty, .lowercase_name" in .github/workflows/order-of-practice-exercises.yml

jq '
    .exercises.practice |= (
        map(if .slug == "hello-world" then .difficulty = -1 else . end)
        | sort_by(.difficulty, (.name|ascii_downcase))
        | .[0].difficulty = 1
    )
' config.json > config.sorted && mv config.sorted config.json
