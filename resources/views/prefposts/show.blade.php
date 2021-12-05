@extends('layouts.app')

@section('content')
        <div class="center jumbotron">
            <div class="text-center">
                <h1>画像など</h1>
            </div>
        </div>
        
        <img src="{{ url('img/prefmap',[$pref->map_image]) }}" alt="都道府県画像" width="200">
        {!! nl2br(e($pref->name)) !!}</p>
        
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
                         
        @include('commons.preflist')
@endsection