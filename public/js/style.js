// JavaScript Document

// Gmaps
$(function () {
    $('.map')
        .click(function(){
            $(this).find('iframe').addClass('clicked')
        })
        .mouseleave(function(){
            $(this).find('iframe').removeClass('clicked')
        });
});
// Disable Scrollbar on Narbar Mobile
$(function () {
	$('.navbar-toggler').click(function () {
		$('body').toggleClass('noscroll');
	})
});

// Sticy Top Navbar
$(window).on("scroll", function () {
	var scroll = $(window).scrollTop();
	if (scroll >= 80) {
		$("#site-header").addClass("nav-fixed");
	} else {
		$("#site-header").removeClass("nav-fixed");
	}
});

//Main navigation Active Class Add Remove
$(".navbar-toggler").on("click", function () {
	$("header").toggleClass("active");
});
$(document).on("ready", function () {
	if ($(window).width() > 991) {
		$("header").removeClass("active");
	}
	$(window).on("resize", function () {
		if ($(window).width() > 991) {
			$("header").removeClass("active");
		}
	});
});

//Scroll to Top
window.onscroll = function () {
	scrollFunction()
};
function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		document.getElementById("movetop").style.display = "block";
	} else {
		document.getElementById("movetop").style.display = "none";
	}
}
function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

// Banner Carousel
$(document).ready(function () {
	$('.owl-one').owlCarousel({
		loop: true,
		dots: false,
		margin: 0,
		nav: true,
		responsiveClass: true,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 1000,
		autoplayHoverPause: false,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 1
			},
			667: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	})
})