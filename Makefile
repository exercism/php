# assignments
EXERCISE ?= ""
EXERCISES = $(shell find ./exercises -maxdepth 2 -mindepth 2 -type d | sort )

# output directories
TMPDIR ?= "/tmp"
OUTDIR := $(shell mktemp -d "$(TMPDIR)/$(EXERCISE).XXXXXXXXXX")

# language specific config (tweakable per language)
FILEEXT := "php"
EXAMPLE := "example.$(FILEEXT)"
TSTFILE := "$(EXERCISE)_test.$(FILEEXT)"

help: ## Prints this help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

install: ## install development dependencies
	$(MAKE) install-phpunit-8
	$(MAKE) install-phpunit-9
	$(MAKE) install-phpcs

install-phpunit-8: ## install test dependency: phpunit-8.phar
	mkdir -p ./bin
	curl -Lo ./bin/phpunit-8.phar https://phar.phpunit.de/phpunit-8.phar
	chmod +x bin/phpunit-8.phar

install-phpunit-9: ## install test dependency: phpunit-9.phar
	mkdir -p ./bin
	curl -Lo ./bin/phpunit-9.phar https://phar.phpunit.de/phpunit-9.phar
	chmod +x bin/phpunit-9.phar

install-phpcs: ## install style checker dependency: phpcs.phar
	curl -Lo bin/phpcs.phar https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
	chmod +x bin/phpcs.phar

test-phpunit-8: bin/phpunit-8.phar ## run single test using EXERCISES: test-exercise EXERCISE=wordy
	@echo "running tests for: $(EXERCISE)"
	@cat $(EXERCISE)/$(TSTFILE) | sed '/markTestSkipped()/d' > $(OUTDIR)/$(TSTFILE)
	@cp $(EXERCISE)/$(EXAMPLE) $(OUTDIR)/$(EXERCISE).$(FILEEXT)
	@bin/phpunit-8.phar --no-configuration $(OUTDIR)/$(TSTFILE)

test-phpunit-9: bin/phpunit-9.phar ## run single test using EXERCISES: test-exercise EXERCISE=wordy
	@echo "running tests for: $(EXERCISE)"
	@cat $(EXERCISE)/$(TSTFILE) | sed '/markTestSkipped()/d' > $(OUTDIR)/$(TSTFILE)
	@cp $(EXERCISE)/$(EXAMPLE) $(OUTDIR)/$$($(EXERCISE).$(FILEEXT)
	@bin/phpunit-9.phar --no-configuration $(OUTDIR)/$(TSTFILE)

test: ## run all tests
ifeq ($(PHPUNIT),9)
	@for exercise in $(EXERCISES); do EXERCISE="$${exercise}" $(MAKE) -s test-phpunit-9 || exit 1; done
else
	@for exercise in $(EXERCISES); do EXERCISE="$${exercise}" $(MAKE) -s test-phpunit-8 || exit 1; done
endif

style-check-psr-2: bin/phpcs.phar
	@echo "checking $(EXERCISE) against PHP code standards"
	@bin/phpcs.phar -sp --standard=phpcs-php.xml ./exercises/practice/$(EXERCISE)

style-check-psr-12: bin/phpcs.phar
	@echo "checking $(EXERCISE) against PHP code standards"
	@bin/phpcs.phar -sp --standard=phpcs-php-psr12.xml ./exercises/practice/$(EXERCISE)

style-check: ## run style check all tests
ifeq ($(PSR),12)
	@for exercise in $(EXERCISES); do EXERCISE=$$exercise $(MAKE) -s style-check-psr-12 || exit 1; done
else
	@for exercise in $(EXERCISES); do EXERCISE=$$exercise $(MAKE) -s style-check-psr-2 || exit 1; done
endif

