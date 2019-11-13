<?php /*
  $_community = ucwords(str_replace('-', ' ', $post->post_name));
  $_projectID = '';

  switch($_community){
    case 'West Grange':
      $_projectID = '9882'; break;
    case 'Lost Creek Farm':
      $_projectID = '9883'; break;
    case 'Harvest Ridge':
      $_projectID = '9877'; break;
    case 'Painted Prairie':
      $_projectID = '10512'; break;
    case 'Arras Park':
      $_projectID = '10724'; break;
  }
  $_form = 'floorplan';
?>

<div class="form-introduction">
  <p><?php the_title() ?></p>
  <h1 class="gold-txt">Tell us which home excites you?</h1>
  <p>Select your favorite, and we'll tell you more.</p>
</div>

<div class="email-form">
  <form id="floorplan-form" name="floorplan-form" action="https://app.lassocrm.com/registrant_signup/" method="post">
    <div class="floorplan-container">
      <?php while(have_rows('models_form')): the_row();
        $_modelFormImage = get_sub_field('model_form_image');
        $_modelName = get_sub_field('model_name');
        $_modelShortName = substr($_modelName, 0, strpos($_modelName, ' -'));
        $_modelElevation = str_replace($_modelShortName. ' - ', '', $_modelName);

        $_modelNum = '';
        if(is_page('west-grange')){
          switch(strtolower($_modelShortName)){
            case 'concerto': $_modelNum = '236757'; break;
            case 'interlude': $_modelNum = '236758'; break;
            case 'harmony': $_modelNum = '236759'; break;
            case 'virtuoso': $_modelNum = '236760'; break;
            case 'serenade': $_modelNum = '236761'; break;
          }
        }
        if(is_page('lost-creek-farm')){
          switch(strtolower($_modelShortName)){
            case 'perspective': $_modelNum = '238753'; break;
            case 'scene': $_modelNum = '238754'; break;
            case 'panorama': $_modelNum = '238755'; break;
            case 'myriad': $_modelNum = '238756'; break;
            case 'aspect': $_modelNum = '238757'; break;
          }
        }
      ?>

      <div class="floorplan-item">
        <div class="floorplan-header">
          <div class="control control--radio">
            <input type="radio" name="Questions[57480]" value="<?php echo $_modelNum ?>" class="floorplan-radio" data-model="<?php echo strtolower($_modelShortName) ?>" />
            <div class="control__indicator"></div>
          </div>
          <div class="radio-information">
            <h2 class="model-name"><?php echo $_modelShortName . ' - <span>' . $_modelElevation . '</span>'; ?></h2>
            <?php echo get_sub_field('model_description') ?>
          </div>
        </div>
        <div class="floorplan-image">
          <img src="<?php echo $_modelFormImage['url'] ?>" alt="<?php echo get_sub_field('model_name') ?>" class="img-fluid aligncenter" />
        </div>
      </div>
      <?php endwhile; ?>
    </div>
    <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/leaf.png" />
    <p>Detailed information on your selected <?php //the_title() ?> home will be sent to you immediately.</p>
    <?php include('generic-form.php') ?>
  </form>


</div>
*/ ?>
