<?php 
	class posts{
		public static function feedGetPostsArray(){
			global $mysqli;
			$user_id = $_SESSION['auth'];
			$subscribtionQuery = $mysqli->query("SELECT * FROM subscribtion WHERE userId = '$user_id'");
			$posts = array();
			while($subscribtion = $subscribtionQuery->fetch_assoc()){
				$subscribtion_id = $subscribtion['secondId'];
				$subscribePostsQuery = $mysqli->query("SELECT id FROM posts WHERE authorId = '$subscribtion_id'");
				while($subscribePosts = $subscribePostsQuery->fetch_assoc()){
					$posts[] = $subscribePosts['id'];
				}
			}
			$userPostsQuery = $mysqli->query("SELECT id FROM posts WHERE authorId = '$user_id'");
			while($userPosts = $userPostsQuery->fetch_assoc()){
				$posts[] = $userPosts['id'];
			}

			arsort($posts);
			return($posts);
		}
		public static function feed($postsArray, $page){
			global $mysqli, $components_posts;
			if($page == null){
				$page = 0;
			}
			$posts = array_slice($postsArray, $page, 10);
			$resultantPosts = [];
			foreach($posts as $post_id){
				// Post get ($post)
				$postQuery = $mysqli->query("SELECT * FROM posts WHERE id = '$post_id'");
				$post = $postQuery->fetch_assoc();
				// Author get ($postAuthor)
				$postAuthor_id = $post['authorId'];
				$postAuthorQuery = $mysqli->query("SELECT * FROM accounts WHERE id = '$postAuthor_id'");
				$postAuthor = $postAuthorQuery->fetch_assoc();
				// Likes ($postLikes)
				$post_id = $post['id'];
				$postLikedQuery = $mysqli->query("SELECT COUNT(id) FROM likes_posts WHERE postId = '$post_id'");
				$postLikes_index = $postLikedQuery->fetch_assoc()['COUNT(id)'];
				$postLikes = $postLikes_index;
				if($postLikes_index == 0){
					$postLikes = '';
				}
				else if($postLikes_index > 1000 && $postLikes_index < 1000000){
					$postLikes = ($postLikes_index/1000).'к';
				}
				else if($postLikes_index > 1000000){
					$postLikes = ($postLikes_index/1000000).'м';
				}
				// Active Like ($postLikes_active)
				$postLikes_active = '';
				$checkIfLikedQuery = $mysqli->query("SELECT COUNT(id) FROM likes_posts WHERE postId = '$post_id' AND userId = '$postAuthor_id'");
				$checkIfLiked = $checkIfLikedQuery->fetch_assoc()['COUNT(id)'];
				if($checkIfLiked != 0){
					$postLikes_active = 'active';
				}
				// Verified user ($postAuthor_verified)
				$postAuthor_verified = '';
				if($postAuthor['verified'] == 1){
					$postAuthor_verified = '<a class="verify" href="/verify"></a>';
				}
				// Images ($postImages)
				$postImagesArray = explode(',', $post['img']);
				$postImages = '';
				if(count($postImagesArray) != 0 && $postImagesArray[0] != null){
					for($i = 0; $i < count($postImagesArray); $i++){
						$postImages .= '<img class="post__img" src="/img/content/'.$postImagesArray[$i].'">';
					}
				}
				$post['likes'] = $postLikes;
				$post['isLiked'] = $postLikes_active;
				$postAuthor['verifiedString'] = $postAuthor_verified;
				$post['authorArray'] = $postAuthor;
				$post['imagesString'] = $postImages;
				$post['content'] = htmlspecialchars($post['content']);
				$post['content'] = str_replace(['[b]', '[/b]', '[title]', '[/title]'], ['<b class="post__bold">', '</b>', '<h3 class="post__title">', '</h3>'], $post['content']);
				$resultantPosts[] = $post;
				echo $components_posts->feed($post);
			}
			
		}
	}
	$posts = new posts;
	if(!defined('projectConstant')){
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
			require_once("connect.php");
			displayPost($_POST['data'], $_POST['userId'], $_POST['profile']);
		}
		else header("Location: /404");
	}
 ?>