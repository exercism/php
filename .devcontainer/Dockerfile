FROM mcr.microsoft.com/devcontainers/php:4-8.4-bookworm

RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get -y install --no-install-recommends jq \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

# ds is pinned to v1, since v2 (the only version building against PHP 8.4 via
# PECL/docker-php-ext-install) dropped Vector/Deque/Stack/Queue/PriorityQueue.
RUN curl -L -o install-php-extensions \
    https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions \
    && chmod +x install-php-extensions \
    && ./install-php-extensions gmp ds-^1@stable intl \
    && rm install-php-extensions
