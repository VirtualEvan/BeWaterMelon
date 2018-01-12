<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * CouCourseDegreeSubjects Controller
 *
 * @property \App\Model\Table\CouCourseDegreeSubjectsTable $CouCourseDegreeSubjects
 *
 * @method \App\Model\Entity\CouCourseDegreeSubject[] paginate($object = null, array $settings = [])
 */
class CouCourseDegreeSubjectsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'view', 'logout']);
    }

    public function isAuthorized($user)
    {
        // Admins can manage users
        if (in_array($this->request->action, ['add', 'edit', 'delete'])) {
            if ($user['rol'] == 'admin') {
                return true;
            }
        }

        // Registered users can edit their own info
        if ($this->request->action === 'edit') {
            $userId = (int)$this->request->params['pass'][0];
            if ($userId == $user['id']) {
                return true;
            }
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CouDegrees', 'CouSubjects']
        ];
        $couCourseDegreeSubjects = $this->CouCourseDegreeSubjects->find('all');

        $this->set(compact('couCourseDegreeSubjects'));
        $this->set('_serialize', ['couCourseDegreeSubjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Course Degree Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->get($id, [
            'contain' => ['CouDegrees', 'CouSubjects']
        ]);

        $this->set('couCourseDegreeSubject', $couCourseDegreeSubject);
        $this->set('_serialize', ['couCourseDegreeSubject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('CouDegrees');
        $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->newEntity();
        if ($this->request->is('post')) {
            $couDegree = $this->CouDegrees->newEntity();
            $couDegree = $this->CouDegrees->patchEntity($couDegree, $this->request->getData()['cou_degree']);
            $this->CouDegrees->save($couDegree);

            foreach($this->request->getData()['cou_subject_id'] as $id_subject){
                $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->newEntity();
                $couCourseDegreeSubject->cou_subject_id = $id_subject;
                $couCourseDegreeSubject->cou_degree_id = $couDegree->id;
                $couCourseDegreeSubject->year =$this->request->getData()['year'];
                if (!$this->CouCourseDegreeSubjects->save($couCourseDegreeSubject)) {
                    $this->Flash->error(__('The degree could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'courses', 'action' => 'index']);
                }
            }
            $this->Flash->success(__('The degree has been saved.'));
            return $this->redirect(['controller' => 'courses', 'action' => 'index']);

        }
        $couDegrees = $this->CouCourseDegreeSubjects->CouDegrees->find('list', ['limit' => 200]);
        $couSubjects = $this->CouCourseDegreeSubjects->CouSubjects->find('list', ['limit' => 200]);
        $this->set(compact('couCourseDegreeSubject', 'couDegrees', 'couSubjects'));
        $this->set('_serialize', ['couCourseDegreeSubject']);

        $this->loadModel('CouSubjects');
        $subjects = $this->CouSubjects->find('all');
        $this->set(compact('subjects'));
        $this->set('_serialize', ['subjects']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Course Degree Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('CouDegrees');
        $couDegree = $this->CouDegrees->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->find('all', [
                'conditions' => ['cou_degree_id' => $id],
                'contain' => []
            ]);

            foreach($couCourseDegreeSubject as $x){
                $this->CouCourseDegreeSubjects->delete($x);
            }

            $couDegree = $this->CouDegrees->patchEntity($couDegree, $this->request->getData()['cou_degree']);
            $this->CouDegrees->save($couDegree);

            foreach($this->request->getData()['cou_subject_id'] as $id_subject){
                //debug($this->request->getData());die;
                $couCourseDegreeSubjectNew = $this->CouCourseDegreeSubjects->newEntity();
                $couCourseDegreeSubjectNew ->cou_subject_id = $id_subject;
                $couCourseDegreeSubjectNew->cou_degree_id = $id;
                $couCourseDegreeSubjectNew->year =$this->request->getData()['year'];
                if (!$this->CouCourseDegreeSubjects->save($couCourseDegreeSubjectNew)) {
                    $this->Flash->error(__('The degree could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'courses', 'action' => 'index']);
                }
            }
            $this->Flash->success(__('The degree has been saved.'));
            return $this->redirect(['controller' => 'courses', 'action' => 'index']);
        }

        $this->set(compact('couDegree'));
        $this->set('_serialize', ['couDegree']);

        $this->loadModel('CouSubjects');
        $subjects = $this->CouSubjects->find('all');
        $this->set(compact('subjects'));
        $this->set('_serialize', ['subjects']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Course Degree Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $couCourseDegreeSubject = $this->CouCourseDegreeSubjects->get($id);
        if ($this->CouCourseDegreeSubjects->delete($couCourseDegreeSubject)) {
            $this->Flash->success(__('The course degree subject has been deleted.'));
        } else {
            $this->Flash->error(__('The course degree subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
