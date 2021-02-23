<main class="site-main outer">
    <div class="inner posts">
        <style>
            p {margin: 0;}
            .notice {
                position: relative;
                margin: 1em;
                padding: 1em 1em 1em 2em;
                border-left: 4px solid #DDD;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.125);
                color: #34495e;
            }
            .notice:before {
                position: absolute;
                top: 50%;
                margin-top: -17px;
                left: -17px;
                background-color: #DDD;
                color: #FFF;
                width: 30px;
                height: 30px;
                border-radius: 100%;
                text-align: center;
                line-height: 30px;
                font-weight: bold;
                text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
            }
            .info {border-color: #0074D9;}
            .info:before {content: "i";background-color: #0074D9;}
            .success {border-color: #2ECC40;}
            .success:before {content: "√";background-color: #2ECC40;}
            .warning {border-color: #FFDC00;}
            .warning:before {content: "!";background-color: #FFDC00;}
            .error {border-color: #FF4136;}
            .error:before {content: "X";background-color: #FF4136;}
        </style>
        @forelse($notifications as $notification)
            <!-- success, warning, error, info -->
            <div class="notice warning">
                <div class="po st-full-header" style="padding: initial;">
                    <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png" style="width: 5%; float: left;"/>
                    <h1 style="font-size: initial;">{{$notification->data["email"]}}<small> ({{$notification->created_at->diffForHumans()}})</small></h1>
                    <section class="post-full-tags" style="text-transform: initial;">
                        <p style="text-align: justify">{{$notification->data["yorum"]}}</p>
                    </section>
                    <h2>
                        <small>
                            {{$notification->data["yazi"]}}
                            <a class="btn_1" onclick="return confirm('Okundu olarak işaretlemek istediğinize emin misiniz?!')" wire:click="oku('{{$notification->id}}')" ><i class="fa fa-times"></i></a>
                        </small>
                    </h2>
                </div>
            </div>
        @empty

        @endforelse






    </div>
</main>
