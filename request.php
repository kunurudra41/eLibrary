<?php 
session_start();
if (!isset($_SESSION['user_name']))
 {
   header('location:login');
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/report.css">
    <link rel="icon" href="https://static.vecteezy.com/system/resources/previews/010/366/210/original/bell-icon-transparent-notification-free-png.png" title="report">
    <title>Report</title>
</head>

<body>
    <center>
        <form id="request" action="requestdone" method="post">
            <header>
                <h1>
                    REQUEST
                </h1>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Certainly! If the book you’re searching for is unavailable, don’t hesitate to submit a request on our platform.  We will endeavor to include your requested book within 30 days and will promptly notify you of any updates. Please keep an eye on your email for the latest information.</p>
            </header>
            <label for="name">Requested book name</label>
            <input type="text" id="name" class="inputs" required name="name">
            <label for="author">Author name</label>
            <input type="text" id="author" class="inputs" name="author" required>
            <label for="year">Published Year</label>
            <input type="year" id="year" class="inputs"  name="year">
           
            <button type="submit">SUBMIT</button>
        </form>
    </center>
</body>

</html>