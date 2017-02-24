@extends('admin.main')

@section('admin')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
      <h3>Mela</h3>
      </div>
      
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- page content -->
    <div class="right_col" role="main">
      <!-- top tiles -->
      <div class="title_right">
      <a class="btn btn-success btn-lg"><i class="fa fa-plus"></i>Add</a>
      <a class="btn btn-success btn-lg"><i class="fa fa-pencil"></i>Edit</a>
      <a class="btn btn-success btn-lg"><i class="fa fa-remove"></i>Delete</a>
      </div>
    </div>
    <!-- /top tiles -->

@endsection
