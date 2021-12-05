@extends('layouts.app')

@section('content')
      {{--  <div class="center jumbotron">
            <div class="text-center">
                <h1>都道府県　風景画像など</h1>
            </div>
        </div> --}}
        <img src="{{ url('img/prefscene',[$pref->scene_image]) }}" alt="都道府県風景画像" width="600" style="display: block; margin: auto;">
        
        <img src="{{ url('img/prefmap',[$pref->map_image]) }}" alt="都道府県画像" width="200">
        {!! nl2br(e($pref->name)) !!}
                    
        <h4>1つの都道府県への投稿は1日3回までです。</h4> 
        {!! link_to_route('pref.show', '見る', [$pref->id], ['class' => 'nav-link']) !!}
        <br><br><br>
                   

        @include('commons.preflist')
@endsection