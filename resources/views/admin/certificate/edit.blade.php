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
    <form action="{{ route('certificate.update', $certificate->id) }}" method="POST" enctype="multipart/form-data"
        class="admin-form">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ $certificate->title }}">
        </div>

        <div>
            <label for="issued_by" class="form-label">Issued By:</label>
            <input type="text" id="issued_by" name="issued_by" class="form-input"
                value="{{ $certificate->issued_by }}">
        </div>

        <div>
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-textarea">{{ $certificate->description }}</textarea>
        </div>

        <div>
            <label for="date" class="form-label">Date:</label>
            <input type="date" name="date" id="date" class="form-input" value="{{ $certificate->date }}">
        </div>

        <div>
            <label for="picture" class="form-label">Picture:</label>
            <input type="file" id="picture" name="picture" class="form-input">
            <img src="{{ asset('storage/' . $certificate->picture) }}" alt="{{ $certificate->title }}" width="200px">
            <p>Current: {{ $certificate->picture }}</p>
        </div>

        <button type="submit" class="form-button">Update</button>
        <a href="{{ route('certificate.index') }}" class="form-button" style="text-decoration: none">Back To
            Home</a>
    </form>
</body>

</html>
