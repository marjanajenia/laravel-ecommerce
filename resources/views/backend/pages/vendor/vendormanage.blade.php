@extends('backend.mastertemplate.template')

@section('content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Products</h4>
        <p class="mg-b-0">Manage all Product</p>
    </div>
</div>

<!-- Add category Modal -->
<div class="modal fade" id="addvendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="">Vendor Name</label>
          <input type="text" class="name form-control" placeholder="Enter vendor name">
          <span class="text-danger nameError"></span>
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <textarea  class="des form-control" clos="50" rows="4" placeholder="Enter vendor description"></textarea>
          <span class="text-danger desError"></span>
        </div>
        <div class="form-group">
          <label for="">Office Address</label>
          <textarea  class="off_addres form-control" clos="30" rows="4" placeholder="Enter office address"></textarea>
          <span class="text-danger offAddressError"></span>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="email form-control" placeholder="Enter email address">
          <span class="text-danger emailError"></span>
        </div>
        <div class="form-group">
          <label for="">Phone</label>
          <input type="phone" class="phone form-control" placeholder="Enter email address">
          <span class="text-danger emailError"></span>
        </div>
        <div class="form-group">
          <label for="">Operator Name</label>
          <input type="text" class="operatorName form-control" placeholder="Enter operator name">
          <span class="text-danger operatorNameError"></span>
        </div>
        <div class="form-group">
          <label for="">Operator Phone</label>
          <input type="text" class="operatorPhone form-control" placeholder="Enter operator phone">
          <span class="text-danger operatorPhoneError"></span>
        </div>
        <div class="form-group">
          <label for="">Tin</label>
          <input type="text" class="tin form-control" placeholder="Enter tin">
          <span class="text-danger tinError"></span>
        </div>
        <div class="form-group">
          <label for="">Trade number</label>
          <input type="text" class="tradeNum form-control" placeholder="Enter trade number">
          <span class="text-danger tradeNumError"></span>
        </div>
        <div class="form-group">
          <label for="">Status</label>
          <select class="form-control status">
            <option value="1">--select status--</option>
            <option value="1">Active</option>
            <option value="2">Inactive</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary addVendor ">Add Category</button>
      </div>
    </div>
  </div>
</div>

<div class="br-pagebody">
    <div class="row row-sm">
       <div class="col-md-12">
            <div class="card p-3 shadow-base">
              <div class="row d-flex justify-content-between px-3">
                <h4>All Category</h4>
                <button data-toggle="modal" data-target="#addvendor" class="btn btn-sm btn-info "><i class="fa fa-plus"></i>Add Vendor</button>
              </div>
              <div class="msg"></div>
          	  <table class="table">
                   <thead>
                       <tr>
                           <th>Serial</th>
                           <th>Vendor Name</th>
                           <th>Description</th>
                           <th>Office Address</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>Operator Name</th>
                           <th>Operator phone</th>
                           <th>tin</th>
                           <th>Trade Number</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                     </thead>

                       <tbody class="tbody">
                        @php $sl=1; @endphp
                           @foreach ($products as $data)
                           <tr>
                               <td>{{ $sl }}</td>
                               <td>{{ $data->name}}</td>
                               <td>{{ $data->des}}</td>
                               <td>{{ $data->office_address}}</td>
                               <td>{{ $data->email}}</td>
                               <td>{{ $data->phone }}</td>
                               <td>{{ $data->operator_name}}</td>
                               <td>{{ $data->operator_phone}}</td>
                               <td>{{ $data->tin}}</td>
                               <td>{{ $data->trade_num}}</td>
                               <td>
                                   @if($data->status==1)
                                   <span class="badge badge-info">Active</span>
                                   @else
                                   <span class="badge badge-danger">Inactive</span>
                                   @endif
                               </td>
                               <td>
                                   <a href="{{ Route('edit', $data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                   <button class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="modal" data-target="#delete{{ $data->id }}"></i></button>
                               </td>
                           </tr>
                           <!-- Modal -->
                    <div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation message for delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                           Are you sure you want to delete this product?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                            <a href="{{ Route('delete',$data->id)}}"  class="btn btn-danger">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                           
                            @php $sl++; @endphp
                           @endforeach  
                       </tbody> 
                </table>
            </div>
        </div>
    </div>
</div><!-- br-pagebody -->

@endsection