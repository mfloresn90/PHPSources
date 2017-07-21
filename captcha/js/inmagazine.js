function checkFields() {
  messageError = "";
  if (document.inmagazine.t_book.value == "Seleccione uno") {
    messageError += "\n     -  Tipo de Revista";
  }
  if (document.inmagazine.bookname.value == "") {
    messageError += "\n     -  Nombre de la Revista";
  }
  if (document.inmagazine.ubicacion.value == "") {
    messageError += "\n     -  Ubicacion";
  }
  if (document.inmagazine.date.value == "") {
    messageError += "\n     -  Publicado";
  }
  if (document.inmagazine.category.value == "Seleccione uno") {
    messageError += "\n     -  Categoria";
  }
  if (document.inmagazine.captcha.value == "") {
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