FROM nginx:1.21.3-alpine

# подменим дефолтный default.conf на наш кастомный
ADD ./default.conf /etc/nginx/conf.d/default.conf
# создадим папки в дефолтовой структуре nginx, если их нет.
RUN mkdir -p /etc/nginx/sites-available
RUN mkdir -p /etc/nginx/sites-enabled

# прокидываем конфиг сайта
ADD test.conf /etc/nginx/sites-available/test.conf
RUN ln -s /etc/nginx/sites-available/test.conf /etc/nginx/sites-enabled/


#RUN nginx -s reload

WORKDIR /var/www