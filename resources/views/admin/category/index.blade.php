@extends('admin.master')
@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Category List</h3>
    <h4 class='text-success text-center' >{{ session('message') }}</h4>
    <table id="postTable" class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->category_description }}</td>
                    <td><img src="{{ asset($category->image) }}" alt="{{ $category->imageUrl}}" height="50" width="80"/></td>
                    <td>
                        <a href="{{ route('edit_category',['id'=>$category->id]) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('delete_category',['id'=>$category->id])}}" method="POST" style="display:inline;">
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