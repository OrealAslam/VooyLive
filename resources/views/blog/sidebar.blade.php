<div class="sidebar">
    <aside class="widget search_widget">
            <div class="form-group">
                <input type="text" id="search" name="search" placeholder="{{__('blog/blog.search_placeholder')}}" class="form-control typeahead">
            </div>
            <div class="text-center" style="margin-top: 10px;">
                <button onclick="window.location.href = 'search/'+encodeURI($('#search').val())" class="btn btn-primary btn-lg btn-block btn-square" style="background:#EA2349;color:#fff;font-size:3rem;" type="button">{{__('blog/blog.search_go_btn')}}</button>
            </div>
    </aside>
    <aside class="widget category_widget">
        <h4 class="widget-title">{{__('blog/blog.categories_label')}}</h4>
        <ul class="categories">
            @foreach ($categories_results as $category)
            <li><a href="{{ route('category.posts',$category->id) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </aside>
    <aside class="widget post_widget">
        <h4 class="widget-title">{{__('blog/blog.recent_label')}}</h4>
        <div class="recent-posts">
            @foreach ($recentPosts_results as $recentPost)
            <div class="recent-post">
                <a class="recent-post-thumb" href="{{ route('post.view',$recentPost->slug) }}">
                    <img class="img-responsive" src="{{ Storage::disk('s3')->temporaryUrl($recentPost->image, '+2 minutes') }}" alt="{{ $recentPost->title }}">
                </a>
                <a class="post-title" href="{{ route('post.view',$recentPost->slug) }}" style="margin-top:auto!important;">{{ $recentPost->title }}</a>
                <div class="clearfix"></div>
            </div>
            @endforeach
        </div>
    </aside>
    <aside class="widget tag_widget">
        <h4 class="widget-title">{{__('blog/blog.tag_label')}}</h4>
        @foreach ($tags as $tag)
        <div class="tags">
            <a href="{{ route('tag.posts',$tag->id) }}">{{ $tag->name }}</a>
        </div>
        @endforeach
    </aside>
</div>