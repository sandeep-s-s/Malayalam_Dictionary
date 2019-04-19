<!DOCTYPE html>
<html lang="en">
<head>
    <title>മലയാളം നിഘണ്ടു </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    <style type="text/css">
        #id {
            padding-top: 7%;
        }

    </style>
</head>
<body>

    <br>
    <div class="container" id="id">
        <div class="col-6 offset-3">
            <h1 class="text-center"><span class="text-success">മലയാളം</span> നിഘണ്ടു</h1>
            <br>
            <form method="POST" action="/">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="word" placeholder="English to malayalam" name="word" required="" value="{{ app('request')->input('word') }}" autofocus="">
                </div>
                <button type="submit" class="btn btn-success btn-lg float-right"><i class="fas fa-search"></i> Find </button>
            </form>  
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <p class="text-danger text-center">{{ $error }}</p>
            @endforeach
            @endif


            @php $count = 0; @endphp
            @if(!empty($result_n) && count($result_n) >0)
            <p><strong>Noun : </strong></p>
            <ul>
                @foreach ($result_n as $data)
                <li>{{$data->malayalam_definition}}</li>
                @endforeach   
            </ul> 
            @php $count++ ; @endphp    
            @endif

            @if(!empty($result_a)&& count($result_a) >0)
            <p><strong>Adjective : </strong></p>
            <ul>
                @foreach ($result_a as $data)
                <li>{{$data->malayalam_definition}}</li>
                @endforeach   
            </ul> 
            @php $count++ ; @endphp
            @endif

            @if(!empty($result_adv)&& count($result_adv) >0)
            <p><strong>Adverb : </strong></p>
            <ul>
                @foreach ($result_adv as $data)
                <li>{{$data->malayalam_definition}}</li>
                @endforeach   
            </ul> 
            @php $count++ ; @endphp
            @endif

            @if($count ==0 && !empty($result_n) && !empty($result_a) && !empty($result_adv))
            <p class="text-center text-danger">No such word available</p>
            @endif 
        </div>
    </div>
    <nav class="navbar navbar-expand-sm  fixed-bottom">
        <ul class="nav navbar-nav ml-auto">
            <a class="navbar-brand" href="https://olam.in/" target="_blank"><small style="color:#000">Thanks to olam <i class="far fa-heart text-danger "></i></small></a>
        </ul>
    </nav>
</body>
</html>
