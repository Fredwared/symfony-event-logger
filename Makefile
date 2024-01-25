DC := docker-compose -f ./docker/docker-compose.yml
APP := $(DC) exec -i app

build:
	@$(DC) build

start:
	@$(DC) up -d

stop:
	@$(DC) down

ssh:
	@$(APP) bash
