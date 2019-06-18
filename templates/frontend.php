<div id='simple-promo-banner'<?php if (isset($promo_banner_options['background-color'])){echo "style='background:".$promo_banner_options['background-color'].";'";}?>>
<?php if ($promo_banner_options['promo-banner-link']) : ?>
    <a class='promo-link' href="<?php echo $promo_banner_options['promo-banner-link']; ?>">
<?php endif; ?>
    <h1 <?php if (isset($promo_banner_options['text-color'])){echo "style='color:".$promo_banner_options['text-color'].";'";}?>><?php echo $promo_banner_options['promo-banner-title'];?></h1>
    <div id='promo-details'>
        <?php if ($promo_banner_options['promo-banner-text']) : ?>
            <p <?php if (isset($promo_banner_options['text-color'])){echo "style='color:".$promo_banner_options['text-color'].";'";}?>'><?php echo $promo_banner_options['promo-banner-text']; ?></p>
        <?php endif; ?>

    </div>
<?php if ($promo_banner_options['promo-banner-link']) : ?>
    </a>
<?php endif; ?>
</div>