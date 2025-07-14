<!DOCTYPE html>
<html lang="en" class="h-full" style="background-color: #F3E8E8">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Online RSUD Dr. H. Moh. Rabain</title>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/validates.js') }}"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-2 py-12 lg:px-8 ">
        <div class="md:mx-auto md:w-full md:max-w-sm">
            {{-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company"> --}}
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Pendaftaran Online</h2>
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">RSUD Dr. H. Moh. Rabain
            </h2>
        </div>


        <div class="mt-5 rounded-xl ring-1 relative ring-gray-300 px-6 pb-8 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="absolute inset-0 bg-cover bg-center z-0"
                style="background-image: url('/img/display-antrian.png');">
            </div>
            <div class="mt-5">
                <div class="relative right-0">
                    <ul class="relative flex flex-wrap p-1 list-none rounded-xl" data-tabs="tabs" role="list">
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit"
                                data-tab-target="" active="" role="tab" aria-selected="true"
                                aria-controls="app">
                                <span class="ml-1 text-l font-bold leading-6 text-gray-900">Pendaftaran</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit"
                                data-tab-target="" role="tab" aria-selected="false" aria-controls="settings">
                                <span class="ml-1 text-l font-bold leading-6 text-gray-900">Riwayat</span>
                            </a>
                        </li>
                    </ul>
                    <div data-tab-content="" class="p-2">
                        <div class="block opacity-100" id="app" role="tabpanel">
                            <form class="relative z-10 space-y-4" action="{{ route('antrian.store') }}" method="POST"
                                id="registrationForm">
                                @csrf
                                <div>
                                    <label for="NIK"
                                        class="block text-m font-bold leading-6 text-gray-900">NIK</label>
                                    <div class="mt-2">
                                        <input type="text" name="NIK" id="NIK"
                                            placeholder="masukkan NIK pasien" autocomplete="NIK" required
                                            class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-m sm:leading-6">
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="Nama"
                                            class="block text-m font-bold leading-6 text-gray-900">Nama
                                            Pasien</label>
                                    </div>
                                    <div class="mt-2">
                                        <input type="text" name="Nama" id="Nama" autocomplete="nama"
                                            placeholder="masukkan nama pasien" required
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-m sm:leading-6">
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="Nomor_Telepon"
                                            class="block text-m font-bold leading-6 text-gray-900">Nomor
                                            Telepon yang Bisa Dihubungi</label>
                                    </div>
                                    <div class="mt-2">
                                        <input type="number" name="Nomor_Telepon" id="Nomor_Telepon"
                                            autocomplete="Nomor_Telepon" placeholder="contoh : 081212121212" required
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-m sm:leading-6">
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="Alamat"
                                            class="block text-m font-bold leading-6 text-gray-900">Alamat</label>
                                    </div>
                                    <div class="mt-2">
                                        <textarea name="Alamat" id="Alamat" rows="2"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-m sm:leading-6"></textarea>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="poli_id"
                                            class="block text-m font-bold leading-6 text-gray-900">Poli</label>
                                    </div>
                                    <div class="mt-2">
                                        <select id="poli_id" name="poli_id" autocomplete="poli_id"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-m sm:leading-6"
                                            required>
                                            @foreach ($polis as $poli)
                                                <option value="{{ $poli->id }}">{{ $poli->Nama_Poli }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="Tanggal_Antrian"
                                            class="block text-m font-bold leading-6 text-gray-900">Tanggal
                                            Berobat</label>
                                    </div>
                                    <div class="mt-2">
                                        <input type="date" name="Tanggal_Antrian" id="Tanggal_Antrian" required
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-m sm:leading-6">
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="Pembayaran"
                                            class="block text-m font-bold leading-6 text-gray-900">Cara
                                            Pembayaran</label>
                                    </div>
                                    <div class="mt-2">
                                        <select id="Pembayaran" name="Pembayaran" autocomplete="Pembayaran"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-m sm:leading-6"
                                            required>
                                            <option value="Umum">UMUM</option>
                                            <option value="BPJS">BPJS</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="hiddenField" style="display: none;">
                                    <div class="flex items-center justify-between">
                                        <label for="Rujukan"
                                            class="block text-m font-bold leading-6 text-gray-900">Nomor Rujukan
                                            BPJS</label>
                                    </div>
                                    <div class="mt-2">
                                        <input type="text" name="Rujukan" id="Rujukan" autocomplete="Rujukan"
                                            placeholder="masukkan nomor rujukan BPJS atau nomor BPJS"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-m sm:leading-6">
                                    </div>
                                </div>

                                



                                <div id="error-message" class="mt-2 text-sm font-bold leading-6 text-red-500"></div>
                                <div>
                                    <button type="submit"
                                        class="flex w-full justify-center rounded-md bg-blue-700 px-3 py-5 text-m font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400">daftar</button>
                                </div>
                            </form>
                        </div>
                        <div class="hidden opacity-0" id="settings" role="tabpanel">
                            <form id="searchForm" class="space-y-4">
                                @csrf
                        
                                <div>
                                    <label for="NIK"
                                        class="block text-m font-bold leading-6 text-gray-900">NIK</label>
                                    <div class="mt-2">
                                        <input type="text" name="NIK" id="NIK"
                                            placeholder="masukkan NIK pasien" required
                                            class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-m sm:leading-6">
                                    </div>
                                </div>
                        
                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="Tanggal_Antrian"
                                            class="block text-m font-bold leading-6 text-gray-900">Tanggal
                                            Berobat</label>
                                    </div>
                                    <div class="mt-2">
                                        <input type="date" name="Tanggal_Antrian" id="Tanggal_Antrian" required
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-m sm:leading-6">
                                    </div>
                                </div>
                        
                                <div>
                                    <button type="submit"
                                        class="flex w-full justify-center rounded-md bg-blue-700 px-3 py-5 text-m font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400">cari</button>
                                </div>
                            </form>
                        
                            <div id="results" class="mt-4"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
                alert("{{ session('error') }}");
            @endif
        });
    </script>
</body>

</html>
