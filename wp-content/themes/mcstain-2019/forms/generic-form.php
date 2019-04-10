<?php
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
  }
?>


  <span class="req">*Required Fields</span>

  <input type="hidden" name="Questions[57337]" val="" id="model-interested" />
  <input type="hidden" name="LassoUID" value="zFht#iXi[2" />
  <input type="hidden" name="ClientID" value="1591" />
  <input type="hidden" name="ProjectID" value="<?php echo $_projectID ?>" />
  <input type="hidden" name="SignupThankyouLink" value="https://www.mcstain.com/contact-us/<?php echo $post->post_name ?>/thank-you<?php echo '?form='.$_form ?>" />

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
    <div class="one-half">
      <label for="Emails[Primary]">Email Address<span class="red">*</span></label>
      <input type="email" name="Emails[Primary]" class="form-control" />
    </div>
    <div class="one-half last">
      <label for="PostalCode">Zip Code</label>
      <input type="text" name="PostalCode" class="form-control" />
    </div>
  </div>

  <div class="form-group check-group">
    <div class="control control--checkbox">
      <p>I'm very interested. Please contact me as soon as possible.</p>
      <input type="checkbox" name="Questions[236735][]" value="57475" class="interest-check">
      <div class="control__indicator"></div>
    </div>
  </div>

  <div class="hidden-container">
    <div class="hidden-fields">
      <div class="form-group">
        <div class="one-half">
          <label for="pricerange">What is your price range?<span class="red">*</span></label>
          <select class="form-control" name="Questions[57478]">
            <option>Select Your Price Range</option>
            <option value="236750">$400 - $500k</option>
            <option value="236751">$500 - $600k</option>
            <option value="236752">$500 - $600k</option>
            <option value="236753">$700k+</option>
          </select>
        </div>
        <div class="one-half last">
          <label for="Questions[Timeline]">When are you looking to purchase<span class="red">*</span></label>
          <select class="form-control" name="Questions[Timeline]">
            <option>Select Your Purchase Timeline</option>
            <option value="236754">Less than 6 months</option>
            <option value="236755">6 months - 1 year</option>
            <option value="236756">1+ years</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="one-half">
          <label for="Phones[Home]">Phone Number<span class="red">*</span></label>
          <input type="text" name="Phones[Home]" class="form-control" />
        </div>
        <div class="one-half last">&nbsp;</div>
      </div>
    </div>
  </div>

  <div class="form-group button-group">
    <input type="submit" class="btn ltgreen-btn" value="Submit">
  </div>
