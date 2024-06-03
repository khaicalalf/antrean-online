<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Cari Pasien
                    </h2>
                    <form id="searchForm" class="space-y-4">
                        @csrf

                        <div>
                            <label for="NIK"
                                class="block text-m font-bold leading-6 text-gray-900 dark:text-gray-200">NIK</label>
                            <div class="mt-2">
                                <input type="text" name="NIK" id="NIK" placeholder="masukkan NIK pasien"
                                    required
                                    class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-m sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-blue-700 px-3 py-5 text-m font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400">cari</button>
                        </div>
                    </form>

                    <div id="results" class="mt-4"></div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form id="jknForm" class="space-y-4" action="{{ route('dashboard.storejkn') }}" method="POST">
                        @csrf
                        <div>
                            <a target="_blank">
                                <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-blue-700 px-3 py-5 text-m font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400">Print
                                    Antren Orthopedi untuk JKN Mobile</button>
                            </a>

                        </div>
                    </form>
                </div>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <!-- Your content -->
                    <div class="container mx-auto p-4">
                        <div
                            class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                            <table class="min-w-full bg-white text-left">
                                <tr>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            Nomor Antrian
                                        </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            Nama Pasien
                                        </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            NIK
                                        </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            Nomor Telepon
                                        </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            Poli
                                        </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block text-left font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            Nomor Antrian Poli
                                        </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            Tanggal Antrian
                                        </p>
                                    </th>

                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            Status
                                        </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            Pembayaran
                                        </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-m antialiased font-semibold leading-none text-blue-gray-900 opacity-70">
                                            Rujukan
                                        </p>
                                    </th>
                                </tr>
                                @foreach ($antrians as $antrian)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $antrian->Nomor_Antrian }}</td>
                                        <td class="border px-4 py-2">{{ $antrian->pasien->Nama }}</td>
                                        <td class="border px-4 py-2">{{ $antrian->pasien->NIK }}</td>
                                        <td class="border px-4 py-2">{{ $antrian->pasien->Nomor_Telepon }}</td>
                                        <td class="border px-4 py-2">{{ $antrian->poli->Nama_Poli }}</td>
                                        <td class="border px-4 py-2">{{ $antrian->Nomor_Antrian_Poli }}</td>
                                        <td class="border px-4 py-2">{{ $antrian->Tanggal_Antrian }}</td>
                                        <td class="border px-4 py-2">{{ $antrian->Status }}</td>
                                        <td class="border px-4 py-2">{{ $antrian->Pembayaran }}</td>
                                        <td class="border px-4 py-2">{{ $antrian->No_Rujukan }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $antrians->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('jknForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.rdm) {
                        window.open(`/dashboard/${data.rdm}`, '_blank');
                        window.location.href = `/dashboard`;
                        
                    }
                })
                .catch(error => console.error('Error:', error));
                
        });
    </script>
</x-app-layout>
