<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ 'css/cars.css' }}">
    <link rel="stylesheet" href="{{ 'css/navbar.css' }}">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ 'images/logoBirent.png' }}" alt="">
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
            <br>
            <a href="/view-all-cars" style="font-size: 20px;">View All Cars</a>
        </div>
    @endif

    <div class="swiper-container swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="product">
                    <img src="{{ 'images/Luxury.png' }}" alt="">
                    <div class="car-features">
                        <div class="features">
                            <i class="fas fa-user"></i>
                            <span class="feature-value">2-5</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-door-closed"></i> 
                            <span class="feature-value">3-4</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase"></i>
                            <span class="feature-value">1</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase-rolling"></i>
                            <span class="feature-value">1</span>
                        </div>
                    </div>
                    <a href="/luxury" class="rent-btn">Choose</a>
                </div>
                <div class="category">
                    <h2>Luxury</h2>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product">
                    <img src="{{ 'images/Medium.png' }}" alt="">
                    <div class="car-features">
                        <div class="features">
                            <i class="fas fa-user"></i>
                            <span class="feature-value">2-5</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-door-closed"></i> 
                            <span class="feature-value">4</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase"></i>
                            <span class="feature-value">2</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase-rolling"></i>
                            <span class="feature-value">1</span>
                        </div>
                    </div>
                    <a href="/medium" class="rent-btn">Choose</a>
                </div>
                <div class="category">
                    <h2>Medium</h2>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product">
                    <img src="{{ 'images/Family.png' }}" alt="">
                    <div class="car-features">
                        <div class="features">
                            <i class="fas fa-user"></i>
                            <span class="feature-value">5-7</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-door-closed"></i> 
                            <span class="feature-value">5</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase"></i>
                            <span class="feature-value">2</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase-rolling"></i>
                            <span class="feature-value">2</span>
                        </div>
                    </div>
                    <a href="/family" class="rent-btn">Choose</a>
                </div>
                <div class="category">
                    <h2>Family</h2>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product">
                    <img src="{{ 'images/Minibus.png' }}" alt="">
                    <div class="car-features">
                        <div class="features">
                            <i class="fas fa-user"></i>
                            <span class="feature-value">12-19</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-door-closed"></i> 
                            <span class="feature-value">4</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase"></i>
                            <span class="feature-value">4</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase-rolling"></i>
                            <span class="feature-value">4</span>
                        </div>
                    </div>
                    <a href="/minibus" class="rent-btn">Choose</a>
                </div>
                <div class="category">
                    <h2>Minibus</h2>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="product">
                    <img src="{{ 'images/Electric.png' }}" alt="">
                    <div class="car-features">
                        <div class="features">
                            <i class="fas fa-user"></i>
                            <span class="feature-value">2-5</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-door-closed"></i> 
                            <span class="feature-value">2-4</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase"></i>
                            <span class="feature-value">1</span>
                        </div>
                        <div class="features">
                            <i class="fas fa-suitcase-rolling"></i>
                            <span class="feature-value">1</span>
                        </div>
                    </div>
                    <a href="/electric" class="rent-btn">Choose</a>
                </div>
                <div class="category">
                    <h2>Electric</h2>
                </div>
            </div>
            
        </div>
        <!-- Tombol Navigasi -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- Pagination -->
        {{-- <div class="swiper-pagination"></div> --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ 'js/display.js' }}"></script>
    <script src="{{ 'js/navbar.js' }}"></script>
</body>
</html>
