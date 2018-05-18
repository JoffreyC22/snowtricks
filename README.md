Snowtricks
========================

Jimmy Sweat est un entrepreneur ambitieux. Son objectif est d'en faire un outil pour apprendre les figures (tricks) du snowboard, de permettre la vulgarisation du snowboard auprès du plus grand nombre.
Il souhaite capitaliser sur du contenu apporté par les internautes afin d’acquérir une base de données riche et suscitant l’intérêt des internautes qui passerait par le site web. Par la suite, Jimmy souhaite développer un business de mise en relation avec les marques de snowboard grâce au trafic que le contenu aura généré.

Configuration
--------------

Symfony 3.4 with PHP 7.2

Get the project
--------------

git clone https://github.com/JoffreyC22/snowtricks.git 

Installation
--------------

* cd snowtricks
* npm install
* composer install

Launching the project
-------------- 

* Create database : php bin/console doctrine:schema:update --force
* Populate database : php bin/console doctrine:fixtures:load
* Run project : yarn run encore dev --watch

That's it !

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/JoffreyC22/snowtricks/badges/quality-score.png?b=auth)](https://scrutinizer-ci.com/g/JoffreyC22/snowtricks/?branch=auth)