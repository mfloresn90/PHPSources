function checkFields1() {
  messageError = "";
  if (document.start.iduser.value == "") {
    messageError += "\n     -  Id de usuario";
  }
  if (document.start.passw.value == "") {
    messageError += "\n     -  Password";
  }
  if (document.start.captcha.value == "") {
    messageError += "\n     -  Captcha";
  }
  if (messageError != "") {
    messageError = " * Recuerda que todos los campos son obligatorios:\n" + messageError;
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