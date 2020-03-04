//validasi inputan form ketika kosong atau belum memenuhi suatu peraturan tertentu
function validasi_input(form){
	var minchar = 8; //membuat minimal char dari inputan username
	pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
	//membuat pattern inputan email
  
    //validasi dimulai
	
	if(form.company_name.value==""){
		alert("Company Name or Agent Name must be filled!");
		form.company_name.focus();
		return (false);
	} else if(form.first_name.value==""){
		alert("First Name must be filled!");
		form.first_name.focus();
		return (false);
	} else if(form.last_name.value==""){
		alert("Last Name must be filled!");
		form.last_name.focus();
		return (false);
	} else if(form.contact_number.value==""){
		alert("Contact Number must be filled!");
		form.contact_number.focus();
		return (false);
	} else if(form.time.value==""){
		alert("You must select the time!");
		form.time.focus();
		return (false);
	} else if(form.checkbox1.value==""){
		alert("You must check the agreement!");
		form.checkbox1.focus();
		return (false);
	} else if(form.email_address.value==""){
		alert("Email Address must be filled!");
		form.email_address.focus();
		return (false);
	} else if(!pola_email.test(form.email.value)){
		alert("Format Email Address Invalid!");
		form.email_address.focus();
		return (false);
	} else {
		return (true);
	}
	
    /*
	if (form.username.value=="") {
		alert("Username Harus Diisi!");
		form.username.focus();
		return (false);
    } else if (form.username.value.length <= minchar) {
		alert("Username Harus Lebih dari 8 Karakter!");
		form.username.focus();
		return (false);
    }else if (form.email.value=="") {
		alert("Email Harus Diisi!");
		form.username.focus();
		return (false);
	} else if (!pola_email.test(form.email.value)){
		alert ('Penulisan Email tidak benar');
		form.email.focus();
		return (false);
	} else if (form.password_1.value==""){
		alert("Password Tidak Boleh kosong!");
		form.password.focus();
		return (false);
	} else if (form.password_2.value==""){
		alert("Password Tidak Boleh kosong!");
		form.password_ulangi.focus();
		return (false);
	} else {
		return (true);
	}*/
}

function validasi_input_appointment(form){
	if(form.country.value==""){
		alert("Your have to choose Country!");
		form.country.focus();
		return (false);
	} else {
		return (true);
	}
}

function validasi_input_login(form){
	if (form.username.value=="") {
		alert("Username Harus Diisi!");
		form.username.focus();
		return (false);
	} else if (form.password.value=="") {
		alert("Password Harus Diisi!");
		form.password.focus();
		return (false);
	} else {
		return (true);
	}
}

function validasi_input_admin(form){
	if(form.country.value==""){
		alert("Your have to choose Country!");
		form.country.focus();
		return (false);
	} else {
		return (true);
	}
}



 /*
 //membuat validasi password 1 dan password 2 (pencocokan)
 function checkPass() {

    //mengambil object dan dimasukan ke variabel 
    var pass_1 = document.getElementById('password_1');
    var pass_2 = document.getElementById('password_2');
    //mengambil object dan dimasukan ke variabel 
    var message = document.getElementById('pesan');
    //inisialisasi warna didalam variabel
    var warnabenar = "#66cc66";
    var warnasalah = "#ff6666";
    //membandingkan 2 variabel
    if(pass_1.value == pass_2.value){
        //ketika password benar 
        //ubah menjadi warna jelek
        //memeberi peringatanya bahwa benar
        document.validasi_form.daftar_process.disabled=false;
        pass_2.style.backgroundColor = warnabenar;
        message.style.color = warnabenar;
        message.innerHTML = ""
    }else{
        //ini ketika password tidak cocok
        //ubah menjadi warna jelek
        //memeberi peringatanya bahwa salah dengan tanda seru
        document.validasi_form.daftar_process.disabled = true;
        alert("Password tidak Cocok!");
        pass_2.style.backgroundColor = warnasalah;
        message.style.color = warnasalah;
        message.innerHTML = "!"
    }
}*/