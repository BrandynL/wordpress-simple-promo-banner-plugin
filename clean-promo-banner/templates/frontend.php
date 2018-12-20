<?php if ($promo_banner_options['promo-banner-link']) : ?>
    <a class='promo-link' href="<?php echo $promo_banner_options['promo-banner-link']; ?>">
<?php endif; ?>
<div id='clean-promo-banner'<?php if (isset($promo_banner_set_colors['background-color'])){echo "style='background:".$promo_banner_set_colors['background-color'].";'";}?>>
    <h1 <?php if (isset($promo_banner_set_colors['text-color'])){echo "style='color:".$promo_banner_set_colors['text-color'].";'";}?>><?php echo $promo_banner_options['promo-banner-title'];?></h1>
    <div id='promo-details'>
        <?php if ($promo_banner_options['promo-banner-text']) : ?>
            <p <?php if (isset($promo_banner_set_colors['text-color'])){echo "style='color:".$promo_banner_set_colors['text-color'].";'";}?>'><?php echo $promo_banner_options['promo-banner-text']; ?></p>
        <?php endif; ?>

    </div>
</div>
<?php if ($promo_banner_options['promo-banner-link']) : ?>
    </a>
<?php endif; ?>