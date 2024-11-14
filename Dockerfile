# PHP imajını kullan
FROM php:7.4-cli

# Çalışma dizinini ayarla
WORKDIR /app

# Bağımlılıkları kur
COPY . /app
RUN docker-php-ext-install pdo pdo_mysql

# Başlangıç komutları
CMD ["php", "tests/IntegrationTest.php"]
