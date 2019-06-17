<?php $promo_banner_options = get_option('clean-promo-banner', true); ?>
<div class="promo-banner-wrap">
	<h1><?php esc_attr_e( 'Clean Promo Banner', 'WpAdminStyle' ); ?></h1>
	<?php if ($promo_banner_options['last-updated']) {
		echo "<p>Banner Last Updated : ".$promo_banner_options['last-updated']."</p>";
	} ?>
	<hr>
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
					<textarea placeholder='optional' id="" name="promo-banner-text" cols="80" rows="10" class='large-text'><?php echo esc_attr($promo_banner_options['promo-banner-text']); ?></textarea>
				</div>
				<div>
					<label for="promo-banner-link">Banner Link</label>
					<input placeholder='optional' name="promo-banner-link" type="text" id="promo-banner-link" class="large-text" value='<?php echo $promo_banner_options['promo-banner-link']; ?>'/>
				</div>
			</div>
			<div class='available-colors'>
				<div>
					<p>Background Color</p>
					<?php foreach($available_colors as $color){
						$selected_background = $promo_banner_options['background-color'] == $color ? "checked" : "";
						echo "<input $selected_background name='background-color' type='radio' value='$color' style='background:$color'/>";
					} ?>
				</div>
				<div>
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
<style>
form label {
    display: inline-block;
    margin: 10px 0px;
    font-weight: bold;
}
.form-inner {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    grid-gap: 15px;
}
.form-inner input {
    padding: 7px 12px;
}
.available-colors {
    display: grid;
    grid-gap: 15px;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
}
.available-colors > div {
    border: 1px solid #8e8e8e1a;
    padding: 8px;
    margin: 10px auto;
    background: white;
}
.available-colors input {
    border-radius: 0px;
    width: 30px;
    height: 30px;
    margin: 2px;
	border: 0;
	transition: transform .4s;
}
.available-colors input:hover{
	transition: transform .4s;
}
.available-colors input:checked {
    border: 2px solid #fff;
    box-shadow: 0px 0px 30px #00000085;
    color: white;
    transform: scale(1.1) rotate(45deg);
}
</style>