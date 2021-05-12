<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           ข้อมูลผู้ใช้  ยินดีต้อนรับ, {{Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
               <div class="col-md-8">
                   @if (session("success")) <!-- แสดงข้อความ Session -->
                    <div class="alert alert-success">{{session('success')}}</div>
                   @endif
                   <b class="card">
                       <div class="card-header">ตารางข้อมูลแผนก</div>
                   </b>
                   <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อแผนก</th>
                        <th scope="col">ผู้บันทึก</th>.
                        <th scope="col">สร้างเมื่อ</th>
                        <th scope="col">คำสั่ง</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($i=1)
                        @foreach ($department as $row)
                        <tr>
                            <th>{{$department->firstItem()+$loop->index}}</th> <!-- แสดงลำดับ -->
                            <td>{{$row->department_name}}</td>
                            <!-- <td> $row->name}}</td>  Querybuilder -->
                            <td> {{$row->user->name}}</td>  <!--Eloquent -->
                            <!-- <td>{$row->created_at->diffForHumans()}}</td> จาก Model -->
                            <td>
                                @if ($row->created_at == NULL)
                                <div class="text-danger">  ไม่ถูกกำหนด </div>
                                @else
                                 {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                                @endif
                            </td>
                            <td>
                                <a href="{{url('department/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a>
                                <a href="{{url('department/delete/'.$row->id)}}" class="btn btn-danger">ลบ</a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                 {{$department->links()}} <!-- แสดงลิงค์ หน้า -->
               </div>
               <div class="col-md-4">
                <div class="card">
                    <div class="card-header">แบบฟอร์ม</div>
                    <div class="card-body">
                        <form action="{{route('addDepartment')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="deparment_name">ชื่อแผนก</label>
                                <input type="text" class="form-control" name="department_name">
                            </div>
                            @error('department_name')
                            <div class="my-2">
                                <span class="text-danger">{{$message}}</span>
                            </div>
                            @enderror
                            <input type="submit" value="บันทึก" class="btn btn-primary">
                        </form>
                    </div>
                </div>
               </div>
            </div>
            @if (count($trashDepartment)>0)
            <div class="card my-2">
                <div class="card-header">ถังขยะ</div>
                <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th scope="col">ลำดับ</th>
                     <th scope="col">ชื่อแผนก</th>
                     <th scope="col">ผู้บันทึก</th>.
                     <th scope="col">สร้างเมื่อ</th>
                     <th scope="col">คำสั่ง</th>
                   </tr>
                 </thead>
                 <tbody>
                     @php ($i=1)
                     @foreach ($trashDepartment as $row)
                     <tr>
                         <th>{{$trashDepartment->firstItem()+$loop->index}}</th> <!-- แสดงลำดับ -->
                         <td>{{$row->department_name}}</td>
                         <!-- <td> $row->name}}</td>  Querybuilder -->
                         <td> {{$row->user->name}}</td>  <!--Eloquent -->
                         <!-- <td>{$row->created_at->diffForHumans()}}</td> จาก Model -->
                         <td>
                             @if ($row->created_at == NULL)
                             <div class="text-danger">  ไม่ถูกกำหนด </div>
                             @else
                              {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                             @endif
                         </td>
                         <td>
                             <a href="{{url('department/restore/'.$row->id)}}" class="btn btn-primary">กู้คืนข้อมูล</a>
                             <a href="{{url('department/delete/'.$row->id)}}" class="btn btn-danger">ลบถาวร</a>
                         </td>
                       </tr>
                     @endforeach
                 </tbody>
               </table>
               {{$trashDepartment->links()}} <!-- แสดงลิงค์ หน้า -->
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
