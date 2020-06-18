<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Проект выполнен полностью на Laravel
<p />
Используються тлько самы необходимые компоненты , для валидации входных картинок в виде строки с преобразованием в файл (сохранения в файловой системы хост площадки).

<h3>Реализованно </h3>
Cледующее:
<p /> http://api-lib.loc/api/v1.0/book/all - Чтение всех книг GET
 <p />   http://api-lib.loc/api/v1.0/book/user/{id} - Все книги которые добавил этот пользователь GET
 <p />  http://api-lib.loc/api/v1.0/book/add - Добавление книги методом POST
<p />    http://api-lib.loc/api/v1.0/book/{id} - Редактирование книги  PUT
<p />    http://api-lib.loc/api/v1.0/book/{id} - Удаление книги DELETE

 <p />   http://api-lib.loc/api/v1.0/author/all - Все авторы GET
<p />   http://api-lib.loc/api/v1.0/author/book/{id} - Все книги определенного автора GET




<p />    http://api-lib.loc/api/v1.0/auth/login - Авторизация  POST
<p />     http://api-lib.loc/api/v1.0/auth/registration - Регистрация   POST
 <p />     http://api-lib.loc/api/v1.0/auth/logout - Выход (выход из- под логина )   POST
   <p />    http://api-lib.loc/api/v1.0/auth/refresh - Обновление Токена   POST
  <p />      http://api-lib.loc/api/v1.0/auth/m - Инфа о пользователе    POST




  <h2>Установка</h2>
<p> 1) Клонируем содержимое репозитория себе на компьютер.
<p> 2) Запускаем терминал из текущей директории где склонирован репозиторий.
<p> 3) Сбоку можно запустить в Докере <b>docer-compose up</b>
<p />4) Проект будет доступен по адресу http://0.0.0.0/api/v1.0/book/all

