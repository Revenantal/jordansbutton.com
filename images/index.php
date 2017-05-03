<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Jordan's Gallery</title>
	<meta property="og:image" content="http://jordansbutton.com/img/face.png" />
	<link rel="shortcut icon" type="image/png" href="../img/favicon.png"/>
	<link rel="stylesheet" href="../css/collage-transitions.css">
	<link type="text/css" rel="stylesheet" href="../css/featherlight.min.css">
	<link type="text/css" rel="stylesheet" href="../css/featherlight.gallery.min.css">
	
	<style>
		.Image_Wrapper {
			 opacity:0;
		}
		.Collage {
			padding: 5px;
		}
		body{
			background-color:#e8e8e8;
		}
		
		a img { 
			transition: all .2s ease-in-out; 
		}
		
		a:hover img {
			transform: scale(1.05);
		}
	</style>
</head>


<body>

	<section class="Collage effect-parent">
	
		<?
			define('IMAGEPATH', 'img/');
			foreach(glob(IMAGEPATH.'*') as $img){
				list($width, $height) = getimagesize($img); ?> 
					<div class="Image_Wrapper">
						<a class="gallery" href="<? echo $img; ?>">
							<img src="<? echo $img; ?>" width="<? echo $width; ?>" height="<? echo $height; ?>" />
						</a>
					</div><?
				}
		?>
	</section>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="../js/vendor/jquery.collagePlus.min.js"></script>
	<script src="../js/vendor/jquery.removeWhitespace.min.js"></script>
	<script src="../js/vendor/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/vendor/featherlight.gallery.min.js" type="text/javascript" charset="utf-8"></script>
	
	<script type="text/javascript">

		$(document).ready(function(){
			collage();
			$('.gallery').featherlightGallery({
				gallery: {
						fadeIn: 300,
						fadeOut: 300
					},
					openSpeed:    300,
					closeSpeed:   300
			});
		});

		function collage() {
			$('.Collage').removeWhitespace().collagePlus(
			{
				'fadeSpeed'     : 2000,
				'effect'		: 'effect-2',
				'direction'		: 'vertical',
				'allowPartialLastRow' : true
			});
		};

		// This is just for the case that the browser window is resized
		var resizeTimer = null;
		$(window).bind('resize', function() {
			// hide all the images until we resize them
			$('.Collage .Image_Wrapper').css("opacity", 0);
			// set a timer to re-apply the plugin
			if (resizeTimer) clearTimeout(resizeTimer);
			resizeTimer = setTimeout(collage, 200);
		});

    </script>
</body>



</html>