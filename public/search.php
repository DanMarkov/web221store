<?  
	require_once "$path/components/head.php";
    
?>

<body>
	 <div class="cont">
	<? require_once "$path/components/header.php";?>
		 <main class="main_start">
			<div class="main_start__window">
				<div class="main_start__window__left_menu">

				</div>
				<div class="main_start__window__content">
                      <?  require_once "$path/system/sysSearch.php"; ?>
				</div>
			</div>
		 </main>
		 <? require_once "$path/components/footer.php";?>
	 </div>
	 <script>
         document.querySelector(".main_start__window__content").onclick = event =>{
             //console.log(event);
            if(event.target.dataset.toCart){
                
              //  console.log(event.path[3].dataset.productId);
                fetch("/system/toCart.php", {  
                        method: 'post',  
                        headers: {  
                        "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
                        },  
                        body: `product_id=${event.path[3].dataset.productId}` // $_POST['product_id']
                })
                // .then(response => response.text())
                // .then(data => console.log(data));
          
            }
            if(event.target.dataset.toFav){
                console.log(event.path[3].dataset.productId);
            }
   
         }
	 </script>
</body>
</html>
