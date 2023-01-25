<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Film Page</title>

    {*    CSS'o uzloadininmas*}
    {block name="css"}
        <link rel="stylesheet" href="./src/Public/Assets/css/style.css" media="all" />
    {/block}

    {*    JS uzloadinimas*}
    {block name="js"}
        <script src="./src/Public/Assets/js/script.js"></script>
    {/block}
</head>
<body>
<header>
    <div class="topnav">
        <a active href="/toDoWithDataBase">Home</a>
        <a href="/toDoWithDataBase/new">Create</a>
    </div>
</header>
<main>
    <div class="not-found-block">
        <h1>FILM PAGE</h1>
    </div>
</main>
</body>
</html>