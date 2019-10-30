<h4 class="text-lightcyan">Search by Title</h4>

<input type="search" id="input_html" name="input_html">

<script>
$(document).ready(function(){

var request_search 

$('#input_html').keyup(function(event) {
	event.preventDefault();
	  if (request_search) {
        request_search.abort();
    }
	var $form = $(this);

    var $inputs = $form.find("input, search, select, button, textarea");


    var serializedData = $form.serialize();

    $inputs.prop("disabled", true);


    request_search = $.ajax({
        url: "{{ route('consultings.index') }}",
        type: "get",
        data: serializedData
    });
   
    request_search.done(function(response, textStatus, jqXHR) {

	var cane = $(".cane");
      for (let y = 0; y < cane.length; y++) {
      		cane[y].style.display='none';
      		for (let i = 0; i < response.length; i++) {
				document.getElementById(response[i].id).style.display = 'block';
      		}		
      }
      if(response == ''){
      	cane.css('display', 'block');
      }

        
    });

    request_search.fail(function(jqXHR, textStatus, errorThrown) {

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });

    request_search.always(function() {

        $inputs.prop("disabled", false);
    });
});
});
</script>