<?php
	require_once ('Confiq.php');
	session_start();
    $q= "SELECT * FROM arts ORDER BY votes DESC limit 1";
    $result = mysqli_query($conn, $q);
    $row = mysqli_fetch_array($result);
    $img= $row['img'];
    $artist_id= $row['user_id'];

    $q1= "SELECT * FROM user_profile WHERE id='$artist_id'";
    $result1 = mysqli_query($conn, $q1);
    $row1 = mysqli_fetch_array($result1);
    $artist_name= $row1['name'];
    $dp= $row1['dp'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/28e6d5bc0f.js" crossorigin="anonymous"></script>
    <title>Art</title>
</head>
<body>


    <!-- Starts Nav code -->
 <nav>
    <div class="nav">
        <div class="left">
            <img src="../images/logo1.png" alt="">
            <span  onclick="window.location.href='index.php'">Home</span>
            <span onclick="window.location.href='#artSection'">Arts</span>
            <span onclick="window.location.href='#ourServices'">Our Services</span>
            <span onclick="window.location.href='#pricePlans'">Price Plan</span>
           
        </div>
        <div class="right">
			<span onclick="window.location.href='login.php'">Log in</span>
            <span onclick="window.location.href='signup.php'">Sign up</span>
        </div>
    </div>
</nav>
<!-- Ends Nav code -->


<div class="slider">
    <img src="arts/<?php echo $img?>" alt="" id="sliderImg" class="image1">
    <img src="userDP/<?php echo $dp?>" alt="" id="sliderImg" class="image2">
</div>


<main>
    <!-- <div class="search-area">
        <span class="search-icon" style="padding-top: 5px; padding: 0;"><i class="fas fa-search" style="color: #b1b1b1;"></i></span>
        <input type="search" name="" id="searchInput" placeholder="Search">
    </div>
    <div style="width: fit-content; margin: auto; margin-bottom: 20px;" >
        <button id="searchBtn" class="searchBtn">Search Art</button>
    </div>

    <div class="btn" id="btn">
        <button>All</button>
        <button>Nature</button>
        <button>People</button>
        <button>Street</button>
        <button>Still Life</button>
    </div> -->

    <div class="outerArt" id="artSection">
        <div class="artContainer">
            <div>
                <div>
                    <img src="../images/girl2.jpg" style="width: 250px; height: 450px;" alt="">
                </div>
                <div>
                    <img src="../images/girl3.jpg" style="width: 250px; height: 250px;" alt="">
                </div>
            </div>
            <div>
                <div>
                    <img src="../images/girl5.jpg" style="width: 250px; height: 220px;" alt="">
                </div>
                <div>
                    <img src="../images/girl4.jpg" style="width: 250px; height: 420px;" alt="">
                </div>
            </div>
            <div>
                <div>
                    <img src="../images/girl1.jpg" style="width: 250px; height: 205px;" alt="">
                </div>
                <div>
                    <img src="../images/girl6.jpeg" style="width: 250px; height: 225px;" alt="">
                </div>
                <div>
                    <img src="../images/girl7.png" style="width: 250px; height: 200px;" alt="">
                </div>
            </div>
            <div>
                <div>
                    <img src="../images/girl8.jpg" style="width: 250px; height: 210px;" alt="">
                </div>
                <div>
                    <img src="../images/girl9.jpg" style="width: 250px; height: 450px;" alt="">
                </div>
            </div>
        </div>
    </div>


    



    <div class="services" id="ourServices">
        <div class="head">
            <h1>Our Services</h1>
            <p>We are always ready for best services.</p>
            <div style="display: flex; align-items: center;">
                <hr>
                ✦
                <hr>
            </div>
        </div>

        <div class="service">
            <div>
                <img src="../images/artist.jpg" alt="">
            </div>
            <div>
                <h1>Artists</h1>
                <p>Artist are in control of their own world. As an artist your online brand should be in your control too. Whether you’re a painter, designer, photographer, or musician, it’s important that your talent is well represented on both social media and your website. Fortunately, Art Patio has made it easier and more affordable for creative professionals to share their portfolios online. By this platform you will be able to showcase your ideas and creativity to the whole world</p>
                <!-- <button>View Arts</button> -->
            </div>
        </div>
        <div class="service">
            
            <div>
                <h1>Customer</h1>
                <p>Are you a fan of art and appreciate works and beautiful things? Then, its the perfect platform for you. There are thousands of works that expresses emotions,moods and stories in a large aspect. To enjoy a larger than life experience go ahead and check out our platform so that you can encounter with your favorite art, artist or gallery..</p>
                <!-- <button>View Gallery</button> -->
            </div>
            <div>
                <img src="../images/customer.webp" alt="">
            </div>
        </div>
        <div class="service">
            <div>
                <img src="../images/artGallery.jpg" alt="">
            </div>
            <div>
                <h1>Gallery</h1>
                <p>To showcase and represent arts virtually Art Patio is the ideal platform. Here you can engage with potential customers and artist. Gallry can also be exhibited and open to the public for viewing.</p>
                <button>View Arts</button>
            </div>
        </div>
    </div>



    <div class="pricePlan">
        <div class="planHead">
            <h1 style = "font-family: 'Varela Round', sans-serif;">Pricing Plans</h1>
            <div style="display: flex; align-items: center ;gap:5px; justify-content: center; margin: 0">
                <hr>
                <span style="font-family: Arial, Helvetica, sans-serif;">o</span>
                <hr>
            </div>
            <div style="width: 50%; margin:auto;">
			<p style="color: rgb(61, 61, 61); letter-spacing: 2px ">Try to establish strong bond with us. Here is our subscription plan.</p>
			</div>
        </div>
        
        <div class="priceCardContainer" id="pricePlans">

            <div class="priceCard">
                <div style=" margin-top: 0; margin-bottom: 0; width: fit-content; height: 15px; ">
                    <img src="../images/coffee.png" alt="" style="width: 60px; position: relative; top: -33px; bottom: 0; background-color: #e8e4e4; border-radius: 39px;">
                </div>
                <div style="width: 100%;">
                    <h2>Basic</h2>
                    <h2>Free <span>Normal</span></h2>
                    <hr style="width: 100%">
                </div>
                <div>
                    <p>Art Inspect</p>
                    <p>Event Inspect </p>
                    <p>Unlimited Buy</p>
                    <p>Voting Arts</p>
                    <p>Buying Tickets</p>
                </div>
                <div class="btn">
                    <button>Purchase</button>
                </div>
            </div>

            <div class="priceCard">
                <div style=" margin-top: 0; margin-bottom: 0; width: fit-content; height: 15px; ">
                    <img src="../images/love.png" alt="" style="width: 60px; position: relative; top: -33px; bottom: 0; background-color: #e8e4e4; border-radius: 39px;">
                </div>
                <div style="width: 100%; margin: 0 0;">
                    <h2>Prime</h2>
                    <h2>$500 <span>Monthly</span></h2>
                    <hr style="width: 100%">
                </div>
                <div>
                     <p>Art Inspect</p>
                    <p>Event Inspect </p>
                    <p>Unlimited Buy</p>
                    <p>Tutorial View</p>
                    <p>Profile Wise benefite</p>
                </div>
                <div class="btn">
                    <button>Purchase</button>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="logo">
            <img src="../images/logo1.png" alt="" class="logoPic">
            <span>Dribbble is the world’s leading community for creatives to share, grow, and get hired. </span>
            <div style="display: flex; flex-direction:column; gap:10px; align-items:center;">
                <div>
                    <h2 style="margin:0; color:white; font-size: 17px;">Connected Us With</h2>
                </div>
                <div style="display: flex; gap: 20px; align-items: center;">
                    <a href="facebook.com"><img src="../images/facebook-f.svg" alt="" style="width: 8px; background-color: white; padding:8px 12px;"></a> 
                    <img src="../images/linkedin-in.svg" alt="" >
                    <img src="../images/google.svg" alt="">
                    <img src="../images/linkedin-in.svg" alt="" >
                </div>
            </div>
        </div>
    </footer>


</main>







    
    
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Offside&display=swap');
  *{
    font-family: 'Offside', cursive;
  }
    body{
        margin: 0;
        padding: 0;
        background-color: #F3F3F4;
    }

    .nav{
        width: 100%;
        height: 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #000;
        box-shadow:0 0 15px #a5a5a5;
		/* position: fixed; */
    }
    nav .left, .right{
        display: flex;
        gap: 18px;
        align-items: center;
        margin-right: 15px;
    }
    nav .left img{
        width: 200px;
    }
    nav .right img{
        width: 35px;
        height: 35px;
        cursor: pointer;
        border-radius: 50px;
    }
    nav .left span{
        color: rgb(237, 234, 234);
        cursor: pointer;
        font-weight: 600;
		padding: 0 20px;
        
    }
    nav .right span{
        color: rgb(237, 234, 234);
        cursor: pointer;
        font-weight: 600;
		padding: 0 20px;
    }
    nav .left span:hover, .right span:hover{
		padding: 15px 30px;
        background-color: white;
        color: black;
    }
    nav .right .search-area{
        display: flex;
        align-items: center;
        position: relative;
    }
    nav .right .search-area span{
        position: absolute;
        left: .8rem;
    }
    nav .right .search-area input{
        padding: 12px;
        padding-left: 40px;
        width: 15vw;
        border: none;
        border-radius: 10px;
        background-color: #f2efef;
        font-size: 17px;
    }
    nav .right .search-area input:hover{
        background-color: #fff;
        border: 4px solid rgba(248, 178, 166, 0.2);
    }
    nav .right button{
        border: none;
        padding: 10px 22px;
        border-radius: 10px;
        background-color: white;
        color: #5FB090;
        font-size: 1rem;
        cursor: pointer;
    }
    nav .right button:hover{
        background-color: #5FB090;
        color: white;
        border: 2px solid black;
        margin: 0;
    }

    /* Ends Nav code */



    .slider {
        width: 100%;
        position: relative;
        display: inline-block;
    }
    
    .slider .image1{
        width: 100%;
        height: 650px;
        transition: transform 0.2s ease-in-out;

    }
    .slider .image2{
        position: absolute;
        bottom: -50px;
        left: 47%;
        width: 130px;
        height: 130px;
        border: 5px solid white;
        border-radius: 100%;
    }


    main{
        background-color: white;
        height: 700px;
    }
    main .search-area{
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        top: -33px;
    }
    main .search-area span{
        position: relative;
        left: 2.9rem;
    }
    main .search-area input{
        padding: 12px;
        padding-left: 60px;
        width: 40vw;
        height: 65px;
        border: none;
        border-radius: 10px;
        background-color: #fff;
        box-shadow:0 0 15px #4b4b4d;
        font-size: 17px;
    }
    main .btn{
        display: flex;
        gap: 20px;
        align-items: center;
        justify-content: center;
    }
    
    main .btn button{
        padding: 12px 33px;
        cursor: pointer;
        border: none;
        background-color: #222222;
        color: white;
        border-radius: 10px;
    }
    main .btn button:hover{
        background-color: rgb(202, 196, 196);
        color: #000;
        transition: transform 0.2s ease-in-out;
        transition: .5s;
    }
    .searchBtn{
        padding: 12px 33px; cursor: pointer; border: none; background-color: transparent; color: black; border: 1px solid black;
        border-radius: 10px;
    }
    .searchBtn:hover{
        background-color: black;
        color: white;
    }


    main .outerArt{
        margin-top: 50px;
        background-image: url(../images/background1.jpg);
        background-size: cover;
        background-repeat:repeat;
    }
    main .outerArt .artContainer{
        width: 95%;
        display: flex;
        gap: 0px;
        justify-content: center;
        align-items: center;
        padding-top: 80px;
        cursor: pointer;
        /* background-color: #5FB090; */
    }
    main .outerArt .artContainer>div{
        width: 24%;
        display: block;
    }
    main .outerArt .artContainer div div img{
        border: 28px solid white;
        transition: transform 0.4s ease-in-out;
        
    }
    main .outerArt .artContainer div div img:hover{
        transform: scale(1.1);
    }
    main .outerArt .artContainer div div{
        margin: 20px 0;
        width: fit-content;
        border-right: 15px solid black;
        border-bottom: 15px solid black;
        border-top: 20px solid #2E2E2E;
        border-left: 20px solid #2E2E2E;
        box-shadow:0 0 20px #363636;
    }

    main .pricePlan{
        background-image: url("../images/wall2.avif");
        background-size:cover;
        background-repeat: no-repeat;
        width: 100%;
    }
    main .pricePlan .planHead{
        width: 70%;
        padding: 40px;
        margin:  auto;
        text-align: center;
    }
    main .pricePlan .planHead hr{
       width: 10%;
       margin: 0;
    }
    main .pricePlan .priceCardContainer{
        padding: 10px 10px 80px;
        display: flex;
        justify-content: center;
		gap: 50px;
        width: 85%;
        margin: 20px auto 50px;
    }
    main .pricePlan .priceCardContainer .priceCard{
        cursor: pointer;
        width: 22%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        border: 1px solid rgb(148, 146, 146);
        background-color: white;
    }
    main .pricePlan .priceCardContainer .priceCard div{
        width: fit-content;
        margin: auto;
    }
    main .pricePlan .priceCardContainer .priceCard div:nth-child(2){
        color: rgb(88, 87, 87);
    }
    main .pricePlan .priceCardContainer .priceCard  h2, p{
        text-align: center;
        margin: 26px 0;
    }
    main .pricePlan .priceCardContainer .priceCard  h2 span{
        font-size: 13px;
    }
    main .pricePlan .priceCardContainer .priceCard .btn{
        width: 100%;
    }
    main .pricePlan .priceCardContainer .priceCard .btn button{
        width: 100%;
        border-radius: 0;
        background-color: #000;
        font-size: 18px;
    }
    main .pricePlan .priceCardContainer .priceCard .btn button:hover{
        background-color: #1AB8A6;
        border-color: #1AB8A6;
        color: white;
    }




    main .services{
        width: 100%;
        background-color: #000;
        color: white;
        margin-top: 70px;
        padding-top: 40px;
        padding-bottom: 40px;
        text-align: center;
    }
    main .services .head{
        width: fit-content;
        margin: 0 auto 50px;
        
    }
    main .services .head hr{
        width: 40%;
    }
    main .services h1{
        font-family: 'Varela Round', sans-serif;
        font-size: 50px;
        margin: 0;
    }
    main .services p{
        color: gray;
        margin: 10px;
        letter-spacing: 0;
    }
    main .services .service{
        width: 92%;
        margin: 40px auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    main .services .service div{
        width: 47%;
    }
    main .services .service div img{
        width: 100%;
    } 
    main .services .service div p{
        font-family: 'Varela Round', sans-serif;
        text-align: center;
    }
    main .services .service div button{
        margin: 50px;
        padding: 12px 38px;
        cursor: pointer;
        border: none;
        border-radius: 10px;
        font-size: 16px;
    }
    main .services .service div button:hover{
        background-color: #1AB8A6;
        color: white;
    }


    footer{
        background-color: #000;
        padding: 20px 0;
        display: flex;
        gap: 50px;
        width: 100%;
        justify-content: center;
        bottom: 0;
        margin-top: 40px;
        
    }
    footer .logo{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        gap: 20px;
        margin-left: 20px;
    }
    footer .logoPic{
        width: 200px;
        cursor: pointer;
    }
    footer .logo div img{
        width: 10px;
        cursor: pointer;
        background-color: white; 
		padding:8px 12px;
		border-radius: 12px;
    }
    footer .logo span{
        color: rgb(222, 219, 219);
        margin-bottom: 10px;
    }
    
    
    

</style>


<script>
    
    const collection = document.querySelector("#btn");
    const allElements = collection.querySelectorAll('*');
    

    for(let i = 0; i<allElements.length; i++){
        allElements[i].addEventListener('click', function() {
            document.getElementById("searchInput").value = allElements[i].outerText;
        // console.log();
        // console.log();

    });
    }
    let x = 1;
    function nextSlide(){
        if(x>3){
            x=1;
        }
        document.getElementById("sliderImg").src = "file:///F:/new/images/slider"+x+".jpg";
        document.getElementById("sliderImg").style.transitionDelay = "2s";
        x++;
    }
    setInterval(nextSlide, 2000);

    


</script>