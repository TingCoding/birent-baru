<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ 'css/navbar.css' }}" />
    <link rel="stylesheet" href="{{ 'css/home.css' }}" />
    <title>BiRent</title>
</head>
<style>
    .sign-in-btn:hover, .sign-up-btn:hover {
        background-color: white;
        color: #8B0000; 
        border: 2px solid #8B0000;
    }
</style>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ 'images/logoBirent.png' }}" alt="">
        </div>
        <div class="nav-links">
            <a href="#" class="active">HOME</a>
            <button class="sign-up-btn">REGISTER</button>
            <button class="sign-in-btn">SIGN IN</button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                Need a comfortable<br>
                and affordable<br>
                rental car?
            </h1>
            <div class="hero-divider"></div>
            <p class="hero-description">
                BiRent! Easy, convenient, and affordable car rental solution for every trip 
                <span class="hero-emoji">🚗🏁</span>
            </p>
        </div>
        
        <div class="hero-image">
            <div class="car-container">
                <img src="{{ 'images/rubicon.png' }}" alt="White Jeep Rubicon" class="car-image">
            </div>
        </div>
    </section>

    <section class="section__container steps__container" id="rent">
        <p class="section__subheader">HOW IT WORKS</p><br>
        <h2 class="section__header">Rentgo following 3 working steps</h2>
        <div class="steps__grid">
            <div class="steps__card">
                <span><i class="ri-map-pin-fill"></i></span>
                <h4>Pilih Lokasi</h4>
                <p>
                    Pilih lokasi rental yang Anda inginkan dari jaringan luas tempat penyewaan mobil kami.                </p>
            </div>

            <div class="steps__card">
                <span><i class="ri-calendar-check-fill"></i></span>
                <h4>Tanggal Penjemputan</h4>
                <p>
                    Tentukan tanggal dan waktu penjemputan mobil sesuai keinginan Anda dengan opsi penjadwalan yang fleksibel.
                </p>
            </div>

            <div class="steps__card">
                <span><i class="ri-bookmark-3-fill"></i></span>
                <h4>Pesan Mobil Anda</h4>
                <p>
                    Jelajahi berbagai pilihan kendaraan kami dan pilih yang paling sesuai dengan kebutuhan Anda.                </p>
            </div>
        </div>
    </section>
    <br><br><br>

    <section class="section__container service__container" id="service">
        <div class="service__image">
            <img src="images/fthd.png" alt="seal" style="margin-left: 10%">
        </div>
        <div class="service__content">
            <p class="section__subheader">LAYANAN TERBAIK</p><br>
            <h2 class="section__header">Rasakan pengalaman terbaik dengan penawaran rental kami</h2>
            <ul class="service__list">
                <li>
                    <span><i class="ri-price-tag-3-fill"></i></span>
                    <div>
                        <h4>Penawaran untuk setiap anggaran</h4>
                        <p>Dari mobil ekonomi hingga kendaraan mewah, kami memiliki sesuatu untuk semua orang, memastikan Anda mendapatkan nilai terbaik untuk uang Anda</p>
                    </div>
                </li>
                <li>
                    <span><i class="ri-wallet-fill"></i></span>
                    <div>
                        <h4>Jaminan harga terbaik</h4>
                        <p>Kami memastikan Anda mendapatkan tarif yang kompetitif di pasar, sehingga Anda dapat memesan dengan percaya diri mengetahui bahwa Anda mendapatkan penawaran terbaik.</p>
                    </div>
                </li>
                <li>
                    <span><i class="ri-customer-service-fill"></i></span>
                    <div>
                        <h4>Support 24/7</h4>
                        <p>Tim kami yang berdedikasi tersedia 24/7 untuk membantu Anda dengan pertanyaan atau masalah apa pun, memastikan pengalaman rental yang lancar</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <br><br><br>
    <section class="section__container experience__container" id="ride">
        <p class="section__subheader">CUSTOMER EXPERIENCE</p><br>
        <h2 class="section__header">Kami memastikan pengalaman pelanggan terbaik</h2>
        <div class="experience__content">
            <div class="experience__card">
                <span><i class="ri-price-tag-3-fill"></i></span>
                <h4>Harga Kompetitif</h4>
            </div>
            <div class="experience__card">
                <span><i class="ri-money-rupee-circle-fill"></i></span>
                <h4>Sewa Lebih Mudah Sesuai Anggaran Anda</h4>
            </div>
            <div class="experience__card">
                <span><i class="ri-bank-card-fill"></i></span>
                <h4>Rencana Pembayaran Paling Fleksibel</h4>
            </div>
            <div class="experience__card">
                <span><i class="ri-award-fill"></i></span>
                <h4>Garansi Mobil Terbaik yang Diperpanjang</h4>
            </div>
            <div class="experience__card">
                <span><i class="ri-customer-service-2-fill"></i></span>
                <h4>Bantuan 24/7</h4>
            </div>
            <div class="experience__card">
                <span><i class="ri-car-fill"></i></span>
                <h4>Pilihan Bengkel Sesuai Keinginan Anda</h4>
            </div>
            <img src="images/experience.png" alt="experience" style="margin-left: 35%; margin-right: auto;">
        </div>
    </section>
    <br><br><br>
    
    <footer>
        <div class="section__container footer__container" style="display: flex; justify-content: center; align-items: start; gap: 20%;">
            <div class="footer__col">
                <h4>About RentalX</h4>
                <ul class="footer__links">
                    <li><a href="#">Why RentalX</a></li>
                    <li><a href="#">Our Story</a></li>
                    <li><a href="#">Investors</a></li>
                    <li><a href="#">Press Centers</a></li>
                    <li><a href="#">Advertise</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h4>Resources</h4>
                <ul class="footer__links">
                    <li><a href="#">Download</a></li>
                    <li><a href="#">Help Centers</a></li>
                    <li><a href="#">Guides</a></li>
                    <li><a href="#">Partner Network</a></li>
                    <li><a href="#">Mechanics</a></li>
                    <li><a href="#">Developer</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h4>Extras</h4>
                <ul class="footer__links">
                    <li><a href="#">Rental Deal</a></li>
                    <li><a href="#">Repair Shop</a></li>
                    <li><a href="#">View Booking</a></li>
                    <li><a href="#">Hire Companies</a></li>
                    <li><a href="#">New Offers</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <br><br>
    <script src="{{ 'js/register.js' }}"></script>
    <script src="{{ 'js/login.js' }}"></script>
</body>
</html>