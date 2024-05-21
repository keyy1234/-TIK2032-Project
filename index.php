<?php
include "database.php";
// Proses data dari formulir jika ada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    // Persiapkan dan bind
    $stmt = $mysqli->prepare("INSERT INTO comments (username, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $comment);
    if ($stmt->execute()) {
        // Redirect setelah sukses menyimpan komentar untuk mencegah pengiriman ulang data
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit(); // Hentikan eksekusi setelah pengalihan
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Ambil semua komentar dari database
$result = $mysqli->query("SELECT username, comment, created_at FROM comments ORDER BY created_at DESC");

$comments = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

$mysqli->close();
?>
===========================================================================================================================

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!--css file  -->
<link rel="stylesheet" href="css/style.css"> 
<link rel="stylesheet" href="css/skins/color-1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<!-- stylee switcher -->
<link rel="stylesheet" href="css/skins/color-1.css" class="alternate-style" title="color-1" 
disabled>
<link rel="stylesheet" href="css/skins/color-2.css" class="alternate-style" title="color-2" 
disabled>
<link rel="stylesheet" href="css/skins/color-3.css" class="alternate-style" title="color-3" 
disabled>
<link rel="stylesheet" href="css/skins/color-4.css" class="alternate-style" title="color-4" 
disabled>
<link rel="stylesheet" href="css/skins/color-5.css" class="alternate-style" title="color-5" 
disabled>
<link rel="stylesheet" href="css/style-switcher.css">
</head>
<body>
    <!-- main countainer start -->
    <div class="main-countainer">
        <!-- aside start -->
        <div class="aside">
            <div class="logo">
                <a href="#"><span>X</span>yren</a>
            </div>
            <div class="nav-toggler">
                <span></span>
            </div>
            <ul class="nav">
                <li><a href="#home" class="active"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#about"><i class="fa fa-user"></i> About</a></li>
                <li><a href="#services"><i class="fa fa-list"></i> Blog</a></li>
                <li><a href="#portofolio"><i class="fa fa-briefcase"></i> Images</a></li>
                <li><a href="#contact"><i class="fa fa-comments"></i>Contact</a></li>
                <li><a href="#coment"><i class="fa fa-comments"></i>Comment</a></li>
 

            </ul>
        </div>
        <!-- aside end -->
        <!-- main content start -->
        <div class="main-content">
            <!-- home section start -->
            <section class="home active section" id="home">
                <div class="container">
                    <div class="row-home">
                        <div class="home-info padd-15">
                            <h3 class="hello">Hallo, saya <span class="name">Dafa Wantasen</span></h3>
                            <h3 class="my-profession">Mahasiswa <span class="typing">web designer</span></h3>
                            <p>Saya sedang kuliah di Universitas Sam Ratulangi</p>
                            <a href="#contact" class="btn hire-me">Hire me</a>
                        </div>
                        <!-- <div class="home-img padd-15">
                            <img src="images/10B57F23-F4AF-462F-87ED-0E5F2815EFEC-1.jpeg" alt="">
                        </div> -->
                    </div>
                </div>
            </section>
            <!-- home section end  --> 
            <!-- about section start -->
            <section class="about section" id="about">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>About Me</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="about-content padd-15">
                            <div class="row">
                                <div class="about-text padd-15">
                                    <h3>Saya Dafa Wantasen <span>Jurusan Informatika</span></h3>
                                    <p>Sekarang saya sedang berada di semester 4 ingin memperbanyak relasi dan 
                                        aktif ber organisasi </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="personal-info padd-15">
                                    <div class="row">
                                        <div class="info-item padd-15">
                                            <p>Major : <span>Informatics Engineering</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Age : <span>19</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Hobby : <span>Football</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Email : <span>dafa@gmail.com</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Country : <span>Indonesia</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Phone : <span>0895627448146</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>City : <span>Manado</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Freelance : <span>Available</span></p>
                                        </div>
                                    </div>
                                    <div class="home-img padd-15">
                            <img src="images/IMG20230430170630.jpg" alt="">
                        </div> 
                                    <div class="row">
                                        <div class="buttons padd-15">
                                            <a href="#" class="btn">Download Cv</a>
                                            <a href="#contact" class="btn hire me">Contact Me</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about section end  -->
            <!-- service section start -->
            <section class="service section" id="services">
        <div class="container">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Artikel</h2>
                </div>
            </div>
            <div class="row">
                <?php
                // Koneksi ke database
                $host = 'localhost';
                $db = 'artikeldb';
                $user = 'root'; // ganti dengan user database Anda
                $pass = ''; // ganti dengan password database Anda

                $mysqli = new mysqli($host, $user, $pass, $db);

                if ($mysqli->connect_error) {
                    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                }

                // Ambil data dari database
                $sql = "SELECT id, icon, category, title, link FROM articles";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="service-item padd-15">';
                        echo '    <div class="service-item-inner">';
                        echo '        <div class="icon">';
                        echo '            <i class="fa ' . $row["icon"] . '"></i>';
                        echo '        </div>';
                        echo '        <h4>' . $row["category"] . '</h4>';
                        echo '        <p>' . $row["title"] . '</p>';
                        echo '        <a href="' . $row["link"] . '">Baca Selengkapnya</a>';
                        echo '        <form method="POST" action="delete_article.php" style="display:inline;">';
                        echo '            <input type="hidden" name="id" value="' . $row["id"] . '">';
                        echo '            <button type="submit">Hapus</button>';
                        echo '        </form>';
                        // echo '        <button type="submit">Hapus</button>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                $mysqli->close();
                ?>
            </div>
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Tambah Artikel</h2>
                </div>
            </div>
            <div class="row">
            <form action="add_article.php"  method="POST">
                    <input type="hidden" name="access_key" value="d763eb42-ab71-47a5-9bd0-6adb03e043fa">
                    <div class="row">
                        <div class="contact-form padd-15">
                            <div class="row">
                                <div class="form-item col-6 padd-15">
                                    <div class="form-grup">
                                        <input type="text" class="form-control" placeholder="Kategori" name="category" required>
                                    </div>
                                </div>
                                <div class="form-item col-6 padd-15">
                                    <div class="form-grup">
                                        <input type="text" class="form-control" placeholder="Judul" name="title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-grup">
                                        <input type="text" class="form-control" placeholder="Link" name="link" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <button type="submit" class="btn">Tambah Artikel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
            <!-- service section end   -->
             <!-- portofolio section start   -->
             <section class="portofolio section" id="portofolio">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Picture</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="portofolio-heading padd-15">
                            <h2</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!-- portofolio item start -->
                        <div class="portofolio-item padd-15">
                            <div class="portofolio-item-inner shadow-dark">
                               <div class="portofolio-img">
                                <img src="images/PXL_20231206_140225444.jpg" alt="">
                               </div> 
                            </div>
                        </div>
                         <!-- portofolio item end -->
                          <!-- portofolio item start -->
                        <div class="portofolio-item padd-15">
                            <div class="portofolio-item-inner shadow-dark">
                               <div class="portofolio-img">
                                <img src="images/image1.jpg" alt="">
                               </div> 
                            </div>
                        </div>
                         <!-- portofolio item end -->
                          <!-- portofolio item start -->
                        <div class="portofolio-item padd-15">
                            <div class="portofolio-item-inner shadow-dark">
                               <div class="portofolio-img">
                                <img src="images/image2.jpg" alt="">
                               </div> 
                            </div>
                        </div>
                         <!-- portofolio item end -->
                          <!-- portofolio item start -->
                        <div class="portofolio-item padd-15">
                            <div class="portofolio-item-inner shadow-dark">
                               <div class="portofolio-img">
                                <img src="images/gambar5.jpg" alt="">
                               </div> 
                            </div>
                        </div>
                         <!-- portofolio item end -->
                          <!-- portofolio item start -->
                        <div class="portofolio-item padd-15">
                            <div class="portofolio-item-inner shadow-dark">
                               <div class="portofolio-img">
                                <img src="images/image4.jpg" alt="">
                               </div> 
                            </div>
                        </div>
                         <!-- portofolio item end -->
                          <!-- portofolio item start -->
                        <div class="portofolio-item padd-15">
                            <div class="portofolio-item-inner shadow-dark">
                               <div class="portofolio-img">
                                <img src="images/image5.JPG" alt="">
                               </div> 
                            </div>
                        </div>
                         <!-- portofolio item end -->
                    </div>
                </div>
             </section>
             <!-- portofolio section end   -->
             <!-- contact section start  -->
             <section class="contact section" id="contact">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Contact Me</h2>
                        </div>
                    </div>
                    <h3 class="contact-title padd-15">Have You Any Questions</h3>
                    <h4 class="contact-sub-title padd-15">I'M AT YOUR SERVICES</h4>
                    <div class="row">
                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-phone"></i></div>
                            <h4>Call Us On</h4>
                            <p>+6295627448146</p>
                        </div>
                        <!-- contact info item end -->
                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                            <h4>Office</h4>
                            <p>Minanga Indah</p>
                        </div>
                        <!-- contact info item end -->
                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <h4>Email</h4>
                            <p>dafawantasen19@gmail.com</p>
                        </div>
                        <!-- contact info item end -->
                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-globe-europe"></i></div>
                            <h4>Website</h4>
                            <p>www.domain.com</p>
                        </div>
                        <!-- contact info item end -->
                    </div>
                    <h3 class="contact-title padd-15">SEND ME AN EMAIL</h3>
                    <h4 class="contact-sub-title padd-15">I'M VERY RESPONSIVE TO MASSAGES</h4>
                    <!-- Contact fomrs -->
                    <div class="row">
                        <div class="contact-form padd-15">
                            <!-- Form for sending message and email -->
                            <form action="https://api.web3forms.com/submit" method="POST">
                                <input type="hidden" name="access_key" value="d763eb42-ab71-47a5-9bd0-6adb03e043fa">
                                <div class="row">
                                    <div class="contact-form padd-15">
                                        <div class="row">
                                            <div class="form-item col-6 padd-15">
                                                <div class="form-grup">
                                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                                </div>
                                            </div>
                                            <div class="form-item col-6 padd-15">
                                                <div class="form-grup">
                                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-item col-12 padd-15">
                                                <div class="form-grup">
                                                    <input type="text" class="form-control" placeholder="Subject" name="subject">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-item col-12 padd-15">
                                                <div class="form-grup">
                                                    <textarea name="message" class="form-control" id="" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-item col-12 padd-15">
                                                <button type="submit" class="btn">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
             </section>
             <!-- contact section end  -->
        </div>
        <!-- main content end -->
    </div>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> 

    <title>Comments</title>
    <style>
        .service-item {
            margin-bottom: 20px;
        }

        .service-item-inner {
            position: relative;
            padding-bottom: 30px; /* Menambahkan ruang di bawah untuk tombol */
        }
        
        .form-grup {
    margin-bottom: 15px;
}

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }


        form label {
        display: block;
        font-weight: bold;
        /* margin-bottom: 10px; */
        color: #555;
     
        }
       button {
        width: 150px;
        padding: 10px;
        border: none;
        background-color: var(--skin-color);
        color: white;
        border-radius: 5px;
        cursor: pointer;
        align-self: center;
        }
        .comment {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            color: var(--text-black-900);
        }
        .comment h4 {
            margin: 0;
            color: var(--skin-color);
        }
        .comment p {
            margin: 5px 0;
            color: var(--text-black-900);
        }
        .comment small {
            color: #777;
        }
        #comments {
            margin-top: 20px;
        }
        form input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        }
        .coment h1 {
            color: var(--text-black-900);
        }
        
    </style>
</head>
<body>
    <div class="portofolio section" id="coment">
    <div class="row">
                <div class="section-title padd-15">
                    <h2>Leave a Comment</h2>
                </div>
            </div>
        <form action="index.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" required></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
    
        <div class="row">
                <div class="section-title padd-15">
                    <h2>Comment</h2>
                </div>
            </div>
        <div id="comments">
          <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <h4><?php echo htmlspecialchars($comment['username']); ?></h4>
            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
            <small>Posted on <?php echo $comment['created_at']; ?></small>
        </div>
         <?php endforeach; ?>
        </div>
          </div>
</body>
</html>


    <!-- main countainer end -->
    <!-- style switcher start -->
    <div class="style-switcher">
        <div class="style-switcher-toggler s-icon">
            <i class="fas fa-cog fa-spin"></i>
        </div>
        <div class="day-night s-icon">
            <i class="fas fa-moon"></i>
        </div>
        <h4>Theme Colors</h4>
        <div class="colors">
            <span class="color-1" onclick="setActiveStyle('color-1')"></span>
            <span class="color-2" onclick="setActiveStyle('color-2')"></span>
            <span class="color-3" onclick="setActiveStyle('color-3')"></span>
            <span class="color-4" onclick="setActiveStyle('color-4')"></span>
            <span class="color-5" onclick="setActiveStyle('color-5')"></span>
        </div>
    </div>
      <!-- style switcher end
      js file  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.js"
    referrerpolicy="no-referrer"></script>
     <script src="js/script.js"></script>
    <script src="js/style-switcher.js"></script>
</body>
</html>