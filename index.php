<?php get_header(); ?>

<section class="site-blocks-cover overflow-hidden bg-light">
 <div class="container">
  <div class="row">
   <div class="col-md-7 align-self-center text-center text-md-left">
    <div class="intro-text">
     <h1><?php the_field('home_title'); ?></h1>
     <p class="mb-4"><?php the_field('home_descr'); ?></p>
    </div>
   </div>
   <div class="col-md-5 align-self-end text-center text-md-right">
    <img src="<?php the_field('home_img'); ?>" alt="Image" class="img-fluid cover-img" />
   </div>
  </div>
 </div>
</section>
<section class="site-section">
 <div class="container">
  <div class="row justify-content-center" data-aos="fade-up">
   <div class="col-lg-6 text-center heading-section mb-5">
    <div class="paws">
     <span class="icon-paw"></span>
    </div>
    <h2 class="text-black mb-2"><?php the_field('about_title'); ?></h2>
    <p><?php the_field('about_descr'); ?></p>
   </div>
  </div>
  <?php if (have_rows('featured_items')) : ?>
  <?php $counter = 0; ?>
  <?php while (have_rows('featured_items')) : the_row(); ?>
  <div class="row hover-1-wrap mb-5 mb-lg-0">
   <div class="col-12">
    <div class="row">
     <div class="mb-4 mb-lg-0 col-lg-6 <?php echo ($counter % 2 == 0) ? 'order-lg-2' : ''; ?>" data-aos="<?php echo ($counter % 2 == 0) ? 'fade-right' : 'fade-left'; ?>">
      <a href="#" class="hover-1">
       <img src="<?php the_sub_field('item_image'); ?>" alt="Image" class="img-fluid" />
      </a>
     </div>
     <div class="col-lg-5 <?php echo ($counter % 2 == 0) ? 'mr-auto text-lg-right' : 'ml-auto'; ?> align-self-center <?php echo ($counter % 2 == 0) ? 'order-lg-1' : ''; ?>" data-aos="<?php echo ($counter % 2 == 0) ? 'fade-left' : 'fade-right'; ?>">
      <h2 class="text-black"><?php the_sub_field('item_heading'); ?></h2>
      <p class="mb-4"><?php the_sub_field('item_description'); ?></p>
      <p><a href="<?php the_sub_field('item_link'); ?>" class="btn btn-primary">Read More</a></p>
     </div>
    </div>
   </div>
  </div>
  <?php $counter++; ?>
  <?php endwhile; ?>
  <?php endif; ?>
 </div>
</section>
<section class="site-section" id="about-section">
 <div class="container">
  <div class="row justify-content-center" data-aos="fade-up">
   <div class="col-lg-5 align-self-center mr-auto text-left heading-section mb-5">
    <div class="paws ml-4">
     <span class="icon-paw"></span>
    </div>
    <h2 class="text-black mb-3"><?php the_field('about_us_title'); ?></h2>
    <p class="lead"><?php the_field('about_us_descr_1'); ?></p>
    <p class="text-muted mb-4"><?php the_field('about_us_descr_2'); ?></p>
    <ul class="list-unstyled ul-paw primary mb-0">
     <?php if (have_rows('about_list_items')) : ?>
     <?php while (have_rows('about_list_items')) : the_row(); ?>
     <li><?php the_sub_field('list_item'); ?></li>
     <?php endwhile; ?>
     <?php endif; ?>
    </ul>
   </div>
   <div class="col-lg-6 text-left heading-section mb-5" data-aos="fade-up" data-aos-delay="100">
    <a data-fancybox="" data-ratio="1.5" href="<?php the_field('about_us_link-video'); ?>" class="video-img">
     <span class="play">
      <span class="icon-play"></span>
     </span>
     <img src="<?php the_field('about_us_img'); ?>" alt="Image" class="img-fluid" />
    </a>
   </div>
  </div>
 </div>
</section>
<section class="site-section bg-primary trainers" id="trainers-section">
 <div class="container">
  <div class="row justify-content-center" data-aos="fade-up">
   <div class="col-lg-7 text-center heading-section mb-5">
    <div class="paws white">
     <span class="icon-paw"></span>
    </div>
    <h2 class="mb-2 heading"><?php the_field('trainers_title'); ?></h2>
    <p>
     <?php the_field('trainers_description'); ?>
    </p>
   </div>
  </div>
  <div class="row">
   <?php if (have_rows('trainers_repeater')) :
        while (have_rows('trainers_repeater')) : the_row(); ?>
   <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="">
    <div class="trainer">
     <figure>
      <img src="<?php the_sub_field('trainer_image'); ?>" alt="Image" class="img-fluid" />
     </figure>
     <div class="px-md-3">
      <h3><?php the_sub_field('trainer_name'); ?></h3>
      <p><?php the_sub_field('trainer_description'); ?></p>
      <ul class="ul-social-circle">
       <?php if (have_rows('social_media_repeater')) :
                    while (have_rows('social_media_repeater')) : the_row(); ?>
       <li>
        <a href="<?php the_sub_field('social_media_link'); ?>">
         <span class="<?php the_sub_field('social_media_icon'); ?>"></span>
        </a>
       </li>
       <?php endwhile;
                  endif; ?>
      </ul>
     </div>
    </div>
   </div>
   <?php endwhile;
      endif; ?>
  </div>
 </div>
</section>

<section class="site-section" id="pricing-section">
 <div class="container">
  <div class="row justify-content-center" data-aos="fade-up">
   <div class="col-lg-7 text-center heading-section mb-5">
    <div class="paws">
     <span class="icon-paw"></span>
    </div>
    <h2 class="mb-2 text-black heading"><?php the_field('pricing_table_title'); ?></h2>
    <p><?php the_field('pricing_table_description'); ?></p>
   </div>
  </div>
  <div class="row no-gutters">
   <?php if (have_rows('pricing_plans_repeater')) :
        while (have_rows('pricing_plans_repeater')) : the_row(); ?>
   <?php
          $background_color = get_sub_field('background_color');
          $pricing_class = '';

          if ($background_color === 'Зеленый') {
              $pricing_class = 'bg-primary';
          } elseif ($background_color === 'Темно-серый') {
              $pricing_class = 'bg-dark';
          }
          ?>
   <div class="col-12 col-sm-6 col-md-6 col-lg-4 <?php echo $pricing_class; ?> p-3 p-md-5" data-aos="fade-up" data-aos-delay="" style="margin-left: -1px">
    <div class="pricing">
     <h3 class="text-center text-white text-uppercase"><?php the_sub_field('plan_title'); ?></h3>
     <div class="price text-center mb-4">
      <span
       ><span><?php the_sub_field('plan_price'); ?></span> / year</span
      >
     </div>
     <ul class="list-unstyled ul-check success mb-5">
      <?php if (have_rows('features_repeater')) :
                while (have_rows('features_repeater')) : the_row(); ?>
      <?php
                  $currentIndex = get_row_index();
                  $liClass = '';

                  // Получение значения поля "Remove Items"
                  $removeItems = get_sub_field('remove_items');

                  // Разделение значения на индексы
                  $removeIndexes = explode(',', $removeItems);
                  $removeIndexes = array_map('trim', $removeIndexes);

                  // Проверка, должен ли элемент иметь класс "remove"
                  if (in_array($currentIndex, $removeIndexes)) {
                      $liClass = 'remove';
                  }
                  ?>
      <li class="<?php echo $liClass; ?>"><?php the_sub_field('feature_item'); ?></li>
      <?php endwhile;
              endif; ?>
     </ul>
     <p class="text-center">
      <a href="<?php the_sub_field('feature_btn_link'); ?>" class="btn btn-secondary">Buy Now</a>
     </p>
    </div>
   </div>
   <?php endwhile;
      endif; ?>
  </div>
 </div>
</section>


<section class="site-section" id="faq-section">
    <div class="container" id="accordion">
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-6 text-center heading-section mb-5">
                <div class="paws">
                    <span class="icon-paw"></span>
                </div>
                <h2 class="text-black mb-2"><?php the_field('questions_title'); ?></h2>
                <p><?php the_field('questions_description'); ?></p>
            </div>
        </div>
        <div class="row accordion justify-content-center block__76208">
            <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="">
                <img src="<?php the_field('faq_img'); ?>" alt="Image" class="img-fluid rounded" />
            </div>
            <div class="col-lg-5 mr-auto order-lg-1" data-aos="fade-up" data-aos-delay="100">
                <?php if (have_rows('faq_questions')) : ?>
                    <?php $first = true; ?>
                    <?php while (have_rows('faq_questions')) : the_row(); ?>
                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block <?php echo ($first ? 'collapsed' : ''); ?>" data-toggle="collapse" href="#collapse-<?php echo get_row_index(); ?>" role="button" aria-expanded="<?php echo ($first ? 'true' : 'false'); ?>" aria-controls="collapse-<?php echo get_row_index(); ?>">
                                    <?php the_sub_field('faq_title'); ?><span class="icon"></span>
                                </a>
                            </h3>
                            <div id="collapse-<?php echo get_row_index(); ?>" class="collapse <?php echo ($first ? 'show' : ''); ?>" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="body-text">
                                    <p><?php the_sub_field('faq_answer'); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php $first = false; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<section class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
    <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-6 text-center heading-section mb-5">
                <div class="paws">
                    <span class="icon-paw"></span>
                </div>
                <h2 class="text-black mb-2"><?php the_field('testimonials_title'); ?></h2>
            </div>
        </div>
        <div data-aos="fade-up" data-aos-delay="200">
            <div class="owl-carousel nonloop-block-13">
                <?php $testimonial_items = get_field('testimonial_items'); ?>
                <?php if ($testimonial_items) : ?>
                    <?php foreach ($testimonial_items as $testimonial_item) : ?>
                        <div>
                            <div class="block-testimony-1 text-center">
                                <blockquote class="mb-4">
                                    <p><?php echo $testimonial_item['testimonial_text']; ?></p>
                                </blockquote>
                                <figure>
                                    <?php $image = $testimonial_item['testimonial_image']; ?>
                                    <?php if ($image) : ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid rounded-circle mx-auto" />
                                    <?php endif; ?>
                                </figure>
                                <h3 class="font-size-20 text-black"><?php echo $testimonial_item['testimonial_author']; ?></h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>




<section class="site-section" id="gallery-section">
    <div class="container-fluid">
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-6 text-center heading-section mb-5">
                <div class="paws">
                    <span class="icon-paw"></span>
                </div>
                <h2 class="text-black mb-2"><?php the_field('gallery_title'); ?></h2>
            </div>
        </div>
        <div class="row no-gutters">
            <?php if (have_rows('photo_gallery')) : ?>
                <?php while (have_rows('photo_gallery')) : the_row(); ?>
                    <?php $image = get_sub_field('photo_gallery_img'); ?>
                    <a class="col-6 col-md-6 col-lg-4 col-xl-3 gal-item d-block" data-aos="fade-up" data-aos-delay="100" href="<?php echo esc_url($image['url']); ?>" data-fancybox="gal">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid" />
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>



<section class="site-section" id="blog-section">
    <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-6 text-center heading-section mb-5">
                <div class="paws">
                    <span class="icon-paw"></span>
                </div>
                <h2 class="text-black mb-2"><?php the_field('blog_title'); ?></h2>
                <p><?php the_field('blog_description'); ?></p>
            </div>
        </div>
        <div class="row">
            <?php if (have_rows('blog_entries')) : ?>
                <?php while (have_rows('blog_entries')) : the_row(); ?>
                    <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="">
                        <div class="d-lg-flex blog-entry">
                            <?php $image = get_sub_field('blog_entry_image'); ?>
                            <?php if ($image) : ?>
                                <figure class="mr-4">
                                    <a href="<?php the_sub_field('blog_entry_link'); ?>">
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid" />
                                    </a>
                                </figure>
                            <?php endif; ?>
                            <div class="blog-entry-text">
                                <h3>
                                    <a href="<?php the_sub_field('blog_entry_link'); ?>"><?php the_sub_field('blog_entry_title'); ?></a>
                                </h3>
                                <span class="post-meta mb-3 d-block"><?php the_sub_field('blog_entry_date'); ?></span>
                                <p><?php the_sub_field('blog_entry_text'); ?></p>
                                <p><a href="<?php the_sub_field('blog_entry_link'); ?>" class="">Read More..</a></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>



<section class="site-section" id="services-section">
 <div class="container">
  <div class="row justify-content-center" data-aos="fade-up">
   <div class="col-lg-6 text-center heading-section mb-5">
    <div class="paws">
     <span class="icon-paw"></span>
    </div>
    <h2 class="text-black mb-2">Our Services</h2>
    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
   </div>
  </div>
  <div class="row">
   <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="">
    <div class="block_service">
     <img src="<?php echo bloginfo('template_url'); ?>/images/dogger_checkup.svg" alt="Image mb-5" />
     <h3>Dog Checkup</h3>
     <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
   </div>
   <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
    <div class="block_service">
     <img src="<?php echo bloginfo('template_url'); ?>/images/dogger_dermatology.svg" alt="Image mb-5" />
     <h3>Dog Dermatology</h3>
     <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
   </div>
   <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
    <div class="block_service">
     <img src="<?php echo bloginfo('template_url'); ?>/images/dogger_bones.svg" alt="Image mb-5" />
     <h3>For Strong Teeth</h3>
     <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
   </div>
   <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="">
    <div class="block_service">
     <img src="<?php echo bloginfo('template_url'); ?>/images/dogger_veterinary.svg" alt="Image mb-5" />
     <h3>Dog First Aid</h3>
     <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
   </div>
   <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
    <div class="block_service">
     <img src="<?php echo bloginfo('template_url'); ?>/images/dogger_dryer.svg" alt="Image mb-5" />
     <h3>Dog Dryer</h3>
     <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
   </div>
   <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
    <div class="block_service">
     <img src="<?php echo bloginfo('template_url'); ?>/images/dogger_veterinarian.svg" alt="Image mb-5" />
     <h3>Expert Veterinarian</h3>
     <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
   </div>
  </div>
 </div>
</section>
<section class="" id="contact-section">
 <div class="container">
  <div class="row no-gutters">
   <div class="col-lg-6 bg-primary">
    <form action="#" class="p-5 contact-form">
     <h2 class="h4 mb-5 heading">Contact Form</h2>
     <div class="row form-group">
      <div class="col-md-6 mb-3 mb-md-0">
       <label for="fname">First Name</label>
       <input type="text" id="fname" class="form-control" />
      </div>
      <div class="col-md-6">
       <label for="lname">Last Name</label>
       <input type="text" id="lname" class="form-control" />
      </div>
     </div>
     <div class="row form-group">
      <div class="col-md-12">
       <label for="email">Email</label>
       <input type="email" id="email" class="form-control" />
      </div>
     </div>
     <div class="row form-group">
      <div class="col-md-12">
       <label for="subject">Subject</label>
       <input type="subject" id="subject" class="form-control" />
      </div>
     </div>
     <div class="row form-group">
      <div class="col-md-12">
       <label for="message">Message</label>
       <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
      </div>
     </div>
     <div class="row form-group">
      <div class="col-md-12">
       <input type="submit" value="Send Message" class="btn btn-dark btn-md text-white" />
      </div>
     </div>
    </form>
   </div>
   <div class="col-lg-6 bg-secondary">
    <div class="row justify-content-center align-items-center h-100">
     <div class="col-lg-6 text-center heading-section mb-5 align-self-center">
      <div class="paws">
       <span class="icon-paw"></span>
      </div>
      <h2 class="text-white mb-5">Contact Us</h2>
      <ul class="list-unstyled text-left address">
       <li>
        <span class="d-block">Address:</span>
        <p>Melbourne St,South Birbane 4101 Austraila</p>
       </li>
       <li>
        <span class="d-block">Phone:</span>
        <p>+(000) 123 4567 89</p>
       </li>
       <li>
        <span class="d-block">Email:</span>
        <p></p>
       </li>
      </ul>
     </div>
    </div>
   </div>
  </div>
 </div>
</section>
<?php get_footer(); ?>
