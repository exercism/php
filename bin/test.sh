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

  # The time-limit `54` is based on an approximation of the performance.
  # Online Test Runner is appr. 3x faster than GitHub CI on Ubuntu.
  #
  # The total runtime limit of the Online Test Runner is 20 seconds including
  # Docker container launch and processing the results. That leaves appr. 18
  # seconds for all tests of an exercise.
  #
  # Putting that together gives a max. of 18 seconds x3 = 54 seconds for any
  # test class in CI.
  # See: https://forum.exercism.org/t/test-tracks-for-the-20-seconds-limit-on-test-runners/10536/8
  timeout 54s "${PHPUNIT_BIN}" --no-configuration "${outdir}/${test_file}"
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
