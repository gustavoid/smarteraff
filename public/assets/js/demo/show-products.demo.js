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

var handleDatepicker = function() {
	$('#datepicker-default').datepicker({
		todayHighlight: true
	});
	$('#datepicker-inline').datepicker({
		todayHighlight: true
	});
	$('.input-daterange').datepicker({
		todayHighlight: true
	});
	$('#datepicker-disabled-past').datepicker({
		todayHighlight: true
	});
	$('#datepicker-autoClose').datepicker({
		todayHighlight: true,
		autoclose: true
	});
};

var handleDateRangePicker = function() {
	$('#default-daterange').daterangepicker({
		opens: 'right',
		format: 'MM/DD/YYYY',
		separator: ' to ',
		startDate: moment().subtract('days', 29),
		endDate: moment(),
		minDate: '01/01/2012',
		maxDate: '12/31/2018',
	}, function (start, end) {
		$('#default-daterange input').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	});

	$('#advance-daterange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

	$('#advance-daterange').daterangepicker({
		format: 'MM/DD/YYYY',
		startDate: moment().subtract(29, 'days'),
		endDate: moment(),
		minDate: '01/01/2012',
		maxDate: '12/31/2015',
		dateLimit: { days: 60 },
		showDropdowns: true,
		showWeekNumbers: true,
		timePicker: false,
		timePickerIncrement: 1,
		timePicker12Hour: true,
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		},
		opens: 'right',
		drops: 'down',
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-primary',
		cancelClass: 'btn-default',
		separator: ' to ',
		locale: {
			applyLabel: 'Submit',
			cancelLabel: 'Cancel',
			fromLabel: 'From',
			toLabel: 'To',
			customRangeLabel: 'Custom',
			daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
			monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
			firstDay: 1
		}
	}, function(start, end, label) {
		$('#advance-daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	});
};


var handleDateTimePicker = function() {
	$('#datetimepicker1').datetimepicker();
	$('#datetimepicker2').datetimepicker({
		format: 'LT'
	});
	$('#datetimepicker3').datetimepicker();
	$('#datetimepicker4').datetimepicker();
	$("#datetimepicker3").on("dp.change", function (e) {
		$('#datetimepicker4').data("DateTimePicker").minDate(e.date);
	});
	$("#datetimepicker4").on("dp.change", function (e) {
		$('#datetimepicker3').data("DateTimePicker").maxDate(e.date);
	});
};

function displayNewNote(){
	$("#note").show();
	$("#salvarNota").show();
	$("#cancelarNota").show();
}

function hideNewNote(){
	$("#note").hide();
	$("#salvarNota").hide();
	$("#cancelarNota").hide();
}

function displayEditAbout(){
	$("#about").hide();
	$("#btnAbout").hide();
	$("#editAbout").val($("#about").text());
	$("#editAbout").show();
	$("#salvarAbout").show();
	$("#cancelarAbout").show();
}

function hideEditAbout(){
	$("#btnAbout").show();
	$("#about").show();
	$("#editAbout").hide();
	$("#salvarAbout").hide();
	$("#cancelarAbout").hide();
}

var showProducts = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleClipboard();
			handleDateRangePicker();
			handleDateTimePicker();
			handleDatepicker();
		}
	};
}();



$(document).ready(function() {
	showProducts.init();
});