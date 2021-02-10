var loadProduct = function(){
	$("#load").click(function(){
        var intRegex  = /^\d+$/;
        var idProduto = $('#idProduto').val();
        if(!intRegex.test(idProduto) ){
            alert("Informe apenas numeros.");
        }else{
            window.location.href = "/loadproduct/"+idProduto;
        }
	});
}

var validateIdProduct = function(){
    $("#idProduto").validate({
        rules: {
            mobile_number: {required: true,number:true}
        },
        messages: {
            mobile_number: {required: "Please Enter Your Mobile Number",number:"Please enter numbers Only"}
        }
    });
}
var newProductDialog = function () {
	"use strict";
	return {
		//main function
		init: function () {
            loadProduct();
            validateIdProduct();
		}
	};
}();

$(document).ready(function() {
	newProductDialog.init();
});