<x-guest-layout>
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>

    <div class="container">
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Errors!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Sign Up </span><span>Log In</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" onclick="redirectToOtherPage()" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-back mb-3">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                                @csrf
                                                <h4 class="mb-3 pb-3">Sign Up</h4>
                                                <div class="form-group">
                                                    <input type="file" class="form-style" id="profilepicture" name="profilepicture" accept="image/*" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-style" placeholder="Full Name" name="name" :value="old('name')" required autofocus>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="tel" class="form-style" placeholder="Phone Number" name="phonenumber" :value="old('phonenumber')">
                                                    <i class="input-icon uil uil-phone"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" class="form-style" placeholder="Email" name="email" :value="old('email')" required>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Password" name="password" required autocomplete="new-password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="mt-4">
                                                    <select id="role" name="role" class="form-style" required>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                               
                                                <button class="btn mt-1" type="submit">Register</button>
                                            </form>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal  text-center " id="driverModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Driver Information</h5>
                    <button type="button" class="close" data-target="#driverModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="driverModalForm">
                <div class="modal-body">
                    <div class="">
                        <label for="Description" class="">Description</label>
                        <input type="text" class="form-style" placeholder="Description" name="Description" :value="old('Description')">
                    </div>
                    <div class="">
                        <label for="Payment" class="">Payment Method</label>
                        <select id="Payment" name="Payment" class="form-style" required>
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                        </select>
                    </div>
                    <div class="">
                        <label for="vehicle_platenumber" class="">Vehicle Plate Number</label>
                        <input type="text" class="form-style" placeholder="Vehicle Plate Number" name="vehicle_platenumber" :value="old('vehicle_platenumber')">
                    </div>
                    <div class="">
                        <label for="vehicle_type" class="">Vehicle Type</label>
                        <input type="text" class="form-style" placeholder="Vehicle Type" name="vehicle_type" :value="old('vehicle_type')">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary mx-auto" data-target="#driverModal" data-dismiss="modal">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div> --}}


    
    <script>
    //   document.getElementById('role').addEventListener('change', function () {
    //         var driverInputs = document.getElementById('driverInputs');
    //         var driverModal = document.getElementById('driverModal');

    //         if (this.value === 'driver') {
                
    //             driverModal.style.display = 'block';
    //         } else {
    //             driverModal.style.display = 'none';
    //         }
    //     });
       
    function redirectToOtherPage() {
        var checkbox = document.getElementById("reg-log");
        if (checkbox.checked) {
            window.location.href = "{{ route('login') }}";
        }
    }
    

    </script>
</x-guest-layout>
