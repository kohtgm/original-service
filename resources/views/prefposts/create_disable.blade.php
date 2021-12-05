@extends('layouts.app')

@section('content')
      {{--  <div class="center jumbotron">
            <div class="text-center">
                <h1>都道府県　風景画像など</h1>
            </div>
        </div> --}}
         <h1 class="text-center">{!! nl2br(e($pref->name)) !!}</h1>
         <hr class="style-four" />
        <img src="{{ url('img/prefscene',[$pref->scene_image]) }}" alt="都道府県風景画像" width="1000" style="display: block; margin: auto;">
        <br>
        <h3 class="text-center">1つの都道府県への投稿は1日3回までです</h3>
        {!! link_to_route('pref.show', $pref->name.'の魅力を見る', [$pref->id], ['class' => 'nav-link']) !!}
                      
<br><br><br>

        @include('commons.preflist')
@endsection