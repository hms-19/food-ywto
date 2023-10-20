<x-layout>
    <main style="margin-top: 80px;">
        <div class="container px-5 mx-auto">
            <div class="d-flex justify-content-center my-5">
                <div class="d-flex flex-column w-100 p-3 text-secondary bg-white shadow-lg">
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Great !</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif
                    <h3 class="fs-4 fw-bold">Carts</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="text-center">Name</th>
                                <th class="pl-5 text-center">
                                    <span class="">QTY</span>
                                </th>
                                <th class="text-center"> price</th>
                                <th class="text-center"> Remove </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                          <tr>
                            <td class="text-center">
                                <p class="text-black">{{ $item->name }}</p>
                            </td>
                            <td class="text-center">
                              <div class="">
                                <div class="">
                                  
                                  <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-center g-2">
                                        <input type="hidden" name="id" value="{{ $item->id}}" >
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                        class="form-inline px-2" style="width: 100px" />
                                        <button class="btn btn-primary ml-2">
                                            <i class="fas fa-arrow-up" style="color: #fff"></i>
                                        </button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </td>
                            <td class="text-center">
                                  MMK {{ $item->price }}
                            </td>
                            <td class="text-center">
                              <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="btn btn-danger">x</button>
                            </form>
                              
                            </td>
                          </tr>
                          @endforeach
                           
                        </tbody>
                    </table>
                    <p class="text-dark fw-bold py-3">
                        Total: MMK {{ Cart::getTotal() }}
                    </p>
                    <div class="d-flex justify-content-end align-items-center">
                        @if(count(\Cart::getContent()) > 0 )
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger">Clear Carts</button>
                        </form>
                        <form action="{{ route('checkout.index') }}" method="GET">
                            @csrf
                            <button class="btn btn-primary ml-3">Checkout</button>
                        </form>
                        @endif
                    </div>
                </div>
              </div>
        </div>
    </main>    
</x-layout>


{{-- <div class="flex-1">
    <table class="w-100" cellspacing="0">
      <thead>
        <tr class="text-uppercase">
          <th class=""></th>
          <th class="text-left">Name</th>
          <th class="pl-5 text-left lg:text-right lg:pl-0">
            <span class="lg:hidden" title="Quantity">Qtd</span>
            <span class="hidden lg:inline">Quantity</span>
          </th>
          <th class="hidden text-right md:table-cell"> price</th>
          <th class="hidden text-right md:table-cell"> Remove </th>
        </tr>
      </thead>
      <tbody>
          @foreach ($cartItems as $item)
        <tr>
          <td class="hidden pb-4 md:table-cell">
            <a href="#">
              <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
            </a>
          </td>
          <td>
            <a href="#">
              <p class="mb-2 md:ml-4 text-purple-600 font-bold">{{ $item->name }}</p>
              
            </a>
          </td>
          <td class="justify-center mt-6 md:justify-end md:flex">
            <div class="h-10 w-28">
              <div class="relative flex flex-row w-full h-8">
                
                <form action="{{ route('cart.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id}}" >
                <input type="text" name="quantity" value="{{ $item->quantity }}" 
                class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                <button class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">Update</button>
                </form>
              </div>
            </div>
          </td>
          <td class="hidden text-right md:table-cell">
            <span class="text-sm font-medium lg:text-base">
                ${{ $item->price }}
            </span>
          </td>
          <td class="hidden text-right md:table-cell">
            <form action="{{ route('cart.remove') }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $item->id }}" name="id">
              <button class="px-4 py-2 text-white bg-red-600 shadow rounded-full">x</button>
          </form>
            
          </td>
        </tr>
        @endforeach
         
      </tbody>
    </table>
    <div>
     Total: ${{ Cart::getTotal() }}
    </div>
    <div>
      <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Clear Carts</button>
      </form>
    </div>
  </div> --}}