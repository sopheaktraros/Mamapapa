import React from "react";
import Carousel from "nuka-carousel";
import { FavoriteBorder, ShoppingCartOutlined, FormatListBulleted } from "@material-ui/icons";
import Slider from '@material-ui/core/Slider';

function Index() {
  const [value, setValue] = React.useState([0, 100]);
  const handleChange = (event, newValue) => {
    setValue(newValue);
  };

  return (
    <div className="all-produce mb-5">
      
      <div className="container-fluid">
        <section className="category-list">
          <ul className="nav justify-content-center">
            <li className="nav-item">
              <a href="#">Accessories</a>
              <ul className="dropdown">
                <li>
                  <a href="#">Laptopse</a>
                </li>
                <li>
                  <a href="#">Monitors</a>
                </li>
                <li>
                  <a href="#">Printers</a>
                </li>
              </ul>
            </li>
            <li className="nav-item">
              <a href="#">Beauty, Health & Hair</a>
            </li>
            <li className="nav-item">
              <a href="#">Echo Friendly</a>
            </li>
            <li className="nav-item">
              <a href="#">Hand Woven</a>
            </li>
            <li className="nav-item">
              <a href="#">Home, Office & School</a>
            </li>
            <li className="nav-item">
              <a href="#">Jewelry</a>
            </li>
            <li className="nav-item">
              <a href="#">Men Fashion</a>
            </li>
            <li className="nav-item">
              <a href="#">Women Fashion</a>
            </li>
          </ul>
        </section>

        <section className="product-list mt-4">
          <div className="row">
            <div className="col-lg-3 col-md-3 l-side">
              <div className="left-sidebar p-3">
                <div className="filter-price">
                  <div className="header-type" data-toggle="collapse" data-target="#demo">
                    <span className="arrow">▼</span>
                    <span className="label">Price</span>
                  </div>
                  <div className="price mt-1 mb-1 collapse show" id="demo">

                    <Slider
                      value={value}
                      onChange={handleChange}
                      valueLabelDisplay="auto"
                      aria-labelledby="range-slider"
                    />

                  </div>
                </div>

                <div className="filter-style">
                  <div className="header-type" data-toggle="collapse" data-target="#demo1">
                    <span className="arrow">▼</span>
                    <span className="label text-capitalize">amount</span>
                  </div>
                  <div className="style ollapse show" id="demo1">
                    <form action="#">
                      <label className="container-checkbox text-capitalize">
                        <input type="checkbox" />
                        <span className="checkmark">3pairs</span>
                      </label>
                      <label className="container-checkbox text-capitalize">
                        <input type="checkbox" />
                        <span className="checkmark">30cones</span>
                      </label>
                      <label className="container-checkbox text-capitalize">
                        <input type="checkbox" />
                        <span className="checkmark">33 sticks</span>
                      </label>
                    </form>
                  </div>

                  <div className="filter-style">
                    <div className="header-type">
                      <span className="arrow">▼</span>
                      <span className="label text-capitalize">Colors</span>
                    </div>
                    <div className="style">
                      <form action="#">
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            Mixed W, Br, Y, Black
                            </span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            Red And Peach Combination
                            </span>
                        </label>
                      </form>
                    </div>
                  </div>

                  <div className="filter-style">
                    <div className="header-type">
                      <span className="arrow">▼</span>
                      <span className="label text-capitalize">Color</span>
                    </div>
                    <div className="style">
                      <form action="#">
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Purple And Olive</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            Yellow and White Combination
                            </span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Mauve</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Watermelon Color</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Navy Blue</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Gold</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Milk</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Blue</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Green</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Purple</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Olive</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Light Pink</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Light Apple Green</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Freeside</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            White To Black Family With Black Body
                            </span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            Soft Blue Family With Black Body
                            </span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            Natural Family With Black Body
                            </span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            Main Color Red Family
                            </span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Dark Purple</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Brown</span>
                        </label>
                      </form>
                    </div>
                  </div>

                  <div className="filter-style">
                    <div className="header-type">
                      <span className="arrow">▼</span>
                      <span className="label text-capitalize">Color</span>
                    </div>
                    <div className="style">
                      <form action="#">
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Maroon</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Green</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Light Blue</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Dark Blue</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Gray</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">White</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Yellow</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Red</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Brown</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Black</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Light Green</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Natural</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Dark brown</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Pale Yellow-Green</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Green And White</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">White And Brown</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Yellow Cooper</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Cooper</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Purple</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Mixed</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Red-Violet</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Yellowish Green</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Orange</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Light Purple</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Sky Blue</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Dark Red</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Maroon</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Salmon</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Bronze</span>
                        </label>
                      </form>
                    </div>
                  </div>

                  <div className="filter-style">
                    <div className="header-type">
                      <span className="arrow">▼</span>
                      <span className="label text-capitalize">Size</span>
                    </div>
                    <div className="style">
                      <form action="#">
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Free Side</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">12x17 cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Cotton</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">50ml</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">1.80cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">0.90cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">91x180cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">93x180cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">97 cmx180 cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">94x180cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">M</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">L</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">S</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">95 cm x 180 Cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">80 cm x 160 Cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">7 x 24 Cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">7cm x 12cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">6cm x 12cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">96 cm x 180 cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">16.5c x 24.5cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">L</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">L Size 1000ml</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">no size</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">1.30cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">3.30cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Arm Ring 7.80cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">W23.5cm h 7cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">W18cm h 14</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">W 20cm h19</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">W6.5cm h 7cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">3.80cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2.60cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2.30cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">12cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">19cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">92 cm x 180 cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Color</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2.80cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">9cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">98 cm x 180 cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Arm Ring 7.60cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Arm Ring 7.30cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Arm Ring 7.50cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            20 Small Straws 5 Big Straws And 1 Brush
                            </span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">7cmx11cmx2.5cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">65mm x 250mm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            17.5 x 1.4 x 1.7cm
                            </span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">10cmx19cmx3cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">11cmx14cmx3cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">10.5cmx17cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">21.5cmx28.5cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">9.5cmx15cmx2.5cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">7cmx10cmx2cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">15cmx25cmx3cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2.7cm*2.5cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">4cm*2.2cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">1.1cm*3.3cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2.2cm*1.5cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">3cm*2cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2cmx1.5cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2.5cm*2cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2.1cm*1.5cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2cm*1.9cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">3cm*2.3cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">2.9cm2cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">1000ml</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">150ml</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">
                            1m size 150ml 2.l size 500ml 3.l size 500ml
                            </span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">M Size 500ml</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">One Size 1000ml</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">S Size 200ml</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">One Size</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">One Size 50g</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">3.5cm*1.7cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">250g</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">60cmx200cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">98cmx200cm</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">Free Size</span>
                        </label>
                        <label className="container-checkbox text-capitalize">
                          <input type="checkbox" />
                          <span className="checkmark">S</span>
                        </label>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div className="col-lg-9 col-md-12">
              <div className="row">
                <div className="col-lg-9 col-md-12 p-0">
                  <Carousel>
                    <img
                      src="https://www.wemall.shop/images/website/slider/5f2a5939a202f.jpg?format=webp"
                      className="img-fluid"
                    />
                    <img
                      src="https://www.wemall.shop/images/website/slider/5f2a5939a202f.jpg?format=webp"
                      className="img-fluid"
                    />
                    <img
                      src="https://www.wemall.shop/images/website/slider/5f2a5939a202f.jpg?format=webp"
                      className="img-fluid"
                    />
                  </Carousel>
                </div>

                <div className="col-lg-3 col-md-3 pr-0">
                  <div className="post-request text-center bg-white">
                    <div className="body">
                      <h5>Can't find what you want?</h5>
                      <a href="#" className="btn">
                        Post a Request
                        </a>
                    </div>
                  </div>
                </div>
              </div>

              <div className="row m-filter bg-white py-3">
                <div className="col-6 ">
                  <div className="m-btn-filter">
                    <a href="#" data-toggle="collapse" data-target="#mobile-filter">
                      <FormatListBulleted className="filter-con" /> Filter </a>
                  </div>
                </div>

                <div className="col-6">
                  <div className="m-btn-request text-right">
                    <a href="#"> Post Request
                        <FormatListBulleted className="filter-con" /></a>
                  </div>
                </div>

                {/* screen mobile */}
                <div className="col-12 collapse mobile-screen" id="mobile-filter">
                  <div className="left-sidebar p-3">
                    <div className="filter-price">
                      <div className="header-type" data-toggle="collapse" data-target="#demo">
                        <span className="arrow">▼</span>
                        <span className="label">Price</span>
                      </div>
                      <div className="price mt-1 mb-1 collapse show" id="demo">

                        <Slider value={value} onChange={handleChange} valueLabelDisplay="auto" aria-labelledby="range-slider" />

                      </div>
                    </div>

                    <div className="filter-style">
                      <div className="header-type" data-toggle="collapse" data-target="#demo1">
                        <span className="arrow">▼</span>
                        <span className="label text-capitalize">amount</span>
                      </div>
                      <div className="style collapse show" id="demo1">
                        <form action="#">
                          <label className="container-checkbox text-capitalize">
                            <input type="checkbox" />
                            <span className="checkmark">3pairs</span>
                          </label>
                          <label className="container-checkbox text-capitalize">
                            <input type="checkbox" />
                            <span className="checkmark">30cones</span>
                          </label>
                          <label className="container-checkbox text-capitalize">
                            <input type="checkbox" />
                            <span className="checkmark">33 sticks</span>
                          </label>
                        </form>
                      </div>

                      <div className="filter-style">
                        <div className="header-type">
                          <span className="arrow">▼</span>
                          <span className="label text-capitalize">Colors</span>
                        </div>
                        <div className="style">
                          <form action="#">
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                Mixed W, Br, Y, Black
                            </span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                Red And Peach Combination
                            </span>
                            </label>
                          </form>
                        </div>
                      </div>

                      <div className="filter-style">
                        <div className="header-type">
                          <span className="arrow">▼</span>
                          <span className="label text-capitalize">Color</span>
                        </div>
                        <div className="style">
                          <form action="#">
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Purple And Olive</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                Yellow and White Combination
                            </span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Mauve</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Watermelon Color</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Navy Blue</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Gold</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Milk</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Blue</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Green</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Purple</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Olive</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Light Pink</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Light Apple Green</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Freeside</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                White To Black Family With Black Body
                            </span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                Soft Blue Family With Black Body
                            </span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                Natural Family With Black Body
                            </span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                Main Color Red Family
                            </span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Dark Purple</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Brown</span>
                            </label>
                          </form>
                        </div>
                      </div>

                      <div className="filter-style">
                        <div className="header-type">
                          <span className="arrow">▼</span>
                          <span className="label text-capitalize">Color</span>
                        </div>
                        <div className="style">
                          <form action="#">
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Maroon</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Green</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Light Blue</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Dark Blue</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Gray</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">White</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Yellow</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Red</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Brown</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Black</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Light Green</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Natural</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Dark brown</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Pale Yellow-Green</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Green And White</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">White And Brown</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Yellow Cooper</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Cooper</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Purple</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Mixed</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Red-Violet</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Yellowish Green</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Orange</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Light Purple</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Sky Blue</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Dark Red</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Maroon</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Salmon</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Bronze</span>
                            </label>
                          </form>
                        </div>
                      </div>

                      <div className="filter-style">
                        <div className="header-type">
                          <span className="arrow">▼</span>
                          <span className="label text-capitalize">Size</span>
                        </div>
                        <div className="style">
                          <form action="#">
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Free Side</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">12x17 cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Cotton</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">50ml</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">1.80cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">0.90cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">91x180cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">93x180cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">97 cmx180 cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">94x180cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">M</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">L</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">S</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">95 cm x 180 Cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">80 cm x 160 Cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">7 x 24 Cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">7cm x 12cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">6cm x 12cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">96 cm x 180 cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">16.5c x 24.5cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">L</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">L Size 1000ml</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">no size</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">1.30cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">3.30cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Arm Ring 7.80cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">W23.5cm h 7cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">W18cm h 14</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">W 20cm h19</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">W6.5cm h 7cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">3.80cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2.60cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2.30cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">12cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">19cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">92 cm x 180 cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Color</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2.80cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">9cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">98 cm x 180 cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Arm Ring 7.60cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Arm Ring 7.30cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Arm Ring 7.50cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                20 Small Straws 5 Big Straws And 1 Brush
                            </span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">7cmx11cmx2.5cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">65mm x 250mm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                17.5 x 1.4 x 1.7cm
                            </span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">10cmx19cmx3cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">11cmx14cmx3cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">10.5cmx17cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">21.5cmx28.5cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">9.5cmx15cmx2.5cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">7cmx10cmx2cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">15cmx25cmx3cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2.7cm*2.5cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">4cm*2.2cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">1.1cm*3.3cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2.2cm*1.5cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">3cm*2cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2cmx1.5cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2.5cm*2cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2.1cm*1.5cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2cm*1.9cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">3cm*2.3cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">2.9cm2cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">1000ml</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">150ml</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">
                                1m size 150ml 2.l size 500ml 3.l size 500ml
                            </span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">M Size 500ml</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">One Size 1000ml</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">S Size 200ml</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">One Size</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">One Size 50g</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">3.5cm*1.7cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">250g</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">60cmx200cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">98cmx200cm</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">Free Size</span>
                            </label>
                            <label className="container-checkbox text-capitalize">
                              <input type="checkbox" />
                              <span className="checkmark">S</span>
                            </label>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {/* end screen mobile */}
              </div>

              <div className="row cus-p" id="product-list">
                <div className="col-lg-3 mt-4">
                  <div className="grid-item">
                    <div className="product-thumb">
                      <a href="#">
                        <div
                          style={{
                            backgroundImage: `url("https://www.wemall.shop//images/website/product/5f1cd4cf3cc98.jpg")`,
                          }}
                          className="item-bg-img img-pro-best"
                        ></div>
                      </a>

                      <div className="label-item p-3">
                        <div className="favorite text-right">
                          <FavoriteBorder className="icon-favorite" />
                        </div>
                      </div>

                    </div>

                    <div className="product-info p-3">
                      <div className="item-name">
                        <a href="#">
                          <h2>Traditional Tie dye scarf</h2>
                        </a>
                      </div>
                      <div className="sub-info pt-2">
                        <span className="price">$22.00</span>
                        <span className="add-to-cart add text-right">
                          <ShoppingCartOutlined className="card-icon" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-lg-3 mt-4">
                  <div className="grid-item">
                    <div className="product-thumb">
                      <a href="#">
                        <div
                          style={{
                            backgroundImage: `url("https://www.wemall.shop/images/website/product/5f8fa2122790e.jpg")`,
                          }}
                          className="item-bg-img img-pro-best"
                        ></div>
                      </a>
                      <div className="label-item p-3">
                        <div className="favorite text-right">
                          <FavoriteBorder className="icon-favorite" />
                        </div>
                      </div>
                    </div>
                    <div className="product-info p-3">
                      <div className="item-name">
                        <a href="#">
                          <h2>Traditional Tie dye scarf</h2>
                        </a>
                      </div>
                      <div className="sub-info pt-2">
                        <span className="price">$22.00</span>
                        <span className="add-to-cart">
                          <ShoppingCartOutlined className="card-icon" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-lg-3 mt-4">
                  <div className="grid-item">
                    <div className="product-thumb">
                      <a href="#">
                        <div
                          style={{
                            backgroundImage: `url("https://www.wemall.shop//images/website/product/5f1cd4cf3cc98.jpg")`,
                          }}
                          className="item-bg-img img-pro-best"
                        ></div>
                      </a>
                      <div className="label-item p-3">
                        <div className="favorite text-right">
                          <FavoriteBorder className="icon-favorite" />
                        </div>
                      </div>
                    </div>
                    <div className="product-info p-3">
                      <div className="item-name">
                        <a href="#">
                          <h2>Traditional Tie dye scarf</h2>
                        </a>
                      </div>
                      <div className="sub-info pt-2">
                        <span className="price">$22.00</span>
                        <span className="add-to-cart">
                          <ShoppingCartOutlined className="card-icon" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-lg-3 mt-4">
                  <div className="grid-item">
                    <div className="product-thumb">
                      <a href="#">
                        <div
                          style={{
                            backgroundImage: `url("https://www.wemall.shop/images/website/product/5f8fa2122790e.jpg")`,
                          }}
                          className="item-bg-img img-pro-best"
                        ></div>
                      </a>
                      <div className="label-item p-3">
                        <div className="favorite text-right">
                          <FavoriteBorder className="icon-favorite" />
                        </div>
                      </div>
                    </div>
                    <div className="product-info p-3">
                      <div className="item-name">
                        <a href="#">
                          <h2>Traditional Tie dye scarf</h2>
                        </a>
                      </div>
                      <div className="sub-info pt-2">
                        <span className="price">$22.00</span>
                        <span className="add-to-cart">
                          <ShoppingCartOutlined className="card-icon" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-lg-3 mt-4">
                  <div className="grid-item">
                    <div className="product-thumb">
                      <a href="#">
                        <div
                          style={{
                            backgroundImage: `url("https://www.wemall.shop/images/website/product/5f6b0ee34bebb.jpg")`,
                          }}
                          className="item-bg-img img-pro-best"
                        ></div>
                      </a>
                      <div className="label-item p-3">
                        <div className="favorite text-right">
                          <FavoriteBorder className="icon-favorite" />
                        </div>
                      </div>
                    </div>
                    <div className="product-info p-3">
                      <div className="item-name">
                        <a href="#">
                          <h2>Traditional Tie dye scarf</h2>
                        </a>
                      </div>
                      <div className="sub-info pt-2">
                        <span className="price">$22.00</span>
                        <span className="add-to-cart">
                          <ShoppingCartOutlined className="card-icon" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-lg-3 mt-4">
                  <div className="grid-item">
                    <div className="product-thumb">
                      <a href="#">
                        <div
                          style={{
                            backgroundImage: `url("https://www.wemall.shop/images/website/product/5f59f19de63b8.jpg")`,
                          }}
                          className="item-bg-img img-pro-best"
                        ></div>
                      </a>
                      <div className="label-item p-3">
                        <div className="favorite text-right">
                          <FavoriteBorder className="icon-favorite" />
                        </div>
                      </div>
                    </div>
                    <div className="product-info p-3">
                      <div className="item-name">
                        <a href="#">
                          <h2>Traditional Tie dye scarf</h2>
                        </a>
                      </div>
                      <div className="sub-info pt-2">
                        <span className="price">$22.00</span>
                        <span className="add-to-cart">
                          <ShoppingCartOutlined className="card-icon" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-lg-3 mt-4">
                  <div className="grid-item">
                    <div className="product-thumb">
                      <a href="#">
                        <div
                          style={{
                            backgroundImage: `url("https://www.wemall.shop/images/website/product/5f59f19de63b8.jpg")`,
                          }}
                          className="item-bg-img img-pro-best"
                        ></div>
                      </a>
                      <div className="label-item p-3">
                        <div className="favorite text-right">
                          <FavoriteBorder className="icon-favorite" />
                        </div>
                      </div>
                    </div>
                    <div className="product-info p-3">
                      <div className="item-name">
                        <a href="#">
                          <h2>Traditional Tie dye scarf</h2>
                        </a>
                      </div>
                      <div className="sub-info pt-2">
                        <span className="price">$22.00</span>
                        <span className="add-to-cart">
                          <ShoppingCartOutlined className="card-icon" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="col-lg-3 mt-4">
                  <div className="grid-item">
                    <div className="product-thumb">
                      <a href="#">
                        <div
                          style={{
                            backgroundImage: `url("https://www.wemall.shop/images/website/product/5f6b0ee34bebb.jpg")`,
                          }}
                          className="item-bg-img img-pro-best"
                        ></div>
                      </a>
                      <div className="label-item p-3">
                        <div className="favorite text-right">
                          <FavoriteBorder className="icon-favorite" />
                        </div>
                      </div>
                    </div>
                    <div className="product-info p-3">
                      <div className="item-name">
                        <a href="#">
                          <h2>Traditional Tie dye scarf</h2>
                        </a>
                      </div>
                      <div className="sub-info pt-2">
                        <span className="price">$22.00</span>
                        <span className="add-to-cart">
                          <ShoppingCartOutlined className="card-icon" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>
      </div>
    </div>
  );
}

export default Index;