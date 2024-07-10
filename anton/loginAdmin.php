<html>
    <body>
    <hr>
    <h1>UC MAIN INTRAMURALS SYSTEM</h1>
    <hr>
    <form name = "form" action="login.php" onsubmit="return isvalid()" method="POST"><br>
            <label>username:</label>
            <input type = "text" name = "user"><br><br>
            <label>password:</label>
            <input type = "text" name = "pass"><br><br>
            <input type = "submit" value = "login" name = "submit" >
            <a href = "registration.php">sign up</a>
        </form>
    </body>
    <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
    </script>
</html>