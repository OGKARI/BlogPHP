<?php
    require "Database.php";
    

    $qry = "SELECT * FROM category";
    $Database = new Database();
    $category = $Database->getAll($qry);


    $qry = "SELECT * FROM topic";
    $Database = new Database();
    $topic = $Database->getAll($qry);

    $qry = "SELECT * FROM comments";
    $Database = new Database();
    $comm = $Database->getAll($qry);

    $qry = "SELECT * FROM req";
    $Database = new Database();
    $req = $Database->getAll($qry);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuthotForum</title>
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    
    <link rel="stylesheet" href="css/style.min.css">
    
</head>
<body>
    <header class="header forum_header">
        <div class="container">
            <div class="header_container">
                <div class="header_logo_container">
                    <a href="index.php"><img src="img/logo.png" alt="logo"></a> 
                </div>
                <div class="header_nav_container">
                    <div class="header_text" >
                        <button class="header_btn" onclick="window.location.href='req.php'">Контакты</button>
                    </div>
                    <div class="header_text">
                        <?php
                            if (isset($_SESSION["user"]))
                                echo '<button class="header_btn_log_unset" onclick="window.location.href=`logout.php`" >',$_SESSION["user"],'</button>';
                            else
                                echo '<button class="header_btn_log">Войти/Зарегистрироватся</button>'; 
                        ?>
                    </div>
                    <?php if($_SESSION['rule'] == 100):?>
                        <div class="header_text ">
                            <button class="header_btn" onclick="window.location.href='panel.php'">Панель управление</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>    
        </div>
    </header>
    <section class="forum_thems">
        <div class="container">
        <div class="forum_thems_container"> 
                <div class="forum_thems_them_white_comm">
                    <h2>Статьи</h2>
                    <?php foreach($topic as $item):
                        $_GET["id_topic"] = $item['id_topic'];?>
                    <div class="container_sec">
                        <h3><?=$item["title_topic"]?></h3>
                        <button class="btn" onclick="window.location.href='delete_topic.php?id_topic=<?=$_GET['id_topic']?>'" >Удалить</button>
                    </div>
                    <hr/>
                    <?php endforeach;?>  
                </div>
                <div class="forum_thems_them_white_comm">
                    <h2>Категории</h2>
                    <?php foreach($category as $item):
                        $_GET["id_category"] = $item['id_category   '];?>
                        
                    <div class="container_sec">
                        <h3><?=$item["title_category"]?></h3>
                        <button class="btn" onclick="window.location.href='delete_category.php?id_category=<?=$_GET['id_category']?>'" >Удалить</button>
                    </div>
                    <hr/>
                    <?php endforeach;?>  
                </div>
                <div class="forum_thems_them_white_comm">
                    <h2>Коментарии</h2>
                    <?php foreach($comm as $item):
                        $_GET["id_comments"] = $item['id_comments'];?>
                    <div class="container_sec">
                        <h3><?=$item["comment_content"]?></h3>
                        <button class="btn" onclick="window.location.href='delete_mess.php?id_comments=<?=$_GET['id_comments']?>'" >Удалить</button>
                    </div>
                    <hr/>
                    <?php endforeach;?>  
                </div>
                <div class="forum_thems_them_white_comm">
                    <h2>Обращение</h2>
                    <?php foreach($req as $item):?>
                    <div class="container_sec">
                        <h3><?=$item["req_name"]?></h3>
                        <p><?=$item["req_email"]?></p>
                    </div>
                    <hr/>
                    <?php endforeach;?>  
                </div>
            </div> 
        </div>
    </section>
    <div class="modal">
		<div class="modal__dialog">
			<div class="modal__content">
				<form action="login.php" method="post">
					<div class="modal__close" data-close>&times;</div>
					<div class="modal__title">Ввидите логин и пароль</div>
					<input required placeholder="login" name="login" type="login" class="modal__input">
					<input required placeholder="password" name="password" type="password" class="modal__input">
					<button class="btn">Войти</button>
					<div class="modal__reg">Не зарегистрированы?</div>
					<button class="btn" onclick="window.location.href='reg.php'">Регистрация</button>
				</form>
			</div>
		</div>
	</div>
    <footer class="footer">
		<div class="container">
			<div class="footer_container">
                    <div class="footer_container_text">
                    <h2>Наш Адрес:</h2>
                    <p>г.Москва Корлёвская набережная д.8</p>
                    </div>
                    <div class="footer_container_social">
                        <img src="img/Social/fb.svg" alt="fb">
                        <img src="img/Social/inst.svg" alt="inst">
                        <img src="img/Social/Lin.svg" alt="Lin">
                        <img src="img/Social/tw.svg" alt="tw">
                    </div>
            </div>
		</div>
	</footer>
    <script src="js/script.js"></script>
</body>
</html>
