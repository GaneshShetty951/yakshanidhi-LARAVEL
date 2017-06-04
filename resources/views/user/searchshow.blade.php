@extends('layouts.app')

@section('content')
<div class="flex-container" id="show" >
  <div class="flex-container" >
  <header>
    <h1>{{$name}}</h1>
    <form action="{{url('/search/show')}}#show" method="POST">
    <TABLE><tr><td>
    {{csrf_field()}}
    <input type="date" name="name" id="name"/></td><td>
    <input type="submit" value="search"></td>
    </tr></TABLE>
  </form>
  </header>

  <nav class="nav-sidemenu">
    <ul>
    @if($p_name)
      @foreach($p_name as $p)
      <li class="item"><a href="\search/{{$p->prasangha_name}}/{{$p->show_id}}/show#show">{{ $p->prasangha_name }}</a></li>
      @endforeach
      <h6>{{ $p_name->fragment('show')}}</h6>
    @endif
    </ul>
  </nav>

  <article class="article">
    @if($show)
    <TABLE >
      @foreach($show as $s)
      <img class="mela_image" src="\mela_images/{{$s->mela_pic}}" alt="image not found">
      <TR class="show">
        <td class="card_tab"><h3> Prasangha </h3></td>
        <TD class="card_tab"><h1>:</h1></TD>
        <TD class="card_tab"><h3> {{ $s->prasangha_name }}</h3> </TD>
      </TR>
      <TR class="show">
        <td class="card_tab"><h3> Mela </h3></td>
        <TD class="card_tab"><h1>:</h1></TD>
        <TD class="card_tab"><h3> {{ $s->mela_name }}</h3> </TD>
      </TR>
      <TR class="show">
        <td class="card_tab"><h3> Show Producer Name </h3></td>
        <TD class="card_tab"><h1>:</h1></TD>
        <TD class="card_tab"><h3> {{ $s->show_producer_name }}</h3> </TD>
      </TR>
      <TR class="show">
        <td class="card_tab"><h3> Show time </h3></td>
        <TD class="card_tab"><h1>:</h1></TD>
        <TD class="card_tab"><h3> {{ $s->show_time }}</h3> </TD>
      </TR>
      <TR class="show">
        <td class="card_tab"><h3> Place </h3></td>
        <TD class="card_tab"><h1>:</h1></TD>
        <TD class="card_tab"><h3> {{ $s->village }}, {{$s->taluk}}  {{$s->district}}<br/>PIN : {{$s->PINCODE}}</h3> </TD>
      </TR>
      <TR class="show">
        <td class="card_tab"><h3> Contacts </h3></td>
        <TD class="card_tab"><h1>:</h1></TD>
        <TD class="card_tab"><h3> {{ $s->contact_1 }}<br/> {{$s->contact_2}} </h3> </TD>
      </TR>



    </TABLE>
    <div class="container-fluid">
      <div class="row">
        <form method="POST" action="{{ url('/comment') }}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div style="width: 100%;">
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden />
            <input type="text" name="show_id" value="{{ $s->show_id }}" hidden/>
            <textarea style="width: 100%;height:300%" rows="5" type="textarea" name="comment" id="comment"></textarea>
            @include('messages._showmessage')
          </div>
          <div class=".col-xs-6 .col-md-4">
            <input style="width: 200px;height: 50px; color:#FF8C00; background: #000; text-shadow: 5px; font-style: bold;" type="submit" name="submit" value="Comment"/>
          </div>
        </form>
      </div>
    </div>

    @endforeach
    @else
    <img style="width: 100%;" src="\spirits/img/yaksha.jpg" alt="image not loaded may be because slow internet">
    @endif
  </article>

  <div class="comment_box">
    @if($comments)
    @foreach($comments as $comment )
    <div class="single_comment">
      <h6 class="comment_header"><b style="padding-right:10px;">{{$comment->name}}</b>{{ $comment->created_at}}</h6>
      <h5 class="comment_body">{{$comment->comment_text}}</h5>
    </div>
    @endforeach
    <h7>{{$comments->fragment('show')}}</h7>
    @endif
  </div>
  </div>
  <footer>Copyright &copy; W3Schools.com</footer>
</div>
@endsection
