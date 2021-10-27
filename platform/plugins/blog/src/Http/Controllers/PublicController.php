<?php

namespace Botble\Blog\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\ContentTranslations;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Blog\Services\BlogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Response;
use SeoHelper;
use SlugHelper;
use Theme;

class PublicController extends Controller
{
    /**
     * @param Request $request
     * @param PostInterface $postRepository
     * @return Response
     */
    public function getSearch(Request $request, PostInterface $postRepository)
    {
        $query = $request->input('q');

        $title = __('Search result for: ":query"', compact('query'));
        SeoHelper::setTitle($title)
            ->setDescription($title);

        $posts = $postRepository->getSearch($query, 0, 12);

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add($title, route('public.search'));

        return Theme::scope('search', compact('posts'))
            ->render();
    }

    /**
     * @param string $slug
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function getTag($slug, BlogService $blogService)
    {
        $slug = SlugHelper::getSlug($slug, SlugHelper::getPrefix(Tag::class));

        if (!$slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        if (isset($data['slug']) && $data['slug'] !== $slug->key) {
            return redirect()->to(route('public.single', SlugHelper::getPrefix(Tag::class) . '/' . $data['slug']));
        }

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }

    /**
     * @param string $slug
     * @param BlogService $blogService
     * @return RedirectResponse|Response
     */
    public function getPost($slug, BlogService $blogService)
    {
        $slug = SlugHelper::getSlug($slug, SlugHelper::getPrefix(Post::class));

        if (!$slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        if (isset($data['slug']) && $data['slug'] !== $slug->key) {
            return redirect()->to(route('public.single', SlugHelper::getPrefix(Post::class) . '/' . $data['slug']));
        }

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }
//'name',
//'description',
//'content',
//'image',
//'is_featured',
//'format_type',
//'status',
//'author_id',
//'author_type',
    public function getNewPost($id,$slug,$lang, BlogService $blogService)
    {
        echo '<br>ID='.$id;
        echo '<br>Slug='.$slug;
        echo '<br>lang='.$lang;

//        $contents=ContentTranslations::where('content_id','>','900')->get();
//        foreach ($contents as $content){
//            echo '------------<br>name='.$content->name;
//            echo '<br>title='.$content->title;
//            echo '<br>id='.$content->content_id;
//
//            $post=new Post();
//            $post->name=$content->name;
//            $post->content=$content->text;
//            $post->status=BaseStatusEnum::PUBLISHED();
//            $post->description=$content->name;
//            $post->author_id=1;
//            $post->image=$content->photo_name;
//            $post->lang=$content->locale;
//            $post->jusoor_id=$content->content_id;
//            $post->save();
//        }
        // $slug = SlugHelper::getSlug($slug, SlugHelper::getPrefix(Post::class));

        // if (!$slug) {
        //     abort(404);
        // }

        // $data = $blogService->handleFrontRoutes($slug);

        // if (isset($data['slug']) && $data['slug'] !== $slug->key) {
        //     return redirect()->to(route('public.single', SlugHelper::getPrefix(Post::class) . '/' . $data['slug']));
        // }

        // return Theme::scope($data['view'], $data['data'], $data['default_view'])
        //     ->render();
    }

    /**
     * @param string $slug
     * @param BlogService $blogService
     * @return RedirectResponse|Response
     */
    public function getCategory($slug, BlogService $blogService)
    {
        $slug = SlugHelper::getSlug($slug, SlugHelper::getPrefix(Category::class));

        if (!$slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        if (isset($data['slug']) && $data['slug'] !== $slug->key) {
            return redirect()->to(route('public.single', SlugHelper::getPrefix(Category::class) . '/' . $data['slug']));
        }

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }
}
