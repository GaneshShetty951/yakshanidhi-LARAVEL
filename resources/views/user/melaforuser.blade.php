@extends('layouts.app')

@section('content')
<div class="flex-container" id="mela" >
<header>
  <h1>{{$name}}</h1>
</header>

<nav class="nav-sidemenu">
<ul>
  @foreach($mela as $m)
  <li class="item"><a href="/mela/{{$m}}#mela">{{$m}}</a></li>
  @endforeach
</ul>
</nav>

<article class="article">
  @if($singlemela)
    @foreach($singlemela as $mela_s)
    <img class="mela_image" src="\mela_images/{{$mela_s->mela_pic}}" alt="image not found">
    <TABLE cellspacing="10px" cellpadding="10px" >
    <TR>
      <td class="card_tab"><h2> Email </h2></td>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"><h2> {{ $mela_s->mela_email }}</h2> </TD>
    </TR>
    <TR>
      <TD class="card_tab"><h2>Contact </h2></TD>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"> <h2>{{ $mela_s->contact }}</h2> </TD>
    </TR>
    <TR>
      <TD class="card_tab"><h2>Village </h2></TD>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"> <h2>{{ $mela_s->village }}</h2> </TD>
    </TR>
    <TR>
      <TD class="card_tab"><h2>Taluk </h2></TD>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"> <h2>{{ $mela_s->taluk }}</h2> </TD>
    </TR>
    <TR>
      <TD class="card_tab"><h2>District </h2></TD>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"> <h2>{{ $mela_s->district }}</h2> </TD>
    </TR>
    <TR>
      <TD class="card_tab"><h2>Pincode </h2></TD>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"> <h2>{{ $mela_s->PINCODE }}</h2> </TD>
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