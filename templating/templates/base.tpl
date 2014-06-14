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
    
        {block name=content}{/block}
    </div>
</body>
</html>