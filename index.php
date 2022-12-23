<?php
include 'components/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Loading</title>
</head>
<body>
   <div class="container">
      <div class="text">
         Welcome Website Share knowledge

      <div class="ball"></div>
         <h1>Loading....<span  class="count"> 100%</span></h1>
      </div>
      <div class="loading">
         <div class="line-box">
            <div class="line"></div>
         </div>
      </div>
   </div>
</body>
</html>
<style>
   body{
      background:#1d2630;
      font-family: sans-serif;
   }
   .container{
      width:100%;
      min-height:100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
   }
   .ball{
     
      height:50px;
      width:50px;
      border-radius:50%;
      position:relative;
      top:250px;
      left:220px;
      animation:bounce 0.9s infinite;
   }
   .text{
      color: white;
      margin-bottom:25px;
      font-size:20px;
      letter-spacing:2px;
   }
   .loading{
      width:100%;
      height:auto;
      display:flex;
      justify-content: center;
      align-items: center;
   }
   .loading .line-box{
      padding:2px;
      width:40%;
      height:20px;
      border:2px solid #267591;
      border-radius:20px;
   }
   .loading .line-box .line{
      height:20px;
      border-radius:20px;
      background:#3388FF;
      animation:loading 2s forwards cubic-bezier(0,0,0,0);
   }
   @keyframes bounce{
      10%{
         height:50px;
         width:50px;
      }
      30%{
         height:40px;
         width:40px;
      }
      50%{
         height:30px;
         width:57px;
         transform: translateY(240px);
      }
      75%{
         height:50px;
         width:57px;
      }
      100%{
         transform: translateY(0px);
      }

   }
   @keyframes loading{
   0%{
      width:0%;
   }
   100%{
      width:100%
   }
}
</style>

</head>
<script type="text/javascript">
         var count =0;
         var counting = setInterval(function(){
            count++
            document.querySelector('.count').innerHTML = count + '%'
            if(count==100){
               clearInterval(counting);
               window.location.href="home.php";
            
            }
         },20);
      </script>
</body>
</html>