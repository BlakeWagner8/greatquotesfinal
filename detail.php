<?php
require_once('functions.php');
$index = $_GET['index'];

$name = $users[$index]['name'];
$username = $users[$index]['username'];
$quote = $quotes[$index]['quote'];
$author_firstname = $authors[$quotes[$index]['author_id']]['first_name'];
$author_lastname = $authors[$quotes[$index]['author_id']]['last_name'];

$author = $author_firstname . " " . $author_lastname;

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link href="./vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Great Quotes</title>

    <style>
        .card {
            background-color: #fff;
            border-radius: 2.5rem;
        }

        .detail .quote-icon-left,
        .quote-icon-right {
            font-size: 36px;
        }

        .blockquote-footer cite {
            font-size: 1.25rem;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <div class="container vh-100">
            <div class="row vh-100 detail align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="row card flex-row p-5">
                        <div class="col-sm-3">
                            <div class="animation-card_image">
                                <img class="img-fluid" src=<?= $imgs[random_int(0, 7)] ?>>
                            </div>
                        </div>
                        <div class="col-sm-9 ps-3">
                            <h3 class="animation-card_content_title title-2 fw-bold"><?= $name ?></h3>
                            <p class="text-dark fw-lighter">@<?= $username ?></p>

                            <figure>
                                </figcaption>
                                <blockquote class="blockquote animation-card_content_description p-2 pt-1">
                                    <p><i class="bx bxs-quote-alt-left quote-icon-left text-secondary pe-2"></i><?= $quote ?><i class="bx bxs-quote-alt-right quote-icon-right text-secondary ps-2"></i></p>
                                </blockquote>
                                <figcaption class="blockquote-footer text-end">
                                    <cite title="Source Title"><?= $author ?></cite>
                                </figcaption>
                            </figure>

                            <div id="buttons">
                                <a href="index.php"><button type="button" class="btn btn-outline-primary">Back To Homepage</button></a>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal">Modify</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">Delete</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Edit your favorite quote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="modify.php?index=<?= $index ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="index" id="hiddenField" value="<?= $index ?>" />
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Display name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="col-form-label">Author's first name:</label>
                            <input type="text" class="form-control" id="author_firstname" name="author_firstname" value="<?= $author_firstname ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="col-form-label">Author's last name:</label>
                            <input type="text" class="form-control" id="author_lastname" name="author_lastname" value="<?= $author_lastname ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="quote" class="col-form-label">Quote:</label>
                            <textarea type="text" class="form-control" id="quote" name="quote" value="<?= $quote ?>" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="modify.php?index=<?= $index ?>"><button type="submit" class="btn btn-primary">Edit</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="delete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete quote</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure that you want to delete this quote?</p>
                </div>
                <div class="modal-footer">
                    <a href="delete.php?index=<?= $index ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>