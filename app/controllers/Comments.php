<?php
class Comments extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      return redirect('authentification/login');
    }
    $this->commentModel = $this->model('Comment');
  }

  public function index()
  {
    $data = [
      'title' => 'Camagru',
      'description' => 'Camagru Project is loding.......'
    ];

    $this->view('pages/index', $data);
  }

  public function addcomment()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
      $comment = trim(preg_replace('/\s+/', ' ', $_POST['comment']));
      if (isset($comment) && !empty($comment) && isset($_POST['id_post']) && !empty($_POST['id_post'])) {

        if (strlen($comment) != 0 && strlen($comment) <= 150) {
          if ($this->commentModel->addcomment($comment, $_POST['id_post'], $_SESSION['user_id'])) {
            return redirect('posts/viewpost?id_post=' . $_POST['id_post']);
          } else {
            flash('error-comment', 'Your Comment was not created plz retry again', 'notification is-warning is-light');
            return redirect('posts/viewpost?id_post=' . $_POST['id_post']);
          }
        } else {
          flash('error-comment', 'Your Comment length is not valid', 'notification is-warning is-light');
          return redirect('posts/viewpost?id_post=' . $_POST['id_post']);
        }
      } else {
        flash('error-comment', 'Your Comment was not created plz retry again and be sure to fill you comment', 'notification is-warning is-light');
        return redirect('posts/viewpost?id_post=' . $_POST['id_post']);
      }
    } else {
      return redirect('posts/error');
    }
  }

  public function deletecomment()
  {
    if (isset($_GET['id_comment']) && !empty($_GET['id_comment']) && is_numeric($_GET['id_comment'])  && isset($_GET['id_post']) && !empty($_GET['id_post']) && is_numeric($_GET['id_post'])) {
      $owner_info = $this->commentModel->get_info_owner_post($_GET['id_post']);
      if($owner_info && $owner_info->id_user == $_SESSION['user_id'])
      {
          if ($this->commentModel->deletecomment($_GET['id_comment'],$_GET['id_post'])) {
            return redirect('posts/viewpost?id_post=' . $_GET['id_post']);
            }
           else {
          return redirect('posts/error');
          }
      }
      else 
        return redirect('posts/error');

    }
    else 
    return redirect('posts/error');
  }
}
