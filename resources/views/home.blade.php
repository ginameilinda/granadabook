@extends('layouts.app')
<style type="text/css">
  #demo {
    /*background-color: rgba(245, 245, 245, 0.6) !important;*/
    text-align: center;
    font-size: 60px;
    margin-top: 0px;
    font-family: "Courier New", Courier, monospace;
  }
</style>
@section('content')
<section class="page-section" id="services"  style="padding: 0px;">
<div class="container" style="padding-top: 80px;">
    @auth
    <h3 class="text-center"><b>Hai, Apa Kabar {{ Auth::user()->name }}?</b></h3>
    <hr class="divider my-4">
    @endauth
    
    <div class="row">
        <div class="col">
            <div class="text-center">
                <div class="mt-5">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif 
                    <h5>Nantikan Kejutan Yang Akan Datang!</h5>
                    <p id="demo"></p>
                </div>
                <br>
                <div>
                    <h5>Ayo, Naikan Semangatmu Terlebih Dahulu Dengan Membaca!</h5><br>
                    <a href="{{ url('public') }}" class="btn btn-primary btn-xl js-scroll-trigger">Belanja Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

<script>
// Set the date we're counting down to
var countDownDate = new Date("July 15, 2019 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d : " + hours + "h : "
  + minutes + "m : " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
