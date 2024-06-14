/*jshint esversion: 6 */
const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('nav ul');
const tabelLatihan = document.querySelector(".table-jadwal tabel");
const chart = document.querySelector(".chart-container");

menuToggle.addEventListener('click',  function(){
    nav.classList.toggle('slide');
});

function validasi(){
    const today = new Date();
    var date = document.getElementById("tanggal").value;
    var tanggal = new Date(date);
    
    if(tanggal<today){
        alert("Tanggal yang dimasukan salah");
        alert(tanggal);
    } else{
        console.log(1);
    }
    return;
}

function validasi2(){
  const today = new Date();
  var date = document.querySelector("#tanggal1").value;
  var date2 = document.querySelector("#tanggal2").value;
  var tanggal = new Date(date);
  var tanggal2 = new Date(date2);
  
  if(tanggal<today || tanggal>tanggal2){
      alert("Tanggal yang dimasukan salah");
      return;
  } else{
    console.log(1);
    return;
  }
}

function handleSubmit() {
    alert("Formulir belum bisa dikirim ke database untuk saat ini");
  }


  function validateForm() {
    var checkboxes = document.getElementsByClassName("hari");
    var isChecked = false;
  
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        isChecked = true;
        break;
      }
    }
  
    if (!isChecked) {
      alert("Minimal satu checkbox harus dipilih.");
      return false;
    }
  
    return true;
  }
  
  

  function validateForm2() {
    var checkboxes = document.getElementsById("al");
    var isChecked = false;
    
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        isChecked = true;
        break;
      }
    }
    
    if (!isChecked) {
      alert("Minimal satu checkbox harus dipilih.");
      return false;
    }
    
    return true;
  }


  function validatePDF(file) {
    // Get the MIME type from the file object
    const fileType = file.type;
  
    // Check if the MIME type starts with "application/pdf"
    if (fileType.startsWith('application/pdf')) {
      return true;
    } else {
      return false;
    }
  }
  
  
  function checkPDF(input) {
    const file = input.files[0];
    if (validatePDF(file)) {
      return true;
    } else {
      // The file is not a PDF
      alert('The file is not a PDF');
    }
  }
  
  

  function scrollToSection() {
    var section = document.getElementById("tutor");
    section.scrollIntoView();
  }

  function scrollToSection2() {
    var section = document.getElementById("bbo");
    section.scrollIntoView();
  }

function login(){
  window.location.href = '/login.php';
}

function regis(){
  window.location.href ="/register.php";
}

function about(){
  window.location.href ="/about.php";
}

function kosong(){
  window.location.href ="/Jadwal_Kosong.php";
}

function tambah1(){
  window.location.href ="/Form_jadwal_kosong.php";
}

function tambah2(){
  window.location.href ="/Form_Peminjaman_alat.php";
}