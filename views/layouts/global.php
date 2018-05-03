<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 06.04.2018
 * Time: 13:32
 */

use app\widgets\Alert;
use yii\helpers\Html;
use app\components\loginWidget;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>




<!--//-->
<!--//-->
<!--//-->


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <?= Html::csrfMetaTags() ?>
    <title>Medic <?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg p-0"><a class="navbar-brand" href="#"><img class="img-fluid d-block d-sm-none" src="/img/logo.png" width="200px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link nav-link--course" href="#">Курси</a></li>
                    <li class="nav-item"><a class="nav-link nav-link--materials" href="#">Матеріали</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                  <?php echo loginWidget::widget()?>
                </ul>
            </div>
        </nav>
    </div>
</header>
<main>
    <div class="medicine">
        <div class="container" style="padding-bottom: 25px;margin-top: 25px;">
<?=$content ?>
        </div>
    </div>
</main>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer__logo"><a href="#"><img src="/img/logo.png" width="150px" height="150px" alt="Logo Pharm Comunnity"></a>
                <div class="footer__brand-name"><span>Pharm</span><hr><span>Community</span><br><small>інтерактивні онлайн курси</small>
                    <ul class="social list-unstyled">
                        <li><a class="social__link" href="#">VK</a></li>
                        <li><a class="social__link social__link--fc" href="#">Facebook</a></li>
                        <li><a class="social__link social__link--youtube" href="#">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center align-items-start">
                <ul class="docs list-unstyled">
                    <li><a class="docs__title" href="#">Документи</a></li>
                    <li><a class="docs__link" href="#">Ліцензія</a></li>
                    <li><a class="docs__link social__link--fc" href="#">Конфіденційність</a></li>
                    <li><a class="docs__link social__link--youtube" href="#">Угода</a></li>
                </ul>
            </div>
            <div class="col-md-5">
                <p>Підпишіться на нашу розсилку. Ми будемо присилати цікаві матеріали та сповіщення про проходження нових тестів</p>
                <form>
                    <div class="form-group">
                        <label for="mailingInput">Email адреса</label>
                        <input class="form-control" id="mailingInput" type="email" aria-describedby="email" placeholder="Введіть свою почту"><small class="form-text text-muted" id="emailHelp">Ми ніколи не будемо ділитися вашою електронною поштою з ким-небудь ще.</small>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="copyright">Всі права захищені | 2018 | Зроблено з любовю <i class="heart"></i></div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>

<script src="/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/js/producer-companies.js"></script>
<script src="/js/app.js"></script>
<!--<script src="/js/jquery-3.3.1.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
<!--<script src="/js/bootstrap.min.js"></script>-->
<!--<script src="/js/jquery.validate.min.js"></script>-->
<!--<script src="/js/jquery.steps.min.js"></script>-->
<!--<script src="/js/wizard.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>-->
<!--<script src="/js/MorphSVGPlugin.min.js"></script>-->
<!--<script src="/js/form.log-in.js"></script>-->
<!--<script src="/js/app.js"></script>-->
</html>
<?php $this->endPage() ?>

<!--//-->
<!--//-->
<!--//-->
