<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Launch</title>
    @include('layouts.inc.general.css-links')
</head>

<body class="wt-login">
    <div id="wt-wrapper" class="wt-wrapper wt-haslayout">
        <div class="wt-contentwrapper">
            <div class="wt-haslayout wt-innerbannerholder">
				<div class="container">
					<div class="row justify-content-md-center">
						<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
							<div class="wt-innerbannercontent">
							<div class="wt-title"><h2>Session Expired</h2></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
				<div class="mt-3">
					<div class="container">
						<div class="row justify-content-md-center">
							<div class="col-xs-12 col-sm-12 col-md-10 push-md-1 col-lg-8 push-lg-2">
								<div class="wt-404errorpage">
									<div class="wt-404errorcontent">
										<div class="wt-title">
											<h3>Your session has expired due to inactivity</h3>
										</div>
										<div class="wt-description">
											<p>If you want to continue, please  <a href="{{url('login')}}">login</a> again</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
        </div>
    </div>
    @include('layouts.inc.general.script-links')
</body>

</html>
