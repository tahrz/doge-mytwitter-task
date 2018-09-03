<?php
    $pageTitle = 'Global feed';

    require_once 'layout/header.php';
    require_once 'layout/simple-page-start.php';
    require_once 'layout/menu.php';
?>
			<div class="my-3 my-md-5">
				<div class="container">
					<div class="row">
						<div class="offset-lg-3 col-lg-6">
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
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h5 style="margin-bottom: 0px;"><i class="fa fa-edit"></i> Feel free to add new message!</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!--
									<li class="list-group-item py-5">
										<div class="media">
											<div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/1.jpg)"></div>
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
									</li> -->
								</ul>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

    <script>
        var element = document.getElementById("item2");
        element.classList.add("active");
    </script>

<?php
    require_once 'layout/footer.php';

    require_once 'layout/page_bottom.php';
?>