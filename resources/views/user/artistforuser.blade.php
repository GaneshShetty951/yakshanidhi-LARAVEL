@extends('layouts.app')

@section('content')
<div class="flex-container" id="artist" >
<header>
  <h1>{{ $heading }}</h1>
</header>

<nav class="nav-sidemenu">
<ul>
  @foreach($artist as $actor)
  <li class="item"><a href="/artist/{{$heading}}/{{$actor}}#artist">{{$actor}}</a></li>
  @endforeach
</ul>
</nav>

<article class="article">
  @if($single_artist)
  @foreach($single_artist as $artist)
  <img class="mela_image" src="\artist_images/{{$artist->artist_pic}}" alt="image not found">
    <TABLE cellspacing="10px" cellpadding="10px" >
    <TR>
      <td class="card_tab"><h2> Name </h2></td>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"><h2> {{ $artist->artist_first_name }}</h2> </TD>
    </TR>
    <TR>
      <td class="card_tab"><h2> Second Name </h2></td>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"><h2> {{ $artist->artist_second_name }}</h2> </TD>
    </TR>
     <TR>
      <td class="card_tab"><h2> Place </h2></td>
      <TD class="card_tab"><h1>:</h1></TD>
      <TD class="card_tab"><h2> {{ $artist->artist_place }}</h2> </TD>
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