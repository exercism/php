#!/usr/bin/env bash

set -uo pipefail

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[0;33m'
NC='\033[0m' # No Color

function main {
  has_failures=0

  all_exercise_dirs=$(find ./exercises -maxdepth 2 -mindepth 2 -type d | sort)
  for exercise_dir in $all_exercise_dirs; do
    if [[ "${exercise_dir}" == *"hello-world"* ]]; then
      continue
    fi

    lint "${exercise_dir}"
    if [[ $? -ne 0 ]]; then
      has_failures=1
    fi
  done

  return $has_failures
}

function lint {
  exercise_dir="${1}"
  exercise=$(basename "${exercise_dir}")
  echo -e "Checking ${YELLOW}${exercise}${NC} against PHP code standards"

  eval "${PHPCS_BIN}" \
    -sp \
    --standard="${PHPCS_RULES}" \
    "${exercise_dir}"
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
  die "Missing PHPCS_BIN environment variable";
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

main "$@"

if [[ $? -ne 0 ]]; then
  echo -e "Some checks ${RED}failed${NC}. See log."
  exit 1
fi

exit
