import React from 'react';
import '../../../sass/about.scss';

class Index extends React.Component{
    render(){
        return(
          <div className="about-us mb-5 mt-5">
            <div className="container-fluid p-4">

      <section className="header-title">
        <div className="row">
          <div className="col-12">
            <h3 className="text text-center pb-4">About Us</h3>
          </div>
        </div>
      </section>

      <section className="overview">
        <div className="row bg-image">
          <div className="display3" style={{display: 'none'}}>
            <h1 className="text text-center title-con">COMPANY OVERVIEW</h1>
          </div>
          <div className="col-sm-12 col-md-12 col-lg-5">
            <div className="l-side">
            <div className="display2 text-center" style={{display: 'none'}}>
              <h1 className="text title-con">COMPANY OVERVIEW</h1>
            </div>
            <div className="description"><strong>Wemall</strong> is one of the fast-growing e-commerce
              company founded by two Cambodian women ( <strong>Socheata Touch</strong> and <strong>Omouy Heang</strong> )
              who are passionate about the promotion of women's economic empowerment, gender equality,
              and digital innovation. They came with a big idea in September 2019 to inspire the nation
              in Asia but starting from Cambodia and bringing together the creative and local brands of
              women businesses closer to customers everywhere.
            </div>
              </div>
          </div>
          <div className="col-sm-12 col-md-12 col-lg-7 r-side">
            <div className="mt-4 display1">
              <h1 className="text text-center title-con">COMPANY OVERVIEW</h1>
            </div>
            <div className="row pb-4 pt-4">
              <div className="col-sm-6 col-md-6 col-lg-6">
                <div className="contant-pro-top text-center">
                  <img src="https://www.wemall.shop/images/website/about-us/5f1e955d5ce5e.png" className="rounded-circle" width="200px" height="200px" alt="bmuy" />
                  <h6 className="author">Ms.Omuoy Heang</h6>
                </div>
              </div>
              <div className="col-sm-6 col-md-6 col-lg-6">
                <div className="contant-pro-top text-center">
                  <img src="https://www.wemall.shop/images/website/about-us/5f1e955d8532d.png" className="rounded-circle" width="200px" height="200px" alt="bmuy" />
                  <h6 className="author">Ms.Socheata Touch</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="mission mt-4">
        <div className="row bg-image">
          <div className="col-sm-12 co-md-12 col-lg-12 wrap-content">
            <img className="rounded-circle image-mission" width="300" height="300" src="https://www.wemall.shop/images/website/about-us/5f1e955ed3eab.png" />
            <div className="bg-gray">
              <div className="title pt-2">
                <h4>COMPANY MISSION</h4>
              </div>
              <div className="description">
                <p><strong>WeMall’s mission</strong> is to set up a sustainable e-market for women and commit
                  to bringing excellent operations and the best value of money to our customers. We have a deep
                  understanding of the challenges faced by our women communities and customers. We, thus, provide
                  the technology infrastructure solutions that customers can enjoy shopping products of our
                  communities in a more efficient manner and with unforgettable experiences and more.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="vision mt-4">
        <div className="row bg-image">
          <div className="col-sm-12 co-md-12 col-lg-12 wrap-content">
            <img className="rounded-circle image-vission" src="https://www.wemall.shop/images/website/about-us/5f1e95603aea1.png" />
            <div className="bg-gray float-right">
              <div className="title pt-2">
                <h4>COMPANY VISION</h4>
              </div>
              <div className="description">
                <p><strong>Wemall</strong> aims to build the first digital retail commerce where the world
                  meets, trades and grows together with Asian Women made products. We aspire to be the
                  first women e-commerce company in the region and globally.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="value mt-4">
        <div className="row bg-image">
          <div className="col-lg-4">
            <div className="bg-dark-blue pt-4">
              <div className="title text-center">
                <h4>CULTURE</h4>
              </div>
              <div className="description">
                <p>Our culture is about being innovators to excel customers’ experiences with the spirit of women entrepreneurship</p>
              </div>
            </div>
          </div>
          <div className="col-lg-8 wrap-value">
            <div className="bg-gray p-4">
              <div className="title">
                <h4>VALUE</h4>
              </div>
              <div className="description">
                <p>Our values indicate the way we operate and champion our people. Our seven values are: </p>
                <div className="sub-title"><strong>1-CUSTOMERS FIRST</strong></div>
                <div className="sub-title mt-1"><strong>2-THINK BIG & NO WORRY ABOUT FAILURE</strong></div>
                <div className="sub-title mt-1"><strong>3-CHERISH TRUST 4-COMPLIANCE</strong></div>
                <div className="sub-title mt-1"><strong>4-BEST PERFORMANCE</strong></div>
                <div className="sub-title mt-1"><strong>5-HIGH STANDARD DELIV</strong></div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="choose-us mt-4">
        <div className="row bg-image">
          <div className="col-12 wrap-content">
            <div className="bg-gray float-right">
              <div className="title pt-2">
                <h4> <span className="font-icon">WHY YOU SHOULD</span> CHOOSE US</h4>
              </div>
              <div className="description">
                <p><strong>WE ARE THE FIRST WOMEN E-COMMERCE.</strong> It is found by women and for women's prosperity.</p>
                <p><strong>GLOBAL REACH.</strong> We leverage women-owned businesses from national to global.</p>
                <p><strong>STRONG WOMEN COMMUNITY.</strong> We have built women business networks regionally andglobally.</p>
                <p><strong>MEDIA COVERAGE.</strong> Our marketing campaigns keep us - and by extension you - in thepublic eye.</p>
                <p><strong>POLICY SUPPORT.</strong> We are supported by a number of Cambodian ministries in contributingto the country digital economy.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="marketplace mt-4">
        <div className="row bg-image">
          <div className="col-12 wrap-content">
            <div className="image-marketplace">
              <img className="rounded-circle" src="https://www.wemall.shop/images/website/about-us/5f1e95610c4c1.png" />
            </div>
            <div className="bg-gray">
              <div className="title pt-2 text-center">
                <h4>HOW OUR</h4>
                <h4>MARKETPLACE WORKS</h4>
              </div>
              <div className="description">
                <p>We list your products on our site. We market your products to customers. Customers
                  order and pay through our checkout. We let you know so that you can fulfill their order.
                  You send the order to your customer. We pay for you</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="give mt-4">
        <div className="row bg-image">
          <div className="col-12 wrap-content">
            <img className="rounded-circle image-give" src="https://www.wemall.shop/images/website/about-us/5f1e95620b289.png" />
            <div className="bg-gray">
              <div className="title pt-2">
                <h4>WE GIVE YOU</h4>
              </div>
              <div className="description">
                <div className="sub"><strong>MARKETING MIX</strong></div>
                <p>Our large-scale, integrated campaigns reach millions of people through a wide variety of channels.</p>
                <div className="sub"><strong>BUSINESS GUIDANCE</strong></div>
                <p>Access a wide range of growth resources, from trends and product development to guides on how to price for profit.</p>
                <div className="sub"><strong>A SUPPORTIVE COMMUNITY</strong></div>
                <p>Join a supportive community of top small-business talents and talk to like-minded people in our exclusive Partner forum.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="looking mt-4">
        <div className="row bg-image">
          <div className="col-12 wrap-content">
            <img className="rounded-circle image-looking" src="https://www.wemall.shop/images/website/about-us/5f1e95632c177.png" />
            <div className="bg-gray">
              <div className="title pt-2">
                <h4>WE'RE LOOKING FOR</h4>
              </div>
              <div className="description">
                <p>Local brand products made by women or businesses managed by women. Products you have 
                  sourced or designed yourself as an individual woman or majority of women in your groups. 
                  Quality products with range variety. Commitment to excellence. Great photography. 
                  Respect for intellectual property rights — we respect the ownership and creativity of 
                  our women, and we ask all our Partners to sign on the agreement that they comply with 
                  our IP protection rights. Businesses that are looking to grow — regardless of the size 
                  of business</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="sell mt-4">
        <div className="row bg-image">
          <div className="col-12 wrap-content">
            <div className="bg-gray">
              <div className="title pt-2">
                <h4><span className="font-icon">WHAT YOU</span> CAN SELL</h4>
              </div>
              <div className="description">
                <p><strong>WE ARE THE FIRST WOMEN E-COMMERCE.</strong> It is found by women and for women's prosperity.</p>
                <p><strong>GLOBAL REACH.</strong> We leverage women-owned businesses from national to global.</p>
                <p><strong>STRONG WOMEN COMMUNITY.</strong> We have built women business networks regionally andglobally.</p>
                <p><strong>MEDIA COVERAGE.</strong> Our marketing campaigns keep us - and by extension you - in thepublic eye.</p>
                <p><strong>POLICY SUPPORT.</strong> We are supported by a number of Cambodian ministries in contributingto the country digital economy.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </div>
        );
    }
}

export default Index;