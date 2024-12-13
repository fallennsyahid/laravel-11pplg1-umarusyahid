<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('asset-landing-page/css/create.css') }}">
</head>

<body>
    <form action="{{ route('home.update', $home->id) }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ $home->title }}">
        </div>

        <div>
            <label for="subtitle" class="form-label">Subtitle:</label>
            <input type="text" id="subtitle" name="subtitle" class="form-input" value="{{ $home->subtitle }}">
        </div>

        <div>
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-textarea">{{ $home->description }}</textarea>
        </div>

        <div>
            <label for="photos" class="form-label">Photos:</label>
            <input type="file" id="photos" name="photos" class="form-file">
            <img src="{{ asset('storage/' . $home->photos) }}" alt="{{ $home->photos }}">
            <p>Current: {{ $home->photos }}</p>
        </div>

        <button type="submit" class="form-button">Update</button>
    </form>

    <!-- Link Edit dengan ID yang benar -->
    <a href="{{ route('home.index') }}" class="form-button" style="text-decoration: none">Back To Home</a>


    <!-- Form Delete -->
    {{-- <form action="{{ route('admin.home.destroy', $home->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')"
            class="form-button">Delete</button>
    </form> --}}
</body>

</html>
