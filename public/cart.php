<?  
	require_once "$path/components/head.php";

?>

<body>
	 <div class="cont">
	<? require_once "$path/components/header.php";?>
		 <main class="main_start">
			<div class="main_start__cart">
                <div class="main_start__cart__products">
                    <h3>Корзина </h3>
                    <div class="cardsInCart">
                        <? require_once "$path/system/productsCart.php"; ?>

                    </div>
                </div>
                <div class="main_start__cart__info">
                    <h3>Итого</h3>
                    <div id="totalSum">

                    </div>
                </div>
			</div>
		 </main>
		 <? require_once "$path/components/footer.php";?>
	 </div>
    <script>

        document.querySelector(".main_start__cart").onclick = event =>{
           
            let cartId = event.target.dataset.cartId;
            let targetElem = document.querySelectorAll(`[data-cart-id='${cartId}']`)[0].childNodes[3].childNodes[5].childNodes[5];
            $res = event.path[1].childNodes[3].innerText;
            if($res < 1){
           
                event.path[1].childNodes[3].innerText = 1;
              
            }
            else{
                function queryProducts(productId,action){
                fetch("/system/calcProducts.php", {  
                            method: 'post',  
                            headers: {  
                            "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
                            },  
                            body: `product_id=${productId}&action=${action}` // $_POST['product_id']
                })
                .then(response => response.text())
                .then(data => {
               
                    if(data=="true"){
                    
                        if(action === 1){
                            event.path[1].childNodes[3].innerText++;
                        }
                        else{
                            event.path[1].childNodes[3].innerText--;
                            
                        }
                      targetElem.innerHTML = event.target.dataset.productPrice * event.path[1].childNodes[3].innerText;
                        
                    }
                    let sumPrice = 0;
                    for(let elem of document.querySelectorAll("[data-price]")){
                        sumPrice += Number(elem.innerText);
                      
                    }
                    totalSum.innerHTML = sumPrice;
                    
                })
           }
  
            if(event.target.className == "addProduct"){
                queryProducts(event.target.dataset.productId,1);
            
            }
            if(event.target.className == "reduceProduct"){
                queryProducts(event.target.dataset.productId,0);
            
            }
            }
           
        }
    </script>
</body>
</html>
