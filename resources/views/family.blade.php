<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/allDisplay.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ 'images/logoBirent.png' }}" alt="">
        </div>
        <div class="nav-links">
            <a href="/dashboard">HOME</a>
            <a href="/cars">CARS</a>
        </div>
    </nav>

    <div class="swiper-container swiper">
        <div class="swiper-wrapper">
            @if(isset($cars) && $cars->count() > 0)
                @foreach ($cars as $car)
                    <div class="swiper-slide" data-car-id="{{ $car->id }}">
                        <div class="left-side">
                            <img src="{{ asset(path: 'images/' . $car->Photo) }}" alt="{{ $car->Name }}">
                            <br><br>
                            <div class="price-section">
                                <div class="price">Rp {{ number_format($car->Price) }},- / day</div>
                                <!-- Perbaikan: tambah data-car-id dan event handler -->
                                <button class="rent-btn" data-car-id="{{ $car->id }}" onclick="chooseCar({{ $car->id }})">Choose</button>
                            </div>
                        </div>
                        
                        <div class="right-side">
                            <div class="car-details">
                                <div class="car-title">{{ $car->Name }}</div>
                                <div class="car-subtitle">{{ $car->Subtitle }}</div>
                            </div>
                            <div class="specs">
                                <div class="spec">
                                    <i class="fas fa-user"></i>
                                    <span class="feature-value">{{ $car->Passengers }}</span>
                                </div>
                                <div class="spec">
                                    <i class="fas fa-door-closed"></i> 
                                    <span class="feature-value">{{ $car->Seats }}</span>
                                </div>
                                <div class="spec">
                                    <i class="fas fa-suitcase"></i>
                                    <span class="feature-value">{{ $car->Bags }}</span>
                                </div>
                                <div class="spec">
                                    <i class="fas fa-suitcase-rolling"></i>
                                    <span class="feature-value">{{ $car->Luggages }}</span>
                                </div>
                            </div>
                            <ul class="benefits">
                                <li><i class="bi bi-check2-circle"></i>Low guarantee</li>
                                <li><i class="bi bi-check2-circle"></i>Fair fuel policy</li>
                                <li><i class="bi bi-check2-circle"></i>Great deal</li>
                                <li><i class="bi bi-check2-circle"></i>Instant confirmation</li>
                            </ul>
                            <p class="description">
                                <i class="bi bi-info-circle"></i>
                                {{ $car->Description }}
                            </p>
                            @if (Auth::user() && Auth::user()->role == 'admin')
                                <div class="ubahCar">
                                    <button class="ubah-btn">
                                        <a style="" href="/edit-car/{{ $car->id }}">Edit</a>
                                    </button>
                                    <form action="/delete-car/{{ $car->id }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="ubah-btn" type="submit" onclick="return confirm('Are you sure you want to delete this car?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="swiper-slide">
                    <div class="no-cars">
                        <h3>No Family cars available</h3>
                        <p>Please check back later or add some cars to the database.</p>
                        <a href="/add-car" class="btn">Add Car</a>
                    </div>
                </div>
            @endif
        </div>
        <!-- Tombol Navigasi -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/display.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    
    <!-- Perbaikan: Tambah JavaScript untuk handle klik Choose -->
    <script>
        function chooseCar(carId) {
            // Redirect ke halaman rental dengan ID mobil yang benar
            window.location.href = `/rental/${carId}`;
        }
        
        // Alternative: jika ingin menggunakan event listener
        document.addEventListener('DOMContentLoaded', function() {
            const rentButtons = document.querySelectorAll('.rent-btn');
            
            rentButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const carId = this.getAttribute('data-car-id');
                    if (carId) {
                        window.location.href = `/rental/${carId}`;
                    }
                });
            });
        });
    </script>
</body>
</html>