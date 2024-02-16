<x-app-layout>

 
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 bg-warning">
                <div class="text-center d-flex justify-center items-center">
                    <img src="{{  Auth::user()->profile_picture }}" alt="Profile Picture" class="rounded-circle shadow" width="200" height="200">
                    <h3 class="ml-3"> {{ Auth::user()->name }} </h3>
                </div>
            </h2>
        </x-slot>

        <div class="mt-4">
            <h4>Chosen Route:</h4>
        
            <div>
                {{-- <h4>Start City: {{ $route['startCity'] }} to 
                End City: {{ $route['endCity'] }}</h4> --}}
                <hr>
            </div>
        

        
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#routeSelectionModal">
                Routes
            </button>
            <div class="modal fade" id="routeSelectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Select a Route</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('driver.updateRoute') }}">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="route">Select a Route:</label>
                                    <select class="form-control" id="route" name="route_id" required>
                                        @foreach ($routeCities as $route)
                                        <option value="{{ $route['route_id'] }}" >
                                            {{ $route['startCity'] }} to {{ $route['endCity'] }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Route</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addScheduleModal">
                Add Schedule
            </button>

            <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="date" name="date" id="date">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>