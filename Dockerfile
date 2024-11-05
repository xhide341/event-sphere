FROM dunglas/frankenphp

ARG WWWGROUP=1000
ARG WWWUSER=1000

# Create sail user and group using the build args
RUN groupadd --force -g ${WWWGROUP} sail
RUN useradd -ms /bin/bash --no-user-group -g ${WWWGROUP} -u ${WWWUSER} sail

WORKDIR /var/www/html

# Add system dependencies
RUN apt-get update && apt-get install -y \
    nodejs \
    npm \
    supervisor \
    && update-ca-certificates

# Install required PHP extensions
RUN install-php-extensions \
    pcntl \
    pdo_mysql \
    redis \
    intl \
    gd \
    bcmath \
    zip

# Generate self-signed certificate for FrankenPHP
RUN mkdir -p /etc/frankenphp/ssl && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/frankenphp/ssl/private.key \
    -out /etc/frankenphp/ssl/cert.pem \
    -subj "/C=US/ST=State/L=City/O=Organization/CN=localhost"

# Copy application files
COPY . /var/www/html

# Ensure proper permissions
RUN chown -R sail:sail /var/www/html && \
    chown -R sail:sail /data && \
    chown -R sail:sail /config && \
    chmod -R 777 /data && \
    chmod -R 777 /config && \
    chown -R sail:sail /etc/frankenphp/ssl && \
    chmod 644 /etc/frankenphp/ssl/cert.pem && \
    chmod 600 /etc/frankenphp/ssl/private.key

# Run as root to allow certificate installation
USER root

ENTRYPOINT ["php", "artisan", "octane:frankenphp", "--host=localhost", "--port=443", "--admin-port=2019", "--https", "--http-redirect", "--watch"]