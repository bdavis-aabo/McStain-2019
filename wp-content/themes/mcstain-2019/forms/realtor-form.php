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
      $_projectID = 'xxxx'; break;
  }
?>

<div class="email-form base-contactform">
  <h1 class="ltgreen-txt">Welcome to the McStain REALTOR&reg; Information Center</h1>

  <img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/leaf.png" />
  <p>We will do everything possible to make introducing your clients to McStain Neighborhoods a welcoming and gratifying experience.</p>
  <p class="normal-txt">We know you need timely information and support from us. That’s why we created the McStain REALTOR&reg; Information Center.</p>
  <p class="normal-txt">You will soon have privileged access to:</p>

  <ul class="form-list">
	<li><em>McStain REALTOR&reg; Information Center Hotline</em> – your direct contact for any questions you may have</li>
    <li><em>Community information</em> – site plans, phasing, coming amenities, etc.</li>
 	<li><em>Development/Building schedules</em></li>
 	<li><em>Quick Move-in Opportunities</em></li>
 	<li><em>Coming Promotions</em> – prior to public announcement</li>
 	<li><em>Calendar of coming events</em></li>
 </ul>
  <p>Yes, I am interested in having access to the McStain REALTOR&reg; Information Center.</p>


  <span class="req">*Required Fields</span>
  <form id="realtor-form" name="realtor-form" action="https://app.lassocrm.com/registrant_signup/" method="post">

    <input type="hidden" name="LassoUID" value="zFht#iXi[2" />
    <input type="hidden" name="ClientID" value="1591" />
    <input type="hidden" name="ProjectID" value="<?php echo $_projectID ?>" />
    <input type="hidden" name="SignupThankyouLink" value="https://www.mcstain.com/thank-you" />

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
        <label for="Questions[57482]">Broker Office Name<span class="red">*</span></label>
        <input type="text" name="Questions[57482]" class="form-control" />
      </div>
      <div class="one-half last">
        <label for="Address">Broker Office Address</label>
        <input type="text" name="Address" class="form-control" />
      </div>
    </div>

    <div class="form-group">
      <div class="one-half">
        <label for="City">City<span class="red">*</span></label>
        <input type="text" name="City" class="form-control" />
      </div>
      <div class="one-half last">
        <div class="one-qtr">
          <label for="Province">State<span class="red">*</span></label>
          <input type="text" name="Province" class="form-control" /><!-- possibly switch out with dropdown select -->
        </div>
        <div class="one-qtr last">
          <label for="PostalCode">Zip Code<span class="red">*</span></label>
          <input type="text" name="PostalCode" class="form-control" />
        </div>

      </div>
    </div>

    <div class="form-group">
      <div class="one-half">
        <label for="Emails[Primary]">Email Address<span class="red">*</span></label>
        <input type="email" name="Emails[Primary]" class="form-control" />
      </div>
      <div class="one-half last">
        <label for="Phones[Work]">Phone</label>
        <input type="text" name="Phones[Work]" class="form-control" />
      </div>
    </div>


    <div class="form-group button-group">
      <input type="submit" class="btn ltgreen-btn" value="Submit">
    </div>
  </form>
</div>
