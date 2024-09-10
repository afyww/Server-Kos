<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    @include('layout.head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
</head>

<body class="m-0 font-poppins antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    @include('layout.left-side')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @include('layout.navbar')
        <div class="p-6 space-y-2">
            <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-4 lg:grid-cols-4 gap-4 p-2">
                <a href="{{ ('kamar') }}">
                    <div class="bg-blue-500 p-8 rounded-lg shadow-xl">
                        <h1 class="text-2xl text-white font-bold">{{ $total_kamar }}</h1>
                        <h1 class="text-xl font-extrabold text-white text-right">Kamar</h1>
                    </div>
                </a>
                <a href="{{ ('penghuni') }}">
                    <div class="bg-red-500 p-8 rounded-lg shadow-xl">
                        <h1 class="text-2xl text-white font-bold">{{ $total_penghuni }}</h1>
                        <h1 class="text-xl font-extrabold text-white text-right">Penghuni</h1>
                    </div>
                </a>
                <a href="{{ ('pembayaran') }}">
                    <div class="bg-yellow-500 p-8 rounded-lg shadow-xl">
                        <h1 class="text-2xl text-white font-bold">Rp.{{ number_format($total_pembayaran, 0, ',', '.') }}</h1>
                        <h1 class="text-xl font-extrabold text-white text-right">Pembayaran</h1>
                    </div>
                </a>
                <a href="{{ ('pengeluaran') }}">
                    <div class="bg-green-500 p-8 rounded-lg shadow-xl">
                        <h1 class="text-2xl text-white font-bold">Rp.{{ number_format($total_pengeluaran, 0, ',', '.') }}</h1>
                        <h1 class="text-xl font-extrabold text-white text-right">Pengeluaran</h1>
                    </div>
                </a>

            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2">
                <div class="p-6 bg-white rounded-xl shadow-xl">
                    <h1 class="font-light">Jumlah Pemasukan</h1>
                    <canvas id="grafikPembayaran" width="100" height="50"></canvas>
                </div>
                <div class="p-6 bg-white rounded-xl shadow-xl">
                    <h1 class="font-light">Jumlah Pengeluaran</h1>
                    <canvas id="grafikPengeluaran" width="100" height="50"></canvas>
                </div>
            </div>
        </div>
    </main>

    @include('sweetalert::alert')
    @include('layout.script')

    <!-- Initialize the Chart.js graphs -->
    <script>
        var ctx1 = document.getElementById('grafikPembayaran').getContext('2d');
        var grafikPembayaran = new Chart(ctx1, {
            type: 'line', // You can change to 'bar', 'line', 'pie', etc.
            data: {
                labels: {!! json_encode($labels1) !!}, // Labels for X-axis (Months)
                datasets: [{
                    label: 'Jumlah Pembayaran',
                    data: {!! json_encode($data1) !!}, // Data for the chart
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10000000 // Set your desired maximum value here

                    }
                }
            }
        });

        var ctx2 = document.getElementById('grafikPengeluaran').getContext('2d');
        var grafikPengeluaran = new Chart(ctx2, {
            type: 'line', // You can change to 'bar', 'line', 'pie', etc.
            data: {
                labels: {!! json_encode($labels2) !!}, // Labels for X-axis (Months)
                datasets: [{
                    label: 'Jumlah Pengeluaran',
                    data: {!! json_encode($data2) !!}, // Data for the chart
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10000000 // Set your desired maximum value here
                    }
                }
            }
        });
    </script>
</body>

</html>
