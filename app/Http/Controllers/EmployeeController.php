<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eloquents\Employee;
use Illuminate\Support\Facades\Input;

class EmployeeController extends Controller
{
  public function getAll() {
    $employee = Employee::all();
    return $this->responseSuccess($employee, 200);
  }

  public function getById(Request $request, $id = NULL) {
    $employee = Employee::where('id', $id)->first();
    if(!$employee) return $this->responseError(NULL, 'User dengan ID Tersebut tidak ada');
    return $this->responseSuccess($employee);
  }

  public function create(Request $request) {
    $name = $request->input('name');
    $email = $request->input('email');
    $phone_number = $request->input('phone_number');
    $profession= $request->input('profession');
    $isEmptyForm = !$name || !$email || !$phone_number || !$profession;

    // Form Validaiton
    if($isEmptyForm) return $this->responseError(NULL, 'Form Tidak Boleh Kosong!');

    //Email Validation
    $email_valid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if(!$email_valid) return $this->responseError(NULL, 'Email tidak valid!');

    // Existing Email
    $checkExistingEmail = Employee::where('email', $email)->count() > 0;
    if($checkExistingEmail) return $this->responseError(NULL, 'Email ini sudah dipakai!');

    $employee = Employee::create([
      'name' => $name,
      'email' => $email,
      'phone_number' => $phone_number,
      'profession' => $profession
    ]);

    if(!$employee) $this->responseError(NULL, 'Penyimpanan data gagal dilakukan !', 400);

    return $this->responseSuccess($employee, 'Penyimpanan data berhasil dilakukan !', 201);

  }
}
