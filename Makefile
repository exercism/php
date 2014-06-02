ASSIGNMENT ?= ""
IGNOREDIRS := ".git|vendor|bin"
ASSIGNMENTS = $(shell find . -maxdepth 1 -mindepth 1 -type d -not -path '*/\.*' | tr -d './' | sort | grep -Ev $(IGNOREDIRS))

# output directories
TMPDIR ?= "/tmp"
OUTDIR := $(shell mktemp -d "$(TMPDIR)/$(ASSIGNMENT).XXXXXXXXXX")

# language specific config (tweakable per language)
FILEEXT := "php"
EXAMPLE := "example.$(FILEEXT)"
TSTFILE := "$(ASSIGNMENT)_test.$(FILEEXT)"

phpunit.phar:
	@wget https://phar.phpunit.de/phpunit.phar
	@chmod +x phpunit.phar

# single test
test-assignment: phpunit.phar
	@echo "running tests for: $(ASSIGNMENT)"
	@cp $(ASSIGNMENT)/$(TSTFILE) $(OUTDIR)
	@cp $(ASSIGNMENT)/$(EXAMPLE) $(OUTDIR)/$(ASSIGNMENT).$(FILEEXT)
	@./phpunit.phar $(OUTDIR)/$(TSTFILE)

# all tests
test:
	@for assignment in $(ASSIGNMENTS); do ASSIGNMENT=$$assignment $(MAKE) -s test-assignment || exit 1; done

