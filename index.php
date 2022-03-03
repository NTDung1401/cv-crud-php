<?php
// include_once("config.php");

// $result = mysqli_query($connect, "SELECT * FROM education ORDER BY id ASC"); // using mysqli_query instead
include_once("pdoConfig.php");

$sql = 'SELECT * FROM education';
$stmt = $pdo->prepare($sql);
$stmt->execute();
// $rowCount = $stmt->rowCount();
// $details = $stmt->fetch();

$isEdit = false;
$isAdd = false;

if(isset($_POST['addButton'])) {
    $isAdd = true;
}

if(isset($_POST['cancelAddButton'])) {
    $isAdd = false;
}

$id = "";

if(isset($_POST['editButton'])) {
  $id = $_POST['id'];
  $isEdit = true;
}

if(isset($_POST['cancelEditButton'])) {
  $isEdit = false;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
      <div>
        <div class="group-header">
            <div class="group-name">
                <div class="name-info">
                  <span>NGUYEN THANH DUNG</span>
                </div>

                <div class="job-info">
                  <span>UNIVERSITY STUDENT</span>
                </div>
            </div>

            <div class="group-avatar" style="background-image: url('./asset/avatar.jpg');"></div>
        </div>

        <div class="cv-body">
          <div class="group-left">
            <div class="group-contact">
              <div class="contact-item">
                <i class="fa fa-user"></i>
                <span class="contact-item-content">Male</span>
              </div>

              <div class="contact-item">
                <i class='fa fa-calendar'></i>
                <span class="contact-item-content">14/01/2000</span>
              </div>

              <div class="contact-item">
                <i class="fa fa-phone"></i>
                <span class="contact-item-content">0522846221</span>
              </div>

              <div class="contact-item">
                <i class="fa fa-envelope"></i>
                <span class="contact-item-content">ntdung.dut@gmail.com</span>
              </div>

              <div class="contact-item">
                <i class="fa fa-globe"></i>
                <span class="contact-item-content">facebook.com/ntdungk18</span>
              </div>

              <div class="contact-item">
                <i class="fa fa-map-marker"></i>
                <span class="contact-item-content">Lien Chieu, Da Nang, Viet Nam</span>
              </div>
          
              <hr class="breakline">
            </div>

            <div class="group-skills">
              <div class="group-title">SKILLS</div>
              
              <div class="skill-item">
                <div class="skill-title">Language</div>

                <p class="skill-content">English, Japanese</p>
              </div>

              <div class="skill-item">
                <div class="skill-title">Programming language</div>

                <p class="skill-content">
                    - C/C++ <br/>
                    - Java <br/>
                    - C# <br/>
                    - HTML/CSS <br/>
                    - JavaScript <br/>
                    - PHP <br/>
                    - Python
                </p>
              </div>

              <hr class="breakline">
            </div>

            <div class="group-skills">
              <div class="group-title">INTERESTS</div>

              <p class="skill-content">
                  - Reading books <br/>
                  - Play sports <br/>
              </p>
            </div>
          </div>

            <div class="group-right">
              <div class="right-block-content">
                <div class="right-block-content-item">
                    <div class="right-block-item-title">
                        <div class="right-block-item-title-content">OBJECTIVE</div>
                    </div>

                    <p class="right-block-item-content">
                        I am an IT student with partly knowledge of website development.
                        I am interested in an internship position in your company.
                        I will do my best with duties in company while gaining more experience.
                    </p>
                </div>

                <div class="right-block-content-item">
                  <div class="right-block-item-title">
                    <div class="right-block-item-title-content">
                      EDUCATION &nbsp;

                      

                      <form method="post">
                          <input class="add-button" type="submit" name="addButton" value="Add">
                      </form>
                    </div>
                  </div>

                  <?php
                    while($res = json_decode(json_encode($stmt->fetch()), true)) {
                      if($id == $res['id'] && $isEdit == true) {
                  ?>
                    <form action="pdoService.php" method="post">
                      <div class="right-block-subitem">
                        <div class="right-block-item-subtitle">
                          <input class="right-block-item-subtitle-input" type="text" name="name" value="<?php echo $res['name'];?>"></input>
                        </div>
                        

                        <div class="right-block-subitem-content">
                          <div class="right-block-subitem-content-content">
                            <input class="right-block-item-content-input" type="text" name="content" value="<?php echo $res['content'];?>"></input>
                          </div>

                          <div class="right-block-subitem-content-time">
                            <input class="right-block-item-content-input" type="text" name="time" value="<?php echo $res['time'];?>"></input>
                          </div>
                        </div>
                      </div>
                      
                      <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                      <input type="submit" name="update" value="Save">
                    </form>

                    <form method="post">
                      <input type="submit" name="cancelEditButton" value="Cancel">
                    </form>
                        
                    <?php } else { ?>
                        <div class="right-block-subitem">
                            <div class="right-block-item-subtitle">
                                <?php echo $res['name'];?>
                            </div>
                            

                            <div class="right-block-subitem-content">
                                <div class="right-block-subitem-content-content">
                                    <p class="right-block-item-content"><?php echo $res['content'];?></p>
                                </div>

                                <div class="right-block-subitem-content-time">
                                    <p class="right-block-item-content"><?php echo $res['time'];?></p>
                                </div>

                                <div>
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                                        <input type="submit" name="editButton" value="Edit">
                                    </form>

                                    <form action="pdoService.php" method="post">
                                      <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                                      <input type="submit" name="delete" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>

                    <?php if($isAdd == true){ ?>
                    <form action="pdoService.php" method="post">
                        <div class="right-block-subitem">
                            <div class="right-block-item-subtitle">
                                <input class="right-block-item-subtitle-input" type="text" name="name"></input>
                            </div>
                            

                            <div class="right-block-subitem-content">
                                <div class="right-block-subitem-content-content">
                                    <input class="right-block-item-content-input" type="text" name="content"></input>
                                </div>

                                <div class="right-block-subitem-content-time">
                                    <input class="right-block-item-content-input" type="text" name="time"></input>
                                </div>
                            </div>
                        </div>

                        <input type="submit" name="addNewItemButton" value="Add">
                    </form>

                    <form method="post">
                      <input type="submit" name="cancelAddButton" value="Cancel">
                    </form>
                    <?php } ?>
                </div>

                <div class="right-block-content-item">
                    <div class="right-block-item-title">
                        <div class="right-block-item-title-content">PROJECT</div>
                    </div>

                    <div class="right-block-subitem">
                        <div class="right-block-item-subtitle">
                            Chat App
                        </div>

                        <div class="right-block-subitem-content">
                            <div class="right-block-subitem-content-content">
                                <p class="right-block-item-content">
                                    - Program language: JavaScript, Java<br/>
                                    - Framework: ReactJS, Spring Boot<br/>
                                    - Database: MongoDB<br/>
                                    - API Security: Json Web Token<br/>
                                    - Purpose: Chat App is where you can exchange free online text messages with people on contact list.<br/>
                                    - Source: https://github.com/NTDung141/chat-app-server<br/>
                                    - Product link: https://chat-app-use-websocket.vercel.app/
                                </p>
                            </div>

                            <div class="right-block-subitem-content-time">
                            </div>
                        </div>
                    </div>
                </div>
                  
              </div>
            </div>
        </div>
      </div>
  </div>
</body>
</html>

