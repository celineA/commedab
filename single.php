<?php
	$args = array(
		'post_type' => 'attachment',
		'numberposts' => -1,
		'post_status' => null,
		'orderby' => 'menu_order',
		'post_parent' => $post->ID
	); 
	$attachments = get_posts($args);
	if (count($attachments) > 1) {
		$attachments = array_reverse($attachments);
		$i = 0;
		foreach ($attachments as $attachment) {
			if($attachment->ID != get_post_thumbnail_id($post->ID)){
?>
					
	<div class="content" id="content-<?php echo $i; ?>">
		<div class="content-img">
			<div class="fleche prev"></div>
			<div class="fleche next"></div>
			<img src="<?php echo $attachment->guid; ?>" alt="" class="une-image">
		</div>
		<div class="content-desc" id="content-desc-<?php echo $i; ?>">
			<h2><?php _e($attachment->post_title); ?></h2>
		</div>
	</div>
                    
<?php 
	$i++;
		    }
			}
		}
?>



<?php 
$images = get_field('images');     
  if( $images ): ?>
        <?php foreach( $images as $image ): ?>
                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                <p><?php echo $image['caption']; ?></p>
        <?php endforeach; ?>
  <?php endif; ?>
