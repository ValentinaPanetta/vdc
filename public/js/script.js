//MainJavaScript


/*console.log(window.location.pathname);*/  //Show path !!!

if(window.location.pathname == '/consultings'){
	var availability = document.getElementsByClassName('availability');
	var dinamic =  document.getElementsByClassName('dinamic');
	for (let i = 0; i < availability.length; i++) {
		dinamic[i].style.color = 'green';
		console.log(availability[i].innerHTML);
		if(availability[i].innerHTML == 0){
			dinamic[i].style.color = 'red';
			dinamic[i].innerHTML = 'Completed';
		}
	}
		
	


}