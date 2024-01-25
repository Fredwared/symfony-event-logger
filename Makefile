DC := docker-compose -f ./docker/docker-compose.yml
APP := $(DC) exec -i

build:
	@$(DC) build

start:
	@$(DC) up -d

stop:
	@$(DC) down

ssh:
	@$(APP) bash
