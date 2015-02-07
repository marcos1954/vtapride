  <footer>
    <div class="w-container footer">
      <div class="w-row newsletter-social">
        <div class="w-col w-col-3"></div>
        <div class="w-col w-col-6">
          <div class="w-form form-subscribe-wrapper">
            <form action="http://vallartapride.us7.list-manage1.com/subscribe/post?u=724f3c9a82fb4170cade1495d&amp;id=4025c03812" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <label class="form-label" for="email"><?= LBL_SUBSCRIBE ?></label>
              <input class="w-input form-input" type="email" placeholder="<?= LBL_EMAIL_NL ?>" name="EMAIL" required="required">
              <input class="w-button form-button" id="mc-embedded-subscribe" type="submit" value="<?= LBL_EMAIL_NL_SEND ?>" data-wait="<?= LBL_WAIT ?>">
            </form> 
            <div class="w-form-done">
              <p><?= LBL_THANKS ?></p>
            </div>
            <div class="w-form-fail">
              <p><?= LBL_WRONG ?></p>
            </div>
          </div>
        </div>
        <div class="w-col w-col-3"></div>
      </div>
      <div class="footer-base-text">
        <?= LBL_FOOT_DISC ?>
      </div>
      <a class="footer-contact content-link" href="javascript:void(0)">
      <?= LBL_FOOT_CONTACT ?>
      </a>
      <div class="footer-base-text">
      <?= LBL_FOOT_COPYR ?>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  <?php get_template_part( 'includes/scripts'); ?>
  </body>
</html>