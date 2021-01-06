import React from 'react';

class Footer extends React.Component{
    render() {
        return (
            <div className="container-fluid footer" id="footer">
                {/* <Link to={'/term'}>Term and Condition</Link> */}
                <div className="container">
                    <section className="pt-5 pb-5">
                        <div className="row">
                            <div className="col-lg-4 col-md-12">
                                <div className="area-1">
                                    <div className="web-name">
                                        <h4 className="text-white">Wemall</h4>
                                    </div>
                                    <div className="web-des text-white">
                                        <p>Women-made high-quality products in Cambodia</p>
                                    </div>
                                    <div className="social-us">
                                        <span >
                                            <a href="#" className="social text-white"><i className="fab fa-facebook-f"></i>facebook</a>
                                        </span>
                                        <span>
                                            <a href="#" className="social text-white"><i className="fab fa-twitter"></i>twitter</a>
                                        </span>
                                        <span >
                                            <a href="#" className="social text-white"><i className="fab fa-instagram"></i>instagram</a>
                                        </span>
                                        <span >
                                            <a href="#" className="social text-white"><i className="fab fa-youtube"></i>youtube</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-8 col-md-12">
                                <div className="row">
                                    <div className="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div className="foot-area">
                                            <h4 className="text-white">Shopping Online</h4>
                                            <ul className="navbar-nav">
                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">Order Status</a>
                                                </li>
                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">Privacy Policy</a>
                                                </li>
                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">Terms-of-sale</a>
                                                </li>

                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">Terms and Condition</a>
                                                </li>
                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">Shipping and Delivery</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div className="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div className="text-white">
                                            <h4 className="foot-title">Information</h4>
                                            <ul className="navbar-nav">
                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">Gift Cards</a>
                                                </li>
                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">Find a store</a>
                                                </li>
                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">Contact Us</a>
                                                </li>

                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">About Us</a>
                                                </li>
                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">Become a seller</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div className="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div className="foot-area">
                                            <h4 className="text-white">Contact</h4>
                                            <ul className="navbar-nav">
                                                <li className="nav-item">
                                                    <a href="#" className="nav-link text-white">customerservice@wemall.shop</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="row mt-3">
                            <div className="col-sm-4 col-md-12 text-center">
                                <p className="text-white">Wemall &copy; 2019 All rights reserved</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        );
    }
}
export default Footer;