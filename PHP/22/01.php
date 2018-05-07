<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/6603c9fd94.js"></script>
</head>

<body>
    <div id="container">
        <form action="01-login.php" method="post">
            <input name="user" placeholder="Login">
            <input name="pass" placeholder="Password" type="password">
            <button>Login</button>
        </form>

        <button onclick="login()">Login AJAX</button>
    </div>
    <p></p>

    <script>
        function login() {
            $('p').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Connecting...</span>');

            $.post('01-login.php', {
                user: $('input[name="user"]').val(),
                pass: $('input[name="pass"]').val()
            }).done(function(resp) {
                if (resp.success) {
                    $('#container').empty();
                    $('p').html('Prisijungta');
                    lentele();
                } else {
                    $('p').html(resp.error)
                }
            });
            
        }

        function lentele() {
            //TODO
        }
    </script>
</body>
</html>