<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Welcome to E-Library, your digital oasis for books and knowledge.">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home.css">
  <title>eLibrary - A place for Readers</title>
  <link rel="icon" href="https://cdn-icons-png.freepik.com/512/10089/10089764.png" title="books icons">
</head>

<body style="background-image: url(https://m.media-amazon.com/images/I/91cQQg+D0hL._AC_SX679_.jpg); background-size: contain;">
  <div style="background-color: rgba(255, 255, 255, 0.7);">
    <nav>
      <a href="index.php" style="text-decoration: none;"><big style="color: rgb(226, 183, 43);">&lt;<b
            style="color: white; font-size: 3vmin;">elib.io</b>&gt;</big></a>
           <?php      
if (isset($_SESSION['admin_username'])) {
$account='admin_dashboard.php';
    echo '<a class="navitem" href="'.$account.'">My account</a>';
    }
    else if(isset($_SESSION['user_name'])) {
        $account='userpage.php';
            echo '<a class="navitem" href="'.$account.'">My account</a>';
    }
 else
{
    $login='login.html';
    echo '<a class="navitem" href="'.$login.'">Sign in</a>';
}
           ?> 
      <a class="navitem" href="https://forms.gle/K7dTuhwY8aFXZ1ZZ7" target="_blank">Submission</a>
      <a class="navitem" href="https://forms.gle/nVDKtZbSgJhogk6p6" target="_blank">Request</a>
      <a class="navitem" href="#bookssuggestion">Featured books</a>
    </nav>
    <div class="bgphotoroot"></div>
    <div class="bg"></div>

    <header
      style="background-image: url(https://i.pinimg.com/736x/e9/2d/e4/e92de44ab0c2689e8ca93c89f5e50f50.jpg); background-repeat: no-repeat; background-size: cover; color: white;">
      <div style="background-color: rgba(0, 0, 0, .6);" >

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
            </p><form action="search.php" method="GET">
            <div id="searchbox">
              <input name="searchhere" aria-label="search for books" autocomplete="off" inputmode="search"
                placeholder="  Book Name, Author, SLno" type="search" />
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
}
    else
    {
$booklink='login.html';
$bookcover=$row['bookcover'];
    }
         echo ' <div class="ebooks">
            <a href="'.$booklink.'"
              style="text-decoration: none; color: rgb(0, 0, 0);">
              <img class="bookthumbnail" src="'.$bookcover.'" alt="MALGUDI DAYS" width="100%">
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
                <a href="CreateAccount.php" style="color: white; background-color: rgb(0, 89, 255);" class="cardbotton">Sign up</a>
              </div>
            </center>
          </div>

          <div class="cards">
            <center>
              <div class="cardbody">
                <img src="https://cdn-icons-gif.flaticon.com/8716/8716872.gif" class="card-imgtop" alt="request">
                <p class="cardtext">If the book you’re looking for isn’t available, feel free to make a request on our
                  site.<br></p>
                <a href="https://forms.gle/nVDKtZbSgJhogk6p6" style="color: white; background-color: rgb(0, 89, 255);" class="cardbotton" target="_blank">Request</a>
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
        <h2 style="padding-left: 1%; font-family:Georgia, 'Times New Roman', Times, serif; color: rgb(0, 0, 0);">
          <b>FAQs</b>
        </h2>
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <b>What is the purpose of this e-Library ?</b>
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" style="background-image: linear-gradient(rgb(225, 230, 250),white);">Our
                mission at e-Library is to provide a digital heaven for readers, scholars, and curious minds. Whether
                you’re a student, a researcher, or simply someone who loves to explore the written word, our e-library
                ignites your intellectual journey. Welcome to the future of reading!</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                <b>How can i access for books or resources ?</b>
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" style="background-image: linear-gradient(rgb(225, 230, 250),white);">Browse
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
                <b>Do i need to create an account to use the e-Library
                  ?</b>
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" style="background-image: linear-gradient(rgb(225, 230, 250),white);">You can
                explore the available resources in our library. To download and access books, create an account where
                you can manage your activities and keep records.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                <b>What format are available for ebooks ?</b>
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" style="background-image: linear-gradient(rgb(225, 230, 250),white);">Books are
                available in PDF format.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseThree">
                <b>Can i read ebooks offline ?</b>
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" style="background-image: linear-gradient(rgb(225, 230, 250),white);">
                Absolutely!
                You can download your desired book and read it offline.</div>
            </div>
          </div>
        </div>
      </div>
    </content>

    <footer id="about-us"
      style="background-color: rgb(44, 44, 44); padding-bottom: 1%; color: white; font-size: 2.4vmin;">
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
            <a class="navitem" href="Contact-us.html">Contact us</a>
            <a class="navitem" href="report.php">Report</a>
            <a class="navitem" href="privacy.html">Privacy</a>
            <i class="ed"">For Educational purpose only</i>
          </div>
        </center>
      </div>

    </footer>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js    "></script>
      <script type="text/javascript" src="js/admin.js"></script>
</body>

</html>