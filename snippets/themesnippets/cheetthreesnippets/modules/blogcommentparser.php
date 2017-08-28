<?php 
	// blogcommentparser.php
	// this file is responsible for parsing blog post comments output
	// based on normal i.e system defined post or utilised a predefined set of supported
	// plugins
	// the variable $curblogdata is expected to be available
	if(isset($curblogdata)&&$curblogdata['commenttype']=="normal"){
		// first we check for the type of comment being used
		// current comment types include normal and disqus though disqus is still
		// being integrated
?>
							
		<div class="row">
			<div class="col-md-12">
				<h4 class="underlined">Comments <?php echo $blog_comment_count?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ol class="comments">
<?php
		if($blog_comment_count>0){
			for($bi=0;$bi<$blog_comment_count;$bi++){
				$ti=$bi+1;
				$eodd=$ti%2==0?"even":"odd";
				
				$curcomment=$blog_comment_data[$bi];
				// comments only go down 3 levels maximum
				// the indexes available here are
				// type(comment/reply),fullname,website,email,pid(posterid),
				// cid(commentid refers to the parent comment for the reply.),
				// Note, Proper parsing of replies have already been done so all you 
				// have to do is focus on looping through the replies per level
				// i.e loop lvl 1 ('curcomment['reply']['depth'][0-n]') gets replies for 
				// current reply loop
				//  then loop lvl 2 (curcomment['reply']['depth'][0-n]['depth'])
				// store the class that differntiates the author/admin response
				// from normal posts by checking the pid index, which is only greater
				//  than zero when an administrator makes a comment
				$authorclass=$curcomment['pid']>0?"bypostauthor":"";
				$authormarkup=$curcomment['pid']>0?'<small>(Post Author)</small>':"";
?>
					<li class="comment <?php echo $eodd;?> depth-1 
						<?php echo $authorclass;?>">
						<div class="comment-box">
							<img alt="" src="<?php echo $curcomment['avatar'];?>" width="70" height="70">
							<div class="comment-content">
								<h4><strong><?php echo $curcomment['fullname']?></strong> 
								<?php echo $authormarkup;?> Says:</h4>
								<span class="comment-date"><?php echo $curcomment['comment_datetwo'];?></span>
								<div class="hold">
									<?php echo $curcomment['comment'];?>
								</div>
							</div>
							
						</div>
						<?php
							// loop through the replies if any
						?>
						<?php
						?>
					</li>									
<?php
			}
?>
<?php
		}else{
?>
			<li class="comment odd depth-1">
				<div class="comment-box">
					<div class="comment-content">
						No comments yet, be the first to make one 
					</div>

				</div>

			</li>
<?php
		}
?>
				</ol>							
			</div>
		</div>

<?php
			// this section is for making comments, the form should submit to the 
			// basicsignup.php file located in $host/snippets/basicsignup.php
			// the following form fields must be made available before submission
			// is done
			// 
			// the default comments module also provides you with the following
			// variables  to be used optionally/ compulsorily in the form
			/*
				$c_form_url (compulsory)
				$c_formname(compulsory) - the nameattribute value to be used for the 
				comment form i.e <form name="$c_formname">
				
				$c_form_validate_number(compulsory, if you use security_field) -  
				this number is used to verify if
				the person posting is human, it must be shown within the form the 
				the comment is being made in

				$c_form_fields(compulsory) - this fields carry necessary information
				that allows the comment form to be processed by the handler file
				
				use either the captcha or the security field 
				
				$c_form_security_captcha(optional)
				
				$c_form_security_field(optional)
				
				$c_form_validate_fieldname(compulsory, if using security_field)
				
				$c_form_validate_fieldattr(compulsory, if using security_field)
				
				$c_form_script(compulsory, if you want to use tinyMCE rich comment field)
				the comment field must have an id of "comment" for this function to 
				truly work. As with any script, this must be echoed out after the 
				form.

				$c_form_email_attr(compulsory, if using extra_data and you want proper
				email verification) - carries attributes for the email field that allows
				automatic regex verification of the email
				
				$c_form_extra_data - carries the error map field for the comment form
				
				$c_form_submit_attr(compulsory if using extra_data) this attributes
				can be included with the submit button.
			*/
				
?>

			<div id="respond" class="comment-respond">
				<form action="<?php echo $c_form_url;?>" method="post" 
				 name="<?php echo $c_form_name;?>" 
				<?php echo $c_form_attr;?> class="comment-form">
				<?php echo $c_form_fields;?>
				 <?php echo $c_form_security_field?>
					<div class="row">
						<div class="col-md-12">
							<h4 class="underlined">Leave a <strong>Comment</strong>
							</h4>
							<p>
								<i>Entry code :
									<?php echo $c_form_validate_number;?></i>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<input type="text" id="security"
							 name="<?php echo $c_form_validate_fieldname;?>"
							 <?php echo $c_form_validate_fieldattr;?> 
							 placeholder="Security Code"/>

							<input type="text" id="author"
							 name="fullname" placeholder="Fullname"/>
							<input type="email" id="email" 
							<?php echo $c_form_email_attr;?> 
							name="email" 
							placeholder="Email Address"/>	
							<input type="text" id="url" name="website" 
							placeholder="website"/>
		
						</div>
						<div class="col-sm-8">
							<textarea id="comment" name="comment" 
							<?php echo $c_form_comment_attr;?>
							placeholder="message"></textarea>
							<?php echo $c_form_extra_data;?>
							<input type="button" 
							class="pull-right btn btn-primary tmq-btn" 
							name="comment" <?php echo $c_form_submit_attr;?>
							value="comment">
						</div>
					</div>
				</form>
			</div>
			<?php echo $c_form_script;?>
<?php

?>

<?php
		
	}else{
		// this section means the blog comment type in use is not normal and coding
		// here simply refers to using one variable $blog_comment_data_output
		//  we check on its availability and we echo it here
		$blog_comment_data_output=isset($blog_comment_data_output)?
		$blog_comment_data_output:"";
		echo $blog_comment_data_output;
?>

<?php
	}

?>
