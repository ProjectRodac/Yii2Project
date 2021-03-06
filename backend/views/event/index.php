<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event', ['created'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('All Events', ['indexsum'], ['class' => 'btn btn-info']) ?>
    </p>

<?php
        Modal::begin([
                'header'=>'<h4>Event</h4>',
                'id' => 'modal',
                'size'=>'modal-lg',
            ]);
     
        echo "<div id='modalContent'></div>";
     
        Modal::end();
    ?>

<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
  ));
?>

</div>