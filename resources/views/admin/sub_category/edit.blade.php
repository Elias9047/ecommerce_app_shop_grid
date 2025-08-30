@extends('admin.master')

@section('content')

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Edit Sub_Category</h4>
                    <hr/>
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <form class="form-horizontal p-t-20" action="{{ route('update_sub_category',['id'=>$sub_categories->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                              {{-- Category field --}}
                           
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="category_id" id="" class="form-control form-select" >
                                    <option value="">select category:</option> 
                                    @foreach($categories as $category)
                                        <option selected value="{{ $category->id }}" >{{ $category->category_name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- subcategory field --}}
                        <div class="form-group row mb-3">
                            <label for="exampleInputuname3" class="col-sm-3 col-form-label">Sub_Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $sub_categories->sub_category_name }}" name="sub_category_name" id="exampleInputuname3" placeholder="Sub_Category Name"/>
                            </div>
                             @error('sub_category_name')
                                <strong class="text-danger">{{$message}}</strong>
                             @enderror
                        </div>
                        {{-- description field --}}
                        <div class="form-group row mb-3">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Sub_Category Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="sub_category_description" id="exampleInputEmail3" placeholder="Sub_Category Description">{{ $sub_categories->sub_category_description }}</textarea>                              
                            </div>
                            @error('sub_category_description')
                                <strong class="text-danger">{{$message}}</strong>
                             @enderror
                        </div>

                    {{-- Category Image --}}
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" onchange="previewImage(event)"/>
                            
                            {{-- Old Image Preview --}}
                            <img id="preview" src="{{ asset($sub_categories->image) }}" 
                                 alt="Image Preview" 
                                 height="100" width="130" 
                                 class="mt-2" 
                                 style="{{ $sub_categories->image ? '' : 'display:none;' }}"/>
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

{{-- 
                        <div class="form-group row mb-3">
                            <label for="inputPassword4" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status"  value="1" checked> Published </label>
                                <label><input type="radio" name="status"  value="2"> Unpublished </label>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success text-white">Create</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
