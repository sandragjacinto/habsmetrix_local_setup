<?php 

?>

 <div class="wrap">
     <nav class="navbar">
         <a class="nav-link" href="#core-metrix">Core Metrix</a>
         <a class="nav-link" href="#surveys">Surveys</a>
     </nav>
     <header>
       <h1 class='title'> <?php echo $title ?> </h1>
    </header>
<main class="main-data-dash">
<section class="box" id="core-metrix">
    <h1 class="title">Core metrix data</h1>
    <p class='description'>Number of trade index answers <?php echo $coreData_trade ?></p>
    <p class='description'>Number of slider answers <?php echo $coreData_slider ?></p>
</section>

<section class="box" id="surveys">
    <h1 class="title">Survey data</h1>
    <p class='description'>Number of trade index answers <?php echo $coreData_trade ?></p>
    <p class='description'>Number of slider answers <?php echo $coreData_slider ?></p>
</section>
</main>
 </div>

 <style>
     .main-data-dash{
         display: flex;
     }
    .box {
        background-color: white;
        flex-grow: 1;
        flex-shrink: 1;
        border-radius: 5px;
        border: 1px solid gray;
        margin: 10px;
        padding: 10px;
    }

    @media only screen and (max-width: 600px) {
        .main-data-dash{
         display: flex;
         flex-direction: column;
     }
    
    }
 </style>