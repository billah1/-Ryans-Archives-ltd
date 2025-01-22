@extends('Fornt.master')

@section('title', ' Home')

@section('body')

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <header class="entry-header">
                    <h1 class="entry-title">Blog</h1>
                </header>
            </div>
        </div>
    </div>



    <div class="page-spacer clearfix">
        <div id="primary" class="content-area">
            <div class="container py-5">
                <div class="row">



                    <main id="main" class="site-main col-xs-12 col-sm-8 left-block">
                        <hr>
                        {{-- @foreach ($user as $use) --}}
                        @foreach ($blogs as $blog)
                            <div class="sl-item">


                                <hr>
                                {{-- <div class="sl-left"> <img src="{{ asset($use->image) }}" alt="user"
                                            class="img-circle" /> </div> --}}
                                <div class="sl-right">
                                    <div> <a href="javascript:void(0)" class="link">{{ $blog->user->name }}</a> <span
                                            class="sl-date">5 minutes ago</span>

                                        <div class="m-t-20 row">

                                            <div class="col-md-9 col-xs-12">
                                                <h3>{{ $blog->title }}</h3>
                                                <p class=""><span class="claimedRight"
                                                        maxlength="20"></span>{{ $blog->content }} </p>
                                                <a href="{{ route('details', ['id' => $blog->id]) }}"
                                                    class="btn btn-success text-white"> details </a>
                                            </div>
                                        </div>

                                            @forelse ($blog->comments as $comment)
                                            <div class="comment-box">
                                                <p>
                                                    <strong>{{ $comment->user ? $comment->user->name : 'Anonymous' }}</strong>:
                                                    {{ $comment->title }}
                                                </p>
                                            </div>
                                        @empty
                                            <p>No comments yet.</p>
                                        @endforelse

                                        {{-- <input type="text" placeholder="comments" name="comments">
                                            <button type="submit" class="primary">Send</button> --}}

                                        <form action="{{ route('comments.store') }}" method="POST">
                                            @csrf
                                            <div>
                                                <input type="text" placeholder="Comments" name="title">
                                            </div>
                                            <button type="submit" class="primary">Send</button>
                                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- @endforeach --}}
                        <hr>
                    </main>




















                    <div class="widget-area col-xs-12 col-sm-4 pull-right" id="secondary">
                        <aside class="widget widget_search">
                            <h3>Search bar</h3>
                            <form action="blog.html#" class="search-form" method="get">
                                <input type="search" title="Search for:" name="s" value=""
                                    placeholder="Search …" class="search-field">
                                <input type="submit" value="Search" class="search-submit btn btn-default">
                            </form>
                        </aside>
                        <aside class="widget widget_categories">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                <li><a href="blog.html#">HTML5 and CSS3</a> (1) </li>
                                <li><a href="blog.html#">Java Script Development</a> (1) </li>
                                <li><a href="blog.html#">Music</a> (2) </li>
                                <li><a href="blog.html#">News</a> (2) </li>
                                <li><a href="blog.html#">Online Courses</a> (9) </li>
                                <li><a href="blog.html#">Web Development</a> (2) </li>
                            </ul>
                        </aside>
                        <aside class="widget recent_posts_widget">
                            <h3 class="widget-title">Recent Posts</h3>
                            <ul>
                                <li class="clearfix"> <img src="images/use_img/widget-thumb.jpg" alt="" />
                                    <div class="simi-co">
                                        <h5><a href="blog.html#">Can We Talk? A Real Conversation About Employee
                                                Performance</a></h5>
                                        <p class="meta"><a href="blog.html#">News</a></p>
                                    </div>
                                </li>
                                <li class="clearfix"> <img src="images/use_img/widget-thumb.jpg" alt="" />
                                    <div class="simi-co">
                                        <h5><a href="blog.html#">Create A Professional Music Video For
                                                Songwriters/Musicians</a></h5>
                                        <p class="meta"><a href="blog.html#">Music</a></p>
                                    </div>
                                </li>
                                <li class="clearfix"> <img src="images/use_img/widget-thumb.jpg" alt="" />
                                    <div class="simi-co">
                                        <h5><a href="blog.html#">Tricks and Tips for Adobe Photoshop CS6</a></h5>
                                        <p class="meta"><a href="blog.html#">Online Courses</a></p>
                                    </div>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget widget_tag_cloud">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tagcloud">
                                <a href="blog.html#">Adobe</a>
                                <a href="blog.html#">Courses</a>
                                <a href="blog.html#">Development</a>
                                <a href="blog.html">HTML5</a>
                                <a href="blog.html#">Lorem</a> <a href="blog.html#">Music</a>
                                <a href="blog.html#">Photoshop</a>
                            </div>
                        </aside>
                        <aside class="widget widget_archive">
                            <h3 class="widget-title">Archives</h3>
                            <select onchange="" name="archive">
                                <option value="">Select Month</option>
                                <option value="#"> March 2016 </option>
                            </select>
                        </aside>
                    </div>

                </div>
            </div>
        </div>
    </div>











@endsection
