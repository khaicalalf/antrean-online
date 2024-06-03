document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registrationForm');
    const dateInput = document.getElementById('Tanggal_Antrian');
    const poliId = document.getElementById('poli_id');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function (event) {
        // Hentikan pengiriman form
        event.preventDefault();

        // Ambil tanggal hari ini
        const today = new Date();
        const poliOrthopedi = '1';
        //today.setHours(0, 0, 0, 0); // Set waktu ke 00:00:00 untuk perbandingan yang akurat
        // Ambil nilai tanggal dari input
        const inputDate = new Date(dateInput.value);


        // Periksa apakah inputDate sama atau sebelum hari ini
        if (inputDate <= today) {
            errorMessage.textContent = 'Tanggal daftar tidak boleh sama dengan atau sebelum hari ini.';
        } else if (inputDate.getDay() === 2 || inputDate.getDay() === 5) {
            if (poliId == poliOrthopedi) {
                errorMessage.textContent = 'Poli Orthopedi hanya buka pada hari senin, rabu dan kamis.';
            } else {
                errorMessage.textContent = '';
                // Jika validasi sukses, Anda bisa melanjutkan pengiriman form
                form.submit();
            }
        } else {
            errorMessage.textContent = '';
            // Jika validasi sukses, Anda bisa melanjutkan pengiriman form
            form.submit();
        }

    });
});

