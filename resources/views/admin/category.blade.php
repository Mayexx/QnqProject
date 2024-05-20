<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style type="text/css">
        body {
            background-color: #fff;
            font-family: Arial, sans-serif;
            margin-top: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .title {
            color: #371B58;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #371B58;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #371B58;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #54368C;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            color: #371B58;
        }

        th {
            background-color: #f2f2f2;
            color: #371B58;
        }

        .btn-danger {
            background-color: #371B58;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-danger:hover {
            background-color: #54368C;
        }
        .alert {
            margin-bottom: 20px;
        }

        .close {
            float: right;
            font-size: 20px;
            font-weight: bold;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }

        .close:hover {
            color: #000;
            opacity: 1;
        }
    </style>
</head>
<body>
@include('admin.sidebar')
@include('admin.navbar')

<div class="container">
    <h1 class="title">Add Category</h1>
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="{{ url('/add_category') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category">Category Name</label>
            <input type="text" id="category" name="category" placeholder="Enter category name" required>
        </div>
        <button class="btn btn-success" type="submit">Add Category</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
                <tr>
                    <td>{{$data->category_name}}</td>
                    <td><a onclick="return confirm('Are you sure to delete this category?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.script')
</body>
</html>
