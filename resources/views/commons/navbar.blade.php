<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-info" style="background: linear-gradient(180deg, #20bdff, #5433ff);">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/"><div class="test"><img src="{{ secure_asset('img/logo.png') }}" alt=TechAcademy KITCHEN" class="d-inline-block align-bottom"> みんなで作ろう都道府県の魅力</div></a>
{{--
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        --}}

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{-- ユーザ登録ページへのリンク --}}
                {{-- <li class="nav-item"><a href="#" class="nav-link">Signup</a></li> --}}
                {{-- ログインページへのリンク --}}
                {{-- <li class="nav-item"><a href="#" class="nav-link">Login</a></li> --}}
            </ul>
        </div>
    </nav>
</header>

<style>
 
.test {
    
font-family: 'Avenir','Helvetica Neue','Helvetica','Arial','Hiragino Sans','ヒラギノ角ゴシック',YuGothic,'Yu Gothic','メイリオ', Meiryo,'ＭＳ Ｐゴシック','MS PGothic',sans-serif;
font-size: 22px;
font-weight: bold;
}
 </style>