<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Departments']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Departments', 'Orders']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $departments = $this->Users->Departments->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'departments'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $departments = $this->Users->Departments->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'departments'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function register(){
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)){
                $this->Flash->success('You are registered and can login');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('You are not registered');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialzie', ['user']);
    }

    public function login()
    {
      
        if($this->Auth->user['id'])//check if user already login
        {
            $this->flash->warning(__('You are already logged in !'));
            return $this->redirect(['controller'=>'Users','action'=>'index']);
        }
        if ($this->request->is('post')) {
            
            $user = $this->Auth->identify();
        
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl('/users'));
            } else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['register']);
        
    }

   public function display(){
        $users = $this->Users->find()
        ->where(['role_id'=>3]);
		$this->set(compact('users'));
        $this->set('_serialize', ['users']);
       
   }

   public function searchmanager()
	{
		if ($this->request->is(['patch','post','put']))
		{$search=$this->request->data['search'];
		 $user=$this->Users->find('all')
		 ->where (['users.role_id'=>1,
				  'users.name LIKE'=> '%' . $search . '%']);
				   $this->set(compact('user'));
				   $this->set('_serialize', ['user']);}
    }

    
    public function listorder($pid = null, $id)
	{
		$title = 'Order List';
		$this->set(compact('title'));
		
		$user = $this->Users->get($id, [
            'contain' => ['Users', 'Orders']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
		
		$order = $this->Orders->Users->get($pid);
		$this->set('order', $order);
        $this->set('_serialize', ['order']);
		
		$this->set('getid', $id);
		$this->set('getpid', $pid);
		
		
        /*
		$users = $this->Companies->Chatrooms->Users->find('list', ['limit' => 200]);
        $this->set(compact('chatroom', 'companies', 'users'));
        $this->set('_serialize', ['chatroom']);
		
		$rest = $this->Companies->Chatrooms->find('all', [
				'contain' => ['Companies', 'Users'],
				'conditions' => ['company_id' => $id]
		]);
		$this->set('rest', $rest);
        $this->set('_serialize', ['rest']);
		
		 $this->paginate = [
            'contain' => ['Companies', 'Users']
        ];
		
        $result = $this->paginate($rest, ['limit' => 2, 'order' => array('created' => 'desc')]);

        $this->set(compact('result'));
        $this->set('_serialize', ['result']);*/
		
	}
	
    
    
   
   

    
}
