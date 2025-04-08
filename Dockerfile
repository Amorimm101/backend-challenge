# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões do PHP
RUN docker-php-ext-install pdo pdo_mysql

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Instala o Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define o diretório raiz do Apache para a pasta public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Atualiza a configuração do Apache para usar a nova DocumentRoot
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}/../!g' /etc/apache2/apache2.conf

# Copia todos os arquivos da aplicação para o container
COPY . /var/www/html/

# Instala as dependências do Composer
WORKDIR /var/www/html
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
