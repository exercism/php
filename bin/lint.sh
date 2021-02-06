#!/usr/bin/env bash

set -euo pipefail

function main {
  all_exercise_dirs=$(find ./exercises -maxdepth 2 -mindepth 2 -type d | awk -F/ '{print $NF}' | sort)
  for exercise_dir in $all_exercise_dirs; do
    exercise=$(basename "${exercise_dir}")
    echo "${exercise}"
  done

  return 0
}

function installed {
  cmd=$(command -v "${1}")

  [[ -n "${cmd}" ]] && [[ -f "${cmd}" ]]
  return ${?}
}

function die {
  >&2 echo "Fatal: ${@}"
  exit 1
}

if [[ -z "${PHPCS_BIN:-}" ]]; then
  die "Missing PHPUNIT_BIN environment variable";
fi

if [[ -z "${PHPCS_RULES:-}" ]]; then
  die "Missing PHPCS_RULES environment variable";
fi

if [[ ! -f "${PHPCS_RULES}" ]]; then
  die "PHPCS xml ruleset at '${PHPCS_RULES}' does not exist"
fi

# Check for all required dependencies
deps=(curl "${PHPCS_BIN}")
for dep in "${deps[@]}"; do
  installed "${dep}" || die "Missing '${dep}'"
done

main "$@"; exit
