<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>

    {*    CSS'o uzloadininmas*}
    {block name="css"}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a class="active" href="/FilmRental">Home</a>
    </div>
</header>
<main>
    <div class="not-found-block">
        {foreach $filmDetails as $data}
            <h1>{$data.title}</h1>
            <h2>{$data.release_year}</h2>
            <table style="margin: 0 auto">
                <tr>
                    <td>Rental price:</td>
                    <td>{$data.rental_rate} USD</td>
                </tr>
                <tr>
                    <td>Rental duration:</td>
                    <td>{$data.rental_duration} days</td>
                </tr>
                <tr>
                    <td>Release year:</td>
                    <td>{$data.release_year}</td>
                </tr>
                <tr>
                    <td>Length:</td>
                    <td>{$data.length} minutes</td>
                </tr>
                <tr>
                    <td>Rating:</td>
                    <td>{$data.rating}</td>
                </tr>
                <tr>
                    <td>Special features:</td>
                    <td>{$data.special_features}</td>
                </tr>
            </table>
            <h3>About:</h3>
            <p>{$data.description}</p>
        {/foreach}
    </div>
</main>
</body>
</html>