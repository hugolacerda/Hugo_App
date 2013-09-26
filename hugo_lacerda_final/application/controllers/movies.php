<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movies extends CI_Controller {

    public function index() {
        
        $this->load->helper('url');
        $this->load->view('bootstrap/header');
        // $this->load->helper(array('form'));
        // $this->load->view('login_view');
        $this->load->library('table');
        //instead of magazines its really movies but renaming it jacked it all up.
        $magazines = array();
        //connect lists to the user who created them!
        $this->load->model(array('Lists'));
        
        //show the lists and the user who created them
       
        $lists = $this->Lists->get();
        foreach ($lists as $list) {
            
            
            // $Rottentomatoes = new Rottentomatoes();
            //trying to connect user_id to lists: might not work!
            // $user = $this->User->get();
            //$user = $this->Getuser->get();
            // var_dump($user);
            // var_dump($list);
            // $user->load($list->user_id);

            $magazines[] = array(
                // $json = $this->Rottentomatoes->test(), 
                // $user->user_name,
                $list->list_name,
                anchor('movies/viewList/' . $list->list_id, 'View ') . '|' .
                anchor('movies/delete/'. $list->list_id, ' Delete'),
                // var_dump(json_decode($json)),
            );
        }

    $this->load->view('magazines', array(
            'magazines' => $magazines,
            ));
    $this->load->view('bootstrap/footer');

	}

	public function addList(){
		// $config = array(
  //           'upload_path' => 'upload',
  //           'allowed_types' => 'gif|jpg|png',
  //           'max_size' => 250,
  //           'max_width' => 1920,
  //           'max_heigh' => 1080,
  //       );

		$this->load->helper('form');
        $this->load->view('bootstrap/header');
		
		//loading both models: this might give a problem!
		$this->load->model('Lists');
		
		$lists = $this->Lists->get();
		// $lists_form_options = array();
        
        //this might not be neccessary but keep checking.
     
        //this is the sam foreach but to get list info!
        // foreach ($lists as $id => $list) {
        //     $lists_form_options[$id] = $list->list_id;
        // }

        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
           array(
               'field' => 'list_name',
               'label' => 'List Name',
               'rules' => 'required',
           ),
        ));

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if (!$this->form_validation->run()){
             $this->load->view('magazine_form');
        }else{
	            $this->load->model('Lists');
	            $lists = new Lists();
	            $lists->list_name = $this->input->post('list_name');
	            // $upload_data = $this->upload->data();
	            

	           //  if (isset($upload_data['file_name'])) {
            //     $issue->issue_cover = $upload_data['file_name'];
            // }
	            $lists->save();
	            $this->load->view('magazine_form_success', array(
	                'lists' => $lists,
	            ));
	        }

        $this->load->view('bootstrap/footer'); 
		
	}

public function addMovie($list_id){
    

    // $config = array(
  //           'upload_path' => 'upload',
  //           'allowed_types' => 'gif|jpg|png',
  //           'max_size' => 250,
  //           'max_width' => 1920,
  //           'max_heigh' => 1080,
  //       );

    $this->load->helper('form');
    $this->load->view('bootstrap/header');
    
    //loading both models: this might give a problem!
    $this->load->model('My_movies');
    
    
    $movies = $this->My_movies->get();
    $lists_form_options = array();
        
        //this might not be neccessary but keep checking.
     
        //this is the sam foreach but to get list info!
        // foreach ($lists as $id => $list) {
        //     $lists_form_options[$id] = $list->list_id;
        // }

        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
           array(
               'field' => 'movie_name',
               'label' => 'Movie Name',
               'rules' => 'required',
           ),
           array(
               'field' => 'movie_number',
               'label' => 'Rank Movie',
               // '1' => '1',
               // '2' => '2',
               // '3' => '3',
               // '4' => '4',
               // '5' => '5',
           ),
           array(
               'field' => 'movie_description',
               'label' => 'Description',
               'rules' => 'required',
               'rows'  => '100',
                'cols' => '50',
           ),

        ));

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if (!$this->form_validation->run()){
             $this->load->view('movie_form', array('list_id' => $list_id));
        }else{
              $this->load->model('My_movies');
              $movie = new My_movies();
              $movie->list_id = $list_id;
              $movie->movie_name = $this->input->post('movie_name');
              $movie->movie_number = $this->input->post('movie_number');
              $movie->movie_description = $this->input->post('movie_description');
              // $upload_data = $this->upload->data();
              

             //  if (isset($upload_data['file_name'])) {
            //     $issue->issue_cover = $upload_data['file_name'];
            // }
              $movie->save();
              $this->load->view('magazine_form_success', array(
                  'movie' => $movie,
              ));
          }

        $this->load->view('bootstrap/footer'); 
    
  }

  

 
	

  public function viewList($list_id){
      $this->load->helper('html');
      $this->load->view('bootstrap/header');
      $this->load->model(array('Lists', 'My_movies'));
      $lists = new Lists();
      $lists->load($list_id);
      if (!$lists->list_id){
          show_404();
      }
      // $movies = new Movie();
      // $movie->load($lists->movie_id);
      $this->load->library('table');
      $moviesList = array();
      $movies = $this->My_movies->getList($list_id);
        foreach ($movies as $movie) {
            
            
            // $Rottentomatoes = new Rottentomatoes();
            //trying to connect user_id to lists: might not work!
            // $user = $this->User->get();
            //$user = $this->Getuser->get();
            // var_dump($user);
            // var_dump($list);
            // $user->load($list->user_id);

            $moviesList[] = array(
                // $json = $this->Rottentomatoes->test(), 
                // $user->user_name,
                // $movie->list_id,
                $movie->movie_number,
                $movie->movie_name,
               
                anchor('movies/viewMovie/' . $movie->movie_id, 'view ') . '|' .
                anchor('movies/delete' . $movie->movie_id , 'Delete'),
                // var_dump(json_decode($json)),
            );
        }

      $this->load->view('moviesList', array(
                'moviesList'=> $moviesList,
                'list_id' => $list_id
            ));
      $this->load->view('bootstrap/footer');
  }

  public function viewMovie($movie_id){
      $this->load->helper('html');
      $this->load->view('bootstrap/header');
      $this->load->model(array('My_Movies','Lists', 'Rottentomatoes'));
        $movie = new My_Movies();
        $movie->load($movie_id);
        
        if (!$movie->movie_id){
            show_404();
        }
        $list = new lists();
        $list->load($movie->list_id);
        $this->load->view('magazine', array(
                    'movie'=> $movie,
                    'list' => $list
                ));
      $this->load->view('bootstrap/footer');
  }

 public function logout(){
   $this->session->unset_userdata('logged_in');
   // session_destroy();
   redirect('index', 'refresh');
 }


  public function delete($list_id){
      $this->load->view('bootstrap/header');
      $this->load->model(array('Lists'));
      $list = new Lists();
        $list->load($list_id);
        if(!$list->list_id){
            show_404();
        }
        $list->delete();
        $this->load->view('magazine_deleted', array(
            'list_id' => $list_id,
        ));
        $this->load->view('bootstrap/footer');
  }

};