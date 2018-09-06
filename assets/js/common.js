(function() {
	function Selector(options) {
		var _ = this;
		_.selector = $('.Selector');
		_.build = function() {
			_.selector.each(function(i) {
				$(this).wrap('<div class="wrapSelector"></div>');
				$(this)
					.parent()
					.append('<div class="select-head"></div>');
				$(this)
					.parent()
					.append('<ul class="select-list"></ul>');
				var opt = $(this).find('option');
				var ul = [];
				opt.each(function(i) {
					var wrap = opt
						.parent()
						.parent()
						.find('ul');
					var selectHead = opt
						.parent()
						.parent()
						.find('.select-head');
					ul.push($(this).text());
					if (ul.length == opt.length) {
						for (var i = 0; i < ul.length; i++) {
							selectHead.text(ul[0]);
							if (ul[i + 1] != undefined) {
								wrap.append('<li>' + ul[i + 1] + '</li>');
							}
						}
					}
					if (opt.length == i + 1) {
						ul = [];
					}
				});
			});
		};
		_.init = function() {
			_.build();
		};
	}
	window.Selector = Selector;
})();

var selector = new Selector({
	input: '.select',
});
selector.init();

//Mobile menu
$('#mob-mnu').mmenu({
	btn: '#hamburger',
	close_elements: '.blocker',
});

// LinkActivator
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
		if (this.thsElem.hasClass('num') && this.thsElem.hasClass('animator') == false) {
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

// Progress
var toolbar = $('.toolbar');
$('.screen-scroll').scroll(function() {
	var scrollTop = $(this)[0].scrollTop,
		scrollHeight = $(this)[0].scrollHeight,
		height = $(window).height(),
		progress = (100 * scrollTop) / (scrollHeight - height);
	$('.progress').css('width', progress + '%');
	if (scrollTop > 100) {
		toolbar.addClass('active-toolbar');
	} else {
		toolbar.removeClass('active-toolbar');
	}
});

//Popup
$('.open-modal').modal({
	btn_close: '.close-modal',
	from: '#Hidden__Container',
	to: 'body',
	after_open: function() {
		console.log('hi');
	},
	after_close: function() {
		console.log('hui');
	},
});

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

var preload = $('.inner-preload'),
	width = 0,
	timeout = 2000,
	inter = 50,
	interval = setInterval(function() {
		width += (inter / timeout) * 100; // / 1000;
		preload.css('width', width + '%');
	}, inter);

setTimeout(function() {
	var preloader = $('.preloader');
	preloader.fadeOut();
	clearInterval(interval);
	preload.css('width', '100%');
}, timeout);
$(window).on('load', function() {
	var body = $('body');
	body.addClass('ready');
});
