<div class="pers">
    <style>
        .team-section {
            text-align: center;
        }

        .team-section h1 {
            font-size: 20px;
            text-transform: uppercase;
            display: inline-block;
            border-bottom: 4px solid;
            padding-bottom: 10px;
        }

        .pe {
            float: left;
            overflow: hidden;
            padding: 40px 0;
            transition: 0.4s;
        }

        .pe:hover {
            background: #dfe4ea;
        }

        .pe img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
        }

        .p-name {
            margin: 5px;
            text-transform: uppercase;
        }

        .p-des {
            font-style: italic;
            color: #3498db;
        }

        .p-sm {
            margin-top: 6px;
        }

        .p-sm a {
            margin: 0 4px;
            display: inline-block;
            width: 30px;
            height: 30px;
            transition: 0.4s;
        }

        .p-sm a:hover {
            transform: scale(1.3);
        }

        .p-sm a i {
            color: #333;
            line-height: 30px;
        }


    </style>

    <div class="team-section">
        <div class="card m-4">
            <div class="row">
                <h2 class="py-4">Thông tin Ban điều hành</a>
                </h2>
                <div class="pers d-sm-flex justify-content-center">

                    @if(count($listInfo) === 0)
                        <h3 class="">
                            Chưa có thông tin đoàn của bạn
                        </h3>
                    @else
                        @foreach($listInfo as $info)
                            <div class="col-12 col-sm-6 col-md-4 col-xl-3 pe">
                                <img src="https://pbs.twimg.com/profile_images/969390093411774465/uJ5LaoyJ_400x400.jpg"
                                     alt="rafeh">
                                <div class="p-name">{{ $info->ten_thanh_vien ?? '' }}</div>
                                <div class="p-des">{{ $info->chuc_vu ?? '' }}</div>
                                <div class="p-name">SDT: {{ $info->sdt ?? '' }}</div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>

        </div>
    </div>

</div>
