<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Penghuni</title>
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
                    <h1 class="font-extrabold text-3xl">Edit penghuni</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('updatepenghuni', ['id' => $penghuni->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-4">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Nama:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="nama" name="nama" value="{{ $penghuni->nama }}" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Alamat:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="alamat" name="alamat" value="{{ $penghuni->alamat }}" required>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Identitas:</label>
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="identitas" name="identitas">
                            @if ($penghuni->identitas)
                                <img src="{{ asset('storage/' . $penghuni->identitas) }}" alt="Identitas image" class="mt-2">
                            @endif
                        </div>
                        <button type="submit"
                            class="bg-blue-500 text-white p-2 w-fit hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
@include('layout.script')

</html>
