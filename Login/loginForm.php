<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="setail.css">
</head>
<body>
    <div class="header">
        <h1>LOGIN</h1>
    </div>
    <form action="loginMulti.php" method="post">
        <table>
            <tr>
                <td> Username : </td>
                <td> <input type="text" name="username" size="20" required> </td>
            </tr>
            <tr>
                <td> Password : </td>
                <td> <input type="password" name="password" size="20" required> </td>
            </tr>
            <tr>
                <td> &nbsp; </td>
                <td> <input type="submit" name="login" value="Login"> </td>
            </tr>
        </table>
    </form>
<br> Don't have an account yet? <a href="registerForm.php">Register Here</a>

</body>
</html>