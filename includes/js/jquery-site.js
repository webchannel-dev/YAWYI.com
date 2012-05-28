$(document).ready(function() {
	$("#site-wrapper").fadeIn(2500);
	$("#site-wrapper-creative").fadeIn(2500);
	$("#about-popup-wrapper").fadeIn(1000);
	$("#case-studies-popup-wrapper").fadeIn(1000);
	$('#slideshow').cycle({ 
    	fx:     'fade',
    	speed:  1000, 
    	timeout: 10000,
    	random: 'true',
    	pause: 1
	});
	$('#case-study-image').cycle({ 
    	fx:     'fade', 
    	speed:  1000, 
    	timeout: 0,
    	pause: 'true',
    	pager:  '#case-studies-thumbs', 
    	pagerAnchorBuilder: function(idx, slide) { 
        // return selector string for existing anchor 
        return '#case-studies-thumbs li:eq(' + idx + ') a'; 
    	} 
	});
	$('#case-study-gallery').cycle({ 
    	fx:     'fade', 
    	speed:  1000, 
    	timeout: 0,
    	pause: 'true',
    	pager:  '#case-study-gallery-thumbs', 
    	pagerAnchorBuilder: function(idx, slide) { 
        // return selector string for existing anchor 
        return '#case-study-gallery-thumbs li:eq(' + idx + ') a'; 
    	} 
	});
	$('#clients-gallery').cycle({ 
    	fx:     'scrollHorz',
    	easing: 'easeOutCubic', 
    	speed:  1000, 
    	timeout: 0,
    	prev: '#clients-back',
    	next: '#clients-next',
    	cleartype:  1,
    	pause: 1
	});
	$('#panel-wrapper').cycle({ 
    	fx:     'scrollHorz',
    	easing: 'easeOutCubic',
    	cleartype: !$.support.opacity,
    	cleartypeNoBg:   false,
    	speed:  1000, 
    	timeout: 0,
    	prev: '#case-studies-back',
    	next: '#case-studies-next',
    	cleartype:  1,
    	pause: 1
	});
	$('#sidebar-testimonial-slideshow').cycle({ 
    	fx:     'scrollVert',
    	easing: 'easeOutCubic',
    	speed:  1500, 
    	timeout: 6000,
    	cleartype:  true,
    	pause: 1
	});
	
});
		