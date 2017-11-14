<script type="text/javascript" src="js/home_slide.js"></script> 
<script type="text/javascript"> 
$(function(){
	$('#movies').panelGallery({
		viewDuration: 3500,
		transitionDuration: 500,
		boxSize: 45,
		boxFadeDuration: 500,
		boxTransitionDuration: 50
	});
});
</script> 
<style type="text/css"> 
#movies {
	-moz-box-shadow: 0px 0px 10px #333;
	-webkit-box-shadow:  0px 0px 10px #333;
	box-shadow:  0px 0px 10px #333;
	clear:right;
}
</style> 
<div id="movies" class="img-slide"> 
	<img alt="" src="./images/1.jpg" width="300" height="180" /> 
	<img alt="" src="./images/2.jpg" width="300" height="180" /> 
	<img alt="" src="./images/3.jpg" width="300" height="180" /> 
	<img alt="" src="./images/4.jpg" width="300" height="180" /> 
	<img alt="" src="./images/5.jpg" width="300" height="180" /> 
</div> 
