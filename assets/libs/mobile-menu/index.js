(function($) {
	$.fn.mmenu = function(options, method) {
		var settings = $.extend(
			{
				hamburger: '#hamburger',
				close_elements: '.blocker',
			},
			options
		);
		var $this = this;
		function Methods() {
			var _ = this;
			_.init = function() {
				return $this.each(function() {
					// $('.slider').bind('click.mmenu', _.say);
					_.click_open();
					_.click_close();
				});
			};
			_.click_open = function() {
				$(settings.btn).click(function() {
					$this.addClass('active-menu');
					$('body').addClass('mob-mnu-active');
					$(this).addClass('hamburger-active');
				});
			};
			_.click_close = function() {
				$(settings.close_elements).click(function() {
					_.close();
				});
			};
			_.close = function() {
				$this.removeClass('active-menu');
				$('body').removeClass('mob-mnu-active');
				$(settings.btn).removeClass('hamburger-active');
			};
		}
		var methods = new Methods();
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Метод с именем ' + method + ' не существует для jQuery.mmenu');
		}
	};
})(jQuery);
