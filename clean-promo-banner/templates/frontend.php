<?php if ($promo_banner_options['promo-banner-link']) : ?>
<a href="<?php echo $promo_banner_options['promo-banner-link']; ?>">
<?php endif; ?>
    <div id='clean-promo-banner'>
        <h1><?php echo $promo_banner_options['promo-banner-title']; ?></h1>
        <?php if ($promo_banner_options['promo-banner-text']) : ?>
            <p><?php echo $promo_banner_options['promo-banner-text']; ?></p>
        <?php endif; ?>
    </div>
<?php if (trim($promo_banner_options['promo-banner-link'], ' ') != '') : ?>
</a>
<?php endif; ?>