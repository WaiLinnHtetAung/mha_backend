<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .email-form {
            padding: 20px
        }
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto 10px;
        }
        .header img{
            width: 70px;
            height: 70px;
        }
        .header div .h1 {
            font-size: 18px;
            font-weight: bold
        }
        .header div .h2 {
            font-size: 14px;
            font-weight: bold
        }

        .date {
            text-align: right;
            margin-right: 50px;
        }


        .form {
            margin-top: 0px;
        }
        .owner-info {
            display: flex;
            justify-content: center;
            margin: 20px auto 10px;
            gap: 20px;
        }

        .photo {
            width: 100px;
            height: 100px;
            border:none;
            margin-left: 15px;
        }

        .photo img {
            width: 100%;
            border-radius: 10px;
        }

        .owner-info .no {
            font-size: 14px;
            width: 50px;
        }

        .owner-info .data .col-4 {
            font-size: 14px;
        }

        .grid-container {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="email-form">
        <div class="header">
            <img src="{{asset('/logo.gif')}}" alt="">
            <div>
                <div class="h1">MYANMAR HOTELIER ASSOCIATION</div>
            <div class="h2">(APPLICATION FORM FOR MEMBERSHIP)</div>
            </div>
        </div>
        <div class="date">
            Date: _____________________
        </div>
        <div class="form">
            <div class="owner-info">
                <div class="no">(01)</div>
                <div class="data">
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">Name</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['owner']}}</div>
                    </div>
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">N.R.C No</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['nrc_no']}}</div>
                    </div>
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">Address</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['address']}}</div>
                    </div>
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">Contact Phone</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['owner_phone']}}</div>
                    </div>
                </div>

                <div class="photo">
                    @if($data['owner_image'])
                        <img src="{{$data['owner_image']}}" alt="">
                    @endif
                </div>
            </div>
            <div class="owner-info">
                <div class="no">(02)</div>
                <div class="data">
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">Name of Hotel</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['hotel_name']}}</div>
                    </div>
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">No.of rooms</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['no_of_room']}}</div>
                    </div>
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">Structure</div>
                        <div class="" style="font-size: 12px;">(timber), (concrete), (other material)</div>
                    </div>
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">No.of employee</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['no_of_employee']}}</div>
                    </div>
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">Address</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['hotel_address']}}</div>
                    </div>
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">Zone</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['zone']}}</div>
                    </div>
                    <div class="grid-container">
                        <div class="" style="width: 120px; margin-right:10px;">Phone/Fax/Email</div>
                        <div class="" style="width: 250px; text-align:justify; border-bottom:1px dotted #000;">{{$data['hotel_phone']}}</div>
                    </div>
                </div>

                <div class="photo">
                    &nbsp;
                </div>
            </div>
            <div class="owner-info" >
                <div class="no">(03)</div>
                <div class="data" >

                    <div class="">
                        <div class="">Application</div>
                        <div class="" style="font-size: 14px;">Apply to Membership &nbsp;
                            @if($data['member_type'] == 'A')
                                <span style="color: blue; text-decoration:underline;">(A)</span>
                            @else
                                <span>A</span>
                            @endif
                            &nbsp;
                            @if($data['member_type'] == 'B')
                                <span style="color: blue; text-decoration:underline;">(B)</span>
                            @else
                                <span>(B)</span>
                            @endif

                        </div>
                    </div>
                    <div class="grid-container" style="visibility: hidden;">
                        <div class="" style="width: 120px; margin-right:10px;">Phone/Fax/Email</div>
                        <div class="">____________________________</div>
                    </div>

                </div>

                <div class="photo">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
</body>
</html>
