<?php
  $_communities = array(
    '9882'  =>  'West Grange',
    '9883'  =>  'Lost Creek Farm',
    '10512' =>  'Painted Prarie',
    '10724' => 'Arras Park',
    //'10702'  =>  'Future Communities',
  );
?>

<form id="contact-form" name="contact-form" action="https://app.lassocrm.com/registrant_signup/" method="post">
  <input type="hidden" name="Questions[57337]" val="" id="model-interested" />
  <input type="hidden" name="LassoUID" value="zFht#iXi[2" />
  <input type="hidden" name="ClientID" value="1591" />
  <input type="hidden" name="ProjectID" id="ProjectID" value="10702" />
  <input type="hidden" name="SignupThankyouLink" value="<?php bloginfo('url') ?>/contact-us/thank-you?form=contact_us" />

  <div class="form-group">
    <div class="one-half">
      <label for="FirstName">First Name<span class="red">*</span></label>
      <input type="text" name="FirstName" class="form-control" />
    </div>
    <div class="one-half last">
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
    <div class="one-half">
      <label for="PostalCode">Zip Code</label>
      <input type="text" name="PostalCode" class="form-control" />
    </div>
    <div class="one-half last">
      <label for="Phones[Home]">Phone Number<span class="red">*</span></label>
      <input type="text" name="Phones[Home]" class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <div class="one-full">
      <label for="ProjectID">I am interested in a new home in:</label>
      <select name="project-select" class="project-select custom-select form-control">
        <option selected disabled></option>
      <?php foreach($_communities as $k=>$v): ?>
        <option value="<?php echo $k ?>"><?php echo $v ?></option>
      <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="one-full">
      <label for="Message">Message</label>
      <textarea name="Message" class="form-control"></textarea>

      <span class="req">*Required Fields</span>
    </div>
  </div>

  <div class="form-group button-group">
    <input type="submit" class="btn ltgreen-btn" value="Send Message">
  </div>
</form>
