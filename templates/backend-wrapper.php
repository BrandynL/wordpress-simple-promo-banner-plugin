<?php $promo_banner_options = get_option('simple-promo-banner', true); ?>
<div class="promo-banner-wrap">
	<h1><?php esc_attr_e( 'Simple Promo Banner', 'WpAdminStyle' ); ?></h1>
	<?php if ($promo_banner_options['last-updated']) {
		echo "<p>Banner Last Updated : ".$promo_banner_options['last-updated']."</p>";
	} ?>
	<?php $cursor_style = (!empty($promo_banner_options['promo-banner-link']) && trim($promo_banner_options['promo-banner-link'], ' ') != '') ? 'pointer' : 'default';?>
	<div id="simple-preview-banner" style="
			background:<?= $promo_banner_options['background-color']; ?>;
			cursor:<?= $cursor_style; ?>;
		"
		
		data-link="<?= $promo_banner_options['promo-banner-link']; ?>">
		<h1 style="color:<?= $promo_banner_options['text-color']; ?>;"><?= $promo_banner_options['promo-banner-title'];?></h1>
		<p style="color:<?= $promo_banner_options['text-color']; ?>;"><?= $promo_banner_options['promo-banner-text']; ?></p>
	</div>

	<form method='post' action=''>
		<div class="form-inner">
			<div>
				<div>
					<label for="start-date">Start Date</label>
					<input type="date" value='<?= $promo_banner_options['start-date']; ?>' name="start-date" id="">

					<label for="end-date">End Date</label>
					<input type="date" value='<?= $promo_banner_options['end-date'] ?>' name="end-date" id="">
				</div>
				<div>
					<label for="promo-banner-title">Promo Heading *</label>
					<input required type="text" value="<?php echo $promo_banner_options['promo-banner-title']; ?>" name='promo-banner-title' class="large-text" />
				</div>
				<div>
					<label for="promo-banner-text">Promo Banner Text</label>
					<textarea placeholder='optional' id="" name="promo-banner-text" cols="80" rows="10" class='large-text'><?php echo $promo_banner_options['promo-banner-text']; ?></textarea>
				</div>
				<div>
					<label for="promo-banner-link">Banner Link</label>
					<input placeholder='optional' name="promo-banner-link" type="text" id="promo-banner-link" class="large-text" value='<?php echo $promo_banner_options['promo-banner-link']; ?>'/>
				</div>
				<div>
					<label for="hide-promo-banner">Banner Visibility</label>
					<input type="checkbox" name="hide-promo-banner" id="hide-promo-banner"
					<?php if ($promo_banner_options['hide-promo-banner'] == true) echo 'checked'; ?> >
				</div>
			</div>
			<div class='available-colors'>
				<div id='available-background-colors'>
					<p>Background Color</p>
					<?php foreach($available_colors as $color){
						$selected_background = $promo_banner_options['background-color'] == $color ? "checked" : "";
						echo "<input $selected_background name='background-color' type='radio' value='$color' style='background:$color'/>";
					} ?>
				</div>
				<div id='available-text-colors'>
					<p>Text Color</p>
					<?php foreach($available_colors as $color){
						$selected_text = $promo_banner_options['text-color'] == $color ? "checked" : "";
						echo "<input $selected_text name='text-color' type='radio' value='$color' style='background:$color'/>";
					} ?>
				</div>
				<input type="hidden" value='<?php echo date("m/d/Y");?>' name="updated">
			</div>
		</div>
		<input style='display:block;margin-top:15px;'class="button-primary" type="submit" value="Save Settings">
	</form>
</div>