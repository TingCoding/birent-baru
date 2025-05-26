<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
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
            <a href="#" class="active">CARS</a>
        </div>
    </nav>

    <form action="/update-car/{{ $car->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="main-content">
            <div class="form-container">
                <h2 class="form-title">Edit Car</h2>
                
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
                    <label for="Name" class="form-label">Car Name</label>
                    <input type="text" class="form-input" name="Name" id="Name" placeholder="Car Name" value="{{ old('Name', $car->Name) }}" required>
                    @error('Name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Subtitle" class="form-label">Car Subtitle</label>
                    <input type="text" class="form-input" name="Subtitle" id="Subtitle" placeholder="Subtitle" value="{{ old('Subtitle', $car->Subtitle) }}" required>
                    @error('Subtitle')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="CategoryId" class="form-label">Category</label>
                    <select name="CategoryId" id="CategoryId" class="form-input" required onchange="updateCategoryName()">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" data-name="{{ $category->Name }}"
                                {{ old('CategoryId', $car->CategoryId) == $category->id ? 'selected' : '' }}>
                                {{ $category->Name }}
                            </option>
                        @endforeach
                    </select>
                    <!-- Hidden input untuk CategoryName -->
                    <input type="hidden" name="CategoryName" id="CategoryName" value="{{ old('CategoryName', $car->CategoryName) }}">
                    @error('CategoryId')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                    @error('CategoryName')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Passengers" class="form-label">Passengers</label>
                    <input type="number" class="form-input" name="Passengers" id="Passengers" placeholder="Passengers" value="{{ old('Passengers', $car->Passengers) }}" min="1" required>
                    @error('Passengers')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Seats" class="form-label">Seats</label>
                    <input type="number" class="form-input" name="Seats" id="Seats" placeholder="Seats" value="{{ old('Seats', $car->Seats) }}" min="1" required>
                    @error('Seats')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Bags" class="form-label">Bags</label>
                    <input type="number" class="form-input" name="Bags" id="Bags" placeholder="Bags" value="{{ old('Bags', $car->Bags) }}" min="0" required>
                    @error('Bags')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Luggages" class="form-label">Luggages</label>
                    <input type="number" class="form-input" name="Luggages" id="Luggages" placeholder="Luggages" value="{{ old('Luggages', $car->Luggages) }}" min="0" required>
                    @error('Luggages')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Price" class="form-label">Price</label>
                    <input type="number" class="form-input" name="Price" id="Price" placeholder="Price" value="{{ old('Price', $car->Price) }}" min="0" required>
                    @error('Price')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Description" class="form-label">Description</label>
                    <textarea class="form-input" name="Description" id="Description" placeholder="Description" rows="4" required>{{ old('Description', $car->Description) }}</textarea>
                    @error('Description')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Photo" class="form-label">Photo</label>
                    @if($car->Photo)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/cars/' . $car->Photo) }}" alt="Current Photo" style="max-width: 200px; max-height: 150px; border-radius: 5px;">
                            <p style="font-size: 12px; color: #666;">Current photo: {{ $car->Photo }}</p>
                        </div>
                    @endif
                    <input type="file" class="form-input" name="Photo" id="Photo" accept="image/*">
                    <small style="color: #666; font-size: 12px;">Accepted formats: JPEG, PNG, JPG, GIF. Max size: 2MB. Leave empty to keep current photo.</small>
                    @error('Photo')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="form-btn">Update Car</button>
            </div>
        </div>
    </form>

    <script>
        function updateCategoryName() {
            const categorySelect = document.getElementById('CategoryId');
            const categoryNameInput = document.getElementById('CategoryName');
            const selectedOption = categorySelect.options[categorySelect.selectedIndex];
            
            if (selectedOption.value) {
                categoryNameInput.value = selectedOption.getAttribute('data-name');
            } else {
                categoryNameInput.value = '';
            }
        }

        // Set initial value saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.getElementById('CategoryId');
            if (categorySelect.value) {
                updateCategoryName();
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>