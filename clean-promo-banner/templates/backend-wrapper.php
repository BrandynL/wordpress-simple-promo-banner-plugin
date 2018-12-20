<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h1><?php esc_attr_e( 'Clean Promo Banner', 'WpAdminStyle' ); ?></h1>
	<p><?php _e( 'The most clean and simple banner for Wordpress, in the world.', 'WpAdminStyle' ); ?></p>
	<hr>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<!-- main content -->
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<div class="inside">
                            <form method='post' action=''>
                            <table class="form-table">
                                <tr valign="top">
                                    <td scope="row">
                                    <label for="promo-banner-title">Promo Heading</label><br>
                                    <input required type="text" value="<?php echo $promo_banner_options['promo-banner-title']; ?>" name='promo-banner-title' class="large-text" />
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <td scope="row">
                                    <label for="promo-banner-text">Promo Banner Text (optional - leave blank to disable)</label><br>
                                    <textarea id="" name="promo-banner-text" cols="80" rows="10" class='large-text'><?php echo esc_attr($promo_banner_options['promo-banner-text']); ?></textarea><br>
                                    </td>
                                </tr>
								<tr valign="top">
									<td scopt='row'>
									<label for="promo-banner-link">link? (optional - leave blank to disable)</label><br>
										<input name="promo-banner-link" type="text" id="promo-banner-link" class="large-text" value='<?php echo $promo_banner_options['promo-banner-link']; ?>'/>
									</label>
									</td>
								</tr>
								<tr valign="top">
									<td scopt='row'>
									<label for="show-promo-banner">
										<input name="show-promo-banner" type="checkbox" id="show-promo-banner" <?php if($promo_banner_options['show-promo-banner']){echo 'checked';}; ?> />
										<span><?php esc_attr_e( 'Enable Promo Banner on Website', 'WpAdminStyle' ); ?></span>
									</label>
									</td>
								</tr>
							<input type="hidden" value='<?php echo date("m/d/Y");?>' name="updated">
                                <tr valign="top">
                                    <td scope="row">
                                    <button class="button-primary" type="submit" value="submit">Save Banner Settings</button>
                                </tr>
                            </table>
                            </form>

                            <div>
                            <p>Banner Last Updated : <?php echo $promo_banner_options['last-updated']; ?></p>
                            </div>



						</div>
						<!-- .inside -->
					</div>
					<!-- .postbox -->
				</div>
				<!-- .meta-box-sortables .ui-sortable -->
			</div>
			<!-- post-body-content -->
			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox">
						<h2><span><?php esc_attr_e(
									'Banner Colors', 'WpAdminStyle'
								); ?></span></h2>
						<div style="padding:5px;">
						<form action="" method='post'>
						<div style='display: grid;grid-template-columns: 1fr 1fr;grid-gap: 25px;'>
							<div>
								<p><strong>Background Color</strong></p><hr>
								<table style="width:100%;">
								<?php foreach ($banner_colors as $color) { ?>
									<tr>
										<td style='background-image:linear-gradient(90deg, white, white, <?=$color;?>);' >
										<label title='g:i a'>
											<input <?php if($promo_banner_set_colors['background-color'] == $color){echo 'checked="true"';}?> type="radio" name="banner-background" value="<?=$color;?>" />
											<span><?php echo $color; ?></span>
										</label>
										</td>
									</tr>
								<?php } ?>
								</table>
							</div>
							<div>
								<p><strong>Text Color</strong></p><hr>
								<table style="width:100%;">
								<?php foreach ($banner_colors as $color) { ?>
									<tr>
										<td style='background-image:linear-gradient(90deg, white, white, <?=$color;?>);'>
										<label title='g:i a'>
											<input <?php if($promo_banner_set_colors['text-color'] == $color){echo 'checked="true"';}?> type="radio" name="text-color" value="<?=$color;?>" />
											<span><?php echo $color; ?></span>
										</label>
										</td>
									</tr>
								<?php } ?>
								</table>
							</div>
						</div>
						<button style='margin-top:15px;'class="button-primary" type="submit" value="submit">Save Color Settings</button>
						</form>
						</div>
						<!-- .inside -->
					</div>
					<!-- .postbox -->
				</div>
				<!-- .meta-box-sortables -->
			</div>
			<!-- #postbox-container-1 .postbox-container -->
		</div>
		<!-- #post-body .metabox-holder .columns-2 -->
		<br class="clear">
	</div>
	<!-- #poststuff -->
</div> <!-- .wrap -->