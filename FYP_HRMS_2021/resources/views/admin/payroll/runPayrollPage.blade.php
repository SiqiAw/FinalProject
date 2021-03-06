@extends('layouts.adminapp')

@section('content')
<h2>Payroll for Current Month</h2>

<div class="text-align:center">
   <table id="salaryStructureForAllJobTitleTable">
      <thead>
         <tr>
            <td>Employee ID</td>
            <td>Employee Name</td>
            <td>Job Title</td>
            <td>Action</td>
         </tr>
      </thead>

      <tbody>
         @foreach($employees as $employee)
         <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->jobtitle}}</td>
            <td>
               <a href="{{ route('editPayrollItemForEmployee',['id' => $employee->id]) }}" class="btn btn-primary">Manage Payroll Item</a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endsection
