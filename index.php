<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Welcome to E-Library, your digital space for books and knowledge.">
  <meta name="keywords" content="eLibrary, elibrary odisha, elibrary pdf, free books, elibrary project, book pdf, elibrary books">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href='css/home.css?<?= filemtime($_SERVER["DOCUMENT_ROOT"] . "css/home.css"); ?>'>
  <title>eLibrary - A digital space among readers</title>
  <link rel="icon" href="https://cdn-icons-png.freepik.com/512/10089/10089764.png" title="books icons">
</head>

<body style="background-image: url(https://m.media-amazon.com/images/I/91cQQg+D0hL._AC_SX679_.jpg); background-size: contain;">
  <button onclick="topFunction()" id="myBtn" title="Go to top"><img class="top" src="https://cdn.iconscout.com/icon/free/png-256/free-up-arrow-1767496-1502504.png"></button>

  <div style="background-color: rgba(255, 255, 255, 0.7);">
        <div class="divbar">
        <div class="divbar-container">
            <a href="/" ><img class="logo" src="https://cdn-icons-png.freepik.com/512/10089/10089764.png" alt="book icon"></a>
            <div class="menu-icon" id="menu-icon">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <ul class="div-links" id="div-links">
                <li><div class="divitem" id="openPopup">What's new</div></li>
                <li><a href="#bookssuggestion">Featured books</a></li>
                <li><a href="request">Request</a></li>
                <li> <?php      
                    if (isset($_SESSION['admin_username'])) {
                    $account='admin_dashboard';
                        echo '<a href="'.$account.'">My account</a>';
                        }
                        else if(isset($_SESSION['user_name'])) {
                            $account='userpage';
                                echo '<a href="'.$account.'">My account</a>';
                        }
                     else
                    {
                        $login='login';
                        echo '<a href="'.$login.'">Sign in</a>';
                    }
                               ?> </li>
            </ul>
        </div>
    </div>
    <div id="overlay" class="hidden"></div>
    <div id="popup" class="hidden"><div id="updatebg">
        <span id="closePopup">&times;</span><br>
         <div id="updates">
                    <img src="https://png.pngtree.com/png-vector/20190504/ourmid/pngtree-announcement-icon-design-png-image_1017472.jpg" alt="logo" id="announce" ><h1>What's New</h1>
                    <img src="https://i0.wp.com/www.printmag.com/wp-content/uploads/2023/10/Centered_ChapterGraphics-scaled.jpg" alt="books" id="updateimage">
                    <i> MAY 2024 RELEASE !</i>
                     <ul>
                     <p> 
                         <li><b>Download & read later: </b>Users can now explore the library through their personal user page after logging in. They also have the option to select books to read later or download them directly to their device.</li>
                         <li><b>Request status: </b>The requested book list and the status of each request can be viewed on user page.</li>
                         <li><b>Contact us: </b>If you encounter any issues, you can reach out directly to our support team.</li>
                     </ul>
             </div>
    </div>
    </div>

    <div class="bgphotoroot"></div>
    <div class="bg"></div>

    <header
      style="background-image: url(https://i.pinimg.com/736x/e9/2d/e4/e92de44ab0c2689e8ca93c89f5e50f50.jpg); background-repeat: no-repeat; background-size: cover; color: white;">
      <div style="background-image: linear-gradient(rgba(47, 47, 47,0.98) 15%,rgba(60,60,60,0.7) 85%);" >

        <div class="headline">
          <center>
            <div class="container">
              <p class="typewriter"><b>e-Library</b></p>
            </div><br>
            <p style="text-align: left; padding:  1% 8% 1% 8%; font-size: 2.4vmin;">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to
              E-Library,
              your digital oasis for books and knowledge. Dive into a curated collection of e-books, articles, and
              resources,
              accessible anytime, anywhere. Explore diverse genres, engage in discussions, and join a community
              passionate
              about reading and learning. E-Library is your gateway to a world where literature and information
              seamlessly
              blend in the digital era. Start your journey with us, expanding your horizons with every click. Welcome to
              the
              future of reading.
            </p><form action="search" method="GET">
            <div id="searchbox">
              <input name="searchhere" aria-label="search for books" autocomplete="off" inputmode="search"
                placeholder="  Book Name, Author, SL No." type="search" />
              <button type="Submit" class="btn btn-success">Search
              </button>
            </div></form>
          </center>
        </div>
      </div>
    </header>

    <content>
      <div id="bookssuggestion" style="background-color: white;">
        <br>
        <p>TOP PICKS</p>
        <hr>
        <center>
        <?php 
            $host = 'sql109.infinityfree.com';
$username = 'if0_36313886';
$password = 'guzQVtX3fVuI';
$database = 'if0_36313886_Admin';

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

            $query = "SELECT * FROM books LIMIT 8";
    $result = $conn->query($query);
     if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {

if ((isset($_SESSION['admin_username'])) || (isset($_SESSION['user_name']))) {
$booklink=$row['booklink'];
$bookcover=$row['bookcover']; 
$bookname=$row['name'];   
}
    else
    {
$booklink='login';
$bookcover=$row['bookcover'];
$bookname=$row['name'];   
    }
         echo ' <div class="ebooks">
            <a href="'.$booklink.'"
              style="text-decoration: none; color: rgb(0, 0, 0);">
              <img class="bookthumbnail" src="'.$bookcover.'" alt="'.$bookname.'" width="100%">
            </a>
          </div> ';
     }   
     }
        ?>
        </center>
      </div>

      <div id="contentsuggestion" class="floating" style="padding-top: 2.5%;">
        <center>

          <div class="cards">
            <center>
              <div class="cardbody">
                <img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/f9fc9e117754269.607c199432145.gif" class="card-imgtop" alt="login">
                <p class="cardtext">Create an account to organize your tasks and maintain your records.<br></p>
                <a href="CreateAccount" style="color: white; background-color: rgb(0, 89, 255);" class="cardbotton">Sign up</a>
              </div>
            </center>
          </div>

          <div class="cards">
            <center>
              <div class="cardbody">
                <img src="https://cdn-icons-gif.flaticon.com/8716/8716872.gif" class="card-imgtop" alt="request">
                <p class="cardtext">If the book you’re looking for isn’t available, feel free to make a request on our
                  site.<br></p>
                <a href="request" style="color: white; background-color: rgb(0, 89, 255);" class="cardbotton" target="_blank">Request</a>
              </div>
            </center>
          </div>

          <div class="cards">
            <center>
              <div class="cardbody">
                <img src="https://cdnl.iconscout.com/lottie/premium/thumb/file-upload-5635957-4702141.gif" class="card-imgtop" alt="upload">
                <p class="cardtext">Feel free to upload & share your books, articles, and other content with others.<br>
                </p>
                <a href="https://forms.gle/K7dTuhwY8aFXZ1ZZ7" style="color: white; background-color: rgb(0, 89, 255);" class="cardbotton" target="_blank">Submit</a>
            </center>
          </div>
        </center>
      </div>

      <div id="faq">
        <h4>
          <b>Frequently Asked Questions</b>
        </h4>
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                What is the purpose of this e-Library ?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Our
                mission at e-Library is to provide a digital heaven for readers, scholars, and curious minds. Whether
                you’re a student, a researcher, or simply someone who loves to explore the written word, our e-library
                ignites your intellectual journey. Welcome to the future of reading!</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            How can i access for books or resources ?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Browse
                through our extensive collection of e-books, research papers, and other materials. Register for an
                account on our platform. This account will be your gateway to accessing digital content. Search for the
                book or resource you desire. If available, Download the book to your device & read it offline at your
                convenience.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Do i need to create an account to use the e-Library
                  ?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">You can
                explore the available resources in our library. To download and access books, create an account where
                you can manage your activities and keep records.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
        What format are available for ebooks ?
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Books are
                available in PDF format.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseThree">
            Can i read ebooks offline ?
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                Absolutely!
                You can download your desired book and read it offline.</div>
            </div>
          </div>
        </div>
      </div>
    </content>

    <footer id="about-us"
      style="background-color: rgb(44, 44, 44); padding-bottom: 1%; color: white; ">
      <div>
        <center>
          <div class="aboutus" style="width: 85%;">
            <h1 style="color: rgb(255, 166, 0); font-size: 7vmin;">About us</h1>
            <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The
              creation of this website was a collaborative effort by the students of ITM
              department at Ravenshaw University. Our mission is to provide a digital heaven for readers, scholars, and
              curious minds. Whether you’re a student, a researcher, or simply someone who loves to explore the written
              words, our e-library is here to ignite your intellectual journey. We’re passionate about fostering a love
              for
              reading and learning.<br> Feel free to reach out—we’d love to hear from you!<br><br>
              Happy reading! 🌟📖</p>
          </div>
          

          <div class="endline" style="opacity: 0.5;">
            <b>© e-Library. All rights reserved.</b>
            <a class="navitem" href="Contact-us">Contact us</a>
            <a class="navitem" href="report">Report</a>
            <a class="navitem" href="privacy">Privacy</a>
            <i class="ed"">For Educational purpose only</i>
          </div>
        </center>
      </div>

    </footer>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js    "></script>
            <script type="text/javascript" src="js/top.js"></script>

</body>

</html>