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
                <form method='post' action="{{ url('/search_artist') }}">
                  {{csrf_field()}}
                  <input type="text" name="search_key" required placeholder="name">
                  <input type="submit" name="submit" value="search">


                </form>
              </div>
            </div>
            @include('messages._showmessage')
            @if($artist)
            <!-- Smart Wizard -->
            @foreach($artist as $value)
            <div id="wizard" class="form_wizard wizard_horizontal x_title">
              <div id="step-1">

                <form class="form-horizontal form-label-left"  method="post" enctype="multipart/form-data" action="{{ url('/artist_update') }}" >
                  {{ csrf_field() }}
                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Artist Id<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="arist_id" name="artist_id" required="required" readonly active class="form-control col-md-7 col-xs-12"  value="{{ $value->artist_id }}">
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mela Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input list="melas" name="mela_name" required="required" active class="form-control col-md-7 col-xs-12" value="{{ App\Mela::where('mela_id','=',$value->mela_id)->pluck('mela_name')[0]}}">
                      <datalist id="melas">
                      @foreach($melas as $value1)
                        <option value="{{ $value1 }}">
                      @endforeach
                      </datalist>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Artist First Name<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="artist_first_name"  class="form-control col-md-7 col-xs-12" required name="artist_first_name" value="{{ $value->artist_first_name }}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Artist Second Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="artist_second_name" name="artist_second_name" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $value->artist_second_name }}">
                    </div>
                  </div>
                  <div class="form-group text-center" >
                            <img src="/artist_images/{{ $value->artist_pic }}" style="width: 100px;height:100px;">
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Artist Picture
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="artist_pic" name="artist_pic" class="date-picker form-control col-md-7 col-xs-12" type="file" value="{{ $value->artist_pic }}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Artist Type <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="artist_type" list="types" name="artist_type" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $value->artist_type }}">
                      <datalist id="types">
                        <option value="veshadari">
                        <option value="bhagavata">
                        <option value="chande">
                        <option value="maddale">
                      </datalist>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Artist Place<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="artist_place" name="artist_place" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $value->artist_place }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input  class="btn btn-primary" type="submit" name="submit" value="Update">
                      <a href="{{ url('/artist_delete/'.$value->artist_id) }}" class="btn btn-warning">Delete</a>
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
