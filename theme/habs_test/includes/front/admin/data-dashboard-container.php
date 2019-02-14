<?php


?>

<main class="main-data-dash">
    <section class="box" id="core-metrix">
        <h1 class="title">Core metrix data</h1>
        <?php include 'core-metrix-data-container.php' ?>
    </section>

    <section class="box" id="survey">
        <h1 class="title">Survey data</h1>
        <?php include 'survey-data-container.php' ?>
    </section>

</main>

 <style>
     .main-data-dash{
         display: flex;
     }
    .box {
        background-color: white;
        flex-basis: 50%;
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