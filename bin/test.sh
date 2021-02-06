#!/usr/bin/env bash

set -euo pipefail

tmpdir="/tmp"
file_ext="php"

function main {
  all_exercise_dirs=$(find ./exercises -maxdepth 2 -mindepth 2 -type d | sort)
  for exercise_dir in $all_exercise_dirs; do
    test "${exercise_dir}" || true
  done

  return 0
}

function test {
  exercise_dir="${1}"
  exercise=$(basename "${exercise_dir}")
  echo "running tests for: ${exercise}"

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

main "$@"; exit
