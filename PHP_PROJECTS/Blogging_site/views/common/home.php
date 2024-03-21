<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    
    <link rel="stylesheet" href="../../public/css/csshome.css">
    <!-- <link rel="stylesheet" href="../../public/css/style1.css"> -->

    <title>My Homepage</title>

</head>
<body>
    <!-- adding navbar file -->
    <?php require_once('navbar.php') ?>

    <main class="container p-4 ">
        <h1 class="text-center mb-5" style="color:black;">Welcome to My Homepage</h1>
        <div class="m-0">
            <div class="container p-4 shadow-lg m-2 rounded "  >
                <p style="color:black; font-size:x-large">What Makes a Great Blog?</p>
                <p>Typically, you can expect to find the following elements in successful blogs:</p>
                <div style="color:black;">
                    <p><span >Blog content : </span> The content should demonstrate expertise, authoritativeness, and trustworthiness (EAT). It is also important to use easy-to-understand language and formatting to make the blog post digestible.</p>
                    <p><span >Inviting headlines :</span> These reveal what the content is about and help attract visitors to the content, as around 80% of people will click search engine results if the headlines are compelling.</p>
                    <p><span >Regularly-updated content : </span> A regular publishing schedule helps people know when to visit the blog for new content. Search engines also prioritize fresh and up-to-date content, helping increase rankings and website traffic.</p>
                    <p><span >Smooth user experience (UX) : </span> Other than attractive design, great blogs generally have a seamless page experience as it is an important element in blog search engine optimization (SEO). It includes mobile friendliness, HTTPS, and loading speed – including improving Core Web Vitals, the performance metrics assessing how good user experience is.</p>
                </div>       
            </div>
            
            <div class="container p-4 shadow-lg m-2 rounded">
                <p style="color:black; font-size:x-large">7 Types of Blogs</p>
                <div style="color:black;">
                    <p>Now that you have learned the definition of blogging and what makes a blog successful, let’s discuss the seven common types of blogs :</p>
                    <p>Personal blog. This type of blog usually works like an online diary where the blogger shares opinions, often not aiming to reach a target audience or sell an item. Personal blogs can discuss various subjects, from family events and self-reflection to work projects.</p>
                    <p>Niche blog. Provides information on a particular topic, usually related to the blogger’s passions, skills, and knowledge. Examples of this blog type include book blogs, food blogs, and lifestyle blogs.</p>
                    <p>Multimedia blog. It uses a blog format but publishes multimedia content, like videos and podcasts, instead of written posts. It also usually includes the video or podcast’s summary, table of contents, and essential quotes.</p>
                    <p>News blog. Content on this blog focuses on the latest happenings and new releases in a specific industry. Unlike other blogs, news blogs typically do not usually include opinions or personal content.</p>
                    <p>Company or business blog. Its primary purpose is publishing content relevant to a company’s industry or updating the target market regarding any changes within its business. It may be a section on a company website or an independent site.</p>
                    <p>Affiliate blog. A blog based on affiliate marketing – the practice of promoting a third party’s products and services. Affiliate blog owners will receive a commission when someone purchases from their custom links. Typical articles on this blog include product reviews and “best-of” listicles.</p>
                    <p>Reverse blog. Also known as group blogs, multiple authors create blog posts on related topics and the blog owner is the one who proofreads and posts content.</p>
                </div>       
            </div>
        </div>
    </main>
    <br><br>
    <!-- adding footer file -->
    <?php require_once('footer.php') ?>
</body>
</html>