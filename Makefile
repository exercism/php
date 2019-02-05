# assignments
ASSIGNMENT ?= ""
IGNOREDIRS := "^(\.git|bin|docs|exercises)$$"
ASSIGNMENTS = $(shell find ./exercises -maxdepth 1 -mindepth 1 -type d | awk -F/ '{print $$NF}' | sort | grep -Ev $(IGNOREDIRS))

# output directories
TMPDIR ?= "/tmp"
OUTDIR := $(shell mktemp -d "$(TMPDIR)/$(ASSIGNMENT).XXXXXXXXXX")

# language specific config (tweakable per language)
FILEEXT := "php"
EXAMPLE := "example.$(FILEEXT)"
TSTFILE := "$(ASSIGNMENT)_test.$(FILEEXT)"

default:
	wget --no-check-certificate https://phar.phpunit.de/phpunit-7.phar -O bin/phpunit.phar
	chmod +x bin/phpunit.phar
	@wget --no-check-certificate https://github.com/squizlabs/PHP_CodeSniffer/releases/download/2.0.0a2/phpcs.phar -O bin/phpcs.phar
	chmod +x bin/phpcs.phar

help: ## Prints this help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

install: ## install development dependencies
	wget --no-check-certificate https://phar.phpunit.de/phpunit-7.phar -O bin/phpunit.phar
	chmod +x bin/phpunit.phar

	@wget --no-check-certificate https://github.com/squizlabs/PHP_CodeSniffer/releases/download/2.0.0a2/phpcs.phar -O bin/phpcs.phar
	chmod +x bin/phpcs.phar

install-test: ## install test dependency: phpunit.phar 
	@wget --no-check-certificate https://phar.phpunit.de/phpunit-7.phar -O bin/phpunit.phar
	chmod +x bin/phpunit.phar

install-style: ## install style checker dependency: phpcs.phar
	@wget --no-check-certificate https://phar.phpunit.de/phpunit-7.phar -O bin/phpcs.phar
	chmod +x bin/phpcs.phar

test-assignment: bin/phpunit.phar ## run single test using ASSIGNMENTS: test-assignment ASSIGNMENT=wordy
	@echo "running tests for: $(ASSIGNMENT)"
	@cat ./exercises/$(ASSIGNMENT)/$(TSTFILE) | sed '/markTestSkipped()/d' > $(OUTDIR)/$(TSTFILE)
	@cp ./exercises/$(ASSIGNMENT)/$(EXAMPLE) $(OUTDIR)/$(ASSIGNMENT).$(FILEEXT)
	@bin/phpunit.phar --no-configuration $(OUTDIR)/$(TSTFILE)

test: ## run all tests
	@for assignment in $(ASSIGNMENTS); do ASSIGNMENT=$$assignment $(MAKE) -s test-assignment || exit 1; done

style-check-assignment: bin/phpcs.phar ## run style check single test using ASSIGNMENTS: style-check-assignment ASSIGNMENT=wordy
	@echo "checking $(ASSIGNMENT) against PHP code standards"
	@bin/phpcs.phar -sp --standard=phpcs-php.xml ./exercises/$(ASSIGNMENT)

style-check: ## run style check all tests
	@for assignment in $(ASSIGNMENTS); do ASSIGNMENT=$$assignment $(MAKE) -s style-check-assignment || exit 1; done

