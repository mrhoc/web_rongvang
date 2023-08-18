$(document).ready(function () {

	var element = $('.home-6 .uk-slider');
	UIkit.slider(element);
	element.on('beforeitemhide', function () {
		console.log(123)
		$('.home-6 .uk-slider-items li.uk-active .caption').css({
			"opacity": 0
		})
	})
	element.on('itemhidden', function () {
		console.log(123)
		$('.home-6 .uk-slider-items li.uk-active .caption').css({
			"opacity": 1
		})
	})


	switchImageIndex();
	awardSwitchSlide();
	initSlider();
	memberSwitch();
	changeContactMapSrc();
	setupImgBottomList();
	clickViewMoreLoadAjax();
	addClassHeaderWhenScroll();
	changeViewProduct();
	setWidthLineInSlider();
	$(window).resize(function () {
		setupImgBottomList();
		setWidthLineInSlider();
	});
	$(".product-detail-attributes .tab-content").hide();

	$("#newsSideNav").append($(".news-sidenav-detail"));
	$("#projectSidebar").append($(".project-sidenav"));

	var elm = document.querySelector(".subnav-wrapper ul");
	var ms = new MenuSpy(elm, {
		threshold: 50
	});

	if ($(".project-zone-nav .zone-child").hasClass("active")) {
		$(".project-zone-nav .zone-all").removeClass("active");
	}

	$(".product-change-view a")
		.eq(0)
		.trigger("click");
	$(".gallery-list a[data-fancybox]").fancybox({
		thumbs: {
			autoStart: true,
			axis: "x"
		}
	});

});




const menuMobileMapping = new MappingListener({
	selector: ".menu-wrapper",
	mobileWrapper: ".mobile-menu",
	mobileMethod: "appendTo",
	desktopWrapper: ".bottom-nav",
	desktopMethod: "appendTo",
	breakpoint: 1025
}).watch();

var iconSlider = new Swiper(".home-7 .icon-slider .swiper-container", {
	slidesPerView: 2,
	autoplay: {
		delay: 4000
	},
	slideToClickedSlide: true,
	breakpoints: {
		768: {
			slidesPerView: 3,
			spaceBetween: 20
		},
		1025: {
			slidesPerView: 4
		}
	}
});

var processSlider = new Swiper(".home-7 .process-slider .swiper-container", {
	slidesPerView: 1,
	spaceBetween: 30,
	navigation: {
		prevEl: ".process-slider .swiper-prev",
		nextEl: ".process-slider .swiper-next"
	},
	thumbs: {
		swiper: iconSlider
	}
});

var processSlider2 = new Swiper(
	".solution-6 .process-slider .swiper-container", {
		slidesPerView: 2,
		spaceBetween: 30,
		navigation: {
			prevEl: ".solution-6 .process-slider .swiper-prev",
			nextEl: ".solution-6 .process-slider .swiper-next"
		},
		breakpoints: {
			320: {
				slidesPerView: 2
			},
			576: {
				slidesPerView: 3
			},
			768: {
				slidesPerView: 4
			},
			1025: {
				slidesPerView: 5
			}
		}
	}
);

var iconSlider2 = new Swiper(".development-4 .icon-slider .swiper-container", {
	slidesPerView: 1,
	spaceBetween: 30,
	breakpoints: {
		360: {
			slidesPerView: 2
		},
		576: {
			slidesPerView: 3
		},
		768: {
			slidesPerView: 4
		},
		1025: {
			slidesPerView: 5
		}
	}
});

var contentSlider = new Swiper(
	".development-4 .content-slider .swiper-container", {
		spaceBetween: 30,
		navigation: {
			prevEl: ".development-4 .content-slider .swiper-prev",
			nextEl: ".development-4 .content-slider .swiper-next"
		},
		thumbs: {
			swiper: iconSlider2
		}
	}
);

var memberSlider = new Swiper(
	".development-2 .member-slider .swiper-container", {
		slidesPerView: 2,
		spaceBetween: 10,
		navigation: {
			prevEl: ".development-2 .member-slider .swiper-prev",
			nextEl: ".development-2 .member-slider .swiper-next"
		},
		breakpoints: {
			320: {
				slidesPerView: 1
			},
			576: {
				slidesPerView: 2
			},
			768: {
				slidesPerView: 3
			},
			1025: {
				slidesPerView: 4
			}
		}
	}
);

var historySlider = new Swiper(".history-slider .swiper-container", {
	slidesPerView: 1,
	spaceBetween: 30,
	slideToClickedSlide: true,
	navigation: {
		prevEl: ".history-slider .swiper-prev",
		nextEl: ".history-slider .swiper-next"
	},
	breakpoints: {
		1025: {
			spaceBetween: 0,
			slidesPerView: 3,
			direction: "vertical",
			height: 1000
		}
	}
});

var productThumbnailSlider = new Swiper(
	".product-image-list .thumbnail-slide .swiper-container", {
		slidesPerView: 3,
		spaceBetween: 16,
		navigation: {
			prevEl: ".product-image-list .thumbnail-slide .swiper-prev",
			nextEl: ".product-image-list .thumbnail-slide .swiper-next"
		},
		breakpoints: {
			576: {
				slidesPerView: 5,
				direction: "vertical",
				spaceBetween: 16,
				height: 535
			}
		}
	}
);

var productImageSlider = new Swiper(
	".product-image-list .image-slide .swiper-container", {
		slidesPerView: 1,
		spaceBetween: 16,
		thumbs: {
			swiper: productThumbnailSlider
		}
	}
);

function setupImgBottomList() {
	var topH = $(".img-list-wrapper .top-list").height();
	var topW = $(".img-list-wrapper .top-list").width();

	$(".img-list-wrapper .bottom-list").height(topH);
	$(".img-list-wrapper .bottom-list").width(topW);
}

function switchImageIndex() {
	$(".img-list-wrapper .img-item a").click(function (e) {
		e.preventDefault();
		var index = $(this).data("index");
		$(".img-list-wrapper .img-item").removeClass("active");
		$(this)
			.parent()
			.addClass("active");
		$(".about-2 .content-wrapper").hide();
		$(".about-2 .content-wrapper[data-index='" + index + "']").show();
	});
}

function awardSwitchSlide() {
	var $switch = UIkit.switcher(".about-3 .uk-subnav", {
		animation: "uk-animation-fade",
		swiping: false,
		connect: ".about-3 .tabs-container"
	});
	var awardSlider = new Swiper($(".award-slider .swiper-container"), {
		slidesPerView: 1,
		spaceBetween: 30,
		centeredSlides: true,
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true
		},
		initialSlide: 1,
		breakpoints: {
			576: {
				slidesPerView: 2,
				spaceBetween: 0
			},
			1025: {
				slidesPerView: 3
			}
		}
	});

	$(".about-3 .tab-content").hide();

	$(".about-3 .uk-slider-items li").click(function (event) {
		event.preventDefault();
		$(".about-3 .uk-slider-items li a").removeClass("active");
		$(this)
			.children("a")
			.addClass("active");
		var idVal = $(this).index();
		$switch.show(idVal);
	});

	$(".about-3 .uk-slider-items li")
		.eq(0)
		.click();
}

function numberWithDots(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function initSlider() {
	$(".square-slider").slider({
		range: "min",
		min: 16,
		slide: function (event, ui) {
			$("#square_unit").text(ui.value);
		},
		change: function (event, ui) {
			$("#hdSquare").text(ui.value);
			$("#hdSquare").val(ui.value);
		}

	});

	$(".bill-slider").slider({
		range: "min",
		max: 10000000,
		step: 1000,
		slide: function (event, ui) {
			$("#bill_unit").val(numberWithDots(ui.value));
		},
		change: function (event, ui) {
			$("#bill_unit").val(numberWithDots(ui.value));
		}
	});

	$(".rate-slider").slider({
		range: "min",
		max: 100,
		step: 0.1,
		slide: function (event, ui) {
			$("#rate_unit").val(numberWithDots(ui.value));
		},
		change: function (event, ui) {
			$("#rate_unit").val(numberWithDots(ui.value));
		}
	});

	$("#square_unit").text($(".square-slider").slider("value"));

	$("#bill_unit").val($(".bill-slider").slider("value"));
	$("#bill_unit").on("change", function () {
		$(".bill-slider").slider("value", $(this).val());
	});

	$("#rate_unit").val($(".rate-slider").slider("value"));
	$("#rate_unit").on("change", function () {
		$(".rate-slider").slider("value", $(this).val());
	});
}

function memberSwitch() {
	$(".member-tabs .member-content")
		.eq(0)
		.addClass("show");
	$(".member-slider .item")
		.eq(0)
		.addClass("active");
	$(".member-slider .item").click(function (e) {
		e.preventDefault();
		$(".member-slider .item").removeClass("active");
		$(this).addClass("active");
		var index = $(this).data("index");
		$(".member-tabs .member-content").removeClass("show");
		$(".member-tabs .member-content[data-index='" + index + "']").addClass(
			"show"
		);
	});
}

function changeContactMapSrc() {
	$(".address-slider .item").click(function () {
		$(".address-slider .item").removeClass("active");
		$(this).addClass("active");
		var src = $(this).data("src");
		$("#contactMap").attr("src", src);
	});

	$(".address-slider .item")
		.eq(0)
		.trigger("click");
}

function clickViewMoreLoadAjax() {
	var isLoading = false;
	$("body").on("click", "a.ajaxpagerlink", function (e) {
		e.preventDefault();
		let obj = $(this);
		let pageurl = $(this).attr("href");
		if (!pageurl.length) return;

		$.ajax({
			url: pageurl,
			data: {
				isajax: true
			},
			success: function success(data) {
				$(".ajaxresponse .ajaxresponsewrap").append(
					$(data)
					.find(".ajaxresponsewrap")
					.html()
				);
				$(".ajaxresponse .ajaxresponsewrap").after(
					$(data).find(".faq-view-more")
				);

				// obj.remove();
				isLoading = false;
				obj.parent().remove();
			}
		});
		return false;
	});
}

function addClassHeaderWhenScroll() {
	let zero = 0;
	$(window).on("scroll", function () {
		$("header").toggleClass("minimal", $(window).scrollTop() > zero);
	});
}

function changeViewProduct() {
	$(".product-change-view a").click(function (e) {
		e.preventDefault();
		$(".product-change-view li").removeClass("active");
		$(this)
			.parent()
			.addClass("active");
		var view = $(this).data("view");
		$(".product-view").removeClass("show");
		$(".product-view[data-view='" + view + "']").addClass("show");
	});
}

function setWidthLineInSlider() {
	if ($(".solution-6").length > 0) {
		var offLeft = $(".process-slider .icon")
			.eq(0)
			.offset().left;
		var containerWidth = $(".process-slider .swiper-container").width();
		$(".process-slider .line").css({
			width: containerWidth - 30 - offLeft / 2
		});
	}
	if ($(".development-4").length > 0) {
		var offLeft1 = $(".development-4 .icon")
			.eq(0)
			.offset().left;
		var containerWidth2 = $(".development-4 .swiper-container").width();
		$(".development-4 .line").css({
			width: containerWidth2 - 30 - offLeft1 / 2
		});
	}
}