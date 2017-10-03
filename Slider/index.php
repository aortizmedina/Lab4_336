<?php
    $backgroundImage = "./img/sea.jpg";

      if(isset($_GET['keyword'])){
          include 'api/pixabayAPI.php';
          $keyword = $_GET['keyword'];
          $imageURLs = getImageURLs($keyword);
          $backgroundImage = $imageURLs[array_rand($imageURLs)];
            
          
     
         
      }
     
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
    <style>
          @import url("./css/styles.css");
        
    </style>
    
    <style>
          body{
           background-image: url('<?=$backgroundImage?>');
            }
    </style>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
    </head>
 
    <body>
        
        <?php
            if(!isset($imageURLs)){
                echo "<h2> Type a keyyword to display a slideshow</h2>";
            }else{
            
            
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-rde="carousel">
                
           <ol class="carousel-indicators">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                     echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                     echo ($i == 0) ? "class='active'" : "";
                     echo "></li>";
                    
                    }
           
                ?>
             </ol>
       <div class="carousel-inner" role="listbox">
       <?php
       for($i = 0; $i < 7;$i++){
           do {
               $randomIndex = rand(0, count($imageURLs));
               
           }
           while(!isset($imageURLs[$randomIndex]));
           echo '<div class="item ';
           echo ($i == 0) ? "active" : "";
           echo '">';
           echo '<img src="' . $imageURLs[$randomIndex] . '">';
           echo '</div>';
       
           unset($imageURLs[$randomIndex]);
       }
       
       ?>
  
    </div>
        
        
  
        
        <!--</div>-->
          <!--"<h2>Enter query to see images form pixabay</h2>"-->
        
  
    
 

      <!--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">-->
  <!-- Indicators -->
    
  <!--<ol class="carousel-indicators">-->
  <!--  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
  <!--  <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
  <!--  <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
  <!--</ol>-->

  <!-- Wrapper for slides -->
  <!--<div class="carousel-inner" role="listbox">-->
  <!--  <div class="item active">-->
  <!--    <img src="./img/sea.jpg" alt="...">-->
  <!--    <div class="carousel-caption">-->
  <!--      ...-->
  <!--    </div>-->
  <!--  </div>-->
  <!--  <div class="item">-->
  <!--    <img src="./img/sea.jpg" alt="...">-->
  <!--    <div class="carousel-caption">-->
  <!--      ...-->
  <!--    </div>-->
  <!--  </div>-->
  <!--  ...-->
  <!--</div>-->

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php
    }
?>
        <form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            <input type="submit" value="Submit">
        </form>
        <br/><br/>
        <!-- Html -->
       
        
        <br/><br/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    </body>
</html>