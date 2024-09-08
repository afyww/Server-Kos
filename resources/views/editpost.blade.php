<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Post</title>
    @include('layout.head')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <h1 class="font-extrabold text-3xl">Edit post</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('updatepost', ['id' => $post->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-8">
                            <div class="grid grid-cols-2 gap-5">
                                <div class="space-y-2">
                                    <label class="font-semibold text-black">Judul:</label>
                                    <input type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 p-3 rounded-lg w-full"
                                        id="judul" name="judul" value="{{ $post->judul }}" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="font-semibold text-black">Category:</label>
                                    <select id="categories" name="categories_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 p-3 rounded-lg w-full"
                                        required>
                                        <option value="{{ $post->categories_id }}">{{ $post->categories->category }}
                                        </option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="font-semibold text-black">Gambar Post:</label>
                                    <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img" name="img" required>
                                    <img class="h-fit mx-auto w-1/2" src="{{ asset('storage/img/' . basename($post->img)) }}">
                                </div>
                                <div class="space-y-2">
                                    <label class="font-semibold text-black">Tanggal Kegiatan:</label>
                                    <input type="date" name="published_at" value="{{ $post->published_at }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5"
                                        required>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Content:</label>
                                <textarea
                                rows="10"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" id="content" name="content"
                                    required>{{ $post->content }}</textarea>
                            </div>
                        </div>
                        <button type="submit"
                            class="bg-blue-500 text-white p-2 w-fit hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        new TomSelect('#select', {
            maxItems: 5,
        });
    </script>

</body>
@include('layout.script')

</html>
