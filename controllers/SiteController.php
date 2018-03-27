<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Formulario;
use yii\db\Query;
use app\models\Resposta;
use app\models\Pergunta;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $formulario = new Formulario;
        if ($formulario->load(Yii::$app->request->post()))
        {
            $cod_formulario = Yii::$app->request->post()['Formulario']['cod_formulario'];
            return $this->redirect('site/pesquisa?cod_formulario='.$cod_formulario);
        }
        else
        {
            return $this->render('index',[
                'formulario' => $formulario
            ]);
        }

    }
    public function actionPesquisa($cod_formulario)
    {
        $respostas = new Resposta;
        if ($respostas->load(Yii::$app->request->post()))
        {
            $perguntas_respondidas = Yii::$app->request->post()['Pergunta'];            
            foreach($perguntas_respondidas as $index => $resposta)
            {
                if(Resposta::find()->select('cod_pergunta, reposta_certa')->where(['cod_pergunta' => $index, 'cod_resposta' => $resposta])->one())
                {
                    $respostas_cliente[] = Resposta::find()->select('cod_pergunta, reposta_certa')->where(['cod_pergunta' => $index, 'cod_resposta' => $resposta])->one();
                    $proximos_no[] = Pergunta::find()->select('proximo_no')->where(['cod_pergunta' => $index])->one();
                }   
            }
            $textoPesquisa = "select";
            for($i = 0;$i < count($perguntas_respondidas); $i++)
            {
                if($respostas_cliente[$i]['reposta_certa'] == 1)
                    $textoPesquisa .= " true ";
                else
                    $textoPesquisa .= " false ";
                if($proximos_no[$i]['proximo_no'] == 1 && $i < count($perguntas_respondidas) - 1)
                    $textoPesquisa .= " or ";
                elseif($proximos_no[$i]['proximo_no'] == 0 && $i < count($perguntas_respondidas) - 1)
                    $textoPesquisa .= " and ";
            }
            $textoPesquisa .= " as 'Pergunta' from dual";
            $connection = \Yii::$app->db;
            $resposta_final = $connection->createCommand("" . $textoPesquisa);
            $resposta_final = $resposta_final->queryOne();
            if($resposta_final['Pergunta'] == "1")
                $resposta_final = true;
            else
                $resposta_final = false;   
            
            return $this->render('_resposta_final',[ 
                'resposta' => $resposta_final,
                'cod_formulario' => $cod_formulario
            ]);
        }
        return $this->render('_form_perguntas',[
            'cod_formulario' => $cod_formulario,
            'respostas' => $respostas
        ]);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
