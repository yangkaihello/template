<?php
namespace mobile\controllers;

use common\models\MemberIndex;
use common\models\MemberUserInfo;
use mobile\forms\RegisterForm;
use mobile\forms\SpeedyForm;
use mobile\support\SessionMemory;
use Yii;
use yii\base\InvalidParamException;
use yii\captcha\Captcha;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use mobile\forms\LoginForm;
use mobile\forms\PasswordResetRequestForm;
use mobile\forms\ResetPasswordForm;
use mobile\forms\SignupForm;
use mobile\forms\ContactForm;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','login-select','login-test'],
                'rules' => [
                    [
                        'actions' => ['signup','login-select','login-test'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
                    'logout' => ['post','get'],
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
                'maxLength' => 4, //生成的验证码最大长度
                'minLength' => 4  //生成的验证码最短长度
            ],
        ];
    }

    public function actionLoginTest()
    {

        return $this->renderPartial("login-test",[

        ]);
    }

    public function actionRegister()
    {
        $memory = new SessionMemory();
        $memory->setLoginBack(Yii::$app->request->referrer);

        return $this->renderPartial("register",[

        ]);
    }

    public function actionLoginSelect()
    {
        $memory = new SessionMemory();
        $memory->setLoginBack(Yii::$app->request->referrer);

        return $this->renderPartial("login-select",[

        ]);
    }

    /**
     * 快捷登陆
     * @return \yii\web\Response
     */
    public function actionSpeedy()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SpeedyForm();

        if ($model->load(Yii::$app->request->get(),"") && $model->agentLogin() ) {
            $memory = new SessionMemory();

            if($memory->hasLoginBack())
            {
                $this->redirect($memory->getLoginBack());
            }else{
                return $this->goBack();
            }
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return true;
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post(),"") && $model->login()) {
            return true;
        } else {
            Yii::$app->response->setStatusCode(401);
        }

        return $model->getOneFirstError();
    }

    public function actionRegisterSubmit()
    {
        $request = Yii::$app->request;

        $form = new RegisterForm();
        if ($form->load($request->post(),"") && $form->validate()){

            $member = new MemberIndex();
            $member->username = $form->username;
            $member->setPassword($form->password);
            $member->status = MemberIndex::STATUS_ACTIVE;
            $member->isWriter = MemberIndex::WRITER_NO;
            $member->type = MemberIndex::TYPE_EMAIL;
            $member->generateAuthKey();
            $member->generatePasswordResetToken();
            $member->save();

            $memberInfo = new MemberUserInfo();
            $memberInfo->member_id = $member->id;
            $member->save();

            $model = new LoginForm();

            if ($model->load(Yii::$app->request->post(),"") && $model->login()) {
                return true;
            }
            return Yii::$app->response->setStatusCode(401)->data = $model->getOneFirstError();
        }

        return Yii::$app->response->setStatusCode(401)->data = $form->getOneFirstError();
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionEmailRegister()
    {
        $code = rand(1000,9999);
        $session = new SessionMemory();
        $session->setRegisterCode($code);

        $request = Yii::$app->request;

        return Yii::$app->mailer->compose()->setFrom([Yii::$app->params["supportEmail"]=>Yii::$app->params["platform.name"]])
            ->setTo($request->post("email"))
            ->setSubject(Yii::$app->params["platform.name"] . "注册验证码")
            ->setTextBody("验证码为：".$code)
            ->send();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $request = Yii::$app->request;
        $model = new SignupForm();
        $login = new LoginForm();
        $member = new MemberIndex();

        if ( $model->load($request->post(),"") && $model->validate() ) {

            $member->setAttributes($model->attributes,false);
            $member->setPassword($model->password);
            $member->generateAuthKey();
            $member->save();

            $login->load(['username'=>$member->username,'password'=>$request->post('password')],"");
            $login->login();

        }else{
            Yii::$app->response->setStatusCode(403);
        }

        return $model->getFirstErrors();
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
