var loadProduct = function(){
	$("#load").click(function(){
		alert("laskj");
	});
}
var newProductDialog = function () {
	"use strict";
	return {
		//main function
		init: function () {
			loadProduct();
		}
	};
}();

$(document).ready(function() {
	newProductDialog.init();
});