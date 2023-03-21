
@include('partials.header')
<x-nav  />

<header class ="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class ="text-4xl font-bold text-white text-center ">Product List</h1>
    </a>
</header>

<section class="mt-10">
    <div class="overflow-x-auto relative">

        <table class="w-full mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class ="py-3 px-6">Category </th>
                    <th scope="col" class ="py-3 px-6">Product Name </th>
                    <th scope="col" class ="py-3 px-6">Price </th>
                    <th scope="col" class ="py-3 px-6">Action </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                <tr class="bg-gray-800 border-b text-white">
                    <td class="py-4 px-6"> {{ $product->category_name }}</td>
                    <td class="py-4 px-6"> {{ $product->product_name }}</td>
                    <td class="py-4 px-6"> {{ $product->price }}</td>


                    <td class="py-4 px-6">
                       <a href="/product/{{$product->id}}" class="bg-sky-600 text-white px-4 py-1 rounded">View</a>

                          <!-- Modal toggle -->



                        <button data-modal-target="update-modal{{$product->id}}" data-modal-toggle="update-modal{{$product->id}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Update
                        </button>

                       {{-- <a href="/update/{{$product->id}}" class="bg-amber-500 text-white px-4 py-1 rounded">Update</a> --}}

                       <a href="/delete/{{$product->id}}" class="bg-red-600 text-white px-4 py-1 rounded">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pt-6 p-4 mx-auto max-w-lg"> {{ $products->links() }}</div>
    </div>
</section>

{{-- Start Add Product Modal --}}

  <!-- Main modal -->
  <div id="add-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
      <div class="relative w-full h-full max-w-md md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="add-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>

              <div class="px-6 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Product</h3>
                  <form class="space-y-6" action="/add/product" method="POST">
                    @csrf
                      <div>
                          <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                          <input type="text" name="category_name" id="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Category Name" >
                      </div>
                      <div>
                        <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Product Name">
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Product Price">
                    </div>

                      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add New Product</button>

                  </form>
              </div>
          </div>
      </div>
  </div>
{{--End Add Product Modal --}}

{{-- <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> --}}

  {{--Start Update Modal --}}

<!-- Main modal -->
<div id="update-modal{{$product->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="update-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Product</h3>
                <form class="space-y-6" action="/add/product" method="POST">
                  @csrf
                    <div>
                        <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <input type="text" name="category_name" id="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Category Name" value="hello" >
                    </div>
                    <div>
                      <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                      <input type="text" name="product_name" id="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Product Name">
                  </div>
                  <div>
                      <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                      <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Product Price">
                  </div>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add New Product</button>

                </form>
            </div>
        </div>
    </div>
</div>

   {{--End Update Modal --}}


<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>


@include('partials.footer')
