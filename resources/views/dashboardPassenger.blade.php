<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 bg-warning">
            <div class="text-center d-flex justify-center items-center">
                <img src="{{ asset( Auth::user()->profilepicture) }}" alt="Profile Picture" class="rounded-circle shadow" width="200" height="200">
                <h3 class="ml-3"> {{ Auth::user()->name }} </h3>
            </div> 
        </h2>
    </x-slot>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="text-center h1">Your Reservations</h1>

        @if ($reservations->count() > 0)
            <table class="table table-bord mb-4" >
                <thead>
                    <tr>
                        <th>Reservation</th>
                        <th>Seats</th>
                        <th>Date</th>
                        <th>Driver</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->Available_Seats }}</td>
                            <td>{{ $reservation->Date }}</td>
                            <td>{{ $reservation->driverSchedule->driver->user->name }}</td>
                            <td>
                                <form action="{{ route('submit.rating', ['reservation' => $reservation->id]) }}" method="post" class="d-flex">
                                    @csrf
                                    <div class="rating">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ $i == $reservation->Value ? 'checked' : '' }}>
                                            <label for="star{{ $i }}"></label>
                                        @endfor
                                    </div>
                                    <button type="submit" class="btn btn-sm ml-2">+</button>
                                </form>
                            </td>
                            <td>
                                @if ($reservation->Feedback)
                                    <p>{{ $reservation->Feedback }}</p>
                                @else
                                    <form action="{{ route('submit.feedback', ['reservation' => $reservation->id]) }}" method="post">
                                        @csrf
                                        <textarea name="feedback" class="form-control" placeholder="Leave your feedback"></textarea>
                                        <button type="submit" class="btn btn-sm btn-success mt-2">Submit</button>
                                    </form>
                                @endif
                            </td>
                            <td><form action="{{ route('delete.reservation', ['reservation' => $reservation->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No reservations found.</p>
        @endif
    </div>
</x-app-layout>
