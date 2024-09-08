<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Project</title>
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
                    <h1 class="font-extrabold text-3xl">Edit project</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post"
                        action="{{ route('updateproject', ['id' => $project->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama project:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="project" name="project" value="{{ $project->project }}" required>
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar Project:</label>
                                <img class="h-fit mx-auto w-1/2" src="{{ asset('storage/img/' . basename($project->img1)) }}">
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img1" name="img1" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar Project:</label>
                                <img class="h-fit mx-auto w-1/2" src="{{ asset('storage/img/' . basename($project->img2)) }}">
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img2" name="img2" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar Project:</label>
                                <img class="h-fit mx-auto w-1/2" src="{{ asset('storage/img/' . basename($project->img3)) }}">
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img3" name="img3" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Video Project:</label>
                                <video class="h-fit mx-auto" width="320" controls>
                                    <source src="{{ asset('storage/videos/' . basename($project->video)) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="video" name="video" required>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description:</label>
                            <textarea 
                            rows="10"
                            class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" id="description"
                                name="description" value="" required>{{ $project->description }}</textarea>
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
