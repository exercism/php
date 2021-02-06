#!/usr/bin/env bash

set -uo pipefail

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[0;33m'
NC='\033[0m' # No Color

tmpdir="/tmp"
file_ext="php"

function main {
  has_failures=0

  all_exercise_dirs=$(find ./exercises -maxdepth 2 -mindepth 2 -type d | sort)
  for exercise_dir in $all_exercise_dirs; do
    test "${exercise_dir}"
    if [[ $? -ne 0 ]]; then
      has_failures=1
    fi
  done

  return 1
}

function test {
  exercise_dir="${1}"
  exercise=$(basename "${exercise_dir}")
  echo ""
  echo -e "Running tests for: ${YELLOW}${exercise}${NC}"

  example_file="example.${file_ext}"
  test_file="${exercise}_test.${file_ext}"
  outdir=$(mktemp -d "${tmpdir}/${exercise}.XXXXXXXXXX")

  cat "${exercise_dir}/${test_file}" | sed '/markTestSkipped()/d' > "${outdir}/${test_file}"
  cp "${exercise_dir}/${example_file}" "${outdir}/${exercise}.${file_ext}"
  eval "${PHPUNIT_BIN}" --no-configuration "${outdir}/${test_file}"
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

if [ -z "${PHPUNIT_BIN:-}" ]; then
  die "Missing PHPUNIT_BIN environment variable";
fi

# Check for all required dependencies
deps=(curl "${PHPUNIT_BIN}")
for dep in "${deps[@]}"; do
  installed "${dep}" || die "Missing '${dep}'"
done

main "$@"

if [[ $? -ne 0 ]]; then
  echo ""
  echo -e "Some tests ${RED}failed${NC}. See log."
  exit 1
fi

exit
