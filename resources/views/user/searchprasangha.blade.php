@extends('layouts.app')

@section('content')
<div class="flex-container" id="story" >
<header>
  <h1>{{$name}}</h1>
</header>
<form action="{{url('/search/prasangha')}}#story" method="POST">
    <TABLE style="border:0;"><TR style="border:0;">
    <TD style="width:50%;">
    {{csrf_field()}}
    <input type="text" name="name" id="name" placeholder="Prasangha Name  " style="width:200%;" />
    </TD>
    <TD style="padding-left:50%;">
    <input type="submit" value="search">
    </TD>
    </TR></TABLE>
  </form>
 @if($prasangha)
<nav class="nav-sidemenu1">
<ul>
 
  @foreach($prasangha as $story)
  <li class="item"><a href="{{ url('/search/'.$story->prasangha_name.'/prasangha')}}#story">{{$story->prasangha_name}}</a></li>
  @endforeach
  <h6>{{ $prasangha->fragment('story')}}</h6>
</ul>
</nav>
 @endif

<article class="article">
  @if($singleprasangha)
  @foreach($singleprasangha as $single)
  <TABLE >
    <TR>
      <td class="card_tab"><h2> Author </h2></td>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"><h2> {{ $single->prasangha_author }}</h2> </TD>
    </TR>
    <TR>
      <td class="card_tab"><h2> Year </h2></td>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"><h2> {{ $single->prasangha_year }}</h2> </TD>
    </TR>
  </TABLE>
  @endforeach
  @else
  <img style="width: 75%;height: 50%;" src="\spirits/img/yaksha.jpg" alt="image not loaded may be because slow internet">
@endif
</article>

<footer style="background: #000000;color:white;">Copyright &copy; W3Schools.com</footer>
</div>
@endsection