<?php
    $pageTitle = 'Login page';

    require_once 'layout/header.php';
    require_once 'layout/pretty-page-start.php';
?>
	<div class="container">
		<div class="row">
			<div class="col col-login mx-auto">

				<form class="card" method="post">
                    <div class="card-body p-6">
                        <div class="card-title">Login to your account</div>

                        <?php if (isset($error)) { ?>
                            <div class="alert alert-warning" role="alert">
                                <?= $error; ?>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                    </div>
                </form>

<div class="text-center text-muted">
	Don't have account yet? <a href="/registration">Sign up</a>
</div>
			</div>
		</div>
	</div>

<?php
    require_once 'layout/page_bottom.php';
?>