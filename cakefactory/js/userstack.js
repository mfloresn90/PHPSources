function checkFields() {
  messageError = "";
  if (document.upstack.name.value == "") {
    messageError += "\n     -  Nombre";
  }
  if (document.upstack.cantidad.value == "") {
    messageError += "\n     -  Cantidad";
  }
  if (document.upstack.unidad.value == "0") {
    messageError += "\n     -  Unidad";
  }
  if (messageError != "") {
    messageError = " * Recuerda que todos los campos son obligatorios:\n" + messageError;
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
/*****************************************************************************************************/
function checkFields3() {
  messageError = "";
  if (document.updatepass.oldpass.value == "") {
    messageError += "\n     -  Contrasena actual";
  }
  if (document.updatepass.newpass.value == "") {
    messageError += "\n     -  Contrasena nueva";
  }
  if (document.updatepass.reppass.value == "") {
    messageError += "\n     -  Repetir contrasena";
  }
  if (document.updatepass.reppass.value != document.updatepass.newpass.value) {
    messageError += "\n     -  Las contrasenas no son iguales, intentalo de nuevo";
  }
  if (messageError != "") {
    messageError = " * Recuerda que todos los campos son obligatorios:\n" + messageError;
    alert(messageError);
    return false;
  }
  else return true;
}

function valida3() {
    var resultado3 = true;
	  resultado3 = checkFields3();
  	return resultado3;
}