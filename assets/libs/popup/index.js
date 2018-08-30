(function() {
	function SpacePopup(options) {
		var _ = this;
		_.opened;
		_.closed;
		_.close_btn = $(options.close_btn);
		_.link = $(options.popup) || $('.open-popup');
		_.body = $('body');
		_.transition = options.transition || 500;
		_.body_class;
		_.popup_class;
		_.btn_closed_class;
		_.visible_class;
		_.fun_open = options.when_open;
		_.fun_close = options.when_close;
		_.to = options.to;
		_.parent;
		_.ths_button;
		_.from = $(options.from);
		_.wrap = options.wrap;
		_.btn_open = function() {
			_.link.click(function(e) {
				e.preventDefault();
				var ths = $(this),
					str = options.popup.substr(1, options.popup.length),
					href = ths.attr('href');
				_.ths_button = ths;
				_.parent = ths.closest(_.wrap).find(_.to);
				if (ths.hasClass('appender')) {
					_.opened = _.from.find(href);
					_.parent.append(_.opened);
					_.parent.closest(_.wrap).addClass('appender-popup-wrap');
					_.visible_class = 'appender-popup';
				} else {
					_.visible_class = 'visible-popup';
					_.opened = $(href);
				}
				_.body_class = 'popup-' + str;
				_.popup_class = 'popup-opened-' + str;
				_.btn_closed_class = 'closed-' + str;
				_.opened.addClass(_.visible_class);
				_.close_btn.addClass(_.btn_closed_class);
				setTimeout(function() {
					_.body.addClass(_.body_class);
					_.opened.addClass(_.popup_class);
				}, 50);
				_.when_open();
			});
		};
		_.btn_close = function() {
			_.close_btn.click(function(e) {
				e.preventDefault();
				if (_.parent != undefined) {
					_.body.removeClass(_.body_class);
					if (_.parent.closest(_.wrap).hasClass('appender-popup-wrap')) {
						_.parent.closest(_.wrap).removeClass('appender-popup-wrap');
						_.opened.removeClass(_.visible_class);
						setTimeout(function() {
							_.from.append(_.opened);
						}, _.transition);
					}
					_.opened.removeClass(_.popup_class);
					setTimeout(function() {
						_.opened.removeClass(_.visible_class);
					}, _.transition);
					_.when_close();
				}
			});
		};
		_.close = function() {
			if (_.body_class != undefined && _.popup_class != undefined) {
				if (_.parent.closest(_.wrap).hasClass('appender-popup-wrap')) {
					_.parent.closest(_.wrap).removeClass('appender-popup-wrap');
					_.opened.removeClass(_.visible_class);
					setTimeout(function() {
						_.from.append(_.opened);
					}, _.transition);
				}
				_.body.removeClass(_.body_class);
				_.opened.removeClass(_.popup_class);
				_.close_btn.removeClass(_.btn_closed_class);
				_.when_close();
			}
		};
		_.when_open = function() {
			_.fun_open();
		};
		_.when_close = function() {
			_.fun_close();
		};
		_.init = function() {
			_.btn_open();
			_.btn_close();
		};
	}
	window.spop = SpacePopup;
})();
