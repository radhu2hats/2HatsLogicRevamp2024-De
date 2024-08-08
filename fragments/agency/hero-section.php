<?php extract($section); ?>
<?php $rating =  get_field('reviews', 'options'); ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>

<section class="hero pt-60 overflow-hidden relative <?php echo $bg_class;?>">
  <div class="container relative z-1">
    <div class="flex align-start justify-between md:wrap">
      <div class="col w-50 md:w-100">
        <div class="service-header">
          <?php if ($headline['title']): ?>
            <h1 class="h1-sml"><?php echo $headline['title'] ?></h1>
          <?php endif; ?>
          <?php if ($headline['subtitle']): ?>
            <h2 class="h4 mt-15"><?php echo $headline['subtitle'] ?></h2>
          <?php endif; ?>
          <?php if ($content): ?>
            <p class="mt-30"><?php echo $content ?></p>
          <?php endif; ?>

          <?php if ($button): ?>
            <div class="btn-group mt-40">
              <a href="<?php echo $button['url']; ?>" class="btn btn-primary"><?php echo $button['title']; ?></a>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($review['review']) { ?>
                <div class="review-wrap bg-light-grey p-20 mt-40">

                    <div class="avatar-wrap flex align-center">
                        <?php if ($review['avatar']) { ?>
                        <div
                            class="img-wrap radius-50 bg-light-grey w-px-50 h-px-50 max-w-px-50 min-w-px-50 over overflow-hidden">
                            <img src="<?php echo $review['avatar']['sizes']['img_180x180']; ?>" alt="CEO" width="50"
                                height="50">
                        </div>
                        <?php } ?>
                        <div class="author ml-15">
                            <div class="author-name fs-16 font-bold"><?php echo $review['name']; ?></div>
                        </div>
                    </div>
                    <div class="review-block flex gap-20 md:mt-10 w-100 xs:wrap xs:w-100">
                        <p class="fs-16 c-primary"><?php echo $review['review']; ?></p>
                    </div>
                    <?php if ($rating['rating'] || $rating['score']) { ?>
                    <div class="google-rating flex justify-between align-center xs:wrap mt-15 xs:mt-10">
                        <div class="rating-score flex align-center gap-20">
                            <?php if ($rating['platform']) { ?>
                            <img src="<?php echo $rating['platform']['url']; ?>" class="w-px-100"
                                alt="<?php echo $rating['platform']['alt']; ?>" class="w-px-80" width="80" height="16">
                            <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/rating/google-logo.svg"
                                alt="google" class="w-px-80" alt="google" width="80" height="16">
                            <?php } ?>
                            <?php if ($rating['rating']) { ?>
                            <img src="<?php echo $rating['rating']['url']; ?>"
                                alt="<?php echo $rating['rating']['alt']; ?>" class="w-px-90" width="90" height="18">
                            <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/rating/star.svg"
                                alt="star" class="w-px-90" width="90" height="18">
                            <?php } ?>
                        </div>
                        <div class="label fs-16 xs:mt-5">
                            <?php echo esc_html($rating['score']); ?> based on
                            <?php if (!empty($rating['link_to_review'])) { ?>
                            <a href="<?php echo esc_url($rating['link_to_review']['url']); ?>" target="_blank"
                                class="c-primary">
                                <?php } ?>
                                <?php echo esc_html($rating['total']); ?> reviews
                                <?php if (!empty($rating['link_to_review'])) { ?>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
      </div>
      <?php if ($consultant['name'] || $form_selector): ?>
        <div class="col w-40 md:w-100 md:mt-40">
            <div class="consultation-wrap b-1 bc-hash solid bg-white p-50 xs:p-30">
                <h3 class="uppercase h4"><?php echo $form_title; ?></h3>

                <p><?php echo $form_description; ?></p>
                <div class="avatar-wrap flex align-center mt-30">
                    <?php if ($consultant['image']): ?>
                        <div
                            class="img-wrap bg-light-grey w-px-75 h-px-75 max-w-px-75 min-w-px-75 xs:w-px-50 xs:h-px-50 xs:max-w-px-50 xs:min-w-px-50">
                            <img src="<?php echo $consultant['image']['sizes']['img_180x180']; ?>" alt="avatar" width="75" height="75">
                        </div>
                    <?php endif; ?>
                    <?php if ($consultant['name'] || $consultant['desig']): ?>
                        <div class="author ml-30">
                            <div class="author-name fs-18 font-bold"><?php echo $consultant['name'] ?></div>
                            <span
                                class="designation font-regular fs-15 lh-1-35 mt-8 inline-block"><?php echo $consultant['desig']; ?></span>

                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($form_selector): ?>
                    <div class="form-wrap mt-20">
                        <?php echo do_shortcode('[contact-form-7 id="' . $form_selector->ID . '"]'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    </div>
  </div>
  <div class="bg-shape absolute z-0 right-0 top-0 w-60 h-px-500 md:w-80">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shape-01.png"
            srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shape-01.png 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shape-012x.png 2x"
            class="shape w-100 absolute -top-10" alt="shopware" width="100" height="100">
    </div>
</section>
