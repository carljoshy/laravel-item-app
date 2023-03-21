@include('partials.header')



<main class="bg-slate-50 max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl ">
    <header class ="max-w-lg mx-auto">
        <a href="#">
            <h1 class ="text-4xl font-bold text-center pb-5">Login Form</h1>
            <hr>
        </a>
    </header>
    <section><h3 class="font-bold text-2xl text-center pt-2">Welcome to Product List System</h3></section>
    <p class="text-gray-600 pt-2 text-center">Create a new account <a href="/register" class="text-sky-300 font-bold">here</a></p>

<section class="mt-10">
    <form action="/login/process" method="post" class="flex flex-col">
        @csrf
        @error('email')
        <p class="text-red-500 text-xs p-1">{{ $message }}</p>
        @enderror
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
            <input type="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="email" >

        </div>
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
            <input type="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="password" >
        </div>
        <button class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign In</button>
    </form>
</section>
</main>
@include('partials.footer')
