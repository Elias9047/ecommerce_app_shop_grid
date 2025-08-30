@extends('admin.master')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-lg-10">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title">Edit Category</h4>
                <hr/>
                <h4 class="text-center text-success">{{ session('message') }}</h4>

                <form class="form-horizontal p-t-20" action="{{ route('update_category',['id'=>$category->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- Category Name --}}
                    <div class="form-group row mb-3">
                        <label for="categoryName" class="col-sm-3 col-form-label">Category Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $category->category_name }}" name="category_name" id="categoryName" placeholder="Category Name"/>
                        </div>
                        @error('category_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    {{-- Category Description --}}
                    <div class="form-group row mb-3">
                        <label for="categoryDescription" class="col-sm-3 col-form-label">Category Description <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description" id="categoryDescription" placeholder="Category Description">{{ $category->category_description }}</textarea>
                        </div>
                        @error('category_description')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    {{-- Category Image --}}
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" onchange="previewImage(event)"/>
                            
                            {{-- Old Image Preview --}}
                            <img id="preview" src="{{ asset($category->image) }}" 
                                 alt="Image Preview" 
                                 height="100" width="130" 
                                 class="mt-2" 
                                 style="{{ $category->image ? '' : 'display:none;' }}"/>
                        </div>
                        @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    {{-- Image Preview Script --}}
                    <script>
                        function previewImage(event) {
                            let output = document.getElementById('preview');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.style.display = 'block';
                        }
                    </script>

                    {{-- Submit --}}
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success text-white">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
