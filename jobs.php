<?php
require_once "settings_asm.php";
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch job listings
$query =  "SELECT * FROM jobs";
$result = $conn->query($query);

// Map job references to corresponding image filenames
$job_images = [
    "SD001" => "SD.jpg",
    "DA001" => "STA.jpg",
    "SBE01" => "BE.jpg"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Job Positions</title>
    
</head>
<body>
    <?php include 'header.inc'; ?>
    <div class="jobs-header">
        <h1>WE ARE HIRING</span></h1>
        <h3>Join our team and be part of our innovative journey.</h3>
    </div>
    
    
    <section>
        <br>
        <div class ="typewriter" >We Are Looking For : <span class="typewriter-text"></span> <label for="positions"></label> </div>
        <br>
        <br>
        <div class="job-images">
            <a href ="#SD" ><img src="images/SD.jpg" alt="Software Developer"></a>
            <a href ="#STA" ><img src="images/STA.jpg" alt="Data Analyst"></a>
            <a href ="#BE" ><img src="images/BE.jpg" alt="Senior Backend Engineer"></a>
        </div>
        <br>
        <p>We are currently seeking talented individuals for the roles of Software Developer, Data Analyst, and Senior Backend Engineer. If you have a passion for technology, data, and software development, this is your opportunity to join a dynamic and innovative team.</p>
        <br>
        <br>
    </section>
    
    <main>
        <br>
        <br>
        <br>
    <section>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $job_ref = htmlspecialchars($row["job_ref"]);
                    $image_src = isset($job_images[$job_ref]) ? "images/" . $job_images[$job_ref] : "images/default.jpg";

                    echo "<div class='job-container'>";
                    echo "<img src='$image_src' alt='" . htmlspecialchars($row["job_title"]) . "'>";
                    echo "<div class='job-details'>";
                    echo "<h2 id='$job_ref'>" . htmlspecialchars($row["job_title"]) . "</h2>";
                    echo "<p><strong>Reference Number:</strong> " . $job_ref . "</p>";
                    echo "<p><strong>Brief Description:</strong> " . htmlspecialchars($row["job_description"]) . "</p>";
                    echo "<p><strong>Salary Range:</strong> " . htmlspecialchars($row["job_salary"]) . "</p>";
                    echo "<p><strong>Reports To:</strong> " . htmlspecialchars($row["job_incharge"]) . "</p>";

                // Display responsibilities and requirements while preserving HTML
                    echo  htmlspecialchars_decode($row["job_responsibility"]) ;
                    echo  htmlspecialchars_decode($row["job_requirements"]) ;

                    echo "</div></div><br>";
                }
            } else {
                echo "<p>No job openings available at the moment.</p>";
            }

            $conn->close();
        ?>
    </section>
        

        <br>
        <div class="apply-banner">
            <a href="apply.html#apply"><button> Apply now </button></a>
        </div>
        
        <br>
        <div class="aside-container">
            <aside>
                <h3>Why Join Us?</h3>
                <p>We are a forward-thinking tech company dedicated to innovation and excellence.</p>
    
                <h4>Our Hiring Process</h4>
                <ol>
                    <li>Submit your application</li>
                    <li>Initial screening</li>
                    <li>Technical interview</li>
                    <li>Final HR discussion</li>
                    <li>Offer & onboarding</li>
                </ol>

                <h4>Employee Benefits</h4>
                <ul>
                    <li>Flexible work schedule</li>
                    <li>Remote work opportunities</li>
                    <li>Health insurance</li>
                    <li>Professional development programs</li>
                </ul>
            </aside>
             <video autoplay loop muted>
                <source src="images/company_intro.mp4" type="video/mp4">
            </video>
        </div>

    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr/>
    <?php include 'footer.inc'; ?>
</body>
</html>
