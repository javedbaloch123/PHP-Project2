<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="\Websites\Barber_web\css files\header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="\Websites\Barber_web\css files\footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="\Websites\Barber_web\css files\church.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include "header.php";?>
   
    <section class="church-hero-section">
        <div class="video-container">
            <video autoplay loop muted playsinline class="hero-video">
                <source src="\Websites\Barber_web\images\58b75e1e32bd41d6ab7e130b9eeedbc6.mp4" type="video/mp4">
            </video>
        </div>
    </section>

    <div class="church-banner">
        <h1>WILD-GROWN PRODUCTS FOR WELL-GROOMED PEOPLE</h1>
        <div class="image-container">
            <h1>botanical barbershop</h1>
            <button>visit church barber</button>
        </div>
    </div>

    <div class="infinity-text-banner">
        <h1>SHOP OUR AWARD WINNING POMADES</h1>
    </div>

    <div class="church-banner-2">
        <h1>the holy grail of hair clays</h1>
    </div>
   
    <div class="church-banner-3">
        <h1>the holy grail of hair clays</h1>
    </div>

    <div class="church-banner-4">
        <h1>the holy grail of hair clays</h1>
    </div>

    <div class="church-container container">
         <div class="row m-0">
            <div class="col">
                <img src="\Websites\Barber_web\images\barbertested-01_400x_2e9debb0-85c4-411f-b42e-dbc69dde4ec2_200x.avif" alt="">
                <h2>100% botanical</h2>
                <p>Organic, wild crafted, and completely free of toxins, cheap chemicals and lab-made "fragrance".</p>
            </div>
            <div class="col">
                <img src="\Websites\Barber_web\images\barbertested-02_400x_df41f0b5-44a4-4d1e-80ea-c5cd941ff137_200x.avif" alt="">
                <h2>barbershop tested</h2>
                <p>Organic, wild crafted, and completely free of toxins, cheap chemicals and lab-made "fragrance".</p>
            </div>
            <div class="col">
                <img src="\Websites\Barber_web\images\barbertested-03_400x_983647f4-c689-43c8-a4f7-1a9275c2b4f1_200x.avif" alt="">
                <h2>performance gurantee</h2>
                <p>Organic, wild crafted, and completely free of toxins, cheap chemicals and lab-made "fragrance".</p>
            </div>
         </div>
    </div>

    <div class="church-container2">
        <div class="row m-0">
            <div class="col"><img src="\Websites\Barber_web\images\church-barber_1800x_d0fdecdd-2751-4cb5-8bb2-4695bf6aca44_800x.webp" alt=""></div>
            <div class="col">
                <h2>Get product updates</h2>
                <p>In-store at Church Barber you can experience our full line of grooming products, including products we're testing (like our botanical shave gel). Online, we'll be launching new products as they're perfected and ready for the world to enjoy. Sign up to be the first know about new products.</p>
                <div class="input-div">
                    <label for="">Email</label>
                    <input type="email">
                    <button>Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="\Websites\Barber_web\js files\header.js"></script>
</body>
</html>