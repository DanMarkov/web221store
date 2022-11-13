<?  
	require_once "$path/components/head.php";

?>

<body>
	 <div class="cont">
	<? require_once "$path/components/header.php";?>
		 <main class="main_start">
			<div class="main_start__window">
				<div class="main_start__window__left_menu">
                    <div id="leftMenu_cat">Категории</div>
                    <div id="leftMenu_products">Товар</div>
                    <div id="leftMenu_users">Пользователи</div>
				</div>
				<div class="main_start__window__content">
                    <div class="main_admin__window" id="main_admin__window">
                        <h3 id="main__admin__title"> Категории </h3>
                        <div class="main_admin__content" id="main_admin__content">

                        </div>
                    </div>
				</div>
			</div>
		 </main>
		 <? require_once "$path/components/footer.php";?>
	 </div>
	 <script>
         window.onclick= event =>{
             console.log(event);
             if(event.target.id == "leftMenu_products"){
                main__admin__title.innerText = "Товары";
                main_admin__content.innerHTML = null;
                contentProducts();
               
             }
             else if(event.target.id == "leftMenu_cat"){
                main__admin__title.innerText = "Категории";
                main_admin__content.innerHTML = null;
                contentCat();

             }
              else if(event.target.id == "leftMenu_users"){
                main__admin__title.innerText = "Пользователи";
                main_admin__content.innerHTML = null;
             }
         }

         function addPointCat(name, id){
            let newDivCatPoint = document.createElement("div");
                 newDivCatPoint.innerHTML = `
                    <div  class="adminPage_catPoint" data-cat-id="${id}">
                        <div>${name}</div>
                        <div class="edit_cat" data-cat-id="${id}"> edit </div>
                        <div class="del_cat"data-cat-id="${id}" > del </div>
                    </div>
                 `;
                newDivCatPoint.setAttribute("data-card-id",id);
                return newDivCatPoint;
         }

         
         main_admin__window.onclick = event=>{
            if(event.target.className == "edit_cat"){
                alert(1);
            }
            if(event.target.className == "del_cat"){
                
                let id = event.target.dataset.catId;
                let remElement = document.querySelector(`[data-card-id='${id}']`);
                console.log(id);
                fetch(`/system/catRemove.php?catid=${id}`)
                .then(response => response.text())
                .then(data => {
                    console.log(data);
              
                        newDivCat_contant.removeChild(remElement);
                
                })
            }
            if(event.target.id == "addCat"){
                fetch(`/system/catAdd.php?catName=${catName.value}`)
                .then(response => response.text())
                .then(data => {
                      document.querySelector("#DivCatAdd").before(addPointCat(catName.value, data));
                      catName.value = "";
                })
            }
         }

         function contentCat(){
         fetch("/system/cat.php")
         .then(response => response.json())
         .then(data => {
             let newDivCat = document.createElement("div");
          
             for(let row of data){
   
                 newDivCat.append(addPointCat(row.name, row.id));
             }

             let newDivCatAdd = document.createElement("div");
             newDivCatAdd.innerHTML = `
                                        <h4> Добавить кат. </h4>
                                        <div><input id="catName"type="text"> <input type="button" id="addCat" value="addCat" </div>
                                    `;
             newDivCatAdd.id = "DivCatAdd";
             newDivCat.id = "newDivCat_contant";
             newDivCat.append(newDivCatAdd);
             
             main_admin__content.append(newDivCat);


         })

         }
         contentCat();

         function contentProducts(){
            fetch("/system/products.php")
            .then(response => response.json())
            .then(data => {
                newDivProductsFilter = document.createElement("div");
                newDivProductsFilter.classList.add("filterModalWindow");
                main_admin__content.append(newDivProductsFilter);

            })
         }

	 </script>
</body>
</html>
