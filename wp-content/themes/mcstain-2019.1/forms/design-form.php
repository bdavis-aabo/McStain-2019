<?php
$_projectID = '';
$_url = parse_url($_SERVER['REQUEST_URI']);
$_path = $_url['path'];
$_segmentUrl = explode('/',$_path);

$_comm = str_replace('-','',$_segmentUrl[2]);
$_community = ucwords(str_replace('-', ' ', $_segmentUrl[2]));
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

  $_floorplan = substr($_segmentUrl[4],0,-5);
?>

<h2 class="floorplan-form-title">Please send me a more information about the design suites at <?php echo $_community ?></h2>

<form id="contact-form" name="contact-form" action="https://app.lassocrm.com/registrant_signup/" method="post">
  <input type="hidden" name="Questions[57337]" val="" id="model-interested" />
  <input type="hidden" name="LassoUID" value="zFht#iXi[2" />
  <input type="hidden" name="ClientID" value="1591" />
  <input type="hidden" name="ProjectID" id="ProjectID" value="<?php echo $_projectID ?>" />
  <input type="hidden" name="SignupThankyouLink" value="<?php bloginfo('url') ?>/contact-us/thank-you?form=design&community=<?php echo $_comm ?>" />

  <div class="form-group">
    <div class="one-full">
      <label for="FirstName">First Name<span class="red">*</span></label>
      <input type="text" name="FirstName" class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <div class="one-full">
      <label for="LastName">Last Name<span class="red">*</span></label>
      <input type="text" name="LastName" class="form-control" />
    </div>
  </div>

  <div class="form-group">
    <div class="one-full">
      <label for="Emails[Primary]">Email Address<span class="red">*</span></label>
      <input type="email" name="Emails[Primary]" class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <div class="one-full">
      <label for="PostalCode">Zip Code</label>
      <input type="text" name="PostalCode" class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <div class="one-full">
      <label for="Phones[Home]">Phone Number</label>
      <input type="text" name="Phones[Home]" class="form-control" />
    </div>
  </div>


  <div class="form-group">
    <div class="one-full">
      <span class="req">*Required Fields</span>
    </div>
  </div>

  <div class="form-group button-group">
    <input type="submit" class="btn ltgreen-btn" value="Submit">
  </div>
</form>
