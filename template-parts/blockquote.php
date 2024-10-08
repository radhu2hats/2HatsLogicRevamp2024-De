<?php 
$quote = get_field('quote','option');
$name = get_field('author','option');
$designation = get_field('author_designation','option');
$avatar = get_field('author_avatar','option');
$cta = get_field('quote_cta','option');
?>

<?php if($quote || $name || $designation || $avatar || $cta): ?>
<section class="greeting-from-ceo pb-100 md:pb-60">
    <div class="container">
        <div class="content">
            <div
                class="w-100 shadow max-w-90 md:max-w-100 px-100 py-60 md:px-20 md:py-30 m-auto b-1 solid bc-light-grey xs:pt-40">
                <?php if($quote): ?>
                <blockquote class="font-quote w-100 m-0 fs-20 lh-1-5"><?php echo $quote; ?></blockquote>
                <?php endif; ?>
                <div class="flex justify-between align-end md:wrap md:justify-end">
                    <div class="avatar-wrap flex align-center mt-30 md:w-100 md:mb-20">
                        <?php if($avatar): ?>
                        <div class="img-wrap bg-light-grey w-px-75 h-px-75 max-w-px-75 min-w-px-75 xs:w-px-50 xs:h-px-50 xs:max-w-px-50 xs:min-w-px-50 over border-radius-100 overflow-hidden">
                            <img src="<?php echo  $avatar['sizes']['img_180x180']; ?>" alt="CEO" width="100" height="100">
                        </div>
                        <?php endif; ?>
                        <div class="author ml-20">
                            <?php if($name): ?>
                            <div class="author-name fs-18 font-bold"><?php echo $name;?></div>
                            <?php endif; ?>
                            <?php if($designation): ?>
                            <span class="designation font-light fs-15 lh-1-2 mt-5 inline-block">
                                <?php echo $designation ?>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div> 
                    <?php if ($cta) : ?>
                        <a href="<?php echo $cta['url']?>" class="btn btn-primary"><?php echo $cta['title'] ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
