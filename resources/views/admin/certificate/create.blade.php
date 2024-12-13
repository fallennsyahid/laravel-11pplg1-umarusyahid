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
    <h1 class="" style="display: flex; justify-content:center; align-items:center;">Create Certificate</h1>

    <form class="admin-form" action="{{ route('certificate.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title" class="form-label">Title:</label>
        <input type="text" id="title" name="title" class="form-input" required><br><br>

        <label for="issued_by" class="form-label">Issued By:</label>
        <input type="text" id="issued_by" name="issued_by" class="form-input" required><br><br>

        <label for="description" class="form-label">Description:</label>
        <textarea id="description" name="description" class="form-textarea" required></textarea><br><br>

        <label for="date" class="form-label">Date:</label>
        <input type="date" id="date" name="date" class="form-input" required><br><br>

        <label for="picture" class="form-label">Picture:</label>
        <input type="file" id="picture" name="picture" class="form-input"><br><br>

        <button type="submit" class="form-button">Create</button>

        <button type="reset" class="form-button">Reset</button>

        <a href="{{ route('certificate.index') }}"><button type="button" class="form-button">Back</button></a>
    </form>


</body>

</html>
