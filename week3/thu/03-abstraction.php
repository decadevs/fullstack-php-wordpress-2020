<?php 
class Post {

    public $title;
    public $body;
    public $postedAt;

    public function __construct(string $title, string $body = '', string $postedAt = '') {
       $this->title = $title;
       $this->body = $body;


       $this->postedAt = $postedAt ? $postedAt : date('Y-m-d H:i:s');

    }

    public function caps() {
        $this->title = strtoupper($this->title);
    }

    public function prefix($prefix = '>') {
        $this->title = $prefix . $this->title;
    }

    public function getTitle(): string {
        return $this->title;
    }


    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getBody(): string {
        return $this->body;
    }

}

 class PostFetcher {

    private $endpoint = 'https://jsonplaceholder.typicode.com';

    private $todos = [];

    private function fetchPosts() {
        $url = file_get_contents($this->endpoint . '/posts');
        $this->todos  = json_decode($url);
    }

    public function getTopTen(): array {
        $this->fetchPosts();
        $topTen =  $this->todos ? array_slice($this->todos, 0, 10) : [];

       /* return array_map(function($post){
            return new Post($post->title, $post->body);
        }, $topTen);*/

  
        for($i=0; $i < count($topTen); $i++) {
            $topTen[$i] = new Post($topTen[$i]->title, $topTen[$i]->body);
        }

        return $topTen;
    }

    

 }



$post = new PostFetcher();

 $topTen = $post->getTopTen();

 foreach($topTen as $index => $p) {

    $p->caps();
    $p->prefix(">> ");
    $index = $index + 1;
     echo $index . ' ' . $p->getTitle() . PHP_EOL;
 }

