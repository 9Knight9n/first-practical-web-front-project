<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>first practical web Project</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <main>
            <header>
                <nav>
                    <img src="assets/images/Jevelin_logo_dark.png" alt="Company logo">
                    <ul>
                        <li><a href="pricing">Pricing</a></li>
                        <li><a href="home">Home</a></li>
                        <li><a href="service">Service</a></li>
                        <li><a href="examples/index.html">Examples</a></li>
                        <?php
                            if(isset($_SESSION['token']))
                            {
                                echo '<li><a href="pages/panel/dashboard.html">Panel</a></li>';
                                echo '<li><a href="server/web/logout.php">Log out</a></li>';
                            }
                            else
                            {
                                echo '<li><a href="pages/login.php">Log in</a></li>';
                                echo '<li><a href="pages/signup.php">Sign up</a></li>';
                            }
                        ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3H4c-1.103 0-2 .897-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5c0-1.103-.897-2-2-2zm-1 9h-3.142c-.446 1.722-1.997 3-3.858 3s-3.412-1.278-3.858-3H4V5h16v7h-1z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3H4c-1.103 0-2 .897-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5c0-1.103-.897-2-2-2zm-1 9h-3.142c-.446 1.722-1.997 3-3.858 3s-3.412-1.278-3.858-3H4V5h16v7h-1z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3H4c-1.103 0-2 .897-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5c0-1.103-.897-2-2-2zm-1 9h-3.142c-.446 1.722-1.997 3-3.858 3s-3.412-1.278-3.858-3H4V5h16v7h-1z"></path></svg>
                    </ul>
                </nav>
            </header>


            <section>
                <article >
                    <h5>Main slogan for product</h5>
                    <h1>Organize your idea and future plans with our smart business planner</h1>
                    <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus reprehenderit sapiente tenetur ut. Ad dicta, eligendi fuga, inventore ipsum libero nobis non odit.</h6>
                    <button>Explore the product</button>
                </article>
                <article>
                    <img src="assets/images/Vector-Smart-Object21-copy-2.png" alt="board">
                    <img src="assets/images/Vector-Smart-Object11-copy.png" alt="desk">
                    <img src="assets/images/Vector-Smart-Object112-copy-2.png" alt="user">
                    <img src="assets/images/Vector-Smart-Object111-copy-3.png" alt="flower pot">
                </article>
            </section>

            <section class="features">
                <article>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                    <p>Automate bill payment</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cim eveniet, fugit in ipsam magnam maxime pariatur quae.</p>
                </article>
                <article>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                    <p>Automate bill payment</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cim eveniet, fugit in ipsam magnam maxime pariatur quae.</p>
                </article>
                <article>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                    <p>Automate bill payment</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cim eveniet, fugit in ipsam magnam maxime pariatur quae.</p>
                </article>
                <article>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>
                    <p>Automate bill payment</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cim eveniet, fugit in ipsam magnam maxime pariatur quae.</p>
                </article>
            </section>

            <section class="main-feature">
                <img src="assets/images/undraw_destinations_fpv7.png" alt="woman planning destinations">
                <article>
                    <h5>Main slogan for product</h5>
                    <h1>Organize your idea and future plans with our smart business planner</h1>
                    <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus reprehenderit sapiente tenetur ut. Ad dicta, eligendi fuga, inventore ipsum libero nobis non odit.</h6>
                </article>
            </section>

            <section class="main-feature">
                <img src="assets/images/undraw_social_notifications_ro8o.png" alt="man checking social notifications">
                <article>
                    <h5>Main slogan for product</h5>
                    <h1>Organize your idea and future plans with our smart business planner</h1>
                    <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus reprehenderit sapiente tenetur ut. Ad dicta, eligendi fuga, inventore ipsum libero nobis non odit.</h6>
                </article>
            </section>

            <section class="intro-video">
                <h5>Intro video</h5>
                <h1>About product in short video</h1>
                <div>
                    <style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/2Vy4L/vt/frame" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
                </div>
                <article>
                    <article>
                        <h2>
                            Video quote
                        </h2>
                        <h6>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur cumque enim eveniet id inventore natus numquam obcaecati saepe veritatis vitae?
                        </h6>
                    </article>
                    <article>
                        <h2>
                            List about video
                        </h2>
                        <ul>
                            <li><h5>Ab aspernatur autem cum cumque cupiditate</h5></li>
                            <li><h5>Consectetur adipisicing elit</h5></li>
                            <li><h5>Lorem ipsum dolor sit amet.</h5></li>
                        </ul>
                    </article>
                </article>
            </section>

            <section class="plan">
                <h5>Pricing</h5>
                <h1>Select your plan!</h1>
                <div>
                    <article>
                        <h6>Basic</h6>
                        <h1>$19</h1>
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet blanditiis consequuntur debitis dolore.</h6>
                        <button>choose planning</button>
                    </article>
                    <article class="shadow">
                        <h6>Basic</h6>
                        <h1>$19</h1>
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet blanditiis consequuntur debitis dolore.</h6>
                        <button>choose planning</button>
                    </article>
                    <article>
                        <h6>Basic</h6>
                        <h1>$19</h1>
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet blanditiis consequuntur debitis dolore.</h6>
                        <button>choose planning</button>
                    </article>
                </div>
            </section>

            <section class="feedback">
                <article>
                    <h5>Happy customers!</h5>
                    <br/>
                    <h1>We give our best to make you happy!</h1>
                    <br/>
                    <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa deleniti dolore ducimus eveniet exercitationem explicabo inventore maxime molestias mollitia numquam quasi.</h6>
                </article>
                <img src="assets/images/Group-23-copy.jpg" alt="customers"/>
                <article>
                    <img src="assets/images/kal-visuals-emxAxutgt-A-unsplash.jpg" alt="customer"/>
                    <h5>We take photos to capture moments and people that we love. We are happy when there are more and more people who like what we do.</h5>
                    <p>Geology teacher</p>
                </article>
            </section>

            <section class="subscribe">
                <h1>Subscribe to be up to date with our latest news and stories</h1>
                <form>
                    <input type="password" id="email" placeholder="Please enter your email here...">
                    <button type="submit">Subscribe</button>
                </form>
                <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h6>
            </section>

            <section class="tech">
                <article>
                    <div>
                        <div style="display: flex;position:absolute;padding: 0;z-index: 10;color: transparent">
                            <i class="fas fa-align-justify"></i>
                            <i class="fas fa-angle-double-right"></i>
                        </div>
                        <img src="assets/images/101_0001_alexandru-acea-bbokzTQjB9o-unsplas3h-1024x777.jpg" alt="Tech">
                    </div>
                    <div>
                        <h4>Newest technology</h4>
                        <p>sajjad arvin</p>
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab distinctio in iusto maiores minima officia perferendis qui quibusdam quis, quisquam quos repellendus saepe sit sunt.</h6>

                    </div>
                    <div>
                        <p style="margin: 0">Read more</p>
                    </div>
                </article>
                <article>
                    <div>
                        <div style="display: flex;position:absolute;padding: 0;z-index: 10;color: transparent">
                            <i class="fas fa-align-justify"></i>
                            <i class="fas fa-angle-double-right"></i>
                        </div>
                        <img src="assets/images/101_0001_alexandru-acea-bbokzTQjB9o-unsplas3h-1024x777.jpg" alt="Tech">
                    </div>
                    <div>
                        <h4>Newest technology</h4>
                        <p>sajjad arvin</p>
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab distinctio in iusto maiores minima officia perferendis qui quibusdam quis, quisquam quos repellendus saepe sit sunt.</h6>

                    </div>
                    <div>
                        <p style="margin: 0">Read more</p>
                    </div>
                </article>
                <article>
                    <div>
                        <div style="display: flex;position:absolute;padding: 0;z-index: 10;color: transparent">
                            <i class="fas fa-align-justify"></i>
                            <i class="fas fa-angle-double-right"></i>
                        </div>
                        <img src="assets/images/101_0001_alexandru-acea-bbokzTQjB9o-unsplas3h-1024x777.jpg" alt="Tech">
                    </div>
                    <div>
                        <h4>Newest technology</h4>
                        <p>sajjad arvin</p>
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab distinctio in iusto maiores minima officia perferendis qui quibusdam quis, quisquam quos repellendus saepe sit sunt.</h6>

                    </div>
                    <div>
                        <p style="margin: 0">Read more</p>
                    </div>
                </article>
            </section>

            <section class="partner">
                <img src="assets/images/customer/Partners1.png" alt="partner Branding">
                <img src="assets/images/customer/Partners1.png" alt="partner Branding">
                <img src="assets/images/customer/Partners1.png" alt="partner Branding">
                <img src="assets/images/customer/Partners1.png" alt="partner Branding">
                <img src="assets/images/customer/Partners1.png" alt="partner Branding">
            </section>

            <footer>
                <section>
                    <img src="assets/images/Jevelin_logo_dark.png" alt="Company logo">
                    <h6 style="font-weight: bold;opacity: 1">Follow our latest achievement and information on social media networks</h6>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3H4c-1.103 0-2 .897-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5c0-1.103-.897-2-2-2zm-1 9h-3.142c-.446 1.722-1.997 3-3.858 3s-3.412-1.278-3.858-3H4V5h16v7h-1z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3H4c-1.103 0-2 .897-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5c0-1.103-.897-2-2-2zm-1 9h-3.142c-.446 1.722-1.997 3-3.858 3s-3.412-1.278-3.858-3H4V5h16v7h-1z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3H4c-1.103 0-2 .897-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5c0-1.103-.897-2-2-2zm-1 9h-3.142c-.446 1.722-1.997 3-3.858 3s-3.412-1.278-3.858-3H4V5h16v7h-1z"></path></svg>
                    </div>
                </section>
                <section>
                    <h2 style="font-weight: bold;margin-bottom: 1.5rem">Explore</h2>
                    <h6 style="font-weight: bold">Privacy</h6>
                    <h6 style="font-weight: bold">Privacy</h6>
                    <h6 style="font-weight: bold">Privacy</h6>
                </section>
                <section>
                    <h2 style="font-weight: bold;margin-bottom: 1.5rem">Explore</h2>
                    <h6 style="font-weight: bold">Privacy</h6>
                    <h6 style="font-weight: bold">Privacy</h6>
                    <h6 style="font-weight: bold">Privacy</h6>
                </section>
                <section>
                    <h2 style="font-weight: bold;margin-bottom: 1.5rem">Explore</h2>
                    <h6 style="font-weight: bold">Privacy</h6>
                    <h6 style="font-weight: bold">Privacy</h6>
                    <h6 style="font-weight: bold">Privacy</h6>
                </section>

            </footer>

            <section class="copy-right">
                <p>Copyright 2019 Shufflehoun. All rights reserved.</p>
            </section>
        </main>

<!--        <form action="server/web/test.php">-->

<!--&lt;!&ndash;            <input name="">&ndash;&gt;-->
<!--            <input type="submit">-->

<!--        </form>-->
    </body>
</html>