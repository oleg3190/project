<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    @if(isset($breadcrumbs))

                    @foreach($breadcrumbs as $item)
                        @if(!empty($item['url']))
                            <li>
                                <a href="{{$item['url']}}">{{$item['text']}}</a>
                            </li>
                        @else
                            <li class="active">{{$item['text']}}</li>
                        @endif
                    @endforeach

                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>