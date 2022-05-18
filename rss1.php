<?php 
header('Content-Type: text/xml; charset=utf-8'); 
$var = '<?xml version="1.0" encoding="utf-8"?>
		<rss version="2.0">
		<channel>
		<title>новостная RSS-лента, категория - Первая</title>
		<link>http://aryukov.mpt.ru/topic.php </link>
		<description>Все новости</description>';

	#подключение базы данных
    require "Database.php";
    $qry = "SELECT * FROM topic WHERE id_category LIKE '8' ORDER BY id_topic DESC";
    $Database = new Database();
  
    $topic = $Database->getAll($qry,);



   #вывод статей в rss-ленту
   foreach ($topic as $item) {
	$var .= '
			<item> 
			<title>' .$item['title_topic'] . '</title>  
			<link> http://aryukov.mpt.ru/news.php?id=' . $item['id_topic'] .'.html" </link>
			<description><![CDATA[' .$item['content_topic'] . ']]></description> 
			<guid>' .$item['id_topic'] . '</guid> 
			</item>';
		}
		$var .='</channel>
		        </rss>';

		echo $var;
exit();
?>