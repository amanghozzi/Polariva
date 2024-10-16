<?php 
$widget_id = 'bwp_brand_' . rand() . time();
$term_brands = array();

if (!is_array($category)) {
    $category = explode(',', $category);
}

if ($category) {
    $term_brands = $category;
    $j = 1;
?>
    <div id="<?php echo esc_attr($widget_id); ?>" class="bwp-brand <?php echo esc_attr($layout); ?>">
        <?php if ($title1 != '') { ?>
            <div class="title_brand">
                <?php echo ($title1 != '') ? '<h2>' . esc_html($title1) . '</h2>' : ''; ?>
            </div>
        <?php } ?>
        <div class="slider slick-carousel" data-dots="<?php echo esc_attr($show_pag); ?>" data-nav="<?php echo esc_attr($show_nav); ?>" data-columns4="<?php echo esc_attr($columns4); ?>" data-columns3="<?php echo esc_attr($columns3); ?>" data-columns2="<?php echo esc_attr($columns2); ?>" data-columns1="<?php echo esc_attr($columns1); ?>" data-columns1440="<?php echo esc_attr($columns1440); ?>" data-columns="<?php echo esc_attr($columns); ?>">
            <?php 
            foreach ($term_brands as $term_brand) {
                $term = get_term_by('slug', $term_brand, 'product_brand');
                if ($term) {
                    $thumb = get_term_meta($term->term_id, 'thumbnail_bid', true);
                    $thumbnail = !empty($thumb) ? $thumb : "http://placehold.it/200x200";
                    if (($j == 1) || ($j % $item_row == 1) || ($item_row == 1)) {
            ?>
                        <div class="item">
                    <?php } ?>
                    <div class="item-image">
                        <a href="<?php echo esc_url(get_term_link($term->term_id, 'product_brand')); ?>"> <img class="<?php if ($image_hover) { ?> elementor-animation-<?php echo esc_attr($image_hover); } ?>" src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_html($term->name); ?>"></a>
                    </div>
                    <?php if (($j % $item_row == 0) || ($item_row == 1)) { ?>
                        </div>
                    <?php }
                    $j++;
                }
            }
            ?>
        </div>
    </div>
<?php } ?>
