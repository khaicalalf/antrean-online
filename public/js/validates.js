function showOrHideField(){
    const bayar = document.getElementById('Pembayaran');
    const hiddenField = document.getElementById("hiddenField");

    if (bayar.value === "BPJS") {
        hiddenField.style.display = "block"; // Menampilkan kolom baru
    } else {
        hiddenField.style.display = "none"; // Menyembunyikan kolom baru
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registrationForm');
    const dateInput = document.getElementById('Tanggal_Antrian');
    const poliInput = document.getElementById('poli_id');
    const errorMessage = document.getElementById('error-message');
    const bayar = document.getElementById('Pembayaran');
    // if (session('error'))
    //     alert("{{ session('error') }}");
    
    bayar.addEventListener("change", showOrHideField);
    

    form.addEventListener('submit', function (event) {
        function getFiveDaysFromToday() {
            // Dapatkan tanggal hari ini
            const today = new Date();
            //today.setHours(0, 0, 0, 0); // Set jam, menit, detik ke 0 untuk perbandingan yang akurat
            // Hitung tanggal 5 hari ke depan dari hari ini
            const fiveDaysFromToday = new Date(today);
            fiveDaysFromToday.setDate(today.getDate() + 5);

            return fiveDaysFromToday;
        }
        // Hentikan pengiriman form
        event.preventDefault();

        // Ambil data statis hari ini
        const today = new Date();
        const poliOrthopedi = '1';
        //today.setHours(0, 0, 0, 0); // Set waktu ke 00:00:00 untuk perbandingan yang akurat
        // Ambil nilai dari input
        const inputDate = new Date(dateInput.value);
        const inputPoli = poliInput.value;

        // Periksa apakah inputDate sama atau sebelum hari ini
        if (inputDate <= today) {
            errorMessage.textContent = 'Tanggal daftar tidak boleh sama dengan atau sebelum hari ini.';
            //errorMessage.textContent = getFiveDaysFromToday();
        }
        else if (inputPoli == poliOrthopedi) {
            if (inputDate.getDay() === 2 || inputDate.getDay() === 5) {
                errorMessage.textContent = 'Poli Orthopedi hanya buka pada hari senin, rabu dan kamis.';
            }
            else{
                errorMessage.textContent = '';
                // Jika validasi sukses, Anda bisa melanjutkan pengiriman form
                form.submit();
            }
        }
        else if (inputDate >= getFiveDaysFromToday()) {
                errorMessage.textContent = 'maaf, hanya dapat mendaftar sampai 5 hari ke depan dari hari ini';
        }
        else if (inputDate.getDay() === 0 || inputDate.getDay() === 6) {
            errorMessage.textContent = 'maaf tidak bisa mendaftar berobat pada hari sabtu dan minggu.';
        }
        else {
            errorMessage.textContent = '';
            // Jika validasi sukses, Anda bisa melanjutkan pengiriman form
            form.submit();
        }

    });
});
