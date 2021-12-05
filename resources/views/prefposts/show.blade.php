@extends('layouts.app')

@section('content')
        {{--  <div class="center jumbotron">
            <div class="text-center">
                <h1>画像など</h1>
            </div>
        </div>　--}}
        
        <h1 class="text-center">{!! nl2br(e($pref->name)) !!}</h1>
         <hr class="style-four" />
        <img src="{{ url('img/prefmap',[$pref->map_image]) }}" alt="都道府県画像" width="300" style="display: block; margin: auto;">
        <br>
        
       
        
        @if (count($prefposts) == 0)
        まだ投稿がありません。</p>
        @endif
        
        @if (count($prefposts) > 0)
        @foreach ($prefposts as $prefpost)
         <span class="text-muted">
             posted at {{ $prefpost->created_at }}
             {!! nl2br(e(hash('adler32', $prefpost->ip_address))) !!}
         </span>
                        
                         
                         {!! nl2br(e($prefpost->content)) !!}</p>
                         @endforeach
        @endif
        </ul>
    {{-- ページネーションのリンク --}}
    {{ $prefposts->links() }}
    
    <br><br><br>
                         
        @include('commons.preflist')
@endsection