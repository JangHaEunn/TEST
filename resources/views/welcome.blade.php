<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
       <style>
            #main{
                width:300px;
                height:200px;
                border : 1px solid grey;
                margin:auto;
                margin-top : 300px;
                text-align:center;
                padding-top:50px;
                box-shadow: 0px 8px 6px -6px;
                border-radius:10px;
                background: rgb(245, 245, 247);
            }
            #main>.btn{
                box-shadow: 0px 8px 6px -6px;
                
            }
            
        </style>
    </head>
    <body class="antialiased">
    
        <div id="main"> 
              
       <h2><b>MAIN PAGE</b></h2>
          <button type="button" onclick="signUp()" class="btn btn-outline-primary">회원가입</button>
          <button type="button" onclick="login()" class="btn btn-outline-dark">로그인</button>
    
        </div>
              
        <script>
            function login(){
                location.href="user/login";
            }
            function signUp(){
                location.href="user/signUp";
            } 
        </script> 
    </body>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
</html>