<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
delete_option('clean-promo-banner-colors');
delete_option('clean-promo-banner');