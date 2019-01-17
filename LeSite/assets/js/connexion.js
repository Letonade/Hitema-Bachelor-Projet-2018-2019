function fct_valider_connexion	()
{
	console.log("alert(Woh, stop la !)");
	console.log($("#formulaire"));
	alert("Woh, stop la !");
	
	$("#formulaire").attr('action',"./index-test.php");
	$("#formulaire").attr('target',"");
	$("#formulaire").submit();
}

function fct_verifier_connexion	()
{
	var param = new Array();
	param.push("sessionId=" + $("#sessionId").val());
	param.push("password=" + $("#password").val());

	var Request = $.ajax({
		url: 			'./assets/php/SessionModif.php',
		data: 			param.join('&'),
		method: 		"POST",
		dataType: 		"script"
	});


	Request.done(function(msg)
	{
		console.log("Request done : " + msg);
	});

	Request.fail(function(jqXHR, textStatus)
	{
		console.log(jqXHR);
		console.log("Request failed : " + textStatus);
	});

}