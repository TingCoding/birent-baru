<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
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

    <form action="/add-category" method="POST">
        @csrf
        <div class="main-content">
            <div class="form-container">
                <h2 class="form-title">Add Category</h2>
                
                @if(session('success'))
                    <div class="alert alert-success" style="color: green; margin-bottom: 15px; padding: 10px; border: 1px solid green; border-radius: 5px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger" style="color: red; margin-bottom: 15px; padding: 10px; border: 1px solid red; border-radius: 5px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="Name" class="form-label">Car Category Name *</label>
                    <input type="text" class="form-input" name="Name" id="Name" placeholder="Car Category Name" value="{{ old('Name') }}" required>
                    @error('Name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="form-btn">Submit</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>