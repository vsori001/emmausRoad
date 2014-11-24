<?php 

/**
 * Ebor Framework
 * Queue Up Framework
 * @since version 1.0
 * @author TommusRhodus
 */
require_once ( "ebor_framework/init.php" );

/**
 * Please use a child theme if you need to modify any aspect of the theme, if you need to, you can add code
 * below here if you need to add extra functionality.
 * Be warned! Any code added here will be overwritten on theme update!
 * Add & modify code at your own risk & always use a child theme instead for this!
 */

function ebor_admin_notice() {
	global $current_user;
    
    $user_id = $current_user->ID;

	if ( ! get_user_meta($user_id, 'ebor_ignore_notice') ) {
        echo '<div class="updated"><p>'; 
        printf(__('<b>Hey there! A Note About Slowave 1.0.8+</b><br />
        If you are a new user of Slowave, feel free to dismiss this message.<br /><br />
        Due to licensing issues of the previous icon set used in Slowave, you will notice that a number of icons are now missing with this update.<br />
        At TommusRhodus we are extremely sorry by the confusion and inconvenience caused by this. You will now need to go through your pages and update any missing icons with the new sets provided.<br />
        Where you previously had 500 icons to choose from, we have upped this to 700 in this update with 2 new, fully licensed icon sets.<br />
        Again, apologies for the inconvenience raised from this change, you simply need to switch the icons through your pages now.<br /><br />
        <a href="%1$s">Hide This Notice</a>', 'slowave'), '?ebor_nag_ignore=0');
        echo "</p></div>";
	}
}
add_action('admin_notices', 'ebor_admin_notice');

function ebor_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['ebor_nag_ignore']) && '0' == $_GET['ebor_nag_ignore'] ) {
             add_user_meta($user_id, 'ebor_ignore_notice', 'true', true);
	}
}
add_action('admin_init', 'ebor_nag_ignore');