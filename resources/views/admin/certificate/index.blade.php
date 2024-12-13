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
    <link href="{{ asset('asset-landing-page/css/table.css') }}" rel="stylesheet" />
    <link href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

{{-- <style>
    tr th {
        text-align: center;
    }
</style> --}}

<body class="sb-nav-fixed">
    <x-navbar-admin></x-navbar-admin>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <x-sidebar></x-sidebar>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <a href="{{ route('certificate.create') }}" style="margin: 1.25rem 0 0 1.25rem;">
                    <button class="delete-button">
                        <span>Add Certificate</span>
                    </button>
                </a>
                <div class="body">
                    <div id="table-container" class="table-container">
                        <table class="modern-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Issued By</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Photo</th>
                                    <th>Detail</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificates as $index => $row)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->issued_by }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>
                                            @if ($row->picture)
                                                <a href="{{ asset('storage/' . $row->picture) }}"
                                                    target="_blank"><button
                                                        class="delete-button"><span>View</span></button></a>
                                            @else
                                                <p>Picture not available</p>
                                            @endif
                                        </td>
                                        <td align="center">
                                            <a href="{{ route('certificate.show', $row->id) }}">
                                                <button class="delete-button"><span>Detail</span></button>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <a href="{{ route('certificate.edit', $row->id) }}">
                                                <button class="delete-button"><span>Update</span></button>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <form action="{{ route('certificate.destroy', $row->id) }}"
                                                id="delete-form-{{ $row->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-id="{{ $row->id }}"
                                                    class="delete-btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </main>
            <x-footer-admin></x-footer-admin>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{ asset('asset-landing-page/js/scripts-admin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <x-sweet-alert></x-sweet-alert>

    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>
