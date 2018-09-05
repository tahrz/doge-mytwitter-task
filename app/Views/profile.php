<?php
    require_once 'layout/header.php';
    require_once 'layout/simple-page-start.php';
    require_once 'layout/menu.php';
?>
			<div class="my-3 my-md-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="card card-profile">
								<div class="card-header" style="background-image: url(demo/photos/eberhard-grossgasteiger-311213-500.jpg);"></div>
								<div class="card-body text-center">
									<img class="card-profile-img" src="demo/faces/male/16.jpg">

									<h3 class="mb-3">Peter Richards</h3>

									<p class="mb-4">
										Big belly rude boy, million dollar hustler. Unemployed.
									</p>

									<button class="btn btn-outline-primary btn-sm">
										<span class="fa fa-twitter"></span> Follow
									</button>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="card">
								<div class="card-header">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Message">
										<div class="input-group-append">
											<button type="button" class="btn btn-secondary">
												<b>Send</b>
											</button>
										</div>
									</div>
								</div>

								<ul class="list-group card-list-group">
									<li class="list-group-item py-5">
										<div class="media">
											<div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
											<div class="media-body">
												<div class="media-heading">
													<small class="float-right text-muted">4 min</small>
													<h5>Peter Richards</h5>
												</div>
												<div>
													Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras
													justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes,
													nascetur ridiculus mus.
												</div>
											</div>
										</div>
									</li>
									<li class="list-group-item py-5">
										<div class="media">
											<div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
											<div class="media-body">
												<div class="media-heading">
													<small class="float-right text-muted">12 min</small>
													<h5>Peter Richards</h5>
												</div>
												<div>
													Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis
													parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
												</div>
											</div>
										</div>
									</li>
									<li class="list-group-item py-5">
										<div class="media">
											<div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
											<div class="media-body">
												<div class="media-heading">
													<small class="float-right text-muted">34 min</small>
													<h5>Peter Richards</h5>
												</div>

												<div>
													Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam
													venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
												</div>

											</div>
										</div>
									</li>
								</ul>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

    <script>
        var element = document.getElementById("item1docke");
        element.classList.add("active");
    </script>

<?php
    require_once 'layout/footer.php';
    require_once 'layout/page_bottom.php';
?>