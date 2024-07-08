<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>

<body>

    <div class="title-heading">
        <h2 class="heading">CONTACT US</h2>
        <div class="contact-row">
            <div class="contact-form">
                <h2>GET IN TOUCH WITH US</h2>
                
                <form class="contact" action="" method="post">
                    <input type="text" name="name" class="text-box" placeholder="Your Name" disabled><br>
                    <input type="email" name="email" class="text-box" placeholder="Your Email" disabled>
                    <input type="text" name="contact" class="text-box" placeholder="Your Contact" disabled><br>
                    <textarea name="message" rows="5" placeholder="Your Message" disabled></textarea>
                    <center><button class="button-40" role="button">SEND</button></center>
                </form>
            </div>
            <div class="contact-image" align="center">
                <img src="./images/bg2.jpg">

            </div>
        </div>

        <div class="map-container">
            <div class="info-section">
                <h2>VISIT US HERE <br>AT OUR PHYSICAL STORE</h2>
                <p><i class="fa fa-phone"></i> 9840012570</p>
                <p><i class="fa fa-envelope"></i> book.things@gmail.com</p>
                <p><i class="fa fa-map-marker"></i> Jhochhen, Kathmandu</p>
                <p><i class="fa fa-clock-o"></i> Sunday to Friday 11:00am-8:00pm</p><br>
                
            </div>
            <div class="map-section">
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14129.914942916641!2d85.29823131620418!3d27.702501418707808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1932ff24afc1%3A0xd61489cc96129a4c!2sBook.Things!5e0!3m2!1sen!2snp!4v1714715041791!5m2!1sen!2snp"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>