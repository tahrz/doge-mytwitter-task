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
                                        <form action="/feed/add" method="POST" style="display: block; width: 100%;">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="data['content']" placeholder="Message">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-secondary">
                                                        <b>Send</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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

                                    <?php  foreach ($tweets as $tw) { ?>
                                        <li class="list-group-item py-5">
                                            <div class="media">
                                                <div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/1.jpg)"></div>
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <small class="float-right text-muted"><?= date('m/d/Y h:m:s', $tw['date_changed']); ?></small>
                                                        <h5><?= $tw['user_id'] ?></h5>
                                                    </div>
                                                    <div>
                                                        <?= $tw['content']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
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