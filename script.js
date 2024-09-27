// JavaScript untuk menampilkan pesan selamat datang berdasarkan waktu
document.addEventListener("DOMContentLoaded", function() {
    const welcomeMessage = document.getElementById("welcomeMessage");
    const now = new Date();
    const hour = now.getHours();

    if (hour >= 5 && hour < 12) {
        welcomeMessage.innerText = "Selamat Pagi! Semoga harimu menyenangkan.";
    } else if (hour >= 12 && hour < 18) {
        welcomeMessage.innerText = "Selamat Siang! Semoga harimu produktif.";
    } else if (hour >= 18 && hour < 22) {
        welcomeMessage.innerText = "Selamat Sore! Jangan lupa istirahat.";
    } else {
        welcomeMessage.innerText = "Selamat Malam! Waktu yang baik untuk bersantai.";
    }
});