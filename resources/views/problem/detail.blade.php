@extends('layouts.app')

@section('template')

<style>
    paper-card {
        display: block;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
        border-radius: 4px;
        transition: .2s ease-out .0s;
        color: #7a8e97;
        background: #fff;
        padding: 1rem;
        position: relative;
        border: 1px solid rgba(0, 0, 0, 0.15);
        margin-bottom: 2rem;
    }

    paper-card:hover {
        box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 40px;
    }

    fresh-container {
        display: block;
        all: initial;
        font-family: 'Roboto Slab';
    }

    fresh-container h1,
    fresh-container h2,
    fresh-container h3,
    fresh-container h4,
    fresh-container h5,
    fresh-container h6 {
        line-height: 1.2;
        margin-top: 1rem;
        margin-bottom: 16px;
        color: #000;
    }

    fresh-container h1 {
        font-size: 2.25rem;
        font-weight: 600;
        padding-bottom: .3em
    }

    fresh-container h2 {
        font-size: 1.75rem;
        font-weight: 600;
        padding-bottom: .3em
    }

    fresh-container h3 {
        font-size: 1.5rem;
        font-weight: 600
    }

    fresh-container h4 {
        font-size: 1.25rem;
        font-weight: 600
    }

    fresh-container h5 {
        font-size: 1rem;
        font-weight: 600
    }

    fresh-container h6 {
        font-size: 1rem;
        font-weight: 600
    }

    fresh-container p {
        line-height: 1.6;
        color: #333;
    }

    fresh-container>:first-child {
        margin-top: 0;
    }

    fresh-container>:last-child {
        margin-bottom: 0;
    }

    fresh-container pre {
        background-color: rgb(245, 245, 245);
        border: 1px solid #d6d6d6;
        border-radius: 3px;
        color: rgb(51, 51, 51);
        display: block;
        font-family: Consolas, "Liberation Mono", Menlo, Courier, monospace;
        font-size: .85rem;
        text-align: left;
        white-space: pre;
        word-spacing: normal;
        word-break: normal;
        word-wrap: normal;
        line-height: 1.4;
        tab-size: 8;
        hyphens: none;
        margin-bottom: 1rem;
        padding: .8rem;
        overflow: auto;
    }

    fresh-container li{
        margin-bottom: 1rem;
    }

    .cm-action-group {
        margin: 0;
        margin-bottom: 2rem;
        padding: 0;
        display: flex;
    }

    .cm-action-group>button {
        text-align: left;
        margin: .3125rem 0;
        border-radius: 0;
    }

    .cm-action-group i {
        display: inline-block;
        transform: scale(1.5);
        margin-right: 0.75rem;
    }

    separate-line {
        display: block;
        margin: 0;
        padding: 0;
        height: 1px;
        width: 100%;
        background: rgba(0, 0, 0, 0.25);
    }

    separate-line.ultra-thin {
        transform: scaleY(0.5);
    }

    separate-line.thin {
        transform: scaleY(0.75);
    }

    separate-line.stick {
        transform: scaleY(1.5);
    }

    .cm-empty{
        display:flex;
        justify-content: center;
        align-items: center;
        height: 10rem;
    }

    badge{
        display: inline-block;
        padding: 0.25rem 0.75em;
        font-weight: 700;
        line-height: 1.5;
        text-align: center;
        vertical-align: baseline;
        border-radius: 0.125rem;
        background-color: #f5f5f5;
        margin: 1rem;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 30px;
        border-radius: 4px;
        transition: .2s ease-out .0s;
        color: #7a8e97;
        background: #fff;
        position: relative;
        border: 1px solid rgba(0, 0, 0, 0.15);
    }

    .badge-tag{
        margin-right:0.5rem;
        display: inline-block;
    }

    .badgee-tag:last-of-type{
        margin-right:0;
    }

    info-div{
        display:block;
    }

    info-badge{
        font-weight: bold;
        color:rgba(0, 0, 0, 0.42);
        display: inline-block;
        margin-right: 1rem;
        font-family: Consolas, "Liberation Mono", Menlo, Courier, monospace;
    }

    file-card{
        display: flex;
        align-items: center;
        max-width: 100%;
        border-radius: 4px;
        transition: .2s ease-out .0s;
        color: #7a8e97;
        background: #fff;
        padding: 1rem;
        position: relative;
        border: 1px solid rgba(0, 0, 0, 0.15);
    }

    file-card a:hover{
        text-decoration: none;
        cursor: pointer;
    }

    file-card > div:first-of-type{
        display: flex;
        align-items: center;
        padding-right:1rem;
        width:5rem;
        height:5rem;
        flex-shrink: 0;
        flex-grow: 0;
    }

    file-card img{
        display: block;
        width:100%;
    }

    file-card > div:last-of-type{
        flex-shrink: 1;
        flex-grow: 1;
    }

    file-card p{
        margin:0;
        line-height: 1;
        font-family: 'Roboto';
    }

    file-card h5{
        margin:0;
        font-size: 1.25rem;
        margin-bottom: .5rem;
        font-family: 'Roboto';
        font-weight: 400;
        line-height: 1.2;
    }

    @media print{
        .no-print{
            display:none;
        }
        fresh-container{
            display:inline;
        }
    }
</style>

<div class="container mundb-standard-container">
    <div class="row">
        <div class="col-sm-12 col-lg-9">
            <paper-card class="animated fadeInLeft p-5">
                <link rel="stylesheet" href="/static/css/oj/{{$detail["oj_detail"]["ocode"]}}.css">
                <fresh-container>
                    <h1>{{$detail["title"]}}</h1>
                    <info-div>
                        <info-badge data-toggle="tooltip" data-placement="top" title="Time Limit"><i class="MDI timer"></i> {{$detail['time_limit']}}ms</info-badge>
                        <info-badge data-toggle="tooltip" data-placement="top" title="Memory Limit"><i class="MDI memory"></i> {{$detail['memory_limit']}}K</info-badge>
                    </info-div>

                    @if($detail["file"] && !blank($detail["file_url"]))
                        <file-card class="mt-4 mb-3">
                            <div>
                                <img src="/static/library/fileicon-svg/svg/{{$detail["file_ext"]}}.svg" onerror="this.src=unknown_svg;">
                                <script>
                                    var unknown_svg='data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 56 56" style="enable-background:new 0 0 56 56" xml:space="preserve"><g><path style="fill:%23e9e9e0" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074 c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"/><polygon style="fill:%23d9d7ca" points="37.5,0.151 37.5,12 49.349,12"/><path style="fill:%23c8bdb8" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"/><circle style="fill:%23fff" cx="18.5" cy="47" r="3"/><circle style="fill:%23fff" cx="28.5" cy="47" r="3"/><circle style="fill:%23fff" cx="38.5" cy="47" r="3"/></g></svg>';
                                </script>
                            </div>
                            <div>
                                <h5 class="mundb-text-truncate-1">{{basename($detail["file_url"])}}</h5>
                                <p><a class="text-info" href="{{asset($detail["file_url"])}}">Download</a></p>
                            </div>
                        </file-card>
                    @endif

                    @if($detail["file"] && $detail["pdf"] && $detail["viewerShow"])
                        @include("components.pdfViewer",["pdfSrc"=>asset($detail["file_url"])])
                    @endif

                    <div data-marker-enabled>

                    @unless(blank($detail["parsed"]["description"]))

                    <h2>Description:</h2>

                    {!!$detail["parsed"]["description"]!!}

                    @endunless

                    @unless(blank($detail["parsed"]["input"]))

                    <h2>Input:</h2>

                    {!!$detail["parsed"]["input"]!!}

                    @endunless

                    @unless(blank($detail["parsed"]["output"]))

                    <h2>Output:</h2>

                    {!!$detail["parsed"]["output"]!!}

                    @endunless

                    @foreach($detail["samples"] as $ps)

                        @if (!is_null($ps['sample_input']) && $ps['sample_input'] !== '')
                        <h2>Sample Input:</h2>
                        <pre>{!!$ps['sample_input']!!}</pre>
                        @endif

                        @if (!is_null($ps['sample_output']) && $ps['sample_output'] !== '')
                        <h2>Sample Output:</h2>
                        <pre>{!!$ps['sample_output']!!}</pre>
                        @endif

                        @unless (blank($ps['sample_note'])) {!!$ps['sample_note']!!} @endunless

                    @endforeach

                    @unless(blank($detail["parsed"]["note"]))

                    <h2>Note:</h2>

                    {!!$detail["parsed"]["note"]!!}

                    @endunless

                    </div>

                </fresh-container>
            </paper-card>
        </div>
        <div class="col-sm-12 col-lg-3 no-print">
            <paper-card class="animated fadeInRight btn-group-vertical cm-action-group" role="group" aria-label="vertical button group">
                <button type="button" class="btn btn-secondary" id="submitBtn"><i class="MDI send"></i>@guest Login & Submit @else Submit @endguest</button>
                <separate-line class="ultra-thin"></separate-line>
                <button type="button" class="btn btn-secondary" id="discussionBtn" style="margin-top: 5px;"><i class="MDI comment-multiple-outline"></i> Discussion </button>
                <button type="button" class="btn btn-secondary" id="solutionBtn"><i class="MDI comment-check-outline"></i> Solution </button>
            </paper-card>
            <paper-card class="animated fadeInRight">
                <p>Info</p>
                <div>
                    <a href="{{$detail["oj_detail"]["home_page"]}}" target="_blank"><img src="{{$detail["oj_detail"]["logo"]}}" alt="{{$detail["oj_detail"]["name"]}}" class="img-fluid mb-3"></a>
                    <p>Provider <span class="wemd-black-text">{{$detail["oj_detail"]["name"]}}</span></p>
                    @unless($detail['OJ']==1) <p><span>Origin</span> <a href="{{$detail["origin"]}}" target="_blank"><i class="MDI link-variant"></i> {{$detail['source']}}</a></p> @endif
                    <separate-line class="ultra-thin mb-3 mt-3"></separate-line>
                    <p><span>Code </span> <span class="wemd-black-text"> {{$detail["pcode"]}}</span></p>
                    <p class="mb-0"><span>Tags </span></p>
                    <div class="mb-3">@foreach($detail['tags'] as $t)<span class="badge badge-secondary badge-tag">{{$t["tag"]}}</span>@endforeach</div>
                    <p><span>Submitted </span> <span class="wemd-black-text"> {{$detail['submission_count']}}</span></p>
                    <p><span>Passed </span> <span class="wemd-black-text"> {{$detail['passed_count']}}</span></p>
                    <p><span>AC Rate </span> <span class="wemd-black-text"> {{$detail['ac_rate']}}%</span></p>
                    <p><span>Date </span> <span class="wemd-black-text"> {{$detail['update_date']}}</span></p>
                </div>
            </paper-card>
            <paper-card class="animated fadeInRight">
                <p>Related</p>
                <div class="cm-empty">
                    <badge>Nothing Yet</badge>
                </div>
            </paper-card>
        </div>
    </div>
</div>


@include('js.common.markerPen')
<script>
    window.addEventListener("load",function() {
        MarkerPen.initAll();
    }, false);

    document.getElementById("submitBtn").addEventListener("click",function(){
        location.href="/problem/{{$detail["pcode"]}}/editor";
    },false)

    document.getElementById("solutionBtn").addEventListener("click",function(){
        location.href="/problem/{{$detail["pcode"]}}/solution";
    },false)

    document.getElementById("discussionBtn").addEventListener("click",function(){
        location.href="/problem/{{$detail["pcode"]}}/discussion";
    },false)
</script>
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
        tex2jax: {
            inlineMath: [ ['$$$','$$$'], ["\\(","\\)"] ],
            processEscapes: true
        },
        showMathMenu: false
    });
</script>
<script type="text/javascript" src="/static/library/mathjax/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
@endsection
