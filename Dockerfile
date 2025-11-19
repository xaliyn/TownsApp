# ---------- Build frontend (Node) ----------
  FROM node:22-bullseye AS node-builder
  WORKDIR /app
  
  LABEL org.opencontainers.image.source="https://github.com/your-repo/TownsApp"
  
  # copy package files & vite config for better cache
  COPY package*.json vite.config.js ./
  
  # copy resource files required by vite
  COPY resources resources
  
  RUN npm install --silent
  RUN npm run build
  
  # ---------- Build PHP app ----------
  FROM php:8.2-fpm-bullseye AS php-base
  WORKDIR /app
  
  ENV COMPOSER_MEMORY_LIMIT=-1
  
  RUN apt-get update && apt-get install -y --no-install-recommends \
      git unzip zip libpng-dev libonig-dev libxml2-dev libzip-dev libpq-dev nginx ca-certificates \
    && rm -rf /var/lib/apt/lists/*
  
  RUN docker-php-ext-install pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip
  
  COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
  
  # Copy app source and data folder
  COPY . /app
  COPY data /app/data
  
  RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
  
  COPY --from=node-builder /app/public/build /app/public/build
  
  RUN mkdir -p /app/storage /app/bootstrap/cache \
    && chown -R www-data:www-data /app/storage /app/bootstrap/cache /app/public \
    && chmod -R a+rw /app/storage /app/bootstrap/cache /app/public
  
  COPY docker/nginx.conf /etc/nginx/conf.d/default.conf
  COPY docker/start.sh /start.sh
  RUN chmod +x /start.sh
  
  ENV PORT=10000
  EXPOSE 10000
  
  CMD ["/start.sh"]
  