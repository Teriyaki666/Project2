<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympian</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <header>
    <h1><i>Olympian</i></h1>
        <a href=""><img src="logo.png"></a>
        <nav>
            <a href="index.php">Главная</a>
            <a href="pages/catalog.php">Все товары</a>
            <?php 
                session_start();
                if(isset($_SESSION['isLoggined']))
                {
                    echo "<a href='pages/shoppingCart.php'>Корзина</a>";
                    echo "<a href='pages/product_comparison.php'>Сравнение</a>";
                    echo "<a href='php/exit.php'>Выйти</a>";
                }
                else 
                {
                    echo "<a href='pages/login.php'>Войти</a>";
                }
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
                {
                    echo "<a href='pages/admin.php'>Администрация</a>";
                }
            ?>
        </nav>
    </header>

    <section class="page-contain" style="margin:80px 0 20px 0;">
<a class="data-card">
    <h3>4.9 рейтинг</h3>
    <h4>По отзывам покупателей</h4>
    <p>Качественные товары, отличное обслуживание и уникальный выбор товаров</p>
  </a>
  <a class="data-card">
    <h3>8500</h3>
    <h4>Заказов</h4>
    <p>Большой спрос, конкурентоспособные цены и быстрая доставка</p>
  </a>
  <a class="data-card">
    <h3>20+</h3>
    <h4>Лет</h4>
    <p>Ассортимент продукции высокого качества, индивидуальный подход к каждому клиенту</p>
  </a>
   <a class="data-card">
    <h3>VK Group</h3>
    <h4>Нас уже 12 954!</h4>
    <p>Регулярные розыгрыши призов, акции и специальные предложения</p>
    </a>
</section>
    <div class="content">
        <?php
            require("php/connect.php");
            $sql = "SELECT * FROM Product ORDER BY rand() LIMIT 5;";

            if($result = $conn->query($sql))
            {
                echo "<div class='product-list'>";
                foreach ($result as $row) {
                    echo "<form action='php/addProduct.php' method='post'>";
                    echo "<div class='product-item'>";
                    echo "<img class='product-img' src='".$row['image_path']."'/>";
                    echo "<p class='product-title'>".$row['name']."</p>";
                    echo "<p class='product-price'>" . "Имеются в наличии: " .$row['quantity']."</p>";
                    echo "<p class='product-price'>" . "Описание - " .$row['material']."</p>";
                    echo "<p class='product-price'>".$row['price']."</p>";
                    if(isset($_SESSION['isLoggined']))
                    {
                        echo "<input type='submit' value='Добавить' />";
                    }
                    echo "</div>";
                    echo "</form>";
                }
                echo "</div>";
            }
        ?>
        <a href="pages/catalog.php" class="more">Показать еще</a>
    </div>
    <footer>
        <div id="footer">
        <div id="sitemap">
        <h3>SITEMAP</h3>
        <a href="#" class="mainNav__link">Главная</a>
      <a href="pages/catalog.php" class="mainNav__link">Все товары</a>
      <a href="shoppingcard/index.php?page=cart" class="mainNav__link">Вход</a>
      <a href="Registration/index.php" class="mainNav__link">Профиль</a>
      </div>
            <div id="social">
                <h3>SOCIAL NETWORKS</h3>
                <a href="http://twitter.com/" class="social-icon twitter"><img src="images/logo/twitter (1).png" width="40"></a>
                <a href="http://facebook.com/" class="social-icon facebook"><img src="images/logo/facebook.png" width="40"></a>
                <a href="http://vimeo.com/" class="social-icon-small vimeo"><img src="images/logo/tumblr.png" width="40"></a>
                <a href="http://youtube.com/" class="social-icon-small youtube"><img src="images/logo/instagram.png" width="40"></a>
                <a href="http://instagram.com/" class="social-icon-small instagram"><img src="images/logo/periscope.png" width="40"></a>
            </div>
            <div id="footer-logo">
                <p>© 2024 Olympian</p>
            </div>
        </div>
    </footer>
</body>
</html>