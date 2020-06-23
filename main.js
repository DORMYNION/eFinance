const routes = [
   
];

const router = new VueRouter({
    mode: 'history', // https://router.vuejs.org/api/#mode
    linkActiveClass: 'active',
    scrollBehavior: () => ({ y: 0 }),
    routes: routes
});

  
Vue.use(VueRouter);

new Vue({
    el: '#myinner',
    data: {
        terms: false,
        titles: ['Mr', 'Mrs', 'Miss'],
        bankNames: [{"id":"1","name":"Access Bank","code":"044"},{"id":"2","name":"Citibank","code":"023"},{"id":"3","name":"Diamond Bank","code":"063"},{"id":"4","name":"Dynamic Standard Bank","code":""},{"id":"5","name":"Ecobank Nigeria","code":"050"},{"id":"6","name":"Fidelity Bank Nigeria","code":"070"},{"id":"7","name":"First Bank of Nigeria","code":"011"},{"id":"8","name":"First City Monument Bank","code":"214"},{"id":"9","name":"Guaranty Trust Bank","code":"058"},{"id":"10","name":"Heritage Bank Plc","code":"030"},{"id":"11","name":"Jaiz Bank","code":"301"},{"id":"12","name":"Keystone Bank Limited","code":"082"},{"id":"13","name":"Providus Bank Plc","code":"101"},{"id":"14","name":"Polaris Bank","code":"076"},{"id":"15","name":"Stanbic IBTC Bank Nigeria Limited","code":"221"},{"id":"16","name":"Standard Chartered Bank","code":"068"},{"id":"17","name":"Sterling Bank","code":"232"},{"id":"18","name":"Suntrust Bank Nigeria Limited","code":"100"},{"id":"19","name":"Union Bank of Nigeria","code":"032"},{"id":"20","name":"United Bank for Africa","code":"033"},{"id":"21","name":"Unity Bank Plc","code":"215"},{"id":"22","name":"Wema Bank","code":"035"},{"id":"23","name":"Zenith Bank","code":"057"}],
        results: ["Agege","Ajeromi-Ifelodun","Alimosho","Amuwo-Odofin","Badagry","Apapa","Epe","Eti Osa","Ibeju-Lekki","Ifako-Ijaiye","Ikeja","Ikorodu","Kosofe","Lagos Island","Mushin","Lagos Mainland","Ojo","Oshodi-Isolo","Shomolu","Surulere Lagos State"],
        hasError: false, 
        msgError: {'bvn': ''},
        bvn: '',
        title: '',
        fname: 'Dominion',
        lname: 'Olorunfemi',
        dob: '04/21/2020',
        gender: '',
        mstatus: '',
        mobile: '09091652799',
        office: '',
        email: '',
        address: '',
        lmark: '',
        rstate: '',
        rlga: '',
        rstatus: '',
        result: '',
        payday: '',
        mincome: '',
        esector: '',
        empname: '',
        empaddress: '',
        emplmark: '',
        empstate: '',
        emplga: '',
        bname: '',
        accnumber: '',
        accname: '',
        ploan: '',
        roption: '',
        lexist: '',
        lexisttype: '',
        eamount: '',
        cont: '<h1>Glad to meet you</h1><h2>Please enter your BVN to start your loan application</h2>',
        reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
        next: ''
    },
    watch: {
        msgError: function(value) {
            console.log(value)
            this.msgError['bvn'] = value.bvn
            console.log('dskdjsk')
        }
    },
    
    methods: {   
        gotoApply() {
            location.href='apply.php'
        },     
        checkHeaderText(step) {
            getId = document.getElementById(step)
            if(getId.id === 'step2') {
                if(getId.classList.contains('isVisible')) {
                    this.cont = '<h1>Your Application</h1><h2>Please take a few moments to cross check the information below</h2>'
                } 
            } else if(getId.id === 'step3' || getId.id === 'step4'  || getId.id === 'step5') {
                if(getId.classList.contains('isVisible')) {
                    this.cont = '<h1>Your Application</h1><h2>Please take a few moments to fill the form</h2>'
                } 
            }  else {
                this.cont = '<h1>Glad to meet you</h1><h2>Please enter your BVN to start your loan application</h2>'
            }            
        },
        
        validateEmail(value){
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
                this.msgError['email'] = 'Looks Good';
            } else{
                this.msgError['email'] = 'Invalid Email Address';
            } 
        },
        moveNext () {
            const getStep = document.getElementById(step);
            const getIcon = document.getElementById(icon);
            getIcon.classList.add("fa-dot-circle");
            getIcon.classList.remove("fa-check-circle");  
        },
        showNext: function(prev, next, icon1, icon2, text) {
            const getNext = document.getElementById(next);
            const getPrev = document.getElementById(prev);
            const getIcon1 = document.getElementById(icon1);
            const getIcon2 = document.getElementById(icon2);
            const getText = document.getElementById(text);
            getNext.classList.remove("notVisible");
            getNext.classList.add("isVisible");
            getPrev.classList.remove("isVisible");
            getPrev.classList.add("notVisible");
            getIcon1.classList.remove("fa-dot-circle");
            getIcon1.classList.add("fa-check-circle");  
            getIcon2.classList.add("whitetext");  
            getText.classList.add("whitetext");  
            this.checkHeaderText(next);
        },
        showPrev: function(prev, next, icon1, icon2, text) {
            const prevStep = document.getElementById(prev);
            const nextStep = document.getElementById(next);
            const getIcon1 = document.getElementById(icon1);
            const getIcon2 = document.getElementById(icon2);
            const getText = document.getElementById(text);
            prevStep.classList.add("isVisible");
            prevStep.classList.remove("notVisible");
            nextStep.classList.add("notVisible");
            nextStep.classList.remove("isVisible");
            getIcon1.classList.add("fa-dot-circle");
            getIcon1.classList.remove("fa-check-circle");  
            getIcon2.classList.remove("whitetext");  
            getText.classList.remove("whitetext");  
            this.checkHeaderText(prev);
        },
        submitBtn () {
            console.log('ieeehhh');
            setTimeout(function() {
                alert("You're successfully signed up");
                this.$router.push('home');
            }, 800)
        },
        isNumberKey: function(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                console.log(charCode)
                evt.preventDefault();
            // } else if ((charCode == 13)) { 
            //     this.msgError.bvn = 'Use the Continue Button'
            //     return false; 
            } else {
              return true;
            }
            
        },
        getBvnDetail(bvn) {
            console.log(bvn)
            axios({
                method: 'get',
                url: "https://api.paystack.co/bank/resolve_bvn/" + bvn,
                headers: {"Authorization": "Bearer sk_live_fa1028b0ee408bf8bc271cf9c318abec1bf62918"}
            })
            .then(res => {
                if(res.status === 200 || res.status === 201) {
                    this.fname = res.data.data.first_name
                    this.lname = res.data.data.last_name
                    this.dob = res.data.data.formatted_dob
                    this.mobile = res.data.data.mobile
                    if(this.fname!==''&&this.lname!==''&&this.dob!==''&&this.mobile!=='') {
                        this.showNext('step1', 'step2', 'icon1', 'icon2', 'text1')
                    } else {
                        this.msgError.bvn = "Something wrong with your BVN!"
                    }
                } 
            })
            .catch(
                // function (error) {
                // if (error.response.status === 404) {
                //     this.msgError['bvn'] = "Something went wrong, Kindly report to the webmaster!"
                //     console.log(this.msgError)
                //     console.log('404')
                //     console.log(error.response.status);
                // } else if (error.response.status === 400) {
                //     this.msgError.bvn = "Invalid BVN!"
                //     console.log(this.msgError.bvn)
                //     console.log('400')
                //     console.log(error.response.status);
                // } else if (error.response.status === 401) {
                //     this.msgError.bvn = "Invalid Access, Stop and report to the webmaster!"
                //     console.log(this.msgError.bvn)
                //     console.log('401')
                //     console.log(error.response.status);
                // } else {
                //     this.msgError.bvn = "I dont know what wrong, Please report to the webmaster!"
                //     console.log(this.msgError.bvn)
                //     console.log('dumon')
                //     console.log(error.response.status);
                // }
                error => {
                console.log(error)
                this.msgError.bvn = "Something's not right!"
                console.log('It')
                console.log(this.msgError.bvn)
                console.log(this.msgError)
                console.log(error.status)
            });
        },
    },
    computed: {
        isEmailValid: function() {
            return (this.email == "")? "" : (this.reg.test(this.email)) ? true : false;
        },
        isDisabled: function(){
            return !this.terms;
        },
        isDisableBvn: function() {
            if(this.bvn.length === 11 ) {
                return false
            }
            return true
        },
        isDisablePersonal: function() {
            if(this.title !== '' && this.fname !== '' && this.lname !== '' &&
                this.gender !== '' && this.dob !== '' && this.mstatus !== '' 
            ) {
                return false
            }
            return true
        },
        isDisableContact: function() {
            if(this.mobile !== '' && this.office !== '' && this.email !== '' &&
                this.address !== '' && this.lmark !== '' && this.rstate !== '' &&
                this.rlga !== '' && this.rstatus !== '' && this.isEmailValid
            ) {
                return false
            }
            return true
        },
        isDisableEmployment: function() {
            if(this.payday !== '' && this.mincome !== '' && this.esector !== '' &&
                this.empname !== '' && this.emplmark !== '' && this.empaddress !== '' &&
                this.empstate !== '' && this.emplga !== ''
            ) {
                return false
            }
            return true
        },
        isDisableLoan: function() {
            if(this.bname !== '' && this.accnumber !== '' && this.accname !== '' &&
                this.bvn !== '' && this.ploan !== '' && this.roption !== '' &&
                this.lexist !== '' && this.lexisttype !== '' && this.eamount !== ''
            ) {
                return false
            }
            return true
        },
    },
    mounted() {
        var amount = document.getElementById("amount");
        var vamount = document.getElementById("vamount");
        var days = document.getElementById("days");
        var vdays = document.getElementById("vdays");
        var dispLoan = document.getElementById("disp-Loan");
        var dispCharges = document.getElementById("disp-Charges");
        var dispTotal = document.getElementById("disp-Total");

        dispLoan.innerHTML = vamount.innerHTML = numberWithCommas(amount.value);

        vdays.innerHTML = numberWithCommas(days.value);
        dispCharges.innerHTML  = numberWithCommas(6000 *  parseInt(days.value));
        dispTotal.innerHTML  = numberWithCommas(parseInt(amount.value) + (6000 * parseInt(days.value)));

        amount.oninput = function() {
            vamount.innerHTML = this.value;
            calLoan();
        }
        days.oninput = function() {
            vdays.innerHTML = this.value;
            calLoan();
        } 

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function calLoan() {
            var intAmount = parseInt(amount.value);
            var intDays = parseInt(days.value);
            var intDay = 1;

            const interestrate = 72/100;

            interest = Math.abs(intAmount*(interestrate/12)*(Math.pow((1+interestrate/12),intDay))/(Math.pow((1+interestrate/12),intDay)-1));
            total = interest*intDay;
            if(intDays>1){
                diff=(total-intAmount)*(intDays-1);
            }else{
                diff=0;
            }
            total=diff+total;
            charges= total-intAmount;

            dispLoan.innerHTML = numberWithCommas(intAmount.toFixed(0));
            dispCharges.innerHTML  = numberWithCommas(charges.toFixed(0));
            dispTotal.innerHTML  = numberWithCommas(total.toFixed(0));
        }      
    }
})

