<?php
    class components_messagers{
        public static function msg($msg, $additionalClass){
            return 
            '<div class="message flex '.$additionalClass.'">
                <div class="message__icon"><i class="fa fa-exclamation"></i></div>
                <div class="message__text">
                    <span>'.$msg.'</span>
                </div>
            </div>';
        }
    }
    class components_sliders{
        public static function imageSlider($array, $additionalClass){
            return 
            '<div class="slide-item '.$additionalClass.'">
                <img src="/img/template/'.$array['img'].'"/>
            </div>';
        }
    }
    class components_posts{
        public static function feed($post){
            return
            '<div class="post card" data-id="'.$post['id'].'">
                <div class="post__author flex">
                    <div class="post__avatar--wrapper">
                        <img src="/img/profiles/'.$post['authorArray']['avatar'].'" class="post__avatar">
                    </div>
                    <div class="post__name--wrapper">
                        <span class="post__name">'.$post['authorArray']['username'].$post['authorArray']['verifiedString'].'</span>
                        <span class="post__date">'.$post['date'].'</span>
                    </div>
                </div>
                <div class="post__img--wrapper">
                    '.$post['imagesString'].'
                </div>
                <pre class="post__content">'.$post['content'].'</pre>
                <div class="post__control">
                    <div class="post__comments-control--wrapper">
                        <span class="post__comments-control" data-id="'.$post['id'].'"></span>
                    </div>
                    <div class="post__dislike--wrapper">
                        <div class="post__dislike '.$post['isLiked'].'" data-id="'.$post['id'].'">
                            <i class="fa fa-thumbs-down"></i>
                            <span class="post__dislike--index">'.$post['likes'].'</span>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }
    $components_messagers = new components_messagers;
    $components_slider = new components_sliders;
    $components_posts = new components_posts;
?>