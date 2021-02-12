<?php
	$_communities = array(
    	'9882'  =>  'West Grange - Longmont',
		'9883'  =>  'Lost Creek Farm - Erie',
		'10512' =>  'Painted Prairie - Aurora',
		'10724' => 'Arras Park - Thornton',
	);
	$_commSelect = $_GET['comm'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Lf2wb4UAAAAAB76Wxx4Fy0VYsaEmlCvr8we_1uD"></script>

<form action="test-submit.php" method="post" name="contact-form" id="contact-form">
	<input type="hidden" name="Questions[57337]" val="" id="model-interested" />
	<input type="hidden" name="ProjectID" id="ProjectID" value="10702" />
	<!-- don't forget thank you field -->
	
	<div class="form-group">
    <div class="one-half">
      <label for="FirstName">First Name<span class="red">*</span></label>
      <input type="text" name="FirstName" class="form-control fname" />
    </div>
    <div class="one-half last">
      <label for="LastName">Last Name<span class="red">*</span></label>
      <input type="text" name="LastName" class="form-control lname" />
    </div>
  </div>

  <div class="form-group">
    <div class="one-full">
      <label for="Emails[Primary]">Email Address<span class="red">*</span></label>
      <input type="email" name="Emails[Primary]" class="form-control email" />
    </div>
  </div>
  <div class="form-group">
    <div class="one-half">
      <label for="PostalCode">Zip Code</label>
      <input type="text" name="PostalCode" class="form-control zip" />
    </div>
    <div class="one-half last">
      <label for="Phones[Home]">Phone Number<span class="red">*</span></label>
      <input type="text" name="Phones[Home]" class="form-control phone" />
    </div>
  </div>
  <div class="form-group">
    <div class="one-full">
      <label for="ProjectID">I am interested in a new home in:</label>
      <select name="project-select" class="project-select custom-select form-control">
        <option <?php if($_commSelect == ''): echo 'selected'; endif; ?> disabled></option>
      <?php foreach($_communities as $k=>$v): ?>
        <option value="<?php echo $k ?>" <?php if($v == $_commSelect): echo 'selected'; endif; ?>><?php echo $v ?></option>
      <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="one-full">
      <label for="Message">Message</label>
      <textarea name="Message" class="form-control message"></textarea>

      <span class="req">*Required Fields</span>
    </div>
  </div>

  <div class="form-group button-group">
    <input type="submit" class="btn ltgreen-btn" value="Send Message">
  </div>
</form>

    
    
    
<script>
	$('.project-select').change(function(){
		var project = $(this).val();
		$('input#ProjectID').val(project);
	});
	
       // when form is submit
    $('#contact-form').submit(function() {
        event.preventDefault();
		var email 	= 	$('.email').val();
		var fname 	= 	$('.fname').val();
		var lname 	= 	$('.lname').val();
		var zip		=	$('.zip').val();
		var phone	=	$('.phone').val();
		var project	=	$('#ProjectID').val();
		var comment = 	$('.message').val();
		
		
        // needs for recaptacha ready
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lf2wb4UAAAAAB76Wxx4Fy0VYsaEmlCvr8we_1uD', {action: 'create_comment'}).then(function(token) {
                // add token to form
                $('#comment_form').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
				$.post("test-submit.php",{email: email, fname: fname, lname: lname, comment: comment, token: token}, function(result) {
					if(result.success) {
						$.post('lasso-submit.php',{
					    	email:		email,
					    	fname:		fname,
					    	lname:		lname,
					    	zip:		zip,
					    	phone:		phone,
					    	project:	project,
					    	comment:	comment
				    	});
						alert('great success');
			    	} else {
				    	alert('You are spammer ! Get the @$%K out.')
			    	}
		    	});
            });;
        });
  });
  </script>