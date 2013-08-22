// function toggleDiv(id, flagit) {
	// if (flagit=="1"){
		// if (document.layers) document.layers[''+id+''].visibility = "show"
		// else if (document.all) document.all[''+id+''].style.visibility = "visible"
		// else if (document.getElementById) document.getElementById(''+id+'').style.visibility = "visible"
	// }
	// else
	// if (flagit=="0"){
		// if (document.layers) document.layers[''+id+''].visibility = "hide"
		// else if (document.all) document.all[''+id+''].style.visibility = "hidden"
		// else if (document.getElementById) document.getElementById(''+id+'').style.visibility = "hidden"
	// }
// }


$(document).ready(function(){
	// $("#imageData").hover(function(){
		// $(".profile_image #profile_image_text").css("visibility", "visible");
	// });
	// $("#imageData").mouseout(function(){
		// $(".profile_image #profile_image_text").css("visibility", "hidden");
	// });
	
	
	$("div.profile_image").hover(function(){
		$(".profile_image span.menulink a #profile_image_text").css("visibility", "visible");
	});
	$("div.profile_image a").hover(function(){
		$(".profile_image span.menulink a #profile_image_text").css("visibility", "visible");
	});
	$("div.profile_image a img#imageData").hover(function(){
		$(".profile_image span.menulink a #profile_image_text").css("visibility", "visible");
	});
	$("div.profile_image a img#imageData h2#profile_image_text").hover(function(){
		$(".profile_image span.menulink a #profile_image_text").css("visibility", "visible");
	});
	$("div.profile_image a img#imageData h2#profile_image_text span#profile_image_bg").hover(function(){
		$(".profile_image span.menulink a #profile_image_text").css("visibility", "visible");
	});
	$(".profile_image span.menulink a #profile_image_text").hover(function(){
		$(".profile_image span.menulink a #profile_image_text").css("visibility", "visible");
	});
	$("div.profile_image").mouseout(function(){
		$(".profile_image span.menulink a #profile_image_text").css("visibility", "hidden");
	});
});