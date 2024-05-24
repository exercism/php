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

  all_practice_exercise_dirs=$(find ./exercises/practice -maxdepth 1 -mindepth 1 -type d | sort)
  for exercise_dir in $all_practice_exercise_dirs; do
    test "${exercise_dir}" "example"
    if [[ $? -ne 0 ]]; then
      has_failures=1
    fi
  done

  all_concept_exercise_dirs=$(find ./exercises/concept -maxdepth 1 -mindepth 1 -type d | sort)
  for exercise_dir in $all_concept_exercise_dirs; do
    test "${exercise_dir}" "exemplar"
    if [[ $? -ne 0 ]]; then
      has_failures=1
    fi
  done

  return $has_failures
}

function test {
  exercise_dir="${1}"
  exercise=$(basename "${exercise_dir}")
  echo ""
  echo -e "Running tests for: ${YELLOW}${exercise}${NC}"

  example_file_name="${2}"
  example_file="${example_file_name}.${file_ext}"
  test_file_path=$(find "${exercise_dir}" -type f -name "*Test.${file_ext}")
  test_file=$(basename ${test_file_path})
  exercise_file="${test_file%Test.*}"
  outdir=$(mktemp -d "${tmpdir}/${exercise}.XXXXXXXXXX")

  # Copy exercise to temp folder
  cp -r "${exercise_dir}/." "${outdir}"

  # Remove mark skipped declarations
  cat "${exercise_dir}/${test_file}" | sed '/markTestSkipped()/d' > "${outdir}/${test_file}"

  # If the example/exemplar directory exists, overlay contents on solution
  if [[ -d "${exercise_dir}/.meta/${example_file_name}" ]]; then
    cp -r "${exercise_dir}/.meta/${example_file_name}/." "${outdir}"
  else
    cp "${exercise_dir}/.meta/${example_file}" "${outdir}/${exercise_file}.${file_ext}"
  fi

  ${PHPUNIT_BIN} --no-configuration "${outdir}/${test_file}"
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

# `54s` timeout is an approximation to ensure the tests will not timeont in Exercism Test Runner.
#
# 1. Exercism Test Runner is around 3 times faster than GitHub CI on Ubuntu.
#    See: https://forum.exercism.org/t/test-tracks-for-the-20-seconds-limit-on-test-runners/10536/8
# 2. Exercism Test Runner should complete in 20s and involves:
#    - Starting Docker container (~1s)
#    - Running the test suite
#    - Processing the results (~1s)
#
# This gives 18s maximum for the test suite to run in the Exercism Test Runner.
# Hence the test suite should complete in less than 18s x 3 = 54s in GitHub CI on Ubuntu.
[ -f /etc/os-release ] && grep -q "ubuntu" /etc/os-release && {
    echo "Using timeout of 54s for each exercise."
    echo ""
    PHPUNIT_BIN="timeout 54s ${PHPUNIT_BIN}"
}

main "$@"

if [[ $? -ne 0 ]]; then
  echo ""
  echo -e "Some tests ${RED}failed${NC}. See log."
  exit 1
fi

exit
