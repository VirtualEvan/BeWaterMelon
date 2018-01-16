<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        // TODO: Especificar las redireccionas del login cuando haya una portada
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'loginAction' => [
                'controller' => 'ppl_users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'home',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'home',
                'action' => 'index'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'userModel' => 'ppl_users'
                ]
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function isAuthorized($user)
    {
        // Default deny
        return false;
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['setLanguage', 'search']);

        if( !$this->request->session()->read('Config.language') !== NULL){
          I18n::locale($this->request->session()->read('Config.language'));
        }
    }

    public function setLanguage($language){
        $this->request->session()->write('Config.language', $language);

        $this->redirect($this->referer());
    }

    public function search()
    {
        $keyword = $this->request->data['search'];
        $db = ConnectionManager::get('default');
        $collection = $db->schemaCollection();

        switch ($this->request->params['controller']) {
            case "People":
                $controllers = ['pplUsers', 'pplPhds', 'pplPostdocs', 'pplVisitors', 'pplPastPhds', 'pplCollaborators'];
                break;
            case "Publications":
                $controllers = ['pubJournals', 'pplUsers', 'pubConferences', 'pubBooks'];
                break;
            case "Activities":
                $controllers = ['actEditorialBoards', 'actJournals', ['actConferences', ['actConferenceYears']]];
                break;
            case "Research":
                $controllers = [['resProjects', ['resProjectParticipants']], ['resContracts',['resContractParticipants']], 'resPatents'];
                break;
            case "Courses":
                $controllers = ['couSubjects', ['couCourseDegreeSubjects', ['CouSubjects.PplUsers']], 'couDegrees'];
                break;
            case "Collaborations":
                $controllers = ['colMembers', 'colColleagues', 'colGroups', 'colInstitutions', 'colCompanies'];
                break;
            default:
               $controllers = [$this->request->params['controller']];
        }

        foreach ($controllers as $controller) {
            if(is_array($controller)){
                $model = $this->loadModel($controller[0]);

                $columns = $collection->describe($model->table())->columns();

                $conditions = array("OR" => []);
                foreach ($columns as $column) {
                    array_push($conditions['OR'], "$column LIKE '%$keyword%'");
                }

                ${lcfirst($model->alias())} = $model->find('all', ['conditions' => $conditions])->contain($controller[1])->all();
            }
            else {
                $model = $this->loadModel($controller);

                $columns = $collection->describe($model->table())->columns();

                $conditions = array("OR" => []);
                foreach ($columns as $column) {
                    array_push($conditions['OR'], "$column LIKE '%$keyword%'");
                }

                //debug($model->associations());die;
                ${lcfirst($model->alias())} = $model->find('all', ['conditions' => $conditions])->all();
            }

            $this->set(compact(lcfirst($model->alias())));
            $this->set('_serialize', [lcfirst($model->alias())]);
            $this->render('index');
        }
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
