const dropdown = document.getElementById("tampilan");
const tabel = document.getElementById("table-jadwal");
const pie = document.getElementById("chart-container");

dropdown.addEventListener('change',function(){
    const pilihan= dropdown.value;
    // console.log("1");
    if(pilihan==="table"){
        alert(pilihan);
        pie.classList.add("hidden");
        tabel.classList.remove("hidden");
        tabel.classList.add("tertampil");
    }
    else if(pilihan==="semua"){
        alert(pilihan);
        tabel.classList.remove("hidden");
        pie.classList.remove("hidden");
        tabel.classList.remove("tertampil");
    }
    else{
        alert(pilihan);
        tabel.classList.remove("tertampil");
        pie.classList.add("tertampil");
        pie.classList.remove("hidden");
        tabel.classList.add("hidden");
    }
});