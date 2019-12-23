"use strict";



$(function(){
	$("#enfant > img").on("dragstart", function(){},false);	
	var i = 0;
	$('#enfant > img').on("mousedown", click_pic);

	const slider = document.querySelector('#enfant');
let isDown = false;
let startY;
let scrollTop;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  $('#enfant > img').off('click', click_pic);
  slider.classList.add('active');
  startY = e.pageY - slider.offsetTop;
  scrollTop = slider.scrollTop;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('active');
  // $('#enfant > img').on('click', click_pic);
});
slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('active');
  $('#enfant > img').on('click', click_pic);
});
slider.addEventListener('mousemove', (e) => {
  
  if(!isDown) return;
  e.preventDefault();
  const y = e.pageY - slider.offsetTop;
  const walk = (y - startY) * 3; //scroll-fast
  slider.scrollTop = scrollTop - walk;
});

	function click_pic()
	{
		$('#enfant > img').off("mousedown", click_pic);
		$('#enfant > img').on("mouseleave", click3_pic);
		$('#enfant > img').on("mouseup", click2_pic)
	}

	function click2_pic()
	{
		$('#enfant > img').each(function(){
			$(this).removeClass('opacity');
		});
		$(this).addClass('opacity');
		$('#drop').html("<img src=\""+$(this).attr('src')+"\">");	
		$('#enfant > img').off("mouseup", click2_pic);
		$('#enfant > img').off("mouseleave", click3_pic);
		$('#enfant > img').on("mousedown", click_pic);
	}

	function click3_pic()
	{
		console.log('move');
		$('#enfant > img').off("mouseup", click2_pic);
		$('#enfant > img').off("mouseleave", click3_pic);
		$('#enfant > img').on("mousedown", click_pic);
	}


});