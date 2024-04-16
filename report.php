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
        <form id="report" action="reportdone.php" method="post">
            <header>
                <h1>
                    REPORT A PROBLEM
                </h1>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We value your input! If you have any feedback, suggestions, or questions related to our website, feel free to reach out. 

                    Your feedback helps us improve and enhance your experience. Additionally, if you need assistance or have any queries, don’t hesitate to contact us. We’re here to assist you!                </p>
            </header>
            <label for="name">Name</label>
            <input type="text" id="name" class="inputs" required name="username">
            <label for="ph">Phone</label>
            <input type="text" id="ph" class="inputs" name="phone">
            <label for="Email">Email</label>
            <input type="email" id="Email" class="inputs" required name="user-email">
            <label for="comment">Leave your message here</label>
            <textarea type="" id="comment" maxlength="40" required name="comment"></textarea>
            <button type="submit">SUBMIT</button>
        </form>
    </center>
</body>

</html>