@extends('layouts.app')

@section('content')
        {{--  <div class="center jumbotron">
            <div class="text-center">
                <h1>画像など</h1>
            </div>
        </div>　--}}
        
           
        <h1 class="text-center">{!! nl2br(e($pref->name)) !!}</h1>
         <hr class="style-four" />
        
      
      
        
        <div id="canvas_wrapper">
	<canvas id="canvas" width="1000" height="480"></canvas>
</div>
 <script type="text/javascript">

      //描画コンテキストの取得

      var canvas = document.getElementById('canvas');

      if (canvas.getContext) {

        var context = canvas.getContext('2d');
        
       

        //キャンバスのサイズを取得

        const width= canvas.clientWidth;

        const height= canvas.clientHeight;

        //キャンバスのサイズ(CSSで指定したキャンバスのサイズをキャンバス内に反映)

        canvas.width = 1000;

        canvas.height = 500;

        //図形のサイズを指定

        const body_size = 120;

        const face_size = 90;

        const eye_size = 10;

        const mouth_size = 60;

        const button_size = 20;
        
        //キャンバスの背景色

        //canvas.style.backgroundColor = "rgb(255,255,255)";
        canvas.style.backgroundColor = "rgb(230,230,230)";

     

     
     
    context.textAlign = "left";
    context.textBaseline = "top"; 
    //context.font= 'bold 40px Century Gothic';
    context.font= 'bold 35px Century Gothic';
	context.strokeStyle = '#000000';
	context.lineWidth = 5 
	context.lineJoin = 'round';
	context.fillStyle = '#fff';
    context.fillText('fillText(text,x,y[,maxWidth])',15,55,520);
	context.strokeText('strokeText(text,x,y[,maxWidth])',15,115,520);
	context.strokeText('fillText on strokeText',15,175,520);
	context.fillText('fillText on strokeText',15,175);
	
	
    var colorarray = new Array(10);
 	colorarray[0]='#ff7f7f';
 	colorarray[1]='#ff7fbf';
 	colorarray[2]='#bf7fff';
 	colorarray[3]='#7f7fff';
 	colorarray[4]='#7fbfff';
 	colorarray[5]='#7fffff';
 	colorarray[6]='#7fff7f';
 	colorarray[7]='#bfff7f';
 	colorarray[8]='#ffff7f';
 	colorarray[9]='#ffbf7f';
 	
 	var pxarray = new Array(10);
 	pxarray[0]=0;
 	pxarray[1]=330;
 	pxarray[2]=660;
 	pxarray[3]=0;
 	pxarray[4]=660;
 	pxarray[5]=0;
 	pxarray[6]=660;
 	pxarray[7]=0;
 	pxarray[8]=330;
 	pxarray[9]=660;
 	
 	var pyarray = new Array(10);
 	pyarray[0]=10;
 	pyarray[1]=10;
 	pyarray[2]=10;
 	pyarray[3]=130;
 	pyarray[4]=130;
 	pyarray[5]=250;
 	pyarray[6]=250;
 	pyarray[7]=370;
 	pyarray[8]=370;
 	pyarray[9]=370;
 	
 	var start_x = new Array(10);
 	start_x[0]=0;
 	start_x[1]=0;
 	start_x[2]=0;
 	start_x[3]=1200;
 	start_x[4]=-400;
 	start_x[5]=1200;
 	start_x[6]=-400;
 	start_x[7]=0;
 	start_x[8]=0;
 	start_x[9]=0;
 	
 	var start_y = new Array(10);
 	start_y[0]=700;
 	start_y[1]=700;
 	start_y[2]=700;
 	start_y[3]=0;
 	start_y[4]=0;
 	start_y[5]=0;
 	start_y[6]=0;
 	start_y[7]=-200;
 	start_y[8]=-200;
 	start_y[9]=-200;
 	
 	var num_w = new Array(16);
 	num_w[0]=1;
 	num_w[1]=2;
 	num_w[2]=3;
 	num_w[3]=4;
 	num_w[4]=5;
 	num_w[5]=6;
 	num_w[6]=7;
 	num_w[7]=8;
 	num_w[8]=9;
 	num_w[9]=10;
 	num_w[10]=11;
 	num_w[11]=12;
 	num_w[12]=13;
 	num_w[13]=13;
 	num_w[14]=13;
 	num_w[15]=13;
 	
 	var num_h = new Array(16);
 	num_h[0]=1;
 	num_h[1]=1;
 	num_h[2]=1;
 	num_h[3]=1;
 	num_h[4]=1;
 	num_h[5]=1;
 	num_h[6]=1;
 	num_h[7]=1;
 	num_h[8]=1;
 	num_h[9]=1;
 	num_h[10]=1;
 	num_h[11]=1;
 	num_h[12]=1;
 	num_h[13]=2;
 	num_h[14]=3;
 	num_h[15]=4;
 	
 	var font_size = new Array(16);
 	font_size[0]=70;
 	font_size[1]=70;
 	font_size[2]=70;
 	font_size[3]=70;
 	font_size[4]=50;
 	font_size[5]=50;
 	font_size[6]=35;
 	font_size[7]=35;
 	font_size[8]=35;
 	font_size[9]=24;
 	font_size[10]=24;
 	font_size[11]=24;
 	font_size[12]=24;
 	font_size[13]=24;
 	font_size[14]=24;
 	font_size[15]=24;
 	
 	var fontstyle = new Array(4);
 	fontstyle[0]='bold 70px Century Gothic';
 	fontstyle[1]='bold 50px Century Gothic';
 	fontstyle[2]='bold 35px Century Gothic';
 	fontstyle[3]='bold 24px Century Gothic';
 	
    




      
      }
      
       const chara = new Image();
  chara.src = "{{ url('img/prefmap',[$pref->map_image]) }}";  // 画像のURLを指定
  chara.onload = () => {
    context.drawImage(chara, 300, 100,300,300);
  };
      
      
      const movetime = 30;
      const sp_x = 5;
      const sp_y = 5;
      let x = movetime, y = 0;
      let num=0;
      let pt=0;
      let px=0;
      let py=0;
      
      
      
     

      let col_ary = <?php echo $color_array; ?>;
        let x_ary = <?php echo $x_array; ?>;
        let y_ary = <?php echo $y_array; ?>;
        let p_ary = <?php echo $p_array; ?>;
        let sx_ary = <?php echo $sx_array; ?>;
        let sy_ary = <?php echo $sy_array; ?>;
        let number = <?php echo $number; ?>;
        let str = <?php echo $str; ?>;
        let strlen_ary = <?php echo $strlen_ary; ?>;
        
       
       
       if(number >= 1 && number <= 10){
            num = number;
        }
        
        if(number >= 11){
            num = 10;
        } 




    
    
    start_x[0] += 100*sx_ary[0];
    start_x[1] += 100*sx_ary[1];
    start_x[2] += 100*sx_ary[2];
    start_x[7] += 100*sx_ary[7];
    start_x[8] += 100*sx_ary[8];
    start_x[9] += 100*sx_ary[9];
    
    start_y[3] += 55*sy_ary[3];
    start_y[4] += 55*sy_ary[4];
    start_y[5] += 55*sy_ary[5];
    start_y[6] += 55*sy_ary[6];

        
const tick = () => {
  // 画面の消去
  context.clearRect(0, 0, canvas.width, canvas.height);

  // 円の描画
  {{--context.beginPath();
  context.arc(x, y, 25, 0, Math.PI * 2);--}}
 // context.fill();
  
 
 if(y>=50){
 
 if(num==0){
  	context.fillStyle = '#555d';
  context.fillText('まだ投稿がありません', 320, 50);
  }
  
    if(num>=1){
        for(var i = 0; i < num; i++){
            if(strlen_ary[i]<=13){
                pt = strlen_ary[i]-1;
                if(strlen_ary[i]<=4){
                    context.font= fontstyle[0];
                }else if(strlen_ary[i]<=6){
                    context.font= fontstyle[1];
                }else if(strlen_ary[i]<=9){
                    context.font= fontstyle[2];
                }else{
                    context.font= fontstyle[3];
                }
                px = pxarray[p_ary[i]] + sp_x + (330 - sp_x - num_w[pt] * font_size[pt]) / 9 * x_ary[i];
                py = pyarray[p_ary[i]] + sp_y + (120 - sp_y - num_h[pt] * font_size[pt]) / 9 * y_ary[i];
                px = px + (start_x[p_ary[i]] - px) / movetime * x;
                py = py + (start_y[p_ary[i]] - py) / movetime * x;
                context.fillStyle = colorarray[col_ary[i]];
                context.strokeText(str[i], px, py);
                context.fillText(str[i], px, py);
            }else if(strlen_ary[i]<=26){
                pt = 13;
                context.font= fontstyle[3];
                px = pxarray[p_ary[i]] + sp_x + (330 - sp_x - num_w[pt] * font_size[pt]) / 9 * x_ary[i];
                py = pyarray[p_ary[i]] + sp_y + (120 - sp_y - num_h[pt] * font_size[pt]) / 9 * y_ary[i];
                px = px + (start_x[p_ary[i]] - px) / movetime * x;
                py = py + (start_y[p_ary[i]] - py) / movetime * x;
                context.fillStyle = colorarray[col_ary[i]];
                context.strokeText(str[i].substr( 0, 13 ), px, py);
                context.fillText(str[i].substr( 0, 13 ), px, py);
                py += 24;
                context.strokeText(str[i].substr( 13, 13 ), px, py);
                context.fillText(str[i].substr( 13, 13 ), px, py);
            }else if(strlen_ary[i]<=39){
                pt = 14;
                context.font= fontstyle[3];
                px = pxarray[p_ary[i]] + sp_x + (330 - sp_x - num_w[pt] * font_size[pt]) / 9 * x_ary[i];
                py = pyarray[p_ary[i]] + sp_y + (120 - sp_y - num_h[pt] * font_size[pt]) / 9 * y_ary[i];
                px = px + (start_x[p_ary[i]] - px) / movetime * x;
                py = py + (start_y[p_ary[i]] - py) / movetime * x;
                context.fillStyle = colorarray[col_ary[i]];
                context.strokeText(str[i].substr( 0, 13 ), px, py);
                context.fillText(str[i].substr( 0, 13 ), px, py);
                py += 24;
                context.strokeText(str[i].substr( 13, 13 ), px, py);
                context.fillText(str[i].substr( 13, 13 ), px, py);
                py += 24;
                context.strokeText(str[i].substr( 26, 13 ), px, py);
                context.fillText(str[i].substr( 26, 13 ), px, py);
            }else if(strlen_ary[i]<=50){
                pt = 15;
                context.font= fontstyle[3];
                px = pxarray[p_ary[i]] + sp_x + (330 - sp_x - num_w[pt] * font_size[pt]) / 9 * x_ary[i];
                py = pyarray[p_ary[i]] + sp_y + (120 - sp_y - num_h[pt] * font_size[pt]) / 9 * y_ary[i];
                px = px + (start_x[p_ary[i]] - px) / movetime * x;
                py = py + (start_y[p_ary[i]] - py) / movetime * x;
                context.fillStyle = colorarray[col_ary[i]];
                context.strokeText(str[i].substr( 0, 13 ), px, py);
                context.fillText(str[i].substr( 0, 13 ), px, py);
                py += 24;
                context.strokeText(str[i].substr( 13, 13 ), px, py);
                context.fillText(str[i].substr( 13, 13 ), px, py);
                py += 24;
                context.strokeText(str[i].substr( 26, 13 ), px, py);
                context.fillText(str[i].substr( 26, 13 ), px, py);
                py += 24;
                context.strokeText(str[i].substr( 39, 13 ), px, py);
                context.fillText(str[i].substr( 39, 13 ), px, py);
            }
                
        }
 
 }
 
  if(x>0){
    x -= 1;
    }

}

 if(y<50){
 y+=1;
 }
  
   context.drawImage(chara, 350, 110,280,280);
        
      
    
 requestAnimationFrame(tick);
};
 
 
requestAnimationFrame(tick);



    </script>
        
     

        
{{--        <h1 class="text-center">{!! nl2br(e($pref->name)) !!}</h1> --}}
    <br>
         <hr class="style-six" />
        
    
        
    
    <?php $var = 1; $page = 1; ?>
    <?php 
    if(isset($_GET['page']) && is_numeric($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
} ?>
    
        @if (count($prefposts) == 0)
        まだ投稿がありません。</p>
        @endif
        
        @if (count($prefposts) > 0)
        @foreach ($prefposts as $prefpost)
         <span class="text-muted">
             {{$var+($page-1)*20 . '.　'}}posted at {{ $prefpost->created_at }}　IP:
             {!! nl2br(e(hash('adler32', $prefpost->ip_address))) !!}
         </span>
                <br>        
        <div class="box">
          <span class="text-info" style="font-size : xx-large; font-weight : bold" > 
          
                         {!! nl2br(e($prefpost->content)) !!}
        </span>
        </div>
                          <?php $var += 1; ?>
                          <hr class="style-six" />
                         @endforeach
        @endif
        </ul>
    {{-- ページネーションのリンク --}}
    {{ $prefposts->links() }}
    
    <br><br><br>
                         
        @include('commons.preflist')
        
        
        




@endsection