// Progress
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

var linkActivator = new linkActivator({
	scrollContainer: '#scroll-container',
	link: '.link',
	sect: '.sect',
});

linkActivator.init();
//Mobile menu
var mob_menu = new mmenu({
	menu: '.mob-mnu',
	blocker: '.blocker',
	hamburger: '.hamburger',
	page: '.page',
});
mob_menu.init();

//Popup
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

//Slider
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

$('.mask-phone').mask('+7 (999) 999-99-99');

$('.sect').mousemove(function(e) {
	var x = e.screenX / 40 + 50 + '%';
	var y = e.screenY / 40 + '%';
	$('.bg-overlay-d').css('background-position', x + ' ' + y);
});

$(window).on('load', function() {
	var preloader = $('.preloader'),
		body = $('body');
	preloader.fadeOut();
	body.addClass('ready');
});
