<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Refresh Table</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl mb-5">Laravel Refresh Table</h1>
        <div>
            <input type="text" id="search" placeholder="Search..." class="border p-2 m-2" oninput="searchData()" />
            <button class="bg-blue-500 text-white p-2" onclick="addData()">Add Data</button>
        </div>
        <table class="min-w-full bg-white border mt-5">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                </tr>
            </thead>
            <tbody id="data-table">
                <!-- Data will be inserted here by JavaScript -->
            </tbody>
        </table>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                fetchData();

                // Fetch data every 5 seconds
                setInterval(fetchData, 5000);
            });

            function fetchData() {
                fetch('/data')
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.getElementById('data-table');
                        tableBody.innerHTML = '';
                        data.forEach(item => {
                            const row = `<tr>
                                        <td class="border px-4 py-2">${item.id}</td>
                                        <td class="border px-4 py-2">${item.NIK}</td>
                                     </tr>`;
                            tableBody.insertAdjacentHTML('beforeend', row);
                        });
                    });
            }

            function searchData() {
                const query = document.getElementById('search').value;
                fetch(`/data?search=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.getElementById('data-table');
                        tableBody.innerHTML = '';
                        data.forEach(item => {
                            const row = `<tr>
                                        <td class="border px-4 py-2">${item.id}</td>
                                        <td class="border px-4 py-2">${item.NIK}</td>
                                     </tr>`;
                            tableBody.insertAdjacentHTML('beforeend', row);
                        });
                    });
            }

            function addData() {
                const name = prompt('Enter name:');
                if (name) {
                    fetch('/data', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                name: name
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            fetchData();
                        });
                }
            }
        </script>
    </div>
</body>

</html>
