function checkFields() {
  messageError = "";
  if (document.innews.t_book.value == "Seleccione uno") {
    messageError += "\n     -  Tipo de Periodico";
  }
  if (document.innews.bookname.value == "") {
    messageError += "\n     -  Nombre del Periodico";
  }
  if (document.innews.ubicacion.value == "") {
    messageError += "\n     -  Ubicacion";
  }
  if (document.innews.date.value == "") {
    messageError += "\n     -  Publicado";
  }
  if (document.innews.category.value == "Seleccione uno") {
    messageError += "\n     -  Categoria";
  }
  if (document.innews.captcha.value == "") {
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