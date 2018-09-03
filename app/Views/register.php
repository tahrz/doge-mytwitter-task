<?php
    $pageTitle = 'Registration page';

    require_once 'layout/header.php';
    require_once 'layout/pretty-page-start.php';
?>
	<div class="container">
		<div class="row">
			<div class="col col-login mx-auto">
				<div class="text-center mb-6">
					<img src="./assets/brand/tabler.svg" class="h-6" alt="">
				</div>

				<form class="card" action="" method="post">
	<div class="card-body p-6">
		<div class="card-title">Create new account</div>

		<div class="form-group">
			<label class="form-label">Name</label>
			<input type="text" class="form-control" placeholder="Enter name">
		</div>
		<div class="form-group">
			<label class="form-label">Email address</label>
			<input type="email" class="form-control" placeholder="Enter email">
		</div>
		<div class="form-group">
			<label class="form-label">Password</label>
			<input type="password" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<label class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" />
				<span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
			</label>
		</div>

		<div class="form-footer">
			<button type="submit" class="btn btn-primary btn-block">Create new account</button>
		</div>
	</div>
</form>

<div class="text-center text-muted">
	Already have account? <a href="./login.html">Sign in</a>
</div>
			</div>
		</div>
	</div>

<?php
    require_once 'layout/page_bottom.php';
?>