<x-app-layout>

     <!-- Page Wrapper -->
     <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
      
            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle">X</button>
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
                            {{-- <h6 class="m-0 font-weight-bold text-primary">Users:</h6> --}}
                            <button  class="m-0 font-weight-bold text-primary ml-5" id="showPassengerButton">Show Passengers</button>
                            <button class="m-0 font-weight-bold text-primary ml-5" id="showDriverButton">Show Drivers</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"  style="display: none;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                            @foreach ($passengers as $passenger)
                                            <tr>
                                                <td>{{ $passenger->user->name }}</td>
                                               <td>{{ $passenger->user->email }}</td>
                                               <td>{{ $passenger->user->phonenumber }}</td>
                                               <td> 
                                                <form action="{{ route('soft.delete.user', ['id' => $passenger->id]) }}" method="post">
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="driverTable" width="100%" cellspacing="0"  style="display: none;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone number</th>
                                            <th>Description</th>
                                            <th>payment Method</th>
                                            <th>Taxi</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach ($drivers as $driver)
                                        <tr>
                                            <td>{{ $driver->user->name }}</td>
                                            <td>{{ $driver->user->email }}</td> 
                                            <td>{{ $driver->user->phonenumber}}</td>
                                            <td>{{ $driver->Description }}</td>
                                            <td>{{ $driver->payment }}</td>
                                            <td>{{ $driver->taxi_id }}</td>
                                            <td>            <form action="{{ route('soft.delete.user', ['id' => $driver->id]) }}" method="post">
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