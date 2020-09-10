<?php
/**
 * Displays the icons that appear over the header
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 */

 function create_section($image, $title, $text) {
	return <<<HTML
		<section class="content-section">
			<div class="section-image">
				<img src="{$image}" alt="{$text}"/>
			</div>
			<div class="section-text">
				<h1>{$title}</h1>
				<p>{$text}</p>
			</div>
		</section>
HTML;
 }
?>


	<?php echo create_section(get_template_directory_uri() . '/images/Webathon_tech girl.png', "Increase output efficiency", "Our web products bring your online presence to the 21st century. No more degredation of work output."); ?>
	<?php echo create_section(get_template_directory_uri() . '/images/Webathon_family around computer.png', "Earn the respect of your peers", "9 in 10 of our customers report a stronger reputation among their colleagues, friends and family."); ?>
	<?php echo create_section(get_template_directory_uri() . '/images/Webathon_handshake.png', "Follow your dreams", "The tide is high and you're holding on. We want to be your number one web service provider."); ?>

