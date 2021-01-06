import React from "react";
import {
  FavoriteBorder,
  ShoppingCartOutlined,
  HighlightOffOutlined,
  CheckCircleOutlined,
} from "@material-ui/icons";

class Index extends React.Component {
  render() {
    return (
      <div className="favarite mb-5">
        <div className="container-fluid">
          <section className="bg-white p-4">
            <div className="row">
              <div className="col-12">
                <div className="wish-list">
                  <div className="title pb-4">
                    <h3>Wishlist</h3>
                  </div>
                </div>

                <div className="list-cart list-wish scroll-inner">
                  <table className="table table-borderless">
                    <thead>
                      <tr>
                        <th colSpan="2" className="text-left">
                          Item
                        </th>
                        <th scope="col" className="text-center">
                          Price
                        </th>
                        <th colSpan="2" className="text-left">
                          Status
                        </th>
                      </tr>
                    </thead>
                    <tbody id="wish-items-container">
                      <tr>
                        <th scope="row">
                          <div className="remove con-height">
                            <HighlightOffOutlined className="remove-icon" />
                          </div>
                        </th>

                        <td className="item">
                          <div className="product-thumb d-inline-block">
                            <a href="#" className="view-product">
                              <div
                                className="item-bg-img img-product"
                                style={{
                                  backgroundImage: `url("https://www.wemall.shop//images/website/product/5f1cd4cf3cc98.jpg")`,
                                }}
                              ></div>
                            </a>
                          </div>
                          <div className="pro-item-detail con-height d-inline-block">
                            <div className="pro-item-name">
                              <a href="#" className="view-product">
                                <h4 className="item-name one-line">
                                  Men Shirt Short Sleeve (Soeung Kointois)
                                </h4>
                              </a>
                            </div>
                          </div>
                        </td>

                        <td className="price">
                          <div className="item-price con-height text-center">
                            $28.00
                          </div>
                        </td>

                        <td className="status">
                          <div className="item-status con-height">
                            <i className="far fa-check-circle">
                              <CheckCircleOutlined className="check-circel" />
                            </i>{" "}
                            In Stock
                          </div>
                        </td>

                        <td className="btn-add">
                          <div className="btn-add-cart con-height">
                            <a className="ani-smooth add-to-cart">
                              Add to cart
                            </a>
                            <a className="ani-smooth add-to-cart-con" href="#">
                              <ShoppingCartOutlined className="card-icon" />
                            </a>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">
                          <div className="remove con-height">
                            <HighlightOffOutlined className="remove-icon" />
                          </div>
                        </th>

                        <td className="item">
                          <div className="product-thumb d-inline-block">
                            <a href="#" className="view-product">
                              <div
                                className="item-bg-img img-product"
                                style={{
                                  backgroundImage: `url("https://www.wemall.shop/images/website/product/5f1fdb3141be6.jpg")`,
                                }}
                              ></div>
                            </a>
                          </div>
                          <div className="pro-item-detail con-height d-inline-block">
                            <div className="pro-item-name">
                              <a href="#" className="view-product">
                                <h4 className="item-name one-line">
                                  Natural dye, Cotton/Silk (Dark Green)
                                </h4>
                              </a>
                            </div>
                          </div>
                        </td>

                        <td className="price">
                          <div className="item-price con-height text-center">
                            $28.00
                          </div>
                        </td>

                        <td className="status">
                          <div className="item-status con-height">
                            <i className="far fa-check-circle">
                              <CheckCircleOutlined className="check-circel" />
                            </i>{" "}
                            In Stock
                          </div>
                        </td>

                        <td className="btn-add">
                          <div className="btn-add-cart con-height">
                            <a className="ani-smooth add-to-cart">
                              Add to cart
                            </a>
                            <a className="ani-smooth add-to-cart-con" href="#">
                              <ShoppingCartOutlined className="card-icon" />
                            </a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>

          <section className="related-product mt-4 bg-white p-3">
            <div className="row">
              <div className="col-lg-6 col-md-6 col-sm-6">
                <h4 className="title-head">Related product recommendations</h4>
              </div>

              <div className="col-lg-6 col-md-6 col-sm-6">
                <div className="view-all text-right">
                  <a href="#">view all &gt;</a>
                </div>
              </div>
            </div>
          </section>

          <section className="list-product">
            <div className="row cus-p" id="product-list">
              <div className="col-lg-2 mt-4">
                <div className="grid-item">
                  <div className="product-thumb">
                    <a href="#">
                      <div
                        style={{
                          backgroundImage: `url("https://www.wemall.shop/images/website/product/5f1fdb3141be6.jpg")`,
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

              <div className="col-lg-2 mt-4">
                <div className="grid-item">
                  <div className="product-thumb">
                    <a href="#">
                      <div
                        style={{
                          backgroundImage: `url("https://www.wemall.shop/images/website/product/5f1fdb3141be6.jpg")`,
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

              <div className="col-lg-2 mt-4">
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

              <div className="col-lg-2 mt-4">
                <div className="grid-item">
                  <div className="product-thumb">
                    <a href="#">
                      <div
                        style={{
                          backgroundImage: `url("https://www.wemall.shop/images/website/product/5f1fdb3141be6.jpg")`,
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

              <div className="col-lg-2 mt-4">
                <div className="grid-item">
                  <div className="product-thumb">
                    <a href="#">
                      <div
                        style={{
                          backgroundImage: `url("/images/test/Apple Juice.png")`,
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

              <div className="col-lg-2 mt-4">
                <div className="grid-item">
                  <div className="product-thumb">
                    <a href="#">
                      <div
                        style={{
                          backgroundImage: `url("/images/test/Apple Juice.png")`,
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

              <div className="col-lg-2 mt-4">
                <div className="grid-item">
                  <div className="product-thumb">
                    <a href="#">
                      <div
                        style={{
                          backgroundImage: `url("/images/test/509109_o1.jpg")`,
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

              <div className="col-lg-2 mt-4">
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

              <div className="col-lg-2 mt-4">
                <div className="grid-item">
                  <div className="product-thumb">
                    <a href="#">
                      <div
                        style={{
                          backgroundImage: `url("/images/test/Day13-10.jpg")`,
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

              <div className="col-lg-2 mt-4">
                <div className="grid-item">
                  <div className="product-thumb">
                    <a href="#">
                      <div
                        style={{
                          backgroundImage: `url("/images/test/Day11-10.png")`,
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
          </section>
        </div>
      </div>
    );
  }
}

export default Index;
