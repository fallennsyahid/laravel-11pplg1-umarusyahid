<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin - Portfolio</title>
    <link href="{{ asset('asset-landing-page/css/styles-admin.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('asset-landing-page/css/table.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('asset-landing-page/css/detail.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <x-navbar-admin></x-navbar-admin>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <x-sidebar></x-sidebar>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="table-position">
                    <div class="table-container">
                        <h1>Detail Data</h1>
                        <p><span>Title:</span> {{ $skill->title }}</p>
                        <p><span>Description:</span> {{ $skill->description }}</p>

                        <h3>Picture Detail</h3>
                        <img src="{{ asset('storage/' . $skill->photo) }}" alt="{{ $skill->title }}" width="350px" />
                    </div>
                </div>
                <a href="{{ route('skill.index') }}" class="back-btn">
                    <button type="button" class="btn btn-danger">
                        <span>Back</span>
                    </button>
                </a>
            </main>
            <x-footer-admin></x-footer-admin>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('asset-landing-page/js/scripts-admin.js') }}"></script>
</body>

</html>
