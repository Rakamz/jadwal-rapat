    // Ambil semua elemen anchor di dalam navbar
    const navLinks = document.querySelectorAll("nav ul li a");

    // Loop melalui setiap elemen anchor
    navLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            // Cek apakah pengguna belum login (misalnya, dengan kondisi tertentu)
            const userNotLoggedIn = true; // Ganti dengan kondisi sesuai kebutuhan

            if (userNotLoggedIn) {
                event.preventDefault(); // Mencegah navigasi ke halaman yang ditautkan
                alert("Anda harus login atau signup terlebih dahulu.");
                // Ganti URL redirect sesuai halaman login atau signup
                window.location.href = ""; // Ganti dengan URL halaman login
            }
        });
    });

    // ... (Kode lainnya)
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}


