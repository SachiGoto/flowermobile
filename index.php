<?php


include("connect.php"); 

if (empty($_GET['occasion'])){
    header("Location: index.php?occasion=5");
;
}


?>

<style>
    *{
        font-family:'Lato', sans-serif;
    }

    section{
        /* display:none; */
        /* background-color:blue;
        width:300px;
        height:300px; */
    }

    #occasionSelector{
        background-color:#b6534c !important;
    }

    #heroimage{
        /* background-image:url("https://bloximages.newyork1.vip.townnews.com/gazette.com/content/tncms/assets/v3/editorial/a/6e/a6ec2830-d506-11eb-8db0-db49978cc45f/60d4ae6333e08.image.jpg?resize=1396%2C809");  */

        background-image:url("https://bloximages.newyork1.vip.townnews.com/gazette.com/content/tncms/assets/v3/editorial/a/6e/a6ec2830-d506-11eb-8db0-db49978cc45f/60d4ae6333e08.image.jpg?resize=1396%2C809");

        /* background-image:url("./img/heroimage.jpg"); */
        width:80%;
        height:30vh;
        background-size:cover;
    }
    

    h1{
        /* color:white; */
        background-color:rgb(255,250,250, 0.5);
        padding:8px;
       
    }

    h2{
        position: absolute;
    top: 10%;
    left: 42%;
    transform: translate(-10%, -42%);
    font-size: 15px !important;
    }
  

    /* .image{
        background-size:cover;
        width:80%;
        
    } */
   
    .imageContainer{
        width:80%;
        height:30vh;
       
        height:400px;
       
    }

    .carousel{
        justify-content: center;
    display: flex;

    }

    .carousel_inner{
        width: 80%;
    }


   

    .image{
        width:100%;
        height:100%;
        object-fit:cover;
    }

    .price{
        font-weight:bold;
        font-family:cursive;
    }

    .productName{
        min-height:30px;
        text-align:center;
    }

    .addToCartbtn{
        background-color:#b6534c !important;
        border:none;
        font-family:'Lato', sans-serif !important;
        padding: 10px 20px;
    border-radius: 10px;
    margin-bottom:10px;
      
        

    }

    .addToCartbtn:hover{
       background-color:#ce938f !important;
      
        

    }

    .searchBtn{

        background-color:#dfb03e !important;
        border:none;
        font-family:'Lato', sans-serif !important;
        padding: 10px 20px;
    border-radius: 10px;

    }
   

    /* .addToCartbtn:hover{
        background-color:color:rgb(240, 176, 169) !important;

    } */

 

    @media (min-width:768px) and (max-width:1199px){


 .productName {
    min-height: 50px !important;

 }
         #heroimage{
        
         height:40vh;
        
        
         } 


            h2{
         position: absolute;
    top: 8%;
    left: 44%;
    transform: translate(-8%, -44%);
    font-size: 22px !important;
         
         } 
        } 
    

    @media (min-width:1200px){

        .productName {
    min-height: 80px !important;

 }

        #heroimage{
      
        height:50vh;
        }

        h2{
            font-size: 22px !important;
        position:absolute;
        top: 12%;
    left: 45%;
    transform: translate(-12%, -45%);
    }
       
     
    }

    
    
</style>



<?php


        // enable error reporting
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        //connect to database
        $connection = mysqli_connect($dbhost, "$dbuser", "$dbpass", "$dbname");

// $result = mysqli_store_result(1);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arvo:ital@1&family=Assistant:wght@500&family=Bebas+Neue&family=Lato:wght@300&family=Mochiy+Pop+P+One&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">

</head>
<body>
    <div class=" mt-3 container d-flex justify-content-center align-items-center">
<img src="./img/flowerTruck.jpg" width="80">
<h1> Mobile Flowers </h1>

</div>
<div class="container d-flex justify-content-center align-items-center">
<h2>Flowers on the fly! <h2>
</div>

<div class="mt-3 mt-md-5 mt-lg-5 container d-flex flex-column justify-content-center">

<div id="heroimage" class="container d-flex justify-content-center align-items-center">





</div>

 
  <div class=" mt-2 mt-lg-5 container d-flex justify-content-center">
      <form action="index.php" method="get">

      <div class="input-group mb-3">
  <label id="occasionSelector" class="input-group-text" for="inputGroupSelect01">Occasion</label>
  <select  class="form-select" name = "occasion" id="inputGroupSelect01">
  <option value="0"> Select</option>
    <option value="1"> Valentine's day</option>
    <option value="2">Wedding</option>
    <option value="3">Birthday</option>
    <option value="4">Memorial</option> 
    <option value="5">All</option>
  </select>
  <input type="submit" value="Search" class="searchBtn"></input>
</div>
     </form>

</div>

</div>

<section id="valentineDisplay" class="container d-flex justify-content-center"> 
    <?php





if (isset($_GET['occasion']) && !empty($_GET['occasion'])) {
    $occasionId = $_GET['occasion'];

    if( $occasionId == 5){

        $result = mysqli_query($connection, "CALL All_products()"); 

    }else{
   
    // if($occasionId == 1){


        // run the store proc
        

    // }else if($occasionId == 2){

    //     $result = mysqli_query($connection, "CALL products_by_ocassion(2)");

    
    $result = mysqli_query($connection, "CALL products_by_ocassion($occasionId)"); 
    } 

    

    
    
    ?>


 <div class="row container">

    
     
     

    <?php
   $count = 0;

    while ($row = mysqli_fetch_array($result)){     
      
       
        $count++;
    
     
       ?>

<div class="col-12 col-md-6 col-lg-3 mb-3">
                <div id="carouselExampleControlsNoTouching<?php echo $count; ?>"   class="carousel slide" data-bs-touch="false" data-bs-interval="false">
       
                    <div class="carousel-inner">
                        <div class="carousel-item active imageContainer">
                           <img class="image d-block w-100" src="data:image/jpeg;base64,<?php echo base64_encode($row[4])?>"/>
                        </div>
                        <div class="carousel-item imageContainer">
                            <img class="image d-block w-100" src="data:image/jpeg;base64,<?php echo base64_encode($row[5])?>"/>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching<?php echo $count; ?>" data-bs-slide="prev">
                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                             <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching<?php echo $count;?>" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
            
                 </div>
                 
                <div class="container d-flex flex-column align-items-center justify-content-center">
                <p class="productName mt-2 mt-md-3 ">  <?php echo $row[0] ; ?> </p>
                 
                 <div class="rate">Rate: <?php  
                 for($i = 0; $i<$row[1]; $i++){
                    echo "<img width='20' src='./img/star.svg'/>";
               
                 } 
                 ?> </div> 
                <p class="price">Price: $<?php  echo $row[2]; ?> </p>
                <p> <mark> Occasion: <?php echo $row[3]; ?> </mark> </p>
                <button  type="button" class="addToCartbtn">Add To Cart</button>
                </div>
                </div>
        <?php
            
        }
            ?>
        
             
       </div> <?php


} 
?>

</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>




</body>
</html>
