@extends('layout_home.master')
@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                From the Firehose
            </h3>

            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">Sample blog post</h2>
                <p class="blog-post-meta">January 1, 2021 by <a href="#">Mark</a></p>

                <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic
                    typography, lists, tables, images, code, and more are all supported as expected.</p>
                <hr>
            </article>
        </div>
        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic">About</h4>
                    <p class="mb-0">Customize this section to tell your visitors a little bit about your publication,
                        writers, content, or something else entirely. Totally up to you.</p>
                </div>

                <div>
                    <h4 class="fst-italic">Recent posts</h4>
                    <ul class="list-unstyled">
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <img src="https://hoangsao.vn/wp-content/uploads/2023/03/how-m4bc-768x768.jpg" alt=""  width="100%" height="96">
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Example blog post title</h6>
                                    <small class="text-body-secondary">January 15, 2023</small>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
