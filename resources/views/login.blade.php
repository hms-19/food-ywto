<x-layout>
    @if (session('login_error'))
    <div class="alert alert-danger text-center">
        {{ session('login_error') }}
    </div>
    @endif
    <!-- Contact Start -->
    <div class="container pt-5" style="margin-top: 80px">
        <div class="card">
            <div class="card-body border border-5">
                <div class="text-center mb-4">
                    <h2 class="section-title px-5"><span class="px-2">Login</span></h2>
                </div>
                <div class="row">
                    <div class="col-md-8 d-block mx-auto">
                        <div class="contact-form w-100">
                            <div id="success"></div>
                            <form method="POST" action="" class="w-100">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error("email")
                                        <li class="text-danger">{{$message}}</li>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                    @error("password")
                                        <li class="text-danger">{{$message}}</li>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
    
                                <p class="text-center my-3">
                                    If you don't have an account ? <a href="/register" class="text-decoration-none">Register here</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-layout>