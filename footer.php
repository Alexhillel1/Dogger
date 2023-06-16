<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-5">
                        <h2 class="footer-heading mb-4"><?php the_field('about_us_title'); ?></h2>
                        <p><?php the_field('about_us_description'); ?></p>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <h2 class="footer-heading mb-4"><?php the_field('quick_links_title'); ?></h2>
                        <ul class="list-unstyled">
                            <?php if (have_rows('quick_links')) : ?>
                                <?php while (have_rows('quick_links')) : the_row(); ?>
                                    <li>
                                        <a href="<?php the_sub_field('quick_link'); ?>" class="smoothscroll"><?php the_sub_field('quick_link_title'); ?></a>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Follow Us</h2>
                        <?php if (have_rows('social_links')) : ?>
                            <?php while (have_rows('social_links')) : the_row(); ?>
                                <a href="<?php the_sub_field('social_media_link'); ?>" class="pl-0 pr-3"><span class="<?php the_sub_field('social_icon'); ?>"></span></a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                <form action="#" method="post" class="footer-subscribe">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2" />
                        <div class="input-group-append">
                            <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if (have_rows('copyright_info')) : ?>
  <?php while (have_rows('copyright_info')) : the_row(); ?>
    <div class="row pt-5 mt-5 text-center">
      <div class="col-md-12">
        <div class="border-top pt-5">
        <?php the_sub_field('copyright_text'); ?>
        <a href="<?php the_sub_field('copyright_link'); ?>" class="smoothscroll"><?php the_sub_field('copyright_link_text'); ?></a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>
    </div>
</footer>
  </div>
  <?php wp_footer(); ?>
 </body>
</html>