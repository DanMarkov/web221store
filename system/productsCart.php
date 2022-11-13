<?

$query = $db -> query("SELECT goods.id,goods.name,users.login,goods.price,cart.count FROM cart,goods,users WHERE cart.users_id = 5 AND cart.product_id=goods.id AND cart.users_id=users.id");

if($query -> rowCount() > 0){
    foreach($query as $row){
        static $i = 0;
        $i++;
        $sumProducts = $row['count'] * $row['price'];
        echo <<<html
        <div class="productCard" data-product-id='$row[id]' data-cart-id='$i'>
            <div  class="productCard__img"> img </div>
            <div  class="productCard__cont">
                <div class="productCard__cont_r1">
                    <div> $row[name] </div>
                </div>
                <div class="productCard__cont_r2" >
                    text text text
                </div>
                <div class="productCard__cont_r3">
                    <div class="productCard__cont__fav" data-to-fav='1'> x </div>
                    <div class="productCard__cont__price"> $row[price] </div>
                    <div class="productCard__cont__cart" data-to-cart='1' data-price> $sumProducts  </div>
                </div>
            </div>
        </div>
        <div class="cardInfo">
            <div data-product-id='$row[id]' data-product-price='$row[price]'  data-cart-id='$i' class="addProduct">+</div> 
            <div class="countProduct"  >$row[count] </div> 
            <div data-product-id='$row[id]' data-product-price='$row[price]'  data-cart-id='$i' class="reduceProduct">-</div> 
        </div>
        
        html;
    }
}

