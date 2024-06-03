<!DOCTYPE html>
<html lang="en" class="h-full" style="background-color:white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Online RSUD Dr. H. Moh. Rabain</title>
    @vite(['public/js/app.js', 'public/css/app.css'])
    
</head>

<body class="h-full">
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
            <div class="p-8 sm:p-10 lg:flex-auto">
              <h3 class="text-2xl font-bold tracking-tight text-gray-900">RSUD Dr. H. Moh. Rabain </h3>
              <p class="mt-6 text-base leading-7 text-gray-600">{{ $antrian->created_at }}</p>
              
            </div>
            <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
              <div class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                <div class="mx-auto max-w-xs px-8">
                    <p class="text-base font-semibold text-gray-600">Bukti Pendaftaran Orthopedi JKN Mobile</p>
                  <p class="mt-6 flex items-baseline justify-center gap-x-2">
                    <span class="text-5xl font-bold tracking-tight text-gray-900">{{ ($antrian->Nomor_Antrian_Poli)}} </span>
                  </p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    
</body>

<script type="text/javascript">
    <!--
    window.print();
    //-->
    </script>
</html>
