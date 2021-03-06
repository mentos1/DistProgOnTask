@extends('layouts.main')

@section('content')
<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#active">Active</a></li>
        <li><a href="#inExpect">inExpect</a></li>
        <li><a href="#store">Store</a></li>
    </ul>
    <div class="tab-content well well-lg">
        <div id="active" class="tab-pane fade in active">
            <table class="table table-condensed">
            <thead>
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Technologies</th>
                <th>Estimate</th>
                <th>LastUpdate</th>
                <th>Developers</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($distribution))
                @foreach($distribution as $dist)
                    @if($dist->case == "active")
                        <tr  id='{!! $dist->subject !!}'>
                        <td>{!! $dist->subject !!}</td>
                        <td>@foreach($dist->description as $dTask)
                                    {!! $dTask !!}
                            @endforeach
                        </td>
                        <td>
                            {!! $dist->priority !!}
                        </td>
                        <td>
                            {!! $dist->status !!}
                        </td>
                        <td>
                            @foreach($dist->technologies as $dTask)
                                <span>{!! $dTask !!}</span>
                            @endforeach
                        </td>
                        <td>{!! $dist->estimate !!}</td>
                            <td><span>{!! $dist->updated_at !!}</span></td>
                            <td>
                                @foreach($dist->developers as $dDevelopers)
                                    <span data-val="{{$dDevelopers->id}}">{!! $dDevelopers->FirstName !!} {!! $dDevelopers->LastName !!}</span>
                                @endforeach
                            </td>
                            <td><button type='button' class='btn btn-danger' data-blok="active" value="{{$dist->id}}">Delete</button>
                                <form method="POST" action="http://localhost/diplom/public/update/{{$dist->id}}" accept-charset="UTF-8">
                                    <input name="_token" value="jnubEBtxw7yYXeCgBjjt4ztrmUP0HvxB2t7G7mAP" type="hidden">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type='submit' class='btn btn-info' data-blok="active" value="{{$dist->id}}">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
            </tbody>
        </table>
</div>
    <div id="inExpect" class="tab-pane fade">
            <table class="table table-condensed">
            <thead>
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Technologies</th>
                <th>Estimate</th>
                <th>LastUpdate</th>
                <th>Developers</th>
                <th>Actions</th>
            </tr>
            </thead>
                <tbody>
                @if(isset($distribution))
                    @foreach($distribution as $dist)
                        @if($dist->case == "inexpect")
                            <tr  id='{!! $dist->subject !!}'>
                                <td>{!! $dist->subject !!}</td>
                                <td>@foreach($dist->description as $dTask)
                                        {!! $dTask !!}
                                    @endforeach
                                </td>
                                <td>
                                    {!! $dist->priority !!}
                                </td>
                                <td>
                                    {!! $dist->status !!}
                                </td>
                                <td>
                                    @foreach($dist->technologies as $dTask)
                                        <span>{!! $dTask !!}</span>
                                    @endforeach
                                </td>
                                <td>{!! $dist->estimate !!}</td>
                                <td><span>{!! $dist->updated_at !!}</span></td>
                                <td>
                                    @foreach($dist->developers as $dDevelopers)
                                        <span data-val="{{$dDevelopers->id}}">{!! $dDevelopers->FirstName !!} {!! $dDevelopers->LastName !!}</span>
                                    @endforeach
                                </td>
                                <td><button type='button' class='btn btn-danger' data-blok="store" value="{{$dist->id}}">Delete</button>
                                    <form method="POST" action="http://localhost/diplom/public/distribution/send/{{$dist->id}}" accept-charset="UTF-8">
                                        <input name="_token" value="jnubEBtxw7yYXeCgBjjt4ztrmUP0HvxB2t7G7mAP" type="hidden">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type='submit' class='btn btn-info' data-blok="store" value="{{$dist->id}}">Continue</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
        </table>
    </div>
    <div id="store" class="tab-pane fade">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Technologies</th>
                <th>Estimate</th>
                <th>LastUpdate</th>
                <th>Developers</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($distribution))
                @foreach($distribution as $dist)
                    @if($dist->case == "complete")
                        <tr  id='{!! $dist->subject !!}'>
                            <td>{!! $dist->subject !!}</td>
                            <td>@foreach($dist->description as $dTask)
                                    {!! $dTask !!}
                                @endforeach
                            </td>
                            <td>
                                {!! $dist->priority !!}
                            </td>
                            <td>
                                {!! $dist->status !!}
                            </td>
                            <td>
                                @foreach($dist->technologies as $dTask)
                                    <span>{!! $dTask !!}</span>
                                @endforeach
                            </td>
                            <td>{!! $dist->estimate !!}</td>
                            <td><span>{!! $dist->updated_at !!}</span></td>
                            <td>
                            @foreach($dist->developers as $dDevelopers)
                                <span data-val="{{$dDevelopers->id}}">{!! $dDevelopers->FirstName !!} {!! $dDevelopers->LastName !!}</span>
                            @endforeach
                            </td>
                            <td><button type='button' class='btn btn-danger' data-blok="inExpect" value="{{$dist->id}}">Delete</button>
                        </tr>
                    @endif
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
<script>

    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
    });


    $(".btn-danger").on("click", function (e) {
        var url = "http://localhost/diplom/public/";
        var dev = [];
        //console.log($($($($(this).parents("tr")[0]).find("td")[6]).find("span")[0]).html());
        //console.log($($($(this).parents("tr")[0]).find("td")[7]).find("span"));
        var data_tite = $($($($(this).parents("tr")[0]).find("td")[6]).find("span")[0]).html();
        var mas_dev = $($($(this).parents("tr")[0]).find("td")[7]).find("span");


        mas_dev.each(function(){
            dev.push(this.getAttribute("data-val"));
        });

        var data = {
        "_token": "{{ csrf_token() }}",
        "id": $(this).val(),
        "idBlock": this.getAttribute("data-blok"),
        "dev": dev,
        "time_created_at": data_tite
        };
        console.log(data);
        //console.log(data);
        $.ajax({
            type: "POST",
            url: "http://localhost/diplom/public/",
            data: data,
            dataType: 'json',
            //beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
            success: function (response) {
                console.log("success")

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
        //$(this).parents("tr")[0].remove();
    })

</script>
@endsection