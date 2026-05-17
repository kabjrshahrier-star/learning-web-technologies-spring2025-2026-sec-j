<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<h2>Signup</h2>

Username: <input type="text" id="username" name="username"><br><br>
Password: <input type="password" id="password" name="password"><br><br>

<input type="button" value="Signup" onclick="signupAjax()">
<a href="login.php">Login</a>

<p id="msg" style="color:red;"></p>

<script>
function signupAjax(){

    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    let data = {
        username: username,
        password: password
    };

    let jsonData = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/signupCheck.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.send('user=' + jsonData);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

            let response = JSON.parse(this.responseText);

            if(response.status == "success"){
                document.getElementById('msg').style.color = "green";
                document.getElementById('msg').innerHTML = response.message;

                setTimeout(function(){
                    window.location.href = response.location;
                }, 1000);

            }else{
                document.getElementById('msg').style.color = "red";
                document.getElementById('msg').innerHTML = response.message;
            }
        }
    }
}
</script>

</body>
</html>