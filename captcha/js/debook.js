function checkFields() {
  messageError = "";
  if (document.debook.idbook.value == "") {
    messageError += "\n     -  Id del Libro";
  }
  if (document.debook.concept.value == "") {
    messageError += "\n     -  Concepto";
  }
  if (document.debook.captcha.value == "") {
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