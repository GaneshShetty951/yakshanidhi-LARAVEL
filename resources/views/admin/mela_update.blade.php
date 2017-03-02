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
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a class="text-info"></i>Update details</a>
                        </h2>
                    <ul class="nav navbar-right panel_toolbox">
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
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <div id="wizard" class="form_wizard wizard_horizontal x_title text-center">
                    <div class="row">
                      <form method='post' action="{{ url('/search_mela') }}">
                      {{csrf_field()}}
                        <input type="text" name="search_key" required placeholder="mela,email">
                        <input type="submit" name="submit" value="search">
                      </form>
                    </div>
                  </div>

                    @if($mela)
                    <!-- Smart Wizard -->
                    @foreach($mela as $mela_value)
                    <div id="wizard" class="form_wizard wizard_horizontal x_title">
                      <div id="step-1">
                        <form class="form-horizontal form-label-left"  action="{{ url('/mela_save') }}">

                          <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mela Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="mela_name" name="mela_name" required="required" active class="form-control col-md-7 col-xs-12"  value="{{ $mela_value->mela_name }}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mela Picture <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="mela_pic" name="mela_pic" required="required" class="form-control col-md-7 col-xs-12" value="{{ $mela_value->mela_pic }}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mela Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="mela_email" class="form-control col-md-7 col-xs-12" type="email" name="middle-name" value="{{ $mela_value->mela_email }}">
                            </div>
                          </div>
                    
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="mela_contact" name="mela_contact" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $mela_value->contact }}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Village <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="mela_village" name="mela_village" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $mela_value->village }}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Taluk <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="mela_taluk" name="mela_taluk" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $mela_value->taluk }}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">District <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="mela_district" name="mela_district" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $mela_value->district }}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">PINCODE <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="mela_pin" name="mela_pin" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $mela_value->PINCODE }}">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="btn btn-primary" required="required" type="submit" value="Update">
                              <a class="btn btn-warning">Delete</a>
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
