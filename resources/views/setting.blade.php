<!DOCTYPE html>
<html lang="en">

<head>
    <title>Setting</title>
    @include('layout.head')
</head>

<body class="m-0 font-poppins antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    @include('layout.left-side')
    <!-- end sidenav -->
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- end Navbar -->
        <div class="p-6">
            <div class='w-full bg-white rounded-xl h-fit mx-auto'>
                <div class="p-3 text-center">
                    <h1 class="font-extrabold text-3xl">Setting</h1>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2 gap-4 p-2">
                        <!-- card1 -->
                        @if (auth()->user()->level == 'admin')
                        <a href="{{ route('user') }}">
                            <div class="bg-red-500 p-8 rounded-lg shadow-xl">
                                <h1 class="text-2xl text-white font-bold"></h1>
                                <h1 class="text-xl font-extrabold text-white text-right">Users</h1>
                            </div>
                        </a>
                        @endif
                        <!-- card2 -->
                        <a href="https://custompedia.vercel.app/" target="blank">
                            <div class="bg-blue-500 p-8 rounded-lg shadow-xl">
                                <h1 class="text-2xl text-white font-bold"></h1>
                                <h1 class="text-xl font-extrabold text-white text-right">Website</h1>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
@include('layout.script')

</html>
