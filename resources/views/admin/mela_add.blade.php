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
            <h2><a class="text-info"></i>Add new mela</a>
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


            <!-- Smart Wizard -->
            <div id="wizard" class="form_wizard wizard_horizontal">
              <div id="step-1">
                <form class="form-horizontal form-label-left" method="post"  action="{{ url('/mela_add') }}" enctype="multipart/form-data" >
                  {{ csrf_field() }}

                  @include('messages._showmessage')

                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="users">Manager Email<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="man_email" list="users" name="man_email" active class="form-control col-md-7 col-xs-12">
                      <datalist id="users">
                        @foreach($users as $value2)
                        <p>{{ $value2 }}</p>
                          <option value="{{ $value2 }}"></option>
                        @endforeach
                      </datalist>
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mela Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="mela_name" name="mela_name" required="required" active class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mela Picture <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="mela_pic" name="mela_pic" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mela Email</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="mela_email" class="form-control col-md-7 col-xs-12" type="email" name="mela_email">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="mela_contact" name="contact" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Village <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="mela_village" name="mela_village" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Taluk <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="mela_taluk" name="mela_taluk" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">District <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="mela_district" name="mela_district" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">PINCODE <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="mela_pin" name="mela_pin" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input  class="btn btn-default btn-primary" required="required" type="submit" value="Add">
                    </div>
                  </div>


                </form>

              </div>

            </div>
            <!-- End SmartWizard Content -->

          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- /page content -->



@endsection
