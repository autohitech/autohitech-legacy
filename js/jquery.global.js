/******************************************************************************/
/******************************** GlobalEffect  ********************************/
/******************************************************************************/
/*!
 * jQuery Plugin : GlobalEffect - jQuery Plugin
 * @requires jQuery v1.6 or later
 * License: Creative Commons Attribution-NonCommercial 3.0(상업적 사용금지)
 * see: http://www.cohomepage.com for details
 * Author: GCS Solution Development Department
 * Modification Date: 2013-05-10
 * Copyright (c) 1995-2013, Global Commerce Solution Inc. All Rights Reserved.
 *@example
 		<!DOCTYPE html>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title></title>
		<script type="text/javascript" src="../js/jquery.global.js"></script>
		<script type="text/javascript">
		    $(window).bind('load', function () {
				$('img.gflycontrol').GlobalFlyEffect();	
		    });	
		</script>
		</head>
		<body>
 <img src="../img/s_txt_scada01.png" class="gflycontrolfly" style="display:none" division="" dir="right" stageW="700" stageH="150" startH="50" endPos="230" speed="800" delay="100" easing="jswing" />
		</body>
		</html>		

 */


/*
JQuery animation easing plugin example
미리보기 == > http://gsgd.co.uk/sandbox/jquery/easing/
def
jswing
easeInQuad
easeOutQuad
easeInOutQuad
easeInCubic
easeOutCubic
easeInOutCubic
easeInQuart
easeOutQuart
easeInOutQuart
easeInSine
easeOutSine
easeInOutSine
easeInExpo
easeOutExpo
easeInOutExpo
easeInQuint
easeOutQuint
easeInOutQuint
easeInCirc
easeOutCirc
easeInOutCirc
easeInElastic
easeOutElastic
easeInOutElastic
easeInBack
easeOutBack
easeInOutBack
easeInBounce
easeOutBounce
easeInOutBounce 
*/
	 
/*이미지롤오버 old*/	 

(function ($) {
        $.fn.overexchange = function (p,opt,speed) {
			    (speed) ?  speed : "200";
				//(easingType) ?  easingType : "linear";	
				return this.each(function (i) {   			
	            var $$ = $(this);
				var imgurl = $$.attr("src"); 
				var mylink = $$.attr("link");
				var imgObj = new Image();
			    	 imgObj.src = imgurl;
				var imgwidth = imgObj.width+ "px";
				var imgheight = imgObj.height/p + "px";
				var imgheight2 = (imgObj.height/p)*(p-1) + "px";
				var toimg = "-"+imgheight;	
				var lastimg = "-"+imgheight2;	
                var divcssparent = $(this).parent().parent().parent().parent().attr('class');
				var dividparent = $(this).parent().parent().parent().parent().attr('id');
			    var cssObj = { 
					 'overflow' : 'hidden',
					 'position' : 'relative',
					 'width' : imgwidth,
					 'height' : imgheight
					  };

				var imgObj = { 
					'position' : 'relative'
     			  }	  
                if(dividparent == undefined) {
					var cssseleted = "."+divcssparent;
					var cssseleted_ul = "."+divcssparent + " ul li";					
				} else {
					var cssseleted = "#"+dividparent;
					var cssseleted_ul = "#"+dividparent + " ul li";
				}
                var cnt = $(cssseleted_ul).length;
				
				
		        if(mylink=='no') {
					$$.wrap('<div id=ved>')
		  			  .parent()
		 			  .css(cssObj)
		 			  .append("</div>");			

				} else {
					$$.parent().wrap('<div id=ved>')
		  			  .parent()
		  			  .css(cssObj)
		  			  .append("</div>");			
		
				}				
				
			
				
				 if(opt == "sup") {
					 /*
					$$.click(function () {
						$(this).removeClass("ovup"); 
						$(this).toggleClass("overed"); 
    				});
					*/ 
                    $(".menuT ul#topnav li").hover(function(){
						$(".subBar").show();
						$(this).find("img.sovup").css(imgObj);
						$(this).find("img.sovup").stop().animate({top:toimg},{queue:false,duration:speed});
						$(cssseleted_ul+ " .sovered").stop().animate({top:"0px"},{queue:false,duration:speed});
					}, function() {
				 		$(this).find("img.sovup").css(imgObj);
						$(this).find("img.sovup").stop().animate({top:"0px"},{queue:false,duration:speed});
						$(cssseleted_ul+ " .sovered").stop().animate({top:toimg},{queue:false,duration:speed});
						$(".subBar").hide();
					});
				}else if(opt == "sub") {
					
                    $(this).hover(function(){
						$(".subBar").show();
						$$.css(imgObj);
						$$.stop().animate({top:toimg},{queue:false,duration:speed});
						$(cssseleted_ul+ " .overed").stop().animate({top:"0px"},{queue:false,duration:speed});
						
					}, function() {
				 		$$.css(imgObj);
						$$.stop().animate({top:"0px"},{queue:false,duration:speed});
						$(cssseleted_ul+ " .overed").stop().animate({top:toimg},{queue:false,duration:speed});
						$(".subBar").hide();
					});
					 
				 }else if(opt == "up") {
                    $(this).hover(function(){
						$$.css(imgObj);
						$$.stop().animate({top:toimg},{queue:false,duration:speed});
						$(cssseleted_ul+ " .overed").stop().animate({top:"0px"},{queue:false,duration:speed});
						
					}, function() {
				 		$$.css(imgObj);
						$$.stop().animate({top:"0px"},{queue:false,duration:speed});
						$(cssseleted_ul+ " .overed").stop().animate({top:toimg},{queue:false,duration:speed});
					});
					 
				 }else if(opt == "ani") {
					$$.click(function () {
						$(this).removeClass("ovup"); 
						$(this).toggleClass("overed"); 
    				}); 
                    $$.hover(function(){
						$$.css(imgObj);
						
						$$.stop().animate({top:toimg},{queue:false,duration:speed});
						$(cssseleted_ul+ " .overed").stop().animate({top:"0px"},{queue:false,duration:speed});
						
					}, function() {
				 		$$.css(imgObj);
						$$.stop().animate({top:"0px"},{queue:false,duration:speed});
						$(cssseleted_ul+ " .overed").stop().animate({top:toimg},{queue:false,duration:speed});
					});
				 }else {
					$$.css(imgObj);
					$$.stop().animate({top:toimg},{queue:false,duration:speed});
					
				 }
				
            });
        };
        
    })(jQuery);

(function ($) {
        $.fn.mainexchange = function (speed) {
			    (speed) ?  speed : "200";
				return this.each(function (i) {   			
	            var $$ = $(this);
				var imgurl = $$.attr("src"); 
				var mylink = $$.attr("link");
				var imgObj = new Image();
			    	 imgObj.src = imgurl;
				var imgwidth = imgObj.width/2+ "px";
				var imgheight = imgObj.height + "px";
				var ltimg = "-"+imgwidth;	
                var divcssparent = $(this).parent().parent().parent().parent().attr('class');
				var dividparent = $(this).parent().parent().parent().parent().attr('id');
			    var cssObj = { 
					 'overflow' : 'hidden',
					 'position' : 'relative',
					 
					 'width' : imgwidth,
					 'height' : imgheight
					  };

				var imgObj = { 
					'display' : 'block', 
					'position' : 'relative',
					'left': '-245px'
     			  }	  
                if(dividparent == undefined) {
					var cssseleted = "."+divcssparent;
					var cssseleted_ul = "."+divcssparent + " ul li";					
				} else {
					var cssseleted = "#"+dividparent;
					var cssseleted_ul = "#"+dividparent + " ul li";
				}
                var cnt = $(cssseleted_ul).length;
		        if(mylink=='no') {
					$$.wrap('<div id=mainved>')
		  			  .parent()
		 			  .css(cssObj)
		 			  .append("</div>");			

				} else {
					$$.parent().wrap('<div id=mainved>')
		  			  .parent()
		  			  .css(cssObj)
		  			  .append("</div>");			
		
				}				
				
				$$.css(imgObj);
				
                    $(this).hover(function(){
						//$$.css(imgObj);
						$$.stop().animate({left:"0px"},{queue:false,duration:speed});
						$(cssseleted_ul+ " .movered").stop().animate({left:ltimg},{queue:false,duration:speed});
						
						
					}, function() {
				 	//	$$.css(imgObj);
						$$.stop().animate({left:ltimg},{queue:false,duration:speed});
						$(cssseleted_ul+ " .movered").stop().animate({left:"0px"},{queue:false,duration:speed});
					});
					 

				
            });
        };
        
    })(jQuery);

/** 이미지 롤오버 효과
 *@example
 		<!DOCTYPE html>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title></title>
		<script type="text/javascript" src="../js/jquery.global.js"></script>
		<script type="text/javascript">
		 //   $(window).bind('load', function () {
			$(document).ready(function() {
				$('img.gexchange').GlobalEffectExchange({dirType:top,speed:200});	
				//기본값과 같을경우 {dirType:top,speed:200} 삭제가능
				//speed를 10이하면 ?
				
				
		    });	
		</script>
		</head>
		<body>
		링크가 없을경우
 		<img src="../img/s_txt_scada01.png"  class="gexchange" link="no" />
		링크가 있을경우
 		<a href=""><img src="../img/s_txt_scada01.png"  class="gexchange" /></a>
		</body>
		</html>		

 */	

(function ($) {
  $.fn.GlobalEffectExchange = function (options) {	
    var defaults = {
      dirType: 'top', 	  
      speed: 200,  
      PlayTimes: 0,        
      delay: 200,        
      easing: "easeOutExpo"
    },
     options = $.extend({},defaults, options);		

	return this.each(function (i) { 
		var $$ = $(this);
		var imgurl = $$.attr("src");
		var myclass = $$.attr("class");
		var mylink = $$.attr("link");
		var myselected = $$.attr("selected");
		var imgObj = new Image();
			imgObj.src = imgurl;
 		var mycname = "MyFlyName_"+myclass+ i,
			imgwidth = imgObj.width+ "px",
			imgheight = imgObj.height/2 + "px",
			toimg = "-"+imgheight,	
			dirType = options.dirType,
			speed = options.speed,
			delay = options.delay,
			setPlayTimes = options.PlayTimes,
			easing = options.easing;

		var divcssparent = $(this).parent().parent().parent().parent().attr('class');
		var dividparent = $(this).parent().parent().parent().parent().attr('id');
		var eftcssObj = {'overflow' : 'hidden', 'position' : 'relative',	 'width' : imgwidth, 'height' : imgheight };
		var eftimgObj = {'position' : 'relative'};	 
		


		
		if(dividparent == undefined) {
				var cssseleted = "."+divcssparent;
				var cssseleted_ul = "."+divcssparent + " ul li";					
		} else {
				var cssseleted = "#"+dividparent;
				var cssseleted_ul = "#"+dividparent + " ul li";
		}

        if(mylink=='no') {
			$$.wrap('<div id='+ mycname + '>')
			  .parent()
			  .css(eftcssObj)
			  .append("</div>");			
		} else {
			$$.parent().wrap('<div id='+ mycname + '>')
			  .parent()
			  .css(eftcssObj)
			  .append("</div>");			
		
		}

		if( myselected ){
			$$.css(eftimgObj);
			$$.stop().animate({top:toimg},{queue:false,duration:speed});
		} else {		  
			$(this).hover(function(){
				$$.css(eftimgObj);
				$$.stop().animate({top:toimg},{queue:false,duration:speed});
				$(cssseleted_ul+ " .gSelected").stop().animate({top:"0px"},{queue:false,duration:speed});
			}, function() {
				$$.css(eftimgObj);
				$$.stop().animate({top:"0px"},{queue:false,duration:speed});
				$(cssseleted_ul+ " .gSelected").stop().animate({top:toimg},{queue:false,duration:speed});
			});	
		}					 
						
    }); //each
  };
      
})(jQuery);


/** 이미지 움직이는 효과
 *@example
 		<!DOCTYPE html>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title></title>
		<script type="text/javascript" src="../js/jquery.global.js"></script>
		<script type="text/javascript">
		 //   $(window).bind('load', function () {
			$(document).ready(function() {
				$('.ganitext1').GlobalEffectFly({ dirType: 'top',	stageW: 600, stageH: 30, startH: 0, endPos: 0, speed: 500, delay: 200});				
		    });	
		</script>
		//만약 반복사용활경우
		<script type="text/javascript">
		   $(window).bind('load', function () {
			   $('.ganitext1').GlobalEffectFly({ dirType: 'top',	stageW: 600, stageH: 30, startH: 0, endPos: 0, speed: 500, delay: 200});//로드시 1회
		   });	
		   $(document).ready(function() {
				var PlayTimes = 0;
				var intervalId = setInterval(function(){
					if(PlayTimes > 1){
        				clearInterval(intervalId);
        				return;
		    		}
				$('.ganitext1').GlobalEffectFly({ dirType: 'top',	stageW: 600, stageH: 30, startH: 0, endPos: 0, speed: 500, delay: 200});
				PlayTimes++;
				}, 3000);
		   });			
		</script>
		</head>
		<body>
		 <img src="../img/s_txt_scada01.png" style="display:none" class="ganitext1" />
		</body>
		</html>		

 */
 
	
(function ($) {
  $.fn.GlobalEffectFly = function (options) {	
    var defaults = {
      dirType: 'left',
      stageW: 0,  
      stageH: 0,  
      startW: 0,
	  startH: 0,   
	  endPos: 0,	  	  
      speed: 200,  
      PlayTimes: 0,        
      delay: 200,        
      easing: "easeOutExpo"
    },
     options = $.extend({},defaults, options);

	return this.each(function (i) { 
		var $$ = $(this);	
		var imgurl = $$.attr("src");
		var myclass = $$.attr("class");
		var imgObj = new Image();
			 imgObj.src = imgurl;
						 	
				 var mycname = "MyFlyName_"+myclass+ i,
				     imgwidth = imgObj.width,
					 imgheight = imgObj.height, 
					 dirType = options.dirType,
					 stageW = options.stageW,
					 stageH = options.stageH,
					 startW = options.startW,
					 startH = options.startH,
					 endPos = options.endPos,
					 speed = options.speed,
					 delay = options.delay,
					 setPlayTimes = options.PlayTimes,
					 easing = options.easing;

					 			 
						 switch (dirType) {
		                    case "left":
        	                	starttpos = startH;
								startlpos = (imgwidth*2);
                	        break;
	                	    case "right":
                        		starttpos = startH;
								startlpos = -(imgwidth*2);
	                        break;
    	    	            case "top":
        	                	starttpos = (imgheight*2);
								startlpos = startW;
                	        break;
                    		default:
                        		starttpos = startH;
								startlpos = (imgwidth*2);
					 	}
					 
			     		var eftcssObj = {'overflow' : 'hidden', 'position' : 'absolute',	 'width' : stageW +'px', 'height' : stageH +'px' };
						var eftimgObj = {'overflow' : 'hidden', 'display' : 'block', 'position' : 'absolute', 'top' : starttpos +'px', 'left' : startlpos +'px' };	 
		 				$$.wrap('<div id='+ mycname + '>')
					 	  .parent()
				 	      .css(eftcssObj)
					      .append("</div>");						 

						$$.css(eftimgObj);


		     			setTimeout(function() {
								switch (dirType) {
	                    			case "left":						
                        				$$.stop().animate({'left' : endPos+ 'px'},{ queue:false, duration:speed, easing:easing });
                       				break;
	                   				case "right":
    	                   				$$.stop().animate({'left' : endPos+ 'px'},{ queue:false, duration:speed, easing:easing });
                        			break;
        	            			case "top":
            			  				$$.stop().animate({'top' : endPos+ 'px'},{ queue:false, duration:speed, easing:easing });
                        			break;
                    				default:
                        				$$.stop().animate({'top' : '-' + endPos+ 'px'},{ queue:false, duration:speed, easing:easing });
					 			}
						}, delay);
    }); //each
  };
      
})(jQuery);


$(window).on('load', function() {

		$('img.ovex').overexchange('2','up',1);
		$('img.sovup').overexchange('2','sup',200);
		$('img.ovsub').overexchange('2','sub',200);
	//	$('.quickMove').SmainVisual(200);
		$('.overed').overexchange('2','',1);		
		$('img.mainani').mainexchange(200);
		//$('img.gfly').GlobalEffectFly();	
       	$('img.gexchange').GlobalEffectExchange({speed:200});	
		$('img.ovup').GlobalEffectExchange({speed:200});	

				// 서브비주얼
 		$('.s_txtT').GlobalEffectFly({ dirType: 'right', stageW: 730, stageH: 155, startH: 50, endPos: 230, speed: 300, delay: 200});
		$('.s_txtB').GlobalEffectFly({ dirType: 'left',  stageW: 730, stageH: 155, startH: 73, endPos: 230, speed: 500, delay: 300});
		$('.s_imgL').GlobalEffectFly({ dirType: 'top',   stageW: 150, stageH: 130, startW: 0,  speed: 400, delay: 400});	
		$('.s_imgR').GlobalEffectFly({ dirType: 'top',   stageW: 980, stageH: 155, startW: 730,  speed: 600, delay: 500});
		// 회사소개
		$('.s_imgR_company').GlobalEffectFly({ dirType: 'top',	stageW: 980, stageH: 130, startW: 730, speed: 600, delay: 500});
		// 시스템구축
		$('.s_imgR_system').GlobalEffectFly({ dirType: 'top',	stageW: 980, stageH: 155, startW: 730, endPos: -15, speed: 600, delay: 500});
		
		// 상단문구
		$('.c_fixT').GlobalEffectFly({ dirType: 'top', stageW: 750, stageH: 30, startH: 0,   endPos: 0,  speed: 500, delay: 400});
		$('.c_fixB').GlobalEffectFly({ dirType: 'top', stageW: 750, stageH: 60, startH: 0,   endPos: 20, speed: 500, delay: 600});
		$('.c_fixR').GlobalEffectFly({ dirType: 'top', stageW: 750, stageH: 48, startW: 697, endPos: 0,  speed: 500, delay: 300});
	
		
		// 메인적용사례

    });		
	$(document).ready(function() {
		$('.overed').overexchange('2','',1);
		
		
		var PlayTimes = 0;
		var intervalId = setInterval(function(){
			if(PlayTimes > 1){
        		clearInterval(intervalId);
        		return;
		    }
		// 상단문구	
		$('.c_fixT').GlobalEffectFly({ dirType: 'right', stageW: 750, stageH: 30, startH: 0,   endPos: 0,  speed: 500, delay: 300});
		$('.c_fixB').GlobalEffectFly({ dirType: 'left',  stageW: 750, stageH: 60, startH: 20,  endPos: 0,  speed: 500, delay: 400});
		$('.c_fixR').GlobalEffectFly({ dirType: 'top',   stageW: 750, stageH: 48, startW: 697, endPos: 0,  speed: 500, delay: 200});
			
			PlayTimes++;
		}, 3000);


		$('.subS01').hide();
		$('.subS02').hide();
		$('.subS03').hide();
		$('.subS04').hide();
		$('.subS05').hide();
		$('.subS06').hide();
		$('.subS07').hide();
		$('.subS08').hide();
		
		$(".menuT ul#topnav li").hover(function() { 
		//$(this).css({  'background' : 'none'});
		$(this).find("span").css({  'z-index' : '10000'});
		$(".subBar").show().fadeIn(200);
		$(this).find("span").fadeIn(350); 
		}, function() {
		$(this).css({ 'background' : 'none'}); 
		$(this).find("span").hide();
		$(".subBar").hide();

	});


		$("#topMenu li.m01").hover(function(){
			$("#topMenu .subS01").show().fadeIn(200);			
			});
		$("#topMenu li.m02").hover(function(){
			$('#topMenu .subS02').show().fadeIn(200);
			});
		$("#topMenu li.m03").hover(function(){
			$('#topMenu .subS03').show().fadeIn(200);
			});
		$("#topMenu li.m04").hover(function(){
			$('#topMenu .subS04').show().fadeIn(200);
			});	
		$("#topMenu li.m05").hover(function(){
			$('#topMenu .subS05').show().fadeIn(200);
			});	
		$("#topMenu li.m06").hover(function(){
			$('#topMenu .subS06').show().fadeIn(200);
			});	
		$("#topMenu li.m07").hover(function(){
			$('#topMenu .subS07').show().fadeIn(200);
			});	
		$("#topMenu li.m08").hover(function(){
			$('#topMenu .subS08').show().fadeIn(200);
			});	
			/*
// 이미지효과
$('.e_fade').stop().fadeTo(300,1);
  $('.e_fade').hover(function() {
    $(this).stop().fadeTo(300,0.5);
  }, function() {
    $(this).stop().fadeTo(300,1);
  });
  */
		
    });
	
	
