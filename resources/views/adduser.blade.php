<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add User</title>
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
            <div class="w-full bg-white rounded-xl h-fit mx-auto">
                <div class="p-3 text-center">
                    <h1 class="font-extrabold text-3xl">Add User</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('postuser') }}" enctype="multipart/form-data">
                        @csrf @method('post')
                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-4">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Nama:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="name" name="name" required />
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Email:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="email" name="email" required />
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Password:</label>
                                <input type="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="password" name="password" required />
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Level:</label>
                                <select name="level" id="level"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    required>
                                    <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                </select>
                            </div>

                        </div>
                        <button type="submit" class="bg-blue-500 text-white p-2 w-fit hover:text-black rounded-lg">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
@include('layout.script')

</html>
