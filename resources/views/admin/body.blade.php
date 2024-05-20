<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Content</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @include('admin.css')

    <style>
        body {
            background-color: #fff;
            color: #371B58;
        }

        .card {
            background-color: #fff;
            color: #371B58;
            border: 1px solid #371B58;
        }

        .card .card-header {
            background-color: #371B58;
            color: #fff;
        }

        .card .card-body {
            color: #371B58;
        }

        .btn-primary {
            background-color: #371B58;
            border-color: #371B58;
        }

        .btn-primary:hover {
            background-color: #fff;
            color: #371B58;
            border-color: #371B58;
        }

        table {
            color: #371B58;
        }

        table th, table td {
            border-color: #371B58;
        }

        table thead th {
            background-color: #371B58;
            color: #fff;
        }
    </style>
</head>
<body>
    @include('admin.navbar')
    <div class="container">
        <header class="mt-4 mb-3">
            <h1>Dashboard Content</h1>
        </header>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Add Product</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Add Category</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Products
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row mt-4">
                <div class="col-md-12">
                    <h2>Users</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>01</td>
                            <td>Sawako Korunoma</td>
                            <td>Japan</td>
                            <td>sawako.korunoma@gmail.com</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @include('admin.script')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
