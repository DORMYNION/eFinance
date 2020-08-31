<!DOCTYPE html>
<html lang="en-US" class="js">

<head>
    <base href="<?php echo e(route('user.home')); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.png')); ?>">

    <!-- Page Title  -->
    <title>E-Finance</title>

    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo e(asset('css/dashlite.css')); ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo e(asset('css/theme.css')); ?>">

    <?php echo $__env->yieldContent('styles'); ?>

</head>

<body class="nk-body npc-subscription has-aside ui-clean ">

    <div class="nk-app-root">
        <!-- main @s  -->
        <div class="nk-main ">
            <!-- wrap @s  -->
            <div class="nk-wrap ">
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-lg wide-xl">
                        <div class="nk-header-wrap">
                            <div class="nk-header-brand">
                                <a href="<?php echo e(route('user.home')); ?>" class="logo-link">
                                    <img class="logo-light logo-img" src="<?php echo e(asset('img/efinance-logo.png')); ?>" srcset="<?php echo e(asset('img/efinance-logo.png')); ?> 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="<?php echo e(asset('img/efinance-logo.png')); ?>" srcset="<?php echo e(asset('img/efinance-logo.png')); ?> 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <?php if($user->profile_image): ?>
                                                        <img class="img-fluid no-border" src="<?php echo e(url('storage/' . $user->profile_image->id . '/' . $user->profile_image->file_name)); ?>"  alt="<?php echo e($user->name); ?> Profile Image">
                                                    <?php else: ?>
                                                        <img class="img-fluid no-border" src="<?php echo e(asset('img/profile/default.jpeg')); ?>" alt="<?php echo e($user->name); ?> Profile Image">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="user-name dropdown-indicator d-none d-sm-block"><?php echo e($user->name); ?></div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <?php if($user->profile_image): ?>
                                                            <a href="<?php echo e(url('storage/' . $user->profile_image->id . '/' . $user->profile_image->file_name)); ?>" target="_blank">
                                                                <img class="img-fluid no-border" src="<?php echo e(url('storage/' . $user->profile_image->id . '/' . $user->profile_image->file_name)); ?>"  alt="<?php echo e($user->name); ?> Profile Image">
                                                            </a>
                                                        <?php else: ?>
                                                            <img class="img-fluid no-border" src="<?php echo e(asset('img/profile/default.jpeg')); ?>" alt="<?php echo e($user->name); ?> Profile Image">
                                                        <?php endif; ?>
                                                        
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"><?php echo e($user->name); ?></span>
                                                        <span class="sub-text"><?php echo e($user->email); ?></span>
                                                    </div>
                                                    <div class="user-action">
                                                        <a class="btn btn-icon mr-n2" href="<?php echo e(route('user.profile')); ?>"><em class="icon ni ni-setting"></em></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="<?php echo e(route('user.profile')); ?>"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    
                                                        
                                                                
                                                            
                                                    
                                    <li class="d-lg-none">
                                        <a href="#" class="toggle nk-quick-nav-icon mr-n1" data-target="sideNav"><em class="icon ni ni-menu"></em></a>
                                    </li>
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e  -->
                <!-- content @s  -->
                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">

                            <?php echo $__env->make('partials.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            

                            <div class="nk-content-body">
                                <div class="nk-content-wrap">

                                    <?php if(session('document_type')): ?>
                                    
                                        <div class="row mb-5">
                                            <div class="col-lg-12">
                                                <div class="alert alert-pro alert-warning" role="alert">
                                                    <div class="alert-text">
                                                        <h6>Upload Documents</h6>
                                                        <p>To approve your loan, kindly upload the following documents: <br> 
                                                            <b><?php echo e(session()->get('document_type')); ?></b>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(session('customer_code')): ?>
                                        <div class="row mb-5">
                                            <div class="col-lg-12">
                                                <div class="alert alert-pro alert-warning" role="alert">
                                                        <div class="alert-text">
                                                            <h6>Add Payment Method</h6>
                                                            <p><b><?php echo e(session()->get('customer_code')); ?></b></p>
                                                        </div>
                                                        <div class="alert-actions pt-3">
                                                            
                        
                                                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addPaymentMethod"><span>Add Payment Method</span></a>
                                                            
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(session('message')): ?>
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="alert alert-pro alert-success" role="alert">
                                                    <div class="alert-text">
                                                        <h6>Successful</h6>
                                                        <p><?php echo e(session('message')); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($errors->count() > 0): ?>
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="alert alert-pro alert-danger" role="alert">
                                                    <div class="alert-text">
                                                        <h6>Failed</h6>
                                                        <ul class="list-unstyled">
                                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($error); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <?php echo $__env->yieldContent('mainContent'); ?>
                                </div>

                                <!-- footer @s  -->
                                <div class="nk-footer">
                                    <div class="container wide-xl">
                                        <div class="nk-footer-wrap g-2">
                                            <div class="nk-footer-copyright"> &copy; 2020 Efinance.
                                            </div>
                                            <div class="nk-footer-links">
                                                <ul class="nav nav-sm">
                                                    <li class="nav-item"><a class="nav-link" href="https://www.efinanceng.com/terms.php">Terms</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="https://efinanceng.com/privacy.php">Privacy Policy</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer @e  -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content @e  -->
            </div>
            <!-- wrap @e  -->
        </div>
        <!-- main @e  -->
        <form id="logoutform" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
    </div>


    <!-- @Modal - Subscription Change @s  -->
    <div class="modal fade" tabindex="-1" id="addPaymentMethod">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-md">
                    <div class="sp-package text-center">
                        <div class="sp-package-head">
                            <h4 class="title">Add Payment Method</h4>
                            <p class="text-soft">Kindly add your payment method to verify your account and to approve your loan.</p>
                        </div> 
                        <ul class="sp-package-plan nav nav-tabs"> 
                        </ul>
                        <form method="POST" action="<?php echo e(route('user.profile.addPaymentMethod')); ?>" id="addPaymentMethodForm" accept-charset="UTF-8" role="form" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <ul class="sp-package-list">
                                <li class="sp-package-item">
                                    <input class="sp-package-choose" type="radio" name="payment_method" id="Paystack" value="Paystack" checked>
                                    <label class="sp-package-desc" for="Paystack">
                                        <span class="sp-package-info py-1">
                                            <span class="sp-package-title title">Paystack</span>
                                            <span class="sp-package-detail">Automatic monthly payments</span>
                                        </span>
                                    </label>
                                </li>
                                <li class="sp-package-item">
                                    <input class="sp-package-choose" type="radio" name="payment_method" id="Remita" value="Remita">
                                    <label class="sp-package-desc" for="Remita">
                                        <span class="sp-package-info py-1">
                                            <span class="sp-package-title title">Remita</span>
                                            <span class="sp-package-detail">Direct debit mandate</span>
                                        </span> 
                                    </label>
                                </li>
                                <li class="sp-package-item">
                                    <input class="sp-package-choose" type="radio" name="payment_method" id="Cheque" value="Cheque">
                                    <label class="sp-package-desc" for="Cheque">
                                        <span class="sp-package-info py-1">
                                            <span class="sp-package-title title">Cheque</span>
                                            <span class="sp-package-detail">Signed postdated cheques</span>
                                        </span>
                                    </label>
                                </li>
                            </ul>
                            <div class="sp-package-action">
                                <button class="btn btn-success" id="submitPaymentMethod">Add Payment Method</button>
                                <button class="btn btn-dim btn-danger" data-dismiss="modal" >Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->

    <!-- @Modal - Card Verify Modal @s  -->
    <div class="modal fade" tabindex="-1" id="verifyCard">
        <div class="modal-dialog">
            <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-md text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cc-secure bg-success-dim text-success"></em>
                        <h4 class="nk-modal-title">Insert Payment Card</h4>
                        <div class="nk-modal-text">
                            <p>Kindly add your debit card for account verification. This verification will cost NGN50. <br> We will send you a confirmation email <strong>(this may take up to 3 hours to receive)</strong>.</p>
                            <p class="sub-text-sm"><a href="https://efinanceng.com/privacy.php">Click here</a> to learn more about privacy policy.</p>
                        </div>
                        <div class="nk-modal-action-lg">
                            <form method="POST" action="<?php echo e(route('user.payment.pay')); ?>" accept-charset="UTF-8" role="form" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="email" value="<?php echo e($user->email); ?>"> 
                                <input type="hidden" name="amount" value="5000">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>">    
                                <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = [])); ?>">
                                <button class="btn btn-mw btn-success" type="submit" ><span>Add Card Now</span></button>
                            </form>
                        </div>
                    </div>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->


    <!-- app-root @e  -->
    <!-- JavaScript -->
    <script src="<?php echo e(asset('js/bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>

    <script>
        $(function(e){
            $('#addPaymentMethodForm').submit(function(e) {
                if($("input[name='payment_method']:checked").val() === "Paystack") {
                    console.log('jsjdks');
                    $('#addPaymentMethod').modal('hide');
                    $('#verifyCard').modal('show');
                    return false;
                } else {
                    return true;
                }
            });
        });$('addPaymentMethodForm')
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html><?php /**PATH /opt/lampp/htdocs/app/resources/views/layouts/user.blade.php ENDPATH**/ ?>