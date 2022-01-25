$(document).ready(function(){
	$("select.selectpicker").change(function(){
	var selectedOption = $(".selectpicker option:selected").val();
	//alert("You have selected: " + selectedOption);
	window.location.replace("http://ufv.ca/");
	window.location.href = selectedOption;
	});
});