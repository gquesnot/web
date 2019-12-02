"user strict";

$(function(){


	var intervalId;

	$('#js').load('http://localhost/htmlcp/tmp/index.html');

	$('#data').data("html",0);
	$('#data').data("css",0);


	$('#start').click(function(){
		$('#start').unbind('click');
		intervalId = setInterval(start, 50);

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
			var html_spec = "";
			var css = "";

			res.html_spec.forEach( function(element) {
				html_spec += element+'<br>';
			});
			res.css.forEach(function(element){
				css += element+'<br>';
			});
			$('#js').load('http://localhost/htmlcp/tmp/index.html');
			$('#html_page').html(html_spec);
			$('#css').html(css);

		});
	}

	function myStopFunction() {
  clearInterval(intervalId);
  $('#js').load('http://localhost/htmlcp/tmp/index.html');
  $('#start').click(function(){
		$('#start').unbind('click');
		intervalId = setInterval(start, 50);

	});
} 
});
