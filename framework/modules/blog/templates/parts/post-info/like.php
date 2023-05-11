<?php if(arabesque_mikado_core_plugin_installed()) { ?>
    <div class="mkdf-blog-like">
        <?php if( function_exists('arabesque_mikado_get_like') ) arabesque_mikado_get_like(); ?>
    </div>
<?php } ?>