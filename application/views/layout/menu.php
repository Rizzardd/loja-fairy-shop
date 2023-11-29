
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <header class="p-3 mb-3 border-bottom bg-header">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 fs-6 fw-semibold ">
                    <li><a href="/home/index" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="/product/index" class="nav-link px-2 link-dark">Products</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                <?php if (!isset($_SESSION["user_email"])) { ?>
                    <a class="btn mr-2 btn-primary" href="/user/login/">Sign In</a>
                    <a class="btn btn-secondary" href="/user/register">Sign Up</a>
                <?php } else { ?>
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            <span><?= $_SESSION['user_name']?></span>
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="/user/index/">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/user/signout" method="post">
                                    <button class="dropdown-item" type="submit" class="button">Sign Out</button>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>

</body>

</html>