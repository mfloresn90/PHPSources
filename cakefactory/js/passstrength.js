function passstrength(password) {
	var desc = new Array();
	desc[0] = "Muy debil";
	desc[1] = "Debil";
	desc[2] = "Mejor";
	desc[3] = "Mas mejor";
	desc[4] = "Seguro";
	desc[5] = "Muy seguro";
	desc[6] = "Extra seguro";

	var score   = 0;

	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score += 1;

	if (password.match(/\d+/)) score += 2;

	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score += 3;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}