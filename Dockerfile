FROM php:7.4-apache

# Path: /var/www/html

RUN apt update && apt install curl \
    unzip -y\
    && rm -rf /var/lib/apt/lists/*

WORKDIR /usr/bin/yii
RUN curl  https://github.com/yiisoft/yii/archive/refs/tags/1.1.22.zip -L -o yii.zip && unzip yii.zip && rm yii.zip

RUN chmod +x yii-1.1.22/framework/yiic 

# set yiic as global command
RUN ln -s /usr/bin/yii/yii-1.1.22/framework/yiic /usr/local/bin/yiic
 
RUN echo $PATH

WORKDIR /var/www/html

EXPOSE 80