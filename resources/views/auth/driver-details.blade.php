<x-guest-layout>
    <div class="text-center">
        <h5>Driver Information</h5>
        <form method="POST" action="{{ route('driverstore') }}">
            @csrf
            <div class="form-group">
                <label >Description</label>
                <input type="text" class="form-style" placeholder="Description" name="Description" :value="old('Description')">
                @error('Description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>
            <div class="form-group">
                <label >Payment Method</label>
                <select id="Payment" name="Payment" class="form-style" required>
                    <option value="cash">Cash</option>
                    <option value="card">Card</option>
                    @error('Payment')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                </select>
            </div>
            <div class="form-group">
                <label>Vehicle Plate Number</label>
                <input type="text" class="form-style" placeholder="Vehicle Plate Number" name="vehicle_platenumber" :value="old('vehicle_platenumber')">
                @error('vehicle_platenumber')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>
            <div class="form-group">
                <label >Vehicle Type</label>
                <input type="text" class="form-style" placeholder="Vehicle Type" name="vehicle_type" :value="old('vehicle_type')">
                @error('vehicle_type')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>
            <div class="form-group">
              
                <input type="hidden" name="driver_id" value="{{ $userId }}">
            </div>
            <button type="submit" class="btn btn-secondary mx-auto">Save</button>
        </form>
    </div>
    
</x-guest-layout>