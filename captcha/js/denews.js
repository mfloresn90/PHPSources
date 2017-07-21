function checkFields() {
  messageError = "";
  if (document.denews.idbook.value == "") {
    messageError += "\n     -  Id del Periodico";
  }
  if (document.denews.concept.value == "") {
    messageError += "\n     -  Concepto";
  }
  if (document.denews.captcha.value == "") {
    messageError += "\n     -  Captcha";
  }
  if (messageError != "") {
    messageError = " * Recuerda que son campos obligatorios:\n" + messageError;
    alert(messageError);
    return false;
  }
  else return true;
}

function valida() {
    var resultado = true;
	  resultado = checkFields();
  	return resultado;
}