<x-layout>
    <div class="w-100">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show fixed-top z-10" style="width: 500px;top:100px;" role="alert">
            <strong>Great !</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    </div>
    <section id="home" class="d-flex justify-content-center align-items-center flex-column g-3">
        <h1 class="main-title">Dolphin Foods .</h1>
        <p class="mt-3 text-white font-weight-bold text-center">
            Lorem ipsum, dolor sit amet consectetur adipisicing <br> elit. Non possimus aliquam culpa ut temporibus <br> dolor necessitatibus at quidem. Illo, cupiditate!
        </p>
        <a href="/menus" class="btn btn-primary">Find Out You Want</a>
    </section>
    
    <section id="signatures" style="margin: 60px 0">
        <div class="container">
            <div class="row">
                <div class="col-12 my-3">
                    <h2 class="font-weight-bold text-center text-uppercase">
                        Signature <span class="text-primary">Foods</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($signatures as $menu)
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
            </div>
        </div>
    </section>

    <section id="about" style="margin: 60px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="https://media-cdn.tripadvisor.com/media/photo-s/04/7a/5c/b8/hotel-sandy-s-tower.jpg" width="100%" height="350px" style="object-fit: cover" alt="">
                </div>
                <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                    <h2 class="font-weight-bold text-center text-uppercase">
                        OUR <span class="text-primary">TEAM</span>
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ipsum fugit est! Obcaecati, odit cumque eius inventore ea eaque possimus! consectetur adipisicing elit. Eius unde reiciendis officia ad perferendis quaerat suscipit iste velit magnam esse ullam ipsam quae in, assumenda, alias quis fugiat earum fugit.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="counter" style="margin: 60px 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 my-2">
                    <div class="counter-section">
                        <div class="counter">1000</div>
                        <div class="counter-label">Dishes</div>
                    </div>
                </div>
                <div class="col-lg-4 my-2">
                    <div class="counter-section">
                        <div class="counter">5000</div>
                        <div class="counter-label">Happy Customers</div>
                    </div>
                </div>
                <div class="col-lg-4 my-2">
                    <div class="counter-section">
                        <div class="counter">10</div>
                        <div class="counter-label">Years of Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="testimonial text-center">
        <div class="container">
            <div class="heading white-heading">
                Testimonial
            </div>
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                            <p>I recently dined at Dolphin, and I must say, it was a delightful experience! The food was simply scrumptious. From the moment I took the first bite, I was blown away by the flavors. The menu offered a variety of options to cater to different tastes, and everything we tried was top-notch. </p>
                            <h4>John</h4>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="https://cdn.acidcow.com/pics/20190129/russian_girls_01.jpg" class="img-circle img-responsive" /><p>What impressed me just as much as the food was the speed of service. The staff at [Food Shop Name] were incredibly efficient, and our orders came out promptly. This made for a perfect lunch break without any unnecessary wait times.
                            </p>
                            <h4>Mary</h4>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="https://i.guim.co.uk/img/media/cee0e44b6b003934922121a4958ea2c037552fe9/0_0_6802_4082/master/6802.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=55f0fef7638fd2e7dc784b068d7e88ba" class="img-circle img-responsive" />
                            <p>The ambiance was pleasant, and the prices were quite reasonable for the quality of food you get. I'll definitely be returning for more of their mouthwatering dishes. If you're looking for a tasty meal served quickly, don't hesitate to visit Dolphin. It's a hidden gem that's worth a visit! </p>
                            <h4>Anny</h4>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>

</x-layout>
        
        