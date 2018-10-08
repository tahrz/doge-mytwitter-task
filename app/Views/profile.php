<?php
require_once 'layout/header.php';
require_once 'layout/simple-page-start.php';
require_once 'layout/menu.php';

$session = (new \Framework\SystemSession())->getSession();
$linkN = '';
$subscribeLink = '/subscribe/' . $user->getAttribute('login');
if ($session->get('login') !== $user->getAttribute('login')) {
    $linkN = 'Follow';
}
?>
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-profile">
                        <div class="card-header"
                             style="background-image: url(demo/photos/eberhard-grossgasteiger-311213-500.jpg);"></div>
                        <div class="card-body text-center">
                            <img class="card-profile-img" src="<?= $user['avatar']; ?>">
                            <?php
                            if (isset($user['name'])) {
                                echo '<h3>' . $user['name'] . '</h3>';
                            } else {
                                echo '<h3>' . $user['login'] . '</h3>';
                            }

                            if (isset($user['about'])) {
                                echo '<p class="mb-4">' . $user['about'] . '</p>';
                            }

                            $fname = '';

                            if ($linkN !== '') {
                                $fname = $linkN;
                                if ($subscribeLink !== '') {
                                    echo '<a class="btn btn-outline-primary btn-sm" href="' . $subscribeLink . '">
                                     <span class="fa fa-twitter"></span>' . $fname . '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <?php if ($linkN === '') {?>
                            <form method="POST" style="display: block; width: 100%;">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="content" placeholder="Message">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-secondary">
                                            <b>Send</b>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>

                        <ul class="list-group card-list-group">
                            <?php foreach ($tweets as $tw) { ?>
                                <li class="list-group-item py-5">
                                    <div class="media">
                                        <div class="media-object avatar avatar-md mr-4"
                                             style="background-image: url(<?= $tw->author->avatar ?>)"></div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <small class="float-right text-muted"><?= $tw->updated_at; ?></small>
                                                <h5><?= $tw->author->name ?></h5>
                                            </div>
                                            <div>
                                                <?= $tw->content; ?>
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
        var element = document.getElementById("item1");
        element.classList.add("active");
    </script>

<?php
require_once 'layout/footer.php';
require_once 'layout/page_bottom.php';
?>