<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        #signPage{
            width:400px;
            height:700px;
            margin:auto;
            margin-top:50px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            padding:20px;
        }

        .red{
            color:red;
        }
       
    </style>
</head>
<body>

    <div id="signPage">
        <form action="{{route('signUp-user')}}" method="post">
            @csrf
        <span class="red">*</span>아이디 <br>
        <input type="text" id="id" name="userId" class="form-control" oninput="valid(event)">
        <span class="text-danger">@error('userId') {{$message}} @enderror</span><br>
        <span class="red">*</span>패스워드<span class="red" style="font-size:small"> 최소 6자리 최대 15자리 입니다.</span> <br>
        <input type="password" id="pwd" name="password"  class="form-control" placeholder="특수문자를 포함하여 입력해주세요.">
        <span class="text-danger">@error('password') {{$message}} @enderror</span><br>
        <span class="red">*</span>패스워드 확인 <br>
        <input type="password" id="pwdCheck" name="pwdCheck"  class="form-control">
        <span class="text-danger">@error('pwdCheck') {{$message}} @enderror</span><br>
        <span class="red">*</span>이름 <br>
        <input type="text" name="name" class="form-control">
        <span class="text-danger">@error('name') {{$message}} @enderror</span><br>
        <span class="red">*</span>생년월일 <br>
        <input type="date" name="birth" class="form-control">
        <span class="text-danger">@error('birth') {{$message}} @enderror</span><br>
        
        <input type="hidden" name="email" id="email" >
        <span class="red">*</span>이메일<br>
        <div class="d-flex align-items-center">
            <input type="text" name="emailId" id="emailId" onchange="emailCheck()" class="form-control" >
            <span class="input-group-text">@</span>
            <select name="emailDomain" id="emailDomain" onchange="emailCheck()" class=" form-select ">
                <option value="">선택</option>
                <option value="@naver.com">naver.com</option> 
                <option value="@google.com">google.com</option> 
                <option value="@hanmail.net">hanmail.net</option>
                <option value="@yahoo.com">yahoo.com</option>  
            </select><br>
        </div>
        <span class="text-danger">@error('email') {{$message}} @enderror</span><br>
        
    
        <span style="color:red;">*</span>약관동의 
        <label for="agreement1" style="display: block; cursor: pointer;">
            <div class="d-flex align-items-center">
                <div style="border : 1px solid black; width:350px; text-align:center; margin:0px 3px 3px 0px;">개인(신용)정보의 수집·이용에 관한 사항 (필수)</div>
                <input type="checkbox" name="agreement1" id="agreement1" onclick="cb()"><br>
            </div>
        </label>
        <label for="agreement2" style="display: block; cursor: pointer;">
            <div class="d-flex align-items-center">
                <div style="border : 1px solid black; width:350px; text-align:center; margin:0px 3px 3px 0px;">서비스 이용에 관한 사항 (필수)</div>
                <input type="checkbox" name="agreement2" id="agreement2" onclick="cb()"><br>
            </div>
        </label>
        <button type="submit" id="check" disabled class="btn btn-outline-dark" style="width:355px; margin-top:10px;">회원가입</button>
        
        </form>
    </div>
    <script>
        function emailCheck() 
        {
            $emailId = document.getElementById("emailId").value;
            $emailDomain = document.getElementById("emailDomain").value;
            document.getElementById("email").value = $emailId+$emailDomain;
        }

        function cb()
        {
            $agreement1 = document.querySelector('input[name=agreement1]:checked');
            $agreement2 = document.querySelector('input[name=agreement2]:checked');
            if($agreement1 && $agreement2)
            {
                $agreement1.value = "check";
                $agreement2.value = "check";
                document.getElementById("check").disabled = false;
            }
            else
            {
                document.getElementById("check").disabled = true;
            }
        }

        function valid(e) 
        {
            const idVaild = e.target;
            idVaild.value = idVaild.value.toLowerCase().replace(/[^a-z0-9]/g, '')
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>