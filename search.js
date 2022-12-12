$(document).ready(function() {
	$("#search-gare").keyup(function() {
		$.ajax({
			type: "POST",
			url: "search.php",
			data:{gare :  $(this).val()},
			
			success: function(data) {
             let gare_non_exist  =   $('#suggesstion-gare-error').attr('data-gare');
             $("#suggesstion-gare").show();
				$("#suggesstion-gare").html(data);
                $("#search-gare").addClass("is-valid");
                 if(gare_non_exist  == 0){
                    $("#search-gare").addClass("is-invalid");
                 }else{
                    console.log('ok');
                    $("#search-gare").removeClass("is-invalid ");
                    $("#search-gare").addClass("is-valid");
                 }
              
            
				
                //  console.log(gare_non_exist );
           
             
			} 

		});
       
	});



    
});
//To select a gare name
function selectgare(gare) {
	$("#search-gare").val(gare);
	$("#suggesstion-gare").hide();
    
}

// console.log(document.getElementById("suggesstion-gare").getAttribute("data-gare"));