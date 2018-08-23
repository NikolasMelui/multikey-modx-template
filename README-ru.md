Multikey Modx Template
======
##### [English][english-docs]
Multikey Modx Template разработан [NikolasMelui][nikolasmelui] и [RinatDav][rinatdav] для [multikey.studio][multikeystudio]

# ВАЖНО!

Для корректной работы сперва установите [Gitify][gitify].

Также вам понадобятся:
  - [Apache][apache], [Nginx][nginx] или другой веб-сервер
  - [PHP][php] v5+ and Composer
  - [MySQL][mysql]
  - [Node.js][nodejs] v7+ and NPM

Вы можете думать, что это бесполезный шаблон, использующий старые технологии, что MODX - мёртв и стар. Окда.
> Go and fu** yourself. J. Stat.

При необходимости вы можете самостоятельно создать базу данных MySQL для вашего проекта на MODX Revo, однако такая функциональность присутствует в Gitify из коробки и база данных создается при установке MODX автоматически.
Если же вы хотите сделать это самостоятельно:
* __db_name__ - ;
* __user_name__ - user name;
* __user_password__ - user password;
```
$ mysql -u root -p
mysql> CREATE DATABASE db_name;
mysql> GRANT ALL PRIVILEGES ON db_name.* TO **user_name**@localhost IDENTIFIED BY 'user_password';
```

## Установка

Сперва установите [Gitify][gitify]:
```
$ git clone https://github.com/modmore/Gitify.git Gitify
$ cd Gitify
$ composer install
$ chmod +x Gitify
```

Создайте директорию для вашего нового проекта и перейдите в неё:
```
$ mkdir ${new_project} && cd ${new_project}
```
Скопируйте шаблон на ваш копмьютер в созданную директорию:
```
$ git clone https://github.com/NikolasMelui/multikey-modx-template.git ./
```
Установите актуальную версию MODX Revo:
```
$ Gitify modx:install
```
Установите пакеты (packages):
```
$ Gitify package:install --all
```
Завершите настройку шаблона сериализацией данных в базу:
```
$ Gitify build --force
```

При не обходимости используйте этот скрипт для присвоения необходимых прав для файлов и папок:
```
$ sh rules.sh
```

Поздравляем, шаблон готов к работе.

### Быстрый старт

Используйте npm для установки фронтенд зависимостей и запуска browserSync для "реактивной" разработки:
```
$ npm i
$ npm run dev
```

... при использовании данной команды вы получите минифицированные версии своих фронтенд файлов:
```
$ npm run prod
```

## Разработка

Хотите стать разработчиком этого проекта? Супер!
Это opensource проект. Все контрибуции приветствуются. Форкайте проект себе и вперёд!

| Планы      | Статус                                                        |
| ---------- | ------------------------------------------------------------- |
| es6        | -                                                             |
| Patterns   | -                                                             |
| Webpack    | -                                                             |
| ESLint     | env                                                           |
| Mocha      | -                                                             |
| CI\CD      | -                                                             |
| SFTP\rsync | -                                                             |
| Docker     | https://github.com/NikolasMelui/multikey-modx-template        |
| Kubernates | -                                                             |

___
Лицензия
----
MIT License

Copyright (c) 2018 NikolasMelui

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

**От разработчиков к разработчикам.**
[NikolasMelui][nikolasmelui]
[RinatDav][rinatdav]

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)
   [nikolasmelui]: <https://github.com/NikolasMelui>
   [rinatdav]: <https://github.com/RinatDav>
   [multikeystudio]: <https://multikey.studio>
   [gitify]: <http://modmore.github.io/Gitify>
   [apache]: <https://httpd.apache.org/download.cgi>
   [nginx]: <https://nginx.ru/ru/download.html>
   [php]: <http://php.net/downloads.php>
   [mysql]: <https://www.mysql.com/downloads/>
   [nodejs]: <http://nodejs.org>
   [english-docs]: <https://github.com/NikolasMelui/multikey-modx-template/blob/master/README.md>
