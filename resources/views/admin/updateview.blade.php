<!DOCTYPE html>
<html lang="en">
  <head>
        <base href="/public">
        @include('admin.css')
        <style type="text/css">
            body{
                background-color: #fff;
            }
            .title{
                color: #371B58;
                padding-top: 25px; 
                font-size: 25px;
                text-align: center;
                font-weight: bold;
            }
            .container{
                margin-left: 100px;
            }
            .Product{
                align-items: center;
                padding-top: 20px; 
            }
            .Product input{
                color: black;
                border-radius: 10px; 
                padding: 8px; 
                border: 1px solid #371B58; 
                width: 20%; 
                box-sizing: border-box;
                background-color:  #d8cbf1;
            }
            .Product input:hover{
                background-color: #b8accf;
            }
            .Productfile{
                border-radius: 10px; 
                padding: 8px; 
                border: 1px solid #371B58;
                box-sizing: border-box;
                width: 36%;
                margin-top: 20px; 
            }
            .Productfile:hover{
                background-color: #b8accf;
            }
            .Product label{
                display: inline-block;
                width: 200px;
                color: #371B58;
                font-weight: bold;
            }
            label{
                display: inline-block;
                width: 200px;
                color: #371B58;
                font-weight: bold;
            }
            .Product .btn{
                background-color: #371B58;
            }
            .Product .btn:hover{
                background-color: #b8accf;
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
    <!-- partial -->
        @include('admin.sidebar')
        @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center"> 
            <h1 class="title">Add Product</h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}
            </div>
            @endif
            <form action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="Product">
                    <label>Product Name</label>
                    <input type="text" name="title" value="{{$data->title}}" required>
                </div>
                <div class="Product">
                    <label>Category</label>
                    <input type="text" name="category" value="{{$product->category }}" required>
                </div>
                <div class="Product">
                    <label>Price</label>
                    <input type="text" name="price" value="{{$data->price}}" required>
                </div>
                <div class="Product">
                    <label>Description</label>
                    <input type="text" name="description" value="{{$data->description}}">
                </div>
                <div class="Product">
                    <label>Quantity</label>
                    <input type="text" name="quantity" value="{{$data->quantity}}" required>
                </div>
                <div class="Product">
                    <label>Old Image</label>
                    <img height="100" width="100"  src="/productimage/{{$data->image}}">
                </div>
                <div class="Productfile">
                    <label>Change the Image</label>
                    <label> 
                        <input type="file" name="file">
                    </label>
                </div>
                <div class="Product">
                    <input class="btn btn-success" type="submit">
                </div>
            </form>
        </div>
    </div>    
    <!-- partial -->
        @include('admin.script')
  </body>
</html>