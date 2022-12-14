<?php

namespace app\controllers;

use app\models\UserSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Products;
use app\models\ProductsCreateForm;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use app\models\Category;


class AdminController extends Controller
{
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->admin != 1){
            $this->redirect(['/site/login']);
            return false;
        }

        if (!parent::beforeAction($action)) {
            return false;
        }


        return true; // or false to not run the action
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new ProductsCreateForm();

            if ($model->load(Yii::$app->request->post())) {

                $model->photo = UploadedFile::getInstance($model, 'photo');
                $newFileName = md5($model->photo->baseName . '.' . $model->photo->extension. time()).'.'. $model->photo->extension;
                $model->photo->saveAs('@app/web/images/' . $newFileName); 
                $model->photo = $newFileName;  
                $model->save();
                return $this->redirect(['../web/products']);
            }

            $categories = Category::find()->all();
            $categories = ArrayHelper::map($categories, 'id', 'name');
        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

}