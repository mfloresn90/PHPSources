function checkFields1() {
  messageError = "";
  if (document.login.captcha.value == "") {
    messageError += "\n     -  Captcha";
  }
  if (messageError != "") {
    messageError = " * Recuerda que son campos obligatorios:\n" + messageError;
    alert(messageError);
    return false;
  }
  else return true;
}

function valida1() {
    var resultado1 = true;
	  resultado1 = checkFields1();
  	return resultado1;
}
