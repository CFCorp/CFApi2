mkfile_path := $(abspath $(lastword $(MAKEFILE_LIST)))
current_dir := $(notdir $(patsubst %/,%,$(dir $(mkfile_path))))
mkfile_dir := $(dir $(mkfile_path))

target:
	@echo my name jeff

install:
	pip install -r requirements.txt

build:
	python index.py build

dev-py:
	cd "$(mkfile_dir)"FrontEnd && python3 index.py

dev-ru:
	cd "$(mkfile_dir)"BackEnd/neat-api && cargo run