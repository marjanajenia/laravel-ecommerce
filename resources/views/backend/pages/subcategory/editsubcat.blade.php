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
            	<form action="{{ Route('subcategoryupdate',$subcat->id)}}" method="post" enctype="multipart/form-data">
                @csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="cat_id">Select Category</label>
								<select name="cat_id" id="cat_id" class="form-control">
								    @foreach($cat as $cats)  
								    <option value="{{ $cats->id }}" @if($cats->id == $subcat->cat_id) selected @endif>{{ $cats->name }}</option>								  
								    @endforeach
							  </select>
								<span class="text-danger">
										@error('cat_id')
										{{$message}}
										@enderror
								</span>
							</div>
							<div class="form-group">
								<label for="name">subcategory name</label>
								<input type="text" class="form-control" placeholder="Enter sub-category name" name="name" id="name" value="{{ $subcat->name }}">
								<span class="text-danger">
									@error('name')
									{{$message}}
									@enderror
								</span>
							</div>
							<div class="form-group">
								<label for="slug">subcategory slug</label>
								<input type="text" class="form-control" placeholder="Enter sub-category slug" name="slug" id="slug" value="{{ $subcat->slug }}">
								<span class="text-danger">
									@error('slug')
									{{$message}}
									@enderror
								</span>
							</div>
						</div>	  
							
						<div class="col-md-6">
							<img height="110" src="{{ asset('backend/subcategoryimages/'.$subcat->pic) }}" alt="">
							<div class="form-group">
								<label for="pic">Image</label>
								<input type="file" class="form-control" placeholder="Enter Product cost price" name="pic" id="pic" value="{{old('pic')}}">
								<span class="text-danger">
									@error('pic')
									{{$message}}
									@enderror
								</span>
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control" name="status" id="status">
									<option value="">select status</option>
									<option value="1" @if($subcat->status==1)selected @endif>Active</option>
									<option value="2" @if($subcat->status==2)selected @endif>Inactive</option>
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
