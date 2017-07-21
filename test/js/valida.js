function checkFields() {
  messageError = "";
  if (document.registro.nombre.value == "") {
    messageError += "\n     -  Nombre completo";
  }
  if (document.registro.pass.value == "") {
    messageError += "\n     -  Contrasena";
  }
  if (document.registro.cuenta.value == "") {
    messageError += "\n     -  Numero de cuenta";
  }
  if (document.registro.fecha.value == "") {
    messageError += "\n     -  Fecha de nacimiento";
  }
  if (document.registro.sexo.value == "0") {
    messageError += "\n     -  Sexo";
  }
  if (document.registro.email.value == "") {
    messageError += "\n     -  Email";
  }
  if (document.registro.carrera.value == "0") {
    messageError += "\n     -  Carrera";
  }
  if (document.registro.captcha.value == "") {
    messageError += "\n     -  Captcha";
  }
  if (messageError != "") {
    messageError = " * Recuerda que son campos obligatorios:\n" + messageError;
    alert(messageError);
    return false;
  }
  else return true;
}

var testresults
function checkEmail() {
    var str = document.registro.email.value
    var filter= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    if (filter.test(str))
        testresults = true
         else{
            alert("\n     -  E-mail invalido")
            testresults = false
         }
         return (testresults)
}

function valida() {
    var resultado = true;
	  resultado = checkFields() && checkEmail();
  	return resultado;
}
/**************************************************************************************************/
function checkFields1() {
  messageError = "";
  if (document.login.ncuenta.value == "") {
    messageError += "\n     -  Numero de cuenta";
  }
  if (document.login.pass.value == "") {
    messageError += "\n     -  Contrasena";
  }
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
/**************************************************************************************************/
function checkFields2() {
  messageError = "";
  if (document.delete_user.iduser.value == "") {
    messageError += "\n     -  Numero de cuenta";
  }

  if (messageError != "") {
    messageError = " * Recuerda que son campos obligatorios:\n" + messageError;
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
/**************************************************************************************************/
function checkFields3() {
  messageError = "";
  if (document.update_user.oldpass.value == "") {
    messageError += "\n     -  Contrasena actual";
  }
  if (document.update_user.newpass.value == "") {
    messageError += "\n     -  Nueva contrasena";
  }
  if (document.update_user.reppass.value == "") {
    messageError += "\n     -  Repetir contrasena";
  }
  if (document.update_user.newpass.value != document.update_user.reppass.value) {
    messageError += "\n     -  Las contrasenas no coinciden";
  }

  if (messageError != "") {
    messageError = " * Recuerda que son campos obligatorios:\n" + messageError;
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
/**************************************************************************************************/