<?php
session_start();
if(!isset($_SESSION['log']))
{
  header('Location: index.html');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="assets/tablogo.png">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/autosearch.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">           
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>AirEase - Home Page</title>
  <style>
    #video-container 
    {
      width: 27vw;
      height: 35vh;
      cursor: pointer;
      border: 5px solid white;
      box-shadow: 0 0 20px black;
    }

    #first 
    {
      position: relative;
      float: right;
      margin-left: auto;
      width: 80%;
      padding: 10px 0;
      font-size: 1rem;
      outline: none;
      border: none;
      border-bottom: 1px solid #a75a82;
      color: rgb(255, 255, 255);
      background-color: var(--primary-color);
      font-size: 1rem;
      font-weight: 500;
    }

    #first:hover 
    {
      background-color: #721b47;
    }

    #second 
    {
      float: right;
      margin-left: auto;
      width: 80%;
      padding: 10px 0;
      font-size: 1rem;
      outline: none;
      border: none;
      font-size: 1rem;
      font-weight: 500;
      border-bottom: 1px solid #a75a82;
      color: rgb(255, 255, 255);
      background-color: var(--primary-color);
    }

    #second:hover 
    {
      background-color: #721b47;
    }
    #myVideo 
    {
      width: 100%;
      height: 100%;
    }

    .text-muted 
    {
      color: #ffffff !important;
    }

    .calender 
    {
      position: absolute;
      top: 230px;
      left: 600px;
      padding: 10px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      z-index: 10000;
    }

    .calender1 
    {
      position: absolute;
      top: 230px;
      left: 800px;
      padding: 10px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
   
    .calender2 
    {
      position: absolute;
      top: 200px;
      left: 700px;
      padding: 10px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .header1,.header11,.header22 
    {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
    }

    .monthYear,.monthYear1,.monthYear2 
    {
      text-align: center;
      font-weight: 600;
      width: 150px;
    }

    .button1,.button11,.button22 
    {
      display: flex;
      justify-content: center;
      align-items: center;
      border: none;
      border-radius: 50%;
      background: #8E2157;
      cursor: pointer;
      width: 40px;
      height: 40px;
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
      color: #fff;
    }

    .button1:hover,
    .button11:hover,.button22:hover 
    {
      background: #721b47;
    }

    .days,.days1,.days2 
    {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
    }

    .day,.day1,.day2 
    {
      text-align: center;
      padding: 5px;
      color: #8e2258;
      font-weight: 500;
    }

    .dates,.dates1,.dates2 
    {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 5px;
    }

    .date,.date1,.date2 
    {
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 10px;
      margin: auto;
      cursor: pointer;
      font-weight: 600;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      transition: 0.2s;
    }

    .date:hover,
    .date:active,
    .date1:hover,
    .date1:active,
    .date2:hover,
    .date2:active 
    {
      background: #8E2157;
      color: #fff;
    }

    .date.inactive,
    .date1.inactive,
    .date2.inactive
    {
      color: #d2d2d2;
    }

    .date.inactive:hover,
    .date1.inactive:hover,
    .date2.inactive:hover 
    {
      background: #fff;
    }

    .date.selected,
    .date1.selected,
    .date2.selected 
    {
      background: #a75a82;
      color: #fff;
    }

    .button-container 
    {
      position: absolute;
      color: var(--white);
      width: 20%;
      right: 510px;
      bottom: 45px;
    }

    .button-container input 
    {
      border-radius: 15px;
    }
  </style>
</head>

<body>
  <?php
    if (isset($_SESSION['u']))
    {
        $name=$_SESSION['u'];
    }
    else
    {
    $user=$_GET['username'];

    $hostName ="localhost";
    $dbusers ="root";                
    $dbPassword ="";        
    $dbName ="airease";

    $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
    if (!$conn)
    {
        $somethingiswrong=true;               
    }
    $sql="SELECT * FROM register WHERE email='$user'";
    $result=mysqli_query($conn,$sql);
    $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if ($user)
    {
        $name=$user['firstname']." ".$user['lastname'];
    }
    $_SESSION['u']=$name;
    }

  ?>
  <header>
    <div class="nav__logo"><img src="assets/Homepagelogo.png"></div>
    <ul class="nav__links">
      <li class="link"><a href="homepagewl.php">HOME</a></li>
      <li class="link"><a href="MyFlights.php">MY FLIGHTS</a></li>
      <li class="link"><a href="AboutUs.php">ABOUT</a></li>
      <li class="link"><a href="feedback.php">FEEDBACK</a></li>
    </ul>
    <a class="user-log"><i class="fa fa-user" style="font-size:20px"></i>&nbsp; <?php echo "$name"; ?></a>
    <a href="logout.php"><button class="btn">Logout &nbsp;<i class="fa fa-sign-out" style="font-size:15px"></i></button></a>
  </header>
  <section class="banner">
    <h2 class="section__header"></h2>
  </section>
  <section class="section__container booking__container">
    <div class="booking__nav">
      <span onclick="selectSpan(this)" class="selected">Book A Flight</span>
      <span onclick="selectSpan(this)">Flight Status</span>
    </div>
    <div class="bookingForm">
      <!-- <div class="but">
        <input type="radio" name="flightType" value="One" id="oneWay" onclick="toggleReturnForm(false)" checked>
        <span>One Way</span>
        <input type="radio" name="flightType" value="Return" id="return" onclick="toggleReturnForm(true)">
        <span>Return</span>
      </div> -->
      <form action="video.php" method="post">
        <div class="form__group">
          <span><i class="ri-flight-takeoff-line"></i></span>
          <div class="input__content search-boxok">
            <div class="input__group rowok">
              <input type="text" id="input-boxok" autocomplete="off" name="from" required/>
              <label>From</label>
            </div>
            <div class="result-boxok">
            </div>
            <p>Your Location</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-flight-land-fill"></i></span>
          <div class="input__content search-boxok1">
            <div class="input__group rowok1">
              <input type="text" id="input-boxok1" autocomplete="off" name="to" required/>
              <label>To</label>
            </div>
            <div class="result-boxok1">
            </div>
            <p>Destination</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-calendar-event-fill"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="text" id="dateInput" autocomplete="off" name="d_date" required>
              <label>Departure Date</label>
            </div>


            <div class="calender">
              <div class="header1">
                <div id="prevBtn" class="button1">
                  <i id="left" class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="monthYear" id="monthYear"></div>
                <div id="nextBtn" class="button1">
                  <i id="right" class="fa-solid fa-chevron-right"></i>
                </div>
              </div>
              <div class="days">
                <div class="day">Sun</div>
                <div class="day">Mon</div>
                <div class="day">Tue</div>
                <div class="day">Wed</div>
                <div class="day">Thu</div>
                <div class="day">Fri</div>
                <div class="day">Sat</div>
              </div>
              <div class="dates" id="dates"></div>
            </div>
            <p>Add date</p>
          </div>
        </div>
        <!-- <div class="form__group" id="returnFormGroup">
          <span><i class="ri-calendar-event-fill"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="text" id="dateInput1" autocomplete="off">
              <label>Return</label>
            </div>
            <div class="calender1">
              <div class="header11">
                <div id="prevBtn1" class="button11">
                  <i id="left1" class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="monthYear1" id="monthYear1"></div>
                <div id="nextBtn1" class="button11">
                  <i id="right1" class="fa-solid fa-chevron-right"></i>
                </div>
              </div>
              <div class="days1">
                <div class="day1">Sun</div>
                <div class="day1">Mon</div>
                <div class="day1">Tue</div>
                <div class="day1">Wed</div>
                <div class="day1">Thu</div>
                <div class="day1">Fri</div>
                <div class="day1">Sat</div>
              </div>
              <div class="dates1" id="dates1"></div>
            </div>




            <p>Add date</p>
          </div>
        </div> -->
        <div class="form__group">
          <span><i class="ri-user-3-fill"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="number" min="1" max="10" name="nop" required/>
              <label>Passengers</label>
            </div>
            <p>Select</p>
          </div>
        </div>
        <br>
        <div class="button-container">
          <input type="submit" value="Search Flight(s)" id="first">
        </div>
      </form>
    </div>
    <div id="flightStatusForm" class="hidden">
      <form action="F-status.php" method="post">
        <div class="form__group">
          <span><i class="ri-flight-takeoff-line"></i></span>
          <div class="input__content search-boxok2">
            <div class="input__group rowok2">
              <input type="text" id="input-boxok2" name="from" autocomplete="off" required/>
              <label>From</label>
            </div>
            <div class="result-boxok2">
            </div>
            <p>Your Location</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-flight-land-fill"></i></span>
          <div class="input__content search-boxok3">
            <div class="input__group rowok3">
              <input type="text" id="input-boxok3" autocomplete="off" name="to" required/>
              <label>To</label>
            </div>
            <div class="result-boxok3">
            </div>
            <p>Destination</p>
          </div>
        </div>
        <div class="form__group">
        <span><i class="ri-calendar-event-fill"></i></span>
        <div class="input__content">
          <div class="input__group">
            <input type="text" id="dateInput2" autocomplete="off" name="d_date" required>
            <label>Departure Date</label>
          </div>


          <div class="calender2">
            <div class="header22">
              <div id="prevBtn2" class="button22">
                <i id="left2" class="fa-solid fa-chevron-left"></i>
              </div>
              <div class="monthYear2" id="monthYear2"></div>
              <div id="nextBtn2" class="button22">
                <i id="right2" class="fa-solid fa-chevron-right"></i>
              </div>
            </div>
            <div class="days2">
              <div class="day2">Sun</div>
              <div class="day2">Mon</div>
              <div class="day2">Tue</div>
              <div class="day2">Wed</div>
              <div class="day2">Thu</div>
              <div class="day2">Fri</div>
              <div class="day2">Sat</div>
            </div>
            <div class="dates2" id="dates2"></div>
          </div>

          <p>Add date</p>
        </div>
       </div>
    <br>
    <div class="button-container">
      <input type="submit" value="Search Flight(s)" id="second">
    </div>
  </div>
    </form>
    </div>
  </section>

  <section class="section__container lounge__container">
    <div class="lounge__image">
      <img src="assets/lounge-1.jpg" alt="lounge" />
      <img src="assets/lounge-2.jpg" alt="lounge" />
    </div>
    <div class="lounge__content">
      <h2 class="section__header">Start Planning Your Next Trip</h2>
      <div class="lounge__grid">
        <div class="lounge__details">
          <h4>Experience Tranquility</h4>
          <p>
            Serenity Haven offers a tranquil escape, featuring comfortable
            seating, calming ambiance, and attentive service.
          </p>
        </div>
        <div class="lounge__details">
          <h4>Elevate Your Experience</h4>
          <p>
            Designed for discerning travelers, this exclusive lounge offers
            premium amenities, assistance, and private workspaces.
          </p>
        </div>
        <div class="lounge__details">
          <h4>A Welcoming Space</h4>
          <p>
            Creating a family-friendly atmosphere, The Family Zone is the
            perfect haven for parents and children.
          </p>
        </div>
        <div class="lounge__details">
          <h4>A Culinary Delight</h4>
          <p>
            Immerse yourself in a world of flavors, offering international
            cuisines, gourmet dishes, and carefully curated beverages.
          </p>
        </div>
      </div>
    </div>
  </section>


  <section class="section__container travellers__container">
    <h2 class="section__header">Explore New Places</h2>
    <div class="travellers__grid">
      <div class="travellers__card">
        <img src="assets/traveller-1.jpg" alt="traveller" />
        <div class="travellers__card__content">
          <p>Agra</p>
        </div>
      </div>
      <div class="travellers__card">
        <img src="assets/traveller-2.jpg" alt="traveller" />
        <div class="travellers__card__content">
          <p>Kolkata</p>
        </div>
      </div>
      <div class="travellers__card">
        <img src="assets/traveller-3.jpg" alt="traveller" />
        <div class="travellers__card__content">
          <p>Mumbai</p>
        </div>
      </div>
      <div class="travellers__card">
        <img src="assets/traveller-4.jpg" alt="traveller" />
        <div class="travellers__card__content">
          <p>Chennai</p>
        </div>
      </div>
    </div>
  </section>


  <footer class="footer">
    <div class="section__container footer__container">
      <div class="footer__col">
        <!-- video  div Started-->
        <div id="video-container">
          <video id="myVideo" width="320" height="240" controls autoplay muted loop>
            <source src="assets/intro video.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>

        <script>
          var video = document.getElementById("myVideo");
          var videoContainer = document.getElementById("video-container");

          var options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
          };

          var observer = new IntersectionObserver(callback, options);

          observer.observe(videoContainer);

          function callback(entries, observer) {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                // Video is in view, play it
                video.play();
                //  video.muted = false;
              } else {
                // Video is out of view, pause it
                video.pause();
              }
            });
          }
        </script>

        <!-- video  ended-->


      </div>
      <div class="footer__col">
        <h3>INFORMATION</h3>
        <p><a href="homepagewl.php">Home</a></p>
        <p><a href="AboutUs.php">About</a></p>
        <p><a href="feedback.php">Feedback</a></p>
      </div>
      <div class="footer__col">
        <h3>CONTACT</h3>
        <p>airease2025@gmail.com</p>
        <br>
        <br>
        <br>
        <br>
        <div class="nav__logo"><img src="assets/aireaselogoinwhite.jpg"></div>
      </div>
    </div>
    <div class="section__container footer__bar">
      <div>
        <p>Copyright © 2025 Team GLSE01. All rights reserved.</p>
      </div>
      <div class="socials">
        <span><a href="" class="text-muted" target="_blank"><i class="ri-facebook-fill"></i></a></span>
        <span><a href="" class="text-muted" target="_blank"><i class="ri-twitter-fill"></i></a></span>
        <span><a href="" class="text-muted" target="_blank"><i class="ri-instagram-line"></i></a></span>
        <span><a href="" class="text-muted" target="_blank"><i class="ri-youtube-fill"></i></a></span>
      </div>
    </div>
  </footer>

  <script type="text/javascript">
    function updatePassengerValue() {
      var passengerTypeSelect = document.getElementById("passengerType");
      var selectedPassengers = [];

      for (var i = 0; i < passengerTypeSelect.options.length; i++) {
        if (passengerTypeSelect.options[i].selected) {
          selectedPassengers.push(passengerTypeSelect.options[i].value);
        }
      }

      // Update the select element's text content with the selected passengers
      passengerTypeSelect.nextSibling.nextSibling.textContent = selectedPassengers.length + " Passengers";
    }



    window.addEventListener("scroll", function () {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })

    function selectSpan(selectedSpan) {
      // Deselect all spans
      var spans = document.querySelectorAll('.booking__nav span');
      spans.forEach(function (span) {
        span.classList.remove('selected');
      });

      // Select the clicked span
      selectedSpan.classList.add('selected');

      // Toggle between booking form and flight status form
      var bookingForm = document.querySelector('.bookingForm');
      var flightStatusForm = document.getElementById('flightStatusForm');
      var fbutton = document.getElementById('first');
      var sbutton = document.getElementById('second');
      sbutton.style.display = "none";
      if (selectedSpan.textContent === "Flight Status") {
        bookingForm.style.display = "none";
        flightStatusForm.style.display = "block";
        fbutton.style.display = "none";
        sbutton.style.display =  "block";
      } else {
        flightStatusForm.style.display = "none";
        bookingForm.style.display = "block";
        sbutton.style.display =  "none";
        fbutton.style.display = "block";
      }
    }


    function toggleReturnForm(showReturn) {
      var form = document.getElementById("form1");
      var returnFormGroup = document.getElementById("returnFormGroup");
      var buttonContainer = document.querySelector(".button-container");
      
      if (showReturn) {
        returnFormGroup.classList.add("form__group");
        returnFormGroup.classList.remove("hidden");
        // Add CSS properties to position the button container
        buttonContainer.style.position = "absolute";
        buttonContainer.style.bottom = "45px"; // Adjust as needed
        buttonContainer.style.right = "510px"; // Adjust as needed
        buttonContainer.style.width = "20%";
      } else {
        returnFormGroup.classList.remove("form__group");
        returnFormGroup.classList.add("hidden");
        // Reset CSS properties for the button container
        buttonContainer.style.position = "absoulte";
        buttonContainer.style.width = "20%";
        buttonContainer.style.right = "510px";
        buttonContainer.style.bottom = "45px";
      }
    }

    // Set initial state on page load
    toggleReturnForm(false);
  </script>


  <script>
    let availableflights = ['Nashik (NSK)', 'Mumbai (BOM)', 'Bengaluru (BGL)', 'Kochi (KOC)', 'Delhi (DEL)', 'Hyderabad (HYD)', 'Chennai (MAA)', 'Ahmedabad (AMD)', 'Amritsar (ATQ)', 'Kolkata (CCU)'];
    const resultsBox = document.querySelector(".result-boxok");
    const inputBox = document.getElementById("input-boxok");

    inputBox.onkeyup = function () {
      let result = [];
      let input = inputBox.value;

      if (input.length) {
        result = availableflights.filter(keyword => keyword.toLowerCase().includes(input.toLowerCase()));
      }

      display(result, resultsBox);

      if (!result.length) {
        resultsBox.innerHTML = '';
      }
    };

    function display(result, resultsBox) {
      const content = result.map(list => `<li onclick="selectInput(this)">${list}</li>`).join('');
      resultsBox.innerHTML = `<ul><h1>${content}</h1></ul>`;
    }

    function selectInput(list) {
      inputBox.value = list.textContent;
      resultsBox.innerHTML = '';
    }
  </script>

  <script>
    let availableflights1 = ['Nashik (NSK)', 'Mumbai (BOM)', 'Bengaluru (BGL)', 'Kochi (KOC)', 'Delhi (DEL)', 'Hyderabad (HYD)', 'Chennai (MAA)', 'Ahmedabad (AMD)', 'Amritsar (ATQ)', 'Kolkata (CCU)'];
    const resultsBox1 = document.querySelector(".result-boxok1");
    const inputBox1 = document.getElementById("input-boxok1");

    inputBox1.onkeyup = function () {
      let result = [];
      let input = inputBox1.value;

      if (input.length) {
        result = availableflights1.filter(keyword => keyword.toLowerCase().includes(input.toLowerCase()));
      }

      display1(result, resultsBox1);

      if (!result.length) {
        resultsBox1.innerHTML = '';
      }
    };

    function display1(result, resultsBox) {
      const content = result.map(list => `<li onclick="selectInput1(this)">${list}</li>`).join('');
      resultsBox1.innerHTML = `<ul><h1>${content}</h1></ul>`;
    }

    function selectInput1(list) {
      inputBox1.value = list.textContent;
      resultsBox1.innerHTML = '';
    }
  </script>

  <!--this is for the input from in flight status-->
  <script>
    let availableflights2 = ['Nashik (NSK)', 'Mumbai (BOM)', 'Bengaluru (BGL)', 'Kochi (KOC)', 'Delhi (DEL)', 'Hyderabad (HYD)', 'Chennai (MAA)', 'Ahmedabad (AMD)', 'Amritsar (ATQ)', 'Kolkata (CCU)'];
    const resultsBox2 = document.querySelector(".result-boxok2");
    const inputBox2 = document.getElementById("input-boxok2");

    inputBox2.onkeyup = function () {
      let result = [];
      let input = inputBox2.value;

      if (input.length) {
        result = availableflights2.filter(keyword => keyword.toLowerCase().includes(input.toLowerCase()));
      }

      display2(result, resultsBox2);

      if (!result.length) {
        resultsBox2.innerHTML = '';
      }
    };

    function display2(result, resultsBox2) {
      const content = result.map(list => `<li onclick="selectInput2(this)">${list}</li>`).join('');
      resultsBox2.innerHTML = `<ul><h1>${content}</h1></ul>`;
    }

    function selectInput2(list) {
      inputBox2.value = list.textContent;
      resultsBox2.innerHTML = '';
    }
  </script>

  <script>
    let availableflights3 = ['Nashik (NSK)', 'Mumbai (BOM)', 'Bengaluru (BGL)', 'Kochi (KOC)', 'Delhi (DEL)', 'Hyderabad (HYD)', 'Chennai (MAA)', 'Ahmedabad (AMD)', 'Amritsar (ATQ)', 'Kolkata (CCU)'];
    const resultsBox3 = document.querySelector(".result-boxok3");
    const inputBox3 = document.getElementById("input-boxok3");

    inputBox3.onkeyup = function () {
      let result = [];
      let input = inputBox3.value;

      if (input.length) {
        result = availableflights3.filter(keyword => keyword.toLowerCase().includes(input.toLowerCase()));
      }

      display3(result, resultsBox3);

      if (!result.length) {
        resultsBox3.innerHTML = '';
      }
    };

    function display3(result, resultsBox3) {
      const content = result.map(list => `<li onclick="selectInput3(this)">${list}</li>`).join('');
      resultsBox3.innerHTML = `<ul><h1>${content}</h1></ul>`;
    }

    function selectInput3(list) {
      inputBox3.value = list.textContent;
      resultsBox3.innerHTML = '';
    }
  </script>








  <script>
    const monthYearElement = document.getElementById('monthYear');
        const datesElement = document.getElementById('dates');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const dateInput = document.getElementById('dateInput');
        const calendar = document.querySelector('.calender');
        calendar.style.display = 'none';

        dateInput.addEventListener('click', function () {
            calendar.style.display = 'block';
        });

        let currentDate = new Date();

        const updateCalendar = () => {
            const currentYear = currentDate.getFullYear();
            const currentMonth = currentDate.getMonth();
            const firstDay = new Date(currentYear, currentMonth, 1);
            const lastDay = new Date(currentYear, currentMonth + 1, 0);
            const totalDays = lastDay.getDate();
            const firstDayIndex = firstDay.getDay();
            const lastDayIndex = lastDay.getDay();
            const monthYearString = currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
            monthYearElement.textContent = monthYearString;

            let datesHTML = '';

            for (let i = firstDayIndex; i > 0; i--) {
                const prevDate = new Date(currentYear, currentMonth, 0 - i + 1);
                const inactiveClass = prevDate < new Date() ? 'inactive' : '';
                datesHTML += `<div class="date ${inactiveClass}" data-date="${prevDate.toISOString()}">${prevDate.getDate()}</div>`;
            }

            for (let i = 1; i <= totalDays; i++) {
                const date = new Date(currentYear, currentMonth, i);
                const activeClass = date.toDateString() === new Date().toDateString() ? 'active' : '';
                datesHTML += `<div class="date ${activeClass}" data-date="${date.toISOString()}">${i}</div>`;
            }

            for (let i = 1; i <= 7 - lastDayIndex; i++) {
                const nextDate = new Date(currentYear, currentMonth + 1, i);
                datesHTML += `<div class="date inactive">${nextDate.getDate()}</div>`;
            }
            datesElement.innerHTML = datesHTML;

            document.querySelectorAll('.date').forEach(dateElement => {
                dateElement.addEventListener('click', () => {
                    const selectedDate = new Date(dateElement.dataset.date);
                    const formattedDate = selectedDate.toLocaleDateString('en-GB');
                    dateInput.value = formattedDate;
                    calendar.style.display = 'none';
                });
            });
        };

        prevBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            updateCalendar();
        });

        nextBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            updateCalendar();
        });

        updateCalendar();

        document.addEventListener('click', function (event) {
            const targetElement = event.target;

            if (targetElement !== dateInput && targetElement !== prevBtn && targetElement !== nextBtn) {
                calendar.style.display = 'none';
            }
        });
  </script>


<script>
    const monthYearElement2 = document.getElementById('monthYear1');
    const datesElement2 = document.getElementById('dates1');
    const prevBtn2 = document.getElementById('prevBtn1');
    const nextBtn2 = document.getElementById('nextBtn1');
    const left2 = document.getElementById('left1');
    const right2 = document.getElementById('right1');
    const dateInput2 = document.getElementById('dateInput1');
    const calendar2 = document.querySelector('.calender1');
    calendar2.style.display = 'none';

    // Function to show the calendar when the input field is clicked
    dateInput2.addEventListener('click', function () {
      calendar2.style.display = 'block';
    });

    let currentDate2 = new Date();

    // Function to update the calendar
    const updateCalendar2 = () => {
      const currentYear2 = currentDate2.getFullYear();
      const currentMonth2 = currentDate2.getMonth();
      const firstDay2 = new Date(currentYear2, currentMonth2, 1);
      const lastDay2 = new Date(currentYear2, currentMonth2 + 1, 0);
      const totalDays2 = lastDay2.getDate();
      const firstDayIndex2 = firstDay2.getDay();
      const lastDayIndex2 = lastDay2.getDay();
      const monthYearString2 = currentDate2.toLocaleString('default', { month: 'long', year: 'numeric' });
      monthYearElement2.textContent = monthYearString2;

      let datesHTML2 = '';

      for (let i = firstDayIndex2; i > 0; i--) {
        const prevDate2 = new Date(currentYear2, currentMonth2, 0 - i + 1);
        datesHTML2 += `<div class="date inactive">${prevDate2.getDate()}</div>`;
      }

      for (let i = 1; i <= totalDays2; i++) {
        const date2 = new Date(currentYear2, currentMonth2, i);
        const activeClass2 = date2.toDateString() === new Date().toDateString() ? 'active' : '';
        datesHTML2 += `<div class="date ${activeClass2}" data-date="${date2.toISOString()}">${i}</div>`;
      }

      for (let i = 1; i <= 7 - lastDayIndex2; i++) {
        const nextDate2 = new Date(currentYear2, currentMonth2 + 1, i);
        datesHTML2 += `<div class="date inactive">${nextDate2.getDate()}</div>`;
      }
      datesElement2.innerHTML = datesHTML2;

      // Add event listener to each date element
      document.querySelectorAll('.date').forEach(dateElement2 => {
        dateElement2.addEventListener('click', () => {
          const selectedDate2 = new Date(dateElement2.dataset.date);
          const formattedDate2 = selectedDate2.toLocaleDateString('en-GB');
          dateInput2.value = formattedDate2;
          calendar2.style.display = 'none'; // Hide the calendar after date selection
        });
      });
    };

    // Event listener for previous month button
    prevBtn2.addEventListener('click', () => {
      currentDate2.setMonth(currentDate2.getMonth() - 1);
      updateCalendar2();
    });

    // Event listener for next month button
    nextBtn2.addEventListener('click', () => {
      currentDate2.setMonth(currentDate2.getMonth() + 1);
      updateCalendar2();
    });

    // Initialize the calendar
    updateCalendar2();

    // Event listener to hide the calendar when another input field is clicked
    document.addEventListener('click', function (event) {
      const targetElement2 = event.target;

      if (targetElement2 !== dateInput2 && targetElement2 !== prevBtn2 && targetElement2 !== nextBtn2 && targetElement2 !== left2 && targetElement2 !== right2) {
        calendar2.style.display = 'none';
      }
    });
</script>

<script>
  const monthYearElement3 = document.getElementById('monthYear2');
  const datesElement3 = document.getElementById('dates2');
  const prevBtn3 = document.getElementById('prevBtn2');
  const nextBtn3 = document.getElementById('nextBtn2');
  const left3 = document.getElementById('left2');
  const right3 = document.getElementById('right2');
  const dateInput3 = document.getElementById('dateInput2');
  const calendar3 = document.querySelector('.calender2');
  calendar3.style.display = 'none';

  // Function to show the calendar when the input field is clicked
  dateInput3.addEventListener('click', function () {
    calendar3.style.display = 'block';
  });

  let currentDate3 = new Date();

  // Function to update the calendar
  const updateCalendar3 = () => {
    const currentYear3 = currentDate3.getFullYear();
    const currentMonth3 = currentDate3.getMonth();
    const firstDay3 = new Date(currentYear3, currentMonth3, 1);
    const lastDay3 = new Date(currentYear3, currentMonth3 + 1, 0);
    const totalDays3 = lastDay3.getDate();
    const firstDayIndex3 = firstDay3.getDay();
    const lastDayIndex3 = lastDay3.getDay();
    const monthYearString3 = currentDate3.toLocaleString('default', { month: 'long', year: 'numeric' });
    monthYearElement3.textContent = monthYearString3;

    let datesHTML3 = '';

    for (let i = firstDayIndex3; i > 0; i--) {
      const prevDate3 = new Date(currentYear3, currentMonth3, 0 - i + 1);
      datesHTML3 += `<div class="date inactive">${prevDate3.getDate()}</div>`;
    }

    for (let i = 1; i <= totalDays3; i++) {
      const date3 = new Date(currentYear3, currentMonth3, i);
      const activeClass3 = date3.toDateString() === new Date().toDateString() ? 'active' : '';
      datesHTML3 += `<div class="date ${activeClass3}" data-date="${date3.toISOString()}">${i}</div>`;
    }

    for (let i = 1; i <= 7 - lastDayIndex3; i++) {
      const nextDate3 = new Date(currentYear3, currentMonth3 + 1, i);
      datesHTML3 += `<div class="date inactive">${nextDate3.getDate()}</div>`;
    }
    datesElement3.innerHTML = datesHTML3;

    // Add event listener to each date element
    document.querySelectorAll('.date').forEach(dateElement3 => {
      dateElement3.addEventListener('click', () => {
        const selectedDate3 = new Date(dateElement3.dataset.date);
        const formattedDate3 = selectedDate3.toLocaleDateString('en-GB');
        dateInput3.value = formattedDate3;
        calendar3.style.display = 'none'; // Hide the calendar after date selection
      });
    });
  };

  // Event listener for previous month button
  prevBtn3.addEventListener('click', () => {
    currentDate3.setMonth(currentDate3.getMonth() - 1);
    updateCalendar3();
  });

  // Event listener for next month button
  nextBtn3.addEventListener('click', () => {
    currentDate3.setMonth(currentDate3.getMonth() + 1);
    updateCalendar3();
  });

  // Initialize the calendar
  updateCalendar3();

  // Event listener to hide the calendar when another input field is clicked
  document.addEventListener('click', function (event) {
    const targetElement3 = event.target;

    if (targetElement3 !== dateInput3 && targetElement3 !== prevBtn3 && targetElement3 !== nextBtn3 && targetElement3 !== left3 && targetElement3 !== right3) {
      calendar3.style.display = 'none';
    }
  });
</script>

</body>

</html>