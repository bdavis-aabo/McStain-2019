<?php
$_columns   = 2;
$_rowCount  = 0;
$_bootWidth = 12 / $_columns;
$_m = 1;

$_rows = get_field('models');
$_totalRows = count($_rows);

?>

<?php if(get_field('models_content') != ''): ?>
<section class="community-models">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 col-sm-12">
        <div class="community-models-content">
          <?php echo get_field('models_content') ?>
        </div>
      </div>
    </div>
  </div>

  <!-- mobile models -->
  <div class="mobile-models">
    <div class="container-fluid">
      <div class="row">
        <?php while(have_rows('models')): the_row();
          $_modelImage = get_sub_field('model_rendering');
          $_size = 'thumbnail';
          $_thumb = $_modelImage['sizes'][$_size];
        ?>
        <div class="col <?php if($_totalRows == $_m): echo 'col-6'; endif; ?>">
          <article class="model comm-model" data-target="<?php echo strtolower(get_sub_field('model_name')) ?>" style="margin-bottom: 20px;">
            <img src="<?php echo $_thumb; ?>" alt="<?php echo $_modelImage['title'] ?>" class="img-fluid" />
            <div class="overlay"><span><?php echo get_sub_field('model_name') ?></span></div>
          </article>
        </div>
        <?php $_rowCount ++; $_m++;
          if($_rowCount % $_columns == 0): echo '</div><div class="row">'; endif; ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
  <?php //endif; ?>
  <!-- /end mobile models -->

  <!-- normal models -->
  <div class="normal-models">
    <div class="container-fluid">
      <div class="row">
        <?php if(have_rows('models')): while(have_rows('models')): the_row();
        $_modelImage = get_sub_field('model_rendering');
        $_size = 'thumbnail';
        $_thumb = $_modelImage['sizes'][$_size];
        ?>
        <div class="col-6 col-sm-4 col-md-4 col-lg-2">
          <article class="model comm-model" data-target="<?php echo strtolower(get_sub_field('model_name')) ?>">
            <img src="<?php echo $_thumb ?>" alt="<?php echo $_modelImage['title'] ?>" class="img-fluid" />
            <div class="overlay"><span><?php echo get_sub_field('model_name') ?></span></div>
          </article>
        </div>
        <?php endwhile; endif; ?>

        <div class="col-6 col-sm-4 col-md-4 col-lg-2 right-btn">
          <article class="model">
            <button class="gold-btn btn btn-block model-btn cult-trigger">
              <span class="arrows"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></span>
              <span class="text"> See More</span>
            </button>
          </article>
        </div>
      </div>
    </div>
  </div>
  <!-- /end normal models -->

  <button class="btn gold-btn sidebar-btn model-btn cult-trigger"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> See more</button>
</section>
<?php endif; ?>
