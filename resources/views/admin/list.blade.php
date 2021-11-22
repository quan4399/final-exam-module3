<!doctype html>
<html lang="en">

<head>
    <title>Trang quản lý đại lý</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="">

    <div class=" col-6 mt-2">
        <a class="btn btn-success" href="{{route('shops.store')}}">Thêm mới</a>
    </div>
        <form class=" col-6 form-inline my-2 my-lg-0 mr-2" method='post' action="{{route('shops.search')}}">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm theo tên đại lý" name="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>


    <div class="card mt-2">
        <h5 class="card-header">Danh sách sản phẩm</h5>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>STT</th>
                    <th>Mã đại lý</th>
                    <th>Tên đại lý</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Tên người quản lý</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
                @forelse($shops as $key => $shop)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $shop->code }}</td>
                        <td>{{ $shop->shop_name }}</td>
                        <td>{{$shop->phone}}</td>
                        <td> {{ $shop->email }}</td>
                        <td>{{ $shop->address }} </td>
                        <td>{{ $shop->manager }} </td>
                        <td class="status{{$shop->status}}"></td>
                        <td><a href="{{route('shops.update',$shop->id)}}" class="btn btn-warning">Sửa</a></td>
                        <td><a href="{{route('shops.destroy',$shop->id)}}" onclick="confirm('are you sure ???')" class="btn btn-danger">Xóa</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No data</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<script>
    $(document).ready(function (){
        $('.status1').text("Đang hoạt động");
        $('.status0').text("Không hoạt động");
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
</body>

</html>
