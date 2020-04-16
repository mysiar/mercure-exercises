SHELL := /bin/bash

lint:
	./vendor/bin/parallel-lint --exclude tests/app --exclude vendor .
.PHONY: lint

cs:
	./vendor/bin/phpcs --standard=./ruleset.xml --extensions=php
.PHONY: cs

cbf:
	./vendor/bin/phpcbf --standard=./ruleset.xml --extensions=php
.PHONY: cbf
