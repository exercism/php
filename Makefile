ASSIGNMENT ?= ""
IGNOREDIRS := ".git|vendor|bin"
ASSIGNMENTS = $(shell find . -maxdepth 1 -mindepth 1 -type d -not -path '*/\.*' | tr -d './' | sort | grep -Ev $(IGNOREDIRS))

# output directories
TMPDIR ?= "/tmp"
OUTDIR := $(shell mktemp -d "$(TMPDIR)/$(ASSIGNMENT).XXXXXXXXXX")

# language specific config (tweakable per language)
FILEEXT := "php"
EXAMPLE := "Example.$(FILEEXT)"
TSTFILE := "$(ASSIGNMENT)Test.$(FILEEXT)"

phpunit.phar:
	@wget http://phar.phpunit.de/phpunit.phar

# single test
test-assignment: phpunit.phar
	@echo "running tests for: $(ASSIGNMENT)"
	@echo "<?php namespace Exercism\$(ASSIGNMENT); ?>" >> $(OUTDIR)/$(TSTFILE)
	@for class in $(shell ls $(ASSIGNMENT)/*.php | grep -v Test); do \
		echo "<?php require_once '$(CURDIR)/$$class'; ?>" >> $(OUTDIR)/$(TSTFILE); \
	done
	@sed "/namespace Exercism/d" $(ASSIGNMENT)/*Test.$(FILEEXT) >> $(OUTDIR)/$(TSTFILE)
	@php phpunit.phar --no-configuration $(OUTDIR)/$(TSTFILE)

# all tests
test:
	@for assignment in $(ASSIGNMENTS); do ASSIGNMENT=$$assignment $(MAKE) -s test-assignment || exit 1; done

phpcs.phar:
	@wget https://github.com/squizlabs/PHP_CodeSniffer/releases/download/2.0.0a2/phpcs.phar

# style check single test
style-check-assignment: phpcs.phar
	@echo "checking $(ASSIGNMENT) against PSR-2 code standards"
	@php phpcs.phar --standard=PSR2 $(ASSIGNMENT)

# style c heck all tests
style-check:
	@for assignment in $(ASSIGNMENTS); do ASSIGNMENT=$$assignment $(MAKE) -s style-check-assignment || exit 1; done
