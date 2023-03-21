@include('partials.header')


<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl ">

    <a href="/">
        <p class ="text-md font-bold text-sky-300 text-right ">Go Back</p>
    </a>

    <header class ="max-w-lg mx-auto pt-3">
        <a href="#">
            <h1 class ="text-4xl font-bold text-center ">Add New Product</h1>
        </a>
    </header>


<section class="mt-10">


    <form action="/add/product" method="post" class="flex flex-col">
        @csrf
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="category_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Category Name</label>
            <input type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="category_name" value={{ old('category_name') }}>
            @error('category_name')
            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Product Name</label>
            <input type="text" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="product_name" value={{ old('product_name') }} >
            @error('product_name')
            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Price</label>
            <input type="number" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-4" name="price" min="0" value={{ old('price') }}>
            @error('price')
            <p class="text-red-500 text-xs p-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Add New Product</button>
    </form>
</section>
</main>

@include('partials.footer')
