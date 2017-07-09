<?php

namespace app\controllers;

use Yii;
use app\models\Phone;
use app\models\PhoneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PhoneController implements the CRUD actions for Phone model.
 */
class PhoneController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Creates a new Phone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param $client_id
     * @return mixed
     */
    public function actionCreate($client_id)
    {
        $model = new Phone();
        $model->client_id = $client_id;
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['client/view', 'id' => $model->client_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Phone model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['client/view', 'id' => $model->client_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Phone model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $clientId = $model->client_id;
        $model->delete();
        return $this->redirect(['client/view', 'id' => $clientId]);
    }

    /**
     * Finds the Phone model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Phone the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Phone::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
