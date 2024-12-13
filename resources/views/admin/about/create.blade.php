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
    <h1 class="" style="display: flex; justify-content:center; align-items:center;">Create About</h1>

    <form class="admin-form" action="{{ route('about.store') }}" method="POST">
        @csrf
        <label for="title" class="form-label">Title:</label>
        <input type="text" id="title" name="title" class="form-input" required><br><br>

        <label for="description" class="form-label">Description:</label>
        <textarea id="description" name="description" class="form-textarea" required></textarea><br><br>

        <button type="submit" class="form-button">Create</button>

        <a href="{{ route('about.index') }}" class="form-button" style="text-decoration: none">Back to list</a>
    </form>


</body>

</html>
