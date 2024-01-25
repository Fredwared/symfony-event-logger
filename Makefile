DC := docker-compose -f ./docker/docker-compose.yml
APP := $(DC) exec -i php

build:
	@$(DC) build

start:
	@$(DC) up -d

stop:
	@$(DC) down

ssh:
	@$(APP) bash

analyze:
	@$(APP) vendor/bin/psalm
