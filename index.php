
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Hompage of Company BlueMatrix" />
  <meta name="keywords" content="HTML5, BlueMatrix, company IT, assignment" />
  <meta name="author" content="Nguyen Le Thuy Duong" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HOMEPAGE</title>
  <link href="styles/style.css" rel ="stylesheet"/>
</head>
<body>
    <?php include 'header.inc'; ?>
    <section class="intro-content">
            <h1><b>BLUEMATRIX</b></h1>
            <h3>The Tide of Innovation</h3>
    </section> 
    <main>
        <section class="companyintro">
            <a href ="https://youtu.be/1mZYAlfRkYE" ><img src="images/youtube.png" alt="Youtube Link to Group Video"></a>
            <div class="content">
              <h2><b>At BlueMatrix</b></h2>
               <p>We help businesses navigate the ever-evolving tech landscape by providing cutting-edge solutions tailored to their unique needs. Our team is passionate about driving innovation, leveraging the latest advancements in technology to create scalable, secure, and data-driven systems. Click on the picture to go to our instruction video.</p>
            </div>
        </section>

        <section class="pjcts">
            <h2><b>Our Projects</b></h2>
            <div class="img-container">
                <a href="images/1.png"><img src="images/1.png" alt="work"></a>
                <a href="images/2.png"><img src="images/2.png" alt="work"></a>
                <a href="images/3.png"><img src="images/3.png" alt="work"></a>
                <a href="images/4.png"><img src="images/4.png" alt="work"></a>
                <a href="images/5.png"><img src="images/5.png" alt="work"></a>
                <a href="images/6.png"><img src="images/6.png" alt="work"></a>
            </div>
        </section>

        <section class="introteam">
            <h2><b>Meet Us!</b></h2>
            <a href="about.html">Click to see</a> <br> 
            <div class="pic-container">
                <figure>
                    <a href="images/THUYDUONG.JPG"><img src="images/THUYDUONG.JPG" alt="team member duong"></a>
                    <figcaption>Thuy Duong</figcaption>
                </figure>    
                <figure>
                    <a href="images/han.jpg"><img src="images/han.jpg" alt="team member han"></a> 
                    <figcaption>Gia Han</figcaption>
                </figure>
                <figure>
                    <a href="images/nhu.jpg"><img src="images/nhu.png" alt="team member nhu"></a> 
                    <figcaption>Quynh Nhu</figcaption>
                </figure>
                <figure>
                    <a href="images/minh.jpg"><img src="images/minh.jpg" alt="team member minh"></a> 
                    <figcaption>Nguyen Minh</figcaption>
                </figure>
            </div>
        </section>  
    
        <br>
       <br>
       <br>

       <hr/>
       <?php include 'footer.inc'; ?>
    </main> 
</body>
</html>