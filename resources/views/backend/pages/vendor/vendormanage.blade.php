@extends('backend.mastertemplate.template')

@section('content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Products</h4>
        <p class="mg-b-0">Manage all Product</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="row row-sm">
       <div class="col-md-12">
            <div class="card p-3 shadow-base">
              <div class="row d-flex justify-content-between px-3">
                <h4>All Category</h4>
                <a href="{{ Route('Vendorcreate') }}"class="btn btn-sm btn-info "><i class="fa fa-plus"></i>Add Vendor</a>
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
                           @foreach ($vendor as $data)
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
                                   <a href="{{ Route('Vendoredit',$data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
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
                           Are you sure you want to delete this vendor?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                            <a href="{{ Route('Vendordelete',$data->id)}}"  class="btn btn-danger">Delete</a>
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