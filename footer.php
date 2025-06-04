</main>

<footer>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="developer">
          <?php if (get_field('ontwikkelaar_tekst', 'option')): ?>
            <?= get_field('ontwikkelaar_tekst', 'option'); ?>
          <?php endif; ?>
          <?php if ($imageDeveloper = get_field('ontwikkelaar_logo', 'option')): ?>
            <img src="<?php echo esc_url($imageDeveloper['url']); ?>"
              alt="<?php echo esc_attr($imageDeveloper['alt']); ?>" />
          <?php endif; ?>
        </div>
        <div class="socials">
          <?php if (get_field('socials_tekst', 'option')): ?>
            <?= get_field('socials_tekst', 'option'); ?>
          <?php endif; ?>
          <div class="icons">

            <?php if (get_field('socials_facebook', 'option')): ?>
              <a href="<?= get_field('socials_facebook', 'option') ?>" target="_blank" class="facebook icon flex-center">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
            <?php endif; ?>

            <?php if (get_field('socials_instagram', 'option')): ?>
              <a href="<?= get_field('socials_instagram', 'option') ?>" target="_blank" class="insta icon flex-center">
                <i class="fa-brands fa-instagram"></i>
              </a>
            <?php endif; ?>

            <?php if (get_field('socials_linkedin', 'option')): ?>
              <a href="<?= get_field('socials_linkedin', 'option') ?>" target="_blank" class="linkedin icon flex-center">
                <i class="fa-brands fa-linkedin-in"></i>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-1"> -->
      <!-- </div> -->
      <div class="col-md-3">
        <div class="real-estate">
          <?php if (get_field('makelaar_tekst', 'option')): ?>
            <?= get_field('makelaar_tekst', 'option'); ?>
          <?php endif; ?>
          <?php if ($imageEstate = get_field('makelaar_logo', 'option')): ?>
            <img src="<?php echo esc_url($imageEstate['url']); ?>" alt="<?php echo esc_attr($imageEstate['alt']); ?>" />
          <?php endif; ?>
          <?php if (get_field('makelaar_info', 'option')): ?>
            <?= get_field('makelaar_info', 'option'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
</footer>
<div class="disclaimer-container">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-6">
        <div class="privacy">
          <a href="<?= get_privacy_policy_url(); ?>">Privacy statement</a> - <a href="https://dunepebbler.nl"
            target="_blank">Website door Dune Pebbler</a>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= get_stylesheet_directory_uri(); ?>/assets/owlcarousel/owl.carousel.min.js" type="text/javascript">
  </script>
  <script src="<?= get_stylesheet_directory_uri(); ?>/js/main.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" crossorigin="anonymous">
  </script>
  <?php wp_footer(); ?>
  </body>

  </html>