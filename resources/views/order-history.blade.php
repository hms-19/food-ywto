<x-layout>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-12 my-3">
                <h2 class="font-weight-bold">
                    History
                </h2>
            </div>

            @foreach ($orders as $order)
                <div class="my-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <span class="font-weight-bold mr-3">
                                    {{ date_format($order->created_at,"Y-m-d H:i") }} 
                                </span> 
                                @if ($order->status == 'pending')
                                    <div class="badge badge-success">{{ $order->status }}</div>
                                @elseif($order->status == 'delivering')
                                    <div class="badge badge-info">{{ $order->status }}</div>
                                @elseif($order->status == 'delivered')
                                    <div class="badge badge-primary">{{ $order->status }}</div>
                                @else
                                    <div class="badge badge-warning">{{ $order->status }}</div>
                                @endif
                            </div>
                            <p class="mt-2">
                                <span class="font-weight-bold">Shipping Address - </span>
                                <span class="mr-2">{{ $order->ward." ward, ". $order->street . " St, (No) " . $order->number. " , ". $order->township }}</span>
                            </p>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>QTY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->menus as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset("/storage/$item->image") }}" width="100px" height="80px" style="object-fit:cover" alt="">
                                            </td>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>
                                                {{ $item->price }}
                                            </td>
                                            <td>
                                                {{ $item->pivot->quantity }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>