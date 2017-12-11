<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobapps Controller
 *
 * @property \App\Model\Table\JobappsTable $Jobapps
 *
 * @method \App\Model\Entity\Jobapp[] paginate($object = null, array $settings = [])
 */
class JobappsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments']
        ];
        $jobapps = $this->paginate($this->Jobapps);

        $this->set(compact('jobapps'));
        $this->set('_serialize', ['jobapps']);
    }

    /**
     * View method
     *
     * @param string|null $id Jobapp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobapp = $this->Jobapps->get($id, [
            'contain' => ['Departments']
        ]);

        $this->set('jobapp', $jobapp);
        $this->set('_serialize', ['jobapp']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobapp = $this->Jobapps->newEntity();
        if ($this->request->is('post')) {
            $jobapp = $this->Jobapps->patchEntity($jobapp, $this->request->getData());
            if ($this->Jobapps->save($jobapp)) {
                $this->Flash->success(__('The jobapp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jobapp could not be saved. Please, try again.'));
        }
        $departments = $this->Jobapps->Departments->find('list', ['limit' => 200]);
        $this->set(compact('jobapp', 'departments'));
        $this->set('_serialize', ['jobapp']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jobapp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobapp = $this->Jobapps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobapp = $this->Jobapps->patchEntity($jobapp, $this->request->getData());
            if ($this->Jobapps->save($jobapp)) {
                $this->Flash->success(__('The jobapp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jobapp could not be saved. Please, try again.'));
        }
        $departments = $this->Jobapps->Departments->find('list', ['limit' => 200]);
        $this->set(compact('jobapp', 'departments'));
        $this->set('_serialize', ['jobapp']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jobapp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobapp = $this->Jobapps->get($id);
        if ($this->Jobapps->delete($jobapp)) {
            $this->Flash->success(__('The jobapp has been deleted.'));
        } else {
            $this->Flash->error(__('The jobapp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
