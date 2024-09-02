DOCKER_COMPOSE=docker compose

build:
	$(DOCKER_COMPOSE) build --no-cache

up:
	$(DOCKER_COMPOSE) up -d

down:
	$(DOCKER_COMPOSE) down --volumes

start:
	$(DOCKER_COMPOSE) start

stop:
	$(DOCKER_COMPOSE) stop

logs:
	$(DOCKER_COMPOSE) logs

shell:
	$(DOCKER_COMPOSE) exec php-fpm sh

ps:
	$(DOCKER_COMPOSE) ps
