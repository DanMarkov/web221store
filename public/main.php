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
					<div class="main_start__window__content__modal" id="window_menuModal">
						Привет!
					</div>
				</div>
			</div>
		 </main>
		 <? require_once "$path/components/footer.php";?>
	 </div>
	 <script>
		 

		 fetch("/system/cat.php")
		 .then(response => response.json())
		 .then(data =>{

			// data.forEach((value, index, z)=>{
			// 	console.log(value);
			// 	console.log(index);
			// 	console.log(z);
			// 	let ElementMenu = document.querySelector(".main_start__window__left_menu");
			// 	let ElementMenuPoint = document.createElement("div");
			// 	ElementMenuPoint.innerHTML = `<div> </div> <div>${value.name}</div>`;
			// 	ElementMenu.append(ElementMenuPoint);
			// })
			let elementMenu = document.querySelector(".main_start__window__left_menu");
			for(let value of data){
				
				let elementMenuPoint = document.createElement("div");
				elementMenuPoint.classList.add("main_start__window__left_menu__point");
				elementMenuPoint.setAttribute("data-id", `${value.id}`);

				elementMenuPoint.onclick = event =>{
					if(window_menuModal.style.display == "grid"){
						window_menuModal.style.display = "none";
						

						
					}
					else{
						window_menuModal.style.display = "grid";
						window_menuModal.innerHTML = "";
					
						// данный запрос решили обработать в роутинге в index.php!
						fetch(`/getsubcat?id=${event.target.dataset.id}`)
						.then(response => response.json())
						// .then(data => console.log(data));
						.then(data => {
							for(let value of data) {
								let elementSubcategory = document.createElement("div");
								elementSubcategory.classList.add("main_start__window__subcategory");
								elementSubcategory.innerHTML = `${value.name}`;
								window_menuModal.append(elementSubcategory);

							}
							console.log(data);
						})
					
					}
					// альтернативная запись
					// if(window_menuModal.style.display == "grid"){
					// 	window_menuModal.style.display = "none";
					// 	return;
					// }
					// 	window_menuModal.style.display = "grid";
				
				}
				elementMenuPoint.innerHTML = `<div data-id="${value.id}"> </div> <div data-id="${value.id}">${value.name}</div>`;
				elementMenu.append(elementMenuPoint);

			}

			// elementMenu.addEventListener("click", event =>{
			// 		console.log(event);
			
				
			// });

			 console.log(data);
		 })
	 </script>
</body>
</html>
