<!-- Aside Area Start -->
<aside id="cart-sidebar" class="cart">
    <a href="" class="remove"><i class="fa fa-times fa-2x"></i></a>
    
    <h2>Cart</h2>
    <!-- cart-items start-->
    <ul class="cart-items">
       
    </ul> 
    <!-- cart-items end -->

    <div class="cart-total">
        <p>Total <span>$00.00</span></p>
    </div> <!-- cart-total -->
    <a href="#" class="checkout-button">Checkout</a>
    <a href="#" class="clear-cart">Clear Cart</a>
</aside> <!-- cart end -->
<!-- Aside Area end -->
<template id="cartItem">
  <li>
    <span class="productInCart"></span>
      <span class="qty">
        <span class="item-quantities">
        </span>
      </span>
      <span class="item-name">
      </span>
      <span class="item-prices">
      </span>
      <a class="item-remove" href="#0"><i class="fa fa-times"></i></a>
  </li>
</template>

<template id="productDetail">

    <figure class="item">
        <h4 class="product-name">Cool Cat</h4>
        <div class="image">
            <img class="slide" />
            <img class="slide" src="images/cat2.jpg" style="display:none;" />
            <img class="slide" src="images/cat3.jpg" style="display:none;" />
            <img class="slide" src="images/cat4.jpg" style="display:none;" />
        </div>

        <div class="rating">
            <button class="prev">&#10094;&#10094;</button>
            <button class="next">&#10095;&#10095;</button>
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                class="fa fa-star"></i>
        </div>
        <figcaption productId="">
            <p class="product-description">
                I'm just very selective about the reality I choose to accept.
            </p>
            <div class="price">
                <s class="old-price">$24.00</s><b class="product-price">$19.00</b>
            </div>
        </figcaption>
        <a href="#" class="add-to-cart">Add to Cart</a>
    </figure>
</template>


<template id="productItem">
    <article class="grid-item">
      <div class="product-wrapper">    
        <div class="product">
          <p class="product-name">Very&nbsp;Big&nbsp;Cat</p>
          <div class="icon">
            <div class="icon-background"></div>
              <span class="shopping-cart">
                <i class="fa fa-shopping-cart fa-2x"></i>
              </span>
          </div>
          <div class="product_picture">
              <img alt="Nice Cat" class="product-picture" />
          </div>
          <span class="product-description"></span>
          <div class="product-menu product-id"  productId=''>
            <div class="product-price">
              9.99
            </div>
            <div class="buy-now">
              Buy now!
            </div>
            <div class="product-detail">
              Detail
            </div>
            
            <div class="how-many">
              <div class="quantity-input">
                <input class="minus btn" type="button" value="-">
                <input class="input-text quantity text" value="3" size="4">
                <input class="plus btn" type="button" value="+">
              </div>
            </div>
            <div class="cancel">
              Cancel
            </div>
            <div class="add-to-cart">
              Add to Cart!
            </div>
          </div>
        </div>
        <div class="product-back">
          <span class="check">
            <i class="fa fa-check fa-4x"></i>
            <p>Success!</p>
          </span>
        </div>   
      </div> 
    </article> 
</template>