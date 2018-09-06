(function($) {
	$.fn.modal = function(options, method) {
		var settings = $.extend(
			{
				blocker: '.blocker',
				modals: {},
			},
			options
		);
		var $this = this;
		function Methods() {
			var ths = this;
			ths.init = function() {
				return $this.each(function() {
					var _ = $(this);
					var modal_count;
					function click_open() {
						_.click(function(e) {
							e.preventDefault();
							open_modal();
						});
					}
					function click_close() {
						if ('#' + $(settings.btn_close).data('modal') == _.attr('href')) {
							$(settings.btn_close).click(function(e) {
								e.preventDefault();
								close_modal($(this));
							});
						}
					}
					function open_modal() {
						var id = _.attr('href').substr(1, _.attr('href').length);
						function activate_modal() {
							$(settings.to).addClass('animate-modal animate-' + id);
							$('.active-modal')
								.css('z-index', '8000')
								.attr('data-z', 8000);
							$('#' + id)
								.addClass('active-modal')
								.css('z-index', '9000')
								.attr('data-z', 9000);
						}
						if (_.hasClass('appender') && !$('#' + id).hasClass('active-modal')) {
							$(settings.to).addClass('modal-opened append-' + id);
							$(settings.to).append($('#' + id));
							setTimeout(function() {
								activate_modal();
								settings.after_open();
								obj_modals();
								count_modals();
							}, 50);
						} else if (!$('#' + id).hasClass('active-modal')) {
							$(settings.to).addClass('modal-opened append-' + id);
							activate_modal();
							settings.after_open();
							obj_modals();
							count_modals();
						}
					}
					function close_modal(elem) {
						var id = elem.data('modal');
						function deactivate_modal() {
							if (modal_count < 1) {
								$(settings.to).removeClass('animate-modal');
							}
							$(settings.to).removeClass('animate-' + id);
							$('#' + id)
								.removeClass('active-modal')
								.css('z-index', '')
								.attr('data-z', '');
						}
						function deactivate_wrapper() {
							if (modal_count < 1) {
								$(settings.to).removeClass('modal-opened');
							}
							$(settings.to).removeClass('append-' + id);
						}
						if (_.hasClass('appender')) {
							delete settings.modals['#' + id];
							count_modals();
							deactivate_modal();
							setTimeout(function() {
								$(settings.from).append($('#' + id));
								deactivate_wrapper();
								settings.after_close();
							}, 500);
						} else {
							delete settings.modals['#' + id];
							count_modals();
							deactivate_wrapper();
							deactivate_modal();
							settings.after_close();
						}
					}
					function obj_modals() {
						var from = settings.from;
						var modal = _.attr('href');
						if (from == '') {
							settings.modals[modal] = 'not_append';
						}
						settings.modals[modal] = from;
					}
					function close_all() {
						$(settings.blocker).click(function() {
							for (var key in settings.modals) {
								var elem = $('[data-modal="' + key.substr(1, key.length) + '"]');
								close_modal(elem);
							}
						});
					}
					function close_esc() {
						$('body').keyup(function(e) {
							if (e.key == 'Escape') {
								$(settings.blocker).click();
							}
						});
					}
					function z_modal() {
						$('.modal').click(function() {
							$('.active-modal').css('z-index', '8000');
							$(this).css('z-index', '9000');
						});
					}
					function count_modals() {
						var i = 0;
						for (var key in settings.modals) {
							i++;
						}
						modal_count = i;
					}
					click_open();
					click_close();
					close_all();
					close_esc();
					z_modal();
				});
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
