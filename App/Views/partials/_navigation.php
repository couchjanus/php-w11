<?php use Core\Helper;?>
<header>
        <nav> <i class="fa fa-bars" aria-hidden="true"></i>
            <ul class="nav-menu">
                <li class="nav-item"><a href="/">Home</a></li>
                <li class="nav-item"><a href="/about">About</a></li>
                
                <li class="nav-item"><a href="/blog">Blog</a></li>
                
                <li class="nav-item"><a href="/guest">Guest Book</a> </li>

                <li class="nav-item"><a href="contact">Contact</a></li>
                <li class="nav-item"><a id="cart-trigger"><i class="fa fa-shopping-cart"></i>&nbsp;Cart</a></li>
                <?php if (Helper::isGuest()) :?>
                    <li class="nav-item"><a href="/auth" id="auth"><i class="fa fa-user"></i>&nbsp;Sign In/Up</a></li>
                <?php else :?>    
                    <li class="nav-item"><a href="/logout" id="logout"><i class="fa fa-user"></i>&nbsp;Sign Out</a></li>
                <?php endif;?>
            </ul>
        </nav>
</header>