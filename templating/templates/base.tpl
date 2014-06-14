<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inspira-T{block name=title}{/block}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <!-- Add custom CSS here -->
    <link href="/media/css/inspira.css" rel="stylesheet">
    <link href="/media/css/font-awesome.min.css" rel="stylesheet">


    {block name=head}{/block}
</head>
<body>
    <div class="container">
        {messages}

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header main">
                    <a class="navbar-brand" href="#">
                        <img width="150px" height="50px" src="/media/images/logo.png" alt="">
                    </a>
                </div>
                <div class="navbar-header user row">
                        <a class="col-xs-4" href="#">
                            <i class="fa fa-user"></i><span>Perfil</span>
                        </a>
                         <a class="col-xs-4"  href="#">
                            <i class="fa fa-list"></i><span>Actividades</span>
                        </a>
                         <a class="col-xs-4" href="#">
                            <i class="fa fa-comment-o"></i><span>Muro</span>
                        </a>
                </div>
            </div>
            <header class="header-main">
                Proximas actividades
            </header>
        </nav>
    
        {block name=content}{/block}
    </div>
</body>
</html>