<div class="customer-review-option">

    <span class="heading">Người dùng đánh giá</span>
    <span class="fa fa-star {{($total>=1) ? "checked" :"" }}"></span>
    <span class="fa fa-star {{($total>=2) ? "checked" :"" }}"></span>
    <span class="fa fa-star {{($total>=3) ? "checked" :"" }}"></span>
    <span class="fa fa-star {{($total>=4) ? "checked" :"" }}"></span>
    <span class="fa fa-star {{($total>=5) ? "checked" :"" }}"></span>
    <p>{{round($total,2)}} sao trên tổng {{count($totalrating)}} đánh giá.</p>
    <hr style="border:3px solid #f1f1f1">

    <div class="row">
        <div class="side">
            <div>5 star</div>
        </div>
        <div class="middle">
            <div class="bar-container">
                <div class="bar-5" style="width:{{count($totalrating)!=0 ? ($fivestar/count($totalrating))*100 : 0}}%"></div>
            </div>
        </div>
        <div class="side right">
            <div>{{$fivestar}}</div>
        </div>
        <div class="side">
            <div>4 star</div>
        </div>
        <div class="middle">
            <div class="bar-container">
                <div class="bar-4" style="width:{{count($totalrating)!=0 ? ($fourstar/count($totalrating))*100 : 0}}%"></div>
            </div>
        </div>
        <div class="side right">
            <div>{{$fourstar}}</div>
        </div>
        <div class="side">
            <div>3 star</div>
        </div>
        <div class="middle">
            <div class="bar-container">
                <div class="bar-3" style="width:{{count($totalrating)!=0 ? ($threestar/count($totalrating))*100 : 0}}%"></div>
            </div>
        </div>
        <div class="side right">
            <div>{{$threestar}}</div>
        </div>
        <div class="side">
            <div>2 star</div>
        </div>
        <div class="middle">
            <div class="bar-container">
                <div class="bar-2" style="width:{{count($totalrating)!=0 ? ($twostar/count($totalrating))*100 : 0}}%"></div>
            </div>
        </div>
        <div class="side right">
            <div>{{$twostar}}</div>
        </div>
        <div class="side">
            <div>1 star</div>
        </div>
        <div class="middle">
            <div class="bar-container">
                <div class="bar-1" style="width:{{count($totalrating)!=0 ? ($onestar/count($totalrating))*100 : 0}}%"></div>
            </div>
        </div>
        <div class="side right">
            <div>{{$onestar}}</div>
        </div>
    </div>
    <br>
    <h4>{{count($chitietsanpham->comment)}} Comments</h4>
    <div class="comment-option">
        @foreach($chitietsanpham->comment as $cm)
            <div class="co-item">
                <div class="avatar-pic">
                    <img src="img/product-single/avatar-2.png" alt="">
                </div>
                <div class="avatar-text">
                    <div class="at-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star{{($cm->star >= 2)?'':"-o" }}"></i>
                        <i class="fa fa-star{{($cm->star >= 3)?'':"-o" }}"></i>
                        <i class="fa fa-star{{($cm->star >= 4)?'':"-o" }}"></i>
                        <i class="fa fa-star{{($cm->star >= 5)?'':"-o" }}"></i>
                    </div>
                    <h5>{{$cm->user->name}} <span>27 Aug 2019</span></h5>
                    <div class="at-reply">{{$cm->NoiDung}}</div>
                </div>
            </div>
        @endforeach
    </div>
    @if(Auth::check())
        @if (count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}} <br>
                @endforeach
            </div>
        @endif
    @if($checkrating->isEmpty())
        <form action="{{route('rating')}}" method="POST" id="idFormRating">
            @csrf
            <fieldset class="rating" style="float: left">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            </fieldset>
            <br><br><br>
            <input type="hidden" name="idctsanpham" value="{{$chitietsanpham->id}}">
            <div class="leave-comment">
                <div class="comment-form">
                    <h4>Leave A Comment</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea placeholder="Messages" name="comment"></textarea>
                            <button type="submit" class="site-btn">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
    @endif
</div>
