
## About project

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
<p>
Веб-приложение создано на основе фреймворка Laravel, представляет собой ресурс по поиску домов с простым интерфейсом и парсингом объявлений с сайта realt.by, раздел "Котеджи, дома, участки". Парсер реализован на PHPQuery в виде раздела в меню, появляется после авторизации, доступно всем новым зарегистрированным пользователям (или логин: test3@test.com пароль: qweqwe123).
В веб-приложении:
<ul>  
<li>можно просмотреть объявления скачанные с сайта realt.by;</li>
<li>учитывается пагинация объявлений, можно задавать кол-во страниц и объявлений за один проход парсера, стартовую страницу, реализовано в панеле управления (доступна после авторизации);</li>
<li> присутствует два фильтра по параметрам (по цене и по дате обновления);</li>
<li>нету дублирования объявлений после перезапуска парсера;</li>
<li>есть возможность удаления и изменения записей (доступно после авторизации);</li>
<li>парсер обходит не только страницы со списком объявлений, но и каждое объявление, забирая доп. информацию об объявлении;</li>
</ul>
Использованные технологии:
<ul>
<li>База данных - MySQL;</li>
<li>Бекенд - PHP (Laravel 8.5.0, Composer, NPM);</li>
<li>Деплой проекта осуществлен на VPS cloud.google.com, веб-сервер Nginx.</li>
</ul>
</p>
