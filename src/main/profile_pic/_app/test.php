<html>
<head>
  <link type="text/css" href="http://jqueryui.com/latest/themes/base/ui.all.css" rel="stylesheet" />
  <script type="text/javascript" src="http://jqueryui.com/latest/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="http://jqueryui.com/latest/ui/ui.core.js"></script>
  <script type="text/javascript" src="http://jqueryui.com/latest/ui/ui.slider.js"></script>
  <script type="text/javascript" src="http://jqueryui.com/latest/ui/ui.slider.js"></script>
  <script type="text/javascript" src="http://deepliquid.com/projects/Jcrop/js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="http://deepliquid.com/projects/Jcrop/css/jquery.Jcrop.css" type="text/css" />

  <style type="text/css">
    #slider { margin: 10px; }
  </style>
  <script type="text/javascript">
  var jcrop_api;
  $(document).ready(function(){
    imgwidth = $("#cropbox").width();
    imgheight = $("#cropbox").height();
    aspectRatio=(imgheight > 0)?imgwidth / imgheight:1;
    jcrop_api = $.Jcrop('#cropbox',{
    	setSelect:   [ 0, 0, imgwidth, imgheight ],
    	aspectRatio: aspectRatio
    });
    $("#slider").slider({
    	min: 0,
    	max: 100,
    	value: 100,
    	slide: function(e,ui){
    		 updateCrop(ui.value);
    	}
    });
    function updateCrop(size){
    	size = size / 100;
    	maxX = $("#cropbox").width();
    	maxY = $("#cropbox").height();
    	midX = ((jcrop_api.tellSelect().x2 - jcrop_api.tellSelect().x) / 2) + jcrop_api.tellSelect().x;
    	midY = ((jcrop_api.tellSelect().y2 - jcrop_api.tellSelect().y) / 2) + jcrop_api.tellSelect().y;
    	midX = (midX < 0) ? midX * -1 : midX;
    	midY = (midY < 0) ? midY * -1 : midY;
    	sizeX = $("#cropbox").width() * size;
    	sizeY = $("#cropbox").height() * size;
    	x = midX - (sizeX/2);
    	y = midY - (sizeY/2);
    	x2 = midX + (sizeX/2);
    	y2 = midY + (sizeY/2);
        // edge conditions
    	if (x < 0){
    		x2 -= x2 - x;
    		x = 0;
    		if (x2 > maxX) x2 = maxX;
    	}
    	if (x2 > maxX){
    		x -= (x2 - maxX);
    		x2 = maxX;
    		if (x < 0) x = 0;
    	}
    	if (y < 0){
    		y2 -= y;
    		y = 0;
    		if (y2 > maxY) y2 = maxY;
    	}
    	if (y2 > maxY){
    		y -= (y2 - maxY);
    		y2 = maxY;
    		if (y < 0) y = 0;
    	}
    	jcrop_api.setSelect([ x,y,x2,y2 ]);
    }
  });
  </script>
</head>
<body>
<img src="http://deepliquid.com/projects/Jcrop/demos/demo_files/sago.jpg" id="cropbox" />
<div id="slider"></div>
</body>
</html>