<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="{{ asset('asset-landing-page/css/create.css') }}">
</head>

<body>
    <h1 class="" style="display: flex; justify-content:center; align-items:center;">Create Portfolio</h1>

    <form class="admin-form" action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title" class="form-label">Title:</label>
        <input type="text" id="title" name="title" class="form-input" required><br><br>

        <label for="description" class="form-label">Description:</label>
        <textarea id="description" name="description" class="form-textarea" required></textarea><br><br>

        <label for="link" class="form-label">Link:</label>
        <input type="text" id="link" name="link" class="form-input" required><br><br>

        <label for="picture" class="form-label">Picture:</label>
        <input type="file" id="picture" name="picture" class="form-input" required><br><br>

        <button type="submit" class="form-button">Create</button>

        <a href="{{ route('portfolio.index') }}" class="form-button" style="text-decoration: none">Back</a>
    </form>


</body>

</html>
