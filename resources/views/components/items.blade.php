<ul class="flex flex-col md:flex-row px-4">

    @auth
    <li>
        {{-- <a href="/add/product" class="block py-2 pr-4 pl-3">Add New Product</a> --}}

        <!-- Modal toggle -->
<button data-modal-target="add-modal" data-modal-toggle="add-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Add New Product
  </button>
    </li>
    <li>
        <form action="/logout" method="post">
            @csrf
        <button class="block py-2 pr-4 pl-3">Logout</a>
        </form>
    </li>
    @else
    <li>
        <a href="/login" class="block py-2 pr-4 pl-3">Sign In</a>
    </li>
    <li>
        <a href="/register" class="block py-2 pr-4 pl-3">Sign Up</a>
    </li>

    @endauth
</ul>
