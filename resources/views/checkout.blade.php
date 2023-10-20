<x-layout>
    <div class="container" style="margin-top: 80px">
        <div class="card">
            <div class="card-body">
                <form action="/checkout" method="POST">
                    @csrf
                    <p class="font-weight-bold text-dark my-3">
                        Personal Info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control" id="name" placeholder="Name">
                            </div>
                            @error('name')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control" id="name" placeholder="Email">
                            </div>
                            @error('email')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" value="{{auth()->user()->phone}}" class="form-control" id="phone" placeholder="Phone">
                            </div>
                            @error('phone')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" value="{{auth()->user()->address}}" class="form-control" id="address" placeholder="Address">
                            </div>
                            @error('address')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div> --}}
                    </div>
                    <p class="font-weight-bold text-dark my-3">
                        Shipping Address
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ward" class="form-label">Ward</label>
                                <input type="text" name="ward"  class="form-control" id="ward" placeholder="Ward">
                            </div>
                            @error('ward')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="street" class="form-label">Street</label>
                                <input type="text" name="street" class="form-control" id="street" placeholder="Street">
                            </div>
                            @error('street')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="township" class="form-label">Township</label>
                                <input type="text" name="township" class="form-control" id="township" placeholder="Township">
                            </div>
                            @error('township')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="number" class="form-label">Number</label>
                                <input type="text" name="number" class="form-control" id="number" placeholder="Number">
                            </div>
                            @error('number')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                    </div>
                    <p class="font-weight-bold text-dark my-3">
                        Payment
                    </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input payment-radio" type="radio" name="payment" checked="checked"  id="cod" value="cod">
                        <label class="form-check-label" for="cod">Cash On Delivery</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input payment-radio" type="radio" name="payment" id="bank" value="bank">
                        <label class="form-check-label" for="bank">Paid Payment</label>
                    </div>

                   <div id="payment_type" style="display: none">
                        <p class=" text-dark my-3">
                            Select Payment Type
                        </p>
                        <div class="row ml-4">
                            <label class="custom-radio">
                                <input type="radio" name="payment_type" value="kpay" />
                                <span class="radio-image kbz-img"></span>
                              </label>
                            
                              <label class="custom-radio">
                                <input type="radio" name="payment_type" value="wavepay" />
                                <span class="radio-image wave-img"></span>
                              </label>
                        </div>
                   </div>

                   <button type="submit" class="btn btn-primary mt-3 d-block">Order Now</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const payments = document.querySelectorAll(".payment-radio")

        Array.from(payments).forEach(function (radio) {
            radio.addEventListener('change', function () {
            if (radio.checked) {
                var selectedValue = radio.value;
                console.log(selectedValue)
                if(selectedValue == 'bank'){
                    document.querySelector("#payment_type").style.display = 'block'
                }
                else{
                    document.querySelector("#payment_type").style.display = 'none'
                }

            }
            });
        });

    </script>
</x-layout>