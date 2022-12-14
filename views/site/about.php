<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap\BootstrapWidgetTrait;
use yii\bootstrap4\Carousel;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>


    <img src = "../images/logo.png">
    <p>0</p>
    <div class="body-content">

        <div class="row">

            <div class="col-lg-4">
                <h2>Heading</h2>

                
               
            </div>
        </div>
<?php
foreach($products as $products){    
echo Carousel::widget([
    'items' => [
        // required, slide content (HTML), such as an image tag
        'content' => '<img src="../images/'.$products->photo.'">',
        // optional, the caption (HTML) of the slide
        'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
        // optional the HTML attributes of the slide container
        'options' => [],
    ]
]);
    
}

?>

</div>
