@include('partials.header')

<div class="row">
    <div class="col-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>Khách hàng</h2>
            </div>
            <div>
                <form action="{{ route('customer.filter') }}" method="GET">
                    <select name="filter" id="filter" class="form-control filter">
                        <option value="">Chọn độ tuổi</option>
                        <option value="1"  <?= (isset($filter_type) && $filter_type == 1) ? 'selected' : '' ?>>
                            18-25</option>
                        <option value="2"  <?= (isset($filter_type) && $filter_type == 2) ? 'selected' : '' ?>>
                            26-30</option>
                        <option value="3"  <?= (isset($filter_type) && $filter_type == 3) ? 'selected' : '' ?>>
                            31-45</option>
                        <option value="4"  <?= (isset($filter_type) && $filter_type == 4) ? 'selected' : '' ?>>
                            46-60</option>
                    </select>
                    <button class="btn btn-filter" hidden>Lọc</button>
                </form>
            </div>
            <div class="card-body pt-0 pb-5">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
                @endif
                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Tên</th>
                            <th class=" d-md-table-cell">Địa chỉ</th>
                            <th class=" d-md-table-cell">Số điện thoại</th>
                            <th class=" d-md-table-cell">Ngày sinh</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <p class="text-dark" href=""> {{ $item->name ??''}}</p>
                            </td>
                            <td class=" d-md-table-cell">{{$item->address ??''}}</td>
                            <td class=" d-md-table-cell">{{$item->phone ??''}} </td>


                            <td class=" d-md-table-cell">{{isset($item->DOB) ? date('d/m/Y',strtotime($item->DOB)) : ''}}</td>
                            <td class="text-right">
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                        id="dropdown-recent-order2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdown-recent-order2">
                                        <li class="dropdown-item">
                                            <a href="{{route('customer.edit',$item->id)}}" class="text-dark">Sửa</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{route('customer.delete',$item->id)}}" class="text-dark">Xóa</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                @if(!isset($filter_type))
                {{$customer->links()}}
                @endif
            </div>
        </div>
    </div>
</div>
@include('partials.footer')
