"use strict";



$(function(){
	$("#enfant > img").draggable({ disabled: true });
	var i = 0;
	$('#enfant > img').click(function(){
				$('#enfant > img').each(function(){
					$(this).removeClass('opacity');
				});
				$(this).addClass('opacity');
				$('#drop').html("<img src=\""+$(this).attr('src')+"\">");
			});


	const slider = document.querySelector('#enfant');
let isDown = false;
let startY;
let scrollTop;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  slider.classList.add('active');
  startY = e.pageY - slider.offsetTop;
  scrollTop = slider.scrollTop;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const y = e.pageY - slider.offsetTop;
  const walk = (y - startY) * 2; //scroll-fast
  slider.scrollTop = scrollTop - walk;
});



});