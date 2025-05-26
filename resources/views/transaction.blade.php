<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trans.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logoBirent.png') }}" alt="">
        </div>
        <div class="nav-links">
            <a href="/dashboard">HOME</a>
            <a href="/cars">CARS</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="transaction-container">
            <h2 class="transaction-title">Transaction</h2>
            
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
            
            <form action="{{ route('transaction.store') }}" method="POST" id="transactionForm">
                @csrf
                
                <!-- Hidden field for rental ID -->
                <input type="hidden" name="rental_id" value="{{ $rental->id }}">
                <br>
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" class="form-input" value="{{ $user->name ?? 'Name not found' }}" readonly>
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-input" value="{{ $user->email ?? 'Email not found' }}" readonly>
                </div>
                
                <div class="form-group">
                    <label>Transaction Number</label>
                    <input type="text" class="form-input" value="{{ $trNumber }}" readonly>
                </div>

                <div class="form-group">
                    <label>Car</label>
                    <input type="text" class="form-input" value="{{ $car->Name ?? 'Car Name' }}" readonly>
                </div>

                <div class="form-group">
                    <label>Rental Period</label>
                    <input type="text" class="form-input" value="{{ $rentalPeriod }}" readonly>
                </div>

                <div class="form-group">
                    <label>Rental Days</label>
                    <input type="text" class="form-input" value="{{ $rentalDays }} days" readonly>
                </div>

                <div class="form-group">
                    <label>Price per Day</label>
                    <input type="text" class="form-input" value="Rp {{ number_format($car->Price ?? 0, 0, ',', '.') }},-" readonly>
                </div>
                
                <div class="payment-section">
                    <div class="total-payment-label">Total Payment</div>
                    <div class="total-amount">Rp {{ number_format($totalPayment ?? 0, 0, ',', '.') }},-</div>
                    <button type="submit" class="pay-btn">Process Transaction</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('transactionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Confirm Transaction?',
                text: 'Are you sure you want to process this transaction?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Process!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: 'Processing...',
                        text: 'Please wait while we process your transaction',
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

        // Show success message if transaction was successful
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