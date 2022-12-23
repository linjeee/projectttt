<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Students</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- teachers section starts  -->

<section class="teachers">

   <h1 class="heading">Expert Student</h1>

   <form action="search_tutor.php" method="post" class="search-tutor">
      <input type="text" name="search_tutor" maxlength="100" placeholder="Search Student..." required>
      <button type="submit" name="search_tutor_btn" class="fas fa-search"></button>
   </form>

       

   <?php
         if($user_id != ''){
      ?>
       <div class="box-container">

<div class="box offer">
   <h3>Become a Student</h3>
   <p>If you want to join as an instructor, click on the button below.</p>
   <a href="admin/register.php" class="inline-btn">Get started</a>
</div>

<?php
   $select_tutors = $conn->prepare("SELECT * FROM `tutors`");
   $select_tutors->execute();
   if($select_tutors->rowCount() > 0){
      while($fetch_tutor = $select_tutors->fetch(PDO::FETCH_ASSOC)){

         $tutor_id = $fetch_tutor['id'];

         $count_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
         $count_playlists->execute([$tutor_id]);
         $total_playlists = $count_playlists->rowCount();

         $count_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
         $count_contents->execute([$tutor_id]);
         $total_contents = $count_contents->rowCount();

         $count_likes = $conn->prepare("SELECT * FROM `likes` WHERE tutor_id = ?");
         $count_likes->execute([$tutor_id]);
         $total_likes = $count_likes->rowCount();

         $count_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
         $count_comments->execute([$tutor_id]);
         $total_comments = $count_comments->rowCount();

         $count_post = $conn->prepare("SELECT * FROM `post` WHERE tutor_id = ?");
         $count_post->execute([$tutor_id]);
         $total_post = $count_post->rowCount();
?>
<div class="box">
   <div class="tutor">
      <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
      <div>
         <h3><?= $fetch_tutor['name']; ?></h3>
         <span><?= $fetch_tutor['profession']; ?></span>
      </div>
   </div>
   <p>playlists : <span><?= $total_playlists; ?></span></p>
   <p>total videos : <span><?= $total_contents ?></span></p>
   <p>total post : <span><?= $total_post ?></span></p>
   <p>total likes : <span><?= $total_likes ?></span></p>
   <p>total comments : <span><?= $total_comments ?></span></p>
   <form action="tutor_profile.php" method="post">
      <input type="hidden" name="tutor_email" value="<?= $fetch_tutor['email']; ?>">
      <input type="submit" value="view profile" name="tutor_fetch" class="inline-btn">
   </form>
</div>
<?php
      }
   }else{
      echo '<p class="empty">no tutors found!</p>';
   }
?>

</div>
      <?php
         }else{ 
      ?>
      <div class="box-container2">
      <div class="box2" style="text-align: center;">
         <h3 class="title2">please login or register</h3>
      </div>
      </div>
      <?php
      }
      ?>




</section>

<style>
.box-container2 .box2 {
    border-radius: .5rem;
    background-color: var(--white);
    padding: 2rem;
}
.box-container2 .box2 .title2 {
    font-size: 2rem;
    color: var(--black);
    margin-top: .5rem;
    padding: .5rem 0;
}
</style>
<!-- teachers section ends -->






























<?php include 'components/footer.php'; ?>    

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>