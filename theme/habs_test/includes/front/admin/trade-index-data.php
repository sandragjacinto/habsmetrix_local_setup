<?php ?>
<h2><?php the_title() ?></h2>
<p>
<?php foreach($coreData as $core) { ?>
<div>
    <h1><?php echo $core->rating; ?></h1><h1> <?php echo $core->ratingCount; ?></h1>
</div>
<?php } ?>

 <?php var_dump($coreData); ?>
 <?php var_dump($average); ?>
 </p>


<style>
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