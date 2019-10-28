//MainJavaScript

/*console.log(window.location.pathname);*/  //Show path !!!
$( document ).ready(function() {

	let path = window.location.pathname;
    let showPost = path.substring(0, 5);

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

	}else if( showPost =='/blog'){
		console.log('Post Section');

		$('#commentForm').css({"display":"none"});

		$('#AddComt').click(function(){
			$('#commentForm').css({"display":"block"});
		})

		$('#close_msg').click(function(){
			$('#commentForm').css({"display":"none"});
		})

	}else if(window.location.pathname == '/calendar'){
		$('.bg-prz-0').css({"backgroundColor":"Teal","color":"white"});
		$('.bg-prz-1').css({"backgroundColor":"lightcoral","color":"white"});
		$('.bg-prz-3').css({"backgroundColor":"Teal","color":"white"});
		$('.bg-prz-2').css({"backgroundColor":"lightcoral","color":"white"});



	}else if(window.location.pathname == '/' || window.location.pathname =='/home'){
		var slideIndex = 1;
		showSlides(slideIndex);

		// Next/previous controls
		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		// Thumbnail image controls
		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");		  
		  if (n > slides.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = slides.length}

		  for (i = 0; i < slides.length; i++) {
		      slides[i].style.display = "none";
		  }		  
		  
		  slides[slideIndex-1].style.display = "block";	
		  console.log(slides.length, n, slideIndex);	  
		}		

		$(".next").click(function(){
			plusSlides(1);
		})
		$(".prev").click(function(){
			plusSlides(-1);
		});
		

	}else{
		console.log(showPost);

	}



})