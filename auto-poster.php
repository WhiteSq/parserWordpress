
<?php
include 'simple_html_dom.php';// Подгружаю библиотеку
$path_dir = 'tmp';// путь к папке с файлами

function getArrayFiles($path_dir)
{
    $array_path = array();
    $dir = new RecursiveDirectoryIterator($path_dir);

    foreach (new RecursiveIteratorIterator($dir) as $val)
        if ($val->isFile())
            $array_path[] = $val->getPathname();

    return $array_path;
}

foreach (getArrayFiles($path_dir) as $file) 
{//работа с файлом
	require_once( dirname(__FILE__) . '/wp-load.php' );
    $html = file_get_html($file, 'r');

$title = $html->find('.post_title', 0)->plaintext;
$content = $html->find('div.post_content div.mom_visibility_desktop', 0)->innertext;

$post_data = array(
  'post_title'    => $title,
  'post_content'  => $content,
  'post_status'   => 'publish',
  'post_author'   => 1,
  'post_category' => array(1)
);
// Вставляем запись в базу данных
$post_id = wp_insert_post($post_data, true);
print_r($post_id); // Выведет id-ник поста, либо объект с массивом ошибок


    fclose($html);
}