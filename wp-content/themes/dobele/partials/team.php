<div class="col-md-6 team">

<?php
$query = new WP_Query( array('post_type' => 'team', 'post_status' => 'publish', 'orderby' => array('date' => 'ASC') ));

while ($query->have_posts()) {
    $query->the_post();
    $post_id = get_the_ID();
    
    $custom = get_post_custom($post_id);
    
    $name = get_the_title($post_id);
    $ocup = $custom["occupation"][0];
    $phone = $custom["phone"][0];
    $email = $custom["email"][0];
    $image = get_the_post_thumbnail_url( $post_id, 'post-thumbnail');
   
?>
    <div class="col-sm-6 single-item">
        <div class="image">
            <?php if($image){ ?>
                <img alt="Brigita Tvica" src="<?php echo $image; ?>"/>
            <?php };?>
            
        </div>
        <p class="name"><?php echo $name; ?></p>
        <p class="ocupation"><?php echo $ocup; ?></p>
        <hr>
        <p class="phone"><?php echo $phone; ?></p>
        <p class="email"><?php echo $email; ?></p>
    </div>
    
<?php

} ?>
</div>