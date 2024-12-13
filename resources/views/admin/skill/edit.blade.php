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
    <form action="{{ route('skill.update', $skill->id) }}" method="POST" class="admin-form"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ $skill->title }}">
        </div>

        <div>
            <label for="photo" class="form-label">Picture:</label>
            <input type="file" id="photo" name="photo" class="form-input">
            <img src="{{ asset('storage/' . $skill->photo) }}" alt="{{ $skill->title }}" width="100px">
            <p>Current: {{ $skill->photo }}</p>
        </div>

        <div>
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-textarea">{{ $skill->description }}</textarea>
        </div>

        <button type="submit" class="form-button">Update</button>
    </form>

    <!-- Link Edit dengan ID yang benar -->
    <a href="{{ route('skill.index') }}" class="form-button" style="text-decoration: none">Back To About</a>
</body>

</html>
