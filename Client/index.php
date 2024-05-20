<?php
    session_start();

    $loggedIn= $_SESSION['loggedIn'] ?? false;




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul class="sidebar">
                <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="#">Home</a></li>
                <li><a href="./CarList/carList.php">Cars</a></li>
                <li><a href="#aboutUs">About Us</a></li>
                <?php if($loggedIn): ?>
                    <li class="hideOnMobile joinStyle"><a href="./html/login.php">Hello, <?=$_SESSION['user']['prenom'] ?></a></li>
                    <?php else: ?>
                        <li class="hideOnMobile joinStyle"><a href="./html/login.php">Join us</a></li>
                <?php endif ?>
            </ul>
    
            <ul>
                <li><a href="#">C K E I</a></li>
                <li class="hideOnMobile"><a href="#">Home</a></li>
                <li class="hideOnMobile"><a href="./CarList/carList.php">Cars</a></li>
                <li class="hideOnMobile"><a href="#aboutUs">About Us</a></li>
                <?php if($loggedIn): ?>
                    <li class="hideOnMobile joinStyle"><a href="./html/login.php">Hello, <?=$_SESSION['user']['prenom'] ?></a></li>
                    <?php else: ?>
                        <li class="hideOnMobile joinStyle"><a href="./html/login.php">Join us</a></li>
                <?php endif ?>
                <li class="menu-button" onclick=showSidebar()><a href="#"><svg class="svgIcon" xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>
            
        </nav>
        <div class="greetingContainer">
            <p class="greetingInfo">Welcome to</p>
            <p class="greetingValue">CKEI PLACE</p>
            <div class="greetingBtn">
                <a class="greetingBtnLink" href="./CarList/carList.php">
                    <!-- <p> -->
                        Look cars
                    <!-- </p> -->
                </a>
            </div>
        </div>

    </header>
    <main>
        <div class="logoContainer">
            <div class="logo-slide">
                <img src="./image/logo1.png"/>
                <img src="./image/logo2.png"/>
                <img src="./image/logo3.png"/>
                <img src="./image/logo4.png"/>
                <img src="./image/logo5.png"/>
                <img src="./image/logo6.png"/>
                <img src="./image/logo7.png"/>
                <img src="./image/logo8.png"/>
                <img src="./image/logo9.png"/>
                <img src="./image/logo10.png"/>
            </div>
            <!-- <div class="logo-slide">
                <img src="./image/logo1.png"/>
                <img src="./image/logo2.png"/>
                <img src="./image/logo3.png"/>
                <img src="./image/logo4.png"/>
                <img src="./image/logo5.png"/>
                <img src="./image/logo6.png"/>
                <img src="./image/logo7.png"/>
                <img src="./image/logo8.png"/>
                <img src="./image/logo9.png"/>
                <img src="./image/logo10.png"/>
            </div> -->

        </div>
        <section>
            <div class="globalInfo">
                <div class="globalInfoCont">
                    <div class="nameCarContainer">
                        <h1 class="nameCar">Mercedes-Benz</h1>
                    </div>
                    <div class="descContainerCont">
                        <div class="descContainer">
                            <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel nulla ac turpis porta commodo eget sit amet sapien. Vivamus finibus nibh et sollicitudin pretium. In mollis erat non tellus.</p>
                        </div>
                    </div>
        
                    <div class="optionsContainer">
                        <div class="firstContainer">
                            <div class="firstOption">
                                <img src="./image/compteur-de-vitesse.png" />
                                <p class="vitesseValue">190 Km/h</p>
                            </div>
                            <div class="secondOption">
                                <img src="./image/moteur-turbo.png" />
                                <p class="turboValue">220 KM</p>
                            </div>
                        </div>
                        <div class="secondContainer">
                            <div class="thirdOption">
                                <img src="./image/manual-transmission.png" />
                                <p class="transmissionValue">Manual</p>
                            </div>
                            <div class="fourthOption">
                                <img src="./image/gas-station.png" />
                                <p class="gasValue">EV</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="priceButton">
                        <div class="globalBtn">
                            <p class="globalBtnText">Rent now</p>
                            <img src="./image/next.png" alt="arrow" />
                        </div>
                        <div class="globalPrice">
                            <p class="globalPriceValue">149 DT</p>
                            <p class="globalPriceInfo">per day</p>
                        </div>
                    </div>
    
                </div>
            </div>
            <div class="containImage">
                <div class="imageContainer">
                    <img class="carImage" src="./image/pngfind.com-car-front-png-218600.png" alt="car image"/>
                </div>
                <div class="arrowContainer">
                    <div onclick=previousCar() class="arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
                    </div>
                    <div onclick=nextCar() class="arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg>
                    </div>
    
                </div>
            </div>

        </section>

        <div class="homeInfo">
            <div class="infoTitle">
                <p class="inforTitleValue">3 reason why you</p>
                <p class="inforTitleValue">Should rent a car from us:</p>
            </div>
            <div class="elements">
                <div class="element">
                    <img src="https://themes.muffingroup.com/be/carrental2/wp-content/uploads/2019/09/carrental2-home-icon4.png" />
                    <div class="elementTitleContainer">
                        <p class="elementTitle">Flexibility and Convenience</p>
                    </div>
                    <div class="elementDescContainer">
                        <p class="elementDesc">Personalized travel, freedom from public transport, adaptable schedules, convenient exploration.</p>
                    </div>
                </div>
                <div class="element">
                    <img src="https://themes.muffingroup.com/be/carrental2/wp-content/uploads/2019/09/carrental2-home-icon6.png" />
                    <div class="elementTitleContainer">
                        <p class="elementTitle">Affordability</p>
                    </div>
                    <div class="elementDescContainer">
                        <p class="elementDesc">Economical, competitive pricing, potential savings, discounts, varied vehicle options.</p>
                    </div>
                </div>
                <div class="element">
                    <img src="https://themes.muffingroup.com/be/carrental2/wp-content/uploads/2019/09/carrental2-home-icon7.png" />
                    <div class="elementTitleContainer">
                        <p class="elementTitle">Comfort and Privacy</p>
                    </div>
                    <div class="elementDescContainer">
                        <p class="elementDesc">Private, comfortable, control over environment, enjoyable, personal space.</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- <div class="contactContainer">
            <div></div>
            <div>
                <div>
                    <input type="text" name="name" placeholder="Your name" />
                    <input type="email" name="e-mail" placeholder="Your e-mail" />
                </div>
                <div>
                    <input type="text" name="subject" placeholder="subject" />
                </div>
                <div>
                    <input type="text" name="message" placeholder="Message" />
                </div>
                <div>
                    <p>Send a message</p>
                </div>
            </div>
        </div> -->

        <div class="moreInfo" id="aboutUs">
            <!-- <div class="infoText"> -->
                <div class="brandContainer">
                    <p class="brandName">C K E I</p>
                </div>
                <div class="addressContainer">
                    <p class="addressValue">Level 13, 2 Bardo city,
                        Tunis, Victoria 3000,
                        Tunisia</p>
                </div>
                <div class="contactContainer">
                    <p class="tel"><span>+216</span> 123 456 78</p>
                    <p class="email">ckei@gmail.com</p>
                </div>

            <!-- </div> -->
        </div>

    </main>

    <script src="./js/script.js"></script>
</body>
</html>