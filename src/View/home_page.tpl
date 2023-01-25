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
      <h1>HOME PAGE</h1>
        <form method="post" action="/FilmRental/search" id="search-input">
            <input type="text" name="search-input" required placeholder="Search actor ...">
            <button type="submit" form="search-input" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        {if $allActorData}
            <table style="margin: 0 auto">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                {foreach $allActorData as $data}
                    <tr>
                        <td>{$data.id}</td>
                        <td>{$data.first_name} {$data.last_name}</td>

                        <td class="no-border">
                            <form method="post" action="/FilmRental/actor-details" id="actor-details-{$data.id}">
                                <input type="hidden" name="actor_details_id" value="{$data.id}">
                                <button type="submit" form="actor-details-{$data.id}" class="btn"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                            </form>
                        </td>

                    </tr>
                {/foreach}
            </table>
        {else}
            <h2>No Results</h2>
        {/if}
    </div>
</main>
</body>
</html>