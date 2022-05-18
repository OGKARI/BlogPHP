<?php
    require "Database.php";
    $qry = "SELECT * FROM topic WHERE id_topic = :id_topic";
    $Database = new Database();
    $parm = array(
        "id_topic" => $_GET["id_topic"],
    );
    $topic = $Database->getRow($qry,$parm);
    if(isset($_POST['comment_author']) && isset($_POST['comment_content'])){
            $qry = "INSERT INTO `comments`(`id_topic`, `id_user`, `comment_author`, `comment_content`) VALUES (:id_topic,:id_user,:comment_author,:comment_content)"; 
            $parm = array(
                ":id_topic" => $_GET["id_topic"],
                ':id_user' => trim($_SESSION["id"]),
                ':comment_author' => trim($_POST['comment_author']),
                ':comment_content' => trim($_POST['comment_content']), 
            );
            $Database->insertData($qry,$parm);
            
            require 'logs.php';
            if($_SESSION['rule'] == 100){
                $e_type = "Добавление сообщения";
                logs($e_type); 
                }
            
      }
      $_POST = [];
      $qry = "SELECT * FROM comments WHERE id_topic = :id_topic";
      $parm = array(
          "id_topic" => $_GET["id_topic"],
      );
      $comment = $Database->getAll($qry,$parm);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuthorBlog</title>
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
                <div class="forum_thems_them">
                    <h2><?=$topic["title_topic"]?></h2>
                    <p><?=$topic["content_topic"]?></p>
                </div>
                <div class="forum_thems_them_white_comm">
                <div class="modal__title_comm">Ввидите ваш комментарий:</div>
                    <form action="" method="post">
                        <input required placeholder="Name" name="comment_author" type="text" class="modal__input_comm">
                        <input required placeholder="Сomment" name="comment_content" type="text" class="modal__input_comm">
                        <button class="btn_comm">  Отправить</button>
                    </form>
                </div>
                <?php foreach($comment as $item): ?>
                <div class="forum_thems_them_white">
                    <h2><?=$item["comment_author"]?></h2>
                    <p><?=$item["comment_content"]?></p>
                </div>
                <?php endforeach; ?>
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
