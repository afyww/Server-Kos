<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Kamar</title>
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
                    <h1 class="font-extrabold text-3xl">Edit kamar</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('updatekamar', ['id' => $kamar->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="grid xl:grid-cols-3 grid-cols-1 gap-4">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Type:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="type" name="type" value="{{ $kamar->type }}" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Harga:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="harga" name="harga" value="{{ $kamar->harga }}" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Img:</label>
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img" name="img">
                                @if ($kamar->img)
                                    <img src="{{ asset('storage/' . $kamar->img) }}" alt="Kamar image" class="mt-2">
                                @endif
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Fasilitas:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" id="fasilitas"
                                name="fasilitas" required>{{ $kamar->fasilitas }}</textarea>
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
