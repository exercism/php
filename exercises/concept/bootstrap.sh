#!/usr/bin/env bash

set -xeuo pipefail

new_slug="${1}"
new_classname="${2}"
author="${3}"

if [[ "$(basename "$(pwd)")" != "concept" ]]; then
  echo "run from the concept dir"
  exit 1
fi

base_dir="${new_slug}"
mkdir "${base_dir}"
docs_dir=".docs"
mkdir -p "${base_dir}/${docs_dir}"
meta_dir=".meta"
mkdir -p "${base_dir}/${meta_dir}"

solution_file="${new_classname}.php"
test_file="${new_classname}Test.php"

touch "${base_dir}/${solution_file}"
touch "${base_dir}/${test_file}"

hints_doc="${docs_dir}/hints.md"
instructions_doc="${docs_dir}/instructions.md"
introduction_doc="${docs_dir}/introduction.md"
introduction_doc_tpl="${docs_dir}/introduction.md.tpl"

touch "${base_dir}/${hints_doc}"
touch "${base_dir}/${instructions_doc}"
touch "${base_dir}/${introduction_doc}"
touch "${base_dir}/${introduction_doc_tpl}"

config_json="${meta_dir}/config.json"
design_doc="${meta_dir}/design.md"
exemplar_file="${meta_dir}/exemplar.php"

touch "${base_dir}/${config_json}"
touch "${base_dir}/${design_doc}"
touch "${base_dir}/${exemplar_file}"

jo -p \
  author=$(jo -a "${author}") \
  contributors=$(jo -a < /dev/null) \
  files=$(jo \
    solution=$(jo -a "${solution_file}") \
    test=$(jo -a "${test_file}") \
    exemplar=$(jo -a "${exemplar_file}")
  ) \
  language_version=">=8.1" \
  blurb="Learn about ____" >> "${base_dir}/${config_json}"

cat <<- PHP_STUB >> "${base_dir}/${solution_file}"
  <?php

  class ${new_classname}
  {
      public function stub()
      {
          throw new \BadFunctionCallException("Implement the function");
      }
  }
PHP_STUB

cat <<- PHP_STUB >> "${base_dir}/${test_file}"
  <?php

  class ${new_classname}Test extends PHPUnit\Framework\TestCase
  {
      public function testStub()
      {
          throw new \BadFunctionCallException("Implement the function");
      }
  }
PHP_STUB
