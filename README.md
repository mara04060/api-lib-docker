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
Используються только самы необходимые компоненты , для валидации входных картинок в виде строки с преобразованием в файл (сохранения в файловой системы хост площадки).

<h3>Реализованно </h3>
Cледующее:
<p /> http://api-lib.loc/api/v1.0/book/all - Чтение всех книг GET (без авторизации)
 <p />   http://api-lib.loc/api/v1.0/book/user - Все книги которые добавил текущий залогиненный пользователь GET
  (Залогиненный)
 <p />  http://api-lib.loc/api/v1.0/book/add - Добавление книги методом POST (Залогиненный)
<p />    http://api-lib.loc/api/v1.0/book/{id} - Редактирование книги под номер ID  PUT (Залогиненный)
<p />    http://api-lib.loc/api/v1.0/book/{id} - Удаление книги под номер ID   методом DELETE (Залогиненный)

 <p />   http://api-lib.loc/api/v1.0/author/all - Все авторы GET (без авторизации)
<p />   http://api-lib.loc/api/v1.0/author/book/{id} - Все книги определенного автора под номером ID GET
 (без авторизации)




<p />    http://api-lib.loc/api/v1.0/auth/login - Авторизация  POST (Не авторизированный)
<p />     http://api-lib.loc/api/v1.0/auth/registration - Регистрация   POST (Незарегистрированный)
 <p />     http://api-lib.loc/api/v1.0/auth/logout - Выход (выход из- под логина )   POST (Залогиненный)
   <p />    http://api-lib.loc/api/v1.0/auth/refresh - Обновление Токена   POST (Залогиненный)
  <p />      http://api-lib.loc/api/v1.0/auth/m - Инфа о пользователе    POST (Залогиненный)






  <h2>Установка</h2>
<p> 1) Клонируем содержимое репозитория себе на компьютер.
<br /> Командой : <b>https://github.com/mara04060/api-lib-docker.git</b>
<p> 2) Запускаем терминал из текущей директории где склонирован репозиторий.
<br /> Обновляем содержимое до актуальной версии композером.
<br /> <b>composer install</b> ( <b>composer update</b> )
<br /> 
<p> 3) Сбоpку можно запустить в Докере через <b>docer-compose up</b>
<p />4) Проект будет доступен по адресу http://0.0.0.0/api/v1.0/book/all

<p>Если дошло дело до тестов под POSTMAN то следует незабыть про JWT-ключи</p>
которые необходимо перезаписывать в поля <b>token</b
> на всех ресурсах которые требуют доступ авторизированного пользователя.
И так : 
<li> Запускаем Login (Authentification) User in system - и в ответе к нам прийдет <b>access_token</b>
>(действие которого ограниченно 1600сек)</li>
<li> После чего можно работать с любым из тестовых кейсов. Но незабывая про ключ <b>access_token</b></li>

