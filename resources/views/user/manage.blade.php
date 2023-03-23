
@include('partials.header')
<x-nav  />

<header class ="max-w-lg mx-auto mt-5">

    <a href="#">
        <h1 class ="text-4xl font-bold text-white text-center pt-5">Users Information</h1>
    </a>

      {{-- <!-- Modal toggle -->
<button data-modal-target="addUser-modal" data-modal-toggle="addUser-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 absolute right-5" type="button">
    Add New User
  </button> --}}
</header>

<section class="mt-10 pt-5">
    <div class="overflow-x-auto relative">

        <table class="w-full mx-auto text-sm text-left text-gray-500" >
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class ="py-3 px-6">First Name </th>
                    <th scope="col" class ="py-3 px-6">Last Name </th>
                    <th scope="col" class ="py-3 px-6">Gender </th>
                    <th scope="col" class ="py-3 px-6">Email </th>
                    <th scope="col" class ="py-3 px-6">Action </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr class="bg-gray-800 border-b text-white">
                    <td class="py-4 px-6"> {{ $user->first_name }}</td>
                    <td class="py-4 px-6"> {{ $user->last_name }}</td>
                    <td class="py-4 px-6"> {{ $user->gender }}</td>
                    <td class="py-4 px-6"> {{ $user->email }}</td>


                    <td class="py-4 px-6">

                          <!-- Modal toggle -->
                          <button data-modal-target="updaterole-modal{{$user->id}}" data-modal-toggle="updaterole-modal{{$user->id}}" class="bg-sky-700 text-white px-4 py-1 rounded" type="submit" >
                            View Role
                        </button>

                    <button data-modal-target="updateUser-modal{{$user->id}}" data-modal-toggle="updateUser-modal{{$user->id}}" class="bg-amber-500 text-white px-4 py-1 rounded" type="submit" >
                        Update
                    </button>

                       <button data-modal-target="deleteUser-modal{{$user->id}}" data-modal-toggle="deleteUser-modal{{$user->id}}" class="bg-red-600 text-white px-4 py-1 rounded" type="submit" >
                        Delete
                      </button>

                    </td>
                    @include('modals.cruduser_modal')
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="pt-6 p-4 mx-auto max-w-lg"> {{ $users->links() }}</div> --}}
        
    </div>
</section>





<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>


@include('partials.footer')
