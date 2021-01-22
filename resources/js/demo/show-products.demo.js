var handleClipboard = function() {
	var clipboard = new ClipboardJS('.btn');
	console.log("akshas");
	clipboard.on('success', function(e) {
		$(e.trigger).tooltip({
			title: 'Copied',
			placement: 'top'
		});
		$(e.trigger).tooltip('show');
		setTimeout(function() {
			var bootstrapVersion = handleCheckBootstrapVersion();
			if (bootstrapVersion >= 3 && bootstrapVersion < 4) {
				$(e.trigger).tooltip('destroy');
			} else if (bootstrapVersion >= 4 && bootstrapVersion < 5) {
				$(e.trigger).tooltip('dispose');
			}
		}, 500);
	});
};

var FormPlugins = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleClipboard();
		}
	};
}();

$(document).ready(function() {
	FormPlugins.init();
});