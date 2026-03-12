(function($) {
  var $doc = $(document);
  var $win = $(window);
  $.fn.scrollFollower = function (options){
    var options = $.extend({}, $.fn.scrollFollower.defaults, options);
		if (options.pageWidth)
			var pageWidth    = parseInt(options.pageWidth);
		else
		{
			alert('pageWidth is a necessary option value');
			return false;
		}
    var $layer = $(this);
    var varType      = options.varType;
    var pageAlign    = options.pageAlign;
    var offset       = pageWidth/2;
    var layerPositon = options.type;
    var margin       = parseInt(options.margin);
    var speed        = parseInt(options.speed);
    var easing       = options.easing;
    var topMargin    = parseInt(options.topMargin);
    var minTop       = parseInt(options.minTop);
    var marginResult = offset + margin;
    $layer.css('z-index', options.zindex);
    $layer.css("position","absolute");
    if (layerPositon === 'left')
     varType = 'right';
    function resetXPosition()
    {
      if (pageAlign === 'center')
      {
        var $screenSize = $('body').width();
        var halfScreenSize = $screenSize/2;
        xPosition = halfScreenSize + marginResult;
      }
      else if (pageAlign === 'left')
      {
        varType   = 'left';
        xPosition = pageWidth + margin;
      }
      $layer.css(varType, xPosition);
    }
    resetXPosition();
	var scrollTop = $(window).scrollTop();
    $layer.css('top',topMargin);
    $win.resize(resetXPosition);
    $win.scroll(function(){
      $top = $doc.scrollTop();
      if ($top > topMargin + minTop)
        yPosition = $top + minTop;
      else
        yPosition = $top + topMargin;
        $layer.animate({"top":yPosition }, {duration:speed, easing:easing, queue:false});
    });
  };
  $.fn.scrollFollower.defaults = {
    varType:'left',
    pageAlign:'left',
    type:'left',
    topMargin:0,
    minTop:0,
    margin:0,
    speed:0,
    easing:'linear',
    zindex:10
    };
})( jQuery );


jQuery(document).ready(function()
  {
	jQuery('#quickR').scrollFollower({ //따라다는 퀵메뉴
    	pageAlign:'center',
	    pageWidth:1020,
	    type:'right',
    	topMargin:265,
	    minTop:850,
	    margin:0,
	    speed:650,
    	easing:'swing',
	    zindex:10
  	});
  });