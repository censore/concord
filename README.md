<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://ubanks.com.ua/img/bank-logo/concord.png">
    </a>
    <h1 align="center">Pomazkov Andrew TestTask</h1>
    <br>
</p>

Used [Yii 2](http://www.yiiframework.com/) framework.

Framework documentation is at [docs/guide/README.md](docs/guide/README.md).

Instalation
-----------

``````
$ git clone 
$ cd concord-test-pomazkov-andrew

``````
After that create the Database with name
~~~~
concord_test_pomazkov_andrew
~~~~
When database is created, run the migrations.
~~~~
$ yii migrate
~~~~

In yours server settings you have to add vhosts like

 **http://admin.concord.local** And **http://concord.local/** Any domain what do you want. In my case I used this domain names
````
<VirtualHost *:80>
DocumentRoot    "/concord-test-pomazkov-andrew/backend/web"
ServerName      "admin.concord.local" 
ServerAlias     "admin.concord.local"
</VirtualHost>

<VirtualHost *:80>
DocumentRoot    "/concord-test-pomazkov-andrew/frontend/web"
ServerName      "concord.local" 
ServerAlias     "concord.local"
</VirtualHost>
````

If you open **http://concord.local/** you will see the main project page. All users who sign up on the that domain automaticaly get admin role. So, open the sing up link in page header and register your own user.

When user is created (email verification no needed) you can open the subdomain  **http://admin.concord.local** and login to the system. 

There is you can see two menu links like
<img src="http://joxi.ru/4AkyE3zcoBQQ9m.jpg">

Users - Users CRUD

Group - Groups CRUD

Questions
---------
````
 * Параметры доступа в приложение необходимо вынести в файл README.MD (один логин и пароль для входа, например: admin/admin);
 I do not like store administrator credential inside php code, so i create logic when all registered user will be assigned role administartor
 * Document root должен быть в корне главной директории проекта, например:
 Why we should to access to "backend" and/or "frontend" by url? Easely way to use subdomains.
 * База данных должна быть названа по шаблону: concord_test_{имя}_{фамилия}, например: `password`.
 What do you meant like a "password"?