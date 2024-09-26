<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body
    style="background-color: gray ;display: flex;align-items:center;justify-content: center;width: 100%;height: 600px">
<div
    style="display: flex;padding: 32px; justify-content: center;align-content: center; width: 60%;height: 80%;background-color: white">

    <div style="">
        <div>
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}
                </div>
            @elseif(session('fail'))
                <div class="alert alert-danger">{{session('fail')}}
                </div>
            @endif
        </div>
        <div>
            <h1>Insert data</h1>
            <p>Please upload you excel file</p>
        </div>
        <div>

            <div>
                <form method="post" action="{{route('import.file')}}" enctype="multipart/form-data">
                    @csrf

                    <div style="display: flex;flex-direction: column;align-content: space-evenly">

                        <label for="">Select Today order file :</label>
                        <div style="" class="input-group mb-3">

                            <input required name="builder" id="builder" type="file" class="form-control" placeholder="Recipient's username"
                              aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                    <label for="">Select CFO order file :</label>
                    <div class="input-group mb-3">
                        <input required name="cfo" id="cfo" type="file" class="form-control" placeholder="Recipient's username"
                               aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                    </div>
                    <div>
                        <script src=""></script>
                        <p>Status :</p>
                        <div style="padding-bottom: 21px;display: flex;justify-content: space-evenly">
                            <div>
                        <input type="radio" value="active" name="status" id="active_status">
                        <label>Active</label>
                            </div>
                            <div>
                            <input type="radio" value="terminated" name="status" id="terminated_status">
                            <label>Terminated</label>
                            </div>
                        </div>
                    </div>
{{--                    <label for="">Select Detail file :</label>--}}
{{--                    <div class="input-group mb-3">--}}
{{--                        <input required name="detailFile" id="detailFile" type="file" class="form-control" placeholder="Recipient's username"--}}
{{--                               aria-label="Recipient's username" aria-describedby="basic-addon2">--}}
{{--                    </div>--}}
                    <div style="display: flex;justify-content: space-around" >
                        <button type="submit"
{{--                                data-bs-toggle="modal" data-bs-target="#exampleModal" --}}
                                class="btn btn-success" style="margin-bottom: 34px">Submit file
                        </button>
                        <button type="button" class="btn btn-danger"  style="margin-bottom: 34px" >
                            <a href="{{route('export.file')}}" style="text-decoration: none; color: white;">Download</a>
                        </button>
                    </div>

                </form>
            </div>
        </div>
{{--        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <!-- Modal content goes here -->--}}
{{--                        Please double check the file name--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>--}}
{{--                        <button type="button" class="btn btn-success">Submit</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>
