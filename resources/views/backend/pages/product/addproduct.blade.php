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
            	<form action="{{ Route('add')}}" method="post">
                @csrf
          		<div class="row">
          			<div class="col-md-6">
          				<div class="form-group">
          					<label for="pname">Product name</label>
          					<input type="text" class="form-control" placeholder="Enter Product name" name="pname" id="pname">
                    <span class="text-danger">
                      @error('pname')
                      {{$message}}
                      @enderror
                    </span>
          				</div>
          				<div class="form-group">
          					<label for="description">description</label>
          					<textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                    <span class="text-danger">
                      @error('description')
                      {{$message}}
                      @enderror
                    </span>
          				</div>
          				<div class="form-group">
          					<label for="category">Category</label>
          					<select class="form-control" name="category" id="category">
                      <option value="">select Category</option>
          						<option value="Man">Man</option>
          						<option value="Woman">woman</option>
          						<option value="Children">Children</option>
          					</select>
                    <span class="text-danger">
                      @error('category')
                      {{$message}}
                      @enderror
                    </span>
          				</div>
          				<div class="form-group">
          					<label for="size">Size</label>
          					<select class="form-control" name="size" id="size">
                      <option value="">select size</option>
          						<option value="XL">XL</option>
          						<option value="M">M</option>
          						<option value="SM">SM</option>
          					</select>
                    <span class="text-danger">
                      @error('size')
                      {{$message}}
                      @enderror
                    </span>
          				</div>          				
          			</div>
          			<div class="col-md-6">
          				<div class="form-group">
          					<label for="costPrice">Cost Price</label>
          					<input type="text" class="form-control" placeholder="Enter Product cost price" name="costPrice" id="costPrice">
                    <span class="text-danger">
                      @error('costPrice')
                      {{$message}}
                      @enderror
                    </span>
          				</div>
          				<div class="form-group">
          					<label for="salePrice">Sale Price</label>
          					<input type="text" class="form-control" placeholder="Enter Product sale price" name="salePrice" id="salePrice">
                    <span class="text-danger">
                      @error('salePrice')
                      {{$message}}
                      @enderror
                    </span>
          				</div>
          				<div class="form-group">
          					<label for="quantity">Quentity</label>
          					<input type="text" class="form-control" placeholder="Enter Product quantity" name="quantity" id="quantity">
                    <span class="text-danger">
                      @error('quantity')
                      {{$message}}
                      @enderror
                    </span>
          				</div>
          				<div class="form-group">
          					<label for="status">Status</label>
          					<select class="form-control" name="status" id="status">
          						<option value="">select status</option>
          						<option value="1">Active</option>
          						<option value="2">Inactive</option>
          					</select>
                    <span class="text-danger">
                      @error('status')
                      {{$message}}
                      @enderror
                    </span>
          				</div>
          				<div class="form-group">
          					<button class="form-control btn btn-info">Add Product</button>
          				</div>

          			</div>
          		</div>
          		</form>
            </div>
        </div>
    </div>
</div><!-- br-pagebody -->

@endsection