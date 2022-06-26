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
            	<form action=" {{Route('Vendorupdate',$vendor->id) }}" method="post">
                @csrf
          		<div class="row">
          			<div class="col-md-6">
          				<div class="form-group">
          					<label for="name">Vendor name</label>
          					<input type="text" class="form-control" placeholder="Enter vendor name" name="name" id="name" value="{{ $vendor->name}}">
                                <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                                </span>
          			    </div>
                        <div class="form-group">
                                <label for="des">description</label>
                                <textarea class="form-control" name="des" id="des" cols="30" rows="4">{{ $vendor->des}}</textarea>
                                <span class="text-danger">
                                @error('des')
                                {{$message}}
                                @enderror
                                </span>
                        </div>
                        <div class="form-group">
                                <label for="office_address">office_address </label>
                                <textarea class="form-control" name="office_address" id="office_address" cols="30" rows="4">{{ $vendor->office_address}}</textarea>
                                <span class="text-danger">
                                @error('office_address')
                                {{$message}}
                                @enderror
                                </span>
                        </div>
                        <div class="form-group">
          					<label for="email">Email</label>
          					<input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" value="{{ $vendor->email}}">
                            <span class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                            </span>
          			    </div>
                          <div class="form-group">
          					<label for="phone">Phone</label>
          					<input type="text" class="form-control" placeholder="Enter Phone" name="phone" id="phone" value="{{ $vendor->phone}}">
                            <span class="text-danger">
                            @error('phone')
                            {{$message}}
                            @enderror
                            </span>
          			    </div>          			        				
          			</div>
          			<div class="col-md-6">
          				<div class="form-group">
          					<label for="operator_name">operatorName</label>
          					<input type="text" class="form-control" placeholder="Enter OperatorName" name="operator_name" id="operator_name" value="{{ $vendor->operator_name}}">
                            <span class="text-danger">
                            @error('operator_name')
                            {{$message}}
                            @enderror
                            </span>
          				</div>
          				<div class="form-group">
          					<label for="operator_phone">OperatorPhone</label>
          					<input type="text" class="form-control" placeholder="Enter operatorPhone" name="operator_phone" id="operator_phone" value="{{ $vendor->operator_phone}}">
                            <span class="text-danger">
                            @error('operator_phone')
                            {{$message}}
                            @enderror
                            </span>
          				</div>
          				<div class="form-group">
          					<label for="tin">tin</label>
          					<input type="text" class="form-control" placeholder="Enter tin" name="tin" id="tin" value="{{ $vendor->tin}}">
                            <span class="text-danger">
                            @error('tin')
                            {{$message}}
                            @enderror
                            </span>
          				</div>
                          <div class="form-group">
          					<label for="trade_num">tradeNum</label>
          					<input type="text" class="form-control" placeholder="Enter tradeNum" name="trade_num" id="trade_num" value="{{ $vendor->trade_num}}">
                            <span class="text-danger">
                            @error('trade_num')
                            {{$message}}
                            @enderror
                            </span>
          				</div>
          				<div class="form-group">
          					<label for="status">Status</label>
          					<select class="form-control" name="status" id="status">
          						<option value="">select status</option>
          						<option value="1" @if ($vendor->status==1) selected  @endif>Active</option>
          						<option value="2" @if ($vendor->status==2) selected  @endif>Inactive</option>
          					</select>
                    <span class="text-danger">
                      @error('status')
                      {{$message}}
                      @enderror
                    </span>
          				</div>
          				<div class="form-group">
          					<button class="form-control btn btn-info">Update Vendor</button>
          				</div>

          			</div>
          		</div>
          		</form>
            </div>
        </div>
    </div>
</div><!-- br-pagebody -->

@endsection