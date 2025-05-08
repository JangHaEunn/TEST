<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        #loginPage{
            width:300px;
            height:400px;
            margin:auto;
            margin-top:100px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            padding:20px;
        }
       
    </style>
</head>
<body>
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    <div id="loginPage">
        <form action="{{route('login-user')}}" method="post">
        @csrf
            <p style="text-align:center; font-size:20px;">로그인</p>
            아이디 <br> 
            <input type="text" name="userId" value="{{old('userId')}}"  class="form-control">
            <span class="text-danger">@error('userId') {{$message}} @enderror</span><br>
            비밀번호 <br>
            <input type="password" name="password" class="form-control">
            <span class="text-danger">@error('password') {{$message}} @enderror</span><br><br>
            <button class="btn btn-primary " type="submit" style="width:255px; margin-bottom:10px;">로그인</button><br>
            <a href="signUp" class="btn btn-outline-dark" style="width:255px;">회원가입</a>
        </form>
    </div>
    <script>
        
     
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>