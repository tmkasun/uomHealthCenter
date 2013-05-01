function check(){
   		 if ($("#notification").is(":hidden")){
	   		$.get("checkNotification_mlt.php?checkNum=1", function(data){
				if(data!="0"){
				 	$("#notificationIn").load("checkNotification_mlt.php");
				 	$("#notification").slideDown("slow");
				}
			});
		}
		 window.setTimeout(function() {check();}, 10000);
	}
	
$(document).ready(function(){

	$("#notification").hide();
	
	
	$("#notificationClose").click(function () {
    	$("#notification").hide();
    });
    
    window.setTimeout(function() {
		check();
	}, 1000);
   
    
});
