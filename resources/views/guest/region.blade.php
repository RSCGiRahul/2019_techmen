<!DOCTYPE html>
<html lang="en">
<head>   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Techman</title>

    <style>
      body{
         background: #3dadf133;
         border: 20px solid #ee6e73;
         height: 100%;
      }
    </style>
 </head>
<body>
@include('layouts.front.fetch_css')
   <div class="container-fluid">
      <div class="row">
      <div class="center">
        <h5>Choose Your City</h5>
      </div>
         <div class="container center">
            <div class="row">
              @php
                $regionImage = ['delhi.jpg', 'noida.jpg', 'gurugram.jpg', 'gaziyabad.jpg', 'other.png']
              @endphp
              @foreach($regions as $key => $region)
                    @php
                     $imgName =  ($regionImage[$key]) ?? 'other.png';
                     $imgPath = 'frontend_assets/img/city/'.$imgName;
                    @endphp


                    <div class="col l3 s12">
                       <a href="{{route('homepage', $region->id)}}">
                         <div class="citycardLocater">
                           <img src="{{asset($imgPath) }}" alt="City Indenity">
                           <h6>{{$region->name}}</h6>
                        </div>
                        </a>
                     </div>

              @endforeach
           
            </div>
         </div>
      </div>
   </div>
   @include('layouts.front.fetch_js')
   
</body>
</html>
