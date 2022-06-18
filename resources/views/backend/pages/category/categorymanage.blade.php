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
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <label for="">category Name</label>
          <input type="text" class="name form-control" placeholder="Enter category name">
          <span class="text-danger nameError"></span>
        </div>
        <div class="form-group">
          <label for="">category Slug</label>
          <input type="text" class="slug form-control" placeholder="Enter category slug">
          <span class="text-danger slugError"></span>
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <textarea  class="des form-control" clos="30" rows="4" placeholder="Enter category description"></textarea>
          <span class="text-danger desError"></span>
        </div>
        <div class="form-group">
          <label for="">category Pic</label>
          <input type="text" class="pic form-control" placeholder="Enter pic">
          <span class="text-danger picError"></span>
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
        <button type="button" class="btn btn-primary addCategory ">Add Category</button>
      </div>
    </div>
  </div>
</div>

<!--  category Edit Modal -->
<div class="modal fade" id="editCategoryModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modalmsg"></div>
        <input type="hidden" id="id" class=" form-control" >
        <div class="form-group">

          <label for="">category Name</label>
          <input type="text" id="name" class=" form-control" placeholder="Enter category name">
          <!-- <span class="text-danger nameError"></span> -->
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <textarea id="des" class=" form-control" clos="30" rows="4" placeholder="Enter category description"></textarea>
          <!-- <span class="text-danger desError"></span> -->
        </div>
        <div class="form-group">
          <label for="">category Tag</label>
          <input type="text" id="tag" class=" form-control" placeholder="Enter tags name">
          <!-- <span class="text-danger tagError"></span> -->
        </div>
        <div class="form-group">
          <label for="">Status</label>
          <select id="status" class="form-control ">
            <option value="1" id="stsVal"></option>
            <option value="1">Active</option>
            <option value="2">Inactive</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary updateCategory ">Update Category</button>
      </div>
    </div>
  </div>
</div>

<!-- Categpry delete Modal -->
<div class="modal fade" id="deleteCategoryModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this category?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <button type="button" class="btn btn-primary">delete</button>
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
                <button data-toggle="modal" data-target="#addCategory" class="btn btn-sm btn-info "><i class="fa fa-plus"></i>Add Category</button>
              </div>
              <div class="msg"></div>
          	  <table class="table">
                   <thead>
                       <tr>
                           <th>Serial</th>
                           <th>Category Name</th>
                           <th>Description</th>
                           <th>Tags</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                     </thead>

                       <tbody class="tbody">

                           <!-- <tr>
                               <td>01</td>
                               <td>man</td>
                               <td>shirt</td>
                               <td>man,children</td>
                               <td>1</td>
                               <td>
                                   <a href="" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                   <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="modal" data-target=""></i></a>
                               </td>
                           </tr> -->
                       </tbody> 
                </table>
            </div>
        </div>
    </div>
</div><!-- br-pagebody -->

@endsection