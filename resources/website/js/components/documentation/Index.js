import React from 'react';

class Index extends React.Component {
    render(){
        return ( 
        	<div className="container">
				<div className="documentation">

					<div className="row">
						<div className="col-md-4 col-sm-12">
							<ul className="nav d-block">

								<h4>Documentation</h4>

								<li className="nav-item">
									<a className="nav-link active" data-toggle="tab" href="#sale">Terms of Sale</a>
								</li>
								<li className="nav-item">
									<a className="nav-link" data-toggle="tab" href="#condition">Terms of Condition</a>
								</li>
								<li className="nav-item">
									<a className="nav-link" data-toggle="tab" href="#policy">Privacy Policy</a>
								</li>
								<li className="nav-item">
									<a className="nav-link" data-toggle="tab" href="#delivery">Shipping and Delivery</a>
								</li>
								<li className="nav-item">
									<a className="nav-link" data-toggle="tab" href="#guide">User Guide</a>
								</li>
								<li className="nav-item">
									<a className="nav-link" data-toggle="tab" href="#faq">FAQ</a>
								</li>
								<li className="nav-item">
									<div className="post">
										<div className="text">Can't find what you want?</div>
										<a className="nav-link button" href="#">Post a Request</a>
									</div>
								</li>
							</ul>
						</div>

						<div className="col-md-8 col-sm-12">

							<div className="tab-content">
								<div id="sale" className="container tab-pane active">
									<h4>Terms of Sale</h4>

									<div className="plan">
										<div className="title">1. Place an order</div>
										<div className="description mt-1">
											By placing an order on this Website, you must confirm that you have read these terms,
											conditions, the Privacy Policy and that you agree with them. You should keep a copy
											of these terms and conditions for the future reference. We will not always file a copy of any orders that you made.
										</div>
										<div className="description mt-1">
											Each order that you place is an offer to buy those goods and we shall accept that
											offer at our sole discretion, but orders are normally accepted if
										</div>
										<div className="description mt-1">
											<li> the goods are available;</li>
											<li> the order reflects our current pricing;</li>
											<li>the goods are for delivery to a destination that we deliver to or are for collection in one of our stores. Your credit or account card is authorized for the transaction.</li>
										</div>
									</div>

									<div className="prices mt-3">
										<div className="title">2. Prices</div>
										<div className="description mt-1">
											The price of the goods and our delivery charges (where applicable) will be as set out on the
											Website from time to time, except in the case of obvious errors.
										</div>
										<div className="description mt-1">
											All prices on the Website exclude any applicable sales, taxes and duties. These will be
											calculated according to the destination of where your order is being delivered to or collected
											from and are included in the total price displayed when you place your order.
										</div>
										<div className="description mt-1">
											If your order is out for delivery to a destination outside of the Cambodia, your
											order may be subject to import duties and taxes. It is your responsibility to pay
											any such duties and taxes. Any such duties and taxes may vary in different
											territories. We are unable to advise you in relation to any import duties and
											taxes, but we recommend you to contact the local customs office at the delivery
											destination in this respect.
										</div>
									</div>

									<div className="payment mt-3">
										<div className="title">3. Payment</div>
										<div className="description mt-1">
											We currently accept payments through the following methods:
											<li> Bank Transfer</li>
											<li> Wing, True Money, E-money Transfer …</li>
											<li> Cash on Delivery</li>
										</div>
										<div className="description mt-1">
											Payment for the goods and related costs will be due at the time we accept your order. We will
											usually attempt to take payment once the goods are ready to be delivered or collected.
										</div>
										<div className="description mt-1">
											You must confirm that you are authorized to use the payment method that you provide to
											us when placing your order. We may carry out security checking to confirm that this is the case.
										</div>
										<div className="description mt-1">
											If your payment method is not authorized, we may refuse to accept your order and we will
											not have any responsibilities for the non-delivery of the goods.
										</div>
									</div>

									<div className="payment mt-3">
										<div className="title">4. Warranty</div>
										<div className="description mt-1">
											The warranty will be showing on each product’s description.
										</div>
										<div className="description mt-1">
											If you find any issues with your product(s) within the warranty period, please see
											our Repairs section or contact to the Customer Services who will be able to advise you.
										</div>
									</div>

									<div className="warranty mt-3">
										<div className="title">5. Warranty</div>
										<div className="description mt-1">
											You have a legal obligation to keep the goods in your possession and to take
											reasonable care of them until you have returned the goods to us or we collect
											the goods from you. Please kindly check on the following criteria for returning condition:
										</div>
										<div className="description mt-1">
											Free exchange for items that haven’t been used, damaged or cleaned within
											14 days from the purchased date. Purchased receipt and original price tag must be submitted
										</div>
										<div className="description mt-1">
											NO EXCHANGE FOR: Luxury Item, Discount Product, Swimwear, Socks, Shoes, Underwear,
											Towel, Glove, Mattresses and other accessories.
										</div>
										<div className="description mt-1">
											THE SALE ITEMS: can exchange only size or the same color of the previous one.
										</div>
									</div>

									<div className="repairs mt-3">
										<div className="title">6. Repairs</div>
										<div className="description mt-1">
											As a consumer, you will always have legal rights in relation to the goods that are
											faulty or not as described. These legal rights are not affected by these terms and
											conditions or our Returns Policy
										</div>
										<div className="description mt-1">
											If you have returned goods to us because they are faulty or not as described.
											We will refund any reasonable costs you incur in returning the item to us, together
											with the price of defective goods in full and any applicable. delivery charges are set
											out in the Refunds section.
										</div>
									</div>

									<div className="repairs mt-3">
										<div className="title">7. Refunds</div>
										<div className="description mt-1">
											Refunding process when:
										</div>
										<div className="description mt-1">
											Over estimation date for 10 days (Still not yet receive product)
											<li> Faulty or not as described</li>
											<li> Product out of stock</li>
										</div>

										<div className="description mt-1">
											Please note that we don't cover returning shipping costs. If it’s pre-order
											product, you’ll total shipping fee and it is your responsibility.
										</div>
									</div>

								</div>

								<div id="condition" className="container tab-pane fade">

									<h4>Terms of Condition</h4>

									<div className="plan">
										<div className="description">
											These terms and conditions describe the basis of the purchase by you and sale by us of the goods described
											on www.wemall.shop (the Website) which we own and maintain.
										</div>
										<div className="description mt-1">
											These terms and conditions should be read alongside, and are in addition to, our Privacy Policy
											to tell you how we use your personal information.
										</div>
										<div className="title mt-3">1. Place an order</div>
										<div className="description mt-1">
											By placing an order on this Website, you must confirm that you have read these terms,
											conditions, the Privacy Policy and that you agree with them. You should keep a copy
											of these terms and conditions for the future reference. We will not always file a
											copy of any orders that you made.
										</div>
										<div className="description mt-1">
											Each order that you place is an offer to buy those goods and we shall accept that
											offer at our sole discretion, but orders are normally accepted if
										</div>
										<div className="description mt-1">
											<li> the goods are available;</li>
											<li> the order reflects our current pricing;</li>
											<li>the goods are for delivery to a destination that we deliver to or are for collection in one of our stores. Your credit or account card is authorized for the transaction.</li>
										</div>
									</div>

									<div className="prices mt-3">
										<div className="title">2. Prices</div>
										<div className="description mt-1">
											The price of the goods and our delivery charges (where applicable) will be as set out on the
											Website from time to time, except in the case of obvious errors.
										</div>
										<div className="description mt-1">
											All prices on the Website exclude any applicable sales, taxes and duties. These will be
											calculated according to the destination of where your order is being delivered to or collected
											from and are included in the total price displayed when you place your order.
										</div>
										<div className="description mt-1">
											If your order is out for delivery to a destination outside of the Cambodia, your
											order may be subject to import duties and taxes. It is your responsibility to pay
											any such duties and taxes. Any such duties and taxes may vary in different
											territories. We are unable to advise you in relation to any import duties and
											taxes, but we recommend you to contact the local customs office at the delivery
											destination in this respect.
										</div>
									</div>

									<div className="payment mt-3">
										<div className="title">3. Payment</div>
										<div className="description mt-1">
											We currently accept payments through the following methods:
											<li> Bank Transfer</li>
											<li> Wing, True Money, E-money Transfer …</li>
											<li> Cash on Delivery</li>
										</div>
										<div className="description mt-1">
											Payment for the goods and related costs will be due at the time we accept your order. We will
											usually attempt to take payment once the goods are ready to be delivered or collected.
										</div>
										<div className="description mt-1">
											You must confirm that you are authorized to use the payment method that you provide to
											us when placing your order. We may carry out security checking to confirm that this is the case.
										</div>
										<div className="description mt-1">
											If your payment method is not authorized, we may refuse to accept your order and we will
											not have any responsibilities for the non-delivery of the goods.
										</div>
									</div>

									<div className="payment mt-3">
										<div className="title">4. Warranty</div>
										<div className="description mt-1">
											The warranty will be showing on each product’s description.
										</div>
										<div className="description mt-1">
											If you find any issues with your product(s) within the warranty period, please see
											our Repairs section or contact to the Customer Services who will be able to advise you.
										</div>
									</div>

									<div className="warranty mt-3">
										<div className="title">5. Warranty</div>
										<div className="description mt-1">
											You have a legal obligation to keep the goods in your possession and to take
											reasonable care of them until you have returned the goods to us or we collect
											the goods from you. Please kindly check on the following criteria for returning condition:
										</div>
										<div className="description mt-1">
											Free exchange for items that haven’t been used, damaged or cleaned within
											14 days from the purchased date. Purchased receipt and original price tag must be submitted
										</div>
										<div className="description mt-1">
											NO EXCHANGE FOR: Luxury Item, Discount Product, Swimwear, Socks, Shoes, Underwear,
											Towel, Glove, Mattresses and other accessories.
										</div>
										<div className="description mt-1">
											THE SALE ITEMS: can exchange only size or the same color of the previous one.
										</div>
									</div>

									<div className="repairs mt-3">
										<div className="title">6. Repairs</div>
										<div className="description mt-1">
											As a consumer, you will always have legal rights in relation to the goods that are
											faulty or not as described. These legal rights are not affected by these terms and
											conditions or our Returns Policy
										</div>
										<div className="description mt-1">
											If you have returned goods to us because they are faulty or not as described.
											We will refund any reasonable costs you incur in returning the item to us, together
											with the price of defective goods in full and any applicable. delivery charges are set
											out in the Refunds section.
										</div>
									</div>

									<div className="repairs mt-3">
										<div className="title">7. Refunds</div>
										<div className="description mt-1">
											Refunding process when:
										</div>
										<div className="description mt-1">
											Over estimation date for 10 days (Still not yet receive product)
											<li> Faulty or not as described</li>
											<li> Product out of stock</li>
										</div>

										<div className="description mt-1">
											Please note that we don't cover returning shipping costs. If it’s pre-order
											product, you’ll total shipping fee and it is your responsibility.
										</div>
									</div>
								</div>

								<div id="policy" className="container tab-pane fade">

									<h4>Privacy Policy</h4>

									<div className="description mt-1">
										<strong>wemall.shop</strong> ( <strong>"Wemall"</strong> or, the
										<strong>"Platform"</strong>) is a business to consumer (or <strong>"B2C"</strong>) platform
										which connects and facilitates sales and purchases between business sellers (or "Sellers")
										and consumer buyers (or "Buyers").
									</div>

									<div className="description mt-1">
										We understand that you care about your personal information to be used, we
										really appreciate your trust that we will do so carefully and sensibly for
										your personal information. There is some information related to your personal data down below:
									</div>

									<div className="collection mt-3">
										<div className="title">
											<strong>1. Collection of information</strong>
										</div>
										<div className="sub-title ml-4 mt-2 mb-2">
											<strong><span></span> Information That You Provide to Us:</strong>
										</div>
										<div className="description mt-1 ml-4">
											When you register or login, you may be asked to provide:
										</div>
										<div className="description mt-1 ml-5">
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Email address</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Phone number</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Full name</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Billing and Shipping address</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Payment method information</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ID photo and any other documents (for seller)</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Any feedbacks that you provided through wemall.shop</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> The details of your visits to our website including traffic data, location data, other communication data and the resources that you accessed.</div>
										</div>
										<div className="sub-title ml-4 mt-2 mb-2">
											<strong><span></span> The Information That We Automatically received</strong>
										</div>
										<div className="description mt-1">
											We automatically received and store certain types of information, including information about your interaction
											with content and services are available through our website. Like many websites, we use "cookies" and
											other unique identifiers. Also we obtain certain types of information when your web browser or device
											accesses Wemall Website and other contents served by or on behalf of Wemall on other websites.
										</div>
										<div className="sub-title ml-4 mt-2 mb-2">
											<strong><span></span>Information That We Receive from Third Parties</strong> (Any Social Media)
										</div>

									</div>

									<div className="personal-data mt-3">

										<div className="title">
											<strong>2. Use of Personal Data</strong>
										</div>

										<div className="description mt-1">
											We use your personal information to operate, provide, develop, and improve the
											products and services that we offer our customers. These purposes include:
										</div>
										<div className="description mt-1 ml-5">
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Improve our process and platform (Order, Shipment, Delivery …)</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Better Communication</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Recommendation to make you easier and more convenience</div>
											<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Advertising
											</div>
										</div>

										<div className="description forn mt-1">
											If there are any questions regarding to this Privacy Policy, you may contact us using the information below
											<div className="sub mt-2">Company: Wemall Cambodia</div>
											<div className="sub">Address: #10, St. 03, Sangkat Teok Laark III, Khan Tuol Kork, Phnom Penh, Cambodia.</div>
											<div className="sub">Email: customercare@wemall.shop</div>
											<div className="sub">Phone: (+855) 12 671 367</div>
										</div>
									</div>

								</div>

								<div id="delivery" className="container tab-pane fade">
									<h4>Shipping and Delivery</h4>
									<div className="description m-1">
										Shipping are available in Cambodia only.
									</div>
									<div className="description mt-2 ml-5">
										<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Monday to Sunday from 8AM to 5PM.</div>
										<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Estimate delivery 1to 3 days from ordering.</div>
										<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Shipping fee is based on delivering location and product fee.</div>
										<div className="sub">- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Customer is required to check product status and confirm.</div>
									</div>
								</div>

								<div id="guide" className="container tab-pane fade">
									<h4>User Guide</h4>
									<p></p>
								</div>

								<div id="faq" className="container tab-pane fade">
									<h4>FAQ</h4>
									<p></p>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
        );
    }
}
export default Index;