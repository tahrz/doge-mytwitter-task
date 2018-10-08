<?php
    $pageTitle = 'Registration page';

    require_once 'layout/header.php';
    require_once 'layout/pretty-page-start.php';
?>
	<div class="container">
		<div class="row">
			<div class="col col-login mx-auto">
				<form class="card" method="post">
                    <div class="card-body p-6">
                        <div class="card-title">Create new account</div>
                        <?php if (isset($success)) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= $success; ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-warning" role="alert">
                                <?= $error; ?>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <label class="form-label">Login</label>
                            <input type="text" name="login" class="form-control" placeholder="Enter login" value="<?php if (isset($data['login'])) { echo $data['login']; } ?>">

                            <?php if (isset($errors[0]['login'])) { ?>
                                <br/>
                                <div class="alert alert-danger" role="alert">
                                    <?= $errors[0]['login']; ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php if (isset($data['email'])) { echo $data['email']; } ?>">

                            <?php if (isset($errors[0]['email'])) { ?>
                                <br/>
                                <div class="alert alert-danger" role="alert">
                                    <?= $errors[0]['email']; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">

                            <?php if (isset($errors[0]['password'])) { ?>
                                <br/>
                                <div class="alert alert-danger" role="alert">
                                    <?= $errors[0]['password']; ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">Create new account</button>
                        </div>
                    </div>
                </form>

                <div class="text-center text-muted">
                    Already have account? <a href="/login">Sign in</a>
                </div>
			</div>
		</div>
	</div>

<?php
    require_once 'layout/page_bottom.php';
?>