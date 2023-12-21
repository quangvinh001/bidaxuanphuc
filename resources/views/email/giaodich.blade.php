<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h2 class="page-header">
                <x-application-logo />  {{ config('app.name', 'Laravel') }}
                <small class="float-right">{{ $currentDate }}</small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Call of Duty</td>
                        <td>455-981-221</td>
                        <td>El snort testosterone trophy driving gloves handsome</td>
                        <td>$64.50</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Need for Speed IV</td>
                        <td>247-925-726</td>
                        <td>Wes Anderson umami biodiesel</td>
                        <td>$50.00</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Monsters DVD</td>
                        <td>735-845-642</td>
                        <td>Terry Richardson helvetica tousled street art master</td>
                        <td>$10.70</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Grown Ups Blue Ray</td>
                        <td>422-568-642</td>
                        <td>Tousled lomo letterpress</td>
                        <td>$25.99</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
            <div class="your-order-body">
                <ul class="payment_methods methods">
                    <li class="payment_method_bacs">
                        <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method"
                            value="COD" checked="checked" data-order_button_text="">
                        <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                        <div class="payment_box payment_method_bacs" style="display: block;">
                            Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên
                            giao hàng
                        </div>
                    </li>

                    <li class="payment_method_cheque">
                        <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method"
                            value="ATM" data-order_button_text="">
                        <label for="payment_method_cheque">Chuyển khoản </label>
                        <div class="payment_box payment_method_cheque" style="display: none;">
                            Chuyển tiền đến tài khoản sau:
                            <br>- Số tài khoản: 123 456 789
                            <br>- Chủ TK: Nguyễn A
                            <br>- Ngân hàng ACB, Chi nhánh TPHCM
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-6">
            <p class="lead">{{ $currentDate }}</p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                    </tr>
                    <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                    </tr>
                    <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                    </tr>
                </table>
            </div>
        </div>
        {{-- <!-- /.col -->
        <button type="submit" class="beta-btn primary pt-2 pb-2">Đặt hàng <i
                class="fa fa-chevron-right"></i></button> --}}
    </div>
    <!-- /.row -->
    <div class="row no-print">
        <div class="col-12">
          <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
         
          <button type="button" class="btn btn-primary float-right " >
            <i class="fas fa-download"></i> Generate PDF
          </button>
          <button type="button" class="btn btn-success float-right" style="margin-right: 5px;"><i class="far fa-credit-card"></i> Submit
            Payment
          </button>
        </div>
      </div>
    </div>
</section>