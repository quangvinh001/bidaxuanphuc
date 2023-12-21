@extends('layout_home.master')
@section('content')
    <div class="wrapper">
        <div class="abs-fullwidth beta-map wow flipInX"><iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3678.0141923553406!2d89.551518!3d22.801938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8ff8ef7ea2b7%3A0x1f1e9fc1cf4bd626!2sPranon+Pvt.+Limited!5e0!3m2!1sen!2s!4v1407828576904"
                width="100%"></iframe>
        </div>
        <div class="row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                    <h2>Admin<strong>LTE</strong></h2>
                    <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                        Phone: +1 234 56789012
                    </p>
                </div>
            </div>

            <div class="col-7">
                <form action="{{ route('lienhe1')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="inputName">Họ và Tên</label>
                        <input name="name" type="text" id="inputName" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">E-Mail</label>
                        <input name="email" type="email" id="inputEmail" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Số Điện Thoại</label>
                        <input name="phone" type="text" id="inputSubject" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Nội Dung</label>
                        <textarea name="message" id="inputMessage" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Send message">
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
