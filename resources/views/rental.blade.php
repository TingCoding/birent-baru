<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rental.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logoBirent.png') }}" alt="">
        </div>
        <div class="nav-links">
            <a href="/dashboard">HOME</a>
            <a href="#" class="active">RENTAL</a>
        </div>
    </nav>

    <div class="main-content">
        <div class="form-container">
            <h2 class="form-title">Car Rental Form</h2>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rental.store') }}" method="POST" enctype="multipart/form-data" id="rentalForm">
                @csrf
                
                <!-- Hidden car ID - pastikan ini ada -->
                <input type="hidden" name="car_id" value="{{ $car->id ?? old('car_id', 1) }}">
                
                @if($car)
                    <div class="form-group">
                        <label>Selected Car</label>
                        <input type="text" class="form-input" value="{{ $car->Name }}" readonly>
                    </div>
                @endif
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="PhoneNumber">Phone Number *</label>
                        <input type="text" name="PhoneNumber" id="PhoneNumber" class="form-input" 
                               value="{{ old('PhoneNumber') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Address">Address *</label>
                        <input name="Address" id="Address" class="form-input" rows="3" required>{{ old('Address') }}</input>
                    </div>
                </div>
                <div class="form-group">
                    <label for="StartDate">Start Date *</label>
                    <input type="date" name="StartDate" id="StartDate" class="form-input" 
                    value="{{ old('StartDate') }}" min="{{ date('Y-m-d') }}" required>
                </div>
                <br>
                
                <div class="form-group">
                    <label for="EndDate">End Date *</label>
                    <input type="date" name="EndDate" id="EndDate" class="form-input" 
                           value="{{ old('EndDate') }}" required>
                </div>
                <br>
                
                <div class="form-group">
                    <label for="IDCard">ID Card Photo *</label>
                    <input type="file" name="IDCard" id="IDCard" class="form-input" 
                           accept="image/jpeg,image/png,image/jpg,image/gif" required>
                    <small>Max size: 2MB. Formats: JPEG, PNG, JPG, GIF</small>
                </div>
                <br>
                
                <div class="form-group">
                    <label for="DriverLicense">Driver License Photo *</label>
                    <input type="file" name="DriverLicense" id="DriverLicense" class="form-input" 
                           accept="image/jpeg,image/png,image/jpg,image/gif" required>
                    <small>Max size: 2MB. Formats: JPEG, PNG, JPG, GIF</small>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="submit-btn">Submit Rental Request</button>
                    <a href="/cars" class="cancel-btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Set minimum end date when start date changes
        document.getElementById('StartDate').addEventListener('change', function() {
            const startDate = this.value;
            const endDateInput = document.getElementById('EndDate');
            
            if (startDate) {
                const nextDay = new Date(startDate);
                nextDay.setDate(nextDay.getDate() + 1);
                endDateInput.min = nextDay.toISOString().split('T')[0];
            }
        });

        // Form submission confirmation
        document.getElementById('rentalForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Confirm Rental Request?',
                text: 'Are you sure you want to submit this rental request?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Submit!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: 'Processing...',
                        text: 'Please wait while we process your request',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });
                    
                    // Submit form
                    this.submit();
                }
            });
        });

        @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>