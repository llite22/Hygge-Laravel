<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('croppie/croppie.css')}}" />
    <script src="{{asset('croppie/croppie.js')}}"></script>
    <style>
        .croppie-container {
            position: relative;
            width: 300px; /* Adjust this based on your design */
            height: 300px; /* Adjust this based on your design */
            overflow: hidden;
        }
    </style>
    <title>Document</title>
</head>
<body>


<div class="tp-fullscreen-container revolution">
    <div class="tp-fullscreen">
        <ul>
            @foreach($sliders as $slider)
                <li data-transition="fade">
                    <div class="croppie-container">
                        <img class="my-image" src="{{asset('storage/' . $slider->image)}}"
                             alt="image"/>
                    </div>
{{--                                        <div class="tp-caption large sfb text-center" data-x="center" data-y="263" data-speed="900"--}}
{{--                                             data-start="800" data-easing="Sine.easeOut">{{$slider->text}}--}}
{{--                                        </div>--}}
{{--                                        <div class="tp-caption medium sfb text-center" data-x="center" data-y="348" data-speed="900"--}}
{{--                                             data-start="1500" data-easing="Sine.easeOut">great solution for your business, portfolio, blog--}}
{{--                                            or any other purpose website--}}
{{--                                        </div>--}}
{{--                                        <div class="tp-caption sfb" data-x="center" data-y="420" data-speed="900" data-start="2200"--}}
{{--                                             data-easing="Sine.easeOut" data-endspeed="100"><a href="#" class="btn btn-large btn-border">Purchase--}}
{{--                                                Now</a></div>--}}
                </li>
            @endforeach
        </ul>

    </div>
    <!-- /.tp-fullscreen-container -->
</div>
<!-- /.revolution -->


<!-- or even simpler -->
<script>
    $('.my-image').croppie({
        viewport: {
            width: 50,
            height: 50,
            type: 'square',
        },
        boundary: { width: 1920, height: 1080 },
        showZoomer: false,
        enableResize: true,
        enableOrientation: true,
        mouseWheelZoom: 'ctrl'
    });
</script>

</body>
</html>


