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

                        @if ($errors->any())
                            <div class="alert alert-secondary">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                       @endif
                        @csrf
                        {{-- Category --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Category <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select id="category" name="category_id" class="form-select">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Subcategory --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Subcategory <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select id="sub_category_id" name="sub_category_id" class="form-select">
                                    <option value="">-- Select Subcategory --</option>
                                      @foreach ($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category_name }}</option>
                                    @endforeach
                                </select>
                                @error('sub_category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Brand --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Brand <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select id="brand" name="brand_id" class="form-select">
                                    <option value="">-- Select Brand --</option>
                                      @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
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
                               {{-- Product Code --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Product Code <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="product_code" placeholder="Product code"/>
                                @error('product_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                               {{-- Product Model --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Product Model <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="product_model" placeholder="Product Model"/>
                                @error('product_model')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                            {{-- Stock amount --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Stock Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="stock_amount" placeholder="Stock_amount"/>
                                @error('Stock_amount')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        {{-- Product Price --}}
                         <div class="mb-3 row">
                            <label for="" class="col-sm-3 control-label">Product Price <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="regular_price" id="" placeholder="Regular Price"/>
                                    <input type="number" class="form-control" name="discount_price" id="" placeholder="Discount Price"/>
                                </div>
                                 @error('product_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Short Description --}}
                          <div class="mb-3 row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Short Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description" id="exampleInputEmail3" placeholder="Short Description"></textarea>
                            </div>
                        </div>
                        {{-- Long Description --}}
                        <div class="mb-3 row">
                            <label for="exampleInputEmail34" class="col-sm-3 control-label">Long Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="long_description" id="exampleInputEmail34" placeholder="Long Description"></textarea>
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


{{-- jQuery AJAX for dependent dropdown --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        // Category -> Subcategory
        $('#category').on('change', function () {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: '{{ url("/get-subcategories") }}/' + category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option value="">-- Select sub_category_id --</option>');
                        $('#brand').empty();
                        $('#brand').append('<option value="">-- Select Brand --</option>');
                        $.each(data, function (key, subcat) {
                            $('#sub_category_id').append('<option value="' + subcat.id + '">' + subcat.sub_category_name + '</option>');
                        });
                    }
                });
            } else {
                $('#sub_category_id').empty().append('<option value="">-- Select sub_category_id --</option>');
                $('#brand').empty().append('<option value="">-- Select Brand --</option>');
            }
        });

        // Subcategory -> Brand
        $('#sub_category_id').on('change', function () {
            var sub_category_id = $(this).val();
            if (sub_category_id) {
                $.ajax({
                    url: '{{ url("/get-brands") }}/' + sub_category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#brand').empty();
                        $('#brand').append('<option value="">-- Select Brand --</option>');
                        $.each(data, function (key, brand) {
                            $('#brand').append('<option value="' + brand.id + '">' + brand.brand_name + '</option>');
                        });
                    }
                });
            } else {
                $('#brand').empty().append('<option value="">-- Select Brand --</option>');
            }
        });

    });
</script>
