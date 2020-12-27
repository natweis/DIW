<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	class Reviews extends Controller {
		public function __construct(){
			$this -> postModel = $this -> model('Post');
		}

		public function index(){
			$reviews = $this -> postModel -> findAllReviews();

			$data = ['reviews' => $reviews];

			$this -> view('reviews/index', $data);
		}

		public function create(){
			if (!isLoggedIn()){
				header("Location: ".URLROOT."/reviews");
			}

			$data = ['title' => '', 'body' => '', 'titleError' => '', 'bodyError' => ''];

			if ($_SERVER['REQUEST_METHOD'] === 'POST'){
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = ['user_id' => $_SESSION['user_id'], 'title' => trim($_POST['title']), 'body' => trim($_POST['body']), 'titleError' => '', 'bodyError' => ''];

				if (empty($data['title'])){
					$data['titleError'] = 'The title of a post cannot be empty';
				}

				if (empty($data['body'])){
					$data['bodyError'] = 'The body of a post cannot be empty';
				}

				if (empty($data['titleError']) && empty($data['bodyError'])){
					if ($this -> postModel -> addPost($data)){
						header("Location: ".URLROOT."/posts");
					} else {
						die("Something went wrong, please try again!");
					}
				} else {
					$this -> view('posts/create', $data);
				}
			}

			$this -> view('posts/create', $data);
		}

		public function update($id){
			$post = $this -> postModel -> findPostById($id);

			if (!isLoggedIn()){
				header("Location: ".URLROOT."/posts");
			} elseif ($post -> user_id != $_SESSION['user_id']) {
				header("Location: ".URLROOT."/posts");
			}

			$data = ['post' => $post, 'title' => '', 'body' => '', 'titleError' => '', 'bodyError' => ''];

			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = ['id' => $id, 'post' => $post, 'user_id' => $_SESSION['user_id'], 'title' => trim($_POST['title']), 'body' => trim($_POST['body']), 'titleError' => '', 'bodyError' => ''];

				if (empty($data['title'])){
					$data['titleError'] = 'The title of a post cannot be empty';
				}

				if (empty($data['body'])){
					$data['bodyError'] = 'The body of a post cannot be empty';
				}

				if ($data['title'] == $this -> postModel -> findPostById($id) -> title){
					$data['titleError'] == 'At least change the title!';
				}

				if ($data['body'] == $this -> postModel -> findPostById($id) -> body){
					$data['bodyError'] == 'At least change the body!';
				}

				if (empty($data['titleError']) && empty($data['bodyError'])){
					if ($this -> postModel -> updatePost($data)){
						header("Location: ".URLROOT."/posts");
					} else {
						die("Something went wrong, please try again!");
					}
				} else {
					$this -> view('posts/update', $data);
				}
			}

			$this -> view('posts/update', $data);
		}

		public function delete($id){
			$post = $this -> postModel -> findPostById($id);

			if (!isLoggedIn()){
				header("Location: ".URLROOT."/posts");
			} elseif ($post -> user_id != $_SESSION['user_id']) {
				header("Location: ".URLROOT."/posts");
			}

			$data = ['post' => $post, 'title' => '', 'body' => '', 'titleError' => '', 'bodyError' => ''];

			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				if ($this -> postModel -> deletePost($id)){
					header("Location: ".URLROOT."/posts");
				} else {
					die('Something went wrong!');
				}
			}
		}
	}

