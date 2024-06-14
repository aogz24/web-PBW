function login(){
    const email = document.getElementById("email").value;
    const password = document.getElementById("user-password").value;
    
    if(email==="admin@gmail.com"&&password==="admin"){
        alert("Berhasil Login");
        window.location.href = 'home.html';
    } else{
        alert("Email atau password salah");
    }
}
