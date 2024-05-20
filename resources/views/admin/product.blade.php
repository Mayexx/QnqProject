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
            padding: 15px;
        }

        .title {
            color: #371B58;
            padding-top: 25px;
            font-size: 25px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
            color: #371B58;
            font-weight: bold;
            margin-top: 15px;
            font-size: 15px;
        }

        input[type="text"], input[type="file"] {
            width: calc(100% - 220px);
            padding: 10px;
            border: 1px solid #ccc;
            color: #371B58;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #371B58;
            color: #fff;
            border: none;
            margin-left: 50%;
            padding: 10px 50px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #54368C;
        }
    </style>
</head>
<body>
@include('admin.sidebar')
@include('admin.navbar')

<div class="container">
    <h1 class="title">Add Product</h1>
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{ url('uploadproduct') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Product Name</label>
            <input type="text" id="title" name="title" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="title">Product Category</label>
            <select name="category" required > <option value="">Category</option>
            @foreach ($category as $category)   
            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
            @endforeach 
            </select>
            {{-- <input type="text" id="title" name="category" placeholder="Category" required> --}}
        </div>
        <div class="form-group">
            <label for="price">Product Price</label>
            <input type="text" id="price" name="price" placeholder="Price" required>
        </div>
        <div class="form-group">
            <label for="description">Product Description</label>
            <input type="text" id="description" name="description" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="quantity">Product Quantity</label>
            <input type="text" id="quantity" name="quantity" placeholder="Quantity" required>
        </div>
        <div class="form-group">
            <label for="file">Product Image</label>
            <input type="file" id="file" name="file" required>
        </div>
        <div class="form-group">
            <input class="btn btn-success" type="submit" value="Add Product">
        </div>
    </form>
</div>

@include('admin.script')
</body>
</html>
