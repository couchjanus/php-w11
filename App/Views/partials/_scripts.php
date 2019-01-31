<script src="/assets/jquery.min.js"></script>

<script>
function toggle_panel(panel, background_layer) {

    if (panel.hasClass('show-sidebar')) {
        panel.removeClass('show-sidebar');
        background_layer.removeClass('is-visible');
    } else {
        panel.addClass('show-sidebar');
        background_layer.addClass('is-visible');
    }
}

function buyCancel(target, isTrue) {
    let val1 = isTrue ? 'none' : 'block';
    let val2 = isTrue ? 'block' : 'none';
    let val3 = isTrue ? '40%' : '80%';

    $(target).parents('.product').find('.product-name')
        .css('display', val1);
    $(target).parents('.product').find('.icon').css('display', val1);
    $(target).parents('.product').find('.buy-now').css('display', val1);
    $(target).parents('.product').find(' .product-detail').css('display', val2);
    $(target).parents('.product-menu').css('top', val3);
}

function vanil_buyCancel(target, isTrue) {
    let val1 = isTrue ? 'none' : 'block';
    let val2 = isTrue ? 'block' : 'none';
    let val3 = isTrue ? '40%' : '80%';

    target.parentNode.parentNode.querySelector('.product .product-name').style.display = val1;
    target.parentNode.parentNode.querySelector('.product .icon').style.display = val1;
    target.parentNode.parentNode.querySelector('.product .buy-now').style.display = val1;
    target.parentNode.parentNode.querySelector('.product .product-detail').style.display = val2;
    target.parentNode.parentNode.querySelector('.product-menu').style.top = val3;
}

function vanila_toggle_panel(panel, background_layer) {

    if (panel.classList.contains('show-sidebar')) {
        panel.classList.remove('show-sidebar');
        background_layer.classList.remove('is-visible');
    } else {
        panel.classList.add('show-sidebar');
        background_layer.classList.add('is-visible');
    }
}

function makeProductItem($template, product) {
    $template.querySelector('.product-menu').setAttribute('productId', product["id"]);
    $template.querySelector('.product-name').textContent = product.name;
    $template.querySelector('img').setAttribute('src', '/images/products/' + product.picture);
    $template.querySelector('.product-price').textContent = product["price"];
    $template.querySelector('.product-description').textContent = product["description"];
    return $template;
}

function ReadError(message, cause) {
    this.message = message;
    this.cause = cause;
    this.name = 'ReadError';
    this.stack = cause.stack;
}

function getCartData(shoppingCart) {
    if (localStorage.shoppingCart) {
        try {
            shoppingCart = JSON.parse(localStorage.shoppingCart);
            return shoppingCart;
        } catch (e) {
            if (e.name == 'URIError') {
                throw new ReadError("Ошибка в URI", e);
            } else if (e.name == 'SyntaxError') {
                throw new ReadError("Синтаксическая ошибка в данных", e);
            } else {
                throw e; // пробрасываем
            }
        }
    }
}

function saveCart(shoppingCart) {

    if (window.localStorage) {
        localStorage.shoppingCart = JSON.stringify(shoppingCart);

    }
}

function showCart(shoppingCart) {
    if (shoppingCart.length == 0) {
        console.log("Your Shopping Cart is Empty!");
        return;
    } else {
        console.log("Your Shopping Cart Contains: ", shoppingCart.length, " Items");
        $(".cart-items").empty();
        for (let i in shoppingCart) {
            let $template = $($('#cartItem').html()),
                item = shoppingCart[i];

            $template.find("span.item-quantities").text(item.Quantity);
            $template.find(".item-name").text(item.Product);
            $template.find('.item-price').text(item.Price);
            $template.find('.item-prices').text(item.Quantity * item.Price);
            $template.find('span.qty').attr('style', 'background-image:' + 'url(' + item.Picture + ')');
            $(".cart-items").append($template);
        }
        updateTotal();
    }
}

function updateTotal() {
    var quantities = 0,
        total = 0,

        $cartTotal = $('.cart-total span'),
        items = $('ul.cart-items').children();

    items.each(function(index, item) {
        var $item = $(item);
        total += parseFloat($item.find('.item-prices').text());
        // parseFloat($item.find('.item-quantities').text());
    });

    $cartTotal.text(parseFloat(Math.round(total * 100) / 100).toFixed(2));

    if (total === 0) {

        $('.shopping-cart').fadeOut(500, function() {
            $(this).css({
                'backgroundColor': '',
                'borderRadius': '0%',
                'transform': 'scale(1, 1)'
            });
        });

        $('.shopping-cart').fadeIn(500);
    }
}


$(function() {
    var data = [];
    var url = '/api/shop';

    fetch(url).then((response) => response.json())
        .then((data) => {

            var shoppingCart = [];

            console.log(data);

            if (localStorage.shoppingCart) {
                shoppingCart = JSON.parse(localStorage.shoppingCart);
            }


            // Контент шаблона

            // const $productTemplate = $($('#productItem').html());



            // const $productTemplate = document.getElementById("productItem").content;

            const $productTemplate = document.getElementById("productItem").content;

            data.forEach(function(item) {
                document.querySelector('.grid-container').append(document.importNode(
                    makeProductItem($productTemplate, item), true));
            });

            // data.forEach(function(item) {
            //     $('.grid-container').append(document.importNode(
            //         makeProductItem($productTemplate, item), true));
            // });

            $("#cart-trigger").on('click', function() {
                showCart(shoppingCart);
                toggle_panel($('#cart-sidebar'), $('#shadow-layer'));
            });

            $("#cart-sidebar .remove").on('click', function() {
                toggle_panel($('#cart-sidebar'), $('#shadow-layer'));
            });

            $('.fa-bars').on('click', function(e) {
                e.preventDefault();
                $('.nav-menu').toggleClass('active');
            });


            $(".buy-now").each(function(index, element) {
                $(element).on('click', function(e) {
                    buyCancel(e.target, true);
                });
            });

            $(".cancel").each(function(index, element) {
                $(element).on('click', function(e) {
                    buyCancel(e.target, false);
                });
            });

            // 
            const $template = $($('#cartItem').html());

            $(".add-to-cart").each(function(index, element) {
                $(element).on('click', function(e) {
                    // Поиск элемента с заданным номером
                    var imgToDrag = $(e.target).parents('.product').find("img").eq(0);

                    if (imgToDrag) {
                        var imgClone = imgToDrag.clone()
                            .offset({
                                top: imgToDrag.offset().top,
                                left: imgToDrag.offset().left
                            })
                            .css({
                                'opacity': '0.5',
                                'position': 'absolute',
                                'height': '150px',
                                'width': '150px',
                                'z-index': '100'
                            })
                            .appendTo($('body'))
                            .animate({
                                'top': $('#cart-trigger').offset().top + 10,
                                'left': $('#cart-trigger').offset().left + 10,
                                'width': 75,
                                'height': 75
                            }, 1000);

                        imgClone.animate({
                            'width': 0,
                            'height': 0
                        }, function() {
                            $(this).detach()
                        });
                    }

                    var y = 180;
                    $(e.target).parents('.product-wrapper')
                        .css('transform', 'rotateY(' + y + 'deg)');
                    $(e.target).parents('.grid-item').find('.product-back').addClass(
                        'back-is-visible');
                    $(e.target).parents('.product-wrapper').delay(3000).queue(function() {
                        $(this).css({
                            'transform': 'rotateY(0deg)'
                        }).dequeue();
                        $(e.target).parents('.product').find('p').slideDown();
                        $(e.target).parents('.product').find('.product-menu').css(
                            'top', '80%');
                        $(e.target).parents('.product').find('.product-detail')
                            .toggle();
                        $(e.target).parents('.product').find('.buy-now').toggle();
                        $(e.target).parents('.product').find('.icon').toggle();
                    });

                    let id = $(this).parents('.product-menu').attr("productId");

                    let quantity = $(this).parents(".product-menu").find(".quantity").val();

                    for (let i in shoppingCart) {
                        if (shoppingCart[i].Id == id) {
                            shoppingCart[i].Quantity = parseInt(shoppingCart[i].Quantity) +
                                parseInt(quantity);
                            saveCart(shoppingCart);
                            return;
                        }
                    }

                    let price = $(this).parents(".product-menu").find(".product-price")
                        .text();
                    let name = $(this).parents(".product").children(".product-name").text();
                    let picture = $(this).parents(".product").find("img").attr('src');


                    let item = {
                        Id: id,
                        Product: name,
                        Price: price,
                        Quantity: quantity,
                        Picture: picture
                    };

                    shoppingCart.push(item);
                    saveCart(shoppingCart);
                });

            });

            $('body').on('click', '.cart .clear-cart', function() {
                localStorage.removeItem('shoppingCart');
                $(".cart-items").empty();
                shoppingCart = [];
                updateTotal();

            });

            $('body').on('click', '.cart-items .item-remove', function() {
                let index = $(this).parent().attr("id");
                shoppingCart.splice(shoppingCart.indexOf(shoppingCart.find(x => x.Id === index)),
                    1);
                $(this).parents('li').remove();
                saveCart(shoppingCart);
                updateTotal();
            });

            $('.checkout__trigger').on('click', function() {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'check',
                    success: function(d) {
                        if (d.r == "fail") {
                            window.location.href = d.url;
                        } else {

                            toggle_panel($('#cart-sidebar'), $('#shadow-layer'));
                            $('.main-container').empty();

                            let $template = $($('#order-form').html());
                            let cart_total = $('.cart-total span').text();
                            $template.find("span.price").text('$' + cart_total);
                            $template.find("#sub_price").text('$' + cart_total);

                            var sub_tax = 2.45;
                            var sub_ship = 4.00;
                            var calculated_total = parseFloat(cart_total) + sub_tax +
                                sub_ship;

                            $template.find("#sub_tax").text('$' + parseFloat(sub_tax));
                            $template.find("#sub_ship").text('$' + sub_ship);
                            $template.find("#calculated_total").text('$' +
                                calculated_total);

                            $template.find("#first_name").val(d.first_name);
                            $template.find("#last_name").val(d.last_name);
                            $template.find("#phone_number").val(d.phone_number);
                            $(".main-container").append($template);

                            $('#complete').on('click', function() {
                                $.ajax({
                                        type: 'POST',
                                        url: 'api/cart',
                                        dataType: 'json',
                                        data: {
                                            'cart': JSON.stringify(shoppingCart),
                                            'user_props': $("form#payorder").serialize()
                                        }
                                    })
                                    .then(function(response) {
                                        // console.log('Request success: ', response.json()); 
                                        localStorage.removeItem(
                                            'shoppingCart');
                                        $(".cart-items").empty();
                                        shoppingCart = [];
                                        updateTotal();
                                        $(location).attr('href', 'profile')
                                    })
                                    .catch(function(error) {
                                        console.log(error);
                                    });
                            });
                        }
                    }
                });
            });


            $(".minus").click(function(e) {
                var val = parseInt($(e.target).next().attr('value'));
                $(this).next().attr('value', val - 1);
            });

            $(".plus").click(function(e) {
                var val = parseInt($(e.target).prev().attr('value'));
                $(this).prev().attr('value', val + 1);
            });

            $(".product-detail").each(function(index, element) {
                $(element).on('click', function() {

                    var $ptemplate = $($('#productDetail').html());
                    $ptemplate.find('.product-price').text($(this).parents(".product").find(
                        ".product-price").text());
                    $ptemplate.find('.product-name').text($(this).parents(".product").find(
                        ".product-name").text());

                    $ptemplate.find('img').eq(0).attr('src', 'images/cat3.jpg');


                    $(".grid-container").empty();

                    $(".grid-container").append($ptemplate);

                    let slideIndex = 1;

                    const prev = $(".prev");
                    const next = $(".next");

                    function showSlide(n) {
                        let i;
                        let x = $(".slide");
                        if (n > x.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = x.length
                        }
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }

                        x[slideIndex - 1].style.display = "block";
                    }

                    function nextPrev(n) {
                        showSlide(slideIndex += n);
                    }

                    next.click(function() {
                        nextPrev(1);
                    });

                    prev.click(function() {
                        nextPrev(-1);
                    });

                });
            });


        });

});
</script>