<?
    if(isset($_POST["exit"])){
        unset($_SESSION['login']);
        unset($_SESSION['auth']);
        setcookie("login","",time());
        header("Location: /main");
    }
   // var_dump(isset($_COOKIE['login'])) ;
?>
<header class="header">
			 <div class="header__header">
				<div>
					<div>Иркутск</div>
					<div>Магазины Покупателям</div>
					<div> 8-800-0000-000</div>
				</div>
			 </div>
			 <div class="header__bottom">
				<div>
					<a href="/main">
                        <div>
                            LOGO
                        </div>
                     </a>
					<form action="/search" method="get">
						<input type="text" name="searchInput" id="searchInput">
					</form>
					<div class="header__bottom__menu">
						<div>
							<div class="header__bottom__iconMenu">х</div>
							<div  class="header__bottom__textMenu">Сравнить</div>
						</div>
						<div>
							<div class="header__bottom__iconMenu">х</div>
							<div  class="header__bottom__textMenu">Избранное</div>
						</div>
						<div>
							<div class="header__bottom__iconMenu">х</div>
							<a href="/cart" class="header__bottom__textMenu">Корзина</a>
						</div>
						<div>
							<div class="header__bottom__iconMenu">х</div>
                            <?
                                if(isset($_SESSION['login'])):
                                    echo <<<html
                                     <div  class="header__bottom__textMenu">
                                        <form action="" method="post">
                                            <input type="submit" name="exit" value="Выйти">
                                        </form>
                                     </div>
                                    html;
                                else:    
                            ?>
							        <div  class="header__bottom__textMenu" id="enterLogin">Войти</div>
                            <?  endif;?>
						</div>
					
					</div>
				</div>
			 </div>
		 </header>
   