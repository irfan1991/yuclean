{!! Form::open(['url' => '/checkout/addressi', 'method'=>'post', 'class' => 'form-horizontal']) !!}

    @include('checkout._address-field')

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('Lanjut <i class="fa fa-arrow-right"></i>', array('type' => 'submit', 'class' => ' btn-lg btn-primary')) !!}
        </div><br>
    </div>
{!! Form::close() !!}
