<?php
/**
 * Displays the icons that appear over the header
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 */

 function create_droplet($icon, $text) {
	return <<<HTML
		<div class="droplet-item">
			<div class="droplet-image">
				<img src="{$icon}" alt="$text"/>
			</div>
			<div class="droplet-text">
				<p>$text</p>
			</div>
		</div>
HTML;
 }
?>

<?php if ( get_header_image() ) : ?>
	<div class="droplets">
        <?php echo create_droplet(get_template_directory_uri() . '/images/Webathon_segment.png', "<b>Segment</b> your data effectively"); ?>
        <?php echo create_droplet(get_template_directory_uri() . '/images/Webathon_distribute.png', "<b>Distribute</b> tasks to your team"); ?>
        <?php echo create_droplet(get_template_directory_uri() . '/images/Webathon_manage.png', "<b>Manage</b> your workflow"); ?>
	</div>
<?php endif; ?>
