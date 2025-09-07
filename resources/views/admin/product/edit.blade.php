@extends('admin.master')

@section('content')

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Edit Product</h4>
                    <hr/>
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <form class="form-horizontal p-t-20" action="{{ route('update_product',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                              {{-- Category field --}}
                           
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="category_id" id="" class="form-control form-select" >
                                    <option value="">select Category:</option> 
                                    @foreach($categories as $category)
                                       <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- subcategory field --}}
                       <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Sub_Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="sub_category_id" id="" class="form-control form-select" >
                                    <option value="">select Category:</option> 
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}" {{ $product->sub_category_id == $sub_category->id ? 'selected' : '' }}>
                                                {{ $sub_category->sub_category_name }}
                                        </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                                  {{-- Brand Name --}}
                           <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Brand Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="brand_id" id="" class="form-control form-select" >
                                    <option value="">Select Brand:</option> 
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                                  {{-- Product Name --}}
                        <div class="form-group row mb-3">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Product Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $product->product_name }}" name="product_name" id="exampleInputuname3" placeholder="Product Name"/>    
                            </div>
                            @error('product_name')
                                <strong class="text-danger">{{$message}}</strong>
                             @enderror
                        </div>

                        {{-- Product Code --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Product Code <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" value="{{ $product->product_code }}" class="form-control" name="product_code" placeholder="Product code"/>
                                @error('product_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Short Description --}}
                          <div class="mb-3 row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Short Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description" id="exampleInputEmail3" placeholder="Short Description">{{ $product->short_description }}</textarea>
                            </div>
                        </div>
                        {{-- Long Description --}}
                        <div class="mb-3 row">
                            <label for="exampleInputEmail34" class="col-sm-3 control-label">Long Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="long_description" id="exampleInputEmail34" placeholder="Long Description">{{ $product->long_description }}</textarea>
                            </div>
                        </div>

                        
                            {{-- Product Price --}}
                         <div class="mb-3 row">
                            <label for="" class="col-sm-3 control-label">Product Price <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{ $product->regular_price }}" name="regular_price" id="" placeholder="Regular Price"/>
                                    <input type="number" class="form-control" value="{{ $product->discount_price }}" name="discount_price" id="" placeholder="Discount Price"/>
                                </div>
                                 @error('product_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    {{-- Category Image --}}
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Product Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" onchange="previewImage(event)"/>
                            
                            {{-- Old Image Preview --}}
                            <img id="preview" src="{{ asset($product->image) }}" 
                                 alt="Image Preview" 
                                 height="100" width="130" 
                                 class="mt-2" 
                                 style="{{ $product->image ? '' : 'display:none;' }}"/>
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
                                <button type="submit" class="btn btn-success text-white">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
