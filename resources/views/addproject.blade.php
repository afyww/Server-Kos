<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Project</title>
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
                    <h1 class="font-extrabold text-3xl">Add project</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('createproject') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="grid grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Nama project:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="project" name="project" placeholder="Project" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar Project:</label>
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img1" name="img1" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar Project:</label>
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img2" name="img2" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar Project:</label>
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img3" name="img3" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Video Project:</label>
                                <input type="file" accept="video/*"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="video" name="video" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Category:</label>
                                <select id="kategoris_id" name="kategoris_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-3 rounded-lg w-full"
                                    >
                                    <option></option>
                                    @foreach ($kategori as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description:</label>
                            <textarea rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" id="description"
                                name="description" required></textarea>
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white p-4 w-full hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
@include('layout.script')

</html>
