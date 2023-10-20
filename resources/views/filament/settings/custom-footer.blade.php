   
   <div class="container">
        <h3 class="text-gray-700 text-xl text-bold mb-3">Menus</h3>
        <table class="w-full text-sm font-light">
            <thead class="border-b bg-white font-medium px-3">
              <tr class="">
                <th class="py-3">Image</th>
                <th class="py-3">Name</th>
                <th class="py-3">Price</th>
                <th class="py-3">QTY</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($menus as $item)
                    <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                        <td class="p-3">
                            <img src="{{ asset("/storage/$item->image") }}" class="block mx-auto" width="100px" height="80px" style="object-fit:cover;" alt="">
                        </td>
                        <td class="text-center">
                            {{ $item->name }}
                        </td>
                        <td class="text-center">
                            MMK {{ $item->price }}
                        </td>
                        <td class="text-center">
                            {{ $item->pivot->quantity }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
</div>