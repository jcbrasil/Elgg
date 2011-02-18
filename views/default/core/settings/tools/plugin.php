<?php
/**
 * This displays a plugin's user settings.
 *
 * @uses ElggPlugin $vars['plugin'] The plugin to show settings for.
 *
 * @package Elgg.Core
 * @subpackage Plugins.Settings
 */


$plugin = $vars['plugin'];
$plugin_id = $plugin->getID();
$user_guid = $vars['user_guid'];

if (!$user_guid) {
	$user_guid = elgg_get_logged_in_user_guid();
}

if (elgg_view("usersettings/$plugin_id/edit")) {
?>

<div class="elgg-module elgg-module-info">
	<div class="elgg-head">
		<h3><?php echo $plugin->manifest->getName(); ?></h3>
	</div>
	<div class="elgg-body">
		<div id="<?php echo $plugin_id; ?>_settings">
			<?php echo elgg_view("object/plugin", array(
				'plugin' => $plugin,
				'entity' => elgg_get_all_plugin_user_settings($plugin_id, $user_guid),
				'type' => 'user'
			));
			?>
		</div>
	</div>
</div>
<?php
}