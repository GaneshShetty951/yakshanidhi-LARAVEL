@extends('manager.manager_main')

@section('manager')
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
            <h2><a class="text-info"></i>Add new Show</a>
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
                <form class="form-horizontal form-label-left" method="post"  action="{{ url('/show_add_man') }}" enctype="multipart/form-data" >
                  {{ csrf_field() }}

                  @include('messages._showmessage')

                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mela Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input list="melas" name="mela_name" required="required" value="{{ $mela->mela_name}}" readonly active class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Prasangha Name <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input  list="Prasanghas"  class="form-control col-md-7 col-xs-12" required name="prasangha_name">
                      <datalist id="Prasanghas">
                        @foreach($prasangha as $value)
                          <option value="{{ $value }}"></option>
                        @endforeach
                      </datalist>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Show Producer Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_producer_name" name="show_producer_name" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Show date <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_date" name="show_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Show Time <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_time" name="show_time" class="date-picker form-control col-md-7 col-xs-12" required="required" type="time">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact 1 <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_contact1" name="show_contact1" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact 2 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_contact2" name="show_contact2" class="date-picker form-control col-md-7 col-xs-12"  type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Village <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_village" name="show_village" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Taluk <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_taluk" name="show_taluk" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">District <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_district" name="show_district" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">PINCODE <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_pin" name="show_pin" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
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
