<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project</title>
    @include('layout.head')
    <link href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" rel="stylesheet" />
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
            <div class='w-full rounded-xl bg-white h-fit mx-auto'>
                <div class="p-3">
                    <div class="flex justify-between">
                        <h1 class="font-extrabold text-3xl">Project</h1>
                        <a class="p-2 bg-blue-500 rounded-xl text-white hover:text-black text-center px-10"
                            href="{{ route('addproject') }}">Add
                            project</a>
                    </div>
                </div>
                <div class="p-2">
                    <div class="overflow-auto">
                        <table id="myTable" class="bg-gray-50 border-2">
                            <thead class="w-full">
                                <th>No</th>
                                <th>Date</th>
                                <th>Nama Project</th>
                                <th>Img 1</th>
                                <th>Img 2</th>
                                <th>Img 3</th>
                                <th>Video</th>
                                <th>Category</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($project as $project)
                                    <tr class="border-2">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $project->created_at }}</td>
                                        <td>{{ $project->project }}</td>
                                        <td>
                                            <img class="h-fit mx-auto w-32"
                                                src="{{ asset('storage/img/' . basename($project->img1)) }}">
                                        </td>
                                        <td>
                                            <img class="h-fit mx-auto w-32"
                                                src="{{ asset('storage/img/' . basename($project->img2)) }}">
                                        </td>
                                        <td>
                                            <img class="h-fit mx-auto w-32"
                                                src="{{ asset('storage/img/' . basename($project->img3)) }}">
                                        </td>
                                        <td>
                                            <video class="h-fit mx-auto" width="320" controls>
                                                <source src="{{ asset('storage/videos/' . basename($project->video)) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                        <td>{{ $project->kategoris->kategori }}</td>
                                        <td class="flex gap-2 my-16">
                                            <a href="{{ route('editproject', ['id' => $project->id]) }}">
                                                <h1
                                                    class="p-2 px-10 w-fit text-white hover:text-black bg-blue-500 rounded-xl text-center">
                                                    Edit</h1>
                                            </a>
                                            @if (auth()->user()->level == 'admin')
                                            <form
                                                class="p-1 px-10 w-fit text-white hover:text-black bg-red-500 rounded-xl text-center"
                                                method="post"
                                                action="{{ route('destroyproject', ['id' => $project->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable', {
                columnDefs: [{
                    targets: 1, // Index of the 'Date' column
                    render: function(data, type, row) {
                        // Assuming the date is in 'YYYY-MM-DD HH:MM:SS' format
                        var date = new Date(data);
                        return date.toLocaleDateString(); // Format the date as needed
                    },
                }, ],
            });
        });
    </script>
</body>
@include('sweetalert::alert')
@include('layout.script')

</html>
