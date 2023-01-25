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
        <h1>{$actor.first_name} {$actor.last_name}</h1>

        <h3>Films starred in:</h3>
            <table style="margin: 0 auto">
                <tr>
                    <th>Title</th>
                    <th>Release Year</th>
                    <th>Description</th>
                </tr>
                {foreach $allActorDetails as $data}
                    <tr>
                        <td>{$data.title}</td>
                        <td>{$data.release_year}</td>
                        <td><span>{$data.description}</span></td>

                        <td class="no-border">
                            <form method="post" action="/FilmRental/film-details" id="film-details-{$data.film_id}">
                                <input type="hidden" name="film_id" value="{$data.film_id}">
                                <button type="submit" form="film-details-{$data.film_id}" class="btn"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                            </form>
                        </td>

                    </tr>
                {/foreach}
            </table>
    </div>
</main>
</body>
</html>