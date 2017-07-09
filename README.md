Yii 2 Тестовое задание "Клиенты"
============================

Реализовать задачу на стеке PHP + Yii2 +  MySQL

Сделать веб-приложение «Клиенты»

Функционал: 
- Форма добавления клиента.  
- Форма просмотр карточки клиента.
- В карточке клиента возможность удалить клиента из базы / изменить информацию о клиенте. 
- Добавить несколько номеров телефонов/удаление телефона/изменение телефона
- Просмотр всего списка клиентов.
- Поиск по номеру телефона или фамилии

Данные которые необходимо хранить в базе
- амилия
- Имя
- Отчество
- Дата рождения
- Пол
- Дата создания записи
- Дата обновления записи
- Телефоны клиента

Код выложить на Github, сопроводив проект инструкцией в REAMDE по его развертыванию

Установка
------------
Загрузите все файлы:
~~~
git clone
composer update
~~~
Настройте веб сервер, что бы /web была корневой директорией

Настройте подключение к базе данных в /config/db.php

Создайте базу данных, и имортируйте dump:
~~~
/sql_dump/testYii.sql
~~~



