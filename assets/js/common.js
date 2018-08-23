// Active link (linkactivator)
var linkActivator = new linkActivator({
	scrollContainer: '#scroll-container',
	link: '.link',
	sect: '.sect',
});
linkActivator.init();

// Animator
var arrDataNum = [],
	bool = false;
var animator = new Animator({
	scrollContainer: '#scroll-container',
	elems: '.anim-elem',
	animator: 'animator',
	offsetPercent: 80,
	handler: function() {
		if (
			this.thsElem.hasClass('num') &&
			this.thsElem.hasClass('animator') == false
		) {
			var el = this.thsElem.find('.number');
			for (var i = 0; i <= el.length; i++) {
				if ($(el[i]).data('num') != undefined) {
					arrDataNum.push($(el[i]).data('num'));
				}
			}
			if (el.length == arrDataNum.length) {
				el.each(function(i) {
					var ths = $(this),
						j = 0;
					function come(elem) {
						var docViewTop = $(window).scrollTop(),
							docViewBottom = docViewTop + $(window).height(),
							elemTop = elem.offset().top,
							elemBottom = elemTop + elem.height();
						if (elemBottom <= docViewBottom && elemTop >= docViewTop) {
							var interval = setInterval(function() {
								j++;
								if (j == arrDataNum[i]) {
									clearInterval(interval);
								}
								ths.text(j);
							}, 5000 / ths.data('num') - j);
							return true;
						} else {
							return false;
						}
					}
					come(ths);
				});
			}
		}
	},
});
animator.init();

// Progress Bar (site scroll)
var toolbar = $('.toolbar');
$('.screen-scroll').scroll(function() {
	var scrollTop = $(this)[0].scrollTop,
		scrollHeight = $(this)[0].scrollHeight,
		height = $(window).height(),
		progress = (100 * scrollTop) / (scrollHeight - height);
	$('.progress').css('width', progress + '%');
	if (scrollTop > 100) {
		toolbar.addClass('white-theme');
	} else {
		toolbar.removeClass('white-theme');
	}
});

// Mobile menu
var mob_menu = new mmenu({
	menu: '.mob-mnu',
	blocker: '.blocker',
	hamburger: '.hamburger',
	page: '.page',
});
mob_menu.init();

// Popup
var popup = new spop({
	popup: '.open-popup',
	close_btn: '.close-popup, .blocker',
	from: '.hidden',
	to: 'body',
	wrap: 'html',
	when_open: function() {},
	when_close: function() {},
});
popup.init();

// Slider
var space_slide = new sslider({
	slider: '.slider',
	row: 1,
	items: 1,
	items_slide: 1,
	res_w: true,
	res_h: true,
	arrow: '.control',
	responsive: {
		width: {
			'300': {
				loop: true,
				row: 1,
				items: 1,
				items_slide: 1,
			},
			'768': {
				loop: true,
				row: 1,
				items: 2,
				items_slide: 1,
			},
			'1200': {
				loop: true,
				row: 1,
				items: 3,
				items_slide: 1,
			},
		},
	},
	filter: true,
	filter_wrap: '.filter',
	chosen: '.filter-link',
	viewport: '.viewport',
	slide_line: '.slide-line',
	item: '.slide-item',
	automove: false,
	interval: 5000,
	loop: false,
});
space_slide.init();

// Mail sender
var successMsg = $('.message-success'),
	errorMsg = $('.message-error');
$('form').submit(function() {
	var th = $(this);
	$.ajax({
		url: 'mail',
		type: 'GET',
		data: th.serialize(),
	})
		.done(function(data) {
			setTimeout(function() {
				successMsg.addClass('notification-visible');
				th.trigger('reset');
			}, 1000);
			setTimeout(function() {
				successMsg.removeClass('notification-visible');
			}, 5000);
		})
		.fail(function() {
			setTimeout(function() {
				errorMsg.addClass('notification-visible');
				th.trigger('reset');
			}, 1000);
			setTimeout(function() {
				errorMsg.removeClass('notification-visible');
			}, 5000);
		});
	return false;
});

var offline = $('.offline'),
	online = $('.online'),
	notification = $('.notification');
window.addEventListener(
	'online',
	function(e) {
		$('.notification').removeClass('notification-visible');
		online.addClass('notification-visible');
		setTimeout(function() {
			online.removeClass('notification-visible');
		}, 5000);
	},
	false
);
window.addEventListener(
	'offline',
	function(e) {
		$('.notification').removeClass('notification-visible');
		offline.addClass('notification-visible');
		setTimeout(function() {
			offline.removeClass('notification-visible');
		}, 5000);
	},
	false
);

// Phone mask
$('.mask-phone').mask('+7 (999) 999-99-99');

// Parallax
$('.sect').mousemove(function(e) {
	var x = e.screenX / 40 + 50 + '%';
	var y = e.screenY / 40 + '%';
	$('.bg-overlay-d').css('background-position', x + ' ' + y);
});

// Preloader
$(window).on('load', function() {
	var preloader = $('.preloader'),
		body = $('body');
	preloader.fadeOut();
	body.addClass('ready');
});
