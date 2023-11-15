@extends('layouts/layoutMaster')

@section('title', 'eCommerce Product Add - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/dropzone/dropzone.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-product-add.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-0">
  <span class="text-muted fw-light">eCommerce /</span><span class="fw-medium"> Add Product</span>
</h4>

<div class="app-ecommerce">
<form action="{{url('/products')}}" method="POST">
  @csrf
  <!-- Add Product -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Add a new Product</h4>
      <p class="text-muted">Orders placed across your store</p>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">

      <button type="submit" class="btn btn-primary">Publish product</button>
    </div>

  </div>

  <div class="row">

    <!-- First column-->
    <div class="col-12 col-lg-8">
      <!-- Product Information -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-tile mb-0">Product information</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="ecommerce-product-name">Name</label>
            <input type="text" class="form-control" id="ecommerce-product-name" value="{{ old('name') }}" placeholder="Product title" name="name" aria-label="Product title">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <div class="col"><label class="form-label" for="ecommerce-product-sku" >SKU</label>
              <input type="number" class="form-control" id="ecommerce-product-sku" value="{{ old('sku') }}" placeholder="SKU" name="sku" aria-label="Product SKU"></div>
              @error('sku')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <div class="col"><label class="form-label" for="ecommerce-product-barcode">Barcode</label>
              <input type="text" class="form-control" id="ecommerce-product-barcode"  value="{{ old('barcode') }}" placeholder="0123-4567" name="barcode" aria-label="Product barcode"></div>
              @error('barcode')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          <!-- Description -->
          <div>
            <label class="form-label">Description (Optional)</label>
            <div class="form-control p-0 pt-1">
              <div class="comment-toolbar border-0 border-bottom">
                <div class="d-flex justify-content-start">
                  <span class="ql-formats me-0">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                    <button class="ql-link"></button>
                    <button class="ql-image"></button>
                  </span>
                </div>
              </div>
              <div class="comment-editor border-0 pb-4" id="ecommerce-category-description">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Product Information -->

      <!-- /Media -->
    </div>
    <div class="col-12 col-lg-4">
      <!-- Pricing Card -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title mb-0">Pricing</h5>
        </div>
        <div class="card-body">
          <!-- Base Price -->
          <div class="mb-3">
            <label class="form-label" for="ecommerce-product-price">Base Price</label>
            <input type="number" step="any" class="form-control" id="ecommerce-product-price" value="{{ old('base_price') }}" placeholder="Price" name="base_price" aria-label="Product price">
            @error('base_price')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <!-- Discounted Price -->
          <div class="mb-3">
            <label class="form-label" for="ecommerce-product-discount-price">Discounted Price</label>
            <input type="number" step="any" class="form-control" id="ecommerce-product-discount-price" value="{{ old('discounted_price') }}" placeholder="Discounted Price" name="discounted_price" aria-label="Product discounted price">
            @error('discounted_price')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <!-- /Pricing Card -->
    </div>
    <!-- /Second column -->
  </div>
</form>
</div>

@endsection
