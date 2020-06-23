    <?php include('header.php'); ?>
    <div id="myinner">
        <div id="tracker">
            <div id="trackitemcont">
                <div id="trackitemtop">
                    <div id="trackitemtopleft" style="border:0px;"></div>
                    <div id="trackitemtopmiddle">
                        <a><i id="icon1" class="fas fa-dot-circle whitetext" @click="moveNext('step2', 'icon1')"></i></a>
                    </div>
                    <div id="trackitemtopright"></div>
                </div><!--trackitemtop-->
                <div id="text1" class="trackitembottom whitetext">Verify Your BVN</div><!--trackitembottom-->
            </div><!--trackitemcont-->

            <div id="trackitemcont">
                <div id="trackitemtop">
                    <div id="trackitemtopleft"></div>
                    <div id="trackitemtopmiddle"><a href="#"><i id="icon2" class="fas fa-dot-circle"></i></a></div>
                    <div id="trackitemtopright"></div>
                </div><!--trackitemtop-->
                <div id="text2" class="trackitembottom">Personal Details</div><!--trackitembottom-->
            </div><!--trackitemcont-->

            <div id="trackitemcont">
                <div id="trackitemtop">
                    <div id="trackitemtopleft"></div>
                    <div id="trackitemtopmiddle"><a href="#"><i id="icon3" class="fas fa-dot-circle"></i></a></div>
                    <div id="trackitemtopright"></div>
                </div><!--trackitemtop-->
                <div id="text3" class="trackitembottom">Your Contacts</div><!--trackitembottom-->
            </div><!--trackitemcont-->

            <div id="trackitemcont">
                <div id="trackitemtop">
                    <div id="trackitemtopleft"></div>
                    <div id="trackitemtopmiddle"><a href="#"><i id="icon4" class="fas fa-dot-circle"></i></a></div>
                    <div id="trackitemtopright"></div>
                </div><!--trackitemtop-->
                <div id="text4" class="trackitembottom">Your Employment</div><!--trackitembottom-->
            </div><!--trackitemcont-->

            <div id="trackitemcont">
                <div id="trackitemtop">
                    <div id="trackitemtopleft"></div>
                    <div id="trackitemtopmiddle"><a href="#"><i id="icon5" class="fas fa-dot-circle"></i></a></div>
                    <div id="trackitemtopright" style="border:0px;"></div>
                </div><!--trackitemtop-->
                <div id="text5" class="trackitembottom">Your Loan</div><!--trackitembottom-->
            </div><!--trackitemcont-->
		</div><!--tracker-->
        
		

		<div id="subheading" v-html="cont">
			
        </div>
        
		<div id="loanapplicationcont">
            <form action="" role="form" method="post">
                <!-- BVN Section-->
                <div id="step1" class="isVisible">
                    <div class="formrow"  style="margin-top:30px;">
                        <input 
                            type="text" 
                            class="biginputbox" 
                            id="bvn" 
                            v-model="bvn" 
                            required length="10" 
                            placeholder="Bank Verification Number (BVN)" 
                            @keypress="isNumberKey($event)" required
                        >
                    </div>
                        <div v-if="msgError.bvn" class="invalid-feedback">
                            {{ msgError.bvn }}
                        </div>

                    <div class="continuecont" style="margin-top:30px;">
                        <button 
                            id="next" 
                            class="continuebutton next notVisible"
                            :disabled="isDisableBvn"
                            @click="showNext('step1', 'step2', 'icon1', 'icon2', 'text1')"
                            @click="getBvnDetail(bvn, 'step1', 'step2', 'icon1', 'icon2', 'text1')"
                        >Continue</button>
                        <button 
                            id="check" 
                            class="continuebutton next"
                            @click="getBvnDetail(bvn)"
                        >check</button>
                    </div>
                </div>
                <!-- BVN Section-->

                <!-- Personal Section-->
                <div id="step2" class="step notVisible">
                    <div class="formrow"  style="padding-top:40px;">
                        <label class="mylabelstyle" for="title">Title</label>
                        <label class="mylabelstyle" for="fname">First name</label>
                        <label class="mylabelstyle" for="lname">Last name</label>
                    </div>

                    <div class="formrow"  style="padding-top:5px;">
                        <select class="smallselect"  id="title" v-model="title" required>
                            <option selected disabled value="">Select Title...</option>
                            <option v-for="title in titles" :value="title">{{ title }}</option>
                        </select>
                        <input type="text" class="smallinputbox" id="fname" v-model="fname" required="required" placeholder="Enter First Name" readonly>
                        <input type="text" class="smallinputbox" id="lname" v-model="lname" required="required" placeholder="Enter Last Name" readonly>
                    </div>

                    <div class="formrow" style="padding-top:20px;">
                        <label class="mylabelstyle" for="gender">Gender</label>
                        <label class="mylabelstyle" for="dob">Date of Birth</label>
                        <label class="mylabelstyle" for="mstatus">Marital Status</label>
                    </div>

                    <div class="formrow"  style="padding-top:5px;">
                        <select class="smallselect"  id="gender" v-model="gender" required>
                            <option selected disabled value="">Select Gender...</option>
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <input type="text" class="smallinputbox" id="dob" v-model="dob" required="required" placeholder="Enter Date of Birth" readonly>
                        <select class="smallselect"  id="mstatus" v-model="mstatus" required>
                            <option selected disabled value="">Select Marital Status...</option>
                            <option selected value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Seperated/Divorced">Seperated/Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>

                    <div class="continuecont" style="margin-top:60px;">
                        <button 
                            id="prev0" 
                            class="backbutton prev"
                            @click="showPrev('step1', 'step2', 'icon1', 'icon2', 'text1')"
                        >Back</button>
                        <button 
                            id="next0" 
                            class="continuebutton next tooltip"
                            :disabled="isDisablePersonal"
                            @click="showNext('step2', 'step3', 'icon2', 'icon3', 'text2')"
                        ><span class="tooltiptext">Continue<span></button>
                    </div>
                </div>
                <!-- Personal Section-->

                <!-- Contact Section-->
                <div id="step3" class="step notVisible" >
                    <div class="formrow" style="padding-top:40px;">
                        <label class="mylabelstyle" for="mobile">Mobile Number</label>
                        <label class="mylabelstyle" for="office">Office Number</label>
                        <label class="mylabelstyle" for="email">Email Address</label>
                    </div>

                    <div class="formrow" style="padding-top:5px;">
                        <input type="tel" class="smallinputbox" id="mobile" v-model="mobile" required="required" placeholder="Enter Mobile Number" readonly="">
                        <input type="tel" class="smallinputbox" id="office" v-model="office" required="required" placeholder="Enter Office Number" >
                        <input type="email" class="smallinputbox" id="email" v-model="email" required="required" placeholder="Enter Email Address" >
                    </div>

                    <div class="formrow" style="padding-top:20px;">
                        <label class="mylabelstyle" for="address">Home Address</label>
                        <label class="mylabelstyle" for="lmark">Land Mark/(Nearest Bus-stop)</label>
                    </div>

                    <div class="formrow" style="padding-top:5px;">
                        <input type="text" class="largeinputbox" id="address" v-model="address" required="required" placeholder="Enter Home Address">
                        <input type="text" class="smallinputbox" id="lmark" v-model="lmark" required="required" placeholder="Land Mark/(Nearest Bus-stop)">
                    </div>

                    <div class="formrow" style="padding-top:20px;">
                        <label class="mylabelstyle" for="rstate">State of Residence</label>
                        <label class="mylabelstyle" for="rlga">Local Government of Residence</label>
                        <label class="mylabelstyle" for="rstatus">Residential Status</label>
                    </div>

                    <div class="formrow" style="padding-top:5px;">
                        <select class="smallselect" id="rstate" v-model="rstate" required>
                            <option selected value="Lagos">Lagos</option>
                        </select>
                        <select class="smallselect" id="rlga" v-model="rlga" required>
                            <option selected disabled value="">Choose...</option>
                            <option v-for="result in results" :value="result">{{ result }}</option>
                        </select>
                        <select class="smallselect" id="rstatus" v-model="rstatus" required>
                            <option selected disabled value="">Select Residential Status...</option>
                            <option value="SOCIAL_RENTING">Social Renting</option>
                            <option value="COMMERCIAL_RENTING">Commercial Renting</option>
                            <option value="WITH_RELATIVES">With Relatives</option>
                            <option value="OWNER">Owner</option>
                            <option value="TENANT">Tenant</option>
                            <option value="WITH_PARENTS">With Parents</option>
                            <option value="OTHER">Other</option>
                        </select>
                    </div>

                    <div class="continuecont" style="margin-top:60px;">
                        <button 
                            id="prev1" 
                            class="backbutton prev"
                            @click="showPrev('step2', 'step3', 'icon2', 'icon3', 'text2')"
                        >Back</button>
                        <button 
                            id="next1" 
                            class="continuebutton next"
                            :disabled="isDisableContact"
                            @click="showNext('step3', 'step4', 'icon3', 'icon4', 'text3')"
                        >Continue</button>
                    </div>
                </div>
                <!-- Contact Section-->

                <!-- Employment Section-->
                <div id="step4" class="step notVisible">
                    <div class="formrow" style="padding-top:40px">
                        <label class="mylabelstyle" for="payday">Pay Date(DD)</label>
                        <label class="mylabelstyle" for="mincome">Net Monthly Income</label>
                        <label class="mylabelstyle" for="esector">Employment Sector</label>
                    </div>

                    <div class="formrow" style="padding-top:5px">
                        <select class="smallselect" id="payday" v-model="payday" required>
                            <option selected disabled value="">Select Payday...</option>
                            <option v-for="n in 31" :value="n">{{ n }}</option>
                        </select>
                        <select class="smallselect" id="mincome" v-model="mincome" required>
                            <option selected disabled value="">Select Monthly Income...</option>
                            <option value="N101,000.00-N300,000.00">N101,000.00 -N300,000.00</option>
                            <option value="N301,000.00–N500,000.00">N301,000.00 – N500,000.00</option>
                            <option value="N501,000.00–N700,000.00">N501,000.00 – N700,000.00</option>
                            <option value="N701,000.00–N1,000,000.00">N701,000.00 – N1,000,000.00</option>
                            <option value="Above N1,000,000.00">Above N1,000,000.00 </option>
                        </select>
                        <select class="smallselect" id="esector" v-model="esector" required>
                            <option selected disabled value="">Select Employment Sector...</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Retail/Sales">Retail/Sales</option>
                            <option value="Construction">Construction</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Telecoms">Telecoms</option>
                            <option value="Oil &amp; Gas">Oil &amp; Gas</option>
                            <option value="Power">Power</option>
                            <option value="Banking">Banking</option>
                            <option value="Other Financial Services">Other Financial Services</option>
                            <option value="Others">Others</option>
                            <option value="Health">Health</option>
                            <option value="Government">Government</option>
                        </select>
                    </div>

                    <div class="formrow" style="padding-top:20px">
                        <label class="mylabelstyle" for="empname">Employer's Name</label>
                        <label class="mylabelstyle" for="empaddress">Employment Address</label>
                        <label class="mylabelstyle" for="emplmark">Land Mark/(Nearest Bus-stop)</label>
                    </div>

                    <div class="formrow" style="padding-top:5px">
                        <input type="text" class="smallinputbox" id="empname" v-model="empname" required="required" placeholder="Enter Employer's Name">
                        <input type="text" class="smallinputbox" id="empaddress" v-model="empaddress" required="required" placeholder="Enter Employment Address">
                        <input type="text" class="smallinputbox" id="emplmark" v-model="emplmark" required="required" placeholder="Enter Land Mark/(Nearest Bus-stop)">
                    </div>

                    <div class="formrow" style="padding-top:20px">
                        <label class="mylabelstyle" for="empstate">State of Employment</label>
                        <label class="mylabelstyle" for="empaddress">Local Government</label>
                        <label for="title" class="mylabelstyle"></label>
                    </div>

                    <div class="formrow" style="padding-top:5px">
                        <select class="smallselect" id="empstate" v-model="empstate" required>
                            <option selected value="Lagos">Lagos</option>
                        </select>
                        <select class="smallselect" id="emplga" v-model="emplga" required>
                            <option selected disabled value="">Choose...</option>
                            <option v-for="result in results" :value="result">{{ result }}</option>
                        </select>
                        <div class="smallemptybox"></div>
                    </div>

                    <div class="continuecont" style="margin-top:60px;">
                        <button 
                            id="prev2" 
                            class="backbutton prev"
                            @click="showPrev('step3', 'step4', 'icon3', 'icon4', 'text3')">
                            Back
                        </button>
                        <button 
                            id="next2" 
                            class="continuebutton next"
                            :disabled="isDisableEmployment"
                            @click="showNext('step4', 'step5', 'icon4', 'icon5', 'text4')">
                            Continue
                        </button>
                    </div>
                </div>
                <!-- Employment Section-->

                <!-- Loan Section-->
                <div id="step5" class="step notVisible">
                    <div class="formrow" style="padding-top:40px">
                        <label class="mylabelstyle" for="bname">Bank Name</label>
                        <label class="mylabelstyle" for="accnumber">Account Number</label>
                        <label class="mylabelstyle" for="accname">Account Name</label>
                    </div>

                    <div class="formrow" style="padding-top:5px">
                        <select class="smallselect" id="bname" v-model="bname" required>
                            <option selected disabled value="">Select Purpose of Loan</option>
                            <option v-for="bankName in bankNames" :value="bankName.name">{{ bankName.name }}</option>
                        </select>
                        <!-- <input type="text" class="smallinputbox" id="bname" v-model="bname" required="required" placeholder="Enter Bank Name"> -->
                        <input type="number" class="smallinputbox" id="accnumber" v-model="accnumber" required="required" placeholder="Enter Account Number">
                        <input type="text" class="smallinputbox" id="accname" v-model="accname" required="required" placeholder="Enter Account Name">
                    </div>

                    <div class="formrow" style="padding-top:20px">
                        <label class="mylabelstyle" for="bvn">Bank Verification Number (BVN)</label>
                        <label class="mylabelstyle" for="ploan">Purpose of Loan</label>
                        <label class="mylabelstyle" for="roption">Repayment Option</label>
                    </div>

                    <div class="formrow" style="padding-top:5px">
                        <input type="number" class="smallinputbox" id="bvn" v-model="bvn" required="required" placeholder="Enter Bank Verification Number (BVN)" readonly>
                        <select class="smallselect" id="ploan" v-model="ploan" required>
                            <option selected disabled value="">Select Purpose of Loan</option>
                            <option value="Portable Goods">Portable Goods</option>
                            <option value="Travel/Holiday">Travel/Holiday</option>
                            <option value="School Fees">School Fees</option>
                            <option value="Rent">Rent</option>
                            <option value="Household Maintenance">Household Maintenance</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Medical">Medical</option>
                            <option value="Wedding/Events">Wedding/Events</option>
                            <option value="Other Expenses">Other Expenses</option>
                        </select>
                        <select class="smallselect" id="roption" v-model="roption" required>
                            <option selected disabled value="">Select Repayment Option</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Bullet">Bullet</option>
                        </select>
                    </div>

                    <div class="formrow" style="padding-top:20px">
                        <label class="mylabelstyle" for="lexist">Any Existing Loans</label>
                        <label class="mylabelstyle" for="lexist">If YES Please Specify:</label>
                        <label class="mylabelstyle" for="eamount">If YES State Rapayt. Amount:</label>
                    </div>

                    <div class="formrow" style="padding-top:5px">
                        <select class="smallselect" id="lexist" v-model="lexist" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                        <select class="smallselect" id="lexisttype" v-model="lexisttype" required>
                            <option selected disabled value="">Select Existing Loan Type...</option>
                            <option value="Mortgage">Mortgage</option>
                            <option value="Overdraft">Overdraft</option>
                            <option value="Business">Business</option>
                            <option value="Car Loan">Car Loan</option>
                            <option value="Personal Loan">Personal Loan</option>
                            <option value="Credit Card">Credit Card</option>
                        </select>
                        <input type="money" class="smallinputbox" id="eamount" v-model="eamount" required="required" placeholder="Enter If YES State Rapayt. Amount:">
                    </div>

                    <div class="formrow" style="padding-top:20px">
                        <label class="mylabelstyle">Loan Amount</label>
                    </div>
                    <div class="formrow" style="padding-top:5px">
                        <input class="slider" type="range" name="amount" value="100000" id="amount" min="100000" max="2000000" step="10000">
                    </div>
                    <div class="formrow">
                        <p>Vaule: <span id="vamount"></span></p>
                    </div>

                    <div class="formrow" style="padding-top:20px">
                        <label class="mylabelstyle">Loan Duration (month(s))</label>
                    </div>
                    <div class="formrow" style="padding:5px">
                        <input class="slider" type="range" name="days" value="3" id="days" min="1" max="9" step="1">
                    </div>
                    <div class="formrow">
                        <p>Vaule: <span id="vdays"></span></p>
                    </div>
                    <div class="formrow">
                        <h4 style="color:#006400;">Loan <span id="disp-Loan"></span> Charges <span id="disp-Charges"></span> Total <span id="disp-Total"></span></h4>
                    </div>

                    <div class="continuecont" style="margin-top:60px;">
                        <button
                            id="prev3" 
                            class="backbutton prev"
                            @click="showPrev('step4', 'step5', 'icon4', 'icon5', 'text3')"
                        >Back</button>
                        <button
                            id="next3" 
                            class="continuebutton next"
                            :disabled="isDisableLoan"
                            @click="alert()"
                        >Apply</button>
                    </div>
                </div>
                <!-- Loan Section-->
                
            </form>

        </div><!--loanapplicationcont-->
        

	</div><!--myinner-->

    <?php include('footer.php');?>

    <style scoped>
        .isVisible {
        display:block;
        }
        .notVisible {
        display:none;
        }
    </style>
	</body>
</html>
