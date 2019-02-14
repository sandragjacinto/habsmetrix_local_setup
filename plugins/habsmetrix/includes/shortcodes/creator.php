<?php 

function r_recipe_creator_shortcode() {
$creatortHTML = file_get_contents(
    'creator-template.php',
    true
);

$editorHTML          = r_generate_content_editor();
$creatortHTML       = str_replace(
    "CONTENT_EDITOR",
    $editorHTML,
    $creatortHTML
);
return $creatortHTML;
}

function r_generate_content_editor() {
    ob_start();

    wp_editor(
        '',
        'recipecontenteditor'
    );

    $editor_contents = ob_get_clean();
    return $editor_contents;
}