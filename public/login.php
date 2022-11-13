<? 
 require_once "$path/system/sysLogin.php";

 require_once "$path/components/head.php";

?>

<body>
	 <div class="cont">
	<? require_once "$path/components/header.php";?>
		 <main class="main_signup">
                <div class="main_signup__window">
                    <div>Log In</div>
                    <form action="" method="post">
                        <input type="text" name="login" id="login" placeholder="login">
                        <div>
							<input type="password" name="password" id="password"  placeholder="password">
							<a href="/forgot.php"> remind</a>
						</div>
						<!-- <div><input type="checkbox" name="" id=""> Напомнить пароль</div> -->
                        <input type="submit" name="signup" value="Log In">
						
						<a href="/signup">or Sign Up</a>
						<!-- <a href="/forgot.php"> Forgot password?</a> -->
                    </form>
                </div>
		 </main>
		 <? require_once "$path/components/footer.php";?>
	 </div>
</body>
</html>
