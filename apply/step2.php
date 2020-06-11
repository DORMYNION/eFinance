	<?php include('header.php'); ?>

	<div id="myinner">
		<div id="tracker">

				<div id="trackitemcont">
					<div id="trackitemtop">
						<div id="trackitemtopleft" style="border:0px;"></div>
						<div id="trackitemtopmiddle" class="whitetext"><a href="index.php"><i class="fas fa-dot-circle"></i></a></div>
						<div id="trackitemtopright" class="whiteborder"></div>
					</div><!--trackitemtop-->
					<div id="trackitembottom" class="whitetext">Verify Your BVN</div><!--trackitembottom-->
				</div><!--trackitemcont-->

				<div id="trackitemcont">
					<div id="trackitemtop">
						<div id="trackitemtopleft" class="whiteborder"></div>
						<div id="trackitemtopmiddle" class="whitetext"><a href="#"><i class="fas fa-dot-circle"></i></a></div>
						<div id="trackitemtopright"></div>
					</div><!--trackitemtop-->
					<div id="trackitembottom" class="whitetext">Personal Details</div><!--trackitembottom-->
				</div><!--trackitemcont-->

				<div id="trackitemcont">
					<div id="trackitemtop">
						<div id="trackitemtopleft"></div>
						<div id="trackitemtopmiddle"><a href="#"><i class="fas fa-dot-circle"></i></a></div>
						<div id="trackitemtopright"></div>
					</div><!--trackitemtop-->
					<div id="trackitembottom">Your Contacts</div><!--trackitembottom-->
				</div><!--trackitemcont-->

				<div id="trackitemcont">
					<div id="trackitemtop">
						<div id="trackitemtopleft"></div>
						<div id="trackitemtopmiddle"><a href="#"><i class="fas fa-dot-circle"></i></a></div>
						<div id="trackitemtopright"></div>
					</div><!--trackitemtop-->
					<div id="trackitembottom">Your Employment</div><!--trackitembottom-->
				</div><!--trackitemcont-->

				<div id="trackitemcont">
					<div id="trackitemtop">
						<div id="trackitemtopleft"></div>
						<div id="trackitemtopmiddle"><a href="#"><i class="fas fa-dot-circle"></i></a></div>
						<div id="trackitemtopright" style="border:0px;"></div>
					</div><!--trackitemtop-->
					<div id="trackitembottom">Your Loan</div><!--trackitembottom-->
				</div><!--trackitemcont-->

		</div><!--tracker-->


		<div id="subheading">
			<h1>Your Application</h1>
			<h2>Please take a few moments to crosscheck the information below</h2>
		</div>
		<div id="loanapplicationcont">
			<div id="formrow" style="padding-top:40px;">
				<label for="title" class="mylabelstyle">Title</label>
				<label for="title" class="mylabelstyle">First Name</label>
				<label for="title" class="mylabelstyle">Last Name</label>
			</div>
			<div id="formrow" style="padding-top:5px;">
				<select id="title" class="smallselect">
				  <option>Mr.</option>
				  <option>Mrs.</option>
				  <option>Madam</option>
					<option>Master</option>
				</select>
				<input id="" class="smallinputbox" placeholder="Enter your first name">
				<input id="" class="smallinputbox" placeholder="Enter your last name">
			</div><!--formrow-->
			<div id="formrow" style="padding-top:20px;">
				<label for="title" class="mylabelstyle">Gender</label>
				<label for="title" class="mylabelstyle">Date of Birth</label>
				<label for="title" class="mylabelstyle">Month of Birth</label>
			</div>
			<div id="formrow" style="padding-top:5px;">
				<select id="gender" class="smallselect">
				  <option>Male</option>
				  <option>Female</option>
				</select>
				<input id="" class="smallinputbox" placeholder="4">
				<input id="" class="smallinputbox" placeholder="October">
			</div><!--formrow-->
			<div id="formrow" style="padding-top:20px;">
				<label for="title" class="mylabelstyle">Year of Birth</label>
				<label for="title" class="mylabelstyle">Marital Status</label>
				<label for="title" class="mylabelstyle"></label>
			</div>
			<div id="formrow" style="padding-top:5px;">
				<input id="" class="smallinputbox" placeholder="1993">
				<select id="marital" class="smallselect">
					<option selected>Select marital status</option>
				  <option>Single</option>
				  <option>Married</option>
					<option>Seperated / Divorced</option>
					<option>Widowed</option>
				</select>
				<div class="smallemptybox"></div>
			</div><!--formrow-->

			<div id="continuecont" style="margin-top:60px;"><a href="step2.php"><div id="continuebutton">Continue</div></a></div>
		</div><!--loanapplicationcont-->



		</div><!--myinner-->
	<?php include('footer.php');?>
	</body>
</html>
