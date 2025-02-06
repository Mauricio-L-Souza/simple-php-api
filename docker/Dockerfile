FROM php:8.2-cli

ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupadd -g ${PGID} user && \
    useradd -l -u ${PUID} -g user -m user && \
    usermod -p "*" user -s /bin/bash

RUN apt update && apt-get upgrade -yqq && apt install -yqq --no-install-recommends \
    gettext \
    jq \
    rsyslog \
    rsyslog-gnutls \
    zlib1g \
    zlib1g-dev \
    apt-utils \
    gnupg \
    gosu \
    git \
    curl \
    wget \
    libcurl4-openssl-dev \
    ca-certificates \
    supervisor \
    libmemcached-dev \
    libz-dev \
    libbrotli-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libssl-dev \
    libwebp-dev \
    libmcrypt-dev \
    libonig-dev \
    libzip-dev zip unzip \
    libargon2-1 \
    libidn2-0 \
    libpcre2-8-0 \
    libpcre3 \
    libxml2 \
    libzstd1 \
    procps \
    libbz2-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /usr/src/app

ADD entrypoint.sh /local/bin/entrypoint.sh

RUN chmod +x /local/bin/entrypoint.sh

ENTRYPOINT [ "/local/bin/entrypoint.sh" ]
