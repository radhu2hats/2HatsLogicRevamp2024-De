<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<section class="expertise <?php echo $bg_class; ?>">
    <div class="container">
        <div class="flex justify-between md:wrap">
            <div class="col w-40 md:w-100"> 
                <a href="<?php echo $link; ?>" target="_blank">
                    <img src="<?php echo $image['url']; ?>" class="w-100 md:w-80" alt="shopware-partner" loading="lazy"
                        width="100" height="100">
                </a>

            </div>
            <div class="col ml-60 sm:ml-0 w-60 md:w-100 md:mt-60 xs:mt-40">
                <?php if ($title): ?>
                <h2><?php echo $title ?></h2>
                <?php endif; ?>
                <?php if ($description): ?>
                <p><?php echo $description ?></p>
                <?php endif; ?>
                
                <?php if ($lists): ?>
                <ul class="no-bullets split-2 sm:split-1 fs-20 lh-1-2 mt-40 sm:fs-16">
                    <?php foreach ($lists as $key => $list): ?>
                        <li class="relative block <?php echo ($key >= 1) ? ' mt-20 xs:mt-15' : ''; ?>"><i
                                class="icomoon icon-priority fs-15 absolute left-0 top-6"></i>
                            <span class="inline-block ml-30"><?php echo $list['list_item'] ?></span>
                        </li>
                    <?php endforeach; ?>

                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>