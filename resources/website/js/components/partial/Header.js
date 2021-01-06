import React from 'react';
import {Link} from 'react-router-dom';


class Header extends React.Component{
    render() {
        return (
            <div>
                <div className="container-fluid" id='header'>
                        <div className="container to-bar">
                            <div className="row">
                                <nav className="navbar navbar-expand-lg w-100">
                                    <div className="navbar-collapse collapse">
                                        <ul className="navbar-nav ml-auto" id="text-bar">
                                            <li className="nav-item">
                                                <Link className="nav-link" to="#">My Account</Link>
                                            </li>
                                            <li className="nav-item">
                                                <Link className="nav-link" to="#">Help Center</Link>
                                            </li>
                                            <li className="nav-item">
                                                <Link className="nav-link" to="#">Today's Deals</Link>       
                                            </li>
                                            <li className="nav-item">
                                                <Link className="nav-link" to="#">FAQ</Link>       
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>

                        <hr/>
                        <div className="container top-header">
                            <div className="row">
                                <div className="col-xl-2 col-lg-2 col-md-2">
                                    <header className="container-logo">
                                        <a href="#">
                                            <img src="https://www.wemall.shop/images/logo/logos.png"
                                                className="logo-image img-fluid "
                                                alt="Mamapapa" />
                                        </a>
                                    </header>
                                </div>

                                <div className="col-xl-6 col-lg-6 col-md-6">
                                    <div className="search-form h-100">
                                        <form className="w-100">
                                            <div className="input-group" id="category-search">
                                                <div className="input-group-prepend">
                                                    <select id="category">
                                                        <option>All Category</option>
                                                        <option >Accessories</option>
                                                        <option  >Beauty, Health Hair</option>
                                                        <option >Echo Friendly</option>
                                                        <option >Ethnic</option>
                                                        <option >Hand Woven</option>
                                                        <option >Home, Office School</option>
                                                        <option >Jewelry</option>
                                                        <option >Men Fashion</option>
                                                        <option >Women Fashion</option>
                                                    </select>
                                                </div>
                                                <input className=" form-control form-control-md search-url w-auto" type="text"
                                                    placeholder="Type to search the product you look..."
                                                />
                                                <div className="input-group-prepend">
                                                    <button className="btn btn-dark btn-sm btn-main-search" type="submit" aria-label="search">
                                                        ICON
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div className="col-xl-4 col-lg-4 col-md-4">
                                    <nav className="navbar navbar-expand-lg navbar-light justify-content-center text-right">
                                        <div className="collapse navbar-collapse">
                                            <ul className="navbar-nav ml-auto">
                                                <li className="nav-item ">
                                                    <a className="nav-link favourite-list auth" href="#">
                                                        <i className="fal fa-retweet-alt"></i>Compare
                                                        <span className="counts-compare">
                                                            (0)
                                                        </span>
                                                    </a>
                                                </li>
                                                <li className="nav-item ">
                                                    <a className="nav-link favourite-list auth" href="#">
                                                        <i className="far fa-heart"></i> Favourite
                                                        <span className="counts-wishlist">
                                                            (0)
                                                        </span>
                                                    </a>
                                                </li>
                                                <li className="nav-item ">
                                                    <a className="nav-link favourite-list auth" href="#">
                                                        <i className="far fa-heart"></i> Cart
                                                        <span className="counts-wishlist">
                                                            (0)
                                                        </span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </nav>
                                </div>

                            </div>
                        </div>

                </div>
            </div>
        );
    }
}

export default Header;