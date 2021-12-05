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
                        
                        {!! Form::open(['route' => ['pref.store', $pref->id]]) !!}
                      {{-- {!! Form::open(['route' => 'pref.store', [30]]) !!} --}}
    <div class="form-group">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}</p>
        {!! link_to_route('pref.show', '投票せずに見る', [$pref->id], ['class' => 'nav-link']) !!}
    </div>
{!! Form::close() !!}

        @include('commons.preflist')
@endsection