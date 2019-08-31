<!DOCTYPE html>
<html>
<title>ATN TOY SHOP MANAGER</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">
  
 <!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">ATN TOY SHOP MANAGER</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="index.php" class="w3-bar-item w3-button">Home</a>
      <a href="admin.php" class="w3-bar-item w3-button">Admin</a>
    </div>
  </div>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

  <!-- Header -->
  <header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="images/background.jpg" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge">ATN TOY SHOP MANAGER</h1>
  </div>
</header>
  <!--End of Header -->
  
    <div class="container w3-padding-large" id="portfolio">
        <div class="w3-bottombar">
            
            <div class="w3-panel w3-border w3-black w3-round-large w3-padding-100">        
                <p class="w3-xlarge w3-serif w3-center" style="text-decoration: cornflowerblue">CATALOGUE</p>             

                <?php 
                    include("catalogue.php");
                ?>

                <?php
                echo "<table >";
                
                    
                    echo "<tr>";
                    foreach ($resultSet as $row)
                    {
                        for($i=1;$i<=5;$i++)
                        {
                            echo "<th>";
                                if($row!=false)
                                {
                                    $ID = $row ['id'];
                                    $link="?direct=show_product&id=".$ID;        
                                    echo "<a href='$link' class='w3-button w3-large w3-border'>" ;
                                    $Name = $row ['cname'];                                               
                                    echo "$Name";
                                }
                                 else 
                                {
                                    echo "&nbsp;";
                                }
                            echo "</th>";

                            if($i!=5)
                            {
                                $row = $stmt->fetch();
                            }
                        }
                    }
                    echo "</tr>";
                
                echo "</table>";
                ?>
            </div>
        </div>
    </div>
    
  <!-- Product container-->  
    <div class="w3-bottombar">
        <?php 
            include("direction.php");
        ?>

      <?php
        echo "<table>";                
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
            {    
                echo "<tr>";
                    for($i=1;$i<=3;$i++)
                    {
                        echo "<td align='center' width='328px' height='228px' >";
                            if($row!=false)
                            {
                                $iId = $row['iid'];
                                $iName = $row['iname'];
                                $iDescription = $row['idescription'];
                                $iPrice = $row['iprice'];
                                $iStatus = $row['istatus'];
                                $iSize = $row['isize'];
                                $iImage = $row['iimage'];
                                $link_image = "./images/item/$iImage";
                                //$link_detail="?direct=product_detail&id=".$iId;

                                echo "<a href='$link_detail'>";
                                echo "<img src='$link_image' width='200px'>";
                                echo "</a>";
                                echo "<br>";  

                                
                                echo $iName;
                                echo "</a>";
                                echo "<br>";  

                                echo "Price: ".$iPrice," $";
                                echo "<br>";
                            }
                             else 
                            {
                                echo "&nbsp;";
                            }
                        echo "</td>";
                        if($i!=3)
                        {
                            $row = $stmt->fetch();
                        }
                    }
                echo "</tr>";
            }
        echo "</table>";
        ?>
    </div> 
    <!--End of Product container-->
    
