/**
 * Widget content handler script
 * Add color picker to widget options
 */
(function ($) {
	$(document).ready(function () {
		if ($.fn.wpColorPicker) {
			$('.wbfy-color-picker').wpColorPicker({
				change: function () {
					setTimeout(function () { $('.wbfy-color-picker').trigger('change'); }, 500);
				}
			});
		}
	});
})(jQuery);
