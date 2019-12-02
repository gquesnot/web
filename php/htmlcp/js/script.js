"user strict";

$(function(){


	var intervalId;

	$('#js').html('<object data="http://localhost/htmlcp/site/index.html" width="1280" height="1024"/>');

	$('#data').data("html",0);
	$('#data').data("css",0);


	$('#start').click(function(){
		$('#start').unbind('click');
		intervalId = setInterval(start, 1000);

	});

	$('#pause').click(myStopFunction);

	function start(){
		$.ajax({
			method: "POST",
			url: "get_next_word.php",
			data: {html: $('#data').data("html"), css: $('#data').data("css")}
		})
		.done(function(json){
			var res = JSON.parse(json);
			console.log(res);
			$('#data').data("html", res.html_pos);
			$('#data').data('css', res.html_pos);


		});
	}

	function myStopFunction() {
  clearInterval(intervalId);
  $('#start').click(start);
} 

});