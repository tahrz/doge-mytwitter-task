<?php
    $pageTitle = 'Settings';

    require_once 'layout/header.php';
    require_once 'layout/simple-page-start.php';
    require_once 'layout/menu.php';
?>
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="card" method="post">
                        <div class="card-body">
                            <h3 class="card-title">Edit Profile</h3>
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php if (isset($data)) { echo  $data['name']; } ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if (isset($data)) { echo  $data['email']; } ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">New Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-label">Avatar</div>
                                        <div class="custom-file">
                                            <input type="file" name="avatar" class="custom-file-input"/>
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">About</label>
                                        <textarea rows="5" class="form-control" name="about" placeholder="About"><?php if (isset($data)) { echo  $data['about']; } ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php
    require_once 'layout/footer.php';
    require_once 'layout/page_bottom.php';
?>