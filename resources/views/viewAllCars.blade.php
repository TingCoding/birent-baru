<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Cars</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cars.css') }}">
</head>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #800000;
    color: #fff;
}

.main-content {
    padding: 40px 20px;
    max-width: 1300px;
    margin: auto;
}

h1 {
    color: #fff;
    border-bottom: 2px solid #fff;
    padding-bottom: 5px;
    margin-bottom: 30px;
}

.category-section {
    margin-bottom: 60px;
}

.cars-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(800px, 1fr));
    gap: 30px;
}

.car-card {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    align-items: flex-start;
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.3);
    color: #000;
}

.left-side {
    flex: 1 1 40%;
    text-align: center;
}

.left-side img {
    width: 100%;
    max-width: 400px;
    border-radius: 12px;
}

.price-section {
    margin-top: 20px;
}

.price {
    font-size: 1.4rem;
    font-weight: bold;
    color: #800000;
    margin-bottom: 10px;
}

.rent-btn {
    padding: 10px 20px;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    background-color: #ffc107;
    color: #000;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.rent-btn:hover {
    background-color: #e0a800;
}

.right-side {
    flex: 1 1 55%;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.car-details {
    margin-bottom: 10px;
}

.car-title {
    font-size: 1.6rem;
    font-weight: bold;
}

.car-subtitle {
    font-size: 1.1rem;
    color: #333;
}

.specs {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    font-size: 1rem;
}

.spec {
    display: flex;
    align-items: center;
    gap: 8px;
}

.spec i {
    color: #800000;
}

.benefits {
    list-style: none;
    padding-left: 0;
    margin: 10px 0;
}

.benefits li {
    margin: 6px 0;
    color: #0a0;
    font-weight: 500;
}

.benefits i {
    margin-right: 6px;
}

.description {
    font-size: 0.95rem;
    line-height: 1.5;
    color: #333;
}

.description i {
    margin-right: 5px;
    color: #555;
}

.ubahCar {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.ubah-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    background-color: #8B0000;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

.ubah-btn:hover {
    background-color: #146c43;
}

.ubah-btn a {
    text-decoration: none;
    color: white;
}

.ubah-btn.delete {
    background-color: #dc3545;
}

.ubah-btn.delete:hover {
    background-color: #b02a37;
}

.no-cars {
    text-align: center;
    padding: 40px 20px;
    background: #fff;
    border-radius: 12px;
    color: #666;
}

/* Admin action links */
.adminPower {
    text-align: center;
    padding: 20px;
    background-color: #4B0000;
}

.adminPower a {
    display: inline-block;
    margin: 10px;
    padding: 8px 12px;
    background-color: #ffc107;
    color: #000;
    text-decoration: none;
    font-weight: bold;
    border-radius: 6px;
    transition: background-color 0.3s ease-in-out;
}

.adminPower a:hover {
    background-color: #e0a800;
}

@media (max-width: 768px) {
    .cars-grid {
        grid-template-columns: 1fr;
    }
    
    .car-card {
        flex-direction: column;
    }
    
    .left-side, .right-side {
        flex: 1 1 100%;
    }
}
</style>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logoBirent.png') }}" alt="">
        </div>
        <div class="nav-links">
            <a href="/dashboard">HOME</a>
            <a href="#" class="active">CARS</a>
        </div>
    </nav>
    
    @if (Auth::user() && Auth::user()->role == 'admin')
        <div class="adminPower">
            <a href="/add-car" style="font-size: 20px;">+ Car</a>
            <br>
            <a href="/add-category" style="font-size: 20px;">+ Category</a>
        </div>
    @endif

    <div class="main-content">
        @forelse ($categories as $category)
            @php
                $categoryCars = $cars->where('CategoryId', $category->id);
            @endphp
            
            @if($categoryCars->count() > 0)
                <div class="category-section">
                    <h1>{{ $category->Name }}</h1>
                    
                    <div class="cars-grid">
                        @foreach ($categoryCars as $car)
                            <div class="car-card" data-car-id="{{ $car->id }}">
                                <div class="left-side">
                                    <img src="{{ asset('images/' . $car->Photo) }}" alt="{{ $car->Name }}">
                                    <div class="price-section">
                                        <div class="price">Rp {{ number_format($car->Price) }},- / day</div>
                                        <!-- Perbaikan: Tambah tombol Choose dengan ID yang benar -->
                                        {{-- @if (!Auth::user() || Auth::user()->role != 'admin') --}}
                                            {{-- <button class="rent-btn" data-car-id="{{ $car->id }}" onclick="chooseCar({{ $car->id }})">Choose</button> --}}
                                        {{-- @endif --}}
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
                                                <a href="/edit-car/{{ $car->id }}">Edit</a>
                                            </button>
                                            <form action="/delete-car/{{ $car->id }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="ubah-btn delete" type="submit" onclick="return confirm('Are you sure you want to delete this car?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @empty
            <div class="no-cars">
                <h3>No categories available</h3>
                <p>Please add some categories first.</p>
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <a href="/add-category" class="btn">Add Category</a>
                @endif
            </div>
        @endforelse
        
        @if($categories->count() > 0 && $cars->count() == 0)
            <div class="no-cars">
                <h3>No cars available</h3>
                <p>Please add some cars to display.</p>
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <a href="/add-car" class="btn">Add Car</a>
                @endif
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- Perbaikan: JavaScript yang benar untuk handle klik Choose -->
    <script>
        function chooseCar(carId) {
            // Redirect ke halaman rental dengan ID mobil yang benar
            window.location.href = `/rental/${carId}`;
        }
        
        // Alternative: menggunakan event listener
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
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>