<?php
$get_a_quote_image = get_field('get_a_quote_image', 'option');
$get_a_quote_image_mobile = get_field('get_a_quote_image_mobile', 'option');
$form_shortcode = get_field('get_a_quote_form_shortcode', 'option');
?>

<div id="get-a-quote" class="modal fixed get-a-quote bg-overlay inset-0 z-14 h-100 w-100 transition">
    <div class="container h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-90 xs:h-100 align-center relative bg-white z-1 xs:scroll-y">
                <button class="btn btn-secondary absolute xs:fixed z-1 top-0 right-0 close" onclick="closeModal('get-a-quote')">
                    <i class="icomoon icon-close"></i>
                </button>
                <div class="col w-50 h-100 xs:w-100 xs:h-50 md:hidden xs:visible">
                    <?php if ($get_a_quote_image && $get_a_quote_image_mobile) { ?>
                    
                    <?php
                        $mobile_aspectratio = [430, 466];
                        if ($get_a_quote_image_mobile) {
                            $mobile_aspectratio = [430, 466, $get_a_quote_image_mobile['ID']];
                        }
                        ?>

                    <?php
                        $cropOptions = [
                            '(max-width: 768px)' => $mobile_aspectratio,
                            '(min-width: 769px)' => [576, 701],
                        ];
                        $attributes = ['picturetag_class' => 'h-100 w-100 sm:w-100', 'class' => 'h-100 cover', 'loading' => 'lazy'];
                        ?>
                    <?php echo hatslogic_get_attachment_picture($get_a_quote_image['ID'], $cropOptions, $attributes); ?>

                    <?php } ?>
                </div>
                <div class="col w-50 h-100 xs:h-auto md:w-100 md:h-auto p-60 md:px-20 xs:py-60 flex align-center">
                    <div class="form-wrap">
                    <?php echo do_shortcode('[contact-form-7 id="'.$form_shortcode->ID.'"]'); ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>