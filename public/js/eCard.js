$('body').on('click','.select-check',function(){
	$(this).parents('.box-img-step-1').find('input').prop('checked', true);
	$(this).parents('.box-img-step-1').find('.select-check').addClass('select-check2');
	$(".box-img-step-1").hide();
	$(this).parents('.box-img-step-1').show();
	$(this).parents('.box-img-step-1').find('.select-check').text('Deselect');
});

$('body').on('click','.select-check2',function(){
	$(this).parents('.box-img-step-1').find('.select-check').removeClass('select-check2');
	$(this).parents('.box-img-step-1').find('input').prop('checked',false);
	$(this).parents('.box-img-step-1').find('.select-check').text('Select');
	$(".box-img-step-1").show();
});

$(document).ready(function () {
  	"use strict";
  	$(".lightbox").click(function () {
    	var imgsrc = $(this).attr("src");
    	$("body").append("<div class='img-popup'><span class='close-lightbox'>&times;</span><img src='" +imgsrc +"'></div>"
    );
    $(".close-lightbox, .img-popup").click(function () {
      	$(".img-popup")
        	.fadeOut(500, function () {
          		$(this).remove();
        	})
        	.addClass("lightboxfadeout");
    	});
  	});
  	$(".lightbox").click(function () {
    	$(".img-popup").fadeIn(500);
  	});
});

$('body').on('click','.box-radio',function(){
    var val = $('input[name=box]:checked').val(); 
    if (val == 'box-1') {
      $('.step2-bottom-box1').slideDown();
      $('.step2-bottom-box2').slideUp();
      $('.step2-bottom-box3').slideUp();
    }else if(val == 'box-2'){
      $('.step2-bottom-box1').slideUp();
      $('.step2-bottom-box2').slideDown();
      $('.step2-bottom-box3').slideUp();
    }else{
      $('.step2-bottom-box3').slideDown();
      $('.step2-bottom-box1').slideUp();
      $('.step2-bottom-box2').slideUp();
    }
});