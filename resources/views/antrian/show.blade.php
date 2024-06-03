<!DOCTYPE html>
<html lang="en" class="h-full" style="background-color: #F3E8E8">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Online RSUD Dr. H. Moh. Rabain</title>
    @vite(['public/js/app.js', 'public/css/app.css'])
    
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-2 py-12 lg:px-8">
        <div class="md:mx-auto md:w-full md:max-w-sm">
            {{-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company"> --}}
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Bukti Pendaftaran Online
            </h2>
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">RSUD Dr. H. Moh. Rabain
            </h2>
            <h2 class="text-center text-m font-bold leading-9 tracking-tight text-gray-900">{{ $antrian->created_at }}
            </h2>
        </div>

        <div class="mt-5 rounded-xl ring-1 relative ring-gray-300 px-6 pb-8 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('/img/display-antrian.png');">
            </div>
            <div class="relative z-10 mt-6 border-t border-gray-100 ">
                <dl class="divide-y divide-gray-300">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900">Nama Pasien</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $antrian->pasien->Nama }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900">Poli yang dituju</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $antrian->poli->Nama_Poli }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900">No Antrian Poli</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        @if ($antrian->poli_id == '7') 
                          {{ ($antrian->Nomor_Antrian_Poli)+3 }}  
                        @else
                            {{ ($antrian->Nomor_Antrian_Poli)}}  
                        
                        @endif
                      </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-0">
                        <dt class="text-m font-bold leading-6 text-gray-900">Tanggal Berobat</dt>
                        <dd class="mt-1 text-m leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $antrian->Tanggal_Antrian }}
                        </dd>
                    </div>
                    
                    <div>
                        <h2 class="my-4 text-center text-l font-bold leading-5 tracking-tight text-red-600">Jangan lupa untuk
                            screenshot bukti pendaftaran ini
                        </h2>
                    </div>
                    <div>
                        <a href="{{ route('antrian.create') }}">
                            <button
                                class="flex w-full justify-center rounded-md  px-2 py-2 text-sm font-semibold leading-6 text-black shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-400">Kembali
                                ke Pendaftaran Antrian</button>
                        </a>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</body>

</html>
