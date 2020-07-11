@extends('nav')

@section('content')
<style>
#item{
display: inline-block;width: 29%;height: 160px;margin: 1%; border: 1px solid #C4C4C4;position: relative;
}
#map{
width: 100%;border:0;display: block;margin: 5%; border: 1px solid #C4C4C4;
}
#profile{
width: 100%; height: 140px;display: block;margin: 5%;
}
#event{width: 65%; height: 300px;display: inline-block;margin-right: 5%;}
.side{
  display: inline-block;
}
        @media screen and (max-width: 700px) {
#item{
display: block;width: 98%;
}
        }  @media screen and (max-width: 1100px) {
#event{width: 95%;}
.side{
  width: 85%;
  display: block;
}
#profile{
height: 210px;
}
#map{
height: 210px;
}

        }
        }
</style>
<div class="uper">
  <div class="up" style=" margin-left:3%;margin-top: 10px">
  	<div id="event">
  		<h1>Visi</h1>
  		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
  		<h1>Misi</h1>
  		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
  	</div>
    <div class="side">
      <a href="{{ url('/profile') }}">
    <img src="data:image/jpeg;base64,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" id="profile" alt="event"></a>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d415.9003477862153!2d109.3587581627159!3d-7.383764816161117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655907c4390657%3A0x853f9819f237a493!2sHRS%20RACING%20SHOP!5e0!3m2!1sen!2sid!4v1586024440729!5m2!1sen!2sid" height="140" frameborder="0" allowfullscreen="true" aria-hidden="false" tabindex="0" id="map"></iframe>
    </div>
  </div>
  <div class="down">
    <p style="margin-left: 1%">Our Team</p>
        <div id="item">
   <img src=""style="width: 100%;height: 160px;"> 
    </div>
        <div id="item">
   <img src=""style="width: 100%;height: 160px;"> 
    </div>
        <div id="item">
   <img src=""style="width: 100%;height: 160px;"> 
    </div>
</div>
</div>   </script>
@endsection
