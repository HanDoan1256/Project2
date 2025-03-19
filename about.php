<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet the Team</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <?php include 'header.inc'; ?>

    <section class="intro">
        <div class="image-container">
            <img src="images/grouppic.png" alt="Team Picture">
            <h1>MEET THE TEAM</h1>
        </div>
    </section>
    
    
    <h2 class="abth2"> <span class="abt2light">DEFINITION</span> LIST</h2>
    <section class="definition-container">
        <div class="definition">
        <dl>
            <dt>Group Name</dt>
            <dd>BlueMatrix</dd>

            <dt>Group information</dt>
            <dd><a href="mailto:bluematrix2025@gmail.com">bluematrix2025@gmail.com</a></dd>

            <dt>Tutor's name</dt>
            <dd><a href="mailto:trungnguyen@swin.edu.vn">Tristan Nguyen</a></dd>

            <dt>Nguyen Le Thuy Duong</dt>
            <dd>Implemented the "eoi" table in MySQL to efficiently store applicant data. She developed the PHP script (process_eoi.php) to validate and store form submissions, displaying a confirmation page with the unique EOInumber. Duong also built the HR manager interface (manage.php) to manage EOIs.</dd>

            <dt>Doan Gia Han</dt>
            <dd>Modularized the website by creating reusable include files for static elements like the menu, header, and footer using PHP. She also developed a dynamic system to store and display job descriptions from the MySQL database.</dd>

            <dt>Ngo Quynh Nhu</dt>
            <dd>Created the "settings.php" file to ensure secure database connections across the website and updated the About page to reflect team contributions and the project timeline.</dd>

            <dt>Vo Nguyen Minh</dt>
            <dd>Assisted in designing the "eoi" table in MySQL and contributed to the development of the PHP script (process_eoi.php) for validating and storing form submissions. He also helped build the HR manager interface (manage.php) for managing EOIs.</dd>
        </dl>
        </div>
        <div class="defi">
            <figure>
                <a href="#TD"><img src="images/THUYDUONG.JPG" alt="Nguyen Le Thuy Duong"></a>
                <a href="#GH"><img src="images/han.jpg" alt="Doan Gia Han"></a>
                <a href="#QN"><img src="images/nhu.png" alt="Ngo Quynh Nhu"></a>
                <a href="#NM"><img src="images/minh.jpg" alt="Vo Nguyen Minh"></a>
            </figure>
        </div>
    </section>

    <section class="team-container">
        <div id="TD" class="team-member">
            <img src="images/THUYDUONG.JPG" alt="Nguyen Le Thuy Duong">
            
            <div class="team-info">
                <h3>Nguyen Le Thuy Duong</h3>
                <p>Student ID: 105080751</p>
                <p>Email:</strong> <a href="mailto:thuyyduonggg08@gmail.com">thuyyduonggg08@gmail.com</a></p>
                <p>Major: Data Science</p>
            </div>
        </div>

        <div class="team-member">
            <img src="images/han.jpg" alt="Doan Gia Han">
            <div id="GH" class="team-info">
                <h3>Doan Gia Han</h3>
                <p>Student ID: 105506817</p>
                <p>Email: <a href="mailto:handoangia2612@gmail.com">handoangia2612@gmail.com</a></p>
                <p>Major: Data Science</p>
            </div>
        </div>

        <div class="team-member">
            <img src="images/nhu.png" alt="Ngo Quynh Nhu">
            <div id="QN" class="team-info">
                <h3>Ngo Quynh Nhu</h3>
                <p>Student ID: 105312140</p>
                <p>Email: <a href="mailto:quynhnhungo06@gmail.com">quynhnhungo06@gmail.com</a></p>
                <p>Major: Cyber Security</p>
            </div>
        </div>

        <div class="team-member">
            <img src="images/minh.jpg" alt="Vo Nguyen Minh">
            <div id="NM" class="team-info">
                <h3>Vo Nguyen Minh</h3>
                <p>Student ID: 105505636</p>
                <p>Email: <a href="mailto:nguyenminhvo2802@gmail.com">nguyenminhvo2802@gmail.com</a></p>
                <p>Major: Data Science</p>
            </div>
            
        </div>
    </section>

     <?php
    // Include database connection settings
    require_once "settings.php";
    $conn = new mysqli($host, $user, $pwd, $sql_db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch timetable data
    $query = "SELECT * FROM timetable ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')";
    $result = $conn->query($query);
    ?>

    <section class="timetable">
        <h2>TIMETABLE</h2>
        <div>
            <?php
            // Display timetable for each day
            if ($result && $result->num_rows > 0) {
                // Initialize an array to hold timetable data for each day
                $days = [
                    'Sunday' => '',
                    'Monday' => '',
                    'Tuesday' => '',
                    'Wednesday' => '',
                    'Thursday' => '',
                    'Friday' => '',
                    'Saturday' => ''
                ];

                // Fill the days array with class information from the database
                while ($row = $result->fetch_assoc()) {
                    $day = $row['day_of_week'];
                    $class_info = $row['class_name'] . " (" . $row['start_time'] . " - " . $row['end_time'] . ")";
                    $days[$day] .= "<div class='{$row['class_name']}'>{$class_info}</div>";
                }

                // Output the timetable table
                echo '<table>';
                echo '<tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                      </tr>';

                // Print the rows for each day
                echo '<tr>';
                foreach ($days as $day => $classes) {
                    echo "<td class='cell'>{$classes}</td>";
                }
                echo '</tr>';
                echo '<tr>';
                foreach ($days as $day => $classes) {
                    echo "<td class='cell'>{$classes}</td>";
                }
                echo '</tr>';
                echo '<tr>';
                foreach ($days as $day => $classes) {
                    echo "<td class='cell'>{$classes}</td>";
                }
                echo '</tr>';
                echo '<tr>';
                foreach ($days as $day => $classes) {
                    echo "<td class='cell'>{$classes}</td>";
                }
                echo '</tr>';
                echo '</table>';
            } else {
                echo "<p>No timetable data found.</p>";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </section>
        </div>
    </section>
    
    <h2 class="abth2"> <span class="abt2light">ABOUT</span> US </h2>

    <section class="about" id="about">
        <div class="row">
            <div class="image-container">
                <img src="images/group.png">
            </div>
        
            <div class="content">
                <h3> WHY JOIN US?</h3>
                <p>At BlueMatrix, we are driven by innovation, collaboration, and a passion for technology. Join us to work on cutting-edge projects that make a real impact, while continuously growing through mentorship and skill development. We foster a supportive and diverse culture where your ideas are valued, and you’ll have access to the latest technologies to stay ahead in the industry. With flexible work arrangements and competitive benefits, we ensure a balanced and fulfilling career experience. Be part of something bigger—let’s build the future together!</p>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <hr/>
    <?php include 'footer.inc'; ?>
</body>
</html>
