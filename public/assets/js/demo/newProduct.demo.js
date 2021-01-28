if (!Array.prototype.indexOf) {
	Array.prototype.indexOf = function(elt /*, from*/) {
    	var len = this.length >>> 0;
    	var from = Number(arguments[1]) || 0;
    	from = (from < 0) ? Math.ceil(from) : Math.floor(from);
    	if (from < 0)
      		from += len;

    	for (; from < len; from++) {
      		if (from in this && this[from] === elt)
        		return from;
    	}
    	return -1;
	};
}
if(typeof String.prototype.trim !== 'function') {
	String.prototype.trim = function() {
		return this.replace(/^\s+|\s+$/g, ''); 
	}
}

var handleJqueryTagIt = function() {
	$('#format').tagit({
		availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
	});
	$('#jquery-tagIt-inverse').tagit({
		availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
	});
	$('#jquery-tagIt-white').tagit({
		availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
	});
	$('#jquery-tagIt-primary').tagit({
		availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
	});
	$('#jquery-tagIt-info').tagit({
		availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
	});
	$('#jquery-tagIt-success').tagit({
		availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
	});
	$('#jquery-tagIt-warning').tagit({
		availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
	});
	$('#jquery-tagIt-danger').tagit({
		availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
	});
};


var newProduct = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleJqueryTagIt();
		}
	};
}();

$(document).ready(function() {
	newProduct.init();
});