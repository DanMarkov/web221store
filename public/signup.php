<? 
 require_once "$path/system/sysSignUp.php";
 require_once "$path/components/head.php";

?>

<body>
	 <div class="cont">
	<? require_once "$path/components/header.php";?>
		 <main class="main_signup">
                <div class="main_signup__window">
                    <div>Sign Up</div>
                    <form action="" method="post" id="formSignup">
                        <input type="text" name="login" id="login" placeholder="login">
                        <input type="password" name="password" id="password"  placeholder="password">
                        <input type="password" name="password2" id="password2"  placeholder="password2">
                        <input type="email" name="email" id="email"  placeholder="example@example.ex">
                        <input type="submit" name="signup" value="Sign Up">
						<a href="/login">or Log In</a>
                    </form>
                </div>
		 </main>
		 <? require_once "$path/components/footer.php";?>

	 </div>
     <script>
         login.oninput = ()=>{
            if(login.value.length<3){
                 console.log("Логин должен быть от 3 символов!");
                 login.style.border = "1px solid red";
              
            }
            else{
                login.style.border = "1px solid green";
            }
         }
         password.oninput = ()=>{
            if(password.value.length<3){
                 console.log("Логин должен быть от 3 символов!");
                 password.style.border = "1px solid red";
              
            }
            else{
                password.style.border = "1px solid green";
            }
         }
         password2.oninput = ()=>{
            if(password.value!=password2.value){
                
                 password2.style.border = "1px solid red";
              
            }
            else{
                password2.style.border = "1px solid green";
            }
         }
         formSignup.onsubmit = ()=>{
             if(login.value.length<3){
                 console.log("Логин должен быть от 3 символов!");
                 login.style.border = "1px solid red";
                 return false;
             }
             if(password.value.length<3){
                 console.log("Пароль должен быть от 3 символов!");
                 password.style.border = "1px solid red";
                 return false;
             }
             if(password.value != password2.value){
                console.log("Пароли не совпадают!");
                 return false;
 
             }
         }
     </script>
</body>
</html>
