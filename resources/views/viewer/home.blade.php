
@include('partials.header')
<x-nav  />

<header class ="max-w-lg mx-auto mt-5">

    <a href="#">
        <h1 class ="text-4xl font-bold text-white text-center pt-5 ">Product List</h1>
    </a>


</header>

<section class="mt-10 pt-5">
    <div class="overflow-x-auto relative">

        <table class="w-full mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class ="py-3 px-6">Category </th>
                    <th scope="col" class ="py-3 px-6">Product Name </th>
                    <th scope="col" class ="py-3 px-6">Stocks </th>
                    <th scope="col" class ="py-3 px-6">Price </th>
                   

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                <tr class="bg-gray-800 border-b text-white">
                    <td class="py-4 px-6"> {{ $product->category_name }}</td>
                    <td class="py-4 px-6"> {{ $product->product_name }}</td>
                    <td class="py-4 px-6"> {{ $product->stocks }}</td>
                    <td class="py-4 px-6">₱ {{ $product->price }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pt-6 p-4 mx-auto max-w-lg"></div>
        {{ $products->links('pagination::tailwind') }}

    </div>
</section>





<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>


@include('partials.footer')
