"user strict";

$(function(){


	var intervalId;

	$('#js').html('<object data="http://localhost/htmlcp/site/index.html" width="1280" height="1024"/>');

	$('#data').data("html",0);
	$('#data').data("css",0);


	$('#start').click(function(){

		intervalId = setInterval(start, 100);
	});

	$('#pause').click(myStopFunction);

	function start(){
		$.ajax({
			method: "POST",
			url: "get_next_word.php",
			data: {html: $('#data').data("html"), css: $('#data').data("css")}
		})
		.done(function(json){

		});
	}

	function myStopFunction() {
  clearInterval(intervalId);
  $('#start').click(start);
} 

});