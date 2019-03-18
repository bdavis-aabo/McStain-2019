<?php $_form = 'design'; ?>

<div class="form-introduction">
  <p>Look at the remarkable interior design suites you can select from.</p>
  <h1 class="green-txt">Which one adds just the right<br/>style to your life</h1>
  <p>Tell us and you will receive complete portfolio details of your selected design suite.</p>
</div>

<div class="email-form">
  <form id="design-form" name="design-form" action="https://app.lassocrm.com/registrant_signup/" method="post">

    <div class="floorplan-container">
      <div class="floorplan-item">
        <div class="floorplan-header gray-bg">
          <div class="control control--radio">
            <input type="radio" name="Questions[57481]" value="236762" class="" />
            <div class="control__indicator"></div>
          </div>
          <div class="radio-information">
            <h2 class="model-name">Traditional</h2>
            <p>You're someone who likes the warmth and comfort of a traditional interior style.</p>
          </div>
        </div>
        <div class="floorplan-image">
          <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/traditional-form.jpg" alt="traditional" class="img-fluid aligncenter" />
        </div>
      </div>
      <div class="floorplan-item">
        <div class="floorplan-header ">
          <div class="control control--radio">
            <input type="radio" name="Questions[57481]" value="236763" class="" />
            <div class="control__indicator"></div>
          </div>
          <div class="radio-information">
            <h2 class="model-name">Fusion</h2>
            <p>You're someone who likes the best of traditional with some modern influence.</p>
          </div>
        </div>
        <div class="floorplan-image">
          <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/fusion-form.jpg" alt="Fusion" class="img-fluid aligncenter" />
        </div>
      </div>
      <div class="floorplan-item">
        <div class="floorplan-header brown-bg">
            <div class="control control--radio">
              <input type="radio" name="Questions[57481]" value="236764" class="" />
              <div class="control__indicator"></div>
            </div>
          <div class="radio-information">
            <h2 class="model-name">Modern</h2>
            <p>You're someone who likes the sleek look and style of modern design.</p>
          </div>
        </div>
        <div class="floorplan-image">
          <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/contemporary-form.jpg" alt="Modern" class="img-fluid aligncenter" />
        </div>
      </div>
    </div>
    <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/leaf.png" />
    <p>Your expanded portfolio of your selected design suite will be sent to you immediately.</p>

    <?php include('generic-form.php') ?>
  </form>


</div>
