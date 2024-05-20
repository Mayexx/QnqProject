<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        body {
            background-color: #fff;
            font-family: Arial, sans-serif;
            padding: 0;
            margin-top: 50px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            color: #371B58;
        }

        th {
            background-color: #f2f2f2;
            color: #371B58;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .btn-primary,
        .btn-danger {
            background-color: #371B58;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover,
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
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td><img src="/productimage/{{ $product->image }}" alt="{{ $product->title }}"></td>
                    <td><a class="btn btn-primary" href="{{ url('updateview', $product->id) }}">Update</a></td>
                    <td><a class="btn btn-danger" href="{{ url('deleteproduct', $product->id) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.script')
</body>
</html>
