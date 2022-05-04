<?php get_header();?>

    <div id="Subscribers" class="img-fluid">
        <div class="col text-center">
            <h4>Your Crypto Journey Begins Here...</h4>
        </div>
        <div class="col text-center">
            <span class="align-middle">
                <p>
                    For the first time in history the average person can invest in something BEFORE Wall Street. Crypto-Matrix has experienced first hand the good, the bad and the huge potential gains during our time invested in Crypto.
                </p>
                
                <p>
                    Crypto-Matrix was founded with the sole focus of educating people about Blockchain, the underlying technology on which Bitcoin and other Cryptocurrencies are built, and helping them to invest safely and smartly.
                </p>
                
                <p>
                    If you missed out on the dotcom bubble then don't make the same mistake twice. Take our FREE INTRO TO CRYPTO CLASS and start learning today!
                </p>
            </span>
        </div>
    </div>

    <div id="About" class="container row panel panel-default text-center">
        <div class="row text-center">
            <span class="col align-middle">
                <h4>About Crypto-Matrix</h4>
            </span>
        </div>
        <div class="row text-center">
            <span class="col align-middle">
                <p>
                    Our team at Crypto-Matrix have been involved in cryptocurrency since its inception in 2008. Our knowledge & expertise has helped hundreds of people on their journey to financial freedom.
                </p>

                <p>
                    At Crypto-Matrix we focus on fundamentals and credentials of crypto projects through our ongoing in-depth analysis. The success of our tried and tested method for uncovering gems in the crypto space was one of the main reasons that Crypto-Matrix was founded.
                </p>
                
                <p>
                    Crypto-Matrix is a following. Crypto-Matrix is for the People.  Our mission is simple - help generate wealth for the average person. 
                </p>     
            </span>       
        </div>
    </div>

    <div id="Social_Feed" class="container row panel panel-default">
        <div class="row content">
            <h3 class="text-center">For all the latest Crypto news, updates, market trends and signals! Follow us on Twitter</h3>
        </div>
        <div id="twitter_Widget_holder" class="row justify-content-center">
            <a class="twitter-timeline" data-width="800" data-height="600" data-theme="light" href="https://twitter.com/crypto__matrix?ref_src=twsrc%5Etfw">Tweets by crypto__matrix</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
    
    <div id="Enroll" class="container row panel panel-default text-center">
        <h4>Why Enroll In Our Classes</h4>
        <div class="row">
            <div class="col">
                <h5>Classroom Training</h5>
                <br/>
                <p>
                    Classroom based training is the most effective way to learn. Centrally located in glasgow with on-site parking. 
                </p>
            </div>
            <div class="col">
                <h5>Online Classes</h5>
                <br/>
                <p>
                    Book online classes and learn all about Crypto in the comfort of your own home!
                </p>
                <p>
                    Join the live class on your own or as part of a group.
                </p>
                <p>
                    Learn all about Crypto and how to get started!
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5>Group Sessions</h5>
                <br/>
                <p>
                    Learn with Friends! The path ahead may be easier with a friend onboard.
                </p>
                <p>
                    Group sessions can lead to very insightful conversations and can speed up the learning process.
                </p>
            </div>
            <div class="col">
                <h5>One To One Sessions</h5>
                <br/>
                <p>
                    One to one sessions can be held face to face in the Crypto-Matrix Office or via Video Call. Ideal for new investors seeking help with setting up wallets and making their first purchase.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5>Book Free Class</h5>
                <br/>
                <!--<form>
                     This is where the button for booking Classes would be put
                </form>-->
            </div>
        </div>
    </div>
    <div id="WhatYouWillLearn" class="container row panel panel-default">
        <div class="row">
            <h4>Services</h4>
            <p>Here are Crypto-Matrix We offer a range of services including:</p>
        </div>
        <div class="col">
            <ul>
                <li>Classroom/Live Online Classes</li>
                <li>What Is Blockchain & Crypto?</li>
                <li>The Real Truth About Money</li>
                <li>Investment Strategies</li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li>Wallet Transactions Security</li>
                <li>Picking The Right Coins</li>
                <li>Portfolio Review/Management</li>
            </ul>
        </div>
    </div>
    <br/>
    <div id="Blogs" class="container d-flex justify-content-center">
        <span>
        <div class="row">
            <h4 class="col align-middle">Blogs</h4>
        </span>
        <span>
        <div id="Guides" class="col justify-content-center">
            <div class="justify-content-center align-items-middle" style="width:auto">
                <h4>Guides</h4>
                <p></p>
            </div>
            <div id="GuidesCarousel" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                    <?php /*echo 'hi';*/ echo do_shortcode("[categoryguideposts]");/* 
                    /*$args = array(
                        'showposts' => '5',
                        'category_name'=> 'guides'
                    );
                    $the_query = new WP_Query($args);//array('category_name' => 'Guides'));
                    if( $the_query->have_posts() ):
                        while ($the_query->have_posts()) :
                            $active_class = (0 === $the_query->current_post) ? 'active': '';
                            echo '<div class="carousel-item">';
                            echo '<img src="" class="d-block w-100" alt="">';
                            $the_query->the_post();
                    
                            echo'<h5>'. get_the_title() .' </h5>';
                        endwhile;
                        echo '</div>';
                        wp_reset_postdata();
                    endif;
                    ?>
                    <?php
                    /*if($the_query->have_posts()): while($the_query->have_posts()) : $the_query->the_post();?>
                    
                            <h5><?php get_the_title(); ?></h5>
                            <?php  new_excerpt_more(); ?>
                    <?php endwhile; endif; */?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#GuidesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#GuidesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div>
            </div>
        </div>
        </span>
        <span>
        <hr/>
        <div id="firstPerson" class="col justify-content-center">
            <div class="justify-content-center align-items-middle" style="width:auto">
                <h4>First Person</h4>
            </div>
            <div id="firstpersonCarousel" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                    <?php 
                    echo do_shortcode("[categoryfirstpersonposts]");
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#firstpersonCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#firstpersonCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div>
            </div>
        </div>
        </span>
        <span>
        <hr/>
        <div id="uncategorised" class="col justify-content-center">
            <div class="justify-content-center align-items-middle" style="width:auto">
                <h4>Uncategorised</h4>
            </div>
            <div id="uncategorisedCarousel" class=" carousel slide" data-bs-ride="carousel">                
                <div class="carousel-inner">
                    <?php 
                    echo do_shortcode("[categoryuncategorisedposts]");
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#uncategorisedCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#uncategorisedCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div>
            </div>
        </div>
        </span>
        <span>
        <hr/>
        <div id="Resources"class="col justify-content-center">
            <div class="justify-content-center align-items-middle" style="width:auto">
            <h4>Resources</h4>
            </div>
            <div id="ResourcesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php echo do_shortcode("[categoryresourcesposts]");
                /*$the_query = new WP_Query(array('category_name' => 'Resources'));
                if($the_query->have_posts()) : while(have_posts()) : the_post();*/?>
                        <!--<h5><?php //the_title();?></h5>-->
                        <?php /*the_content();*/ ?>
                <?php /*endwhile; endif; */?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#ResourcesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#ResourcesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div>
            </div>
        </div>
        </div>
        <span>
    </div>
    <div id="Quotes" class="container panel panel-default d-flex justify-content-center">
        <?php
           // echo "<p> Quotes Go Here </p>";
        ?><div id="QuotesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active align-items-middle">
                <h3>"Financial freedom is available to those who learn about it and work for it."</h3>
                <p>Robert Kiyosaki</p>
            </div>
            <div class="carousel-item align-items-middle">
                <h3>“Don’t be addicted to money. Work to learn, don’t work for money. Work for knowledge.”</h3>
                <p>Robert Kiyosaki</p>
            </div>
            <div class="carousel-item align-items-middle">
                <h3> “Everything the working class has been told to do, the rich do not do. That is my message.</h3>
                <p>Robert Kiyosaki</p>
            </div>
            <div class="carousel-item align-items-middle">
                <h3>"If you're still doing what mommy and daddy said for you to do (Go to school, get a job, and save money), you're losing."</h3>
                <p>Robert Kiyosaki </p>
            </div>
            <div class="carousel-item align-items-middle">
                <h3>“Here’s the dirty little secret: Fiat currency is designed to lose value. Its very purpose is to confiscate your wealth and transfer it to the government. Each time the government prints a new dollar and spends it, the government gets the full purchasing power of that dollar.”</h3>
                <p>Michael Maloney, Guide To Investing in Gold & Silver: Protect Your Financial Future</p>
            </div>
            <div class="carousel-item align-items-middle">
                <h3> “Everything the working class has been told to do, the rich do not do. That is my message</h3>
                <p>Robert Kiyosaki </p>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#ResourcesCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#ResourcesCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<?php get_footer();?>

<?php/*Alt Coin Session Index	
25% BTC Season vs 75% ALT Season	
	
3Commas	
"14.50 per month starter pack

Traders
Test Your Strategy

Paper Trading with Real Money - Fundamental Analysis Practice
No order book stimulation"	
	
Google Trends	
BTC &ETH Search Terms on Google	
	
Messari	
"Exchange volumes

Deeper research tool

Hidden Gems
Trending In Markets
Data Driven Approach
Filter By Sectors"	
	
Trading View	
Ideas Tab on traders positions and targets	
	
BYBIT	
"Greyscale Data - Fund Flow

Future Market Insights

Derivatives Market Data - Longs vs Shorts

Liquiditors Across Markets

How Many Got REKT?"	
	
Coin Market Cap	
"All Events for Coins

Community Driven"	
	
CryptoQuant	
"All Exchanges Net Flow - Deposits & Withdrawals

Miners - Moving Funds?"	
	
Glassnode	
"New & Active Addresses

On-Chain Indicators - BTC & ETH - Bottom & Tops

NUPL - Circ.Supply - Lost or Profit"	
	
Comdance	
"Hash Rates

Transactions

Adoption In Countries"	
	
Crypto Panic	
"News Aggregator

Latest News/Events"	*/?>