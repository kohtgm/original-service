@extends('layouts.app')

@section('content')
        {{-- <div class="center jumbotron">
            <div class="text-center">
                <h1>都道府県の魅力を投稿しよう！</h1>
            </div>
        </div> --}}
        
        <img src="{{ secure_asset('img/top1.jpg') }}" alt="都道府県風景画像" width="1000" style="display: block; margin: auto;">
        
        <div class="container container-m">
  <div class="row">
    <div class="col-md-6  img-hidden">
        
      <img src="{{ secure_asset('img/top2.jpg') }}" alt=TechAcademy KITCHEN" width="500"> 
    </div>
    <div class="col-md-5">
    <div class="text-center">
      <h3>都道府県の魅力を投稿しよう！</h3>
      </div>
    </div>
  </div>
</div>

        @include('commons.preflist')
@endsection