@extends('layouts.app')

@section('content')
<div class="flex-container" id="story" >
<header>
  <h1>{{$name}}</h1>
</header>

<nav class="nav-sidemenu">
<ul>
  @foreach($prasangha as $story)
  <li class="item"><a href="/prasangha/{{$story}}#story">{{$story}}</a></li>
  @endforeach
</ul>
</nav>

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
  <img style="width: 100%;" src="\spirits/img/yaksha.jpg" alt="image not loaded may be because slow internet">
@endif
</article>

<footer>Copyright &copy; W3Schools.com</footer>
</div>
@endsection