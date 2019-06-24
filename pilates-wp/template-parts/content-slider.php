
<div class="slider__item" style="background-image:url(<?php echo get_template_directory_uri()?>/img/images/Points-bg-slider.png)">
    <img src="<?php echo get_the_post_thumbnail_url(  get_the_ID(), 'review-slider' );?>" alt="Фото автора отзыва" class="comments__img">
    <div class="comments__content">
        <h3 class="comments__name"> <?php the_title();?></h3>
        <p class="comments__info">
            <?php echo get_post_meta( get_the_ID(), 'age', true );?> 
            <span class="comments__social">
                
                <a href="<?php the_field('vk'); ?>" target='blank'><i class="ic <?php the_field('icon-vk'); ?>"></i></a>
                <a href="<?php the_field('ing'); ?>"><i class="ic <?php the_field('icon-ing'); ?>"></i></a>
                <a href="<?php the_field('fb'); ?>"><i class="ic <?php the_field('icon-fb'); ?>"></i></a>
            </span>
        </p>
        <p class="comments__text">
            <?php echo get_post_meta( get_the_ID(), 'text-review', true );?>  
        </p>
    </div>
</div>
