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
    </div>

    <!-- page content -->
    <!-- <<div class="right_col" role="main">
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
              <a class="">List of Artists</a>
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
            <!-- <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p> -->
            <div id="wizard" class="form_wizard wizard_horizontal">
              <div id="step-1">
                @include('messages._showmessage')
                <div class="container-fluid">
                  <div class="row x_title" style="background-color:#AAAAAA;"">
                    <STRONG>
                    <div class="col-sm-2" style="background-color:#AAAAAA;font-style:bold;">
                    <p>Mela Name</p>
                    </div>
                    <div class="col-sm-3" style="background-color:#AAAAAA;font-style: bold;">
                      <p>Artist first name</p>
                    </div>
                    
                    <div class="col-sm-1" style="background-color:#AAAAAA;font-style: bold;">
                    <p>Artist second name</p>
                    </div>
                    <div class="col-sm-3" style="background-color:#AAAAAA;font-style: bold;">
                    <p>Artist Pic</p>
                    </div>
                    <div class="col-sm-1" style="background-color:#AAAAAA;font-style: bold;">
                      <p>Artist type</p>
                    </div>
                    <div class="col-sm-1" style="background-color:#AAAAAA;font-style: bold;">
                      <p>Artist Place</p>
                    </div>
                    </STRONG>

                  </div>
                  @foreach($artist as $value)
                  <div class="row x_title">
                    <STRONG>
                    <div class="col-sm-2" >
                    <p>{{App\Mela::where('mela_id','=',$value->mela_id)->pluck('mela_name')[0] }}</p>
                    </div>
                    <div class="col-sm-3" >
                      <p>{{ $value->artist_first_name }}</p>
                    </div>
                    <div class="col-sm-1" >
                    <p>{{ $value->artist_second_name }} </p>
                    </div>
                    <div class="col-sm-3" >
                    <p>{{$value->artist_pic}}</p>
                    </div>
                    <div class="col-sm-1" >
                      <p>{{$value->artist_type}}</p>
                    </div>
                    <div class="col-sm-1" >
                      <p>{{$value->artist_place}}</p>
                    </div>
                    </STRONG>

                  </div>
                  @endforeach
                </div>
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
