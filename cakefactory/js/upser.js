function checkFields() {
  messageError = "";
  if (document.upser.name.value == "") {
    messageError += "\n     -  Nombre";
  }
  if (document.upser.lastname.value == "") {
    messageError += "\n     -  Apellidos";
  }
  if (document.upser.address.value == "") {
    messageError += "\n     -  Direccion";
  }
  if (document.upser.phone.value == "") {
    messageError += "\n     -  Telefono";
  }
  if (document.upser.typeuser.value == "0") {
    messageError += "\n     -  Tipo de usuario";
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
function checkFields1() {
  messageError = "";
  if (document.douser.iduser.value == "") {
    messageError += "\n     -  Id de usuario";
  }
  if (document.douser.concept.value == "") {
    messageError += "\n     -  Concepto";
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
/*****************************************************************************************************/
function checkFields2() {
  messageError = "";
  if (document.upprov.nameprov.value == "") {
    messageError += "\n     -  Nombre del proveedor";
  }
  if (document.upprov.rfc.value == "") {
    messageError += "\n     -  RFC";
  }
  if (document.upprov.addressprov.value == "") {
    messageError += "\n     -  Direccion";
  }
  if (document.upprov.phoneprov.value == "") {
    messageError += "\n     -  Telefono";
  }
  if (messageError != "") {
    messageError = " * Recuerda que todos los campos son obligatorios:\n" + messageError;
    alert(messageError);
    return false;
  }
  else return true;
}

function valida2() {
    var resultado2 = true;
	  resultado2 = checkFields2();
  	return resultado2;
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