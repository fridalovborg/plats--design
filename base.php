<?php
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>

<!-- Advanced custom fields - Background image -->
<?php $backgroundUrl = get_field('desktop'); ?>
<?php if( empty($backgroundUrl) ): ?>
    <?php $backgroundUrl = get_field('mobile'); ?>
<?php endif; ?>

<?php if ( wp_is_mobile() === true ): ?>
    <?php $backgroundUrl = get_field('mobile'); ?>

    <?php if( empty($backgroundUrl) ): ?>
        <?php $backgroundUrl = get_field('desktop'); ?>
    <?php endif; ?>
<?php endif; ?>
<!-- END: Advanced custom fields - Background image -->

<body <?php body_class(); ?> style="background-image: url('<?php echo $backgroundUrl["url"]; ?>')">
    <!--[if IE]>
    <div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
    </div>
    <![endif]-->
    <?php
    do_action('get_header');
    get_template_part('templates/header');
    ?>
    <main>
        <?php include Wrapper\template_path(); ?>
    </main><!-- /.main -->
    <?php
    do_action('get_footer');
    get_template_part('templates/footer');
    wp_footer();
    ?>
</body>
</html>