#!/usr/bin/env bash

scriptDirectory="$( dirname "$0" )"
if [[ "$#" != 0 ]]; then
    forwardedParameters=( "$@" )
else
    forwardedParameters=( -o -u -y --docs --filepaths --metadata --tests include )
fi

exitWithFailure() {
    echo "$1"
    exit 1
}

isPracticeExercise() {
    [ -d "exercises/practice/$1" ]
}

reportUnknownExercise() {
    echo "Unknown practice exercise: $1"
}

isNoPracticeExercise() {
    isPracticeExercise "$1" || {
        reportUnknownExercise "$1"
        return 0
    }
    return 1
}

reportRepeatedExercise() {
    echo "Repeated exercise slug: $1"
}

syncPracticeExercise() {
    local exerciseSlug="$1"

    bin/configlet sync -v q -e "$exerciseSlug" "${forwardedParameters[@]}"
}

main() {
    local -A uniqueSlugs=()
    local -a exerciseSlugs
    local exerciseSlug

    # Refresh 'problem-spec' cache once
    bin/configlet info || exitWithFailure "configlet not ready to run offline"

    mapfile -t exerciseSlugs < "$scriptDirectory/auto-sync.txt"

    for exerciseSlug in "${exerciseSlugs[@]}"; do
        if [[ "${uniqueSlugs[$exerciseSlug]}" == "set" ]]; then
            reportRepeatedExercise "$exerciseSlug"
        else
            uniqueSlugs[$exerciseSlug]="set"
            isNoPracticeExercise "${exerciseSlug}" && continue
            syncPracticeExercise "${exerciseSlug}"
        fi
    done
}

main
