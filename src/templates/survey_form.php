<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>FCC: Survey Form</title>
    <!-- <link rel="stylesheet" href="/style/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="bg-image text-white" style="background-color:rgba(red, green, blue, alpha); background-image:linear-gradient(115deg, rgba(3, 60, 245,0.8),rgba(17, 240, 248,0.8)), url('https://cdn.freecodecamp.org/testable-projects-fcc/images/survey-form-background.jpeg'); min-height: 100vh; display: flex;flex-direction: column;">
        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
                <div class="container-fluid height= p-5 bordermb-2 text-light w-50">
                    <a class="navbar-brand" href="/">SurveyForm</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/survey/list">List</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div>
            <?php
                require_once __DIR__ . '/../app/Controller.php';
                require_once $fullPath;
            ?>
        </div>

        <div class="footer sticky-bottom mt-auto" style="">
            <footer id="sticky-footer" class="bg-dark text-white-50">
                <div class="container text-center">
                    <small>Copyright &copy; Your Website</small>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>