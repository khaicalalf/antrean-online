document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch('/antrian/search/results', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': formData.get('_token')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = '';

        if (data.length > 0) {
            data.forEach(antrian => {
                let antrianDiv = document.createElement('div');
                antrianDiv.className = 'antrian-result';

                antrianDiv.innerHTML = `
            <div class="relative z-10 mt-6 border-t border-gray-100 ">
                <dl class="divide-y divide-gray-300">
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900">NIK</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 sm:col-span-2 sm:mt-2">${ antrian.pasien.NIK }</dd>
                    </div>
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900">Nama Pasien</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 sm:col-span-2 sm:mt-2">${ antrian.pasien.Nama }</dd>
                    </div>
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900">Poli yang dituju</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 sm:col-span-2 sm:mt-2">${ antrian.poli.Nama_Poli }</dd>
                    </div>
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900">No Antrian Poli</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 sm:col-span-2 sm:mt-2">
                        ${antrian.poli.Nama_Poli === 'orthopedi' ? antrian.Nomor_Antrian_Poli + 3 : antrian.Nomor_Antrian_Poli}
                      </dd>
                    </div>
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900">Tanggal Berobat</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 sm:col-span-2 sm:mt-2">${ antrian.Tanggal_Antrian }
                        </dd>
                    </div>
                    
                    <div>
                        <h2 class="my-4 text-center text-l font-bold leading-5 tracking-tight text-red-600">Jangan lupa untuk
                            screenshot bukti pendaftaran ini
                        </h2>
                    </div>
                </dl>
            </div>
            `;
                resultsDiv.appendChild(antrianDiv);
            });
        } else {
            resultsDiv.textContent = 'Tidak ada hasil ditemukan.';
        }
    })
    .catch(error => console.error('Error:', error));
});
