FROM php:8.0-apache

# ========================
# 🕒 Configuração de Timezone
# ========================
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# ========================
# 🔧 Ativar módulos Apache
# ========================
RUN a2enmod rewrite \
    && a2enmod ssl \
    && a2enmod headers

# ========================
# 📦 Instalar dependências e extensões PHP
# ========================
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    vim \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# ========================
# 🎵 Instalar Composer
# ========================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ========================
# 📁 Diretório de trabalho
# ========================
WORKDIR /var/www/html

# ========================
# ⚙️ Copiar e habilitar config Apache customizada
# ========================
COPY blog.conf /etc/apache2/sites-available/blog.conf
RUN ln -sf /etc/apache2/sites-available/blog.conf /etc/apache2/sites-enabled/blog.conf

# ========================
# 🔒 Copiar SSL (caso precise dentro do container)
# ========================
# OBS: /etc/letsencrypt já está montado via volume no docker-compose
RUN mkdir -p /etc/letsencrypt/live/hensso.blog

# ========================
# 🔐 Permissões de pasta Laravel
# ========================
# Garantir que storage e cache existam antes de dar permissão
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# ========================
# 🌐 Expor portas HTTP/HTTPS
# ========================
EXPOSE 80 443

# ========================
# 🚀 Comando default
# ========================
CMD ["apache2-foreground"]
