<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel="stylesheet" href="../../public/css/home1.css">
    <!-- <link rel="stylesheet" href="../../public/css/style.css"> -->
    <link rel="stylesheet" href="../../public/css/style2.css">
    <title>My Homepage</title>
</head>
<body>
<section>
    <!-- adding navbar file -->
    <?php require_once('navbar.php') ?>

    <main class="container p-4 ">
        <h1 class="text-center mb-5">Welcome to My Homepage</h1>
        <div class="container" style="width:50%">
            <h3>What Makes a Great Blog?</h3>
            <p>Typically, you can expect to find the following elements in successful blogs:</p>
            <div>
                <div>
                    <strong style="color:black;">blog content.</strong> The content should demonstrate expertise, authoritativeness, and trustworthiness (EAT). It is also important to use easy-to-understand language and formatting to make the blog post digestible.
                    <strong style="color:black;">Inviting headlines.</strong> These reveal what the content is about and help attract visitors to the content, as around 80% of people will click search engine results if the headlines are compelling.
                </div>
                <div>
                    <strong style="color:black;">Regularly-updated content.</strong> A regular publishing schedule helps people know when to visit the blog for new content. Search engines also prioritize fresh and up-to-date content, helping increase rankings and website traffic.
                    <strong style="color:black;">Smooth user experience (UX).</strong> Other than attractive design, great blogs generally have a seamless page experience as it is an important element in blog search engine optimization (SEO). It includes mobile friendliness, HTTPS, and loading speed – including improving Core Web Vitals, the performance metrics assessing how good user experience is.
                </div> 
</div>         
        </div>
    </main>

        <div class='air air1'></div>
        <div class='air air2'></div>
        <div class='air air3'></div>
        <div class='air air4'></div>

    <!-- adding footer file -->
    <?php require_once('footer.php') ?>
</section>
</body>
</html>