# Usa a imagem oficial do MySQL 8.0
FROM mysql:8.0

# Define variáveis de ambiente para configurar o MySQL
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=tcnofit
ENV MYSQL_USER=admin
ENV MYSQL_PASSWORD=mysecret

# Copia scripts de inicialização (opcional)
COPY ./docker/mysql/init.sql /docker-entrypoint-initdb.d/do