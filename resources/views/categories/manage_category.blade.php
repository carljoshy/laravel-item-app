
@include('partials.header')
<x-nav  />

<header class ="max-w-lg mx-auto mt-5">

    <a href="#">
        <h1 class ="text-4xl font-bold text-white text-center pt-5 ">Category List</h1>
    </a>

      <!-- Modal toggle -->
<button data-modal-target="add-category" data-modal-toggle="add-category" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 absolute right-5" type="button">
    Add New Category
  </button>
</header>

<section class="mt-10 pt-5">
    <div class="overflow-x-auto relative">

        <table class="w-full mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class ="py-3 px-6">Category Name</th>

                    <th scope="col" class ="py-3 px-6">Action </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category )
                <tr class="bg-gray-800 border-b text-white">
                    <td class="py-4 px-6"> {{ $category->category_name }}</td>



                    <td class="py-4 px-6">
                       {{-- <a href="/product/{{$product->id}}" class="bg-sky-600 text-white px-4 py-1 rounded">View</a> --}}

                          <!-- Modal toggle -->
                    <button data-modal-target="updatecategory-modal{{$category->id}}" data-modal-toggle="updatecategory-modal{{$category->id}}" class="bg-amber-500 text-white px-4 py-1 rounded" type="submit" >
                        Update
                    </button>

                       {{-- <a href="/update/{{$product->id}}" class="bg-amber-500 text-white px-4 py-1 rounded">Update</a> --}}

                       {{-- <a href="/delete/{{$product->id}}" class="bg-red-600 text-white px-4 py-1 rounded">Delete</a> --}}


                       <button data-modal-target="deletecategory-modal{{$category->id}}" data-modal-toggle="deletecategory-modal{{$category->id}}" class="bg-red-600 text-white px-4 py-1 rounded" type="submit" >
                        Delete
                      </button>

                    </td>
                    @include('modals.crudcategory_modal')
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pt-6 p-4 mx-auto max-w-lg"> {{ $categories->links() }}</div>
    </div>
</section>





<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>


@include('partials.footer')
