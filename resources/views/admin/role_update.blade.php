@extends('admin.main')

@section('admin')
<!-- <div class="right_col" role="main">
  <div class="container">
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
    </div>-->

    <!-- page content -->
    <!-- <div class="right_col" role="main"> -->
    <!-- top tiles -->
      <!-- <div class="title_right">
        <a class="btn btn-success btn-lg"><i class="fa fa-plus"></i>Add</a>
        <a class="btn btn-success btn-lg"><i class="fa fa-pencil"></i>Edit</a>
        <a class="btn btn-success btn-lg"><i class="fa fa-remove"></i>Delete</a>
      </div> 
    </div>
  </div>
</div> --> 

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Wizards</h3>
      </div>

      <!-- <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div> -->
    </div>
    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><a class="text-info"></i>Update details</a>
            </h2>
            <!-- <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul> -->
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div id="wizard" class="form_wizard wizard_horizontal x_title text-center">
              <div class="row">
                <form method='post' action="{{ url('/roles') }}">
                  {{csrf_field()}}
                  <input type="email" name="email" required placeholder="email">
                  <input type="submit" name="submit" value="search">
                </form>
              </div>
            </div>
            @include('messages._showmessage')
            @if($role)
            <!-- Smart Wizard -->
            @foreach($role as $value)
            <div id="wizard" class="form_wizard wizard_horizontal x_title">
              <div id="step-1">

                <form class="form-horizontal form-label-left"  method="post" enctype="multipart/form-data" action="{{ url('/role_update') }}" >
                  {{ csrf_field() }}
                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Id<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="user_id" name="user_id" required="required" readonly active class="form-control col-md-7 col-xs-12"  value="{{ $value->id }}">
                    </div>
                  </div>

          
                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="name" name="name" required="required" active readonly class="form-control col-md-7 col-xs-12"  value="{{ $value->name }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">User Email<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="email" class="form-control col-md-7 col-xs-12" type="email" readonly name="email" value="{{ $value->email }}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      @if(DB::table('role_user')->where('user_id','=',$value->id)->get()==null)
                      <input  class="btn btn-primary" type="submit" name="submit" value="Make manager">
                      @endif
                      @if(DB::table('role_user')->where('user_id','=',$value->id)->get()!=null)
                      <a href="{{ url('/role_delete/'.$value->id) }}" class="btn btn-warning">Delete Manager</a>
                      @endif
                    </div>
                  </div>


                </form>

              </div>

            </div>
            @endforeach
            <!-- End SmartWizard Content -->
            @endif

          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- /page content -->



@endsection
