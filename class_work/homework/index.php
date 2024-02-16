
<!DOCTYPE html>
<html>
	<head>
		<title> Basic Contact Form </title>
		
		<!-- For Extraction of External CSS Files -->
			<link href = "assets/css/bootstrap.min.css" type = "text/css" rel = "stylesheet"/>
			<link href = "assets/css/style.css" type = "text/css" rel = "stylesheet"/>
	</head>
	<body>
		<form method="post" role="form" enctype="multipart/form-data">
			
			<table cellpadding="0px" cellspacing= "0px" border = "0" align ="center" width ="1000px">
				<tr>
					<td colspan="2">
						<h1 class="text-center">Contact Form With PHP</h1>
						<?php if(isset($errors) && !empty($errors)){?>
						<div class="alert alert-danger col-md-12">
						<?php echo implode("<br/>", $errors);?>
						</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="side-bar">&nbsp;</td>
					<td id="main">
						<table cellpadding="0px" cellspacing= "0px" border = "0" align ="center" width ="940px" >
							<tr>
								<td colspan="2" id="bg-red">&nbsp;</td>
							</tr>
							<tr>
								<td rowspan="2" id="content">
									<table cellpadding="0px" cellspacing= "0px" border = "0" align ="center" width ="340px" >
										<tr>
											<td colspan="2">&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" class="sec">
												<label>Field Label (?)</label><br/>
												<textarea rows="2" class="text1" name="fieldlabel"><?php echo(isset($_POST['fieldlabel']))?$_POST['fieldlabel']:'';?></textarea>
											</td>
										</tr>
										<tr>
											<td class="sec">
												<label>Field type (?)</label>
												<select name="fieldtype">
													<option value="0" <?php echo(isset($_POST['fieldtype']) && $_POST['fieldtype']==0)?'selected':' ';?>>--Select--</option>
													<option value="1" <?php echo(isset($_POST['fieldtype']) && $_POST['fieldtype']==1)?'selected':' ';?>>Date</option>
													<option value="2" <?php echo(isset($_POST['fieldtype']) && $_POST['fieldtype']==2)?'selected':' ';?>>First Name</option>
													<option value="3" <?php echo(isset($_POST['fieldtype']) && $_POST['fieldtype']==3)?'selected':' ';?>>Middle Name</option>
													<option value="4" <?php echo(isset($_POST['fieldtype']) && $_POST['fieldtype']==4)?'selected':' ';?>>Last Name</option>
													<option value="5" <?php echo(isset($_POST['fieldtype']) && $_POST['fieldtype']==5)?'selected':' ';?>>State or Province</option>
													<option value="6" <?php echo(isset($_POST['fieldtype']) && $_POST['fieldtype']==6)?'selected':' ';?>>Country</option>
												</select><br/>
											</td>
											<td class="sec">
												<label>Date Format (?)</label>
												<input type ="date" name="dateformat" value="<?php echo(isset($_POST['dateformat']))?$_POST['dateformat']:' ';?>"/>
											</td >
										</tr>
										<tr>
											<td colspan="2">
												<table cellpadding="0px" cellspacing= "15px" border = "0" align ="center" width ="320px">
													<tr>
														<td class="bgsec">
															<label>Options</label><br>
																<input type = "checkbox" name="option[]" value="Required(?)" <?php echo(isset($_POST['option'])) && in_array("Required(?)",$_POST['option'])?'checked':' ';?>/ > Required(?)<br/>
																<input type = "checkbox" name="option[]" value="No Duplicates (?)" <?php echo(isset($_POST['option'])) && in_array("No Duplicates (?)",$_POST['option'])?'checked':' ';?>/> No Duplicates (?)
														</td>
														<td class="bgsec">
															<label>Show Field to</label><br/>
																<input type = "radio" name ="field" value="Everyone(?)" <?php echo(isset($_POST['field']) && $_POST['field']=="Everyone(?)")?'checked':' ';?>/> Everyone(?)<br/>
																<input type = "radio" name ="field" value="Admin only (?)" <?php echo(isset($_POST['field']) && $_POST['field']=="Admin only (?)")?'checked':' ';?>/ > Admin Only (?)
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td colspan="2" class="sec">
												<label>Predefined Date (?)</label><br>
												<input type = "text" class="text2" name="predefineddate" value="<?php echo(isset($_POST['predefineddate']))?$_POST['predefineddate']:'';?>"/><br/><br/>
												<label>Instructions for User (?)</label><br/>
												<textarea rows="2" class="text2" name="instructionsforuser"><?php echo(isset($_POST['instructionsforuser']))?$_POST['instructionsforuser']:'';?></textarea><br/><br/>
												<label>Add CSS Layout Keywords (?)</label><br>
												<input type = "text"/class="text2" name="addcsslayoutkeywords" value="<?php echo(isset($_POST['addcsslayoutkeywords']))?$_POST['addcsslayoutkeywords']:'';?>"><br/><br/><br/>
											</td>
										</tr>
									</table>
								</td>
								<td id="section">
									<h2>Contact Form </h2>
										<p>Please provide your contact information if you wish to be kept informed about American Hands and/or Sally's other exhibits, presentations or workshops. Sally also welcomes your suggestions and comments, as well as invitations to exhibit or speak.</p><hr/>
									<table cellpadding="0px" cellspacing= "0px" border = "0" align ="left" width ="400px">
										<tr>
											<td id="date">
												<label> Date <span>*</span></label> <span class="text text-danger"> <?php echo(isset($errors['month']))?$errors['month']:'';?></span>
												<span class="text text-danger"> <?php echo(isset($errors['date']))?$errors['date']:'';?></span>
												<span class="text text-danger"> <?php echo(isset($errors['year']))?$errors['year']:'';?></span>
												<br/><input type ="text" size="1" maxlength="2" name="month" value="<?php echo(isset($_POST['month']))?$_POST['month']:'';?>"> / 
												<input type ="text" size="1" maxlength="2" name="date" value="<?php echo(isset($_POST['date']))?$_POST['date']:'';?>"> / 
												<input type ="text" size="2" maxlength="4" name="year" value="<?php echo(isset($_POST['year']))?$_POST['year']:'';?>"/>&nbsp;
												<img src = "assets/images/4.jpg" alt ="image" />
												<p><label id="mm">MM</label><label id="dd">DD</label><label id="yy">YYYY</label></p>
											</td>
										</tr>
										<tr>
											<td><br/>
												<label> First Name <span> * </span></label><span class="text text-danger"> <?php echo(isset($errors['fname']))?$errors['fname']:'';?></span><br/>
													<input type="text" name="fname" value="<?php echo(isset($_POST['fname']))?$_POST['fname']:'';?>"/><br/><br/>
												<label> Middle Name </label><span> * </span><span class="text text-danger"> <?php echo(isset($errors['mname']))?$errors['mname']:'';?></span> <br/>
													<input type="text" name="mname" value="<?php echo(isset($_POST['mname']))?$_POST['mname']:'';?>"/><br/><br/>
												<label> Last Name <span> * </span></label><span class="text text-danger"> <?php echo(isset($errors['lname']))?$errors['lname']:'';?></span><br/>
													<input type="text" name="lname" value="<?php echo(isset($_POST['lname']))?$_POST['lname']:'';?>"/><br/><br/>
												<label> Email <span> * </span></label><span class="text text-danger"> <?php echo(isset($errors['email']))?$errors['email']:'';?></span><br/>
													<input type="text" id="email" name="email" value="<?php echo(isset($_POST['email']))?$_POST['email']:'';?>"/><br/><br/>
												<label> City <span> * </span></label><span class="text text-danger"> <?php echo(isset($errors['city']))?$errors['city']:'';?></span><br/>
													<input type="text" name="city" value="<?php echo(isset($_POST['city']))?$_POST['city']:'';?>"/><br/><br/>
												<label> State or Province <span> * </span></label><span class="text text-danger"> <?php echo(isset($errors['stateorprovince']))?$errors['stateorprovince']:'';?></span><br/>
													<input type="text" name="stateorprovince" value="<?php echo(isset($_POST['stateorprovince']))?$_POST['stateorprovince']:'';?>"/><br/><br/>
												<label> Country <span>*</span></label><span class="text text-danger"> <?php echo(isset($errors['country']))?$errors['country']:'';?></span><br/>
													<input type="text" name="country" value="<?php echo(isset($_POST['country']))?$_POST['country']:'';?>"/><br/><br/>
												<h3>Please keep me informed about:</h3>
													<input type ="checkbox" name="pleasekeepmeinformedabout[]" value="Sally's Master Calasses, workshops & seminars on"<?php echo(isset($_POST['pleasekeepmeinformedabout'])) && in_array("Sally's Master Calasses, workshops & seminars on",$_POST['pleasekeepmeinformedabout'])?'checked':' ';?>><label>&nbsp;&nbsp;&nbsp;Sally's Master Calasses, workshops & seminars on 
													<br/>&nbsp;&nbsp;&nbsp;photography, lighting, image editing & fine art printing</label><br/>
													<input type ="checkbox"  name="pleasekeepmeinformedabout[]" value="American Hands exhibits & presentations" <?php echo(isset($_POST['pleasekeepmeinformedabout'])) && in_array("American Hands exhibits & presentations",$_POST['pleasekeepmeinformedabout'])?'checked':' ';?>><label>&nbsp;&nbsp; American Hands exhibits & presentations</label> <br/>
													<input type ="checkbox"  name="pleasekeepmeinformedabout[]" value="Sally's other exhibits & presentations"<?php echo(isset($_POST['pleasekeepmeinformedabout'])) && in_array("Sally's other exhibits & presentations",$_POST['pleasekeepmeinformedabout'])?'checked':' ';?>><label> &nbsp;&nbsp;Sally's other exhibits & presentations</label> <br/>
													<h3><small> I have the following suggestions for American Hands photo subject or venues for exhibits, lectures or workshops:</small></h3>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td id="bg-button">
									<button type="submit" name="save" id="bt1"><img src ="assets/images/7.jpg" alt= "duplicate" align="left"/><span class="left-mar">Save Form</span></button>
									<button type="reset" id="bt2">Clear Field</button>
								</td>
							</tr>
						</table>
					</td>
					<td class="side-bar">&nbsp;</td>
				</tr>

			</table>
		</form>
	</body>
</html>