//MainJavaScript

/*console.log(window.location.pathname);*/  //Show path !!!
$( document ).ready(function() {
    
	if(window.location.pathname == '/consultings'){
		var availability = document.getElementsByClassName('availability');
		var dinamic =  document.getElementsByClassName('dinamic');
		for (let i = 0; i < availability.length; i++) {
			dinamic[i].style.color = 'green';
			/*console.log(availability[i].innerHTML);*/
			if(availability[i].innerHTML == 0){
				dinamic[i].style.color = 'red';
				dinamic[i].innerHTML = 'Completed';
			}
		}		

	}else if(window.location.pathname == '/blog'){

		var comment_btn = document.getElementsByClassName('comment_btn');
		var comment_form = document.getElementsByClassName('comment_form');
		var close_msg = document.getElementsByClassName('close_msg');
		for(let i=0;i<comment_btn.length;i++){
			comment_form[i].style.display = "none";
			comment_btn[i].addEventListener('click',function(){
				for(let y=0;y<comment_btn.length;y++){
					comment_form[y].style.display = "none";	
				}
				comment_form[i].style.display = "block";
			})
			close_msg[i].addEventListener('click',function(){
				comment_form[i].style.display = "none";
			})
		}
		
	}else if(window.location.pathname == '/calendar'){
/*		$('#pro').css('display', 'none')
		var dateString = $('#pro').html();
		var result = dateString.substring(3, dateString.length-2);
		var dateArr = result.split('#');
		console.log(dateArr);
		$('#daily').html('ciaoaooaoa');
		$('.onclick').each(function(){
			$(this).addEventListener('click',function(){
				alert('ciao');
			})
		})*/
	}

})