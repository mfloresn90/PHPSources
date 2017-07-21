function checkFields() {
  messageError = "";
  if (document.inbook.t_book.value == "Seleccione uno") {
    messageError += "\n     -  Tipo de Libro";
  }
  if (document.inbook.bookname.value == "") {
    messageError += "\n     -  Nombre del Libro";
  }
  if (document.inbook.editorial.value == "") {
    messageError += "\n     -  Editorial";
  }
  if (document.inbook.ubicacion.value == "") {
    messageError += "\n     -  Ubicacion";
  }
  if (document.inbook.date.value == "") {
    messageError += "\n     -  Publicado";
  }
  if (document.inbook.autor.value == "Seleccione uno") {
    messageError += "\n     -  Autor";
  }
  if (document.inbook.category.value == "Seleccione uno") {
    messageError += "\n     -  Categoria";
  }
  if (document.inbook.captcha.value == "") {
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