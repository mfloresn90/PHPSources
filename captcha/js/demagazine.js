function checkFields() {
  messageError = "";
  if (document.demagazine.idbook.value == "") {
    messageError += "\n     -  Id de la Revista";
  }
  if (document.demagazine.concept.value == "") {
    messageError += "\n     -  Concepto";
  }
  if (document.demagazine.captcha.value == "") {
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