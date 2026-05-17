<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

Username: <input type="text" id="username" name="username"><br><br>
Password: <input type="password" id="password" name="password"><br><br>

<input type="button" value="Login" onclick="loginAjax()">
<a href="signup.php">Signup</a>

<p id="msg" style="color:red;"></p>

<script>
function loginAjax(){

    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    let data = {
        username: username,
        password: password
    };

    let jsonData = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/loginCheck.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.send('user=' + jsonData);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

            let response = JSON.parse(this.responseText);

            if(response.status == "success"){
                window.location.href = response.location;
            }else{
                document.getElementById('msg').innerHTML = response.message;
            }
        }
    }
}
</script>

</body>
</html>