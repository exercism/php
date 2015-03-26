# assignments
ASSIGNMENT ?= ""
IGNOREDIRS := "^(\.git|bin)$$"
ASSIGNMENTS = $(shell find . -maxdepth 1 -mindepth 1 -type d | awk -F/ '{print $$NF}' | sort | grep -Ev $(IGNOREDIRS))

# output directories
TMPDIR ?= "/tmp"
OUTDIR := $(shell mktemp -d "$(TMPDIR)/$(ASSIGNMENT).XXXXXXXXXX")

# language specific config (tweakable per language)
FILEEXT := "php"
EXAMPLE := "example.$(FILEEXT)"
TSTFILE := "$(ASSIGNMENT)_test.$(FILEEXT)"

# development dependencies
bin/phpunit.phar:
	@wget --no-check-certificate https://phar.phpunit.de/phpunit.phar -O $@
	chmod +x $@

bin/phpcs.phar:
	@wget --no-check-certificate https://github.com/squizlabs/PHP_CodeSniffer/releases/download/2.0.0a2/phpcs.phar -O $@
	chmod +x $@

# single test
test-assignment: bin/phpunit.phar
	@echo "running tests for: $(ASSIGNMENT)"
	@cat $(ASSIGNMENT)/$(TSTFILE) | sed '/markTestSkipped()/d' > $(OUTDIR)/$(TSTFILE)
	@cp $(ASSIGNMENT)/$(EXAMPLE) $(OUTDIR)/$(ASSIGNMENT).$(FILEEXT)
	@bin/phpunit.phar --no-configuration $(OUTDIR)/$(TSTFILE)

# all tests
test:
	@for assignment in $(ASSIGNMENTS); do ASSIGNMENT=$$assignment $(MAKE) -s test-assignment || exit 1; done

# style check single test
style-check-assignment: bin/phpcs.phar
	@echo "checking $(ASSIGNMENT) against xPHP code standards"
	@bin/phpcs.phar -sp --standard=phpcs-xphp.xml $(ASSIGNMENT)

# style c heck all tests
style-check:
	@for assignment in $(ASSIGNMENTS); do ASSIGNMENT=$$assignment $(MAKE) -s style-check-assignment || exit 1; done

