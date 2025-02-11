# Usa a imagem oficial do PHP 8.2
FROM php:8.2-cli

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Limpa o cache para reduzir o tamanho da imagem
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala extensões do PHP necessárias
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala o Composer (gerenciador de dependências do PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www

# Copia o código fonte para o container
COPY src/ /var/www

# Instala as dependências do Lumen
RUN composer install --no-dev --optimize-autoloader

# Expõe a porta 8000 (porta padrão do Lumen)
EXPOSE 8000

# Comando para rodar o servidor Lumen
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
