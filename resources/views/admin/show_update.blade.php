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
                <form method='post' action="{{ url('/search_show') }}">
                  {{csrf_field()}}
                  <input type="date" name="search_key" required placeholder="show date">
                  <input type="submit" name="submit" value="search">

                </form>
              </div>
            </div>
            @include('messages._showmessage')
            @if($show)
            <!-- Smart Wizard -->
            @foreach($show as $value)
            <div id="wizard" class="form_wizard wizard_horizontal x_title">
              <div id="step-1">

                <form class="form-horizontal form-label-left"  method="post" enctype="multipart/form-data" action="{{ url('/show_update') }}" >
                  {{ csrf_field() }}
                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Show Id<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="show_id" name="show_id" required="required" readonly active class="form-control col-md-7 col-xs-12"  value="{{ $value->show_id }}">
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mela Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="mela_name" name="mela_name" list="melas" required="required" active class="form-control col-md-7 col-xs-12"  value="{{App\Mela::where('mela_id','=',$value->mela_id)->pluck('mela_name')[0] }}">
                      <datalist id="melas">
                        @foreach($melas as $value1)
                          <option value="{{ $value1 }}"></option>
                        @endforeach
                      </datalist>
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Prasangha Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="prasangha_name" list="prasanghas" name="prasangha_name" required="required" active class="form-control col-md-7 col-xs-12"  value="{{App\Prasangha::where('prasangha_id','=',$value->prasangha_id)->pluck('prasangha_name')[0] }}">
                      <datalist id="prasanghas">
                        @foreach($prasanghas as $value2)
                          <option value="{{ $value2 }}"></option>
                        @endforeach
                      </datalist>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Producer Name<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_producer_name" class="form-control col-md-7 col-xs-12" type="text" name="show_producer_name" value="{{ $value->show_producer_name }}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Show date <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_date" name="show_date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" value="{{ $value->show_date }}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Show Time <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_time" name="show_time" class="date-picker form-control col-md-7 col-xs-12" required="required" type="time" value="{{ $value->show_time }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact 1 <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_contact1" name="show_contact1" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $value->contact_1 }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact 2 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_contact2" name="show_contact2" class="date-picker form-control col-md-7 col-xs-12"  type="text" value="{{ $value->contact_2 }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Village <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_village" name="show_village" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $value->village}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Taluk <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_taluk" name="show_taluk" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $value->taluk}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">District <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_district" name="show_district" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $value->district}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">PINCODE <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="show_pin" name="show_pin" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{$value->PINCODE}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input  class="btn btn-primary" type="submit" name="submit" value="Update">
                      <a href="{{ url('/prasangha_delete/'.$value->show_id) }}" class="btn btn-warning">Delete</a>
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
