<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           ข้อมูลผู้ใช้  ยินดีต้อนรับ, {{Auth::user()->name}}
           <b class="float-right">จำนวนผู้ใช้งานทั้งหมด {{count($user)}} คน </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">อีเมล์</th>
                        <th scope="col">เริ่มใช้งานระบบ</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($i=1)
                        @foreach ($user as $row)
                        <tr>
                            <th>{{$i++}}</th>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <!-- <td>{$row->created_at->diffForHumans()}}</td> จาก Model -->
                            <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
