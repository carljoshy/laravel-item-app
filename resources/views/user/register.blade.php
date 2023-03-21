@include('partials.header')



<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl ">

    <header class ="max-w-lg mx-auto">
        <a href="#">
            <h1 class ="text-4xl font-bold text-center pb-5">Registration Form</h1>
            <hr>
        </a>
    </header>

    <section><h3 class="font-bold text-2xl text-center pt-2">Welcome to Product List System</h3></section>
    <p class="text-gray-600 pt-2 text-center">Sign in to your account <a href="/login" class="text-sky-300 font-bold">here</a></p>

<section class="mt-10">
    <form action="/store" method="POST" class="flex flex-col">
        @csrf
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">First Name</label>
            <input type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="first_name" value={{ old('first_name') }}>
            @error('first_name')
            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror

        </div>
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Last Name</label>
            <input type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="last_name" value={{ old('last_name') }}>
            @error('last_name')
            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror

        </div>
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Gender</label>
            <select class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="gender" >
                <option value="" {{ old('gender') == "" ? 'selected' : '' }}></option>
                <option value="Male" {{ old('gender') == "Male" ? 'selected' : '' }}>Male</option>
                <option value="FeMale" {{ old('gender') == "Female" ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
            <input type="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="email" value={{ old('email') }}>
            @error('email')
            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
            <input type="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="password" value={{ old('password') }}>
            @error('password')
            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Confirm Password</label>
            <input type="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="password_confirmation" >
            @error('password_confirmation')
            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror
        </div>
        <button class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign Up</button>
    </form>
</section>
</main>
@include('partials.footer')
