$(document).ready(function () {
    $('.slick-carousel').slick({
        dots: true,
        speed: 300,
        slidesToShow: 1,
        arrows: false,
        adaptiveHeight: true,
        infinite: false
    });

	$("#menu").on("click","a", function (event) {
		event.preventDefault();
		var id = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1500);
	});

	$("#menuMobile").on("click","a", function (event) {
		event.preventDefault();
		var id = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1500);
		$('#underLayer').removeClass('active');
	});

    $('.zoom-image').click(function (event) {
        var imageSrc = event.target.src,
            zoomerImage = document.getElementById('zoomerImage');

        if (imageSrc) {
            zoomerImage.src = imageSrc;

            zoomerImage.onload = function () {
                $('#zoomerWrapper').addClass('active');
            }
        }
    })


	$('#menuButton').click(function (event) {
		$('#underLayer').addClass('active');
	})

	$('#underLayer').click(function (event) {
		if (event.target===this)
			$('#underLayer').removeClass('active');
	})

	$('#closeMobileMenu').click(function (event) {
		if (event.target===this)
			$('#underLayer').removeClass('active');
	})


    $(window).scroll(hideZoomerWrapper);

    $('#zoomerWrapper').click(hideZoomerWrapper);

    function hideZoomerWrapper(e) {
        $('#zoomerWrapper').removeClass('active');
    }

	$(window).scroll(function () {
		var header = $("#section-header");

		if($(this).scrollTop() > 0) {
			header.toggleClass("active", true);
		} else {
			header.toggleClass("active", false);
		}

	});

    particlesJS.load('particles-js', 'media/assets/particles.json', function() {
        // console.log('callback - particles.js config loaded');
    });


	function isElementInViewport (el) {
		if (typeof jQuery !== 'undefined' && el instanceof jQuery) el = el[0];
		var rect = el.getBoundingClientRect();
		var windowHeight = (window.innerHeight || document.documentElement.clientHeight);
		var windowWidth = (window.innerWidth || document.documentElement.clientWidth);
		var vertInView = (rect.top <= windowHeight) && ((rect.top + rect.height) >= 0);
		var horInView = (rect.left <= windowWidth) && ((rect.left + rect.width) >= 0);
		return (vertInView && horInView);
	}



	var menu_selector = ".menu-list";

	function onScroll(){
		var scroll_top = $(document).scrollTop();
		$(menu_selector + " a").each(function(){
			var hash = $(this).attr("href");
			var target = $(hash);
			if (target.position().top <= scroll_top && target.position().top + target.outerHeight() > scroll_top) {
				$(menu_selector + " a.active").removeClass("active");
				$(this).addClass("active");
			} else {
				$(this).removeClass("active");
			}
		});
	}

	$(document).ready(function () {

		$(document).on("scroll", onScroll);

		$("menu a").click(function(e){
			e.preventDefault();

			$(document).off("scroll");
			$(menu_selector + " a.active").removeClass("active");
			$(this).addClass("active");
			var hash = $(this).attr("href");
			var target = $(hash);

			$("html, body").animate({
				scrollTop: target.offset().top
			}, 500, function(){
				window.location.hash = hash;
				$(document).on("scroll", onScroll);
			});

		});

	});

    var videoEl = $("#videoBg");

	function setSectionSize(){
        var section1 = $("#section1");
		if ($(window).width() > '640') {
			section1.height($(window).width()*480/1200);
		} else {
            section1.attr('style', '');
		}
    }

    videoEl.onload = setSectionSize();

	$("#loading").delay(500).fadeOut(1000);

});

$(window).resize(function(){
    var section1 = $("#section1");
    if ($(window).width() > '640') {
        section1.height($(window).width()*480/1200);
	} else {
        section1.attr('style', '');
	}
});