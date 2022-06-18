@extends('backend.mastertemplate.template')

@section('content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Dashboard</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>

<div class="br-pagebody">
    <div class="row row-sm">
       <div class="col-md-12">
            <div class="card p-3 shadow-base">
            	<form action="{{ Route('update',$product->id)}}" method="post">
                @csrf
          		<div class="row">
          			<div class="col-md-6">
          				<div class="form-group">
          					<label for="pname">Product name</label>
          					<input type="text" class="form-control" placeholder="Enter Product name" name="pname" id="pname" value="{{ $product->name}}">
          				</div>
          				<div class="form-group">
          					<label for="description">description</label>
          					<textarea class="form-control" name="description" id="description" cols="30" rows="4" >{{ $product->description}}</textarea>
          				</div>
          				<div class="form-group">
          					<label for="category">Category</label>
          					<select class="form-control" name="category" id="category">
          						<option value="Man" @if ($product->category=='Man') selected  @endif>Man</option>
          						<option value="Woman" @if ($product->category=='Woman') selected  @endif>woman</option>
          						<option value="Children" @if ($product->category=='Children') selected  @endif>Children</option>
          					</select>
          				</div>
          				<div class="form-group">
          					<label for="size">Size</label>
          					<select class="form-control" name="size" id="size">
          						<option value="XL" @if ($product->size=='XL') selected  @endif>XL</option>
          						<option value="M" @if ($product->size=='M') selected  @endif>M</option>
          						<option value="SM" @if ($product->size=='SM') selected  @endif>SM</option>
          					</select>
          				</div>
          				
          			</div>
          			<div class="col-md-6">
          				<div class="form-group">
          					<label for="costPrice">Cost Price</label>
          					<input type="text" class="form-control" placeholder="Enter Product cost price" name="costPrice" id="costPrice"value="{{ $product->costPrice}}" >
          				</div>
          				<div class="form-group">
          					<label for="salePrice">Sale Price</label>
          					<input type="text" class="form-control" placeholder="Enter Product sale price" name="salePrice" id="salePrice" value="{{ $product->salePrice}}">
          				</div>
          				<div class="form-group">
          					<label for="quantity">Quentity</label>
          					<input type="text" class="form-control" placeholder="Enter Product quantity" name="quantity" id="quantity" value="{{ $product->quantity}}">
          				</div>
          				<div class="form-group">
          					<label for="status">Status</label>
          					<select class="form-control" name="status" id="status">
          						<option value="">select status</option>
          						<option value="1" @if ($product->status==1) selected  @endif>Active</option>
          						<option value="2" @if ($product->status==2) selected  @endif>Inactive</option>
          					</select>
          				</div>
          				<div class="form-group">
          					<button class="form-control btn btn-info">Update Product</button>
          				</div>

          			</div>
          		</div>
          		</form>
            </div>
        </div>
    </div>
</div><!-- br-pagebody -->

@endsection
