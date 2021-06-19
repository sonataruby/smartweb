<link rel="stylesheet" href="templates/assets/core/trumbowyg/ui/trumbowyg.css"/>
<script type='text/javascript' src='templates/assets/core/trumbowyg/trumbowyg.js'></script>
<?php 
$file = glob ( FCPATH . "templates/assets/core/trumbowyg/plugins/*/trumbowyg.*.js");
foreach ($file as $key => $value) { 
    if(strpos($value,".min") !== false){
    ?>
    <script type='text/javascript' src='<?php echo str_replace(FCPATH,'',$value);?>'></script>
<?php 
    }
} ?>

<script type='text/javascript'>
 $('#<?php echo $id;?>').trumbowyg({
    semantic: {
        'div': 'div' // Editor does nothing on div tags now
    },
    btns: [
        ['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link','base64','resizimg','pasteimage','noembed'],
        ['insertImage'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ]
});
</script>