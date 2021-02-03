# assignments
ASSIGNMENT ?= ""
ASSIGNMENTS = $(shell find ./exercises/practice -maxdepth 1 -mindepth 1 -type d | awk -F/ '{print $$NF}' | sort )



# output directories
TMPDIR ?= "/tmp"
OUTDIR := $(shell mktemp -d "$(TMPDIR)/$(ASSIGNMENT).XXXXXXXXXX")

# language specific config (tweakable per language)
FILEEXT := "php"
EXAMPLE := "example.$(FILEEXT)"
TSTFILE := "$(ASSIGNMENT)_test.$(FILEEXT)"


help: ## Prints this help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

install: ## install development dependencies
	$(MAKE) install-test
	$(MAKE) install-style

install-test: ## install test dependency: phpunit-8.phar, phpunit-9.phar
	mkdir -p ./bin
	curl -Lo ./bin/phpunit-8.phar https://phar.phpunit.de/phpunit-8.phar
	chmod +x bin/phpunit-8.phar
	curl -Lo ./bin/phpunit-9.phar https://phar.phpunit.de/phpunit-9.phar
	chmod +x bin/phpunit-9.phar

install-style: ## install style checker dependency: phpcs.phar
	curl -Lo bin/phpcs.phar https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
	chmod +x bin/phpcs.phar

test-assignment: bin/phpunit-8.phar ## run single test using ASSIGNMENTS: test-assignment ASSIGNMENT=wordy
	@echo "running tests for: $(ASSIGNMENT)"
	@cat ./exercises/practice/$(ASSIGNMENT)/$(TSTFILE) | sed '/markTestSkipped()/d' > $(OUTDIR)/$(TSTFILE)
	@cp ./exercises/practice/$(ASSIGNMENT)/$(EXAMPLE) $(OUTDIR)/$(ASSIGNMENT).$(FILEEXT)
	@bin/phpunit-8.phar --no-configuration $(OUTDIR)/$(TSTFILE)

test: ## run all tests
	@for assignment in $(ASSIGNMENTS); do ASSIGNMENT=$$assignment $(MAKE) -s test-assignment || exit 1; done

style-check-assignment: bin/phpcs.phar ## run style check single test using ASSIGNMENTS: style-check-assignment ASSIGNMENT=wordy
	@echo "checking $(ASSIGNMENT) against PHP code standards"
	@bin/phpcs.phar -sp --standard=phpcs-php.xml ./exercises/$(ASSIGNMENT)

style-check: ## run style check all tests
	@for assignment in $(ASSIGNMENTS); do ASSIGNMENT=$$assignment $(MAKE) -s style-check-assignment || exit 1; done

