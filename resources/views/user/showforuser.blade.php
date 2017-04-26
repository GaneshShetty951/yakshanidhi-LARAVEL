@extends('layouts.app')

@section('content')
@section('content')
<div class="flex-container" id="show" >
<header>
  <h1>Todays Show</h1>
</header>

<nav class="nav-sidemenu">
<ul>
  @foreach($p_name as $p)
  <li class="item"><a href="\show/{{$p->prasangha_name}}/{{$p->show_id}}#show">{{ $p->prasangha_name }}</a></li>
  @endforeach
</ul>
</nav>

<article class="article">
  @if($show)
  <TABLE >
  <colgroup>
    <col style="width: 40%" />
  </colgroup>
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
    
   
  @endforeach
  </TABLE>
  @else
  <img style="width: 100%;" src="\spirits/img/yaksha.jpg" alt="image not loaded may be because slow internet">
@endif
</article>

<footer>Copyright &copy; W3Schools.com</footer>
</div>
@endsection