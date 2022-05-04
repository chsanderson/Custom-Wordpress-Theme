<!doctype html>
<html lang="en">
	<head>
		<title>CryptoMatrix</title>
		<?php wp_head();?>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/vendor/jquery-3.6.0.js';?>"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/vendor/jquery-ui.min.js';?>"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/vendor/bootstrap.js';?>"></script>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/bootstrap.css';?>">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<!--<script type="text/javascript">
				$(document).ready()
				{
					let cryptoMetrix = getCryptoMetrixInfo();
					$("#TotalCoins").text = cryptoMetrix.data.eth_dominance.toString().substr(0,5);

					//let crypto = await getCryptoMatrixInfo();
					//

				}
				function getCryptoMetrixInfo()
				{
					const APIKey = "0504bf90-7edb-493f-8c78-ad44b888d39e";
					const url = "https://pro-api.coinmarketcap.com/v1/global-metrics/quotes/latest?CMC_PRO_API_KEY=" + APIKey + "";
					return getJSON(url, function(){});
				}

				 function getCryptoMatrixInfo()
				{
					
				}
				
			</script>-->
	</head>
	<body <?php body_class(); ?>>
		<header id="ttr_header" class="site-header bg-dark"><!-- jumbotron sticky-top">-->
			<div class="container d-flex align-items-center justify-content-evenly">
				<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width:auto" >-->
					<?php
					//wp_header();
					/*$url1 = "https://pro-api.coinmarketcap.com/v1/global-metrics/quotes/latest";
					$headers = [
						'Accepts: application.json',
						'X-CMC_PRO_API_KEY:0504bf90-7edb-493f-8c78-ad44b888d39e'
					];
					$request = "{$url1}";
					$curl = curl_init();
					curl_setopt_array($curl, array(
						CURLOPT_URL => $request,
						CURLOPT_HTTPHEADER => $headers,
						CURLOPT_RETURNTRANSFER => 1
					));
					$response = curl_exec($curl);
					//print_r(json_decode($response));
					//curl_close($curl);
					$metrixData = json_decode($response);
					$cryptos;
					$totalMarketCap;
					$dominance;
					//print_r(json_decode($response));
					foreach($metrixData as $key=> $value)
					{
						//print_r($key);
						//echo '<hr/>';
						if($key == "data")
						{
							$cryptos = "Cryptos: " . $value->total_cryptocurrencies;
								//$totalMarketCap = $value1->total_market_cap;
							$totalMarketCap = "Total Market Cap: $" . number_format((float)$value->quote->USD->total_market_cap,2,'.','') . "";
								//print_r("total market cap:". $value->quote->USD->total_market_cap);
							$dominance = "Dominance: eth: " . number_format((float)$value->eth_dominance,2,'.','') . "% btc: " . number_format((float)$value->btc_dominance,2,'.','') . "%";
						}
						//print_r($metrixData['quote']['USD']['total_market_cap']);
					}
					echo '<div id="CoinMarketData" class="container-fluid row col">';
						//echo '<ul style="align-items: center;">';
							echo '<p class="nav-item col" id="TotalCoins">' . $cryptos .  '</p>';
						//echo '</span>
						//<span>';
						//echo '<span>';
								echo '<p class="nav-item col" id="TotalCoins">' . $totalMarketCap .  '</p>';
							//echo '</span>
							//<span>';
							echo '<p class="nav-item col" id="CoinMarketCapTotal">' . $dominance .'</p>';
						//echo '</ul>';
					echo '</div>';
					//echo '</nav>';

						curl_close($curl);
						$url2 = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest";
						$parameters = [
							'start' => '1',
							'limit' => '7',
							'convert'=> 'GBP'
						];
						$qs = http_build_query($parameters);
						
						$headers = [
							'Accepts: application.json',
							'X-CMC_PRO_API_KEY:0504bf90-7edb-493f-8c78-ad44b888d39e'
						];

						$request = "{$url2}?{$qs}";
						$curl = curl_init();
						curl_setopt_array($curl, array(
							CURLOPT_URL => $request,
							CURLOPT_HTTPHEADER => $headers,
							CURLOPT_RETURNTRANSFER => 1
						));
						$response = curl_exec($curl);
						$matrixCoinData = json_decode($response);
						$coinName;
						$coinPrice;
						//print_r($matrixCoinData);
						//echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width:auto" >';
							foreach($matrixCoinData as $key=> $value)
							{
								if($key == "data")
								{
									echo '<br/>';
									echo '<div id="CoinMarketData" class="container-fluid row col">';
									for($i = 0;$i<7;$i++)
									{
										//print_r("i= " . $i);
										//echo '<div class="nav-item" id="CoinMarketData{$i}">';
											//echo '<ul>';
													echo '<p class="nav-item col"id="number{$i}NamePrice">' . $value[$i]->name . ": £" . number_format((float)$value[$i]->quote->GBP->price,2, '.', '') . '</p>';
											//echo '</ul>';
										//echo '</div>';
										//print_r("i= " . $i);
									}
								}
								echo '</div>';
							}
							echo '</nav>';
						echo '</div>';
				echo '<br/>';*/
				?>
					<!--<div class="row ">
						<a id="cryptoMatrixHeaderTitle" class="d-flex justify-content-center"  href="../index.php"> <h1>CryptoMatrix</h1> </a>
					</div>-->
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
						<div class="container-fluid">
							<h1><a class="navbar-brand"><?php bloginfo('name');?></a></h1><!--<img src="?php// echo get_template_directory_uri() .'/images/CryptoMatrix-Branding-1.png';?>" alt="CryptoMatrix"/>--><!--<h1>CryptoMatrix</h1></a>-->
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<?php
								wp_nav_menu( array(
									'theme_location'  => 'primary',
									'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
									'container'       => 'div',
									'container_class' => 'collapse navbar-collapse row text-center',
									'container_id'    => 'bs-example-navbar-collapse-1',
									'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',
									'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
									'walker'          => new WP_Bootstrap_Navwalker(),
									'walker'	=> 'WP_Bootstrap_Navwalker',
								) );
							?>
						</div>
					</nav>
					<br/>
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
						<div class="container-fluid">
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-2" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<?php
								wp_nav_menu( array(
									'theme_location'  => 'shop_menu',
									'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
									'container'       => 'div',
									'container_class' => 'collapse navbar-collapse row text-center',
									'container_id'    => 'bs-example-navbar-collapse-2',
									'menu_class'      => 'navbar-nav mr-auto',
									'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
									'walker'          => new WP_Bootstrap_Navwalker(),
									'walker'	=> 'WP_Bootstrap_Navwalker',
								) );
							?>
						</div>
				</nav>
			</div>
			<h4><?php //bloginfo('description'); ?></h4>
		</header>
<div class="container">
