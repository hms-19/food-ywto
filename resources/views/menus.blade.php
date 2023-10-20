<x-layout>
    <!-- Page Header End -->
    <!-- Shop Start -->
    <div class="container-fluid pt-5" style="margin-top: 80px">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Our Categories</h5>
                    <a href="/menus" class="text-decoration-none d-block text-dark card my-2 text-center  py-3 w-100">All</a>
                    @foreach ($categories as $key => $category)
                    <a href="/menus?cat={{ $category->id }}" class="text-decoration-none d-block text-dark card my-2 text-center  py-3 w-100">{{ $category->name }}</a>
                    @endforeach     
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3" id="search-data">
                    @if (count($menus) == 0)
                        <h3 class="col-12 text-center">There is no dishs</h3>
                    @else
                        <div class="col-12 my-3">
                            <form action="/menus">
                                <div class="form-row align-items-center">
                                  
                                    <div class="col-sm-3 my-1">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Search here...">
                                  </div>

                                  <div class="col-auto my-1">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </div>
                              </form>
                        </div>
                        @foreach ($menus as $menu)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item rounded-lg border-1 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img src="{{ asset("/storage/$menu->image") }}" alt="{{ $menu->image }}" width="100%" height="200px" style="object-fit: cover">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="lead font-weight-bold mb-3 text-primary">{{ $menu->name }}</h6>
                                    <div class="justify-content-center">
                                        <h6>{{ $menu->price }} MMK</h6>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mt-2 text-dark ml-3">
                                            <i class="fas fa-list-alt text-primary"></i>
                                            {{ $menu->category->name }}
                                        </p>
                                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $menu->id }}" name="id">
                                            <input type="hidden" value="{{ $menu->name }}" name="name">
                                            <input type="hidden" value="{{ $menu->price }}" name="price">
                                            <input type="hidden" value="{{ $menu->image }}"  name="image">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="btn btn-primary">Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3" id="page-data">
                            {{ $menus->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>                               
        <!-- Cart Modal -->
       
    <script>

    </script>
</x-layout>