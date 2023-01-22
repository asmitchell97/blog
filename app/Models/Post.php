<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post {

    protected string $title;
    protected string $excerpt;
    protected string $creationDate;
    protected string $body;
    protected string $slug;

    public function __construct(string $title, string $excerpt, string $date, string $body, string $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->creationDate = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all(): collection
    {

        // Evolution here of doing the same thing in better ways
        // $files = File::files(resource_path('posts/'))

        // $posts = [];
        // foreach ($files as $file) {
        //     $doc = YamlFrontMatter::parseFile($file);
        //     $posts[] = new Post(
        //         $doc->title,
        //         $doc->excerpt,
        //         $doc->creationDate,
        //         $doc->body(),
        //         $doc->slug
        //     );
        // }

        // $posts = array_map(function ($file) {
        //     $doc = YamlFrontMatter::parseFile($file);
        //     return new Post(
        //         $doc->title,
        //         $doc->excerpt,
        //         $doc->creationDate,
        //         $doc->body(),
        //         $doc->slug
        //     );
        // }, $files);

        // $posts = collect($files)
        //     ->map(function ($file) {
        //         $doc = YamlFrontMatter::parseFile($file);
        //         return new Post(
        //                 $doc->title,
        //                 $doc->excerpt,
        //                 $doc->creationDate,
        //             $doc->body(),
        //                 $doc->slug
        //         );
        //     });


        $posts = collect(File::files(resource_path('posts/')))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file)) // We can double map here to make use of arrow functions
            ->map(fn ($doc) => new Post(
                    $doc->title,
                    $doc->excerpt,
                    $doc->creationDate,
                    $doc->body(),
                    $doc->slug
                )
            )
            ->sortBy(fn ($post) => $post->getCreationDate());

        return $posts; 

        // Must clear cache on new post creation when storing forever
        // To look at the cache, run php artsian tinker cache->get('posts.all')
        // $posts = cache()->rememberForever('posts.all', function () { 
        //     return collect(File::files(resource_path('posts/')))
        //         ->map(fn ($file) => YamlFrontMatter::parseFile($file)) // We can double map here to make use of arrow functions
        //          ->map(fn ($doc) => new Post(
        //             $doc->title,
        //             $doc->excerpt,
        //             $doc->creationDate,
        //             $doc->body(),
        //             $doc->slug
        //         )
        //     )
        //     ->sortBy('creationDate');
        // });

        // return $posts; 
    }

    public static function find(string $slug): Post
    {
        // $path = resource_path("posts/$slug.html");

        // if (!file_exists($path)) {
        //     throw new ModelNotFoundException('Cannot find post for ' . $slug);
        // }

        // $post = cache()->remember("posts.{$slug}", 5, function() use ($path) {
        //     $doc = YamlFrontMatter::parseFile(($path));
        //     $post = new Post(
        //         $doc->title,
        //         $doc->excerpt,
        //         $doc->creationDate,
        //         $doc->body(),
        //         $doc->slug
        //     );
        //     return $post;
        // });

        // Below works when we have public properties
        // return static::all()->firstWhere('slug', $slug);

        // When using protected properties:
        $post = static::all()
            ->filter(fn($post) => $post->getSlug() === $slug)
            ->first();
        return $post;
    }



	/**
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * @param mixed $title 
	 * @return self
	 */
	public function setTitle($title): self {
		$this->title = $title;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getExcerpt() {
		return $this->excerpt;
	}
	
	/**
	 * @param mixed $excerpt 
	 * @return self
	 */
	public function setExcerpt($excerpt): self {
		$this->excerpt = $excerpt;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreationDate() {
		return $this->creationDate;
	}
	
	/**
	 * @param mixed $date 
	 * @return self
	 */
	public function setCreationDate($date): self {
		$this->creationDate = $date;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getBody() {
		return $this->body;
	}
	
	/**
	 * @param mixed $body 
	 * @return self
	 */
	public function setBody($body): self {
		$this->body = $body;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSlug(): string {
		return $this->slug;
	}
	
	/**
	 * @param string $slug 
	 * @return self
	 */
	public function setSlug(string $slug): self {
		$this->slug = $slug;
		return $this;
	}
}