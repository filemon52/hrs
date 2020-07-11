@extends('nav')

@section('content')
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0.5s, opacity 0.5s linear;
}
.mySlides:hover .text{
  visibility: visible;
  opacity: 1;
}
.mySlides:hover .numbertext{
  visibility: visible;
  opacity: 1;
}

/* Number text (1/3 etc) */
.numbertext {
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0.5s, opacity 0.5s linear;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
<div class="slideshow-container">
        @foreach($kendaraan as $kendaraans)
<div class="mySlide fade">
  <img src="data:image/jpeg;base64,{{$kendaraans->gambar}}" id="index" style="width:100%;border: 1px solid">
</div>
        @endforeach 
        @foreach($stok as $stoks)
  <p style="display: none;">{{$index = $loop->iteration}}</p>
<div class="mySlides fade">
  <div class="numbertext">{{$index}} / {{count($stok)}}</div>
  <a href="{{ route('stok.show',$id_stok=$stoks->id_stok)}}">
  <img src="data:image/jpeg;base64,{{$stoks->display}}" style="width:100%;border: 1px solid">
    </a>
  <div class="text">{{$stoks->nama_stok}} - {{$stoks->merk}} {{$stoks->kendaraan}} - Rp.{{$stoks->harga}}</div>
</div>
        @endforeach 
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
        @foreach($stok as $stoks)
  <p style="display: none;">{{$index = $loop->iteration}}</p>
  <span class="dot" onclick="currentSlide({{$index}})"></span> 
  @endforeach
</div>
 @endsection
 <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var slide = document.getElementById("index").style.display="none";
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
}
</script>
