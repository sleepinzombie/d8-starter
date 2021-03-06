/**
 * This `slider.js` file is reserved for the slider functionalities
 *
 * Some help were taken online
 *
 * @author Divesh H
 */

/**
 * Changes the rate at which the image slide.
 *
 * The bigger the number, the slower it is.
 *
 * @var slideSpeed
 * @type {!number}
 *
 */
let slideSpeed = 600;

/**
 * Sets whether or not the slides scroll automatically.
 * Set to false to turn off.
 *
 * @var autoSlide
 * @type {!number}
 */
let autoSlide = true;

/**
 * Sets how much time between each automatic slide.
 *
 * Number is in milliseconds (5000 = 5 secs)
 *
 * @var autoSlideTimer
 * @type {number}
 */
let autoSlideTimer = 5000;

/**
 * Sets where or not a random image will be chosen when the page loads.
 *
 * If false, the first image will show.
 *
 * @var loadRandom
 * @type {boolean}
 */
let loadRandom = true;

(function ($) {
	$(document).ready(function() {
		console.log('The slider.js is loaded on this page.');

	   	var totWidth = 0;
		var positions = new Array();

		/* Loop through all the slides and store their accumulative widths in totWidth. */
		$('.slides .slide').each(function(i){
			/* The positions array contains each slide's commulutative offset from the left part of the container. */
			positions[i] = totWidth;
			totWidth += $(this).width();

			/* Notify if there is no width defined in HTML. */
			if(!$(this).width()) {
				alert("Please, fill in width & height for all your images!");
				return false;
			}
		});

		/* Change the cotnainer div's width to the exact width of all the slides combined. */
		$('.slides').width(totWidth);


		/**
		 * Set the first image to active.
		 *
		 * Currently disabled. Use if you do not
		 * want any random image getting active.
		 */
		// $('.slides .slide:first-child').addClass('active');

		/* Set a random image as the first one. will change each time the page loads. */
		if (loadRandom) {
			firstImg = Math.floor(Math.random()*(positions.length));
			$('.slides .slide:nth-child(' +(firstImg+1)+ ')').addClass('active');
			$('.slides').css({marginLeft:-positions[firstImg]+'px'});
		}

		if (autoSlide) {
			function startTimer() {
				nextSlide();
				var timer = setTimeout(startTimer,autoSlideTimer);
			}
			startTimer();
		}

		/* Set up the next button actions */
		$('#menu a.next').click(function(e){
			e.preventDefault();
			nextSlide();
		});


		/* Set up the previous button actions */
		$('#menu a.previous').click(function(e){
			e.preventDefault();
			previousSlide();
		});

		/**
		 * Go to the previous slide.
		 *
		 * Some little changes happened here.
		 */
		function previousSlide() {
			/* Find which image we're on and remove the active class. */
			var pos = $('.active').prev().length;
			$('.active').removeClass('active');

			if (pos == 0) { /* We're on the first slide, so need to loop. */
				$('.slides').stop().animate({marginLeft:-positions[positions.length-1]+'px'},slideSpeed);
				$('.slides :nth-child(' +positions.length+ ')').addClass('active');
			} else {
				$('.slides').stop().animate({marginLeft:-positions[pos-1]+'px'},slideSpeed);
				$('.slides .slide:nth-child(' +pos+ ')').addClass('active');
			}
		}

		/**
		 * Go to the next slide.
		 */
		function nextSlide() {
			/* Find which image we're on and remove the active class. */
			var pos = $('.active').prevAll().length;
			$('.active').removeClass('active');

			if (pos == positions.length - 1) { /* We're on the last slide, so need to loop */
				$('.slides').stop().animate({marginLeft:-positions[0]+'px'},slideSpeed);
				$('.slides :nth-child(0)').addClass('active');
			} else {
				$('.slides').stop().animate({marginLeft:-positions[pos+1]+'px'},slideSpeed);
				$('.slides .slide:nth-child(' +(pos+2)+ ')').addClass('active');
			}
		}
	});
})(jQuery);