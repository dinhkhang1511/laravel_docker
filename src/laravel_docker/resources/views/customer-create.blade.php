@include('partials.header')
  <div class="row">
      <div class="col-lg-8">
          <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>{{isset($editData) ? 'Sửa khách hàng' : 'Thêm khách hàng'}}</h2>
                </div>

                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-error" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="<?= isset($editData) ? route('customer.update',$editData->id) : route('customer.store') ?>" >
                        @csrf
                        @if(isset($editData))
                            @method('PUT');
                        @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tên Khách hàng</label>
                            <input type="text" class="form-control" id="name" placeholder="Tên Khách hàng" name='name' required
                            value="<?= isset($editData) ? $editData->name : '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlPassword">Địa chỉ </label>
                            <input type="text" class="form-control" id="address" placeholder="Địa chỉ" name="address" required
                            value="<?= isset($editData) ? $editData->address : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlPassword">Số điện thoại </label>
                            <input type="number" class="form-control" id="phone" placeholder="Số điện thoại" name="phone" required
                            value="<?= isset($editData) ? $editData->phone : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlPassword">Ngày tháng năm sinh </label>
                            <input type="date" class="form-control" id="dob" placeholder="Ngày tháng năm sinh" name="dob" required
                            value="<?= isset($editData) ? $editData->DOB : '' ?>">
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Lưu</button>
                            <a type="button" href="{{route('customer')}}" class="btn btn-secondary btn-default">Hủy bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">

        </div>
    </div>
    @include('partials.footer')

