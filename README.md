# parserWordpress
Парсер html страниц в wordpress

Принцип работы - 
</br>пролистывает все html файлы в папке tmp, на наличие .post_title и .post_content,
</br>после чего добавляет новый пост, присваивая ему заголовок и контент.

Для отработки скрипта нужно - 
</br>1- скопировать всё содержимое в корень сайта
</br>2- закинуть в папку tmp html-файлы, которые надо обработать
</br>3- с помощью браузера открыть /auto-poster.php
