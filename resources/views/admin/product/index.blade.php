@extends('admin.master')
@section('content')
<div class="container mt-4">
    <strong class="text-danger">{{ session('delete') }}</strong>
    <strong class="text-success">{{ session('message') }}</strong>
    <h3 class="mb-3">Product List</h3>
    <table id="postTable" class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Sub_Category Name</th>
                <th>Brand Name</th>
                <th>Product Name</th>
                <th>product Description</th>
                <th>Product Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->category->category_name??'null' }}</td>
                    <td>{{ $product->sub_category->sub_category_name?? 'null' }}</td>
                    <td>{{ $product->brand->brand_name?? 'null' }}</td>
                    <td>{{ $product->product_name}}</td>
                    <td>{{ $product->product_description }}</td>
                    <td>{{ $product->product_price }}</td>
                    <td><img src="{{ asset($product->image) }}" alt="{{ $product->imageUrl}}" height="50" width="80"/></td>
                    <td>
                        <a href="{{ route('edit_product',['id'=>$product->id]) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('delete_product',['id'=>$product->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Delete this post?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
 {{-- data table script --}}
<script>
    $(document).ready(function () {
        $('#postTable').DataTable({
            "pageLength": 5,   // প্রতি পেজে কত data দেখাবে
            "lengthMenu": [5, 10, 25, 50, 100], // dropdown
        });
    });
</script>

@endsection