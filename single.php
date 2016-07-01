<?php
	get_header();
	
	if ( have_posts() ) while ( have_posts() ) : the_post();?>

	 <!-- Container (notice the relative width) :  -->
        <div id="container3" style="width: 80%; max-width:1000px; height: 600px; background: #E0E0E0; margin:auto;"></div>
    
    	<?php 

		$images = get_field('images');

		if( $images ): ?>
        
        <?php foreach( $images as $image ): ?>
        <script>
            $(function(){
                var instance = $('#container3').Chocolat({
                    setTitle : 'set title',
                    loop: true,
					enableZoom		:false,
                    images : [
                        {src : '<?php echo $image['sizes']['large']; ?>', title : '<?php echo $image['caption']; ?>'},
                    ],
                    imageSize : 'contain',
                    container : '#container3'
                }).data('chocolat');
				   instance.api().open()
                
                $('.api-prev').on('click', function(e) {
                    e.preventDefault()

                    console.log('prev start');
                    var def = instance.api().prev()

                    def.done(function(){
                        console.log('prev done');
                    })
                })
                $('.api-next').on('click', function(e) {
                    e.preventDefault()

                    console.log('next start');
                    var def = instance.api().next()

                    def.done(function(){
                        console.log('next done');
                    })
                })

            });
        </script>
	<?php endforeach; ?>
<?php endif; ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
