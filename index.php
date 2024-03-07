<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/favicon_io/favicon.ico">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <?php
    include('navbar.php');
    ?>
    <section class="main-section">
        <div class="left">
            <h1><span>Looking </span>to <br> rent a <span class="role"></span></h1>
            <p>" Unlock the freedom to travel at your own pace with our wide range of reliable <br> and comfortable rental cars. "</p>
            <button class="btn" onclick="location.href='./services/rent.php'">Book Now !</button>
        </div>

        <div class="right">
            <img src="images/homeCar.jpg" alt="" >
        </div>
    </section>
    <div class="main-container">
        <h6 class="main-heading">HOW ITS WORK</h6>
        <h1 class="sub-heading">Rent With 3 Easy Steps</h1>
        <div class="sub-container">
            <div class="card">
                <img src="images/car.png" alt="location image" height="50px" width="50px" class="car">
                <h2>Choose A Vehicle</h2>
                <p>
                    Browse through our website go to the categories page select the category which type of vehicle you do you want and then click on the category and select the type of vehicle you want and proceed to the checkout page.
                </p>
            </div>
            <div class="card"> 
                <img src="images/icons8-calendar.gif" alt="" height="50px" width="50px">
                <h2>Pick-Up Date</h2>
                <p>After choosing your desired vehicle please select the date from which date to which date you have to book the vehicle or for a specific date it's totally on your choice so please select the date and proceed to check out page</p>
            </div>
            <div class="card">
                <img src="images/key.png" alt="" height="50px" width="50px">
                <h2>Book A Vehicle</h2>
                <p>After selecting the date the booking a vehicle procedure is very simple just proceed to the checkout page and then select the vehicle which you want and fill in the details and add your payment details and then you can have your vehicle booked.</p>
            </div>
        </div>
    </div>
    <section class="aboutus-container" id="aboutus-container">
    <h1 class="hsize">ABOUT US</h1>
           
<div class="aboutus-subcontainer">
    <img src="images/main-car.jpg" alt="Swift" height="400px" width="550px">
    <div class="aboutus">
        <p >Welcome to Revitalize Wheels, a pioneering car rental service that brings you an <br>
           exclusive opportunity to drive seized government vehicles at affordable rates.</p>
        <br>
        <p >At Revitalize Wheels, our mission is to revolutionize the car rental industry by <br>
            repurposing government-seized vehicles and offering them to our customers for <br>
             rental. We strive to provide high-quality, reliable transportation solutions <br>
              while contributing to sustainability and responsible vehicle usage.</p>
        <button class="btn">Learn More</button>
    </div>
</div>
</section>

    <!-- team section  -->
    <section class="Team">
    
    <h1>Team Detail</h1>
    
    <div class="team-profile">
    
    <div class="container">
        
        <div class="icon">
            <div class="imgBx active" style="--i:1;" data-id="content1">
                <img src="images/Abhishek.jpg" alt="">
            </div>
            <div class="imgBx" style="--i:2;" data-id="content2">
                <img src="images/Rohan.jpg" alt="">
            </div>
            <div class="imgBx" style="--i:3;" data-id="content3">
                <img src="images/Jash.jpg" alt="">
            </div>
            <div class="imgBx" style="--i:4;" data-id="content4">
                <img src="images/rishi.jpg" alt="">
            </div>
        </div>
        <div class="content">
            <div class="contentBx active" id="content1">
                <div class="card">
                    <div class="imgBx">
                        <img src="images/Abhishek.jpg" alt="">
                    </div>
                    <div class="textBx">
                        <h2>Abhishek Patel<br><span>Web Developer</span></h2>
                        <ul class="sci">
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-github"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="contentBx" id="content2">
                <div class="card">
                    <div class="imgBx">
                        <img src="images/Rohan.jpg" alt="">
                    </div>
                    <div class="textBx">
                        <h2>Rohan Chavda<br><span>Backend Developer</span></h2>
                        <ul class="sci">
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-github"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="contentBx" id="content3">
                <div class="card">
                    <div class="imgBx">
                        <img src="images/Jash.jpg" alt="">
                    </div>
                    <div class="textBx">
                        <h2>Jash Patel<br><span>Resource Manager</span></h2>
                        <ul class="sci">
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-github"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="contentBx" id="content4">
                <div class="card">
                    <div class="imgBx">
                        <img src="images/rishi.jpg" alt="">
                    </div>
                    <div class="textBx">
                        <h2>Rishikesh Rahane<br><span>Entrepreneur</span></h2>
                        <ul class="sci">
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-github"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
    <section id="contact">
        <h1 class="h-primary center">Contact Us</h1>
        <div id="contact-box">
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <label for="number">Phone Number:</label>
                    <input type="phone" name="number" id="phone" placeholder="Enter Your Phone Number">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                <input type="submit">
                </div>
            </form>
        </div>
        <div>
       
        </div>
    </section>
   
    <footer>

            <section class="footer1">
                    <div class="foot_flex logo-foot">
                        <div class="navbar-logo">
                            <img src="images/logo.jpg" alt="Logo">
                        </div>
                        <p class="foot-p">At Revitalize Wheels, our mission is to revolutionize the car rental industry by 
            repurposing government-seized vehicles and offering them to our customers for 
             rental. We strive to provide high-quality, reliable transportation solutions 
              while contributing to sustainability and responsible vehicle usage.</p>
                    </div>
                    <div class="foot_flex">
                        <h3>
                        Address
                        </h3>
                        <p>City: Bhilad</p>
                        <p>Dist.: Valsad</p>
                        <p>State: Gujarat</p>
                        <p>Pincode: 396105</p>
                </div>
                    <div class="foot_flex">
                            <h3>
                                Quick Links
                            </h3>
                            <a href="#">Home</a>
                            <a href="services/rent.php">Rent</a>
                            <a href="#aboutus-container">About Us</a>
                            <a href="services/bike.php">Bike</a>
                            <a href="services/car.php">Car</a>
                            <a href="services/truck.php">Truck</a>
                            
                    </div>
                    
                    

            </section>
            <div class="center footer2">
                            Copyright &copy; www.RevitalizeWheels.com All Rights Reserved!
                    </div>


    </footer>

            <!-- typewriter effect -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script src="https://kit.fontawesome.com/58a810656e.js" crossorigin="anonymous"></script>
  <script>
    var typeData = new Typed(".role", {
      strings: [
        "Vehicle",
        "Bike",
        "Car",
        "Truck",
        
      ],
      loop: true,
      typeSpeed: 100,
      backSpeed: 80,
      backDelay: 1000,
    });
  </script>

    <script>

    // team profile script 
    let imgBx = document.querySelectorAll('.imgBx')
        let contentBx = document.querySelectorAll('.contentBx')

        for(let i=0; i < imgBx.length; i++){
            imgBx[i].addEventListener('mouseover', function(){
                for(let i=0; i<contentBx.length; i++){
                    contentBx[i].className = 'contentBx';
                }
                document.getElementById(this.dataset.id).className = 'contentBx active';


                for(let i=0; i<imgBx.length; i++){
                    imgBx[i].className = 'imgBx';
                }
                this.className = 'imgBx active';
            })
        }
    </script>
</body>
</html>