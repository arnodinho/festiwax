(function( $ ) {

	"use strict";

		/* Click to Copy the Text */
		$(document).on('click', '.wpos-copy-clipboard', function() {
			var copyText = $(this);
			copyText.select();
			document.execCommand("copy");
		});
})(jQuery);