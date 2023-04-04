<ul class="flex flex-col md:flex-row px-8">

    @auth
    
    <li>
        <button type="button" data-modal-target="add-modal" data-modal-toggle="add-modal" class="block py-2 pr-4 pl-3">Add New Product</button>
        <button type="button" data-modal-target="add-modal" data-modal-toggle="add-modal" class="block py-2 pr-4 pl-3">Add New Product</button>


    Toggle modal
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
