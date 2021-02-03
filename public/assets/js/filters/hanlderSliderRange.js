var handleIonRangeSlider = function() {
	$('#comissionValue').ionRangeSlider({
		min: 0,
		max: 100,
		type: 'double',
		prefix: "%",
		maxPostfix: "+",
		prettify: false,
		hasGrid: true,
		skin: 'big'
    });
    $('#priceValue').ionRangeSlider({
		min: 0,
		max: 5000,
		type: 'double',
		prefix: "R$",
		maxPostfix: "+",
		prettify: false,
		hasGrid: true,
		skin: 'big'
	});
};