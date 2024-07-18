<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dept_website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of CSEA</title>
    <link rel="stylesheet" href="stylesheet.css">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="responsive-card-slider-main/assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="responsive-card-slider-main/assets/css/styles.css">
</head>

<body>
    <div class="hero">
        <div class="upperhero">
            <div class="innerhero">
                <div class="antispace">

                </div>
                <div class="nottext">
                    <marquee direction="left">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ut explicabo provident amet
                            commodi perferendis accusamus fugiat dolorem nemo quibusdam!</p>
                    </marquee>

                </div>
                <div class="loginlogo" id="pop_btn">
                    <img src="images/loginlogo.svg">
                </div>
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div class="login_btn"><a href="./admin_panel/admin_login.php">Admin login</a></div>
                        <div class="login_btn"><a href="./dealer_panel/admin_login.php">Teacher login</a></div>
                    </div>
                </div>
            </div>

            <hr class="line" color="white" width="95%" size="1" align="right">
        </div>

        <div class="dname">
            <div class="collegelogo">
                <img src="images/igit logo.png" alt="">
            </div>
            <div class="vline">
                <img src="images/vline.svg" alt="">
            </div>
            <div class="dtext">
                <p>
                    Department of<br>
                    Computer Science Engineering & Application<br>
                    IGIT, Sarang
                </p>
            </div>
        </div>
        <nav class="nav">
            <!-- <a href=""><img src="images/homeicon.png" width="10%" ></a> -->
            <a href="main.html">Home</a>
            <a href="academics.html">Academics</a>
            <a href="teachers_details.html">Faculties</a>
            <a href="society.html">Society & club</a>
            <a href="events.html">Events</a>
            <a href="placement.html">Placement</a>
            <a href="alumini.html">Alumni</a>
            <a href="">More</a>
        </nav>

    </div>
    <div class="zero">
        <div class="dheading">
            <p>Department About</p>
            <hr color="black" size="3" width="25%">
        </div>
        <div class="lowerzero">
            <div class="dimg">
                <img src="images/dimg.JPG" alt="">
            </div>
            <div class="dabout">
                <p>"The Computer Science Engineering & Application Department at IGIT Engineering College stands as a
                    beacon of innovation and academic excellence within the institution. Renowned for its cutting-edge
                    curriculum and dynamic faculty, the department cultivates a nurturing environment where students
                    thrive in the realm of technology. With state-of-the-art laboratories and industry-relevant
                    projects, students are equipped with practical skills and theoretical knowledge essential for
                    tackling real-world challenges. Collaborative research initiatives and industry partnerships further
                    enrich the learning experience, ensuring graduates are well-prepared for the rapidly evolving
                    landscape of computer science and its applications. Under the guidance of dedicated faculty members,
                    students explore diverse domains such as artificial intelligence, data science, cybersecurity, and
                    software engineering, empowering them to become future leaders and innovators in the field."</p>
            </div>
        </div>

    </div>
    <div class="scooter">
        <div class="twossion">
            <div class="mission">
                <div class="missheading">
                    <p>Mission</p>
                    <hr color="black" size="3" width="60%">
                </div>
                <div class="misstext">
                    <p>
                    <ul>
                        <li>To facilitate improve technologies and focus on vital services by strengthening the quality
                            of life with leadership and self-sufficiency to create enthusiasm among the students towards
                            nation building.</li>
                        <li>To offer a high-quality education in the art and science of computing, as well as to prepare
                            students for career opportunities in this area requiring a high level of technical knowledge
                            and skill.</li>
                    </ul>
                    </p>
                </div>
            </div>
            <div class="vission">
                <div class="vissheading">
                    <p>Vission</p>
                    <hr color="black" size="3" width="60%">
                </div>
                <div class="visstext">
                    <p>
                    <ul>
                        <li>To be a place of academic excellence in frontier areas of Computer Science and Engineering
                            to meet the challenges by bridging the gap between academic and industry so as to promote
                            competitive academic programs through research activities that supports intellectual growth
                            and skill acquisition.</li>
                        <li>To offer a high-quality education in the art and science of computing, as well as to prepare
                            students for career opportunities in this area requiring a high level of technical knowledge
                            and skill.</li>
                    </ul>
                    </p>
                </div>
            </div>

        </div>
        <div class="nboard">
            <div class="noteheading">
                <p>Notice Board</p>
                <hr color="black" size="3" width="60%">
            </div>
            <div class="notebox">
                <div class="box">
                    <?php

                    $sql = "SELECT title, file_path FROM notices ORDER BY date DESC LIMIT 6";
                    $result = $conn->query($sql);

                    // Create an array to store the PDF links
                    $links = [];

                    // Loop through the results and store the links in the array
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $filename = $row['title'];
                            $pdf_data = $row['file_path'];

                            // Generate a unique identifier for the PDF
                            $pdf_identifier = uniqid();

                            // Generate the URL for the PDF file
                            $pdf_file_url = 'pdf.php?file=' . urlencode($pdf_identifier); // Update with the actual URL path
                    
                            $link = '<li><a href="' . $pdf_file_url . '" target="_blank">' . $filename . '</a></li>';
                            $links[] = $link;

                            // Store the PDF data in a session variable for retrieval in the PDF file
                            $_SESSION[$pdf_identifier] = $pdf_data;
                        }
                    } else {
                        echo "Query execution failed: " . mysqli_error($connection);
                    }

                    // Close the database connection
// mysqli_close($connection);
                    ?>

                    <div class="containernb">
                        <div class="nbcal">
                            <div class="text">
                            </div>
                            <div class="box">

                                <marquee class="mar" direction="up" onmouseover="stop()" onmouseout="start()">
                                    <ul>
                                        <p>
                                        <?php
                                        // Display the links in the notice board
                                        foreach ($links as $link) {
                                            echo $link;
                                        }
                                        ?>
                                        </p>
                                    </ul>
                                </marquee>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hodmsg">
        <div class="hodimg">
            <img src="images/hodimg.JPG" alt="">
        </div>
        <div class="msg">
            <div class="msghead">
                <p>HOD's Message</p>
                <hr color="black" size="3" width="40%">
            </div>
            <div class="msgtext">
                <p>"It is an honor to be part of this dynamic community dedicated to advancing knowledge and innovation
                    in the field of computer science.
                    As we embark on this academic journey together, I am filled with enthusiasm and anticipation for the
                    remarkable opportunities that lie ahead. Our department stands at the forefront of cutting-edge
                    research, education, and technological development, and I am committed to fostering an environment
                    where creativity, collaboration, and excellence thrive."
                </p>
            </div>
        </div>

    </div>
    <section id="Faculties">
        <div class="teacher">
            <div class="thead">
                <p>Faculty Details</p>
                <hr color="black" size="4" width="20%">
            </div>
            <div class="container">
                <section class="container">
                    <div class="card__container swiper">
                        <div class="card__content">
                            <div class="swiper-wrapper">
                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/hod.jpeg" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr.(Mrs.) Sasmita Mishra</h3>
                                        <p class="card__description">
                                            Professor<br>(Head of the Departmet)
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/sn.JPG" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr. Sarojananda Mishra</h3>
                                        <p class="card__description">
                                            Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/sree.JPG" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr. Srinivas Sethi</h3>
                                        <p class="card__description">
                                            Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/avatar-4.png" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr. Biswanath Sethi</h3>
                                        <p class="card__description">
                                            Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/dlp.JPG" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr. Dillip Ku. Swain</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/avatar-4.png" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Mr. Medimi Srinivas</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/nkp.jpg" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr. Niroj Kumar Pani</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>


                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/pri.JPG" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Mr. Priyabrata Sahu</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>


                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/snj.JPG" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr. Sanjaya Ku. Patra</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>


                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/avatar-4.png" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Mrs. Anupama Sahu</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>


                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/avatar-4.png" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Mr. Bapuji Rao</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/avatar-4.png" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Mr. Binaya Kumar Patra</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/rks.jpg" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Mr. Ramesh Kumar Sahoo</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/sp.jpg" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr.(Mrs.) Sangita Pal</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/skn.jpg" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr. Sangram Keshari Nayak</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/sbr.jpg" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Dr. Subhendu Bhusan Rout</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/sl.jpg" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Miss. Supriya Lenka</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/sks.jpg" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Mr. Susanta Kumar Sahoo</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>

                                <article class="card__article swiper-slide">
                                    <div class="card__image">
                                        <img src="responsive-card-slider-main/assets/img/skj.jpg" alt="image"
                                            class="card__img">
                                        <div class="card__shadow"></div>
                                    </div>

                                    <div class="card__data">
                                        <h3 class="card__name">Mr. Suvendu Kumar Jena</h3>
                                        <p class="card__description">
                                            Asst. Professor
                                        </p>

                                        <a href="#" class="card__button">View More</a>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <!-- Navigation buttons -->
                        <div class="swiper-button-next">
                            <i class="ri-arrow-right-s-line"></i>
                        </div>

                        <div class="swiper-button-prev">
                            <i class="ri-arrow-left-s-line"></i>
                        </div>

                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </section>

                <!--=============== SWIPER JS ===============-->
                <script src="responsive-card-slider-main/assets/js/swiper-bundle.min.js"></script>

                <!--=============== MAIN JS ===============-->
                <script src="responsive-card-slider-main/assets/js/main.js"></script>
            </div>
    </section>

    </div>
    <div class="footer">
        <div class="footfirst">
            <img src="images/igit logo.png" alt="">
            <p>Department of Computer Science Engineering & Application<br>
                IGIT, Sarang, 756146<br>
                Office: Biju Patnaik Academic Building, 2nd floor
            </p>
        </div>
        <div class="footlast">
            <p>2020-2024 CSE major project, team 4</p>
        </div>
    </div>
    <script>
        var modal = document.getElementById("myModal");

        var btn = document.getElementById("pop_btn");

        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function () {
            modal.style.display = "block";
        }

        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>