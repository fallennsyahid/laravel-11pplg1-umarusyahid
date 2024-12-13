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
    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" class="admin-form"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ $portfolio->title }}">
        </div>

        <div>
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-textarea">{{ $portfolio->description }}</textarea>
        </div>

        <div>
            <label for="link" class="form-label">Link:</label>
            <input type="text" id="link" name="link" class="form-input" value="{{ $portfolio->link }}">
        </div>

        <div>
            <label for="picture" class="form-label">Picture:</label>
            <input type="file" id="picture" name="picture" class="form-input">
            <img src="{{ asset('storage/' . $portfolio->picture) }}" alt="{{ $portfolio->title }}" width="200px">
            <p>Current: {{ $portfolio->picture }}</p>
        </div>

        <button type="submit" class="form-button">Update</button>
    </form>

    <!-- Link Edit dengan ID yang benar -->
    <a href="{{ route('portfolio.index') }}" class="form-button" style="text-decoration: none">Back</a>
</body>

</html>
