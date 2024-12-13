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
    <form action="{{ route('about.update', $about) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ $about->title }}">
        </div>

        <div>
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-textarea">{{ $about->description }}</textarea>
        </div>

        <button type="submit" class="form-button">Update</button>
        <a href="{{ route('about.index') }}"><button type="button" class="form-button">Back</button></a>
    </form>

</body>

</html>
