@extends('admin.master')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-4">
                    <h4 class="card-title mb-3">
                        <i class="fas fa-box me-2"></i> Create Product
                    </h4>
                    <hr/>
                    
                    @if(session('message'))
                        <h5 class="text-center text-success mb-4">{{ session('message') }}</h5>
                    @endif

                    <form class="form-horizontal" action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Category --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-select">
                                    <option value="">Select category:</option> 
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        {{-- Sub Category --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Sub Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="sub_category_id" class="form-select">
                                    <option value="">Select Sub Category:</option> 
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category_name }}</option>
                                    @endforeach
                                </select>
                                @error('sub_category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Brand --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Brand Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="brand_id" class="form-select">
                                    <option value="">Select Brand:</option> 
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Product Name --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Product Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="product_name" placeholder="Product Name"/>
                                @error('product_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Product Price --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Product Price <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="product_price" placeholder="Price"/>
                                @error('product_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Product Description --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Product Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="product_description" placeholder="Product Description"></textarea>
                                @error('Product_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Product Image --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Product Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" onchange="previewImage(event)"/>
                                <img id="preview" src="" alt="Image Preview" height="100" width="130" class="mt-2 d-none"/>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <script>
                            function previewImage(event) {
                                let output = document.getElementById('preview');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.classList.remove('d-none');
                            }
                        </script>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success px-4">
                                    Create
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
