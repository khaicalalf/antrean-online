document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch('/dashboard/search/results', {
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
        
        if (data) {
            
                let antrianDiv = document.createElement('div');
                antrianDiv.className = 'antrian-result';

                antrianDiv.innerHTML = `
            <div class="relative z-10 mt-6 border-t border-gray-100 dark:text-gray-100">
                <dl class="divide-y divide-gray-300 dark:text-gray-100">
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900 dark:text-gray-100">NIK</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-2 ">${ data.pasien.NIK }</dd>
                    </div>
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0 dark:text-gray-100">
                        <dt class="text-m font-bold leading-6 text-gray-900 dark:text-gray-100">Nama Pasien</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-2">${ data.pasien.Nama }</dd>
                    </div>
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0 dark:text-gray-100">
                        <dt class="text-m font-bold leading-6 text-gray-900 dark:text-gray-100">Poli yang dituju</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-2">${ data.poli.Nama_Poli }</dd>
                    </div>
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0 dark:text-gray-100">
                        <dt class="text-m font-bold leading-6 text-gray-900 dark:text-gray-100">No Antrian Poli</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-2">
                        ${data.poli.Nama_Poli === 'orthopedi' ? data.Nomor_Antrian_Poli + 3 : data.Nomor_Antrian_Poli}
                      </dd>
                    </div>
                    <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0 dark:text-gray-100">
                        <dt class="text-m font-bold leading-6 text-gray-900 dark:text-gray-100">Tanggal Berobat</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 dark:text-gray-100 sm:col-span-2 sm:mt-2">${ data.Tanggal_Antrian }
                        </dd>
                    </div>
                </dl>
            </div>
            `;
                resultsDiv.appendChild(antrianDiv);
            
        } else {
            resultsDiv.textContent = 'Tidak ada hasil ditemukan.';
        }
    })
    .catch(error => console.error('Error:', error));
});
