@extends('admin.master')
@section('content')
<div class="container mt-4">
    <strong class="text-danger">{{ session('delete') }}</strong>
    <strong class="text-success">{{ session('message') }}</strong>
    <h3 class="mb-3">Sub_Category List</h3>
    <table id="postTable" class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Sub_Category Name</th>
                <th>Sub_Category Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sub_categories as $sub_category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sub_category->category->category_name??'null' }}</td>
                    <td>{{ $sub_category->sub_category_name }}</td>
                    <td>{{ $sub_category->sub_category_description }}</td>
                    <td><img src="{{ asset($sub_category->image) }}" alt="{{ $sub_category->imageUrl}}" height="50" width="80"/></td>
                    <td>
                        <a href="{{ route('edit_sub_category',['id'=>$sub_category->id]) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('delete_sub_category',['id'=>$sub_category->id]) }}" method="POST" style="display:inline;">
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