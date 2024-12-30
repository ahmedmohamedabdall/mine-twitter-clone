                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> followers {{ $userData->followers_count }}</a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $userData->ideas_count }}</a>


                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1 ms-2">
                        </span> {{ $userData->comments_count}}</a>

     <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-thumbs-up me-1 ms-2">
                        </span> {{ $userData->likes_count }}</a>

                       
                </div>