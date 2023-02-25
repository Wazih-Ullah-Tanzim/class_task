<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">
         <h2>Give Your Info Here!!</h2>
         <form action="{{ url('/update_employee/'.$employee->id) }}" method="post">
             @csrf
             <div class="form-group">
                 <label for="">Name</label>
                 <input type="text" name="name"  value="{{$employee->name}}"class="form-control">
             </div>
             <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="{{$employee->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Birth date</label>
                <input type="date" name="birth_date" value="{{$employee->birth_date}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Salary</label>
                <input type="number" name="salary" value="{{$employee->salary}}" class="form-control">
            </div>
             <div class="form-group">
                 <label for="">Department</label>
                 <select name="department"  class="form-control">
                     <option value="">Select Department</option>
                     <option value="cse" {{$employee->department=='cse' ? 'selected' : ''}}>Computer Sciece and Engineering</option>
                     <option value="eee" {{$employee->department=='eee' ? 'selected' : ''}}>Electronic and Elcetrical Engineering</option>
                     <option value="hrm" {{$employee->department=='hrm' ? 'selected' : ''}}>Human Resource Management</option>
                     <option value="eco" {{$employee->department=='eco' ? 'selected' : ''}}>Economy</option>
                 </select>
             </div>

             <div class="form-group">
                <p>What is your gender?</p>
                <input type="radio" name="gender" value="male" {{$employee->gender=='male' ? 'checked' : ''}}> Male </br>
                <input type="radio" name="gender" value="female" {{$employee->gender=='female' ? 'checked' : ''}}> Female </br>


             </div>

             <div class="form-group">
                <p><label for="address">Address :</label></p>
                <textarea id="address" name="address"  rows="4" cols="50"> {{$employee->address}}</textarea>
             </div>

             <div class="form-group">
                <input type="checkbox" id="status" name="status" {{$employee->status==1 ? 'checked' : ''}} value=1>
             <label for="status"> status</label><br>
             </div>


             <div class="form-group">
                 <input type="submit" class="btn btn-primary" value="Update">
             </div>
         </form>
     </div>
</body>

</html>
