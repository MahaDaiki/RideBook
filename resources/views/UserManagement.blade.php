<x-app-layout>

     <!-- Page Wrapper -->
     <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ '/' }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
              
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
      
            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('user.management') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                 

                
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 ml-3">
                            {{-- <h6 class="m-0 font-weight-bold text-warning">Users:</h6> --}}
                            <button  class="m-0 font-weight-bold text-warning ml-5" id="showPassengerButton">Show Passengers</button>
                            <button class="m-0 font-weight-bold text-warning ml-5" id="showDriverButton">Show Drivers</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-center">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"  >
                                    
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

                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone number</th>
                                            <th><button class="m-0 font-weight-bold text-warning border" id="addPassengerButton" data-toggle="modal" data-target="#addPassengerModal">+</button></th>
                                        </tr>
                                        
                                    </thead>
                                    
                                    <tbody>
                                       
                                            @foreach ($passengers as $passenger)
                                            <tr>
                                                <td>{{ $passenger->user->name }}</td>
                                               <td>{{ $passenger->user->email }}</td>
                                               <td>{{ $passenger->user->phonenumber }}</td>
                                               <td> 
                                                <form action="{{ route('delete_passenger', ['passengerId' => $passenger->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     
<div class="modal fade" id="addPassengerModal" tabindex="-1" role="dialog" aria-labelledby="addPassengerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPassengerModalLabel">Add Passenger</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            {{-- route('add.passenger') --}}
                <form id="addPassengerForm" action="{{ route('add.passenger') }}" method="post" enctype="multipart/form-data">
                    @csrf
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
                    <button type="submit" class="btn btn-warning">Add Passenger</button>
                </form>
            </div>
        </div>
    </div>
</div>

                        <div class="card-body">
                            <div class="table-responsive">
                               

                                <table class="table table-bordered" id="driverTable" width="100%" cellspacing="0"  style="display: none;">
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
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone number</th>
                                            <th>Description</th>
                                            <th>payment Method</th>
                                            <th>Taxi</th>
                                            <th> <button class="m-0 font-weight-bold text-warning ml-5" id="addDriverButton" data-toggle="modal" data-target="#addDriverModal">+</button></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                        @foreach ($drivers as $driver)
                                        <tr>
                                            <td>{{ optional($driver->user)->name }}</td>
                                            <td>{{ optional($driver->user)->email }}</td>
                                            <td>{{ optional($driver->user)->phonenumber }}</td>
                                            <td>{{ $driver->Description }}</td>
                                            <td>{{ $driver->payment }}</td>
                                            <td>{{ $driver->taxi_id }}</td>
                                             <td>          
                                                  <form action="{{ route('delete_driver', ['driverId' => $driver->id]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                           
                                </td>
                                        </tr>
                                    @endforeach

                                      
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="addDriverModal" tabindex="-1" role="dialog" aria-labelledby="addDriverModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addDriverModalLabel">Add Driver</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addDriverForm" action="{{ route('add.driver') }}" method="post" enctype="multipart/form-data">
                                    @csrf
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
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-style" placeholder="Description" name="Description" :value="old('Description')">
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Method</label>
                                        <select id="Payment" name="Payment" class="form-style" required>
                                            <option value="cash">Cash</option>
                                            <option value="card">Card</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Vehicle Plate Number</label>
                                        <input type="text" class="form-style" placeholder="Vehicle Plate Number" name="vehicle_platenumber" :value="old('vehicle_platenumber')">
                                    </div>
                                    <div class="form-group">
                                        <label>Vehicle Type</label>
                                        <input type="text" class="form-style" placeholder="Vehicle Type" name="vehicle_type" :value="old('vehicle_type')">
                                    </div>
                                    <button type="submit" class="btn btn-warning">Add Driver</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
               
                    var passengerTable = document.getElementById('dataTable');
                    var driverTable = document.getElementById('driverTable');
                    var showPassengerButton = document.getElementById('showPassengerButton');
                    var showDriverButton = document.getElementById('showDriverButton');
                    
            
                    function showPassengerTable() {
                        passengerTable.style.display = 'table';
                        driverTable.style.display = 'none';
                    }
            
                    function showDriverTable() {
                        passengerTable.style.display = 'none';
                        driverTable.style.display = 'table';
                    }
            
                    showPassengerButton.addEventListener('click', showPassengerTable);
                    showDriverButton.addEventListener('click', showDriverTable);
                });
            </script>
</x-app-layout>