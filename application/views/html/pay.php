<style>
.razorpay-payment-button{
	 background:#449d44;
	 color:#fff;
	 padding:9px;
	 border:none;
	 border-radius:3px;
	 margin-top:5px;
}
 </style>
<section class="breadcrumb-section section-bg-clr5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h2>Confirm Payment</h2>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Donation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
    ===== Breadcrumb Section End ===========
    ===================================-->

    <!--==================================
    ===== Donation Section Start ===========
    ===================================-->

    <section class="donation-section section-padding section-bg-clr1">
        <div class="container">
             <div class="row">
                <div class="col-md-12 ">
                    <!-- Section Heading Start -->
                    <div class="section-heading section-heading-donation ">
                        <h2 class="">Please <span> Check </span> your <span> Doantion Amount</span></h2>
                        
                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="donate-form">
                      
                        <div class="donation-list tab-content">
                            
                            
                            <div class="donation-bank-transfer tab-pane active " role="tabpanel"  id="bank">
                                <div class="donation-bank">
                                    <ul>
                                        <li>
                                            <p><strong>Donar Name - </strong></p>
                                            <span><?php echo isset($details['cust_name'])?$details['cust_name']:''; ?></span>
                                        </li> 
										<li>
                                            <p><strong>Phone No - </strong></p>
                                            <span><?php echo isset($details['mobile'])?$details['mobile']:''; ?></span>
                                        </li>
										<li>
                                            <p><strong>Email Id - </strong></p>
                                            <span><?php echo isset($details['email'])?$details['email']:''; ?></span>
                                        </li>
                                        <li>
                                            <p><strong>Doantion for - </strong></p>
                                            <span>Mithra Seva Samithi</span>
                                        </li> 
										<li>
                                            <p><strong>Doantion Amount - </strong></p>
                                            <span> ₹ <?php echo isset($details['amount'])?$details['amount']:''; ?></span>
                                        </li>
                                        
                                    </ul>
                                </div>
								<div class="clearfix">&nbsp;</div>
                            </div>
							<form  id="paymentform" name="paymentform" action="<?php echo base_url('payment/success'); ?>" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $basic_details['key']?>"
    data-amount="<?php echo $basic_details['amount']?>"
    data-currency="INR"
    data-name="<?php echo $basic_details['name']?>"
    data-image=""
    data-description="donation"
    data-prefill.name="<?php echo $basic_details['prefill']['name']?>"
    data-prefill.email="<?php echo $basic_details['prefill']['email']?>"
    data-prefill.contact="<?php echo $basic_details['prefill']['contact']?>"
    data-notes.shopping_order_id="<?php echo $details['u_id']?>"
    data-order_id="<?php echo $basic_details['order_id']?>"
    <?php if ($basic_details['display_currency'] !== 'INR') { ?> data-display_amount="<?php echo $basic_details['amount']?>" <?php } ?>
    <?php if ($basic_details['display_currency'] !== 'INR') { ?> data-display_currency="<?php echo $basic_details['display_currency']?>" <?php } ?>
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="u_id" value="<?php echo isset($details['u_id'])?$details['u_id']:''; ?>">
</form>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
